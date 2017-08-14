<!DOCTYPE html>
<html lang="pt">
	<head>
	 	<?php include 'includes/head.php'; ?>
	</head>
	<body>
		<header class="header">
			<i class="icon-back"></i>
			<a href="index.php">Voltar à página inicial</a>
		</header>
		<?php
			require_once('phpQuery/phpQuery-onefile.php');
			//load each vereador page
			$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$link = explode('=',$actual_link);
			$url = $link[count($link) - 1];
			$urlVereador = 'http://www.camarapf.rs.gov.br/' .$url;
			$html = file_get_contents($urlVereador);
			phpQuery::newDocumentHTML($html);

		?>
		<section class="vereador section">
			<?php
				$vereadorName = pq('.team-member-info h2')->text();
				$img = pq('.team-member-image')->attr('src');
				$title = pq('.team-member-image')->attr('alt');
				$vereadorText = pq('.team-member-more');
				pq('.team-member-more .justify')->remove();
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
					<p class="vereador__phone"><i class="icon-phone"></i><?php echo $phone ?></p>
				</div>
				<div class="line line--big line--fleft"><span></span><span></span><span></span></div>
				<div class="news">
					<h2 class="title-sec">Últimas Notícias</h2>
					<ul class="news__list">
						<?php for($i = 0; $i < $amount; $i++) { ?>
							<?php
								$newsDate = pq('.col-lg-6.col-md-6.col-sm-6 li')->eq($i);
								pq('.col-lg-6.col-md-6.col-sm-6 li')->eq($i)->removeAttr('style');
							?>
							<?php echo $newsDate ?>
						<?php } ?>
					</ul>
				</div>
			</div>
		</section>
		<?php include 'includes/footer.php' ?>

		<!--Javascript-->
		<script src="assets/js/main.js"></script>
	</body>
</html>