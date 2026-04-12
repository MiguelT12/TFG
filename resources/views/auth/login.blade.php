<x-guest-layout>
    @if (session('status'))
        <div style="color: #10b981; margin-bottom: 1.5rem; font-weight: bold; text-align: center;">
            {{ session('status') }}
        </div>
    @endif

    <h1 class="titulo-login" style="font-size: 2.2rem;">INICIAR SESIÓN</h1>
    
    <p class="texto-login">Accede a tu cuenta para continuar tu entrenamiento</p>

    <form method="POST" action="{{ route('login') }}" class="formulario-auth">
        @csrf

        <div class="grupo-input">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email') <span class="mensaje-error">{{ $message }}</span> @enderror
        </div>

        <div class="grupo-input">
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            @error('password') <span class="mensaje-error">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; align-items: center; margin-bottom: 1.5rem;">
            <input id="remember_me" type="checkbox" name="remember" style="width: auto; margin-right: 0.5rem; cursor: pointer;">
            <label for="remember_me" style="color: #94a3b8; font-size: 0.9rem; cursor: pointer; text-transform: none; margin-bottom: 0;">Recuérdame</label>
        </div>

        <div class="botones-login">
            <button type="submit" class="btn-primario">
                Entrar
            </button>
        </div>

        <div class="enlace-inferior" style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 0.5rem;">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            @endif
            <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
        </div>
    </form>
</x-guest-layout>