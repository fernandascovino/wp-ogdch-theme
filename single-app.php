<?php get_header(); ?>


<div class="container">
	<div class="grid">
		<?php if ( have_posts() ) : ?>
			Hi, my app is! Hi, my app is...chkchka Slim Shady
			<?php while ( have_posts() ) : the_post();?>
				<div class="grid__col grid__col--4-of-4">
					<h1 class="post__title"><?php the_title(); ?></h1>
					<?php the_content(); ?>
					<hr>
				</div>
			<?php endwhile; ?>

		<?php else : ?>
			Nix gefunden
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
