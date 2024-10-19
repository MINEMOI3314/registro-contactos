<?php
    include("db.php");
?>

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
        

        <form <?php htmlspecialchars($_SERVER["PHP_SELF"]) ?> method="POST" enctype="multipart/form-data" class="contact-form">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name= "nombre" placeholder="Nombre" required>

            <label for="phone">Número Telefónico:</label>
            <input type="number" id="phone_1" name= "numero_1" placeholder="Número Telefónico" required>
            <input type="number" id="phone_2" name= "numero_2" placeholder="Número Telefónico">
            <input type="number" id="phone_3" name= "numero_3" placeholder="Número Telefónico">

            <label for="text">Correo Electrónico:</label>
            <input type="email" id="email_1" name= "correo_1" placeholder="Correo Electrónico" required>
            <input type="email" id="email_2" name= "correo_2" placeholder="Correo Electrónico">
            <input type="email" id="email_3" name= "correo_3" placeholder="Correo Electrónico">
            
            <input type="submit" class="save-button" value="guardar">


            <input type="file" id="foto" name="foto"><br>
            <div class="contact-photo1">
                <img id="display_foto" src="Foto_contactos/Default.jpg" style="height: 350px">
                <script>
                    // Get the file input element and the image preview element
                    const imageInput = document.getElementById('foto');
                    const previewImage = document.getElementById('display_foto');

                    // Add an event listener for when a file is selected
                    imageInput.addEventListener('change', function(event) {
                        // Get the file from the input
                        const file = event.target.files[0];

                        // Check if a file is selected and if it's an image
                        if (file && file.type.startsWith('image/')) {
                            // Create a FileReader to read the file
                            const reader = new FileReader();

                            // When the file is read, set it as the src of the image element
                            reader.onload = function(e) {
                                previewImage.src = e.target.result;
                                previewImage.style.display = "block"; // Show the image
                            }

                            // Read the image file as a data URL
                            reader.readAsDataURL(file);
                        } else {
                            // If no image or invalid file, hide the image
                            previewImage.style.display = "none";
                        }
                    });

                </script>
            </div>

            
        </form>
    </div>

</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //declaracion de variables del usuario
        $nombre = filter_input(INPUT_POST,"nombre", FILTER_SANITIZE_SPECIAL_CHARS);

        $telefono_1 = filter_input(INPUT_POST,"numero_1", FILTER_SANITIZE_SPECIAL_CHARS);
        $telefono_2 = filter_input(INPUT_POST,"numero_2", FILTER_SANITIZE_SPECIAL_CHARS);
        $telefono_3 = filter_input(INPUT_POST,"numero_3", FILTER_SANITIZE_SPECIAL_CHARS);

        $mail_1 = filter_input(INPUT_POST,"correo_1", FILTER_SANITIZE_SPECIAL_CHARS);
        $mail_2 = filter_input(INPUT_POST,"correo_2", FILTER_SANITIZE_SPECIAL_CHARS);
        $mail_3 = filter_input(INPUT_POST,"correo_3", FILTER_SANITIZE_SPECIAL_CHARS);

        $foto = $_FILES['foto']['tmp_name'];
        $foto_ubi ='Foto_contactos/' . basename($_FILES['foto']['name']);

        if (file_exists($foto_ubi)){
            $info = pathinfo($foto_ubi);
            $name = $info['filename'];
            $extension = isset($info['extension']) ? "." . $info['extension'] :"";
            
            $counter = 1;
            while (file_exists('Foto_contactos/' . $name . "_" . $counter . $extension)) {
            $counter++;
        }
        $foto_ubi = 'Foto_contactos/'. $name . "_" . $counter . $extension; 

        }

        //compruebo si se debe subir la foto por el usuario o dejarlo en el default
        if (!empty($foto)){
            copy($foto,$foto_ubi);
            $sql_1 = "INSERT INTO contacto (nombre, foto) VALUES ('$nombre', '$foto_ubi')";
            echo "true";
        }else{
            $sql_1 = "INSERT INTO contacto (nombre) VALUES ('$nombre')";
            echo "false";
        }
        
        //ejecucion del sql querry
        
        //obteniendo la llave primaria de la incersion anterior
        //y metiendola en una variable
        mysqli_query($conn, $sql_1);
        $sql_select = "SELECT id_contacto FROM `contacto` WHERE nombre = '$nombre'";
        $sql_result = mysqli_query($conn, $sql_select);
        $sql_key = $sql_result->fetch_row();
        $sql_key[0];

        //declaracion de los strings de los querys
        $sql_2_1 = "INSERT INTO correo (id_contacto, correo) VALUE ($sql_key[0], '$mail_1')";
        $sql_3_1 = "INSERT INTO numero (id_contacto, numero) VALUE ($sql_key[0], $telefono_1)";


        //subida del correo
        mysqli_query($conn, $sql_2_1);
        if (!empty($_POST["correo_2"])){
            $sql_2_2 = "INSERT INTO correo (id_contacto, correo) VALUE ($sql_key[0], '$mail_2')";
            mysqli_query($conn, $sql_2_2);
        }
        if (!empty($_POST["correo_3"])){
            $sql_2_3 = "INSERT INTO correo (id_contacto, correo) VALUE ($sql_key[0], '$mail_3')";
            mysqli_query($conn, $sql_2_3);
        }

        //subida del numero de telefono
        mysqli_query($conn, $sql_3_1);
        if (!empty($_POST["numero_2"])){
            $sql_3_2 = "INSERT INTO numero (id_contacto, numero) VALUE ($sql_key[0], $telefono_2)";
            mysqli_query($conn, $sql_3_2);
        }
        if (!empty($_POST["numero_3"])){
            $sql_3_3 = "INSERT INTO numero (id_contacto, numero) VALUE ($sql_key[0], $telefono_3)";
            mysqli_query($conn, $sql_3_3);
        }
    
        header("Location: ".$_SERVER['PHP_SELF']);

    }

    mysqli_close($conn);
 ?>