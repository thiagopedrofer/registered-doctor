<a href="{{route('doctors.create')}}">Cadastrar novo Médico</a>
<hr>
@if(session('message'))
    <div>
        {{session('message')}}
    </div>
@endif

<form action="{{ route('doctors.search') }}" method="post">
    @csrf
    <input type="text" name="search" placeholder="CRM ou Nome do Médico">
    <button type="submit"> Pesquisar </button>
</form>

<h1> Doctors </h1>
@foreach($doctors as $doctor)
    <p>{{"Nome: $doctor->name"}}
        [ <a href="{{ route('doctors.show', $doctor->id) }}"> Ver Detalhes </a>]
    </p>
    <p>{{"CRM: $doctor->crm"}}</p>
    <hr>
@endforeach

{{ $doctors->links() }}


