<?php 
  class MonitorModel extends Mysql{
    private $intprodCodi;
    private $strprodNomb;
    private $strprodDesc;
    private $strCodigo;
    private $intlistProd;
    private $intProdPrec;
    private $intprodStock;
    private $intStatus;
    private $strRuta;
    private $strImagen;
    
    public function __construct(){
      parent::__construct();
    }

    public function insertProductos( string $prodNomb,  string $descripcion, string $Codigo, int $listProd, int $ProdPrec, int $prodStock, string $ruta, int $Status){
          $this->strprodNomb  = $prodNomb;
          //$this->strprodMode  = $prodMode;
          $this->strprodDesc  = $descripcion;
          $this->strCodigo    = $Codigo;
          $this->intlistProd  = $listProd;
          $this->intProdPrec  = $ProdPrec;
          $this->intprodStock = $prodStock;
          $this->strRuta = $ruta;
          $this->intStatus    = $Status;
          $return = 0;
          $sql = "SELECT * FROM productos WHERE codigo = '{$this->strCodigo}'"; 
          $request = $this->select_all($sql);
      
          if(empty($request)){
            $query_insert = "INSERT INTO productos (prodNomb, descripcion, codigo,   
             prodIdCate, prodPrec, prodStock,ruta, status) values (?,?,?,?,?,?,?,?)";
            $arrData = array($this->strprodNomb,
                             //$this->strprodMode,
                             $this->strprodDesc,
                             $this->strCodigo,
                             $this->intlistProd,
                             $this->intProdPrec,
                             $this->intprodStock,
                             $this->strRuta,
                             $this->intStatus);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
          }else{
            $return ="exist";
          }
          return $return;
    } 

    public function updateProducto( int $prodId, string $prodNomb,  string $descripcion, string $Codigo, int $listProd, int $prodPrec, int $prodStock, string $ruta, int $Status){
      $this->intprodCodi = $prodId;
      $this->strprodNomb = $prodNomb;
      $this->strprodDesc = $descripcion;
      $this->strCodigo = $Codigo;
      $this->intlistProd = $listProd;
      $this->intProdPrec = $prodPrec;
      $this->intprodStock = $prodStock;
      $this->strRuta = $ruta;
      $this->intStatus = $Status;
      $return = 0;
      $sql = "SELECT * FROM productos WHERE codigo = '{$this->strCodigo}' AND prodId != $this->intprodCodi ";
      $request = $this->select_all($sql);
      if(empty($request))
      {
        $sql = "UPDATE productos 
            SET prodIdCate=?,
              codigo=?,
              prodNomb=?,
              descripcion=?,
              prodPrec=?,
              prodStock=?,
              ruta=?,
              status=? 
            WHERE prodId = $this->intprodCodi ";
        $arrData = array($this->intlistProd,
                    $this->strCodigo,
                    $this->strprodNomb,
                    $this->strprodDesc,
                    $this->intProdPrec,
                    $this->intprodStock,
                    $this->strRuta,
                    $this->intStatus);

            $request = $this->update($sql,$arrData);
            $return = $request;
      }else{
        $return = "exist";
      }
          return $return;
    }

    public function selectProductos(){
      $sql = "SELECT p.prodId,
              p.codigo,
              p.prodNomb,
              p.prodMode,
              p.descripcion,
              p.prodIdCate,
              c.cateNomb as categoria,
              p.prodPrec,
              p.prodStock,
              p.status 
          FROM productos p 
          INNER JOIN categorias c
          ON p.prodIdCate = c.cateCodi 
          WHERE p.status != 0 ";
          $request = $this->select_all($sql);
      return $request;
    }

   public function selectProducto(int $prodId){
      $this->intprodCodi = $prodId;
     $sql = "SELECT p.prodId,
              p.codigo,
              p.prodNomb,
              p.prodMode,
              p.descripcion,
              p.prodIdCate,
              c.cateNomb,
              p.prodPrec,
              p.prodStock,
              p.status 
          FROM productos p
          INNER JOIN categorias c
          ON p.prodIdCate = c.cateCodi
          WHERE p.prodId = $this->intprodCodi";
      $request = $this->select($sql);
      return $request;
    }

    public function insertImagen(int $prodId, string $img){
        $this->intprodCodi = $prodId;
        $this->strImagen = $img;
        $query_insert  = "INSERT INTO images (productoId,img) VALUES(?,?)";
            $arrData = array($this->intprodCodi,
                             $this->strImagen);
            $request_insert = $this->insert($query_insert,$arrData);
            return $request_insert;
    }

    public function selectImages(int $prodId){
      $this->intprodCodi = $prodId;
      $sql = "SELECT productoId,img FROM images WHERE productoId = $this->intprodCodi";
      $request = $this->select_all($sql);
      return $request;
    }

    public function deleteImage(int $prodId, string $imagen){
      $this->intprodCodi = $prodId;
      $this->strImagen = $imagen;
      $query  = "DELETE FROM images 
            WHERE productoId = $this->intprodCodi 
            AND img = '{$this->strImagen}'";
          $request_delete = $this->delete($query);
          return $request_delete;
    }

    public function VenderProducto(int $prodId){
      $this->intprodCodi = $prodId;
      $sql = "UPDATE productos SET status = ? WHERE prodId = $this->intprodCodi ";
      $arrData = array(0);
      $request = $this->update($sql,$arrData);
      return $request;
    }
  }
?>