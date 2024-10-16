<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Página de Bienvenida</title>
</head>
<body>

    <header>
        <a href="index.php">Inicio</a>
        <a href="contactos.php">Contactos</a>
        <a href="añadir.php">Añadir Contacto</a>
        <a href="filtros.php">Filtros</a>
        <input type="text" placeholder="Buscar">
    </header>

    <div class="container">
        <div class="photo-section">
            <div class="photo-circle">
                <p>FOTO</p>
            </div>
            
        </div>
        
        <div class="form-section">
            <label for="nombre">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre">

            <label for="telefono">Número Telefónico:</label>
            <input type="text" id="telefono" name="telefono">
            <input type="text" id="telefono" name="telefono">
            <input type="text" id="telefono" name="telefono">

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo">
            <input type="email" id="correo" name="correo">
            <input type="email" id="correo" name="correo">
        
        
        <button class="btn">Guardar</button> 
        <button class="btn">Nuevo</button>
    </div>
        
        
    </div>
</body>
</html>