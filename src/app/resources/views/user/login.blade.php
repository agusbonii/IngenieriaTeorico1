@include('headerGeneral', ['Section' => 'Loguearse'])

<form action="{{ url()->route('login') }}" method="post">
    @csrf
    Usuario: <input autofocus type="text" name="username" value="{{ old('username') }}" /> <br />
    Contraseña: <input type="password" name="password" /> <br />
    <input type="checkbox" id="rememberme" name="rememberme">
    <label for="rememberme"> Recuerdame </label> <br />
    <button type="submit"> Loguearse </button>
</form>

@if ($errors !== NULL)
    <div style="color: red;"> {{ $errors -> first() }} </div>
@endif
