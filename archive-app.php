<?php get_header(); ?>
<?php get_template_part( 'content', 'breadcrumb' ); ?>

<div class="container">

	<div class="row">
		<div class="col-xs-12">
			<h1><?php post_type_archive_title(); ?></h1>
		</div>
		<div class="col-xs-12">
			<p><?php esc_attr_e( 'Did you build an App with Data listed in our catalogue and would like to share it with us?' ,'ogdch' ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url( get_page_link_by_slug( 'contact' ) ); ?>" role="button"><?php esc_attr_e( 'Contact us', 'ogdch' ); ?></a>
		</div>
	</div>

	<hr />

	<?php
	$args = array(
		'post_type' => 'app',
		'post_status' => 'publish',
		// @codingStandardsIgnoreStart
		'posts_per_page' => -1,
		// @codingStandardsIgnoreEnd
	);
	// The Query
	$app_query = new WP_Query( $args );

	// The Loop
	if ( $app_query->have_posts() ) {
		while ( $app_query->have_posts() ) {
			$app_query->the_post();
			get_template_part( 'partials/app', 'entry' );
		}
	}
	/* Restore original Post Data */
	wp_reset_postdata();
	?>

</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
