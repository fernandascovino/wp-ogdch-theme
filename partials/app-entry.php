<?php
$icon_id      = get_post_meta( get_the_ID(), '_app-showcase-app_icon_id', true );
$author_name  = get_post_meta( get_the_ID(), '_app-showcase-app_author_name', true );
$author_email = get_post_meta( get_the_ID(), '_app-showcase-app_author_email', true );
$version      = get_post_meta( get_the_ID(), '_app-showcase-app_version', true );
$related_datasets = get_post_meta( get_the_ID(), '_app-showcase-app_relations', true );
?>

<div class="row">
	<div class="col-md-3">
		<?php
		echo wp_get_attachment_image( $icon_id, 'app-image' );
		?>
	</div>
	<div class="col-md-9">
		<?php
		echo '<h2>' . esc_html( get_the_title() ) . '</h2>';
		echo '<p class="small">';
		echo 'Author: <a href="mailto:' . esc_attr( $author_email ) . '">' . esc_attr( $author_name ) . '</a>';
		if( !empty( $version ) ) {
			echo ' | Version: ' . esc_attr( $version );
		}
		echo '</p>';
		echo '<p>' . the_content() . '</p>';
		if( !empty($related_datasets) ) {
			echo '<div class="collapse" id="collapsed-related-' . get_the_ID() . '">';
			echo '<ul>';
			foreach($related_datasets as $dataset) {
				echo '<li>' . $dataset['dataset_id'] . '</li>';
			}
			echo '</ul>';
			echo '</div>';
			echo '<p class="small"><a id="collapsed-related-' . get_the_ID() . '-link" data-toggle="collapse" href="#collapsed-related-' . get_the_ID() . '" aria-expanded="false" aria-controls="collapsed-related-' . get_the_ID() . '">Show related datasets</a></p>';
		}

		?>
	</div>
</div>
