 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="32" length="32">
      <span class="brand-text font-weight-light" >Application</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
              </p>
            </a>
          </li>
          @role('admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Gestion des utilisateurs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{route('role.index')}}" class="nav-link">
                  <i class="fas fa-shield-alt nav-icon"></i>
                  <p>Rôles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>
            </ul>
          </li>
          @endrole

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Mon compte
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a  href="{{route('user.profile')}}" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Mon Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('userGetPassword')}}" class="nav-link">
                  <i class="fas fa-lock  nav-icon"></i>
                  <p>Modifier le mot de passe</p>
                </a>
              </li>
            </ul>
          </li>

  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-trademark"></i>
              <p>
                Thématiques
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @hasanyrole('admin|auteur')
              <li class="nav-item">
                <a  href="{{route('thematique.create')}}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Nouveau </p>
                </a>
              </li>
              @endhasanyrole
              <li class="nav-item">
                <a href="{{route('thematique.index')}}" class="nav-link">
                  <i class="fas fa-table  nav-icon"></i>
                  <p>Liste</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon  fas fa-map-signs"></i>
              <p>
                Criminalités maritimes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @hasanyrole('admin|auteur')
              <li class="nav-item">
                <a  href="{{route('pages.create')}}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Nouveau </p>
                </a>
              </li>
              <li class="nav-item">
                <a  href="{{route('upload')}}" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Importer </p>
                </a>
              </li>
              @endhasanyrole
              <li class="nav-item">
                <a href="{{route('pages.index')}}" class="nav-link">
                  <i class="fas fa-table  nav-icon"></i>
                  <p>Liste</p>
                </a>
              </li>
            </ul>
          </li>
  
            <li class="nav-item">
              <a href="{{route('thematiquechart')}}"  class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Statistiques
                </p>
              </a>
            </li>

        
    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<style>
  .btn-disabled,
  .btn-disabled[disabled] {
    opacity: .4;
    cursor: default !important;
    pointer-events: none;
  }
</style>