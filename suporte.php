<?php
	require_once "config/conexaoMysql.php";
	$conexao = conexaoMysql();
	header("Content-type: text/html; charset=utf-8"); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="view/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="view/assets/css/aos.css">
	<link rel="stylesheet" type="text/css" href="view/assets/css/suporte.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Contato</title>
</head>

<body>
	<?php
	require_once "navbar.php";
	?>


	<section class="accordion-section clearfix mt-5 mb-5" aria-label="Question Accordions" style="min-height: 500px;">
		<div class="container">
			<h3> Qual a sua dúvida? </h3>
			<form action="#" method="POST">
				<div class="row">
					<div class="col">
						<input class="form-control mr-sm-2" style="height: 40px;" name="txt_pesquisa" type="search" placeholder="Search" aria-label="Search" required>

					</div>
					<div class="col">
						<button class="btn btn-outline-success my-2 my-sm-0" style="height: 40px;" type="submit" name="btn_busca">Digite sua dúvida</button>

					</div>
				</div>
			</form>

			<div class="panel-group mt-4" id="accordion" role="tablist" aria-multiselectable="true">
			<?php

			if (isset($_POST['btn_busca'])) {
				
				$pesquisa = $_POST['txt_pesquisa'];
				
				$sql = "select * from suporte where pergunta like '%$pesquisa%';";
				// echo($sql);
				$select = mysqli_query($conexao, utf8_decode($sql));	
				
				while($rsSuporte = mysqli_fetch_array($select)){
			
			?>
			
			<div class="panel panel-default">

				<div class="panel-heading p-3 mb-3" role="tab" id="<?='heading'.$rsSuporte['id']?>">

					<h3 class="panel-title">
						<a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="<?='#collapse'.$rsSuporte['id']?>" aria-expanded="true" aria-controls="<?='collapse'.$rsSuporte['id']?>">
						<?= utf8_encode( $rsSuporte['pergunta'])?>
						</a>
					</h3>
				</div>
				<div id="<?='collapse'.$rsSuporte['id']?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?='heading'.$rsSuporte['id']?>">
					<div class="panel-body px-3 mb-4">
					<p><?=utf8_encode( $rsSuporte['resposta'])?></p>
					</div>
				</div>
			</div>


			<?php
				}
			}else{
				
				
				$sql = "select * from suporte;";
				$select = mysqli_query($conexao, $sql);	
				
				while($rsSuporte = mysqli_fetch_array($select)){
			?>
				<div class="panel panel-default">

				<div class="panel-heading p-3 mb-3" role="tab" id="<?='heading'.$rsSuporte['id']?>">

					<h3 class="panel-title">
						<a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="<?='#collapse'.$rsSuporte['id']?>" aria-expanded="true" aria-controls="<?='collapse'.$rsSuporte['id']?>">
							<?= utf8_encode( $rsSuporte['pergunta'])?>
						</a>
					</h3>
				</div>
				<div id="<?='collapse'.$rsSuporte['id']?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?='heading'.$rsSuporte['id']?>">
					<div class="panel-body px-3 mb-4">
						<p><?=utf8_encode( $rsSuporte['resposta'])?></p>
					</div>
				</div>
			</div>



			<?php
			}}
			?>

			</div>




			

		</div>
	</section>






	<?php
	require_once "footer.php";
	?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>