<x-guest-layout>
    <div class="text-center mb-4">
        <h3 class="box-title m-b-0">Registro</h3>
        <small>Crea tu cuenta gratis</small>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="form-control" placeholder="Nombre completo">
            <x-input-error :messages="$errors->get('name')" class="text-danger small mt-1" />
        </div>

        <!-- Email Address -->
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" class="form-control" placeholder="Email">
            <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
        </div>

        <!-- Password -->
        <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control" placeholder="Contraseña">
            <x-input-error :messages="$errors->get('password')" class="text-danger small mt-1" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control" placeholder="Confirmar Contraseña">
            <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger small mt-1" />
        </div>

        <div class="d-grid gap-2 mb-3">
            <button type="submit" class="btn btn-info text-white btn-lg btn-block text-uppercase waves-effect waves-light">
                Registrarse
            </button>
        </div>

        <div class="text-center">
            <a class="small text-muted" href="{{ route('login') }}">
                ¿Ya tienes cuenta? Ingresa aquí
            </a>
        </div>
    </form>
</x-guest-layout>
