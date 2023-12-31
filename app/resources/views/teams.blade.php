<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>
    <div class="flex flex-row gap-4 py-12">
        <div class="py-12 w-50vw">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">
                        <h2 class="py-6 text-gray-200 ">{{ __('Ajouter une team') }}</h2>
                        <form action="{{ route('teams.createTeam') }}" method="POST">
                            @csrf
                            <div class='flex flex-col w-1/2'>
                                <label class='dark:text-gray-100' for="team">Nom de l'équipe</label>
                                <input value="{{ old('team') }}" type="text" name="team" id="team"
                                    class='w-50 dark:bg-gray-800 dark:text-gray-100'>
                                @error('team')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12 w-full">
            @if ($teams)
                @foreach ($teams as $item)
                    <div class="w-1/2 mb-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-row justify-between w-full">
                            <div class='overflow-hidden'>
                                <p>TEAM</p>
                                <p>{{ $item->name }}</p>
                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <div class="mb-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __('Aucune Team') }}

                    </div>
                </div>
            @endif
        </div>
    </div>


</x-app-layout>
