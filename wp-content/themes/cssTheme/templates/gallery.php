<?php
     /*
    Template Name: Gallery Page
    */
    get_header();
?>

<section class="innerBanner">
        <div class="container">
            <div class="bannerText">
                <?php if($banner_title=get_field('banner_title')){?>
                    <h1><?php echo $banner_title?></h1>
                <?php }else{?>
                    <h1><?php the_title()?></h1>
                    <?php }?>
                <?php if($banner_description=get_field('banner_description')){?>
                    <p><?php echo $banner_description?></p>
                <?php }?>
            </div>
        </div>
    </section>
<div class="container">
<?php echo do_shortcode('[instagram-feed feed=2]')?>
</div>


<?php get_footer(); ?>