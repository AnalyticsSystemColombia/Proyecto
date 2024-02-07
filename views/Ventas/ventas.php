<?php
 headerAdmin($data); 
 getModal('modalVentas', $data);
 ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-plus" aria-hidden="true"></i> <?= $data['page_title'] ?>
            <?php if($_SESSION['permisosMod']['w']){ ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fa fa-plus-square" aria-hidden="true"></i>Nuevo</button>
          </h1>
          <?php } ?>
          <p>Aqui puedes agregar una facturas de un proveedor</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/ventas"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>
      
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div class="table-responsive">
                
                  <table class="table table-hover  table-bordered" id="tableVentas">
                  <div class="row">
                    <div class="col">
                        <button type="button" class="btn-primary">
                           Total: <span id="total" class="badge badge-light"></span>
                        </button>
                    </div>
                    </div> 
                    <thead>
                      <tr>
                        <th>Nombre Producto</th>
                        <th>Stock</th> 
                        <th>Cantidad Productos</th> 
                        <th>Precio Productos</th>
                        <th>Precio Ventas</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                      </tr>
                    </thead> 
                    <tbody>   
                    </tbody>
                  </table>



                  <table class="table table-hover  table-bordered" id="tableResultados">
                    <thead>
                      <th>
                        Total del valor facturas:
                      </th>
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
  