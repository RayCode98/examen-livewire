<div class="relative overflow-x-auto">

    {{-- Search --}}

    <div class="m-2">
        <input type="text" wire:model.live="search"
            class="w-full px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300"
            placeholder="Search...">
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Apellido
                </th>
                <th scope="col" class="px-6 py-3">
                    Correo
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$user->name}}
                </th>
                <td class="px-6 py-4">
                    {{$user->lastname}}
                </td>
                <td class="px-6 py-4">
                    {{$user->email}}
                </td>
            </tr>
            @empty

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                <td class="px-6 py-4" colspan="3">
                    No se encuentró ningún usuario
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{$search}}
</div>