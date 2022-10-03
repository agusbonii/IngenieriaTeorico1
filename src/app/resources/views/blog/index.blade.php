@include('headerGeneral', ['Section' => $blog->title])

<h1>{{ $blog->title }}</h1>
<a href="{{ url()->route('blog.edit') . '/' . $blog->id }}">Editar</a>
<p>{{ $blog->author }}</p>
<p>{{ $blog->body }}</p>
<h2><a href="{{ url()->route('home') }}">Regresar</a></h2>
