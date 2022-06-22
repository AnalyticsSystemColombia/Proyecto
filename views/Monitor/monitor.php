<?php
 headerAdmin($data); 
 //getModal('ModalModulos', $data);
 //$arrData = $data['productos'];
 $arrProductos = $data['productos'];
 dep($arrProductos);
 ?>
   <div id="contentAjax"></div>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-plus" aria-hidden="true"></i> <?= $data['page_title'] ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fa fa-plus-square" aria-hidden="true"></i>Nuevo</button>
          </h1>
          <p>Aqui puedes registrar una nueva venta</p>
          <hr class="flex-w p-l-15">
          <div class="form-group">
            <form class="wrap-search-header flex-w p-l-15" method="get" action="<?= base_url() ?> tienda/search">
                <button class="btn btn-success">
                    Buscar producto
                    <i class="zmdi zmdi-search"></i>
                    <input  type="hidden" name ="p" value="1">
                </button>
                <input class="plh3" type="text" name="s" placeholder="Buscar...">
            </form>
        </div>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/monitor"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>
     <?php 
            if(count($data['productos']) > 0){
                $prevPagina = $data['pagina'] - 1;
                $nextPagina = $data['pagina'] + 1;
            ?>
			<div class="flex-c-m flex-w w-full p-t-45">
			<?php if($data['pagina'] > 1){ ?>
				<a href="<?= base_url() ?>/tienda/search?p=/<?= $prevPagina.'&s=' .$data['busqueda'] ?>" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04"> <i class="fas fa-chevron-left"></i> &nbsp; Anterior </a>&nbsp;&nbsp;
			<?php } ?>
			<?php if($data['pagina'] != $data['total_paginas']){ ?>
				<a href="<?= base_url() ?>/tienda/search?p=/<?= $nextPagina.'&s=' .$data['busqueda'] ?>" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04"> Siguiente &nbsp; <i class="fas fa-chevron-right"></i> </a>
			<?php } ?>
			</div>
			<?php 
				}
	  ?>
          
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="tableModulos">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <!-- <th>Fecha</th> -->
                        <th>Descripción</th>
                        <th>Status</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
   
  <?php footerAdmin($data); ?> 

  