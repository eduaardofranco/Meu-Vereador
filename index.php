<!DOCTYPE html>
<html lang="pt">
	<head>
	 	<?php include 'includes/head.php'; ?>
	</head>
	<body>
		<div class="cover-container">
			<div class="cover-container__item"></div>
			<div class="cover-container__scroll js-scroll" data-scroll="#vereadores-list">
				<i class="icon-scroll"></i>
			</div>
		</div>
		<section id="vereadores-list" class="section">
		<?php
		    require_once('phpQuery/phpQuery-onefile.php');
		    $url = 'http://www.camarapf.rs.gov.br/vereadores';
		    $html = file_get_contents($url);
		    phpQuery::newDocumentHTML($html);
		    $vereadoresList = pq('.team-member');
		    $amount = pq('.team-member')->length;

		    //remove atributes
		    $name = pq('.team-member h2')->removeAttr('style');
		    $a = pq('.team-member a')->removeAttr('class');
		    $p = pq('.team-member p')->remove();
		    $p = pq('.team-member .social-media')->remove();
		?>
			<div class="content">
				<h1 class="title-page">Vereadores Passo Fundo - RS</h1>
				<div class="list-vereadores clearfix">
				  <?php for($i = 0; $i < $amount; $i++) { ?>
				  		<?php 
				  			$item = pq('.team-member')->eq($i);
				  			$test = pq('.team-member > a')->eq($i)->attr('href');
				  			echo $item;
				  			pq('.team-member > a')->Attr('href',$test);
				  			// $oi =  explode( '/', $test );
							// echo $oi;
				  			// echo pq($test)->split('/');
		    			?>
				  <?php } ?>
				</div>
			</div>
		</section>

		<?php include'includes/footer.php' ?>

		<!--Javascript-->
		<script src="assets/js/main.js"></script>
	</body>
</html>