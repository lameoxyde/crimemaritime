

<!DOCTYPE html>
<html lang="en">
<head>
  
  @include('layouts.formHeader')
<link rel="stylesheet" href="{{asset('dist/css/countrySelect.min.css')}}">

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
                <li class="breadcrumb-item active">Nouveau</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="content">
          <div class="container-fluid">
              @include('partials.alert')
              @yield('content')
          </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">
          <div class="row justify-content-md-center">
            <!-- left column -->
            <div class="col-md-8">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title ">Nouveau criminalité maritime</h3>
                  <div class="card-tools">
                    
                  </div></div>
                <!-- /.card-header -->
                <!-- form start -->
                 <form action="{{ route('pages.store') }}" method="POST" id="formpage" >
                 
                  @csrf
                  <div class="card-body" >
                      <div class="form-group">
                        <label for="exampleInputNumero1">MMSI</label>
                        <input  name="numero"  class="form-control @error('numero') is-invalid @enderror" 
                        id="exampleInputNumero1"
                         placeholder=""
                         value="{{ old('numero') }}" required autocomplete="numero" autofocus>
                         @error('numero')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                      </div>
                      <br>
                      <div class="form-item" >
                          <label for="drapeau" class="control-label">Pavillon</label>
                          <input id="drapeau" type="text" class="form-control" name="flag" value="{{ old('flag') }}" required placeholder="Pays"
                          style="width: 670px;" >
                          {!! $errors->first('flag', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                       </div>
                       <br>
                      <div class="form-group">
                        <label for="exampleInputNom1">Nom du navire</label>
                        <input type="text" name="nom"  class="form-control @error('nom') is-invalid @enderror" 
                        id="exampleInputNom1" 
                        placeholder=""
                        value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                        @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputDate1">Date</label>
                        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" 
                        id="exampleInputDate1"
                         placeholder="Date"
                         value="{{ old('date') }}" required autocomplete="date" autofocus>
                         @error('date')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                      </div>
                      <div class="form-group">
                      <label for="thematique_id">Thématique</label>
                        <select name="thematique_id" class="form-control @error('thematique_id') is-invalid @enderror" 
                        value="{{ old('thematique_id') }}" required autocomplete="thematique_id" autofocus>
                            <option value="none" >Selectionner le Thématique</option>
                            @foreach ($thematiques  as $thematique )
                                 <option value="{{$thematique->id}}">{{$thematique->nom}}</option>
                            @endforeach
                          
                        </select>
                        @error('thematique_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputObject1">Objet</label>
                        <input type="text" name="objet" class="form-control @error('objet') is-invalid @enderror"
                        id="exampleInputObject1" 
                        placeholder=""
                        value="{{ old('objet') }}" required autocomplete="objet" autofocus>
                        @error('objet')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                      </div>
                        
                      <div class="form-group">
                        <label for="exampleInputLieu1">Lieu</label>
                        <input type="text" name="lieu"  class="form-control @error('lieu') is-invalid @enderror " 
                        id="exampleInputLieu1" 
                        placeholder=""
                        value="{{ old('lieu') }}" required autocomplete="lieu" autofocus>
                        @error('lieu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                      </div>
             
                     
                    
                       
                        
                   
                      <div class="form-group ">
                        <label >Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                        rows="5" name="description"   
                        placeholder=""  
                        style="width: 670px;"
                        required autocomplete="description" autofocus>
                        {{ old('description') }}
                         </textarea>
                         @error('description')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                      </div> 
                       
                      {{-- Input emplecement --}}
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude" class="control-label">Latitude</label>
                                <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude', request('latitude')) }}" required>
                                {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude" class="control-label">Longitude</label>
                                <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude', request('longitude')) }}" required>
                                {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                     </div>
                    <div id="mapid"></div>
                      {{-- en input emplecement --}}
                    </div>
                 
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn  bg-gradient-primary"><i class="fas fa-save"></i> Sauvegarder</button>
                  </div>
                </form>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('dist/js/countrySelect.min.js')}}"></script>


<script type="text/javascript">
  $("#drapeau").countrySelect({
    defaultCountry:"mg"
  });

</script>


<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script>
    var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }}, {{ request('longitude', config('leaflet.map_center_longitude')) }}];
    var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Votre emplacement :  " + marker.getLatLng().toString())
        .openPopup();
        return false;
    };

    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude, longitude);
    });

    var updateMarkerByInputs = function() {
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
</script>   






</body>
</html>



