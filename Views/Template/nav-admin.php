    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?=media()?>img/avatar.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombres'];?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombre_rol'];?> </p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="<?=base_url()?>dashboard">
          <i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>
        
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
          
            <i class="app-menu__icon fas fa-tools"></i><span class="app-menu__label">Administración</span><i class="treeview-indicator fa fa-angle-right"></i>
          </a>
              <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?=base_url()?>usuarios"><i class="icon fas fa-users"></i> Usuarios</a></li>
                <li><a class="treeview-item" href="<?=base_url()?>roles"><i class="icon fas fa-user-tag"></i> Roles de Usuario</a></li>
                <li><a class="treeview-item" href="<?=base_url()?>sistema"><i class="icon fas fa-cogs"></i> Configuración Sistema</a></li>
                <li><a class="treeview-item" href="<?=base_url()?>federacion"><i class="icon fas fa-expand-arrows-alt"></i> Federación</a></li>
              </ul>
        </li>


        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
          
            <i class="app-menu__icon fas fa-people-arrows"></i><span class="app-menu__label">Colegiados</span><i class="treeview-indicator fa fa-angle-right"></i>
          </a>
              <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?=base_url()?>colegiados"><i class="icon fas fa-user-shield"></i> Administración Colegiados</a></li>
                <li><a class="treeview-item" href="<?=base_url()?>administracion_asistencias"><i class="icon fas fa-spell-check"></i> Administración Asistencias</a></li>
                <li><a class="treeview-item" href="<?=base_url()?>reporte_colegiados"><i class="icon fas fa-list-ol"></i> Reporte Colegiados</a></li>
          </ul>
        </li>


        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-layer-group"></i><span class="app-menu__label">Clubes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">            
                <li><a class="treeview-item" href="<?=base_url()?>club"><i class="icon fas fa-toolbox"></i> Administración Clubes</a></li>
                <li><a class="treeview-item" href="<?=base_url()?>reporte_clubs"><i class="icon fas fa-list"></i> Reporte Clubes</a></li>
              </ul>
        </li>


        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-scroll"></i><span class="app-menu__label">Partidos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">              
                <li><a class="treeview-item" href="<?=base_url()?>administracion_partidos"><i class="icon fas fa-digital-tachograph"></i> Administración Partidos</a></li>
                <li><a class="treeview-item" href="<?=base_url()?>reporte_partidos"><i class="icon fas fa-clipboard-list"></i> Reporte Partidos</a></li>
              </ul>
        </li>

        <li><a class="app-menu__item" href="<?=base_url()?>sorteo_partidos"><i class="app-menu__icon fas fa-dice"></i><span class="app-menu__label">Sorteo Partidos</span></a></li>
                                                                    
        <li><a class="app-menu__item" href="<?=base_url()?>gestion_encuestas"><i class="app-menu__icon fas fa-question"></i><span class="app-menu__label">Encuestas</span></a></li>         
        
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon far fa-copyright"></i><span class="app-menu__label">Sobre los Autores</span></a></li>
      </ul>
    </aside>