<?php
echo "Usted esta como " . $_SESSION['perfil'];
if ($_SESSION['perfil'] == 'invitado') {
    $n1 = random_int(0, 10);
    $n2 = random_int(0, 10);
    $_SESSION["captcha"] = $n1 + $n2;

    echo "<form action=\"http://localhost/multas/public/index.php/login\" method=\"post\">";
    echo "<label for=\"email\">Usuario";
    echo "<input type=\"text\" name=\"email\" placeholder=\"Email\">";
    echo "</label>";
    echo "<br>";
    echo "<label for=\"password\">Contraseña";
    echo "<input type=\"text\" name=\"password\" placeholder=\"Password\">";
    echo "</label>";
    echo "<br>";
    echo "<label for=\"captcha\"> " . $n1 . "+" . $n2;
    echo "<input type=\"text\" name=\"captcha\" placeholder=\"Captcha\">";
    echo "</label>";
    echo "<br>";
    echo "<input type=\"submit\" name=\"enviar\" value=\"enviar\">";
    echo "</form>";
} else {
    echo "<a href=\"http://localhost/multas/public/index.php/user/logout\"><h3>LogOut</h3></a>";
}
