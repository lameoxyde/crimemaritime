
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
                <li class="breadcrumb-item ">Thématiques</li>
                <li class="breadcrumb-item active">Nouveau</li>
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
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Nouveau thématiques</h3>
                  
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form  action="{{ route('thematique.store') }}" method="POST" id="addthematique">
                  @csrf
  
                  <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputTH">Nom </label>
                        <input type="text" name="nom"  class="form-control"  placeholder="Nom">
                      </div>
                      
                  </div>
                  <div class="card-footer">
                      <button type="submit" class="btn bg-gradient-primary"><i class="fas fa-save"></i> Sauvegarder</button>
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

   
</body>
</html>
