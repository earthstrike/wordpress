<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<!-- Bootstrap (TODO: serve from site)-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- fonts (TODO: serve from site)-->
		<link href="https://fonts.googleapis.com/css?family=Passion+One:400,700|Work+Sans:400,600|Raleway" rel="stylesheet"> 

		<?php wp_head(); ?>
		<script>
			// conditionizr.com
			// configure environment tests
			conditionizr.config({
					assets: '<?php echo get_template_directory_uri(); ?>',
					tests: {}
			});
		</script>

	</head>

	<body <?php body_class(); ?>>

		<!-- header -->
		<header class="header clear" role="banner">

			<!-- logo -->
			<a href="<?php echo get_site_url(); ?>" alt="<?php bloginfo('name'); ?>"><img id="logo" src="<?php echo get_template_directory_uri().'/dist/img/es-logo.png'; ?>"></a>
			<!-- /logo -->

			<!-- nav -->
			<nav class="nav" role="navigation">
				<?php wp_nav_menu('header'); ?>
			</nav>
			<!-- /nav -->

		</header>
		<!-- /header -->

		<!-- wrapper -->
		<div class="wrapper">
