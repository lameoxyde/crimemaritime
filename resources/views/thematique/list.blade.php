

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
              <h1>Thématiques</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item "> Thématiques</li>
                <li class="breadcrumb-item active">Liste Thématiques</li>
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
          <div class="row">
            <div class="col-12">
              
              <!-- /.card -->
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Liste </h3>
                  @hasanyrole('admin|auteur')
                  <div class="card-tools">
                    <a href="{{ route('thematique.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nouveau</a>
                  </div>
                  @endhasanyrole
                </div>
               
                <div class="card-body">
              
                  <table class="table table-bordered table-striped" style="font-size: 15px">
                    <thead>
                    <tr>
                      <th>Nom</th>
                      @hasanyrole('admin|auteur') 
                      <th>Opérations</th>
                      @endhasanyrole
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($thematiques  as $thema)
                    <tr>
                     
                      <td>{{$thema->nom}}</td>
                      <td >
                        {{-- begin edit --}}

                        @hasanyrole('admin|auteur') 
                            <a href="{{route('thematique.edit', [$thema] )}}" title="Modifier" ><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
    
                        @endhasanyrole
                       
                     
                        {{-- end edit --}}

                        {{-- begin delete --}}
                        @role('admin')
                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalDelete{{$thema->id}}" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></a>

                        <form action=" {{ route('thematique.destroy', [$thema]) }}" method="POST" style="display:inline-block">
                            @method('DELETE')
                            @csrf
                           
                            <div class="modal fade" id="ModalDelete{{$thema->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                   
                                     <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                     
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
                        </form>
            
                       @endrole
                     

                        {{-- end delete --}}
  
                       
                      
                      </td>
                     
                    </tr>
                    @endforeach
                  
                     
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

@if(Session::has('status-add'))
   <script>
       toastr.success("{!!Session::get('status-add')!!}");
   </script>
@endif

@if(Session::has('status-edit'))
   <script>
       toastr.success("{!!Session::get('status-edit')!!}");
   </script>
@endif

@if(Session::has('status-delete'))
   <script>
       toastr.success("{!!Session::get('status-delete')!!}");
   </script>
@endif
</body>
</html>

<!-- ./wrapper -->

