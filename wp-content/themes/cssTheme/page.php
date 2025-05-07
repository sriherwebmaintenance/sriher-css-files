<?php
     /*
    Template Name: Default Page
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
    <?php if(have_posts()){while(have_posts()){the_post()?>
<div class="default_page">
    <div class="page-content">
        <div class="container">
            <?php echo get_the_content()?>
        </div>
    </div>
</div>
<?php }}?>

<?php get_footer(); ?>