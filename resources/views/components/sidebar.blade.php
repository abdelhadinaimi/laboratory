       <li class="{{ $active ==  'Dashboard' ? 'active':''}}">
        <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

         <li class="{{ $active ==  'Equipes' ? 'active':''}}">
          <a href="{{url('equipes')}}">
            <i class="fa fa-group"></i> 
            <span>Equipes</span>
          </a>
        </li>
        
        <li class="treeview {{ $active ==  'Membres' ? 'active':''}}">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>

        <li class="{{ $active ==  'Thèses' ? 'active':''}}">
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>


        <li class="{{ $active ==  'Articles' ? 'active':''}}">
          <a href="{{url('articles')}}">
            <i class="fa fa-newspaper-o"></i> 
            <span>Articles</span></a>
        </li>

       
        <li class="{{ $active ==  'Projets' ? 'active':''}}">
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>

        <li class="{{ $active ==  'Actualites' ? 'active':''}}">
          <a href="{{url('actualites')}}">
            <i class="fa fa-newspaper-o"></i> 
            <span>Actualites</span>
          </a>
        </li>

        @if(Auth::user()->role->nom == 'admin' )
          <li class="{{ $active ==  'Materiels' ? 'active':''}}">
          <a href="{{url('materiels')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Materiels</span>
          </a>
        </li>
      @endif
        
          @if(Auth::user()->role->nom == 'admin' )

          <li class="{{ $active ==  'Paramètres' ? 'active':''}}">
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Paramètres</span></a>
          </li>
          @endif
