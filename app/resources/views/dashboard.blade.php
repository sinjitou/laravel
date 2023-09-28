<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mon espace') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            @if ($passwords)
                @foreach ($passwords as $item)
                    <div class="mb-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-row justify-between w-full">
                            <div class='overflow-hidden'>
                                <p>Site</p>
                                <p>{{ $item->site }}</p>
                            </div>
                            <div class='overflow-hidden'>
                                <p>login</p>
                                <p>{{ $item->login }}</p>
                            </div>
                            <a href="/editpassword/{{ $item->id }}" class='overflow-hidden'>
                                <p>Mot de passe</p>
                                <p>{{ str_repeat('*', strlen($item->password)) }}</p>
                            </a>

                        </div>
                    </div>
                @endforeach
            @else
                <div class="mb-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __('Aucun mot de passe enregistré') }}

                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
