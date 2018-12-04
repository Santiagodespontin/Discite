@extends('layouts.app')

@section('content')

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
