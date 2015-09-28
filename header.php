<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if !IE]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav class="navbar navbar-default" id="main-navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navigation-collapse">
				<span class="sr-only"><?php esc_attr_e( 'Toggle navigation', 'ogdch' ); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>"><span>opendata</span>.swiss</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="main-navigation-collapse" role="navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'main_navigation',
				'menu_class'     => 'nav navbar-nav navbar-right',
				'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s<li class="search"><a href="' . esc_url( home_url() ) . '">' . __( 'Search', 'ogdch' ) . '</a></li></ul>',
			) );
			?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container -->
</nav>
