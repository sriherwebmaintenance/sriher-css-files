<?php get_header();
add_action('wp_footer','scripts',25);
function scripts(){ ?>
    <script>
        $(document).ready(function(){
        });


    </script><?php
}
 ?>
<div class="search_page">
<section class="page-wrap clearfix">
	<div class="container">
		<div class="content">

			<div class="search-sec clearfix">
				<?php if (have_posts()):
					while (have_posts()) : the_post(); ?>
						<div class="search_post">
							<?php /*if( has_post_thumbnail() ) {
								$thumb = get_the_post_thumbnail_url( get_the_ID(), 'full');
							} else {
								$thumb = get_template_directory_uri().'/images/img-placeholder.jpg';
							}
							$thumb_params = array( 'width' => 460, 'height' => 460 );
							$thumb_crp = bfi_thumb( $thumb, $thumb_params ); ?>
							<div class="search-thumb">
								<img src="<?php if($thumb_crp) { echo $thumb_crp; } else { echo $thumb; } ?>" alt="<?php the_title(); ?>" />
							</div>
							<?php */?>
							<div class="text-box">
								<h2 class="search-post-title">
									<a href="<?php the_permalink(); ?>"><?php echo substr( get_the_title(), 0, 20 ); ?><?php if( strlen(get_the_title()) > 20 ) { echo '...'; } ?></a>
								</h2>
								<div class="sear_cont <?php if ( has_post_thumbnail() ) { echo 'sear_cont_thum'; }?>">
									<?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?>
								</div>
								<a class="sear_read" href="<?php the_permalink(); ?>">Read More</a>
							</div>
						</div>
					<?php endwhile;?>
					<div class="navigation row">
						<div class="alignleft"><?php next_posts_link('&laquo; Previous') ?></div>
						<div class="alignright"><?php previous_posts_link('Next &raquo;') ?></div>
					</div>
				<?php else : ?>
						<h2 class="center">Not Found</h2>
						<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php endif; ?>
			</div>
		</div>

   </div>
</section>
</div>
<?php get_footer(); ?>