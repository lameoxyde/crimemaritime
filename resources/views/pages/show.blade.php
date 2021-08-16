

<!DOCTYPE html>
<html lang="en">
<head>
  
  @include('layouts.formHeader')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
  integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
  crossorigin=""/>

<style>
  #mapid { height: 400px; }
</style>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper" id="app">
   
    @include('layouts.navbar')

    @include('layouts.sidebar')
 
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
             
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item ">Criminalités maritimes</li>
                <li class="breadcrumb-item ">Liste</li>
                <li class="breadcrumb-item active">Localisation</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
            @include('partials.alert')
            @yield('content')
        </div><!-- /.container-fluid -->
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-md-center">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title ">Localisation {{$page->lieu}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card">
                    @if ($page->coordinate)
                    <div class="card-body" id="mapid"></div>
                    @else
                    <div class="card-body">{{ __('page.no_coordinate') }}</div>
                    @endif
                </div>
              </div>
              <!-- /.card -->
              </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
  
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>

</div>
@include('layouts.formFooter')


<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ $page->latitude }}, {{ $page->longitude }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $page->latitude }}, {{ $page->longitude }}]).addTo(map)
        .bindPopup('{!! $page->map_popup_content !!}');
</script> 

</body>
</html>



