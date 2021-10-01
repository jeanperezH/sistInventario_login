<nav class="navbar navbar-expand-lg navbar-dark bg-primary" class="nav">
    
    <div class="container">
        <a @click="menu=0" class="navbar-brand " href="#">Inventario de Productos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li @click="menu=1" class="nav-item active">
            <a class="nav-link" href="#"><i class="fas fa-arrow-circle-down" > </i> ENTRADA</a>
        </li>
        <li @click="menu=2" class="nav-item active">
            <a class="nav-link" href="#"><i class="fas fa-arrow-circle-up" > </i> SALIDA</a>
        </li>
        <li @click="menu=3" class="nav-item active">
            <a class="nav-link" href="#"><i class="fas fa-users" > </i> USUARIOS</a>
        </li>
      </ul>
      
      <ul class="nav navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-shield"></i> {{Auth::user()->usuario}}
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </div>
    </div>
</nav>