@extends('layouts.app')

@section('content')
<article class="perfil">

<h1>Bienvenido</h1>
    <ul>
    <li><img src="/img/user/{{$user->profilePic}}" style="widht:150px;  heigth:150px; border-radius:50%" > </li>
    <form enctype="multipart/form-data" action="/profile" method="POST">
        <label>Actualizar Foto</label>
        <input type="file" name="profilePic">
        <input type="hidden" name="_token" value="{{csrf_token()}}"></form>
        <input type="submit">
        <li><h5>Nombre: {{Auth::user()->name ." " . Auth::user()->lastName}} </li>
        <li><h5>Email: {{Auth::user()->email}}</li>
        <li><h5>Fecha de Nacimiento: {{Auth::user()->date}} </h5></li>
    </ul>

</article>

@endsection
