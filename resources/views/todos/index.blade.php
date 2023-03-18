@extends('app') <!--AIXO LI DIEM QUI ES COM EL CONTINGUT PARE EN AQUEST CAS APP.BLADE.HTML-->

<!--AMB AIXO FEM REFERENCIA A LA SECCIO DE CONTENT-->
@section('content')
<br>
<div class="container w-25 border p-4" style="background-color:black; border-radius:15px;">
<form action="{{ route('todos') }}" method="POST">
  @csrf <!--PER SEGURETAT A ATACS LATERALS AIXO GENERA UN TOKEN PQ NO ES PUGUIN FERTE PASSAR PER NOSALTRES -->
  @if(session('success'))
    <h6 class="alert alert-success">{{session('success')}} </h6>
  @endif

  @error('tittle')
  <h6 class="alert alert-success">{{$message}} </h6>
  @enderror
  <div class="mb-3">
    <label for="tittle" class="form-label" style="color:yellow;">Tarea</label>
    <input type="text" class="form-control" name="tittle" aria-describedby="emailHelp">
  </div>

  <label for="category_id" class="form-label" style="color:yellow;">Categoria de la tarea</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <br>
  <button type="submit" class="btn btn-primary" style="color:black; font-weight:700; border-color:black;background-color:yellow ;">Crear Tarea</button>
</form>
<br>

<div>
        @foreach ($todos as $todo)
        
            <div class="row py-1" style="background-color:yellow; border-radius:10px; margin-top:5px;">
                <div class="col-md-9 d-flex align-items-center" >
                    <a style="text-decoration:none; color:black; font-weight:700;" href="{{ route('todos-show', ['id' => $todo->id]) }}"><span tittle="{{$category->name}}" class="color-container" style="background-color: {{ $category->color }}; color:transparent; border-radius:5px;">······</span> {{ $todo->tittle }}</a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
                        @method('DELETE')<!--EM DE POSAR AIXO JA QUE AIXINS LARAVEL RECONEIX QUE ES UN METODE DE TIPUS DELETE-->
                        @csrf
                        <button class="btn btn-danger btn-sm" style="color:yellow; background-color:black; border-color:black; font-weight:700;">Eliminar</button>
                    </form>
                </div>
            </div>
            
        @endforeach
    </div>
</div>
@endsection