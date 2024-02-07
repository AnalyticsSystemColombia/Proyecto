<?php 
class VentasModel extends Mysql
{
  public function __construct()
  {
    parent::__construct();
  }


  public function insertPedidos( string $pediNomb , 
  int $pediPrec,  int $pediCant, int $status){
   
    $this->strprodNomb = $pediNomb;
    $this->intprodPrec = $pediPrec;
    $this->strprodStock = $pediCant;
    $this->intStatus = $status;
    $return = 0;

     $sql = "SELECT * FROM productos WHERE prodCodi =
     '{$this->strprodNomb}'";
     $request = $this->select_all($sql);
    
    if(empty($request)){
      $query_insert = "INSERT INTO pedidos (pediNombProd,  pediCant, pediPrec,
         status) value(?,?,?,?)";
      $arrData = array(
        
        $this->strprodNomb,
        $this->intprodPrec,
        $this->strprodStock,
        $this->intStatus
      );
      $request_insert = $this->insert($query_insert, $arrData);
      $return = $request_insert;
    }else{
      $return ="exist";
    }
    return $return;
  } 

  public function selectVentas(){
    $sql ="select dp.pedidoid, p.status, p.fecha, pr.prodNomb, pr.prodStock, pr.prodPrec, p.monto, dp.cantidad, dp.precio
    from productos pr
     inner join pedidos p
    on p.idpedido = pr.prodId
     inner join detalle_pedido dp
    on dp.pedidoid = p.idpedido";
    //echo $sql;exit;
    $request = $this->select_all($sql);
    return $request;
  }

  public function selectPedido(int $prodCodi ){
    $this->prodCodi = $prodCodi ;
    $sql ="SELECT p.prodCodi , p.prodNomb, p.prodMarc, p.prodStock, 
    p.prodMode, c.cateNomb, p.prodPrec, p.status, DATE_FORMAT(p.prodFech, '%d-%m-%Y') 
    as fechaRegistro
    FROM productos p
    INNER JOIN categorias c
    ON   p.prodCodiCate = c.cateCodi
   WHERE p.status != 0 and prodCodi ={$this->prodCodi}";
    ///echo $sql;exit; 
    $request = $this->select($sql);
    return $request;
  }

  public function AgregarProducto(int $prodCodi ){
    $this->prodCodi = $prodCodi ;
    $sql ="SELECT prodCodi , prodNomb, prodStock, 
     prodPrec, status FROM productos 
    WHERE prodCodi = $this->prodCodi";
    ///echo $sql;exit; 
    $request = $this->select($sql);
    return $request;
  }
}
?>