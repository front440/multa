<?php

require_once("../app/config/parameters.php");
require_once("../app/models/Multas.php");

$objectMulta = Multas::getInstancia();


$objectMulta->setId(2);
$objectMulta->setId_conductor(2);
$objectMulta->setMatricula("1892DHZ");
$objectMulta->setId_tipo_sanciones(2);
$objectMulta->setDescripcion("Conductor ebrio");
$objectMulta->setFecha("2021-06-14");
$objectMulta->setImporte(300);
$objectMulta->setDescuento(10);
$objectMulta->setEstado("Pagada");
$objectMulta->edit();

