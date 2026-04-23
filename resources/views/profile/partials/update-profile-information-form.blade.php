<section>
    <header>
        <h2 class="text-lg font-medium text-white">
            Información del Perfil
        </h2>
        <p class="mt-1 text-sm text-gray-300">
            Actualiza la información de tu cuenta y tu dirección de correo electrónico.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block font-medium text-sm text-white">Nombre</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black focus:border-blue-500 focus:ring-blue-500" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-red-500" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block font-medium text-sm text-white">Correo Electrónico</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black focus:border-blue-500 focus:ring-blue-500" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="mt-2 text-red-500" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                GUARDAR
            </button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-green-400 font-bold">¡Guardado correctamente!</p>
            @endif
        </div>
    </form>
</section>