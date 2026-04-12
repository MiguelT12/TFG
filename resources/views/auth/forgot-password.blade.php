<x-guest-layout>
    <h1 class="titulo-login" style="font-size: 2.2rem;">RECUPERAR CONTRASEÑA</h1>

    <p class="texto-login" style="font-size: 0.95rem; margin-bottom: 1.5rem;">
        ¿Has olvidado tu contraseña? No hay problema. Indícanos tu email y te enviaremos un enlace para que puedas elegir una nueva.
    </p>

    @if (session('status'))
        <div style="color: #10b981; margin-bottom: 1.5rem; font-weight: bold; text-align: center;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="formulario-auth">
        @csrf

        <div class="grupo-input">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email') <span class="mensaje-error">{{ $message }}</span> @enderror
        </div>

        <div class="botones-login" style="margin-top: 1.5rem;">
            <button type="submit" class="btn-primario">
                Enviar enlace
            </button>
        </div>

        <div class="enlace-inferior">
            <a href="{{ route('login') }}">Volver a Iniciar Sesión</a>
        </div>
    </form>
</x-guest-layout>