<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <ul class="sidebar-menu">

        <li>
          <a href="{{ url('Inicio') }}">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
          </a>
        </li>

        <li>
          <a href="{{ url('Usuarios') }}">
            <i class="fa fa-users"></i>
            <span>Usuarios</span>
          </a>
        </li>

        <li>
          <a href="{{ url('Clientes') }}">
            <i class="fa fa-users"></i>
            <span>Clientes</span>
          </a>
        </li>

        <li class="treeview">

          <a href="#">

            <i class="fa fa-list-ul"></i>
            <span>Sobre los libros</span>

            <span class="pull-right-container">
              <i class ="fa fa-angle-left" pull-right></i>
            </span>

          </a>

          <ul class="treeview-menu">

            <li>
              <a href="{{ url('Géneros') }}">
                <i class="fa fa-diamond"></i>
                <span>Géneros</span>
              </a>
            </li>

            <li>
              <a href="{{ url('Autores') }}">
                <i class="fa fa-users"></i>
                <span>Autores</span>
              </a>
            </li>

            <li>
              <a href="{{ url('Libros') }}">
                <i class="fa fa-book"></i>
                <span>Libros</span>
              </a>
            </li>

          </ul>

        </li>

        <li class="treeview">

          <a href="#">

            <i class="fa fa-list-ul"></i>
            <span>Sobre los libros</span>

            <span class="pull-right-container">
              <i class ="fa fa-angle-left" pull-right></i>
            </span>

          </a>

          <ul class="treeview-menu">

            <li>
              <a href="{{ url('Crear-Ventas') }}">
                <i class="fa fa-cart-plus"></i>
                <span>Crear Ventas</span>
              </a>
            </li>

            <li>
              <a href="{{ url('Ver-Ventas') }}">
                <i class="fa fa-check-square-o"></i>
                <span>Ver Ventas</span>
              </a>
            </li>




          </ul>

        </li>

        <li>
          <a href="{{ url('Pedidos') }}">
            <i class="fa fa-cubes"></i>
            <span>Pedidos</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>