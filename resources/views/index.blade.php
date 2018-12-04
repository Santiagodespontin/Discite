@extends('layouts.app')

@section('content')
<section class="banner">
    <div></div>
    <form action="" method="POST">
        <select name="materia" id="">
            @foreach (App\Category::all() as $category)
            <option value="Matematicas">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="text" placeholder="¿Dónde estás buscando?">
        <input type="submit" value="Buscar">
    </form>
</section>
<section class="pasos">
    <h2>Encontra profesores en tres simples pasos</h2>
    <article>
        <h2>Busca</h2>
        <i class="fas fa-search"></i>
    </article>
    <article>
        <h2>Elegi</h2>
        <i class="fas fa-chalkboard-teacher"></i>
    </article>
    <article>
        <h2>Aprende</h2>
        <i class="fab fa-leanpub"></i>
    </article>
</section>
<section class="categoria">
    <h3>Busca por categoria</h3>
    @foreach (App\Category::all() as $category)
    <article>
        <a href="{{ url('/professor?q='.$category->name) }}">{{ $category->name }}</a> 
    </article>
    @endforeach
</section>
@endsection

