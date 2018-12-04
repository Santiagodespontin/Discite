@extends('layouts.app')

@section('content')
<article class="perfil">

<h1>Bienvenido</h1>
    <ul>
        <li>
            <img src="/images/users/{{Auth::user()->profilePic}}" style="widht:150px;  heigth:150px; border-radius:50%" >
        </li>
    </ul>
</article>
<div class="login-form">
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <h5 style="margin: 5px 0px;">Nombre: {{Auth::user()->name ." " . Auth::user()->lastname}}</h5>
        <h5 style="margin: 5px 0px;">Email: {{Auth::user()->email}}</h5>
        <h5 style="margin: 5px 0px 25px;">Fecha de nacimiento: {{Auth::user()->birthdate}} </h5>
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ old('name') ? old('name') : Auth::user()->name }}">
        @if(Auth::user()->role == 0)
            <h5 style="margin: 5px 0px;">Rol: Alumno</h5>
        @elseif(Auth::user()->role == 1)
            <h5 style="margin: 5px 0px;">Rol: Profesor</h5>
        @else
            <h5 style="margin: 5px 0px;">Rol: Like a Boss</h5>
        @endif

        @if ($errors->has('name'))
            <span class="text-red">{{ $errors->first('name') }}</span><br>
        @endif
        <label for="">Apellido:</label>
        <input type="text" name="lastName" value="{{ old('lastName') ? old('lastName') : Auth::user()->lastname }} ">
        @if ($errors->has('lastName'))
            <span class="text-red">{{ $errors->first('lastName') }}</span><br>
        @endif
        <label for="">Fecha de nacimiento:</label>
        <input type="date" name="birthdate" value="{{ old('birthdate') ? old('birthdate') : Auth::user()->birthdate }} ">
        @if ($errors->has('birthdate'))
            <span class="text-red">{{ $errors->first('birthdate') }}</span><br>
        @endif
        <label for="">Foto de perfil:</label>
        <input type="file" name="profilePic" value="{{ old('birthdate') }}">
        @if ($errors->has('profilePic'))
            <span class="text-red">{{ $errors->first('profilePic') }}</span><br>
        @endif
        <input type="submit">
    </form>
</div>

@if(Auth::user()->role == 1)
<div class="login-form">
    <div style="flex-direction: column;">
        <h3 style="margin: 10px 0px;">Categorias</h3>
        @foreach (Auth::user()->categories as $category)
        <h5 style="margin: 5px 0px;">{{ $category->name }}</h5>
        <a href="" onclick="event.preventDefault(); document.querySelector('#category-delete-{{$category->id}}').submit();">Delete</a>
        <form action="{{ route('professor.category.delete', $category->id) }}" id="category-delete-{{$category->id}}" method="POST">
            @csrf
            @method("DELETE")
        </form>
        @endforeach
    </div>
</div>

<div class="login-form">
    <form action="{{ route('professor.category.add') }}" method="POST">
        @csrf
        <h4 style="margin: 15px 0px;">Agregar Categoria</h4>
        <select name="category">
            @foreach (App\Category::all() as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Agregar">
    </form>        
</div>
@endif

@endsection
