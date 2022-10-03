@include('headerGeneral', ['Section' => 'Mis publicaciones'])
<hr><br>
<a href="{{ url()->route('blog.add')}}">Nueva publicación</a>
<br><hr>
@isset($blogs)
    @foreach ($blogs as $blog)
        <h2><a href="{{ url()->route('blog.index', $blog->id) }}">{{ $blog->title }}</a></h2>
        <p>{{ $blog->author }}</p>
        <p>{{ $blog->body }}</p>
        <hr>
    @endforeach
@endisset
