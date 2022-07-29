<?php

class Modulos extends Controllers
{

public function __construct(){
    parent::__construct();
     session_start();
     if(empty($_SESSION['login'])) {
	 	header('Location: '.base_url().'/login');
	}
    getPermisos(MMODULOS);
}
public function Modulos()
{
    
    $data['page_tag'] = "Módulos";
    $data['page_title'] ="Módulos";
    $data['page_name'] = "Módulos";
    $data['page_functions_js'] = "functions_modulos.js";
    $this->views->getView($this,"modulos", $data);
}

    public function getModulos()
    {
         $arrData = $this->model->selectModulos();

            for($i = 0; $i < count($arrData); $i++)
            { 
                if($arrData[$i]['status'] == 1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                }else{
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                }

                $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-secondary btn-sm btnPermisoRol" onClick="fntPermisos('.$arrData[$i]['idmodulo'].')" title="Permisos"><i class="fa fa-user-secret" aria-hidden="true"></i></button> 
                <button class="btn btn-primary btn-sm btnEditModulo" onClick="fntEditModulo('.$arrData[$i]['idmodulo'].')" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol('.$arrData[$i]['idmodulo'].')" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
                </div>';
        }

    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
    }

    public function getSelectRoles(){
        $htmlOptions = "";
        $arrData = $this->model->selectRoles();
        if(count($arrData) > 0){
            for($i=0; $i < count($arrData); $i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['idrol'].'">'.$arrData[$i]['roleNomb'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }
    

    public function getModulo( int $idrol)
    {
        $intIdrol = intval(strClean($idrol));

        if($intIdrol > 0)
        {   

             $arrData = $this->model->selectModulo($intIdrol);
            if(empty($arrData))
            { 

            $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');

            }else{

             $arrResponse = array('status' => true, 'data' => $arrData);

             }

                 echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
         }
        die();
    }

    public function setModulo()
    {
            ///dep($_POST);
                    $intIdrol = intval($_POST['idmodulo']);
                    $strRol = strClean($_POST['txtmoduTitu']);
                    $strDescripcion = strClean($_POST['txtmoduDesc']);
                    $intStatus = intval($_POST['listStatus']);
                    
                    if($intIdrol == 0)
                    {
                        $request_rol = $this->model->insertModulo($strRol, $strDescripcion, $intStatus);
                        $option = 1;

                    }else{
                        $request_rol = $this->model->updateModulo($intIdrol, $strRol, $strDescripcion, $intStatus);
                        $option = 2;

                    }

                    if($request_rol > 0)
                    {
                        if($option == 1)
                        {

                            $arrResponse = array('status' => true, 'msg' => 'Datos guardados con exito.');
                        }else{

                            $arrResponse = array('status' => true, 'msg' => 'Datos Actualizado con exito.');
                        }

                        }else if ($request_rol == 'exist') 
                        {

                        $arrResponse = array('status' => false, 'msg' => 'El rol ya existe.');

                    }else{

                        $arrResponse = array("status" => false, "msg" => 'No se pueden guardar los datos.');

                    }

                     echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                    die();
    }

public function delRol()
{
    if($_POST){

        $roleCodi = intval($_POST['idmodulo']);
        $requestDelete =  $this->model->deleteModulo($roleCodi);
        if($requestDelete == 'ok'){

            $arrResponse = array('status' => true, 'msg' => 'se ha eliminado con exito el rol');

        }elseif ($requestDelete == 'exist') {

            $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar el rol');

        }else{

            $arrResponse = array('status' => false, 'msg' => 'Error al tratar de eliminado el rol');

        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    die();
}

}

?>