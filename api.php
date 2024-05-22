<?php
include 'config/Database.php';
include 'dao/UsuarioDAO.php';
include 'models/Usuario.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $usuarioDAO = new UsuarioDAO();

    switch ($action) {
        case 'login':
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $usuario = new Usuario();
            $usuario->setEmail($email);
            $usuario->setSenha($senha);

            if ($usuarioDAO->login($usuario)) {
                echo json_encode(["status" => "success", "message" => "Login successful"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Invalid login"]);
            }
            break;

        // Adicione outros casos conforme necessário

        default:
            echo json_encode(["status" => "error", "message" => "Invalid action"]);
            break;
    }
}
?>
