<?php 
class FacturasModel extends Mysql
{
  public function __construct()
  {
    parent::__construct();
  }


 public function insertFactura(int $listEmpresa, int $provNumeFact, int $provValoFact, int $status){
    $return = 0;
    $this->intEmpresa = $listEmpresa;
    $this->intprovNumeFact = $provNumeFact;
    $this->intprovValoFact = $provValoFact;
    $this->intStatus = $status;
    $sql ="SELECT * FROM proveedores_facturas WHERE provFactCodi = $this->intEmpresa and provNumeFact =$this->intprovNumeFact";
    $request = $this->select_all($sql);
    if(empty($request)){
      $query_insert = "INSERT INTO proveedores_facturas (provFactCodi ,provNumeFact , provValoFact ,status ) VALUES(?,?,?,?)";
      $arrData =  array($this->intEmpresa,
                       $this->intprovNumeFact,
                       $this->intprovValoFact,
                       $this->intStatus);
      $request_insert = $this->insert($query_insert,$arrData);
      $return = $request_insert;
    }else{
      $return = "exist";
    }
    return $return;
  }

  public function selectFacturas(){
   
    $sql = "SELECT pf.provFactId,pf.provFactCodi, pf.provNumeFact,pf.provValoFact,pf.provFactFech,pf.status,p.provNomb 
        FROM proveedores_facturas pf 
        INNER JOIN proveedores p
        ON pf.provFactCodi = p.provCodi
        WHERE p.status != 0 ";
        $request = $this->select_all($sql);
        return $request;
  }

  public function selectFactura(int $provFactId ){
    $this->intprovFactId = $provFactId;
    $sql = "SELECT provFactCodi, provNumeFact, provValoFact,status 
        FROM proveedores_facturas 
        WHERE provFactId = $this->intprovFactId";
    $request = $this->select($sql);
    return $request;
  }

 public function updateFactura(int $listEmpresa, int $provNumeFact, int $provValoFact, int $status){
    $this->intEmpresa  = $listEmpresa;
    $this->intprovNumeFact = $provNumeFact;
    $this->intprovValoFact = $provValoFact;
    $this->intStatus = $status;
    $sql = "SELECT * FROM proveedores_facturas WHERE  provNumeFact != $this->intprovNumeFact) ";
    $request = $this->select_all($sql);
    if(empty($request)){
        $sql = "UPDATE proveedores_facturas SET provFactCodi=?, provNumeFact=?, provValoFact =?,  status=? 
            WHERE provFactCodi = $this->intprovFactId";
            $arrData = array($this->intEmpresa,
                            $this->intprovNumeFact,
                            $this->intprovValoFact,
                            $this->intStatus);
      }
      $request = $this->update($sql,$arrData);
      return $request;
  }
    
  
}
?>