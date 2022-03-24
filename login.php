<?php
header("Content-Type: application/json; charset=utf-8");
//header("Content-Type: text/html; charset=utf-8");

$response = array();
$response['erro'] = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //$user = $_POST['user'];
    //$password = $_POST['senha'];

    $user = 'email@email.com';
    $password = '123456';

    include 'db.php';
    $conn = new mysqli($HOSTNAME, $USER, $PASSWORD, $DB);
    mysqli_set_charset($conn, 'utf8');

    if ($conn->connect_errno) {
        die("Estamos com problema para iniciar o sistema");
    } else {
        $sql = "SELECT id, datacadastro, email, senha, ativo, perfil FROM tb_usuarios WHERE email ='" . $user . "' and senha =" . $password;

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //echo "tem resultado";
            $registro = mysqli_fetch_array($result);
            $response['erro'] = false;
            $response['linha'] = 'ok';
            $response['datacadastro'] = $registro['datacadastro'];
            $response['perfil'] = $registro['perfil'];
        } else {
            //echo 'Algo de errado não está certo';
            $response['mensagem'] = 'Usuário ou senha incorreto';
            $response['erro'] = true;
        }
        $conn->close();
    }
    echo json_encode($response);
}
