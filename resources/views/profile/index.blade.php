

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
                
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item ">Mon compte</li>
                <li class="breadcrumb-item active">Mon profile</li>
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
                  <h3 class="card-title ">Mon Compte</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <section class="content">
                    <div class="">
                        <div class="row">
                            <div class="col-md-3" style="margin: 10px">
                
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                      
                                        <h3 class="profile-username text-center" style="text-transform: uppercase">{{ auth()->user()->name }} </h3>
                                        {{--  <p class="text-muted text-center">{{ auth()->user()->role }}</p>  --}}
                                        <p class="text-muted text-center">{{ auth()->user()->email }}</p>
                                       
                                  
                
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8" style="margin-top: 5px">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Modifier le Profile</h4>
                                    </div>
                                    <div class="card-body">
                                        <div>
                
                                            <div>
                                                <form class="form-horizontal" method="POST" action="{{ route('user.postProfile') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="name">Nom</label>
                                                                <input type="text" name="name"  id="name" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->name }}" required placeholder="Name">
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                
                                                            <div class="form-group">
                                                                <label for="email">Adresse e-mail </label>
                                                                <input type="email" name="email"  id="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}" placeholder="E-mail Address">
                                                                @error('siteemail')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                
                                                            
                
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group button">
                                                                <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Modifier Profile</button>
                                                                {{--  <a role="button" href="admin/index.html" class="bizwheel-btn theme-2">Login</a>  --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
@include('layouts.tableFooter')

@if(Session::has('profile-edit'))
   <script>
       toastr.success("{!!Session::get('profile-edit')!!}");
   </script>
@endif


@if(Session::has('password-edit'))
   <script>
       toastr.success("{!!Session::get('password-edit')!!}");
   </script>
@endif 

</body>
</html>



