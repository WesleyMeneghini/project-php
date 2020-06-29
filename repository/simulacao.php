<?php
require_once "../config/conexaoMysql.php";
$conexao = conexaoMysql();

$nome = "";
$email = "";
$celular = "";
$idade = (int) 0;
$operadora = (int) 0;
$enfermaria = 0;
$apartamento = 0;
$precoApartamento = (double) 0.0;
$precoEnfermaria = (double) 0.0;
$dataSimulacao = "";

if ( isset($_POST['btn_envia']) == 'simular') {
    var_dump($_POST);
    $nome = $_POST['txt_nome'];
    $email = $_POST['txt_email'];
    $celular = $_POST['txt_celular'];
    $operadora = $_POST['slt_operadora'];
    $tipo = $_POST['slt_tipo'];
    $idade = $_POST['slt_idade'];
    $reembolso = $_POST['slt_reembolso'];
    $dataSimulacao = date('y/m/d');

    if($tipo == 'enfermaria'){
        $enfermaria = 1;
    }else{
        $apartamento = 1;
    }

    $sql = "insert into plano(nome, email, telefone, fk_operadora, fk_faixa_etaria, fk_reembolso, enfermaria, apartamento, data_simulacao) 
        values('$nome', '$email', '$celular', $operadora, $idade, $reembolso, $enfermaria, $apartamento, '$dataSimulacao');";
    // echo($sql);

    if(mysqli_query($conexao, $sql)){
        // Redirecionar para uma determinada pagina
        echo("
            <script>alert('Olá $nome, em breve um de nossos corretores entrará em contato.!');
                window.location.href = '../index.php';
            </script>
        ");
    }else{
        echo("
            <script>
                alert('Erro ao fazer a simulação!');
                window.location.href = '../index.php';
            </script>
        ");
    }

}