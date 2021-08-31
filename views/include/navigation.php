<?php

echo "<nav>";
echo "<ul class=\"navigation\">";
echo "<li>";
echo "<a href=\"" . DIRURL . "/multa/list\">Home</a>";
echo "</li>";
if ($_SESSION['perfil'] == 'agente') {
    echo "<li>";
    echo "<a href=\"" . DIRURL . "/sanciones\">Sanciones</a>";
    echo "</li>";
    echo "<li>";
    echo "<a href=\"" . DIRURL . "/nuevasancion\">Nueva Sanción</a>";
    echo "</li>";
}
if ($_SESSION['perfil'] == 'admin') {
    echo "<li>";
    echo "<a href=\"" . DIRURL . "/conductores\">Conductores</a>";
    echo "</li>";
}
echo "</ul>";

echo "</nav>";
