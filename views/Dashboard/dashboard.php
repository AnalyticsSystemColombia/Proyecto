<?php
 headerAdmin($data); 
 dep($arrData);
?>
  <main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?= $data['page_title'] ?></h1>
          <p>Aqui puedes ver los movimientos del día</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/Dashboard">Administración</a></li>
        </ul>
    </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">Estos son los eventos del día.</div>
              
              <div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <div class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                  </div><!-- /.row -->
                </div><!-- /.container-fluid -->
              </div>
              <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-3 col-6">
                      <div class="small-box bg-info">
                        <div class="inner">
                        <h3> <sup style="font-size: 20px"></sup></h3>
                          <p>Nuevas ordenes pruebas</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3>53<sup style="font-size: 20px"></sup></h3>

                          <p>usuarios</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h3>44</h3>

                          <p>Clientes</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <h3>65</h3>

                          <p>Ventas diarias</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>
                </div><!-- /.container-fluid -->
              </section>
      <!-- /.content -->
          </div>
            </div>
          </div>
        </div>
        <?php
         /*$requestApi = CurlConnectionGet(URLPAYPAL."/v2/checkout/orders/1FR7854608373410U","application/json",getTokenPaypal());
              dep($requestApi);
            $requestPost = CurlConnectionPost(URLPAYPAL."/v2/payments/captures/3A418824P3757402W/refund","application/json",getTokenPaypal());
            dep($requestPost);*/
        ?>
  </main>
  <?php footerAdmin($data); ?>
  
<script type="text/javascript">
     var annyang = "";
        if(annyang){
          var comandos = {
            'hola': function(){
              alert("Bienvenido al Sistema de información SISO");
            }
          };
          console.log(comandos);
          annyang.addCommands(comandos);
          annyang.setLenguage("es-MX");
          annyang.start();
        }
</script>