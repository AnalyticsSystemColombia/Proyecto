<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombres']; ?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['roleNomb']; ?></p> 
        </div>
      </div>
      <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>" target="_blank">
                <i class="app-menu__icon fa fas fa-globe" aria-hidden="true"></i>
                <span class="app-menu__label">Ver sitio web</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/monitor">
                <i class="app-menu__icon fa fas fa-globe" aria-hidden="true"></i>
                <span class="app-menu__label">Monitor</span>
            </a>
        </li>
         <?php if(!empty($_SESSION['permisos'][MDASHBOARD]['r'])) { ?>
          <li>
              <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                  <i class="app-menu__icon fa fa-dashboard"></i>
                  <span class="app-menu__label">Dashboard</span>
              </a>
          </li>
        <?php } ?> 
        <?php if(!empty($_SESSION['permisos'][MCATEGORIAS]['r']) || !empty($_SESSION['permisos'][MUSUARIOS]['r'])|| !empty($_SESSION['permisos'][MROLES]['r']) || !empty($_SESSION['permisos'][MMODULOS]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-cog" aria-hidden="true"></i>
                <span class="app-menu__label">Configuración</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
              <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>usuarios"><i class="icon fa fa-circle-o"></i>Usuarios</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>roles"><i class="icon fa fa-circle-o"></i>roles</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>modulos"><i class="icon fa fa-circle-o"></i>Modulos</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>categorias"><i class="icon fa fa-circle-o"></i>Categorias</a></li>
              </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][MCLIENTES]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>clientes">
                <i class="app-menu__icon fa fa fa-users" aria-hidden="true"></i>
                <span class="app-menu__label">Clientes</span>
            </a>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][MPRODUCTOS]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>productos">
                <i class="app-menu__icon fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="app-menu__label">Productos</span>
            </a>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][11]['r']) || !empty($_SESSION['permisos'][12]['r'])) { ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-archive" aria-hidden="true"></i>
                <span class="app-menu__label">Comercial</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>pedidos"><i class="icon fa fa-circle-o"></i>Pedidos</a></li>
              <?php if(!empty($_SESSION['permisos'][6]['r'])){ ?>
            <li><a class="treeview-item" href="<?= base_url(); ?>ventas"><i class="icon fa fa-circle-o"></i>Ventas</a></li>
             <?php } ?>
          </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-user" aria-hidden="true"></i>
                <span class="app-menu__label">Provedores</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>proveedores"><i class="icon fa fa-circle-o"></i>Proveedores</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>facturas"><i class="icon fa fa-circle-o"></i>Facturas</a></li>
          </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][MSUSCRIPTOR]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>suscriptores">
                <i class="app-menu__icon fas fa-user-tie" aria-hidden="true"></i>
                <span class="app-menu__label">Suscriptores</span>
            </a>
        </li>
        <?php } ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>logout">
                <i class="app-menu__icon fa fa-sign-in" aria-hidden="true"></i>
                <span class="app-menu__label">Logout</span>
            </a>
        </li>
      </ul>
    </aside>