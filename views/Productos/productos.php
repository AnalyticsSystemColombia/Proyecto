<?php
 headerAdmin($data); 
 getModal('ModalProductos', $data);
 ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-box" aria-hidden="true"></i> <?= $data['page_title'] ?>
           <?php if($_SESSION['permisosMod']['w']){ ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fa fa-plus-square" aria-hidden="true"></i>Nuevo</button>
           <?php } ?>
          </h1>
          <p>Aqui puedes crear un nuevo producto</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/productos"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="tableProductos">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Categoría</th> 
                        <th>Producto</th> 
                        <th>Detalle</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Código</th>
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
  
