<?php

class Facturas extends Controllers{
	
    public function __construct()
    {
        parent::__construct();
        session_start();
        if(empty($_SESSION['login'])) {
            header('Location: '.base_url().'/login');
        }
        getPermisos(MFACTURAS);
        
    }
    public function Facturas()
    {
        if(empty($_SESSION['permisosMod']['r']))
        {
            header("Location:".base_url().'/dashboard');
        }
        $data['page_tag'] = "Facturas";
        $data['page_title'] ="Facturas";
        $data['page_name'] = "Facturas";
        $data['page_functions_js'] = "functions_facturas.js";
        $this->views->getView($this,"Facturas", $data);
    }

    public function getFacturas()
    {
        $arrData =$this->model->selectFacturas();
        for($i = 0; $i < count($arrData); $i++)
            {
                if($arrData[$i]['status'] == 1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                }else{
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                }
                $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-secondary btn-sm btnViewProveedor" pv="'.$arrData[$i]['provFactId'].'" title="Ver usuario"><i class="fa fa-address-book-o" aria-hidden="true"></i></button> 
                <button class="btn btn-primary btn-sm btnEditProveedor" pv="'.$arrData[$i]['provFactId'].'" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm btnDelProveedor" pv="'.$arrData[$i]['provFactId'].'" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
                </div>';
            }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function enviarFacturas()
    {
        if($_POST) {
            if(empty($_POST['provCodi']) || empty($_POST['txtprovNumeFact']) ||
            empty($_POST['txtprovValoFact']) || empty($_POST['listStatus']) ) 
            {
        $arrResponse = array("status" => false, "msg" => 'Datos incorrectos');
        }else{
            $strlistaempresa = intval($_POST['provCodi']);
            $strNfactura =     intval ($_POST['txtprovNumeFact']);
            $strVfactura =     intval ($_POST['txtprovValoFact']);
            $intStatus =       intval($_POST['listStatus']);
            $request_user = $this->model->insertFacturas($strlistaempresa,
            $strNfactura,
            $strVfactura,
            $intStatus);
        if($request_user > 1)
        {
            $arrResponse = array('status' => true, 'msg' => 'Datos Guardados con éxito');
        }else if($request_user == 'exist')
        {
            $arrResponse = array('status' => true, 'msg' => 'El nombre del producto ya existe, ingrese otro');
        }else{
            $arrResponse = array("status" => false, "msg" => 'No es posible guardar los datos');
        }
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getSelectProveedores()
	{
        $htmlOptions = "";
        $arrData = $this->model->selectProveedores();
        if(count($arrData) > 0){
            for($i=0; $i < count($arrData); $i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['provCodi'].'">'.$arrData[$i]['provNomb'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }

    public function getResultados()
    {
        $arrData =$this->model->selectResultados();
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }
}
?>