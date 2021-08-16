

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
              <h1>Roles</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item active">Roles</li>
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
          <div class="row">
            <div class="col-12">
              
              <!-- /.card -->
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Liste de Rôles</h3>

                  <div class="card-tools">
                    <a href="{{ route('role.create') }}" class="btn bg-gradient-primary"><i class="fas fa-plus-circle"></i> Créer Rôle</a>
                  </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
              
                  <table  class="table table-bordered table-striped" style="font-size: 15px">
                    <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Opérations</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($roles as $role )
                    <tr>
                     
                        <td>{{ $role->name }}</td>
                        <td>
                          {{-- <a href="{{ route('role.edit', $role->id) }}" title="Modifier" ><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></button></a> --}}
                     
                          <a href="#"  data-toggle="modal" data-target="#ModalDelete{{$role->id}}" >
                            <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"  ></i></button>
                          </a>
  
                          {!! Form::open(['method' => 'DELETE','route' => ['role.destroy', $role->id],'style'=>'display:inline']) !!}
  
                            <div class="modal fade" id="ModalDelete{{$role->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
      
                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                      <span aria-hidden="true"></span>
                                    </button>
                                  </div>
                    
                                <div class="modal-body">Vous êtes sûr de vouloir supprimer ?</div>
                                <div class="modal-footer">
                                  <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{__('Annuler')}}</button>
                                  <button type="submit" class="btn  btn-outline-danger">{{__('Supprimer')}}</button>
                                </div>
                                </div>
                              </div> 
                            </div>
  
                          {!! Form::close() !!}
                        </td>
                                      
                      </td>
                     
                    </tr>
                    @empty
                    <tr>Pas de resultats</tr>
                    @endforelse
                  
                     
                    </tbody>
                    
                  </table>
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
  <style>
    .btn-disabled,
    .btn-disabled[disabled] {
      opacity: .4;
      cursor: default !important;
      pointer-events: none;
    }
  </style>
@include('layouts.tableFooter')

@if(Session::has('permission-add'))
   <script>
       toastr.success("{!!Session::get('permission-add')!!}");
   </script>
@endif

@if(Session::has('role-delete'))
   <script>
       toastr.success("{!!Session::get('role-delete')!!}");
   </script>
@endif

</body>
</html>

<!-- ./wrapper -->

