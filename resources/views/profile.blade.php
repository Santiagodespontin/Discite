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
        @if(Auth::user()->rol==0)
            <h5 style="margin: 5px 0px;">Alumno</h5>
        @elseif(Auth::user()->rol==1)
            <h5 style="margin: 5px 0px;">Profesor</h5>
        @else
        <h5 style="margin: 5px 0px;">Like a Boss</h5>
        @endif
        <h5 style="margin: 5px 0px;">Nombre: {{Auth::user()->name ." " . Auth::user()->lastname}}</h5>
        <h5 style="margin: 5px 0px;">Email: {{Auth::user()->email}}</h5>
        <h5 style="margin: 5px 0px 25px;">Fecha de nacimiento: {{Auth::user()->birthdate}} </h5>
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ old('name') ? old('name') : Auth::user()->name }}">
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


@endsection
