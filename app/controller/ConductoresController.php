<?php

require_once('../app/controller/BaseController.php');
require_once('../app/models/Conductores.php');

class ConductoresController extends BaseController
{

    //Mostrar todos los usuarios

    public function actionListConductores()
    {
        $data = [];
        $objectConductor = Conductores::getInstancia();
        $data = $objectConductor->getAllConductores();

        if (isset($_POST["buscar"])) {
            $data = $objectConductor->getConductoresByNombre($_POST["nombre"]);
        }

        $this->renderHtml('../views/listConductores_view.php', $data);
    }
}
