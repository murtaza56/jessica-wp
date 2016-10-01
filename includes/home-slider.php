<section class="jessica-slider">
  <ul class="rslides">

  	<?php
			$args = array(
				'post_type' => 'jessica_slider',
				'post_status' => 'publish',
				'order' => 'desc',
				'showposts' => 5
			);
			$post_loop = new WP_Query( $args );
			while ( $post_loop->have_posts() ) : $post_loop->the_post(); ?>

				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
				<li style="background-image:url(<?php echo $image['0']; ?>);"></li>

			<?php	endwhile; ?>
		<?php wp_reset_postdata(); ?>

  </ul>
</section>