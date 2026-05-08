<x-guest-layout>
    <h1 class="titulo-login" style="font-size: 2.2rem;" data-i18n="register.titulo">REGISTRO</h1>
    
    <p class="texto-login" data-i18n="register.subtitulo">Únete a la academia para comenzar tu entrenamiento</p>

    <form method="POST" action="{{ route('register') }}" class="formulario-auth">
        @csrf

        <div class="grupo-input">
            <label for="name" data-i18n="register.name">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name') <span class="mensaje-error">{{ $message }}</span> @enderror
        </div>

        <div class="grupo-input">
            <label for="email" data-i18n="register.email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email') <span class="mensaje-error">{{ $message }}</span> @enderror
        </div>

        <div class="grupo-input">
            <label for="password" data-i18n="register.password">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
            @error('password') <span class="mensaje-error">{{ $message }}</span> @enderror
        </div>

        <div class="grupo-input">
            <label for="password_confirmation" data-i18n="register.confirm_password">Confirmar Contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation') <span class="mensaje-error">{{ $message }}</span> @enderror
        </div>

        <div class="botones-login" style="margin-top: 2rem;">
            <button type="submit" class="btn-primario" data-i18n="register.btn_registrar">
                Registrarse
            </button>
        </div>

        <div class="enlace-inferior">
            <a href="{{ route('login') }}" data-i18n="register.already_registered">¿Ya tienes una cuenta? Inicia sesión</a>
        </div>
    </form>
</x-guest-layout>