@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert"">

{{ Session::get('mensaje') }}
<button type="button" class="lose" data-dismiss="alert" aria-label="close">
    <span aria-hidden="true">&times;</span>
</button></div>
@endif

<a href="{{url('candidato/create')}}" class="btn btn-success">Registrar nuevo candidato</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Aspirante</th>
            <th>Tarjetón</th>
        </tr>
    </thead>
    <tbody>
       {{--  @foreach($candidatos as $candidato ) --}}
        <tr>
            <td>{{$candidato->id}}</td>
            <td>
                <img src="{{asset('storage').'/'.$candidato->FOTO}}" alt="" width="100"> </td>
            <td>{{$candidato->NAME}}</td>
            <td>{{$candidato->ASPIRANTE}}</td>
            <td>{{$candidato->CANDIDATO_ID}}</td>
            
        </tr>
     {{--    @endforeach --}}
    </tbody>
</table>
{{ $candidatos->links() }}
</div>
@endsection