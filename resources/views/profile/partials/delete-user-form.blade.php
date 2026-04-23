<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-white">
            Borrar Cuenta
        </h2>
        <p class="mt-1 text-sm text-gray-300">
            Una vez que tu cuenta sea borrada, todos sus recursos y datos serán eliminados permanentemente.
        </p>
    </header>

    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
        BORRAR CUENTA
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-slate-800">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-white">
                ¿Estás seguro de que quieres borrar tu cuenta?
            </h2>

            <p class="mt-1 text-sm text-gray-300">
                Una vez que tu cuenta sea borrada, todos sus recursos y datos serán eliminados permanentemente. Por favor, introduce tu contraseña para confirmar.
            </p>

            <div class="mt-6">
                <label for="password" class="sr-only">Contraseña</label>
                <input id="password" name="password" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black focus:border-red-500 focus:ring-red-500" placeholder="Contraseña" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500" />
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" x-on:click="$dispatch('close')" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    CANCELAR
                </button>

                <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    BORRAR CUENTA
                </button>
            </div>
        </form>
    </x-modal>
</section>