@include('headerGeneral', ['Section' => 'Inicio'])

<h1>Blogs</h1>
<hr>
@foreach ($blogs as $blog)
    <h2><a href="{{ url()->route('blog.index', $blog->id) }}">{{ $blog->title }}</a></h2>
    <p>{{ $blog->author }}</p>
    <p>{{ $blog->body }}</p>
    <hr>
@endforeach
