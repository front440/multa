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

    <h1>Nueva Multa</h1>
    <?php
    include("include/nuevasancion_form.php")

    ?>

</body>

</html>