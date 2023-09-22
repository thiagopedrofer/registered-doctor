<h1>Editar informações do Médico <strong>{{$doctor->name}}</strong></h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('doctors.update', $doctor->id) }}" method="post">
    @csrf
    @method('put')
    <ul>
        <li><strong>Nome: </strong>{{ $doctor->name }}</li>
        <li><strong>CRM: </strong>{{ $doctor->crm }}</li>
        <li><strong>Telefone: </strong>{{ $doctor->phone }}</li>

        <li><strong>Especialidades: </strong>
            @foreach($doctor->specialties as $speciality)
                {{'|'. $speciality->name. '|'}}
            @endforeach</li>
    </ul>
    <input type="text" name="name" id="name" placeholder="Nome do Médico" value="{{ $doctor->name }}">
    <br>
    <input type="text" name="crm" id="crm" placeholder="CRM do Médico" value="{{$doctor->crm}}">
    <br>
    <input type="text" name="phone" id="phone" placeholder="Nº do Telefone" value="{{$doctor->phone}}">
    <br>
    <select name="specialties[]" id="options" multiple>
        @foreach(\App\Models\Specialty::all() as $specialty)
            <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
        @endforeach
    </select>
    <br>
    <input type="hidden" name="_method" value="put">
    <button type="submit">Enviar</button>
</form>
