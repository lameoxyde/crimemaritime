

<!DOCTYPE html>
<html lang="en">
<head>
  
  @include('layouts.tableHeader')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
   
       
    @include('layouts.navbar')

    @include('layouts.sidebar')
    <div class="content-wrapper" id="app">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Permission</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item active">Permissions</li>
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
      <div class="content">
        <div class="container-fluid">
            @include('partials.alert')
            @yield('content')
        </div><!-- /.container-fluid -->
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              
              <!-- /.card -->
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Lites de Permissions</h3>

                  <div class="card-tools">
                    <a href="{{ route('permission.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Créer Permission</a>
                  </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
              
                  <table  class="table table-bordered table-striped" style="font-size: 15px">
                    <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Date de création</th>
                      <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($permissions as $permission)
                    <tr>
                     
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->created_at }}</td>
                      <td >
                        {{-- begin edit --}}

                   
                        <a href="{{ route('permission.edit', $permission->id) }}" title="Modifier" ><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                     
          
                        <a href="#"  data-toggle="modal" data-target="#ModalDelete{{$permission->id}}" >
                          <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"  ></i></button>
                        </a>

                        {!! Form::open(['method' => 'DELETE','route' => ['permission.destroy', $permission->id],'style'=>'display:inline']) !!}

                          <div class="modal fade" id="ModalDelete{{$permission->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                     
                    </tr>
                    @empty
                    <tr>Pas de resultats</tr>
                    @endforelse
                  
                     
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Nom</th>
                      <th>Date de création</th>
                      <th>Operations</th>
                    </tr>
                    </tfoot>
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

@if(Session::has('permission-edit'))
   <script>
       toastr.success("{!!Session::get('permission-edit')!!}");
   </script>
@endif

@if(Session::has('permission-delete'))
   <script>
       toastr.success("{!!Session::get('permission-delete')!!}");
   </script>
@endif

</body>
</html>

<!-- ./wrapper -->

