<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="active treeview">
          <a href="#">
            @if(auth()->user()->rol==2)
              <i class="fa fa-dashboard"></i> <span>Mantenedores</span>
            @else
              <i class="fa fa-dashboard"></i> <span>Menu</span>
            @endif  
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="fa fa-circle-o"><a href="vecino"><i class="fa fa-circle-o"></i> Vecinos</a></li>
            <li><a href="cuota"><i class="fa fa-circle-o"></i> Cuotas</a></li>
            <li><a href="servicio"><i class="fa fa-circle-o"></i> Servicios</a></li>
            <li><a href="anuncio"><i class="fa fa-circle-o"></i> Anuncios</a></li>
            <li><a href="arriendo"><i class="fa fa-circle-o"></i> Arriendo de sede</a></li>
            <li><a href="taller"><i class="fa fa-circle-o"></i> Talleres</a></li>
          </ul>
        </li> 
        
        <li class="active treeview">  
          <a href="#">
              <i class="fa fa-dashboard"></i> <span>Otras opciones</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @if(auth()->user()->rol==1)             
                <li><a href="tallerIns"><i class="fa fa-circle-o"></i> Talleres Inscritos</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Cuotas Pagadas</a></li>
              @endif 
              <li><a href="grafArriendo"><i class="fa fa-circle-o"></i> Gráfico Arriendo</a></li> 
            </ul>
        </li>
        
    </section>
    <!-- /.sidebar -->
  </aside>