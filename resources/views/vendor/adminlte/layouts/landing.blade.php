<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">

    <meta property="og:title" content="Adminlte-laravel" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>{{ trans('Inventory AdminLte with Spot – Freelance & Agency Theme') }}</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

</head>

<body data-spy="scroll" data-target="#navigation" data-offset="50">

<div id="app">
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>Inventory AdminLte</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#home" class="smoothScroll">{{ trans('Inici') }}</a></li>
                    <li><a href="#desc" class="smoothScroll">{{ trans('Descripcio') }}</a></li>
                    <li><a href="#showcase" class="smoothScroll">{{ trans('Captures') }}</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    @else
                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>


    <section id="home" name="home">
      <div id="headerwrap">
  <div class="container">
    <div class="row centered">
      <div class="col-lg-8 col-lg-offset-2">
      <h1>Inventari AdminLTE <b><a href="https://manuelblanch.github.io/presentation_inventory/">Presentació</a></b></h1>
      <h2><b><a href="https://github.com/manuelblanch/inventory_test">Repositori Github</a></h2>
          <h2><a href="{{ url('/register') }}" class="btn btn-lg btn-success">{{ 'Registrat a la app' }}</a></h2>
          <h2><a href="{{ url('/login') }}" class="btn btn-lg btn-success">{{ 'Login a la app' }}</a><h2><br>
                    </div>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div><!-- headerwrap -->
</section>

<section id="desc" name="desc">
<div class="container w">
  <div class="row centered">
    <br><br>
    <div class="col-lg-4">
      <i class="fa fa-heart"></i>
      <h4>DISSENY</h4>
      <p>Ús del framework de php laravel per a el muntatge de l'inventari.</p>
    </div><!-- col-lg-4 -->

    <div class="col-lg-4">
      <i class="fa fa-laptop"></i>
      <h4>MYSQL</h4>
      <p>Base de dades on es guardaran les dades de l'inventari. Consta de una taula pricipal que es comunica amb diferents subtaules situades en un manteniment de cada taula.</p>
    </div><!-- col-lg-4 -->

    <div class="col-lg-4">
      <i class="fa fa-trophy"></i>
      <h4>ADMINLTE</h4>
      <p>Plantilla utilitzada en la creació de l'inventari.</p>
    </div><!-- col-lg-4 -->
  </div><!-- row -->
  <br>
  <br>
</div><!-- container -->
</section>

    <!-- PORTFOLIO SECTION -->
<section id="showcase" name="showcase">
	<div id="dg">
		<div class="container">
			<div class="row centered">
				<h4>CAPTURES</h4>
				<br>
				<div class="col-lg-4">
					<div class="tilt">
					<a href="#"><img src="{{ asset('/img/item2.png') }}" alt=""></a>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="tilt">
					<a href="#"><img src="{{ asset('/img/item3.png') }}" alt=""></a>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="tilt">
					<a href="#"><img src="{{ asset('/img/item1.png') }}" alt=""></a>
					</div>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- DG -->

</section>

    <footer>
        <div id="c">
            <div class="container">
                <p>
                    <a href="https://github.com/acacha/adminlte-laravel"></a><b>admin-lte-laravel</b></a>. {{ trans('adminlte_lang::message.descriptionpackage') }}.<br/>
                    <strong>Copyright &copy; 2017 <a href="https://manuelblanch.github.io/presentation_inventory/">Github Page</a>.</strong> {{ trans('adminlte_lang::message.createdby') }} <a href="http://acacha.org/sergitur">Manuel Blanch Garzon</a>. {{ trans('adminlte_lang::message.seecode') }} <a href="https://github.com/manuelblanch/inventory_test">Github</a>
                    <br/>
                    AdminLTE {{ trans('adminlte_lang::message.createdby') }} Abdullah Almsaeed <a href="https://almsaeedstudio.com/">almsaeedstudio.com</a>
                    <br/>
                    Spot – Freelance & Agency Theme {{ trans('adminlte_lang::message.createdby') }} <a href="http://blacktie.co/2013/10/spot-freelance-agency-theme/">BLACKTIE.CO</a>
                </p>

            </div>
        </div>
    </footer>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ mix('/js/app-landing.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
