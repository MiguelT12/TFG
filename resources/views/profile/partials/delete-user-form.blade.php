<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-white">
            Borrar Cuenta
        </h2>
        <p class="mt-1 text-sm text-gray-300">
            Una vez que tu cuenta sea borrada, todos sus recursos y datos serán eliminados permanentemente. Por favor, introduce tu contraseña para confirmar.
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
        @csrf
        @method('delete')

        <div>
            <label for="password" class="sr-only">Contraseña</label>
            <input id="password" name="password" type="password" required class="mt-1 block w-full sm:w-3/4 md:w-1/2 rounded-md border-gray-300 shadow-sm text-black focus:border-red-500 focus:ring-red-500" placeholder="Introduce tu contraseña" />
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500" />
        </div>

        <div class="mt-6">
            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar tu cuenta permanentemente? Esta acción no se puede deshacer.')" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                BORRAR CUENTA
            </button>
        </div>
    </form>
</section>