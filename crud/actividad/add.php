<html>
<head><title>Añadir Actividad</title></head>
<body>
    <h2>Añadir nueva actividad</h2>
    <p><a href="index.php">← Volver al listado</a></p>
    <form action="addAction.php" method="post">
        <table border="0" cellpadding="5">
            <tr><td>Nombre Actividad</td><td><input type="text" name="nombre_actividad" maxlength="50" required></td></tr>
            <tr><td>Horario</td><td><input type="text" name="horario" maxlength="50"></td></tr>
            <tr><td>Lugar</td><td><input type="text" name="lugar" maxlength="50"></td></tr>
            <tr><td>Nº Participantes</td><td><input type="number" name="num_participantes" min="0"></td></tr>
            <tr><td></td><td><input type="submit" name="submit" value="Añadir"></td></tr>
        </table>
    </form>
</body>
</html>
