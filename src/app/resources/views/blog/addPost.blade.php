@include('headerGeneral', ['Section' => 'Nueva publicación'])

<form action="{{ url()->route('blog.add') }}" method="post">
    @csrf
    <label for="title">Titulo: </label>
    <input type="text" name="title"><br>
    <label for="body">Descripcion: </label><br>
    <textarea name="body" cols="50" rows="10"></textarea><br>
    <button type="submit">Publicar</button>
</form>
