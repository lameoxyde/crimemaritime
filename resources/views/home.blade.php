

<!DOCTYPE html>
<html lang="en">
<head>
  
  @include('layouts.formHeader')

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
  integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
  crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

    <style>
      #mapid { height: 670px; }
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
              <div class="col-sm-6">
                <h1 class="m-0">Tableau de bord </h1>
              </div><!-- /.col -->
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
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

          <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-exclamation-triangle"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Criminalités maritimes</span>
                  <span class="info-box-number">
                    {{$pages}}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
  
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
  
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-trademark"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Thématiques</span>
                  <span class="info-box-number">{{$thematiques}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Utilisateurs</span>
                  <span class="info-box-number">{{ $users}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          @role('admin')
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Status Utilisateurs</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                  <tr>
                    <th>Nom</th>
                    <th>E-mail</th>
                    <th>Status</th>
                    <th>Dernière action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($user as $us)
                  <tr>
                    <td><a>{{$us->name}}</a></td>
                    <td>{{$us->email}}</td>
                    <td>
                      @if(Cache::has('user-is-online-' . $us->id))
                      <span class="badge badge-success">Actif</span>
                      @else
                      <span class="badge badge-danger">Inactif</span>
                      @endif
                    </td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">{{ Carbon\Carbon::parse($us->seen)->diffForHumans()}}</div>
                    </td>
                  </tr>
                  @endforeach
                  
               
                
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            
            <div class="card-footer clearfix">
              <a href="{{route('user.index')}}" class="btn btn-sm btn-secondary float-right">Voir tous</a>
            </div>
            @endrole
            <!-- /.card-footer -->
          </div>
         
          <div class="row">
            <!-- Globle Map -->
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-map mr-1"></i>
                    Carte
                  </h3>
                
                </div><!-- /.card-header -->    
                <div class="card">
                  <div class="card-body" id="mapid"></div>
                 </div>               
              </div>
             
  
            </section>
      
            {{-- End Globle Map --}}
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
  <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script>
    var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level_map') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    var markers = L.markerClusterGroup();

    axios.get('{{ route('api.localiser.index') }}')
    .then(function (response) {
      console.log(response);
        var marker = L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng) {
                return L.marker(latlng).bindPopup(function (layer) {
                    return layer.feature.properties.map_popup_content;
                });
            }
        });
        markers.addLayer(marker);
        console.log(marker);

    })
    .catch(function (error) {
        console.log(error);
    });
    map.addLayer(markers);

    var theMarker;

    @hasanyrole('admin|auteur')
    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);

        if (theMarker != undefined) {
            map.removeLayer(theMarker);
        };
           
      
        var popupContent = "Votre emplacement : " + latitude + ", " + longitude + ".";
        popupContent += '<br><a href="{{ route('pages.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Ajouter nouveau Emplencement ici</a>';
       

        theMarker = L.marker([latitude, longitude]).addTo(map);
        theMarker.bindPopup(popupContent)
        .openPopup();
    });
    @endhasanyrole

</script>

   
</body>
</html>



