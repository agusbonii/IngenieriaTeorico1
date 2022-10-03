@include('headerGeneral', ['Section' => 'Eliminar usuario'])

<script language="JavaScript">
    function confirmar() {
        if (confirm('¿Estas seguro de enviar este formulario?')) {
            document.baja.submit()
        }
    }
</script>
<form name="baja" action="{{ url()->route('deleteUser') }}" method="post">
    @csrf
    <input type="button" onclick="confirmar()" value="Darse de baja">
</form>


@if ($errors !== NULL)
    <div style="color: red;"> {{ $errors -> first() }} </div>
@endif
