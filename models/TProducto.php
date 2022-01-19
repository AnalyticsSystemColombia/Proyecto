<?php
require_once("Libraries/Core/Mysql.php");
trait TProducto{
	private $con;
  private $strProducto;
  private $intIdProducto;
  private $strCategoria;
  private $intIdCategoria;
  private $cant;
  private $option;
  private $strRuta;

	public function getProductosT(){
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
          WHERE p.status != 0 ";
          $request = $this->con->select_all($sql);
          if(count($request)> 0){
            for ($c=0; $c < count($request) ; $c++) { 
              $intIdProducto = $request[$c]['prodId'];
              $sqlImg="SELECT img FROM images WHERE productoId = $intIdProducto";
              $arrImg = $this->con->select_all($sqlImg);
              if(count($arrImg) > 0){
                for ($i=0; $i < count($arrImg); $i++) { 
                  $arrImg[$i]['url_image']= media().'/images/uploads/'.$arrImg[$i]['img'];
                }
              }
              $request[$c]['images']=$arrImg;
            }
          }
      return $request;
  }

  public function getProductosCategoriaT(int $Idcategoria, string $ruta){
    $this->intIdCategoria = $Idcategoria;
    $this->strRuta = $ruta;
    $this->con = new Mysql();
    $sql_cate ="SELECT cateCodi, cateNomb FROM categorias WHERE cateCodi = '{$this->intIdCategoria}'";
    $request = $this->con->select($sql_cate);
    if(!empty($request)){
      $this->strCategoria = $request['cateNomb'];
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
          WHERE p.status != 0  AND p.prodIdCate = $this->intIdCategoria AND c.ruta = '{$this->strRuta}'";
          $request = $this->con->select_all($sql);
          if(count($request)> 0){
            for ($c=0; $c < count($request) ; $c++) { 
              $intIdProducto = $request[$c]['prodId'];
              $sqlImg="SELECT img FROM images WHERE productoId = $intIdProducto";
              $arrImg = $this->con->select_all($sqlImg);
              if(count($arrImg) > 0){
                for ($i=0; $i < count($arrImg); $i++) { 
                  $arrImg[$i]['url_image']= media().'/images/uploads/'.$arrImg[$i]['img'];
                }
              }
              $request[$c]['images']=$arrImg;
            }
          }
          $request = array('Idcategoria' => $this->intIdCategoria,
            'cateNomb' => $this->strCategoria,
            'productos' => $request
          );
       }
      return $request;
  }

  public function getProductoT(int $idproducto, string  $ruta){
    $this->con = new Mysql();
    $this->intIdProducto = $idproducto;
    $this->strRuta = $ruta;
       $sql = "SELECT p.prodId,
            p.codigo,
            p.prodNomb,
            p.descripcion,
            p.prodIdCate,
            c.cateNomb as categoria,
            c.ruta as ruta_categoria,
            p.prodPrec,
            p.ruta,
            p.prodStock
        FROM productos p 
        INNER JOIN categorias c
        ON p.prodIdCate = c.cateCodi 
        WHERE p.status != 0 AND p.prodId = '{$this->intIdProducto}' AND p.ruta = '{$this->strRuta}'";
        $request = $this->con->select($sql);
        if(!empty($request)){
            $intIdProducto = $request['prodIdCate'];
            $sqlImg="SELECT img FROM images WHERE productoId = $intIdProducto";
            $arrImg = $this->con->select_all($sqlImg);
            if(count($arrImg) > 0){
              for ($i=0; $i < count($arrImg); $i++) { 
                $arrImg[$i]['url_image']= media().'/images/uploads/'.$arrImg[$i]['img'];
              }
            }else{
               $arrImg[0]['url_image']= media().'/images/uploads/product.pnp';
            }
            $request['images']=$arrImg;
        }
    return $request;
  } 

  public function getProductosRandom(int $Idcategoria, int $cant, string $option){
    $this->intIdCategoria = $Idcategoria;
    $this->cant = $cant;
    $this->option = $option;
    if($option == "r"){
      $this->option = "RAND()";
    }else if($option == "a"){
      $this->option = "prodId ASC";
    }else{
      $this->option = "prodId DESC";
    }
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
        WHERE p.status != 0  AND p.prodIdCate = $this->intIdCategoria
        ORDER BY $this->option LIMIT $this->cant";
        $request = $this->con->select_all($sql);
        if(count($request)> 0){
          for ($c=0; $c < count($request) ; $c++) { 
            $intIdProducto = $request[$c]['prodId'];
            $sqlImg="SELECT img FROM images WHERE productoId = $intIdProducto";
            $arrImg = $this->con->select_all($sqlImg);
            if(count($arrImg) > 0){
              for ($i=0; $i < count($arrImg); $i++) { 
                $arrImg[$i]['url_image']= media().'/images/uploads/'.$arrImg[$i]['img'];
              }
            }
            $request[$c]['images']=$arrImg;
          }
        }

    return $request;
  }

  public function getProductoIDT(int $prodId){
      $this->con = new Mysql();
      $this->intIdProducto = $prodId;
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
          WHERE p.status != 0 AND p.prodId = '{$this->intIdProducto}'";
          $request = $this->con->select($sql);
          if(!empty($request)){
              $intIdProducto = $request['prodIdCate'];
              $sqlImg="SELECT img FROM images WHERE productoId = $intIdProducto";
              $arrImg = $this->con->select_all($sqlImg);
              if(count($arrImg) > 0){
                for ($i=0; $i < count($arrImg); $i++) { 
                  $arrImg[$i]['url_image']= media().'/images/uploads/'.$arrImg[$i]['img'];
                }
              }else{
                 $arrImg[0]['url_image']= media().'/images/uploads/product.pnp';
              }
              $request['images']=$arrImg;
          }
      return $request;
  } 
     
}

?>