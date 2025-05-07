<?php
    /*
    Template Name: Aboutus Page
    */
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

<div class="about_page">
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

    <?php if(have_rows('abou_section')){while(have_rows('abou_section')){the_row()?>
        <section class="about-info">
            <div class="container">
                <div class="about-info-content">
                    <?php if($about_description=get_sub_field('about_description')){?>
                        <div class="left" data-aos="fade-up" data-aos-duration="1500">
                            <p><?php echo $about_description?></p>
                        </div>
                    <?php }?>
                    <?php if(have_rows('right_side_icons')){?>
                        <div class="right">
                            <?php while(have_rows('right_side_icons')){the_row()?>
                                <?php if($icon=get_sub_field('icon')){?>
                                    <div class="image">
                                        <img src="<?php echo esc_url($icon['url']); ?>"
                                        alt="<?php if(esc_attr($icon['alt'])){echo esc_attr($icon['alt']);}else{?>icon<?php }?>"
                                        title="<?php if(esc_attr($icon['title'])){echo esc_attr($icon['title']);}else{?>icon<?php }?>">
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div>
                    <?php }?>
                </div>
                <?php if(have_rows('boxes')){?>
                    <div class="about-info-boxContent">
                        <?php while(have_rows('boxes')){the_row()?>
                            <div class="box" data-aos="fade-up" data-aos-duration="1500">
                                <?php if($icon=get_sub_field('icon')){?>
                                    <img src="<?php echo esc_url($icon['url']); ?>"
                                    alt="<?php if(esc_attr($icon['alt'])){echo esc_attr($icon['alt']);}else{?>vision-mision<?php }?>"
                                    title="<?php if(esc_attr($icon['title'])){echo esc_attr($icon['title']);}else{?>vision-mision<?php }?>">
                                <?php }?>
                                <?php if($content=get_sub_field('content')){?>
                                    <?php echo $content?>
                                <?php }?>
                            </div>
                        <?php }?>
                    </div>
                <?php }?>

                <div class="about-info-bottom">
                    <div class="left">
                        <?php if($bottom_image=get_sub_field('bottom_image')){?>
                            <div class="image">
                                <img src="<?php echo esc_url($bottom_image['url']); ?>"
                                alt="<?php if(esc_attr($bottom_image['alt'])){echo esc_attr($bottom_image['alt']);}else{?>info-bottom<?php }?>"
                                title="<?php if(esc_attr($bottom_image['title'])){echo esc_attr($bottom_image['title']);}else{?>info-bottom<?php }?>">
                            </div>
                        <?php }?>
                    </div>
                    <?php if($bottom_content=get_sub_field('bottom_content')){?>
                        <div class="right" data-aos="fade-up" data-aos-duration="1500">
                            <p><?php echo $bottom_content?></p>
                        </div>
                    <?php }?>
                </div>

            </div>
        </section>
    <?php }}?>


    <?php if(have_rows('facilities_section')){while(have_rows('facilities_section')){the_row()?>
        <section class="about-facilities">
            <div class="abt-facilityContent">
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
                    <div class="abt-facilityText" data-aos="fade-up" data-aos-duration="1500">
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


    <section class="chancellor-desk">
        <div class="container">
            <?php if($description=get_field('description')){?>
                <div class="bigText">
                    <h2><?php echo $description?></h2>
                </div>
            <?php }?>
            <?php if(have_rows('chancellor_section')){while(have_rows('chancellor_section')){the_row()?>
                <div class="chancellor-wrap">
                    <?php if($title=get_sub_field('title')){?>
                        <h2><?php echo $title?></h2>
                    <?php }?>
                    <div class="chancellorContent">
                        <?php if($image=get_sub_field('image')){?>
                            <div class="left">
                                <div class="image">
                                    <img src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php if(esc_attr($image['alt'])){echo esc_attr($image['alt']);}else{?>chancellor<?php }?>"
                                    title="<?php if(esc_attr($image['title'])){echo esc_attr($image['title']);}else{?>chancellor<?php }?>">
                                </div>
                            </div>
                        <?php }?>
                        <?php if($content=get_sub_field('content')){?>
                            <div class="right" data-aos="fade-up" data-aos-duration="1500">
                                <?php echo $content?>
                            </div>
                        <?php }?>
                    </div>
                </div>
            <?php }}?>
        </div>
    </section>


    <?php if(have_rows('last_section')){while(have_rows('last_section')){the_row()?>
        <section class="india-potential">
            <div class="container">
                <div class="indiaPotentialContent">
                    <?php if($content=get_sub_field('content')){?>
                        <div class="left" data-aos="fade-up" data-aos-duration="1500">
                            <?php echo $content?>
                        </div>
                    <?php }?>
                    <?php if($image=get_sub_field('image')){?>
                        <div class="right">
                            <div class="image">
                                <img src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php if(esc_attr($image['alt'])){echo esc_attr($image['alt']);}else{?>image<?php }?>"
                                title="<?php if(esc_attr($image['title'])){echo esc_attr($image['title']);}else{?>image<?php }?>">
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </section>
    <?php }}?>







</div>

<?php get_footer(); ?>