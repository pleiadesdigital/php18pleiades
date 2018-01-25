<?php if (!isset($page_title)) { $page_title = 'Staff Area'; } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PHP18 - <?php echo h($page_title); ?></title>
	<!-- <link rel="stylesheet" type="text/css" media="all" href="<?php //echo WWW_ROOT . '/css/style.css'; ?>"> -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo url_for('css/style.css'); ?>">
</head>
<body>
	<div class="site-wrapper">

	<!-- HEADER -->
	<header>
		<section class="site-branding">
			<h1>PLM Staff Area</h1>
		</section><!-- class="site-branding" -->
		<nav class="main-nav">
			<ul>
				<li><a href="<?php echo url_for('/staff/index.php'); ?>">Menu</a></li>
			</ul>
		</nav>
	</header>

