<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Añadir Contacto</title>
</head>
<body>

    <header>
        <a href="index.php">Inicio</a>
        <a href="contactos.php">Contactos</a>
        <a href="#">Añadir Contacto</a>
        <a href="filtros.php">Filtros</a>
        <input type="text" placeholder="Buscar">
    </header>

    <div class="add-contact-container">
        <div class="contact-photo1">
            FOTO
        </div>

        <form class="contact-form">
            <label for="name">Nombre Completo:</label>
            <input type="text" id="name" name= "name" placeholder="Nombre Completo">

            <label for="phone">Número Telefónico:</label>
            <input type="text" id="phone_1" name= "name" placeholder="Número Telefónico">
            <input type="text" id="phone_2" name= "name" placeholder="Número Telefónico">
            <input type="text" id="phone_3" name= "name" placeholder="Número Telefónico">

            <label for="email">Correo Electrónico:</label>
            <input type="text" id="email_1" name= "name" placeholder="Correo Electrónico">
            <input type="text" id="email_2" name= "name" placeholder="Correo Electrónico">
            <input type="text" id="email_3" name= "name" placeholder="Correo Electrónico">


            <button type="submit" class="save-button">Guardar</button>
        </form>
    </div>

</body>
</html>