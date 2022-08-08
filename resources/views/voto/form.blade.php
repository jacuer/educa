<h1>{{ $modo }} Candidato</h1>

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
          <label for="" class="form-label">Ingrese el nombre</label>
          <input type="text" class="form-control" id="NAME" name="NAME" value="{{ isset($candidato->NAME) ?$candidato->NAME:old('NAME') }}">        
          <label for="" class="form-label">Ingrese el número tarjetón</label>          
          <input type="text" class="form-control" id="CANDIDATO_ID" name="CANDIDATO_ID" value="{{ isset($candidato->CANDIDATO_ID) ?$candidato->CANDIDATO_ID:old('CANDIDATO_ID') }}">        
          <label for="" class="form-label">Ingrese cargo que aspira</label>
          <input type="text" class="form-control" id="ASPIRANTE" name="ASPIRANTE" value="{{ isset($candidato->ASPIRANTE) ?$candidato->ASPIRANTE:old('ASPIRANTE') }}">
          <label for="Foto"> </label>
            @if(isset($candidato->FOTO))
            <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$candidato->FOTO}}" alt="" width="100" > 
            @endif
            <input class="form-control"  type="file" name="FOTO" id="Foto" value="{{isset($candidato->FOTO)?$candidato->FOTO:old('FOTO')}}">
            </div>
            
        </div>
        <div class="mb-3">
        <input type="submit" class="btn btn-success" value="{{ $modo }} datos"> |
        <a href="{{ url('candidato/') }}" class="btn btn-primary">Regresar</a>
        </div>

</div>