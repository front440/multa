<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <header>
        <h1>Listado de Multas</h1>
        <nav>
            <?php
            include("include/navigation.php");
            ?>
        </nav>
    </header>

    <section>
        <?php
        include("include/cabeceraUsuario_view.php");
        ?>
    </section>

    <h1>Paga la sanción</h1>
    <?php
    // var_dump($data);
    /* echo "<p>ID multa: " . $data["id"] . "</p>";
    echo "<p>Matrícula: " . $data["matricula"] . "</p>";
    echo "<p>Conductor: " . $data["id_conductor"] . "</p>";
    echo "<p>Tipo de infracción: " . $data["id"] . "</p>";
    echo "<p>Descripción: " . $data["descripcion"] . "</p>";
    echo "<p>Fecha: " . $data["fecha"] . "</p>";
    echo "<p>importe: " . $data["importe"] . "€</p>";
    echo "<p>Descuento: " . $data["descuento"] . "</p>";
    echo "<p></p>"; */
    include("include/pagarmulta_form.php");


    ?>

</body>

</html>