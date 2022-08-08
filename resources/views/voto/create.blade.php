@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/candidato') }}" method="post" enctype="multipart/form-data">
@csrf
    @include('candidato.form', ['modo'=>'Crear'])
</form>
</div>
@endsection