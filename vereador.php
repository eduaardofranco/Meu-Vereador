<!DOCTYPE html>
<html lang="pt">
	<head>
		<?php
			ob_start();
			include("includes/head.php");
		?>
	</head>
	<body>
		<?php include 'includes/header.php' ?>
		<?php
			

			require_once('phpQuery/phpQuery-onefile.php');
			//load each vereador page
			$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$link = explode('=',$actual_link);
			$url = $link[count($link) - 1];
			$urlVereador = 'http://www.camarapf.rs.gov.br/' .$url;
			$html = file_get_contents($urlVereador);
			phpQuery::newDocument($html);

		?>
		<section class="vereador section">
			<?php
				$vereadorName = pq('.team-member-info h2')->text();

				//pega o nome do vereador e joga pro title da página
				$buffer=ob_get_contents();
				ob_end_clean();
				$buffer=str_replace("%TITLE%","Meu Vereador - " .$vereadorName,$buffer);
				echo $buffer;


				$img = pq('.team-member-image')->attr('src');
				$title = pq('.team-member-image')->attr('alt');
				$vereadorText = pq('.team-member-more');
				$vereadorText = pq('.team-member-more')->attr('class', 'vereador__text');
				$email = pq('.team-member-info .job')->eq(1)->text();
				$phone = pq('.team-member-info .job')->eq(2)->text();
				pq('.social-media')->remove();

				// news
				$amount = pq('.col-lg-6.col-md-6.col-sm-6 li')->length;
				pq('.col-lg-6.col-md-6.col-sm-6 li')->prepend('<i class="icon-arrow"></i>');
			?>
			<div class="content clearfix">
				<div class="vereador__left">
					<img class="vereador__img" src="<?php echo $img ?>" alt="<?php echo $title ?>" title="<?php echo $title ?>">
				</div>
				<div class="desc">
					<h3 class="vereador__name title-page"><?php echo $vereadorName ?></h3>
					<?php echo $vereadorText ?>
					<p class="vereador__email"><i class="icon-mail"></i><?php echo $email ?></p>
					<p class="vereador__phone"><i class="icon-phone"></i> (54)<?php echo $phone ?></p>
				</div>
				<div class="line line--big line--fleft"><span></span><span></span><span></span></div>


				<div class="projects">
					<h2 class="title-sec">Projetos do Vereador</h2>
					<?php 
						$projects = pq('.col-lg-3.col-md-3.col-sm-3:first .menu li');
						pq('.col-lg-3.col-md-3.col-sm-3:first .menu li')->removeAttr('style');
						pq('.col-lg-3.col-md-3.col-sm-3:first .menu li')->prepend('<i class="icon-arrow"></i>');
						pq('.col-lg-3.col-md-3.col-sm-3:first .menu li a')->removeAttr('style');
					?>
					<ul class="news__list clearfix">
						<?php echo $projects ?>
					</ul>
				</div><!--.projects-->


				<div class="news">
					<h2 class="title-sec">Últimas Notícias</h2>
					<ul class="news__list">
						<?php for($i = 0; $i < $amount; $i++) { ?>
							<?php
								$newsDate = pq('.col-lg-6.col-md-6.col-sm-6 li')->eq($i);
								pq('.col-lg-6.col-md-6.col-sm-6 li')->eq($i)->removeAttr('style');
								//remove o target blank
								$href = pq('.col-lg-6.col-md-6.col-sm-6 li a')->eq($i)->attr('target','');
								//pega o href de cada notícia
								$href = pq('.col-lg-6.col-md-6.col-sm-6 li a')->eq($i)->attr('href');
								//da um explode e transforma em um array
								$href = explode('/',$href);
								// pega os últimos dois valores do array
								$href = array_slice($href, -2);
								// da um implode pra juntar a string
								$href = $comma_separated = implode("/", $href);
								//joga a string pro href
								pq('.col-lg-6.col-md-6.col-sm-6 li a')->eq($i)->attr('href','noticia.php?=' .$href);
							?>
							<?php echo $newsDate ?>
						<?php } ?>
					</ul>
				</div><!--.news-->
			</div><!--.content-->
		</section>
		<?php include 'includes/footer.php' ?>

		<!--Javascript-->
		<script src="assets/js/main.js"></script>
	</body>
</html>