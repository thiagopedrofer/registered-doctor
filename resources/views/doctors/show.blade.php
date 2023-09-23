@extends("layouts.app")

@section("content")

    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Detalhes do Dr.(a){{ $doctor->name }}</h5>
        <ul role="list" class="space-y-5 my-7">
            <li class="flex space-x-3 items-center">
                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400"><strong>Nome: </strong>{{ $doctor->name }}</span>
            </li>
            <li class="flex space-x-3">
                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400"><strong>CRM: </strong>{{ $doctor->crm }}</span>
            </li>
            <li class="flex space-x-3">
                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400"><strong>Telefone: </strong>{{ $doctor->phone }}</span>
            </li>
            <li class="flex space-x-3">
                <span class="text-base font-normal leading-tight text-gray-500"><strong>CEP: </strong>{{ $doctor->zip }}</span>
            </li>
            <li class="flex space-x-3">
                <span class="text-base font-normal leading-tight text-gray-500"><strong>Cidade: </strong>{{ $doctor->city }}}</span>
            </li>
            <li class="flex space-x-3">
                <span class="text-base font-normal leading-tight text-gray-500"><strong>Logradouro: </strong>{{ $doctor->street }}</span>
            </li>
            <li class="flex space-x-3">
                <span class="text-base font-normal leading-tight text-gray-500"><strong>Bairro: </strong>{{ $doctor->neighborhood }}</span>
            </li>
            <li class="flex space-x-3">
                <span class="text-base font-normal leading-tight text-gray-500"><strong>UF: </strong>{{ $doctor->uf }}</span>
            </li>
            @if(!empty($doctor->complement))
            <li class="flex space-x-3">
                <span class="text-base font-normal leading-tight text-gray-500"><strong>Complemento: </strong>{{ $doctor->complement }}</span>
            </li>
            @endif
            <li class="flex space-x-3">
                <span class="text-base font-normal leading-tight text-gray-500">
                    <strong>Especialidades: </strong>
                    @foreach($doctor->specialties as $speciality)
                        {{'|'. $speciality->name. '|'}}
                    @endforeach
                </span>
            </li>
        </ul>
        <form action="{{route('doctors.destroy', $doctor->id)}}" method="post" id="form-delete">
            @csrf
            @method("delete")
        <button type="submit" form="form-delete" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-red-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Excluir Médico</button>
        </form>
        <a href="{{ route('doctors.edit', $doctor->id) }}" class="mt-3 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Editar Informações do Médico</a>
    </div>
@endsection
