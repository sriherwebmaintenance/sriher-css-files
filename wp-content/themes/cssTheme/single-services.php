<?php
    get_header();
    add_action('wp_footer','page_scripts',25);
    function page_scripts(){?>
        <script>
            $(document).ready(function () {
                $('.tab').click(function() {
                    $('.tab.active').removeClass("active");
                    $(this).addClass("active");
                });
                // $("ul.tabs li a:first").addClass("active").show(); //Activate first tab
            });
        </script>
	<?php
    }
?>
<div class="services_page">
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
    <?php
        $args = array(
            'post_type' => 'services',
            'post_status' => 'publish',
            'posts_per_page' =>-1,
            'orderby' => 'menu_order',
        );
        $service = new WP_Query($args);
    ?>

        <section class="services">
        <div class="container">
            <div class="servicesContent">
                <div class="tabMenu" id="tabMenu">
                    <?php
                        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                        $host = $_SERVER['HTTP_HOST'];
                        $uri = $_SERVER['REQUEST_URI'];
                        $url=$protocol . $host . $uri
                    ?>
                    <?php if($service->have_posts()){?>
                    <ul class="tabs">
                        <?php $i=2;while($service->have_posts()){$service->the_post()?>
                            <li><a class="tab<?php if($url==get_permalink()){?> active<?php }?>" href="<?php the_permalink()?>"><?php echo get_the_title()?></a></li>
                        <?php $i++;}wp_reset_postdata()?>
                    </ul>
                    <?php }?>
                </div>
                <div class="tabContent">
                    <?php if(have_rows('service_contnet')){while(have_rows('service_contnet')){the_row()?>
                        <?php $section_type=get_sub_field('select_secction_type')?>
                        <?php if($section_type == 'content'){if($content=get_sub_field('content_section',get_the_ID())){?>
                            <?php echo $content?>
                        <?php }}?>
                        <?php if($section_type == 'image'){if($image=get_sub_field('image_setion')){?>
                            <div class="image">
                                <img src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php if(esc_attr($image['alt'])){echo esc_attr($image['alt']);}else{?>image<?php }?>"
                                title="<?php if(esc_attr($image['title'])){echo esc_attr($image['title']);}else{?>image<?php }?>" >
                            </div>
                        <?php }}?>
                        <?php if($section_type == 'quote'){if($quote=get_sub_field('quote_section')){?>
                            <div class="quote">
                                <h5><?php echo $quote?></h5>
                            </div>
                        <?php }}?>
                    <?php }}?>
                    <?php echo get_the_content()?>
                </div>

            </div>
        </div>
    </section>

    <?php }}?>

</div>
<?php get_footer(); ?>