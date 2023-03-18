@extends('app')

@section('content')
<br>
<div class="container w-25 border p-4" style="background-color:black; border-radius:15px;">
    <div class="row mx-auto">
    <form  method="POST" action="{{route('categories.update',['category' => $category->id])}}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">

        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

         @error('color')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif

            <label for="exampleFormControlInput1" class="form-label" style="color:yellow;">Nombre de la categoría</label>
            <input type="text" class="form-control mb-2" name="name" id="exampleFormControlInput1" placeholder="Hogar" value="{{ $category->name }}">
            
            <label for="exampleColorInput" class="form-label" style="color:yellow;">Escoge un color para la categoría</label>
            <input type="color" class="form-control form-control-color" name="color" id="exampleColorInput" value="{{ $category->color }}" title="Choose your color">

            <input style="color:black; font-weight:700; border-color:black;background-color:yellow ;" type="submit" value="Actualizar tarea" class="btn btn-primary my-2" />
        </div>
    </form>

    <div  style="color:black; font-weight:700; border-color:black;background-color:yellow ; border-radius:10px">
    @if ($category->todos->count() > 0)
        @foreach ($category->todos as $todo )
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{ route('todos-edit', ['id' => $todo->id]) }}" style="text-decoration:none; color:black; font-weight:700;">{{ $todo->tittle }}</a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm"  style="color:yellow; background-color:black; border-color:black; font-weight:700;">Eliminar</button>
                    </form>
                </div>
            </div>
        @endforeach    
    @else
        No hay tareas para esta categoría
    @endif
    
    </div>
    </div>
</div>
@endsection