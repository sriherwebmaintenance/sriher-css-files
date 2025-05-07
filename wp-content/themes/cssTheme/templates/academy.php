<?php
    /*
    Template Name: Academy Page
    */
    get_header();
    add_action('wp_footer','page_scripts',25);
    function page_scripts(){?>
        <script>
            $(document).ready(function () {
                $('.tab').click(function() {
                    $('.tab.active').removeClass("active");
                    $(this).addClass("active");
                });
            });
        </script>
	<?php
    }
?>

<div class="academy_page">
<section class="innerBanner">
        <div class="container">
            <div class="bannerText">
                <?php if($banner_title=get_field('banner_title')){?>
                    <h1><?php echo $banner_title?></h1>
                <?php }?>
                <?php if($banner_description=get_field('banner_description')){?>
                    <p><?php echo $banner_description?></p>
                <?php }?>
            </div>
        </div>
    </section>

    <?php if(have_rows('first_section')){while(have_rows('first_section')){the_row()?>
        <section class="athletic-potential">
            <div class="container">
                <?php if($title=get_sub_field('title')){?>
                    <h2><?php echo $title?></h2>
                <?php }?>
                <div class="potentialContent">
                    <?php if($content=get_sub_field('content')){?>
                        <div class="left" data-aos="fade-up" data-aos-duration="1500">
                            <?php echo $content?>
                        </div>
                    <?php }?>
                    <?php if($image=get_sub_field('image')){?>
                        <div class="right">
                            <img src="<?php echo esc_url($image['url']); ?>"
                            alt="<?php if(esc_attr($image['alt'])){echo esc_attr($image['alt']);}else{?>athletic-potential<?php }?>"
                            title="<?php if(esc_attr($image['title'])){echo esc_attr($image['title']);}else{?>athletic-potential<?php }?>">
                        </div>
                    <?php }?>
                </div>
                <?php if($bottom_description=get_sub_field('bottom_description')){?>
                    <p data-aos="fade-up" data-aos-duration="1500"><?php echo $bottom_description?></p>
                <?php }?>
            </div>
        </section>
    <?php }}?>


    <?php if($description=get_field('description')){?>
        <section class="display-txt">
            <div class="container">
                <h4><?php echo $description?></h4>
            </div>
        </section>
    <?php }?>


    <?php if(have_rows('facilities_section')){while(have_rows('facilities_section')){the_row()?>
        <section class="facilities">
            <div class="facilityContent">
                <div class="left"></div>
                <?php if($image=get_sub_field('image')){?>
                    <div class="right">
                        <img src="<?php echo esc_url($image['url']); ?>"
                        alt="<?php if(esc_attr($image['alt'])){echo esc_attr($image['alt']);}else{?>facilities<?php }?>"
                        title="<?php if(esc_attr($image['title'])){echo esc_attr($image['title']);}else{?>facilities<?php }?>">
                    </div>
                <?php }?>
            </div>
            <div class="facilityText-outer">
                <div class="container">
                    <div class="facilityText" data-aos="fade-up" data-aos-duration="1500">
                        <?php if($small_title=get_sub_field('small_title')){?>
                            <span><?php echo $small_title?></span>
                        <?php }?>
                        <?php if($title_and_content=get_sub_field('title_and_content')){?>
                            <?php echo $title_and_content?>
                        </div>
                    <?php }?>
                </div>
            </div>
        </section>
    <?php }}?>

    <?php if(have_rows('other_academy_section')){while(have_rows('other_academy_section')){the_row()?>
        <section class="other-academy">
            <div class="container">
                <?php if($title=get_sub_field('title')){?>
                    <?php echo $title?>
                <?php }?>
                <?php if(have_rows('other_academies')){?>
                    <div class="otherContent" data-aos="fade-up" data-aos-duration="1500">
                        <?php while(have_rows('other_academies')){the_row()?>
                            <div class="card">
                                <div class="image">
                                    <?php if($icon=get_sub_field('icon')){?>
                                        <img src="<?php echo esc_url($icon['url']); ?>"
                                        alt="<?php if(esc_attr($icon['alt'])){echo esc_attr($icon['alt']);}else{?>other-academies<?php }?>"
                                        title="<?php if(esc_attr($icon['title'])){echo esc_attr($icon['title']);}else{?>other-academies<?php }?>">
                                    <?php }?>
                                    <?php if($title=get_sub_field('title')){?>
                                        <h3><?php echo $title?></h3>
                                    <?php }?>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                <?php }?>
            </div>
        </section>
    <?php }}?>
</div>
<?php get_footer(); ?>