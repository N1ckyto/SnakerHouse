<?php
require_once './app/models/auth.model.php';
require_once './app/views/auth.view.php';

class AuthController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new AuthModel();
        $this->view = new AuthView();
    }

    public function showLogin()
    {
        // Muestro el formulario de login
        return $this->view->showLogin();
    }

    public function login()
    {
        if (!isset($_POST['usuario']) || empty($_POST['usuario'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }

        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }

        $user = $_POST['usuario'];
        $password = $_POST['password'];

        // Verificar que el usuario está en la base de datos
        $userFromDB = $this->model->getUser($user);

        // password: admin
        // $userFromDB->password: $2y$10$c0vX38PKVKvh9O9nCeHQjO00.tZ4VJSiAYZ4R7CtEGO02GWrjl0dm
        if ($userFromDB && password_verify($password, $userFromDB->password)) {
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['NAME_USER'] = $userFromDB->usuario;
            $_SESSION['LAST_ACTIVITY'] = time();

            // Redirijo a propiedades
            header('Location: ' . BASE_URL . 'propiedades');
        } else {
            return $this->view->showError('Credenciales incorrectas');
        }
    }

    public function logout()
    {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se buscó
        header('Location: ' . BASE_URL);
    }
}
