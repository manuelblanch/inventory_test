<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>

            <li><a href="{{ url('inventory') }}"><i class='fa fa-link'></i> <span>Inventory</span></a></li>
            <li><a href="{{ url('providers') }}"><i class='fa fa-link'></i> <span>Manteniment-Proveidors</span></a></li>
            <li><a href="{{ url('location') }}"><i class='fa fa-link'></i> <span>Manteniment-Localització</span></a></li>
            <li class="treeview">
                <a href="{{ url('manteniments') }}"><i class='fa fa-link'></i> <span>Manteniments</span></a>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a>Department</a></li>
                    <li><a href="{{ url('providers') }}"></a></li>
                    <li><a href="{{ url('system-management/country') }}"></a></li>
                    <li><a href="{{ url('system-management/state') }}"></a></li>
                    <li><a href="{{ url('system-management/city') }}"></a></li>
                    <li><a href="{{ url('system-management/report') }}"></a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
