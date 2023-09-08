<div class="w-1/2 rounded-lg bg-white inline-block p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700"
style="margin: 2% 0 0 25%">
    <form wire:submit="save">
        <div class="relative mb-6" data-te-input-wrapper-init>
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona
                el tipo</label>
            <select id="countries" wire:model="type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                    focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
                <option selected value="Duda">Duda</option>
                <option value="Revisión">Revisión</option>
            </select>
        </div>

        <div class="relative mb-6" data-te-input-wrapper-init>
            <button class="font-bold py-2 px-4 rounded bg-blue-500 text-white float-right" type="submit">
                Solicitar
            </button>
        </div>
        <span wire:loading style="color: cornflowerblue">Solicitando...</span>
    </form>
</div>
