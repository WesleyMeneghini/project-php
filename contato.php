<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="view/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="view/assets/css/style-adicional.css">
    <link rel="stylesheet" type="text/css" href="view/assets/css/aos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Contato</title>
</head>

<body>
    <?php
    require_once "navbar.php";
    ?>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact mt-5">
        <div class="container">

            <div class="section-title">
                <h2>Contato</h2>
                <p>Localize o endereço de nossa empresa. Cao tenha interesse em nos contatar, preencha o formulário abaixo</p>
            </div>
        </div>

        <div>
            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.102915356801!2d-46.900270784944034!3d-23.528800584698985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf0154039cb55b%3A0xadf34a919f156950!2sSENAI%20Jandira%20-%20Professor%20Vicente%20Amato!5e0!3m2!1spt-BR!2sbr!4v1593404683481!5m2!1spt-BR!2sbr" frameborder="0" allowfullscreen></iframe>

        </div>

        <div class="container">
            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Lacalização:</h4>
                            <p>Rua Elton Silva, 905 - Centro, Jandira - SP, 06600-025</p>
                        </div>

                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p>senai@senaisp.edu.br</p>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Telefone:</h4>
                            <p>(11) 4772-4700</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <form action="repository/contato.php" method="post" role="form" class="php-email-form">
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Seu Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="celular" id="celular" placeholder="Seu Telefone" data-rule="celular" data-msg="Please enter a valid phone" 
                                onkeypress="return mascaraFone(this, event, 'celular');" required />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Seu Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="7" data-rule="required" data-msg="Please write something for us" placeholder="Mensagem"></textarea>
                            <div class="validate"></div>
                        </div>
                        <!-- <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div> -->
                        <!-- <div class="text-center"> -->
                        <input class="btn btn-primary mb-5" type="submit" name="btn_send" value="Enviar Mensagem"></input>
                        <!-- </div> --> 
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

    <?php
    require_once "footer.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




<script src="view/js/mascara.js"></script>

</body>