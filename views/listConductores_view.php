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
        <h1>Trafico</h1>
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

    <h1>Conductores</h1>
    <?php
    // var_dump($data);
    include("include/buscarconductor_form.php");

    echo "<br>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<td>Conductor</td> <td>Puntos</td>";
    echo "</tr>";


    foreach ($data as $key => $value) {
        echo "<tr>";
        echo "<td>" . $value['nombre'] . "</td>";
        echo "<td>" . $value['puntos'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    ?>

</body>

</html>