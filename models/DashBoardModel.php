<?php 
class DashBoardModel extends Mysql
{
  public function __construct()
  {
    parent::__construct();

  }
  public function reportesUsuarios($consultas){
    $sql ="SELECT COUNT(*) as total  FROM personas ";
    $request = $this->select($sql);
    $consultas['total']=$request;
    return $request;
    dep($request);
  }

  public function selectLog()
  {
    $sql = "select * from mysql.general_log";
    dep($sql);
    $request =$this->select_all($sql);
    return $request;
    dep($request);
    var_dump($request);

   
  }
  
}
?>