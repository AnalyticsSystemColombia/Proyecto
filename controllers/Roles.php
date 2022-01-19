<?php

class Roles extends Controllers{

    public function __construct(){
        parent::__construct();
        session_start();
        if(empty($_SESSION['login'])) {
        header('Location: '.base_url().'/login');
        }
        getPermisos(7);
    }
    public function Roles(){
        if(empty($_SESSION['permisosMod']['r'])){
            header("Location:".base_url().'/dashboard');
        }
        $data['page_tag'] = "Roles";
        $data['page_title'] ="Roles";
        $data['page_name'] = "Roles";
        $data['page_functions_js'] = "functions_roles.js";
        ///$data['page_content'] = "Informacion de la pagina";
        $this->views->getView($this,"roles", $data);
    }

    public function getRoles(){
        if($_SESSION['permisosMod']['r']){
            $arrData = $this->model->selectRoles();
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
                    $btnView= '<button class="btn btn-secondary btn-sm btnPermisoRol" onClick="fntPermisos('.$arrData[$i]['idrol'].')" title="Permisos"><i class="fa fa-user-secret" aria-hidden="true"></i></button>';
                }
                if($_SESSION['permisosMod']['u']){
                    if(($_SESSION['idUser'] == 3 and $_SESSION['userData']['idrol'] == 3) ||
                        ($_SESSION['userData']['idrol'] == 3 and $arrData[$i]['idrol'] != 3) ){
                        $btnEdit = '<button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol('.$arrData[$i]['idrol'].')" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
                    }else{
                        $btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
                    }
                }
                $arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }
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
    
    public function getRol( int $idrol){
        if(empty($_SESSION['permisosMod']['r'])){
            $intIdrol = intval(strClean($idrol));
            if($intIdrol > 0){   
                $arrData = $this->model->selectRol($intIdrol);
                if(empty($arrData)) { 
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                }else{
                $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

    public function setRol(){
            ///dep($_POST);
        if(empty($_SESSION['permisosMod']['w'])){
                $intIdrol = intval($_POST['idrol']);
                $strRol = strClean($_POST['txtroleNomb']);
                $strDescripcion = strClean($_POST['txtroleDesc']);
                $intStatus = intval($_POST['listStatus']);
                if($intIdrol == 0){
                    $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
                    $option = 1;
                }else{
                    $request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescripcion, $intStatus);
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