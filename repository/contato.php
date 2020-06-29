<?php
require_once "../config/conexaoMysql.php";
$conexao = conexaoMysql();

if(isset($_POST['btn_send'])){

    $nome = $_POST['name'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "insert into contato(nome, celular, email, message) values
    ('$nome', '$celular', '$email', '$message'); ";

    if(mysqli_query($conexao, $sql)){
        // Redirecionar para uma determinada pagina
        echo("
            <script>alert('Olá $nome, sua mensagem foi enviada com sucesso!');
                window.location.href = '../contato.php';
            </script>
        ");
    }else{
        echo("
            <script>
                alert('Erro ao enviar mensagem!');
                window.location.href = '../contato.php';
            </script>
        ");
    }
}