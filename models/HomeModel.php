<?php 
// importación del modelo que se quiere cargar require_once("CategoriasModel.php");
class HomeModel extends Mysql
{
  /// se debe crear la variable objeto private $objCategorias;
  public function __construct(){
    parent::__construct();
    /// se cre la instancia del objeto $this->objCategorias = new CategoriasModel();
  }

  public function getCategorias(){
   /// se accede al los metodos del controlador y el modelo  return $this->objCategorias->selectCategorias();

  }


 
}
?>