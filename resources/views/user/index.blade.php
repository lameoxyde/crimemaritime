

<!DOCTYPE html>
<html lang="en">
<head>
  
  @include('layouts.tableHeader')

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
              <h1>Utilisateur</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item ">Gestion des utilisateurs</li>
                <li class="breadcrumb-item active">Utilisateurs</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              
              <!-- /.card -->
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Liste des utilisateurs</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- component vue user -->
                      <user></user>
                     <!-- end component vue user -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  
  
    <!-- /.control-sidebar -->
  </div>
  </div>
@include('layouts.tableFooter')

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>

<!-- ./wrapper -->

