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

    <h1>Multas</h1>
    <?php
    // var_dump($data);
    echo "<br>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<td>Matricula</td> <td>Descripción</td> <td>Fecha</td> <td>Estado</td> <td>Pagar</td>";
    echo "</tr>";
    foreach ($data as $key => $value) {
        echo "<tr>";
        echo "<td>" . $value['matricula'] . "</td>";
        echo "<td>" . $value['descripcion'] . "</td>";
        echo "<td>" . $value['fecha'] . "</td>";
        echo "<td>" . $value['estado'] . "</td>";
        if ($value['estado'] != "Pagada") {
            echo "<td><a href=\"" . DIRURL . "/multa/" . $value["id"] . "\">Pagar</a></td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    ?>

</body>

</html>