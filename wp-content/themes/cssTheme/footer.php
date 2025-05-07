
	<section class="start-journey">
        <div class="container">
			<?php if($content=get_field('content','option')){?>
				<div class="content	">
					<?php echo preg_replace('/<p[^>]*>/', '',$content)?>
				</div>
			<?php }?>

        </div>
    </section>
	<footer>
		<div class="container">
			<div class="footer-wrap">
					<div class="footer-content">
						<div class="footer-left">
							<?php if($footer_logo=get_field('footer_logo','option')){?>
								<img src="<?php echo $footer_logo?>" alt="footer-logo">
							<?php }?>


							<?php if($footer_contact_details=get_field('footer_contact_details','option')){?>
								<?php //echo preg_replace('/<p[^>]*>/', '',$footer_contact_details)?>
								<?php echo $footer_contact_details?>
							<?php }?>
						</div>
						<div class="footer-right">
							<div class="card">
								<?php $footer_first_col_menu = get_term(get_nav_menu_locations()['footer_first_col_menu'], 'nav_menu'); ?>
								<h3><?php echo $footer_first_col_menu->name; ?></h3>
								<?php  wp_nav_menu(array( 'container' => '', 'theme_location' => 'footer_first_col_menu' )); ?>
							</div>
							<div class="card">
								<?php $footer_second_col_menu = get_term(get_nav_menu_locations()['footer_second_col_menu'], 'nav_menu'); ?>
								<h3><?php echo $footer_second_col_menu->name; ?></h3>
								<?php  wp_nav_menu(array( 'container' => '', 'theme_location' => 'footer_second_col_menu' )); ?>
							</div>
							<div class="card">
								<?php $footer_third_col_menu = get_term(get_nav_menu_locations()['footer_third_col_menu'], 'nav_menu'); ?>
								<h3><?php echo $footer_third_col_menu->name; ?></h3>
								<?php  wp_nav_menu(array( 'container' => '', 'theme_location' => 'footer_third_col_menu' )); ?>
							</div>
							<div class="card">
								<?php $footer_fourth_col_menu = get_term(get_nav_menu_locations()['footer_fourth_col_menu'], 'nav_menu'); ?>
								<h3><?php echo $footer_fourth_col_menu->name; ?></h3>
								<?php wp_nav_menu(array( 'container' => '', 'theme_location' => 'footer_fourth_col_menu' )); ?>
							</div>
						</div>
					</div>
					<div class="footer-bottom">
						<div class="left">
							<p>© <?php echo date('Y')?> <?php if($copy_rights_text=get_field('copy_rights_text','option')){?> <?php echo $copy_rights_text?><?php }?></p>
							<span>
								<?php if($privacy_policy_link=get_field('privacy_policy_link','option')){?><a href="<?php echo $privacy_policy_link?>">Privacy Policy | <?php }?></a>
								<?php if($terms_and_conditions_link=get_field('terms_&_conditions_link','option')){?><a href="<?php echo $terms_and_conditions_link?>">Terms & Conditions</a><?php }?>
							</span>
						</div>
						<?php if(have_rows('social_media','option')){while(have_rows('social_media','option')){the_row()?>
							<div class="right">
								<?php if($facebook=get_sub_field('facebook')){?>
									<a href="<?php echo $facebook?>"><img src="<?php echo get_template_directory_uri(); ?>/images/footer/social-fb.svg" alt="social-fb"></a>
								<?php }?>
								<?php if($x=get_sub_field('x')){?>
									<a href="<?php echo $x?>"><img src="<?php echo get_template_directory_uri(); ?>/images/footer/social-tw.svg" alt="social-tw"></a>
								<?php }?>
								<?php if($youtube=get_sub_field('youtube')){?>
									<a href="<?php echo $youtube?>"><img src="<?php echo get_template_directory_uri(); ?>/images/footer/social-yt.svg" alt="social-yt"></a>
								<?php }?>
								<?php if($instagram=get_sub_field('instagram')){?>
									<a href="<?php echo $instagram?>"><img src="<?php echo get_template_directory_uri(); ?>/images/footer/social-ig.svg" alt="social-ig"></a>
								<?php }?>
							</div>
						<?php }}?>
					</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	<script>
		//global cutom js
		<?php if($variable=get_field('global_custom_js','option')){echo $variable;}?>

		//individual page custom js
		<?php if($variable=get_field('custom_js',get_the_ID())){echo $variable;}?>
	</script>
	</footer>
</body>
</html>