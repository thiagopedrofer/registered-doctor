@extends("layouts.app")

@section("content")

    <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        @isset($doctor)
            <h1 class="flex justify-items-start mb-2 text-3xl font-bold text-gray-900 dark:text-white">Editar Médico</h1>
        @else
            <h1 class="flex justify-items-start mb-2 text-3xl font-bold text-gray-900 dark:text-white">Cadastrar Novo Médico</h1>
        @endisset

            <div class="mt-3">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="flex items-center p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-300" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            {{$error}}
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

        <div class="justify-items-start space-y-4 sm:flex sm:space-y-0 sm:space-x-4 mt-3">
            <form action="@isset($doctor){{ route('doctors.update', $doctor->id) }}@else{{ route('doctors.store') }}@endisset" method="post">
                @csrf
                @isset($doctor)
                    @method('PUT')
                @endisset
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome Médico</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="name" id="name" placeholder="Nome do Médico" value="@isset($doctor){{ $doctor->name }}@else{{ old('name') }}@endisset">
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CRM do Médico</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="crm" id="crm" placeholder="CRM do Médico" value="@isset($doctor){{ $doctor->crm }}@else{{ old('crm') }}@endisset">
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nº do Telefone</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="tel" name="phone" id="phone" placeholder="Nº do Telefone" value="@isset($doctor){{ $doctor->phone }}@else{{ old('phone') }}@endisset">
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nº do CEP</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="tel" name="zip" id="zip" placeholder="Nº do CEP" value="@isset($doctor){{ $doctor->zip }}@else{{ old('zip') }}@endisset">
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UF</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="uf" id="uf" placeholder="UF" value="@isset($doctor){{ $doctor->uf }}@else{{ old('uf') }}@endisset">
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cidade</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="city" id="city" placeholder="Cidade" value="@isset($doctor){{ $doctor->city }}@else{{ old('city') }}@endisset">
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bairro</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="neighborhood" id="neighborhood" placeholder="Bairro" value="@isset($doctor){{ $doctor->neighborhood }}@else{{ old('neighborhood') }}@endisset">
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logradouro</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="street" id="street" placeholder="Logradouro" value="@isset($doctor){{ $doctor->street }}@else{{ old('street') }}@endisset">
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Complemento</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="complement" id="complement" placeholder="Complemento" value="@isset($doctor){{ $doctor->complement }}@else{{ old('complement') }}@endisset">
                </div>
                <div class="mb-6">
                <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Especialidades</label>
                <select name="specialties[]" multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach(\App\Models\Specialty::all() as $specialty)
                        <option value="{{ $specialty->id }}" @if(isset($doctorSpecialties) && in_array($specialty->id, $doctorSpecialties)) selected @endif>{{ $specialty->name }}</option>
                    @endforeach
                </select>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>

@endsection
@push("scripts")
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function () {
            $("#zip").on("blur", function() {
                var zip = $("#zip").val();
                $.get("https://viacep.com.br/ws/"+ zip.replace(/[^0-9]/g,'') +"/json/", function(resultado){
                    $("#complement").val("").focus();
                    $("#zip").val(zip.replace(/[^0-9]/g,''));
                    $("#neighborhood").val(resultado.bairro);
                    $("#street").val(resultado.logradouro);
                    $("#city").val(resultado.localidade);
                    $("#uf").val(resultado.uf);
                })
            });
        });
    </script>

@endpush
