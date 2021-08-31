<?php
require_once('../app/controller/BaseController.php');
require_once('../app/models/Auth.php');

class AuthController extends BaseController
{

    //login

    public function actionLogin()
    {
        $procesaFormulario = false;
        $email = "";
        $password = "";
        $msnErrorEmail = "";
        $msnErrorPassword = "";


        if (!empty($_POST)) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $procesaFormulario = true;
        }
        if ($procesaFormulario) {
            $objectAuth = Auth::getInstancia();
            $datosLogin = $objectAuth->login($email, $password);
            // var_dump($datosLogin);
            // die();

            // echo $objectAuth->
            if (count($datosLogin) == 1) {

                if ($_SESSION["captcha"] == $_POST["captcha"]) {
                    $_SESSION['perfil'] = $datosLogin[0]['perfil'];
                    $_SESSION['id_agente'] = $datosLogin[0]['id'];
                }
            } else {

                $_SESSION["perfil"] = "invitado";
            }
        }
        header('location: http://localhost/multas/public/index.php/multa/list');
    }

    public function actionLogout()
    {
        unset($_SESSION['perfil']);
        session_destroy();
        header('location: http://localhost/multas/public/index.php/multa/list');
    }
}
