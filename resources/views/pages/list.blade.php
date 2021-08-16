
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
              <h1>Liste</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item ">Criminalités maritimes</li>
                <li class="breadcrumb-item active">Liste</li>
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
                  <h3 class="card-title">Criminalités maritimes</h3>
                  @hasanyrole('admin|auteur')
                  <div class="card-tools">
                   
                    <div class="btn-group">
                      <div class="btn-group dropleft" role="group">
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="sr-only"></span>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{ route('pages.create') }}"><i class="fas fa-plus"></i>  Ajouter</a>
                          <a class="dropdown-item" href="{{route('upload')}}"><i class="fa fa-file" aria-hidden="true"></i> Importer CSV</a>
                        </div>
                      </div>
                      <button type="button" class="btn btn-primary">
                       Nouveau
                      </button>
                    </div>
                  </div>
                  
                  @endhasanyrole
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="card-body">
                    <form action="{{ route('searchdate') }}" method="POST">
                      @csrf

                      <div class="row justify-content-md-start">
                        <div  style="width:195px; padding-right: 10px;">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Date debut:</label>
          
                            <div class="input-group">
                              <input type="date" name="from" value="{{date('Y-m-d')}}" class="form-control float-right" >
                            </div>
                            <!-- /.input group -->
                          </div>
                        </div>
                        <div style="width:195px;padding-right: 10px;">
                          <div class="form-group">
                            <label>Date fin:</label>
          
                            <div class="input-group">
                              <input type="date" name="to" value="{{date('Y-m-d')}}" class="form-control float-right" >
                            </div>
                            <!-- /.input group -->
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value='view'  name="search" title="rechercher" style="height: 37px; width:40px; margin-top: 31px"><i class="fa fa-search" aria-hidden="true"></i></button>
                      </div>
                    </form>
                    
                    
                    {{-- FORM UPLOAD --}}
                  
  
                    {{-- END FORM UPLOAD --}}
                  </div>
                   
                  
                  <table id="example1" class="table table-bordered table-striped" style="font-size:11px" >
                    
                    <thead>
                    <tr >
                      <th>MMSI </th>
                      <th>Pavillon</th>
                      <th>Nom du navire</th>
                      <th>Thématique</th>
                      <th>Date </th>
                      <th>Objet</th>
                      <th>Lieu</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>Description</th>
                      <th>Opérations</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                      @foreach ($pages as $page )
                      <tr style="font-size:10px">
                        <td>{{$page->numero}}</td>
                        <td data-flag="{{$page->flag}}" class="flags"></td>
                        <td>{{$page->nom}}</td>
                        <td>{{$page->thematique->nom}}</td>
                        <td>{{$page->date}}</td>
                        <td>{{$page->objet}}</td>
                        <td>{{$page->lieu}}</td>
                        <td>{{$page->latitude}}</td>
                        <td>{{$page->longitude}}</td>
                        <td>{{$page->description}}</td>
                        <td>

                          {{-- begin edit --}}

                          @hasanyrole('admin|auteur')
                            <a href="{{route('pages.edit', [$page] )}}"  ><i class="fa fa-edit" aria-hidden="true" style="color:#007bff; padding: 3px;"></i></a>
          
                          @endhasanyrole   
 
            
                          {{-- end edit --}}

                          {{-- begin map --}}

                          <a href="{{route('pages.show', [$page])}}" ><i class="fa fa-map" aria-hidden="true" style="color:#605ca8; padding: 3px;"></i></a>
                          
                          {{-- end map --}}
                         
                          {{-- begin delete --}}
                          @role('admin')
                            <a href="#"  data-toggle="modal" data-target="#ModalDelete{{$page->id}}" >
                              <i class="fa fa-trash" aria-hidden="true"  style="color:#dc3545; padding: 3px; cursor: pointer;"></i>
                            </a>
                          <form action=" {{ route('pages.destroy', [$page]) }}" method="post" style="display:inline-block"  >
                            @method('DELETE')
                            @csrf 
                            {{-- <button  title="Supprimer" style="border: none" ><i class="fa fa-trash" aria-hidden="true"  style="color:#dc3545; padding: 3px; cursor: pointer;"></i></button> --}}

                            <div class="modal fade" id="ModalDelete{{$page->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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

@if(Session::has('status-import'))
   <script>
       toastr.success("{!!Session::get('status-import')!!}");
   </script>
@endif

@if(Session::has('status-delete'))
   <script>
       toastr.success("{!!Session::get('status-delete')!!}");
   </script>
@endif
  <script>
    $('.flags').each(function(){
      var tflag = $(this).data('flag');
      var flag = tflag.split(' (')[0];
      let self = this;
      $.get('https://restcountries.eu/rest/v2/name/'+flag+'?fullText=true', function(resp){
        $(self).html('<img src="'+resp[0].flag+'" width="16"> '+flag);
      });
    });
  </script>

</body>  
</html>





