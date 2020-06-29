<?php

require_once "config/conexaoMysql.php";
$conexao = conexaoMysql();

$nome = "";
$email = "";
$celular = "";
$idade = (int) 0;
$operadora = "";
$precoApartamento = (float) 0.0;
$precoEnfermaria = (float) 0.0;
$botao = "buscar";

if (isset($_GET['txt_nome'])) {

    $precoApartamento = $_GET['precoApartamento'];
    $precoEnfermaria = $_GET['precoEnfermaria'];

    $nome = $_GET['txt_nome'];
    $email = $_GET['txt_email'];
    $celular = $_GET['txt_celular'];
    $idade = $_GET['slt_idade'];
    $operadora = $_GET['slt_operadora'];

    $botao = "simular";

    echo("
        <script>
            alert('Selecione entre Enfermaria ou Apartamento! Selecione o tipo de reembolso!')
            // window.location = '#simulacao_planos';
        </script>
    ");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="view/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="view/assets/css/aos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Saúde</title>
</head>

<body>
    <?php
        require_once "navbar.php";
    ?>

    <!-- <section class="container mb-5"> -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="height: 500px;">
            <div class="carousel-item active ">
                <img class="d-block w-100 " src="view/assets/img/slide_01.jpg" alt="First slide">
            </div>
            <div class="carousel-item ">
                <img class="d-block w-100 " src="view/assets/img/slide_02.jpg" alt="Second slide">
            </div>
            <div class="carousel-item ">
                <img class="d-block w-100 " src="view/assets/img/slide_01.jpg" alt="Third slide">
            </div>
            <div class="carousel-item ">
                <img class="d-block w-100 " src="view/assets/img/slide_02.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next " href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- </section> -->

    <!-- Sobre a empresa -->
    <section class="site-section " id="empresa">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- <span class="caption d-block mb-2 font-secondary font-weight-bold">Products &amp; Services</span> -->

                    <h2 class="site-section-heading text-uppercase text-center font-secondary mb-4">Nossa História</h2>

                </div>
            </div>

            <div class="site-half">
                <div class="img-bg-1" style="background-image: url('view/assets/img/slide_01.jpg');">

                </div>
                <div class="container">
                    <div class="row no-gutters align-items-stretch">
                        <div class="col-lg-5 ml-lg-auto py-5">
                            <!-- <span class="caption d-block mb-2 font-secondary font-weight-bold">Outstanding Services</span> -->
                            <h2 class="site-section-heading text-uppercase font-secondary mb-5">Possuímos 20 anos de tradição no
                                mercado de planos de saúde.</h2>
                            <p>
                                Possuímos 20 anos de tradição no
                                mercado de planos de saúde.
                                Com muito profissionalismo, integridade, imparcialidade e valorização das pessoas em cada processo do nosso trabalho, hoje atendemos mais de 2000 clientes nos mais variados setores.
                            </p>
                            <p>Para chegar onde estamos hoje trabalhamos para desenvolver um atendimento altamente personalizado e qualificado para cuidar de cada um de nossos clientes. Nosso maior compromisso é proporcionar a melhor experiência em saúde e bem-estar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <div class="site-section first-section ">
        <div class="container">
            <div class="card " style="padding: 32px;">
                <h2 class="site-section-heading text-uppercase text-center font-secondary" id="simulacao_planos">Simulação de Planos</h2>
                <div class="row">
                    <div class="col-md-12 col-lg-8 ">

                        <?php
                            if (isset($_GET['btn_envia'])) {
                        ?>
                            <form action="repository/simulacao.php" method="POST" id="form_simulacao">
                        <?php
                            } else {
                        ?>
                            <form action="repository/buscar_valor.php" method="POST" id="form_buscar>
                        <?php
                        }
                        ?>

                    <div class="form-group">
                                    <label for="txt_nome">Digite seu nome</label>
                                    <input type="text" value="<?= $nome ?>" name="txt_nome" class="form-control" id="txt_nome" required>
                                    <div class="invalid-feedback">
                                        Please enter a message in the textarea.
                                    </div>
                    <!-- </div> -->
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Digite seu e-mail</label>
                        <input type="email" name="txt_email" class="form-control" value="<?= $email ?>" id="txt_email" placeholder="name@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Digite seu celular</label>
                        <input type="text" name="txt_celular" value="<?= $celular ?>" class="form-control" id="txt_celular" onkeypress="return mascaraFone(this, event, 'celular');" required>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Qual a sua idade?</label>
                        <select id="idade" name="slt_idade" class="form-control" required>
                            <!-- <option selected disabled>Selecione sua idade</option> -->
                            <?php
                            $sql = "select * from faixa_etaria";
                            $select = mysqli_query($conexao, $sql);

                            while ($rsIdades = mysqli_fetch_array($select)) {
                                if (strcmp($idade, $rsIdades['id']) == 0) {
                            ?>
                                    <option value="<?= $rsIdades['id'] ?>" selected>
                                        <?= $rsIdades['range_idade'] ?>
                                    </option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $rsIdades['id'] ?>">
                                        <?= $rsIdades['range_idade'] ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Selecione a operadora</label>
                        <select id="operadora" name="slt_operadora" class="form-control" required>
                            <!-- <option selected disabled>Selecione a Operadora</option> -->
                            <?php
                            $sql = "select * from operadora";
                            $select = mysqli_query($conexao, $sql);

                            while ($rsOperadora = mysqli_fetch_array($select)) {
                                // var_dump($rsIdades['id']);
                                if ($rsOperadora['id'] == $operadora) {
                            ?>
                                    <option value="<?=$rsOperadora['id'] ?>" selected>
                                        <?= $rsOperadora['nome'] ?>
                                    </option>
                                <?php
                                } else {
                                ?>

                                    <option value="<?=$rsOperadora['id'] ?>">
                                        <?= $rsOperadora['nome'] ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <?php
                        if (!isset($_GET['btn_envia'])) {
                    ?>
                        <input type="submit" class="btn btn-primary mb-5" id="btn_envia" name="btn_envia" value="<?= $botao ?>"></button>
                        </form>
                    <?php
                        } else {
                    ?>
                        
                        <div class="form-group">
                            <label for="validationServer01">Selecione o tipo de reembolso</label>
                            <select id="operadora" name="slt_reembolso" class="form-control  is-invalid" required>
                                <option selected disabled>Selecione o tipo de reembolso</option>
                                <?php
                                $sql = "select * from reembolso";
                                $select = mysqli_query($conexao, $sql);

                                while ($rsReembolso = mysqli_fetch_array($select)) {
                                    // var_dump($rsIdades['id']);
                                    if ($rsReembolso['id'] == $reembolso) {
                                ?>
                                        <option value="<?= $rsReembolso['id'] ?>" selected>
                                            <?= $rsReembolso['nome'] ?>
                                        </option>
                                    <?php
                                    } else {
                                    ?>

                                        <option value="<?= $rsReembolso['id'] ?>">
                                            <?= $rsReembolso['nome'] ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Selecione uma das opçoes
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationServer02">Selecione o tipo</label>
                            <select id="tipo" name="slt_tipo" class="form-control is-invalid" required>
                                <option selected disabled>Selecione entre Enfermaria e Apartamento</option>
                                <option value="enfermaria">
                                    R$ <?= number_format($precoEnfermaria, 2, '.', '') ?> - Enfermaria
                                </option>
                                <option value="apartamento">
                                    R$ <?= number_format($precoApartamento, 2, '.', '') ?> - Apartamento
                                </option>
                            </select>
                            <div class="invalid-feedback">
                                Selecione uma das opçoes
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary mb-5" id="btn_envia" name="btn_envia" value="<?= $botao ?>"></button>
                        </form>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    


    <?php
        require_once "footer.php";
    ?>

    <script src="view/js/mascara.js"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script>
        // $('#form_simulacao').submit(function(e) {
        //     e.preventDefault();
        //     // console.log(e)
        //     const nome = $('input[name="txt_nome"]').val();
        //     const email = $('input[name="txt_email"]').val();
        //     const celular = $('input[name="txt_celular"]').val();
        //     const idade = $("#idade option:selected").val();
        //     const operadora = $("#operadora option:selected").val();

        //     window.location.href = `?#form_simulacao&nome=${nome}&email=${email}&celular=${celular}&idade=${idade}&operadora=${operadora}`;

        // });
    </script>
</body>

</html>