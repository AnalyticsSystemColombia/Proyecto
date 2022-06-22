<?php
require_once("Libraries/Core/Mysql.php");
trait TsearchProductos{
  private $con;
  private $strProducto;
  private $intIdProducto;
  private $strCategoria;
  private $intIdCategoria;
  private $strRutacategoria;
  private $cant;
  private $option;
  private $strRuta;

	public function cantProdSearch($busqueda){
    $this->con = new Mysql();
    $sql = "SELECT COUNT(*) AS total_registros FROM productos WHERE
    prodNomb LIKE '%$busqueda%' AND status = 1 ";
    exit;
    $result_register = $this->con->select($sql);
    $total_registro = $result_register;
    return $total_registro;

  }
	public function getProductosSearch($busqueda ,$desde, $porpagina){
      $this->con = new Mysql();
      $sql = "SELECT p.prodId,
              p.codigo,
              p.prodNomb,
              p.descripcion,
              p.prodIdCate,
              c.cateNomb as categoria,
              p.prodPrec,
              p.ruta,
              p.prodStock
          FROM productos p 
          INNER JOIN categorias c
          ON p.prodIdCate = c.cateCodi
          WHERE p.status = 1 AND  ORDER p.prodNomb LIKE '%$busqueda%' ORDER BY p.prodId DESC LIMIT $desde,$porpagina";
          $request = $this->con->select_all($sql);
          if(count($request) > 0){
            for ($c=0; $c < count($request) ; $c++) { 
              $intIdProducto = $request[$c]['prodId'];
              $sqlImg = "SELECT img
                  FROM images
                  WHERE productoid = $intIdProducto";
              $arrImg = $this->con->select_all($sqlImg);
              if(count($arrImg) > 0){
                for ($i=0; $i < count($arrImg); $i++) { 
                  $arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
                }
              }
              $request[$c]['images'] = $arrImg;
            }
          }
      return $request;
    }

 
     
}

?>