<h1>{{ $modo }} Alumno</h1>

@if(count($errors)>0)


<div class="alert alert-danger" role="alert">
    <ul>    
  @foreach( $errors->all() as $error )
        
            <li>
                {{ $error }}    
            </li>  

            @endforeach  
            </ul>
</div>
@endif

<div class="container">
        <div class="mb-3 col-3">
          <label for="" class="form-label">Ingrese el token</label>
          <input type="text" class="form-control" id="PASS_TOKEN" name="PASS_TOKEN" value="{{ isset($alumno->PASS_TOKEN) ?$alumno->PASS_TOKEN:old('PASS_TOKEN') }}">        
          <label for="" class="form-label">Ingrese el voto</label>
          <input type="text" class="form-control" id="VOTO_ALUMNO" name="VOTO_ALUMNO" value="{{ isset($alumno->VOTO_ALUMNO) ?$alumno->VOTO_ALUMNO:old('VOTO_ALUMNO') }}">
        </div>
        <div class="mb-3">
        <input type="submit" class="btn btn-success" value="{{ $modo }} datos"> |
        <a href="{{ url('alumno/') }}" class="btn btn-primary">Regresar</a>
        </div>

</div>