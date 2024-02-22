<div>
    <h1>ACCESO MENSAJERÍA</h1>
    <form action="{{ url('login') }}" method="post">
        @csrf
        <label for="nombre">Nombre de usuario</label>
        <br>
        <input type="text" name="nombre" />
        <br>
        <input type="submit" value="Acceder" />
    </form>

</div>
