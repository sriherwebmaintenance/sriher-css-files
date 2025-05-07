<?php
    /*
    Template Name: Home Page
    */
    get_header();
    wp_enqueue_script('aos');
    wp_enqueue_script('Swiper');
    add_action('wp_footer','home_scripts',25);
    function home_scripts(){?>
        <script>
            $(document).ready(function() {

                $('.popup').magnificPopup({
                    type:'inline',
                    midClick: true,
                    delegate: 'a',
                    gallery: {
                        enabled: true
                    },
                });

                var swiper = new Swiper(".banner-slider", {
                    autoplay:true,
                    speed:1500,
                    loop:true,
                    pagination: {
                        el: ".swiper-pagination-1",
                        clickable:true,
                    },
                });

                var swiper = new Swiper(".programmes-slider", {
                autoplay:true,
                speed:1500,
                loop:true,
                spaceBetween:25,
                slidesPerView:4,
                pagination: {
                    el: ".swiper-pagination-2",
                    clickable:true,
                },
                breakpoints: {
                    230: {
                        slidesPerView: 1,
                        spaceBetween: 25,
                    },
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 25,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 25,
                    },
                    1024: {

                        slidesPerView:3,
                        spaceBetween: 25,
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 25,
                    },

                }
                });


                // AOS.init({
                //     once:true,
                // });


            })

        </script>
	<?php
    }
?>

<div class="home_page">
    <section class="homeBanner">
        <?php if(have_rows('banner')){while(have_rows('banner')){the_row()?>
            <div class="banner">
                <!-- <div class="left">
                </div> -->
                <?php if(have_rows('slider')){?>
                    <div class="right">
                        <div class="swiper banner-slider">
                            <div class="swiper-wrapper">
                                <?php while(have_rows('slider')){the_row();if($banner_image=get_sub_field('banner_image')){?>
                                    <div class="swiper-slide">
                                        <div class="home-img">
                                            <img src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php if(esc_attr($banner_image['alt'])){echo esc_attr($banner_image['alt']);}else{?>image<?php }?>">
                                        </div>
                                    </div>
                                <?php }}?>
                            </div>
                            <div class="swiper-pagination-1"></div>
                        </div>
                    </div>
                <?php }?>
            </div>
        <?php }}?>

        <div class="container">
            <div class="banner-content">
                <?php if($variable=get_field('second_logo','option')){?>
                    <img src="<?php echo $variable?>" id="banner-logo" alt="<?php bloginfo('name'); ?> logo">
                <?php }?>
                <?php if(have_rows('banner')){while(have_rows('banner')){the_row()?>
                    <div>
                        <?php if($title=get_sub_field('title')){?>
                            <h1><?php echo $title?></h1>
                        <?php }?>
                        <?php if($description=get_sub_field('description')){?>
                            <p><?php echo $description?></p>
                        <?php }?>
                        <?php if($button_link=get_sub_field('button_link')){?>
                            <span><a href="<?php echo $button_link?>"><?php the_sub_field('button_text')?></a></span>
                        <?php }?>
                    </div>
                <?php }}?>
            </div>
        </div>
    </section>

    <?php if(have_rows('about_sec')){while(have_rows('about_sec')){the_row()?>
        <section class="about-us">
            <div class="container">
                <div class="content">
                    <div class="card card-1">
                        <?php if($image=get_sub_field('image')){?>
                            <div class="card-img">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php if(esc_attr($image['alt'])){echo esc_attr($image['alt']);}else{?>image<?php }?>">
                            </div>
                        <?php }?>
                        <div class="card-txt">
                            <?php if($title=get_sub_field('title')){?>
                                <h2><?php echo $title?></h2>
                            <?php }?>
                            <?php if($variable=get_sub_field('description')){?>
                                <p><?php echo $variable?></p>
                            <?php }?>
                        </div>
                    </div>
                    <?php if($variable=get_sub_field('right_description')){?>
                        <div class="card card-2">
                            <div class="txt">
                                <?php echo $variable?>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </section>
    <?php }}?>



    <?php if(have_rows('info_sec')){while(have_rows('info_sec')){the_row()?>
        <section class="info">
            <div class="container">
                <div class="content">
                    <div class="card card-1">
                        <?php if($variable=get_sub_field('content')){?>
                            <div class="card-txt">
                                <?php echo $variable?>
                            </div>
                        <?php }?>
                        <?php if($variable=get_sub_field('button_link')){?>
                            <span>
                                <a href="<?php echo $variable?>"><?php the_sub_field('button_text')?></a>
                            </span>
                        <?php }?>
                    </div>
                    <div class="card card-2">
                        <?php if($variable=get_sub_field('logo_image')){?>
                            <img src="<?php echo $variable?>" class="info-logo" alt="Vidya sudha logo">
                        <?php }?>
                        <div class="card-img">
                            <?php if($variable=get_sub_field('image')){?>
                                <div class="info-img">
                                    <img src="<?php echo $variable?>" alt="image">
                                </div>
                            <?php }?>
                            <div class="popup">
                                <a href="#videopopup">
                                    <?php if($popup_thumbnail=get_sub_field('popup_thumbnail')){?>
                                        <img src="<?php echo $popup_thumbnail?>" alt="info-popup.png">
                                    <?php }?>
                                    <?php if($videotype=get_sub_field('youtube_or_video_file')){?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/play.svg" alt="play.svg">
                                        <?php if($videotype=='video_file'){?>
                                            <div class="mfp-close"></div>
                                            <?php if($video=get_sub_field('video')){?>
                                                <div class="mfp-hide" id="videopopup">
                                                    <video width="100%" controls>
                                                        <source src="<?php echo $video?>" type="video/mp4">
                                                    </video>
                                                </div>
                                            <?php }?>
                                        <?php }?>
                                        <?php if($videotype=='youtube'){if($youtube_embed_code=get_sub_field('youtube_embed_code')){?>
                                            <div id="videopopup" class="mfp-hide">
                                                <?php echo $youtube_embed_code?>
                                            </div>
                                        <?php }}?>
                                    <?php }?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php }}?>



    <?php if(have_rows('programmes_sec')){while(have_rows('programmes_sec')){the_row()?>
        <section class="programmes">
            <div class="container">
                <?php if($variable=get_sub_field('content')){?>
                    <div class="content">
                        <?php echo $variable?>
                    </div>
                <?php }?>
                <?php if(have_rows('slider')){?>
                    <div class="box-content">
                        <div class="swiper programmes-slider">
                            <div class="swiper-wrapper">
                                <?php while(have_rows('slider')){the_row()?>
                                    <div class="swiper-slide">
                                        <!-- <div class="box"> -->
                                           <div class="card ">
                                                <?php if($title=get_sub_field('title')){?>
                                                    <div class="card-txt"><h3><?php echo $title?></h3></div>
                                                <?php }?>
                                                <?php if($image=get_sub_field('image')){?>
                                                    <div class="card-img"><img src="<?php echo $image?>" alt="b1.png"></div>
                                                <?php }?>
                                            </div>
                                        <!-- </div> -->
                                    </div>

                                <?php }?>
                            </div>
                            <div class="swiper-pagination-2"></div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </section>
    <?php }}?>


    <?php if(have_rows('service_sec')){while(have_rows('service_sec')){the_row()?>
        <section class="our-services">
            <div class="container">
                <div class="content">
                    <?php if($variable=get_sub_field('image')){?>
                        <div class="card services-img">
                            <img src="<?php echo $variable?>" alt="services-img.png">
                        </div>
                    <?php }?>
                    <div class="card services-txt">
                        <?php if($variable=get_sub_field('title')){?>
                            <h2><?php echo $variable?></h2>
                        <?php }?>
                        <?php if($variable=get_sub_field('description')){?>
                            <p><?php echo $variable?></p>
                        <?php }?>
                        <?php if($variable=get_sub_field('button_link')){?>
                            <span><a href="<?php echo $variable?>"><?php the_sub_field('button_text')?></a></span>
                        <?php }?>
                    </div>
                </div>
            </div>
        </section>
    <?php }}?>



    <section class="support-gallery-wrap">
        <?php if(have_rows('support_sec')){while(have_rows('support_sec')){the_row()?>
            <div class="support-us">
                <div class="container">
                    <div class="content-wrap">
                        <div class="content">
                            <?php if($variable=get_sub_field('title')){?>
                                <h2><?php echo $variable?></h2>
                            <?php }?>
                            <?php if($variable=get_sub_field('description')){?>
                                <p>
                                    <?php echo $variable?>
                                </p>
                            <?php }?>
                        </div>
                        <?php if(have_rows('boxes')){?>
                            <div class="box-content">
                                <?php while(have_rows('boxes')){the_row()?>
                                    <div class="box">
                                        <div class="card">
                                            <?php if($icon=get_sub_field('icon')){?>
                                                <img src="<?php echo $icon?>" alt="icon">
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
                </div>
            </div>
        <?php }}?>



        <?php if(have_rows('gallery_sec','option')){while(have_rows('gallery_sec','option')){the_row()?>
            <div class="photo-gallery">
                <div class="container">
                    <?php if($variable=get_sub_field('title')){?>
                        <h2><?php echo $variable?></h2>
                    <?php }?>
                    <?php if(have_rows('gallery')){?>
                        <div class="gallery-content">
                            <?php $i=1;$limit=1;while(have_rows('gallery')){the_row();if($limit<=8){?>
                                <div class="box">
                                    <?php if(get_sub_field('select_popup_type')){$popuptype=get_sub_field('select_popup_type');}?>
                                    <?php if($popuptype=='image'){?>
                                        <?php if($popupimg=get_sub_field('imgae')){?>
                                        <img class="gallery-img" src="<?php echo esc_url($popupimg['url']); ?>" alt="<?php if(esc_attr($popupimg['alt'])){echo esc_attr($popupimg['alt']);}else{?>image<?php }?>">
                                        <div class="gallerypopup">
                                            <a href="#imgpopup<?php echo $i?>">
                                                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/images/search.svg" alt="search.svg">
                                                <div class="mfp-hide" id="imgpopup<?php echo $i?>" >
                                                    <img src="<?php echo esc_url($popupimg['url']); ?>" alt="<?php if(esc_attr($popupimg['alt'])){echo esc_attr($popupimg['alt']);}else{?>image<?php }?>">
                                                </div>
                                            </a>
                                        </div>
                                    <?php }}?>
                                    <?php if($popuptype=='video'){?>
                                        <?php if($thumbnail_image=get_sub_field('thumbnail_image')){?>
                                            <img class="gallery-img" src="<?php echo esc_url($thumbnail_image['url']); ?>" alt="<?php if(esc_attr($thumbnail_image['alt'])){echo esc_attr($thumbnail_image['alt']);}else{?>image<?php }?>">
                                        <?php }?>
                                        <?php if($video=get_sub_field('video')){?>
                                            <div class="gallerypopup">
                                                <a href="#videopopup<?php echo $i?>">
                                                    <img class="icon" src="<?php echo get_template_directory_uri(); ?>/images/play.svg" alt="play icon">
                                                    <div class="mfp-hide" id="videopopup<?php echo $i?>">
                                                        <video  width="80%" controls>
                                                            <source src="<?php echo $video?>" type="video/mp4">
                                                        </video>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php }?>
                                    <?php }?>
                                    <?php if($popuptype=='youtube'){?>
                                        <?php if($thumbnail_image=get_sub_field('thumbnail_image')){?>
                                                <img class="gallery-img" src="<?php echo esc_url($thumbnail_image['url']); ?>" alt="<?php if(esc_attr($thumbnail_image['alt'])){echo esc_attr($thumbnail_image['alt']);}else{?>image<?php }?>">
                                        <?php }?>
                                        <?php if($youtube_embed_code=get_sub_field('youtube_embed_code')){?>
                                            <div class="gallerypopup">
                                                <a href="#youtubepupup<?php echo $i?>">
                                                    <img class="icon" src="<?php echo get_template_directory_uri(); ?>/images/play.svg" alt="play icon">
                                                    <div class="mfp-hide" id="youtubepupup<?php echo $i?>">
                                                        <?php echo $youtube_embed_code?>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php }?>
                                    <?php }?>
                                </div>
                            <?php $i++;$limit++;}}?>
                        </div>
                    <?php }?>
                    <?php if($button_link=get_sub_field('button_link')){?>
                        <span><a href="<?php echo $button_link?>"><?php the_sub_field('button_text')?></a></span>
                    <?php }?>
                </div>
            </div>
        <?php }}?>
    </section>

    <?php if(have_rows('join_our_team_sec','option')){while(have_rows('join_our_team_sec','option')){the_row()?>
        <section class="join-our-team">
            <div class="container">
                <div class="content">
                    <?php if($variable=get_sub_field('image')){?>
                        <div class="img">
                            <img src="<?php echo esc_url($variable['url']); ?>" alt="<?php if(esc_attr($variable['alt'])){echo esc_attr($variable['alt']);}else{?>image<?php }?>">
                        </div>
                    <?php }?>
                    <div class="txt">
                        <?php if($variable=get_sub_field('title')){?>
                            <h2><?php echo $variable?></h2>
                        <?php }?>
                        <?php if($variable=get_sub_field('description')){?>
                            <p><?php echo $variable?></p>
                        <?php }?>
                        <?php if($variable=get_sub_field('button_link')){?>
                            <span><a href="<?php echo $variable?>"><?php the_sub_field('button_text')?></a></span>
                        <?php }?>
                    </div>
                </div>
            </div>
        </section>
    <?php }}?>

</div>

<?php get_footer(); ?>