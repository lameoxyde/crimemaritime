
<!DOCTYPE html>
<html lang="en">
<head>
  
  @include('layouts.formHeader')


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper" id="app">
    
    @include('layouts.navbar')

    @include('layouts.sidebar')
    
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item ">Criminalités maritimes</li>
                <li class="breadcrumb-item active">Importer</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
            @include('partials.alert')
            @yield('content')
        </div><!-- /.container-fluid -->
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <!-- left column -->
            <div class="col-md-8">
              <div class="alert alert-info">
                <i class="fa fa-info-circle"></i>
                <strong>Information</strong>
                <br>
                <p>Changer le nom du thématique dans le CSV comme le code suivant:</p>
                <ul>
                  <li>Migration irrégulière et trafic d’êtres humains par voie maritime : <strong>1</strong></li>
                  <li> Actes violents en mer (AVM) : <strong>2</strong></li>
                  <li>Pèche illégale, non reportée et non règlementée : <strong>3</strong></li>
                  <li>Trafics d’armes, de drogues et contrebande : <strong>4</strong></li>
                  <li>Cybercriminalité maritime : <strong>5</strong></li>
                </ul>
              </div>
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Importation de données</h3>
                  
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body" >
                  <form action="{{route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="delimiter">Délimiteur</label>
                    <select name="delimiter" id="delimiter" class="form-control">
                        <option value=";">Point virgule (;)</option>
                        <option value=",">Virgule (,)</option>
                    </select>
                    <br>
                    <label for="fileimp">Fichier *.csv</label>
                    <input type="file" name="file" id="fileimp" class="form-control">
                    <br>

                    <div class="card-footer">
                      <button type="submit" class="btn  bg-gradient-primary"><i class="fas fa-save"></i> Sauvegarder</button>
                    </div>
                  </form>
                </div>
                  
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


   
</body>
</html>
