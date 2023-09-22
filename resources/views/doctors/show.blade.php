<h1> Detalhes do Dr.(a){{ $doctor->name }}</h1>

<ul>
    <a href="{{ route('doctors.edit', $doctor->id) }}"> Editar informações </a>

    <li><strong>Nome: </strong>{{ $doctor->name }}</li>
    <li><strong>CRM: </strong>{{ $doctor->crm }}</li>
    <li><strong>Telefone: </strong>{{ $doctor->phone }}</li>
    <li><strong>CEP: </strong>{{ $doctor->zip }}</li>
    <li><strong>UF: </strong>{{ $doctor->uf }}</li>
    <li><strong>Cidade: </strong>{{ $doctor->city }}</li>
    <li><strong>Bairro: </strong>{{ $doctor->street }}</li>
    <li><strong>Complemento: </strong>{{ $doctor->complement }}</li>
    <li><strong>Especialidades: </strong>
        @foreach($doctor->specialties as $speciality)
            {{'|'. $speciality->name. '|'}}
        @endforeach</li>
</ul>

<form action="{{route('doctors.destroy', $doctor->id)}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit"> Deletar o Médico {{ $doctor->name }} </button>
</form>
