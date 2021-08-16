

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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
             
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item ">Mon compte</li>
                <li class="breadcrumb-item active">Modifier le mot de passe</li>
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
                  <h3 class="card-title ">Changer le mot de passe</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('userPostPassword') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group" style="margin-left: 20px; margin-right: 20px">
                                <label for="newpassword">Entrer le nouveau mot de passe</label>
                                <input type="password" name="newpassword"  id="newpassword" class="form-control @error('newpassword') is-invalid @enderror" value="" required placeholder="Nouveau mot de passe">
                                @error('newpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group" style="margin-left: 20px; margin-right: 20px">
                                <label for="newpassword_confirmation">Confirmer le nouveau mot de passe</label>
                                <input type="password" name="newpassword_confirmation"  id="newpassword_confirmation" class="form-control @error('newpassword_confirmation') is-invalid @enderror" value="" required placeholder="Confirmer le nouveau mot de passe">
                                @error('newpassword_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12" style="margin-left: 20px;">
                            <div class="form-group button">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-lock"></i> Modifier</button>
                                {{--  <a role="button" href="admin/index.html" class="bizwheel-btn theme-2">Login</a>  --}}
                            </div>
                        </div>
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

@if(Session::has('password-edit'))
   <script>
       toastr.success("{!!Session::get('password-edit')!!}");
   </script>
@endif 

</body>
</html>



