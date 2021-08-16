

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
                  <li class="breadcrumb-item active">Modification</li>
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
              <div class="col-md-8">
                <!-- jquery validation -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title ">Modification</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{route('pages.update', [$page] )}}" method="post" id="formpage">
                                            
                    @csrf
                    @method('PUT')

                    {{-- <input type="hidden" name="_method" value="put"> --}}

                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputNumero1">MMSI</label>
                        <input  name="numero"  class="form-control" value="{{ old('numero', $page->numero ) }}" id="exampleInputNumero1" placeholder="Numero">
                      </div>
                      <br>
                      <div class="form-item" >
                        <label for="drapeau" class="control-label">Pavillon</label>
                        <input id="drapeau" type="text" class="form-control" name="flag" value="{{ old('flag' , $page->flag) }}" required placeholder="Pays"
                        style="width: 670px;" >
                        {!! $errors->first('flag', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                     </div>
                     <br>
                      <div class="form-group">
                        <label for="exampleInputNom1">Nom du navire</label>
                        <input type="text" name="nom"  class="form-control" value="{{ old('nom', $page->nom ) }}" id="exampleInputNom1" placeholder="Nom">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputDate1">Date</label>
                        <input type="date" name="date" class="form-control" value="{{ old('date', $page->date ) }}" id="exampleInputDate1" placeholder="Date">
                      </div>
                      <div class="form-group">
                        <select name="thematique_id" class="form-control @error('thematique_id') is-invalid @enderror" 
                        value="{{ old('thematique_id') }}" required autocomplete="thematique_id" autofocus>
                            <option value="none" >Selectionner le Thematique</option>

                            @foreach ($thematiques  as $thematique )
                              @if($thematique->id == $page->thematique_id)
                                  <option value="{{$thematique->id}}" selected>{{$thematique->nom}}</option>
                              @else
                                  <option value="{{$thematique->id}}">{{$thematique->nom}}</option>
                              @endif

                              {{-- <option value="{{$thematique->id}}" selected>{{$thematique->nom}}</option> --}}
                      
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
                        <input type="text" name="objet" class="form-control" value="{{ old('objet', $page->objet ) }}" id="exampleInputObject1" placeholder="Objet">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputLieu1">Lieu</label>
                        <input type="text" name="lieu"  class="form-control" value="{{ old('lieu', $page->lieu ) }}" id="exampleInputLieu1" placeholder="Lieu">
                      </div>

                     

                      <div class="form-group ">
                        <label >Description</label>
                        <textarea class="form-control" rows="5" name="description"   placeholder="description"  style="width: 670px; ">
                          {{ old('description', $page->description ) }}
                        </textarea>
                      </div> 
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude" class="control-label">{{ __('outlet.latitude') }}</label>
                                <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude', $page->latitude) }}" required>
                                {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude" class="control-label">{{ __('outlet.longitude') }}</label>
                                <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude', $page->longitude) }}" required>
                                {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                      </div>
                    <div id="mapid"></div>
                    </div>
                  
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn  bg-gradient-primary"><i class="fas fa-edit"></i>Mofidier</button>
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
    var mapCenter = [{{ $page->latitude }}, {{ $page->longitude }}];
    var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.detail_zoom_level') }});

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



