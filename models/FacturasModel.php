<?php 
class FacturasModel extends Mysql{
  private $intIdfactura;
  private $NombEmpresa;
  private $Nfactura;
  private $ValorFact;
  private $intstatus;


  public function __construct(){
    parent::__construct();
  }

  public function selectFacturas()
  {
    $sql ="SELECT pf.provFactId,pf.provFactCodi, pf.provNumeFact,pf.provValoFact,
    pf.provFactFech,pf.status,p.provNomb 
            FROM proveedores_facturas pf 
            INNER JOIN proveedores p
            ON pf.provFactCodi = p.provCodi
            WHERE p.status <>0";
    $request = $this->select_all($sql);
    return $request;
  }

  public function selectResultados()
  {
    $sql ="SELECT sum(provValoFact) as total FROM proveedores_facturas";
    $request = $this->select_all($sql);
    return $request;
  }

  public function insertFacturas(int $provNomb, int $provFactId, 
  int $provValoFact, int $status){
   
    $this->NombEmpresa = $provNomb;
    $this->Nfactura = $provFactId;
    $this->ValorFact = $provValoFact;
    $this->intstatus = $status;
      $query_insert = "INSERT INTO proveedores_facturas (provFactCodi ,provNumeFact, provValoFact, status)
       value(?,?,?,?)";
      $arrData = array(
        $this->NombEmpresa,
        $this->Nfactura,
        $this->ValorFact,
        $this->intstatus
      );
      //dep($arrData);
      $request_insert = $this->insert($query_insert, $arrData);
      $return = $request_insert;
      return $return;
  } 


  public function selectProveedores()
  {
    $sql ="SELECT * FROM proveedores where provCodi =provCodi";
    $request = $this->select_all($sql);
    return $request;
  }

  public function selectFactura(int $provFactId )
  {
    //dep($provFactId);
    $this->intIdfactura = $provFactId ;
    $sql ="SELECT p.provNomb as Nombre, pf.provFactCodi, pf.provNumeFact, pf.provValoFact,
    DATE_FORMAT(pf.provFactFech, '%d-%m-%Y') as fechaRegistro, pf.status
    FROM proveedores_facturas pf
	  join proveedores  p
    on p.provCodi = pf.provFactCodi
    WHERE pf.provFactId  = $this->intIdfactura";
    ///echo $sql;exit; 
    $request = $this->select($sql);
    return $request;
  }

  

  

  
    
}
?>