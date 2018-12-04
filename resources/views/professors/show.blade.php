@extends('layouts.app')

@section('content')
<div class="organizadorViewProfesor">
    <div class = 'fotoProfesor'>
        <img src="/images/users/{{$professor->profilePic}}">
    </div>
    <h1>{{ $professor->name . ' '. $professor->lastname }}</h1>
    <div class="organizadorDeMaterias">
        @foreach ($professor->categories as $category)
        <h4 class="cajaMaterias">{{$category->name}}</h4>
        @endforeach
    </div>
    <div class="cajaDetalle">
        <h5>Zona: {{ $professor->getZona() }}</h5>
    </div>
</div>
<div class="cajaInfo">
    <section>
        @auth
        <h3>Email: {{ $professor->email }}</h3>
        @endauth
        <h3 class="left">Sobre mi</h3>
        <h5>{{ $professor->about }}</h5>
    </section>
    <h3 class="left">Comentarios</h3>
    <section id="comments">

    </section>
    @auth     
    @if(Auth::user()->role == 0)
    <div class="login-form">
        <form action="">
            <label for="comment">Comentar</label>
            <textarea name="comment" id="comment" rows="3"></textarea>
            <input type="submit" value="Enviar" onclick="commentar(event);"/>
        </form>
    </div>
    @endauth
    @endif
</div>

@endsection

@section('js')
    <script>
    @auth 
    function commentar(e) {
        e.preventDefault();
        const comment = document.querySelector('#comment');
        
        const data = {
            'comment': comment.value,
            'user_id': '{{ Auth::user()->id }}',
            'professor_id': '{{ $professor->id }}',
        };

        fetch('/api/comment', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            },
        }).then((response) => {
            return response.json();
        }).then((json) => {
            if (json.status == 'ok') {
                swal(
                    'Good job!',
                    json.data,
                    'success'
                );
                getComments();
            } else if (json.status == 'error') {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: json.data.errors,
                })
            }
        }).catch((error) => {
            console.log(error);
        });
    }
    @endauth

    function getComments() {
        fetch('/api/comment/{{ $professor->id }}')
        .then((response) => {
            return response.json();
        }).then((json) => {
            let comments = document.querySelector('#comments');
            if (json.status == 'ok') {
                comments.innerHTML = '';
                if (json.data.comments.length > 0) {
                    json.data.comments.forEach(comment => {
                        comments.innerHTML += `
                        <article>
                            <h5 class="comentario">` + comment.comment + `</h5>
                        </article>`;
                    });
                } else {
                    comments.innerHTML += `
                        <article>
                            <h5 class="comentario">No tienen ningun comentario.</h5>
                        </article>`;
                }
            }
        }).catch((error) => {
            console.log(error);
        });
    }

    getComments();
    
    </script>
@endsection
