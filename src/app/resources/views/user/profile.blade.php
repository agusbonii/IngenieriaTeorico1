@include('headerGeneral', ['Section' => 'Mi perfil'])

<form action="{{ url()->route('profile') }}" method="post">
    @csrf
    Usuario:
    <input type="text" name="username" id="username" value="{{ Auth::user()->username }}" readonly autofocus><br />
    Nombre completo:
    <input type="text" name="complete_name" id="complete_name" placeholder="{{ Auth::user()->complete_name }}"><br />
    Contraseña:
    <input type="password" name="password" id="password" required><br />
    Confirme contraseña:
    <input type="password" name="password_confirmation" id="password_confirmation" required><br />
    <input type="submit" value="Actualizar" id="submit" name="submit">
</form>

<a href="{{ url()->route('deleteUser') }}"> Darme de baja </a>


@if (Session::has('success'))
    <div style="color: green;"> {{ Session::get('success') }} </div>
@endif

@if ($errors !== NULL)
    <div style="color: red;"> {{ $errors -> first() }} </div>
@endif
