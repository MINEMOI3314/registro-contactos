<?php
    include("db.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Contactos</title>
</head>
<body>

    <header>
        <a href="index.php">Inicio</a>
        <a href="#">Contactos</a>
        <a href="añadir.php">Añadir Contacto</a>
        <a href="filtros.php">Filtros</a>
        <input type="text" placeholder="Buscar">
    </header>

    <div class="contacts-table">
        <?php
            //cuento cuantos contactos tengo agregados
            $sql_select = "SELECT COUNT(*) FROM `contacto`";
            $sql_result = mysqli_query($conn, $sql_select);
            $table_count = $sql_result->fetch_row();

            //loop para mostrar todos los contactos guardados
            for($iterador=1; $iterador<=$table_count[0]; $iterador++){

                //extraigo el nombre y la ubicacion de la foto en un array
                $sql_select = "SELECT * FROM `contacto` WHERE $iterador = id_contacto";
                $sql_result = mysqli_query($conn, $sql_select);
                $sql_key_contacto = $sql_result->fetch_row();

                //extraigo los numeros y los meto en un array
                $sql_select = "SELECT numero FROM `numero` WHERE $iterador = id_contacto";
                $sql_result = mysqli_query($conn, $sql_select);
                $i = 0;
                while($sql_key_numero_fetch = $sql_result->fetch_row()){
                    $key_numero[$i] = $sql_key_numero_fetch[0];
                    $i++;
                }
                
                //extraigo los correos y los meto a un array
                $sql_select = "SELECT correo FROM `correo` WHERE $iterador = id_contacto";
                $sql_result = mysqli_query($conn, $sql_select);
                $i = 0;
                while($sql_key_correo_fetch = $sql_result->fetch_row()){
                    $key_correo[$i] = $sql_key_correo_fetch[0];
                    $i++;
                }
                
                echo "
                <div class=\"contact-row\">
                <div class=\"contact-photo\">
                    <img id=\"foto\" src=\"$sql_key_contacto[2]\" style=\"height: 150px\">
                </div>
                <div class=\"contact-info\">
                NOMBRE: $sql_key_contacto[1]<br>
                NUMERO(S):<br>$key_numero[0]<br>";
                if (isset($key_numero[1])){
                    echo"$key_numero[1]<br>";
                }
                if (isset($key_numero[2])){
                    echo"$key_numero[2]<br>";
                }

                echo "CORREO(S):<br>$key_correo[0]<br>";
                if (isset($key_correo[1])){
                    echo"$key_correo[1]<br>";
                }
                if (isset($key_correo[2])){
                    echo"$key_correo[2]<br>";
                }
                echo "</div>
                <div class=\"contact-actions\">
                    <button><a href=\"confirmacion.php\">Eliminar</a></button>
                    <button><a href=\"editar.php\">Modificar</a></button>
                </div>
                </div>
                ";
                unset($key_correo);
                unset($key_numero);                
            }
        ?>

        

        </form>

        



        

        

    </div>

</body>
</html>