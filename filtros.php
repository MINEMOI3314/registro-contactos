<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Contactos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <a href="index.php">Inicio</a>
        <a href="contactos.php">Contactos</a>
        <a href="añadir.php">Añadir Contacto</a>
        <a href="#">Filtros</a>
        <input type="text" placeholder="Buscar">
    </header>

    <form>
        
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre Completo">

        <label for="telefono">Número Telefónico:</label>
        <input type="tel" id="telefono" name="telefono" placeholder="Número Telefónico">

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" placeholder="Correo Electrónico">

        <button type="submit">Guardar</button>
    </form>
</body>
</html>