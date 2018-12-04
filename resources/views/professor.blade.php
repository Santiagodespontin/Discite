@extends('layouts.app')

@section('content')
<div class="organizadorViewProfesor">
    <div class = 'fotoProfesor'>
        <img src="../../images/users/default.jpg">
    </div>
    <h1>Nombre Del Profesor</h1>
    <div class="organizadorDeMaterias">
        <h4 class="cajaMaterias">Materias</h4>
        <h4 class="cajaMaterias">Materias</h4>
        <h4 class="cajaMaterias">Materias</h4>
        <h4 class="cajaMaterias">Materias</h4>    
    </div>
    <div class="cajaDetalle">
        <h5>Ubicacion</h5>
        <h5>Nota</h5>
    </div>
</div>
<div class="cajaInfo">
    <section>
        <h3 class="left">Sobre mi</h3>
        <h5>Breve descripcion Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error sapiente repellat amet unde tempora adipisci, nulla laboriosam sed earum quae? Corporis molestias, praesentium id ex illo maiores repudiandae optio vitae.</h5>
    </section>
    <h3 class="left">Comentarios</h3>
    <section>
        <h4>Alumno</h4>
        <h5 class="comentario">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos velit culpa necessitatibus reprehenderit rem sunt libero vero repellat fuga veritatis exercitationem voluptatem mollitia, numquam quisquam modi incidunt voluptate cumque at.</h5>

    </section>
</div>




<ul>
    @forelse ($professors as $professor)
    <li>
    <h3>Nombre: {{ $professor->name }} {{ $professor->lastname }}</h3>
        <p>Horarios: 10 a 13hs</p>
        <p>Categorias:</p> 
            <ul>
                @foreach ($professor->categories as $category)
                <li>{{$category->name}}</li>    
                @endforeach
            </ul>
        <a href="{{ route('professor.show', $professor->id) }}">Ver</a>
    </li>
    @empty        
    <li>0 Results found </li>
    @endforelse
</ul>


@endsection
