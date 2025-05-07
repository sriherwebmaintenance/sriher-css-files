<?php
    get_header();
    add_action('wp_footer','page_scripts',25);
    function page_scripts(){?>
        <script>
            $(document).ready(function () {
            });
        </script>
	<?php
    }
?>

<div class="news_detail_page">
    <section class="innerBanner">
        <div class="container">
            <div class="bannerText">
                <?php if(get_field('banner_title')!='' || get_field('banner_description')!=''){?>
                <?php if($banner_title=get_field('banner_title')){?>
                    <h1><?php echo $banner_title?></h1>
                <?php }else{?>
                    <h1><?php the_title()?></h1>
                    <?php }?>
                <?php if($banner_description=get_field('banner_description')){?>
                    <p><?php echo $banner_description?></p>
                <?php }?>
                <?php }else{$banner_content=get_field('news_detail_page_default_banner','option')?>
                    <?php echo $banner_content?>
                <?php }?>
            </div>
        </div>
    </section>
    <section class="newsDetail">
        <div class="container">
            <div class="text">
                <h2><?php the_title()?></h2>
                <h4>Posted by CSS on <?php echo get_the_date('d F Y')?> in News</h4>
                <?php if($first_para=get_field('first_paragraph')){?>
                    <h5><?php echo $first_para?></h5>
                <?php }?>
            </div>
            <?php if($image=get_field('image')){?>
                <div class="image">
                    <img src="<?php echo esc_url($image['url']); ?>"
                    alt="<?php if(esc_attr($image['alt'])){echo esc_attr($image['alt']);}else{?>image<?php }?>"
                    title="<?php if(esc_attr($image['title'])){echo esc_attr($image['title']);}else{?>image<?php }?>">
                </div>
            <?php }?>
            <?php if(have_rows('content_section')){?>
                <div class="text bottom-text">
                    <?php while(have_rows('content_section')){the_row()?>
                        <?php if($content=get_sub_field('content')){?>
                            <div class="content">
                                <?php echo $content?>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
            <?php }?>
            <div class="view-all-share">
                <a href="<?php echo home_url()?>/news" id="grid"><img src="<?php echo get_template_directory_uri(); ?>/images/news/grid.svg" alt="grid">View all news</a>
                <a href="" id="share">share <img src="<?php echo get_template_directory_uri(); ?>/images/news/share.png" alt="share"></a>
            </div>
        </div>
    </section>
    <!-- <section class="start-journey">
        <div class="container">
            <div class="content">
                <h2>Start Your Journey to Sporting Greatness Now!</h2>
                <a href="">explore courses</a>
            </div>
        </div>
    </section> -->
</div>
<?php get_footer(); ?>