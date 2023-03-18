@extends('app') <!--AIXO LI DIEM QUI ES COM EL CONTINGUT PARE EN AQUEST CAS APP.BLADE.HTML-->

<!--AMB AIXO FEM REFERENCIA A LA SECCIO DE CONTENT-->
@section('content')
<br>
<div class="container w-25 border p-4" style="background-color:black; border-radius:15px;">
<form action="{{ route('todos-edit',['id'=>$todo->id]) }}" method="POST">
@method('PATCH')
  @csrf <!--PER SEGURETAT A ATACS LATERALS AIXO GENERA UN TOKEN PQ NO ES PUGUIN FERTE PASSAR PER NOSALTRES -->
  @if(session('success'))
    <h6 class="alert alert-success">{{session('success')}} </h6>
  @endif

  @error('tittle')
  <h6 class="alert alert-success">{{$message}} </h6>
  @enderror
  <div class="mb-3">
    <label for="tittle" class="form-label"  style="color:yellow;">Tarea</label>
    <input type="text" class="form-control" name="tittle" aria-describedby="emailHelp" value="{{$todo->tittle}}">
  </div>

  <label for="category_id" class="form-label"  style="color:yellow;">Categoria de la tarea</label>
            <select name="category_id" class="form-select" value="{{$todo->category_id}}">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <br>
  <button style="color:black; font-weight:700; border-color:black;background-color:yellow ;" type="submit" class="btn btn-primary">Actualizar Tarea</button>
</form>
</div>
@endsection