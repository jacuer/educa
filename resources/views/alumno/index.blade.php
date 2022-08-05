@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))

<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje')}}

</div>


@endif

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Pass Token</th>
            <th>Voto Alumno</th>
            <th>Acciones </th>
        </tr>
    </thead>
    <tbody>
        @foreach( $alumnos as $alumno )
        <tr>
            <td>{{ $alumno->id }}</td>
            <td>{{ $alumno->PASS_TOKEN }}</td>
            <td>{{ $alumno->VOTO_ALUMNO }}</td>
            <td>
                <a href="{{ url('/alumno/'.$alumno->id.'/edit') }}" class="btn btn-warning">Editar</a>
                 | 
                
                <form action="{{ url('/alumno/'.$alumno->id) }}" method="post" class="d-inline">
                    @csrf
                    {{ method_field('DELETE') }}                
                    <input type="submit" onclick="return confirm('Quieres borrar?')" value="Borrar" class="btn btn-danger">
                </form>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $alumnos->links()  }}
</div>
@endsection