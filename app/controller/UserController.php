<?php

require_once('../app/controller/BaseController.php');
require_once('../app/models/User.php');

class UserController extends BaseController
{

    //Mostrar todos los usuarios

    /* public function actionListUser()
    {
        $users = [];
        $objectUser = Users::getInstancia();
        $users = $objectUser->getAllUsers();

        $this->renderHtml('../views/listUsers_view.php', $users);
    } */

    // Mostar solo un usuario
    public function showUser($id)
    {

        $objectUser = Users::getInstancia();
        $users = $objectUser->get($id);

        $this->renderHtml('../views/userOnly_view.php', $users);
    }

    public function actionRegister()
    {
        $procesaFormulario = false;
        $claseError = "";
        $msgError = "";
        $email = "";
        $pass1 = "";
        $pass2 = "";
        $msg = ["mensaje" => "usuario creado"];

        if (isset($_POST['enviar'])) {
            echo "eenta";
            $procesaFormulario = true;
            $email = $_POST['email'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            if (empty($email)) {
                $msgError = "el campo no puede estar vacio";
                $claseError = "clase_error";
                $procesaFormulario = false;
            }
            if (empty($pass1)) {
                $msgError = "el campo no puede estar vacio";
                $claseError = "clase_error";
                $procesaFormulario = false;
            }
            if (empty($pass2)) {
                $msgError = "el campo no puede estar vacio";
                $claseError = "clase_error";
                $procesaFormulario = false;
            }
            if ($pass1 != $pass2) {
                $msgError = "las contraseñas no coinciden";
                $claseError = "clase_error";
                $procesaFormulario = false;
            }

            if ($procesaFormulario) {
                $user = Users::getInstancia();
                $user->setEmail($email);
                $user->setPassword($pass1);
                $user->setPerfil('usuario');
                $user->set();
                header('location:' . DIRURL . '/obra/list');
            }
        }
        $this->renderHtml('../views/register_view.php', $msg);
    }
}
