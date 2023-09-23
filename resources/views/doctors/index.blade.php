@extends("layouts.app")

@section("content")

    <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h2 class="flex justify-items-start mb-2 text-3xl font-bold text-gray-900 dark:text-white">Doctors</h2>

        <div class="items-center justify-items-start space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
            <a href="{{route('doctors.create')}}" class="h-8 flex items-center px-4 font-bold text-white bg-indigo-600 rounded-lg hover:bg-indigo-500 focus:bg-indigo-700">Cadastrar novo Médico</a>
        </div>

        <div class="items-center justify-items-start space-y-4 sm:flex sm:space-y-0 sm:space-x-4 mt-3">
            <form action="{{ route('doctors.search') }}" method="post">
                @csrf
                <div class="relative text-gray-700">
                    <input class="w-full h-8 pl-3 pr-8 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" name="search" placeholder="CRM ou Nome"/>
                    <button class="absolute inset-y-0 right-0 flex items-center px-4 font-bold text-white bg-indigo-600 rounded-r-lg hover:bg-indigo-500 focus:bg-indigo-700">Pesquisar</button>
                </div>
            </form>
        </div>

        <div class="mt-3">
            @if(session('message'))
                <div class="flex items-center p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-blue-800 dark:text-gray-300" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        {{session('message')}}
                    </div>
                </div>
            @endif
        </div>

        <div class="items-center justify-items-start space-y-4 sm:flex sm:space-y-0 sm:space-x-4 mt-3">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nome</th>
                        <th scope="col" class="px-6 py-3">CRM</th>
                        <th scope="col" class="px-6 py-3">Ver Detalhes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($doctors as $doctor)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{$doctor->name}}</td>
                            <td class="px-6 py-4">{{$doctor->crm}}</td>
                            <td class="px-6 py-4 text-center"><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('doctors.show', $doctor->id) }}">Info</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $doctors->links() }}
            </div>
        </div>
    </div>
@endsection


