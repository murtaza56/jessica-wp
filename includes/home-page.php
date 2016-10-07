<?php if ( is_active_sidebar( 'homepage-bulletin' ) || is_active_sidebar( 'homepage-icons' ) ) : ?>
	<section class="home-icons clearfix">
		<div class="wrap">
			<?php dynamic_sidebar( 'homepage-bulletin' ); ?>
			<?php dynamic_sidebar( 'homepage-icons' ); ?>
		</div>
	</section>
<?php endif; ?>

<?php if ( is_active_sidebar( 'homepage-cta' ) ) : dynamic_sidebar( 'homepage-cta' ); endif; ?>

<section class="home-recent-posts">
  <div class="wrap clearfix">

  	<h2>Recent Blog Posts</h2>

  	<?php
  		$args = array(
  			'post_type' => 'post',
  			'post_status' => 'publish',
  			'order' => 'desc',
  			'showposts' => 3
  		);
  		$post_loop = new WP_Query( $args );
  		while ( $post_loop->have_posts() ) : $post_loop->the_post(); ?>

	  	<article class="home-posts clearfix">

	  		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
	  		<?php if(has_post_thumbnail()) : ?>
					<figure style="background-image:url(<?php echo $image['0']; ?>);"></figure>
				<?php else : ?>
					<figure style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/slider-1.jpg);"></figure>
				<?php endif; ?>

	    		<div class="home-excerpt">
	    		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	    		<ul>
	    			<li><span class="fa fa-calendar"></span><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time('M j, Y'); ?></time></li>
	    			<li><span class="fa fa-pencil"></span>Posted by <?php the_author(); ?></a></li>
	    		</ul>
	    		<?php the_excerpt(); ?>
	    	</div>
	  	</article>

	  	<?php	endwhile; ?>
  	<?php wp_reset_postdata(); ?>

  </div>
</section>