@extends('app')
@section('content')

<br>
<div class="container w-25 border p-4" style="background-color:black; border-radius:15px;">
<form action="{{ route('categories.store') }}" method="POST">
  @csrf <!--PER SEGURETAT A ATACS LATERALS AIXO GENERA UN TOKEN PQ NO ES PUGUIN FERTE PASSAR PER NOSALTRES -->
  @if(session('success'))
    <h6 class="alert alert-success">{{session('success')}} </h6>
  @endif

  @error('name')
  <h6 class="alert alert-success">{{$message}} </h6>
  @enderror
  <div class="mb-3">
    <label for="tittle" class="form-label" style="color:yellow;">Nombre de Categoria</label>
    <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="color" class="form-label" style="color:yellow;">Color</label>
    <input type="color" class="form-control" name="color" aria-describedby="emailHelp">
  </div>


  <button type="submit" class="btn btn-primary"  style="color:black; font-weight:700; border-color:black;background-color:yellow ;">Crear Categoria</button>
</form>
<br>
<div style="background-color:yellow; padding:3px; border-radius:10px; ">
        @foreach ($Categories as $category)
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center" >
                    <a style="text-decoration:none; color:black; font-weight:700;" class="d-flex align-items-center gap-2" href="{{ route('categories.show', ['category' => $category->id]) }}">
                        <span class="color-container" style="background-color: {{ $category->color }}; color:transparent; border-radius:5px;">······</span> {{ $category->name }}
                    </a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{$category->id}}" style="color:yellow; background-color:black; border-color:black; font-weight:700;">Eliminar</button>
                    
                </div>
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="modal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" > 
                <div class="modal-dialog" >
                    <div class="modal-content" style="background-color:black;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color:yellow;">Eliminar categoría</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="color:yellow;">
                        Al eliminar la categoría <strong>{{ $category->name }}</strong> se eliminan todas las tareas asignadas a la misma. 
                        ¿Está seguro que desea eliminar la categoría <strong>{{ $category->name }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancelar</button>
                        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-primary" style="color:yellow; background-color:black; border-color:yellow; font-weight:700;">Sí, eliminar categoía</button>
                        </form>
                        
                    </div>
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>
@endsection