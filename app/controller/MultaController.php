<?php

require_once('../app/controller/BaseController.php');
require_once('../app/models/Multas.php');
require_once('../app/models/Conductores.php');

class MultaController extends BaseController
{

    //Mostrar todos los usuarios

    public function actionMultaList()
    {
        $data = [];
        $objectUser = Multas::getInstancia();
        $users = $objectUser->getAllMultas();

        $this->renderHtml('../views/listMultas_view.php', $users);
    }

    public function actionPagarMulta($url)
    {

        $data = array();
        $objectMulta = Multas::getInstancia();

        $expresionRegular = "/.+\/(\d+)$/";
        preg_match($expresionRegular, $url, $matches);
        $id = $matches['1'];
        $data = $objectMulta->get($id);
        if ($_POST) {
            $objectMulta->pagarMulta($id);
            header('location:' . DIRURL . '/multa/list');
        }
        $this->renderHtml('../views/pagarmulta_view.php', $data[0]);
    }

    public function actionMultasImpuesta()
    {
        $data = [];
        $objectMulta = Multas::getInstancia();
        $data = $objectMulta->getMultaByAgente($_SESSION["id_agente"]);

        $this->renderHtml('../views/sancionesimpuestas_view.php', $data);
    }

    public function actionNuevaSancion()
    {
        $data = array();
        $objectConductor = Conductores::getInstancia();
        $data = $objectConductor->getAllConductores();
        if ($_POST) {
            $objectMulta = Multas::getInstancia();
            $objectMulta->setId_agente($_POST['id_agente']);
            $objectMulta->setId_conductor($_POST['id_conductor']);
            $objectMulta->setMatricula($_POST['matricula']);
            $objectMulta->setId_tipo_sanciones($_POST['id_tipo_sanciones']);
            if ($_POST['id_tipo_sanciones'] == 1) {
                $objectConductor->quitarPuntos(4, $_POST['id_conductor']);
            } elseif ($_POST['id_tipo_sanciones'] == 2) {
                $objectConductor->quitarPuntos(6, $_POST['id_conductor']);
            } else {
                $objectConductor->quitarPuntos(8, $_POST['id_conductor']);
            }
            $objectMulta->setDescripcion($_POST['descripcion']);
            $objectMulta->setFecha($_POST['fecha']);
            $objectMulta->setImporte($_POST['importe']);
            $objectMulta->setDescuento($_POST['descuento']);
            $objectMulta->setEstado("Pendiente");
            $objectMulta->set();
        }

        $this->renderHtml('../views/nuevasancion_view.php', $data);
    }
}
