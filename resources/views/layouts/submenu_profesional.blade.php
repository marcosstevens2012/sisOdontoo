    <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li class="treeview">
              <a href="{{url('inicio/inicio')}}">
                <i class="fa fa-laptop"></i>
                <span >INCIO</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Turnos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('turno/turno')}}"><i class="fa fa-circle-o"></i>Turnos</a></li>
                <li><a href="{{url('turno/turno/create')}}"><i class="fa fa-circle-o"></i>Nuevo Turno</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('insumo/insumo')}}"><i class="fa fa-circle-o"></i> Insumos</a></li>
                <li><a href="{{url('insumo/ingreso')}}"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                <li><a href="{{url('insumo/proveedor')}}"><i class="fa fa-circle-o"></i> Proveedores</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Pacientes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('paciente/paciente')}}"><i class="fa fa-circle-o"></i>Informacion Personal</a></li>
                <li><a href="{{url('paciente/paciente/create')}}"><i class="fa fa-circle-o"></i>Nuevo Paciente</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Obras Sociales</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('paciente/obrasocial')}}"><i class="fa fa-circle-o"></i> Obra Social</a></li>
                <li><a href="{{url('profesional/prestacion')}}"><i class="fa fa-circle-o"></i>Prestaciones</a></li>
                <li><a href="{{url('profesional/liquidacion')}}"><i class="fa fa-circle-o"></i>Liquidacion</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user-md"></i>
                <span>Profesionales</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('profesional/profesional/create')}}"><i class="fa fa-circle-o"></i>Nuevo Profesional</a></li>
                <li><a href="{{url('profesional/profesional')}}"><i class="fa fa-circle-o"></i>Informacion Personal</a></li>

                <li><a href="{{url('profesional/consultorio')}}"><i class="fa fa-circle-o"></i>Consultorios</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Mecanico Dental</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('mecanico/mecanico')}}"><i class="fa fa-circle-o"></i>Informacion Personal</a></li>

                <li><a href="{{url('mecanico/pedido')}}"><i class="fa fa-circle-o"></i>Pedidos</a></li>

                <li><a href="{{url('mecanico/pieza')}}"><i class="fa fa-circle-o"></i>Piezas</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i>
                <span>Transacciones</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('transaccion/transaccion')}}"><i class="fa fa-circle-o"></i>Cobros</a></li>

              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Reportes Generales</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li> <a href="{{URL::to('pdf')}}"> <i class="fa fa-circle-o"></i> Reporte de Ingreso</a></li>
                <li><a href="{{url('turno/pdfgeneral')}}"><i class="fa fa-circle-o"></i> Reporte de Turnos</a></li>
                <li><a href="{{url('liquidacion/pdfliquidaciones')}}"><i class="fa fa-circle-o"></i> Reporte de Liquidacion</a></li>
                <li><a href="{{url('paciente/pdfgeneral')}}"><i class="fa fa-circle-o"></i> Reporte de Pacientes</a></li>
                <li><a href="{{url('almacen/insumo')}}"><i class="fa fa-circle-o"></i> Reporte de insumos</a></li>
              </ul>
            </li>

              <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Configuraciones</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('seguridad/usuario')}}"><i class="fa fa-circle-o"></i> Usuarios</a></li>

              </ul>
              <ul class="treeview-menu">
                <li><a href="{{url('auditoria/auditoria')}}"><i class="fa fa-circle-o"></i> Auditoria</a></li>
              </ul>
              <ul class="treeview-menu">
                <li><a href="{{url('seguridad/usuario')}}"><i class="fa fa-circle-o"></i> Formas de pago</a></li>

              </ul>
              <ul class="treeview-menu">
                <li><a href="{{url('seguridad/usuario')}}"><i class="fa fa-circle-o"></i> Tipos de Personas</a></li>

              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>


             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>


          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>