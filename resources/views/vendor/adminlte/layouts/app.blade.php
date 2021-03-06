<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    <!-- Optional theme -->

    <title></title>
</head>

<body class="skin-blue sidebar-mini">


<div id="app">
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('adminlte::layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.controlsidebar')

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')

    <script src="https://unpkg.com/vue"></script>
    <script>
    var app5 = new Vue({
    el: '#app-5',
    data: {
      message: 'Hello Vue.js!'
    },
    methods: {
      reverseMessage: function () {
        this.message = this.message.split('').reverse().join('')
      }
    }
  })
    </script>


    <script src="{{asset('/plugins/select2/select2.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/plugins/select2/select2.css')}}">
    <script src="{{asset('/plugins/select2/i18n/es.js')}}"></script>

    <script>
    $(document).ready(function() {
      $("#s1").select2();
    });
    </script>

    <script>
    $(document).ready(function() {
      $("#s2").select2();
    });
    </script>

    <script>
    $(document).ready(function() {
      $("#s3").select2();
    });
    </script>

    <script>
    $(document).ready(function() {
      $("#s4").select2();
    });
    </script>

    <script>
    $(document).ready(function() {
      $("#s5").select2();
    });
    </script>

    <script>
    $(document).ready(function() {
      $("#s6").select2();
    });
    </script>

    <link rel="stylesheet" href="{{asset('/plugins/datepicker/datepicker3.css')}}">
    <script src="{{asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('/plugins/datepicker/locales/bootstrap-datepicker.es.js')}}"></script>
    <script>
        $(document).ready(function() {
          //Date picker
          $('#dateEntrance').datepicker({
            autoclose: true,
            language: "es",
            format: 'yyyy-mm-dd'
          });
          $('#lastUpdate').datepicker({
            autoclose: true,
            language: "es",
            format: 'yyyy-mm-dd'
          });
          $('#from').datepicker({
            autoclose: true,
            language: "es",
            format: 'yyyy/mm/dd'
          });
          $('#to').datepicker({
            autoclose: true,
            language: "es",
            format: 'yyyy/mm/dd'
          });
      });
  </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>


  <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet">
  <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js')}}"></script>
  <script>
  $(document).ready(function(){

		readProducts(); /* it will load products when document loads */

		$(document).on('click', '#delete_product', function(e){

			var productId = $(this).data('id');
			SwalDelete(productId);
			e.preventDefault();
		});

	});

	function SwalDelete(productId){

		swal({
			title: 'Estas Segur?',
			text: "El producte sera esborrat de manera definitiva!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true,

			preConfirm: function() {
			  return new Promise(function(resolve) {

			     $.ajax({
			   		url: 'resources/views/manteniments/location/delete.php',
			    	type: 'POST',
			       	data: 'delete='+productId,
			       	dataType: 'json'
			     })
			     .done(function(response){
			     	swal('Deleted!', response.message, response.status);
					readProducts();
			     })
			     .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false
		});

	}

	function readProducts(){
		$('#load-products').load('resources/views/manteniments/location/index.blade.php');
	}
  </script>

  <script>

  $('#aler').click(function(){

  swal({
  title: 'Esborrat',
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: ''
}).then((result) => {
  if (result.value) {
    swal(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
});
});

</script>

  <script>

  $('#alert').click(function(){
    swal({position: 'center',
          type: 'success',
          title: 'Has introduit una nova localització',
          showConfirmButton: true,
          timer: 3000
  });
});
  </script>

  <script>

  $('#alert2').click(function(){
    swal({position: 'center',
          type: 'success',
          title: 'Has introduit un nou proveidor',
          showConfirmButton: false,
          timer: 3000

  });
  });

  </script>

  <script>

  $('#alert3').click(function(){
    swal({position: 'center',
          type: 'success',
          title: 'Has introduit un nou objecte en inventari',
          showConfirmButton: false,
          timer: 3000

  });
  });

  </script>

  <script>

  $('#alert4').click(function(){
    swal({position: 'center',
          type: 'success',
          title: 'Has introduit un nou tipus de material',
          showConfirmButton: false,
          timer: 3000

  });
  });

  </script>

  <script>

  $('#alert5').click(function(){
    swal({position: 'center',
          type: 'success',
          title: 'Has introduit una nova marca',
          showConfirmButton: false,
          timer: 3000

  });
  });

  </script>

  <script>

  $('#alert6').click(function(){
    swal({position: 'center',
          type: 'success',
          title: 'Has introduit un nou model de marca',
          showConfirmButton: false,
          timer: 3000

  });
  });

  </script>

  <script>

  $('#alert7').click(function(){
    swal({position: 'center',
          type: 'success',
          title: 'Has introduit una nova procedencia monetaria',
          showConfirmButton: false,
          timer: 3000

  });
  });

  </script>

  <script>

  $('#edit1').click(function(){
    swal({position: 'center',
          type: 'success',
          title: 'Has editat un objecte de inventari'
          showConfirmButton: false,
          timer: 3000
        });
  });

  </script>

  <script>

  $('#edit2').click(function(){
    swal({position: 'center',
          type: 'success',
          title: 'Has editat un objecte de inventari'
          showConfirmButton: false,
          timer: 3000
        });
  });

  </script>

  <script>

  $('#alert8').click(function(){
    swal({position: 'top',
          type: 'success',
          title: 'Accedint a la introduccio de dades a la procedencia monetaria',
          showConfirmButton: false,
          timer: 3000

  });
  });

  </script>

  <script>

  $('#alert7').click(function(){
    swal({position: 'center',
          type: 'success',
          title: 'Has introduit una nova procedencia monetaria',
          showConfirmButton: false,
          timer: 3000

  });
  });

  </script>

  <script>

  $('#busqueda').click(function(){
    swal({title: 'Buscant informació en la base de dades',
          text: '...',
          type: 'success',
          showConfirmButton: false,
          timer: 1200

  });
  });

  </script>

<script>

  $('#acces1').click(function(){
    swal({position: 'top',
          type: 'success',
          title: 'Accedint a la pagina de introducció de dades a inventari',
          showConfirmButton: false,
          timer: 3000

  });
  });

</script>

<script>

  $('#acces2').click(function(){
    swal({position: 'top',
          type: 'success',
          title: 'Accedint a la pagina de introducció de dades a proveidors',
          showConfirmButton: false,
          timer: 3000

  });
  });

</script>

<script>

  $('#acces3').click(function(){
    swal({position: 'top',
          type: 'success',
          title: 'Accedint a la pagina de introducció de dades a localització',
          showConfirmButton: false,
          timer: 3000

  });
  });

</script>

<script>

  $('#acces4').click(function(){
    swal({position: 'top',
          type: 'success',
          title: 'Accedint a la pagina de introducció de dades a tipus de material',
          showConfirmButton: false,
          timer: 3000

  });
  });

</script>

<script>

  $('#acces5').click(function(){
    swal({position: 'top',
          type: 'success',
          title: 'Accedint a la pagina de introducció de dades de les marques',
          showConfirmButton: false,
          timer: 3000

  });
  });

</script>

<script>

  $('#acces6').click(function(){
    swal({position: 'top',
          type: 'success',
          title: 'Accedint a la pagina de introducció de dades del model de les marques',
          showConfirmButton: false,
          timer: 3000

  });
  });

</script>

<script>

  $('#export1').click(function(){
    swal({position: 'top',
          type: 'success',
          title: 'Exportant informació a format pdf',
          showConfirmButton: false,
          timer: 3000

  });
  });

</script>

<script>

  $('#export2').click(function(){
    swal({position: 'top',
          type: 'success',
          title: 'Exportant informació a format excel',
          showConfirmButton: false,
          timer: 3000

  });
  });

</script>

@show
@isset($calendar_details)
          {!! $calendar_details->script() !!}
@endisset

@shown

</body>
</html>
