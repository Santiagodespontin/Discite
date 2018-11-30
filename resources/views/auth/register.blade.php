@extends('layouts.app')

@section('content')

<div class="login-form">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h3>Sign Up</h3>
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="<?= old('name') ?>">
        @if ($errors->has('name'))
            <span>{{ $errors->first('name') }}</span><br>
        @endif
        <label for="">Apellido:</label>
        <input type="text" name="lastName" value="<?= old('lastName') ?>">
        @if ($errors->has('lastName'))
            <span>{{ $errors->first('lastName') }}</span><br>
        @endif
        <label for="">Email:</label>
        <input type="email" name="email" value="<?= old('email') ?>">
        @if ($errors->has('email'))
            <span>{{ $errors->first('email') }}</span><br>
        @endif
        <label for="">Fecha de Nacimiento:</label>
        <input type="date" name="date" value="<?= old('date') ?>">
        @if ($errors->has('date'))
            <span>{{ $errors->first('date') }}</span><br>
        @endif
        <label for="file">Password:</label>
        <input type="password" name="password">
        @if ($errors->has('password'))
            <span>{{ $errors->first('password') }}</span><br>
        @endif
        <label for="">Comfirmar Password:</label>
        <input type="password" name="password_confirmation">
        @if ($errors->has('password_confirmation'))
            <span>{{ $errors->first('password_confirmation') }}</span><br>
        @endif
        <label for="">Foto de perfil:</label>
        <input type="file" name="profilePic">
        @if ($errors->has('profilePic'))
            <span>{{ $errors->first('profilePic') }}</span><br>
        @endif
        <input type="submit">
    </form>
</div>
@endsection
