<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed:300,400,600|Roboto+Condensed" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo url_for('/styles/style.css'); ?>">
  <title>Pleiades Moon <?php if (isset($page_title)) { echo '- ' . h($page_title); } ?></title>
</head>
<body>
	<div class="site-wrapper">

    <!-- HEADER -->
    <header>

      <section class="site-branding">
        <h1>PLM Public Area</h1>
        <a href="<?php echo url_for('/index.php'); ?>">
          <img src="<?php echo url_for('/images/gbi_logo.png'); ?>" width="298" height="71" alt="Pleiades Moon">
        </a>
      </section><!-- class="site-branding" -->

      <nav class="main-nav">
        <ul>
          <li><a href="<?php echo url_for('/staff/index.php'); ?>">Private</a></li>
        </ul>
      </nav>

    </header>
