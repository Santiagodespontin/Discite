@extends('layouts.app')

@section('content')
<section class="banner">
    <div></div>
    <form action="" method="POST">
        <select name="materia" id="">
            <option value="Matematicas">Matematicas</option>
            <option value="Historia">Historia</option>
            <option value="Geografia">Geografia</option>
            <option value="Economia">Economia</option>
            <option value="Teoria Contable">Teoria Contable</option>
            <option value="Dibujo">Dibujo</option>
            <option value="Ingles">Ingles</option>
            <option value="Frances">Frances</option>
            <option value="Canto">Canto</option>
            <option value="Baile">Baile</option>
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
    <article> <a href="#">Matematicas</a> </article>
    <article> <a href="#">Historia</a> </article>
    <article> <a href="#">Geografia</a> </article>
    <article> <a href="#">Economia</a> </article>
    <article> <a href="#">Teoria Contable</a> </article>
    <article> <a href="#">Dibujo</a> </article>
    <article> <a href="#">Ingles</a> </article>
    <article> <a href="#">Frances</a> </article>
    <article> <a href="#">Canto</a> </article>
    <article> <a href="#">Baile</a> </article>
</section>
@endsection

