<!DOCTYPE html>
<html lang="pt">
	<head>
		<?php
			ob_start();
			include("includes/head.php");
		?>
	</head>
	<body>
		<!-- cover container -->
		<?php include 'includes/header.php' ?>
		<!-- menu -->
		<?php include 'includes/menu.php' ?>
		
		<?php
			

			require_once('phpQuery/phpQuery-onefile.php');
			//load each vereador page
			$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$link = explode('?',$actual_link);
			$url = $link[count($link) - 1];
			$urlVereador = 'http://www.camarapf.rs.gov.br/projetos/' .$url;
			$html = file_get_contents($urlVereador);
			phpQuery::newDocument($html);

			$vereador = pq('h2:last');
			$vereador = explode('.',$vereador);
			$vereador = $vereador[count($vereador) - 1];

			//title
			$buffer=ob_get_contents();
			ob_end_clean();
			$buffer=str_replace("%TITLE%","Projetos - " .$vereador,$buffer);
			echo $buffer;

		?>
		<section class="vereador section">
			<div class="content clearfix">
				<h1 class="title-page">Projetos vereador <?php echo $vereador ?></h1>
				<ul>
					<?php 
						$itens = pq('.issue-block')->length();
						for ($i = 0; $i <= $itens; $i++) {
							$projeto = pq('.issue-block')->eq($i);
					?>
					<li><?php echo $projeto ?></li>
					<?php } ?>
				</ul>
			</div><!--.content-->
		</section>
		<?php include 'includes/footer.php' ?>

		<!--Javascript-->
		<script src="assets/js/main.js"></script>
	</body>
</html>