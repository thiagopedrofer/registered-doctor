
@isset($doctor)
    <h1>Editar Médico</h1>
@else
    <h1>Cadastrar Novo Médico</h1>
@endisset

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="@isset($doctor){{ route('doctors.update', $doctor->id) }}@else{{ route('doctors.store') }}@endisset" method="post">
    @csrf
    @isset($doctor)
        @method('PUT')
    @endisset
    <input type="text" name="name" id="name" placeholder="Nome do Médico" value="@isset($doctor){{ $doctor->name }}@else{{ old('name') }}@endisset">
    <br>
    <input type="text" name="crm" id="crm" placeholder="CRM do Médico" value="@isset($doctor){{ $doctor->crm }}@else{{ old('crm') }}@endisset">
    <br>
    <input type="text" name="phone" id="phone" placeholder="Nº do Telefone" value="@isset($doctor){{ $doctor->phone }}@else{{ old('phone') }}@endisset">
    <br>
    <input type="text" name="zip" id="zip" placeholder="Nº do CEP" value="@isset($doctor){{ $doctor->zip }}@else{{ old('zip') }}@endisset">
    <br>
    <input type="text" name="uf" id="uf" placeholder="UF" value="@isset($doctor){{ $doctor->uf }}@else{{ old('uf') }}@endisset">
    <br>
    <input type="text" name="city" id="city" placeholder="Cidade" value="@isset($doctor){{ $doctor->city }}@else{{ old('city') }}@endisset">
    <br>
    <input type="text" name="neighborhood" id="neighborhood" placeholder="Bairro" value="@isset($doctor){{ $doctor->neighborhood }}@else{{ old('neighborhood') }}@endisset">
    <br>
    <input type="text" name="street" id="street" placeholder="Logradouro" value="@isset($doctor){{ $doctor->street }}@else{{ old('street') }}@endisset">
    <br>
    <input type="text" name="complement" id="complement" placeholder="Complemento" value="@isset($doctor){{ $doctor->complement }}@else{{ old('complement') }}@endisset">
    <br>
    <select name="specialties[]" id="options" multiple>
        @foreach(\App\Models\Specialty::all() as $specialty)
            <option value="{{ $specialty->id }}" @if(isset($doctorSpecialties) && in_array($specialty->id, $doctorSpecialties)) selected @endif>{{ $specialty->name }}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Enviar</button>
</form>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(function () {
        $("#zip").on("blur", function() {
            var zip = $("#zip").val();
            $.get("https://viacep.com.br/ws/"+ zip.replace(/[^0-9]/g,'') +"/json/", function(resultado){
                $("#complement").val("");
                $("#zip").val(zip.replace(/[^0-9]/g,''));
                $("#neighborhood").val(resultado.bairro);
                $("#street").val(resultado.logradouro);
                $("#city").val(resultado.localidade);
                $("#uf").val(resultado.uf);
            })
        });
    });
</script>
