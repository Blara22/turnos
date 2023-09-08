<div class="grid grid-cols-2 gap-4 p-20">
    <div class="flex flex-col">
        <h1 class="text-center text-3xl text-blue-700 mb-6"><strong>Dudas</strong></h1>
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light bg-white">
                        <thead class="border-b font-medium">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Alumno</th>
                            <th scope="col" class="px-6 py-4">Estatus</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($doubts as $doubt)
                            <tr class="border-b">
                                <td class="whitespace-nowrap px-6 py-4">{{$loop->iteration}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$doubt->user->name}}</td>
                                <td>
                                    @if(Auth::user()->hasTeamPermission(Auth::user()->currentTeam, 'turns:markAsRead'))
                                        <button wire:click="markAsAttended({{$doubt->id}})"
                                                {{$doubt->attended ? 'disabled' : ''}}
                                                class="{{$doubt->attended ? 'bg-green-500' : 'bg-blue-500'}} font-bold py-2 px-4 rounded text-white">
                                            Atendido
                                        </button>
                                    @else
                                        <span
                                            class="{{!$doubt->attended ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800'}} text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                                            {{$doubt->attended ? 'Atendido' : 'No atendido'}}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <h1 class="text-center text-3xl text-blue-700 mb-6"><strong>Revisiones</strong></h1>
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light bg-white">
                        <thead class="border-b font-medium">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Alumno</th>
                            <th scope="col" class="px-6 py-4">Estatus</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($revisions as $revision)
                            <tr class="border-b">
                                <td class="whitespace-nowrap px-6 py-4">{{$loop->iteration}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$revision->user->name}}</td>
                                <td>
                                    @if(Auth::user()->hasTeamPermission(Auth::user()->currentTeam, 'turns:markAsRead'))
                                        <button wire:click="markAsAttended({{$revision->id}})"
                                                {{$revision->attended ? 'disabled' : ''}}
                                                class="{{$revision->attended ? 'bg-green-500' : 'bg-blue-500'}} font-bold py-2 px-4 rounded text-white">
                                            Atendido
                                        </button>
                                    @else
                                        <span
                                            class="{{!$revision->attended ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800'}} text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                                            {{$revision->attended ? 'Atendido' : 'No atendido'}}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
