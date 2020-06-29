<?php
require_once "../config/conexaoMysql.php";
$conexao = conexaoMysql();

$nome = "";
$email = "";
$celular = "";
$idade = (int) 0;
$operadora = (int) 0;
$precoApartamento = (double) 0.0;
$precoEnfermaria = (double) 0.0;

if ( isset($_POST['btn_envia']) ){
    // var_dump($_POST);
    $nome = $_POST['txt_nome'];
    $email = $_POST['txt_email'];
    $celular = $_POST['txt_celular'];
    $idade = $_POST['slt_idade'];
    $operadora = $_POST['slt_operadora'];

    $sql = "select * from operadora where id = $operadora";
    $select = mysqli_query($conexao, $sql);
    if($rsOperadora = mysqli_fetch_array($select)){
       
        $precoApartamento = $rsOperadora['preco_apartamento'];
        $precoEnfermaria =   $rsOperadora['preco_enfermaria'];
        
    }

    $idadeCalcBase = 0.0;
    $sql = "select * from faixa_etaria where id = $idade";
    $select = mysqli_query($conexao, $sql);
    if($rsIdade = mysqli_fetch_array($select)){
        $idadeCalcBase =  $rsIdade['calc_base'];
    }

    $precoEnfermaria =  $precoEnfermaria * $idadeCalcBase;
    $precoApartamento =  $precoApartamento * $idadeCalcBase;

    $url = "../index.php?txt_nome=$nome&txt_email=$email&txt_celular=$celular&slt_idade=$idade&slt_operadora=$operadora&precoApartamento=$precoApartamento&precoEnfermaria=$precoEnfermaria&btn_envia=simular#simulacao_planos";
    echo("
        <script>
            // alert('Selecione entre Enfermaria ou Apartamento e escolha o tipo de reembolso')
            window.location.href = '$url';
        </script>
    ");

}