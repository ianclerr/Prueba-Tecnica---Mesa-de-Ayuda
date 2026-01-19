<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-3 text-success" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus class="form-control" placeholder="user@example.com">
            <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
        </div>

        <!-- Password -->
        <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control" placeholder="Password">
            <x-input-error :messages="$errors->get('password')" class="text-danger small mt-1" />
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-info text-white btn-lg btn-block text-uppercase waves-effect waves-light">
                Iniciar Sesión
            </button>
        </div>
    </form>
</x-guest-layout>
