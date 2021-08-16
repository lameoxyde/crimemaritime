<!DOCTYPE html>
<html lang="en">
<head>
  
  @extends('layouts.header')


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
              <h1 class="m-0">Tableau de bord de l'utilisateur</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item active">Tableau de bord</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
        
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-10 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-map mr-1"></i>
                    Carte
                  </h3>
                
                </div><!-- /.card-header -->
                <div class="card-body">
                 
                    <div class="card-body">
                      <div id="kt_jqvmap_world" class="jqvmap" style="height:600px;"></div>
                    </div>
                  </div>
              
              </div>
            
  
            </section>
           
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  
    @include('layouts.footer')
  </div>
</body>  
</html>

    