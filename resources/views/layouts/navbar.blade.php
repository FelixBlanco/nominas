<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="{{ url('/') }}">
		{{ config('app.name', 'Laravel') }}
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">

			@guest
				<li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
				<li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
			@else
				
				<a href="{{route('empleados.index')}}" class="nav-item nav-link">Empleados</a>
				<a href="{{route('producto-precio')}}" class="nav-item nav-link">Producto & Precio</a>
				<a href="{{route('bancos')}}" class="nav-link nav-item">Bancos</a>
				<a href="{{route('cuenta')}}" class="nav-item nav-link">Cuenta</a>
				<a href="{{route('cargar')}}" class="nav-item nav-link">Cargar</a>
				<a href="#" class="nav-item nav-link">{{ Auth::user()->name }}</a>
				<a class="nav-item nav-link" href="{{ route('logout') }}"
				   onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();">
					Salir
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			@endguest

		</div>
	</div>
</nav>