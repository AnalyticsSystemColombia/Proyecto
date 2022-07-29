<?php

class TipoPagos extends Controllers{

    public function __construct(){
        parent::__construct();
        session_start();
        if(empty($_SESSION['login'])) {
        header('Location: '.base_url().'/login');
        }
        getPermisos(MTPAGOS);
    }
    public function tipopagos(){
        if(empty($_SESSION['permisosMod']['r'])){
            header("Location:".base_url().'/dashboard');
        }
        $data['page_tag'] = "TipoPagos";
        $data['page_title'] ="TipoPagos";
        $data['page_name'] = "TipoPagos";
        $data['page_functions_js'] = "functions_tipopagos.js";
        ///$data['page_content'] = "Informacion de la pagina";
        $this->views->getView($this,"tipoPagos", $data);
    }

    public function getTipoPagos(){
        if($_SESSION['permisosMod']['r']){
            $arrData = $this->model->selectTipopagos();
            for($i = 0; $i < count($arrData); $i++) { 
                $btnView = '';
                $btnEdit ='';
                $btnDelete ='';
                if($arrData[$i]['status'] == 1){
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                }else{
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                }
                if($_SESSION['permisosMod']['r']){
                    $btnView= '<button class="btn btn-secondary btn-sm btnPermisoRol" onClick="fntPermisos('.$arrData[$i]['idtipopago'].')" title="Permisos"><i class="fa fa-user-secret" aria-hidden="true"></i></button>';
                }
                if($_SESSION['permisosMod']['u']){
                    $btnEdit = '<button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol('.$arrData[$i]['idtipopago'].')" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
                }
                $arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    
    public function setTipoPagos(){
            //dep($_POST);
        if(empty($_SESSION['permisosMod']['w'])){
                $intIdrol = intval($_POST['idtipopago']);
                $strTipopagp = strClean($_POST['txtroleNomb']);
                $intStatus = intval($_POST['listStatus']);
                if($intIdrol == 0){
                    $request_rol = $this->model->insertTipopago($strTipopagp, $intStatus);
                    $option = 1;
                }else{
                    $request_rol = $this->model->updateRol($intIdrol, $strTipopagp, $intStatus);
                    $option = 2;
                }
                if($request_rol > 0) {
                    if($option == 1){
                        $arrResponse = array('status' => true, 'msg' => 'Datos guardados con exito.');
                    }else{ 
                        $arrResponse = array('status' => true, 'msg' => 'Datos Actualizado con exito.');
                    }
                    }else if ($request_rol == 'exist')  {
                    $arrResponse = array('status' => false, 'msg' => 'El rol ya existe.');
                }else{
                    $arrResponse = array("status" => false, "msg" => 'No se pueden guardar los datos.');
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }

        die();
    }

    public function delRol(){
        if(empty($_SESSION['permisosMod']['d'])){
            if($_POST){
                $roleCodi = intval($_POST['idrol']);
                $requestDelete =  $this->model->deleteRol($roleCodi);
                if($requestDelete == 'ok'){
                    $arrResponse = array('status' => true, 'msg' => 'se ha eliminado con exito el rol');
                }elseif ($requestDelete == 'exist') {
                    $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar el rol');
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error al tratar de eliminado el rol');
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

}

?>