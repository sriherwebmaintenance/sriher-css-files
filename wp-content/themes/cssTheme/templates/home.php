<?php
    /*
    Template Name: Home Page
    */
    get_header();
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
                $('#sportsmain').width($('#div1').width());

                var swiper = new Swiper(".banner-slider", {
                    autoplay:true,
                    speed:1500,
                    loop:true,
                    delay:5000,
                });
                var swiper = new Swiper(".spotlight-slider", {
                    autoplay:true,
                    speed:1500,
                    loop:true,
                });
                var swiper = new Swiper(".partners-slider", {
                    autoplay:true,
                    speed:1500,
                    loop:true,
                    slidesPerView:5,
                    spaceBetween:80,
                    breakpoints: {
                        2000: {
                            slidesPerView:5,
                            spaceBetween:80,
                        },
                        1200: {
                            slidesPerView:5,
                            spaceBetween:80,
                        },
                        990: {
                            slidesPerView:5,
                            spaceBetween:80,
                        },
                        768: {
                            slidesPerView:3,
                            spaceBetween:0,
                        },
                        650: {
                            slidesPerView:2,
                            spaceBetween:0,
                        },
                        200:{
                            slidesPerView:1,
                            spaceBetween:0,
                        },
                    }
                });
                var swiper = new Swiper(".sports-slider", {
                    speed: 2000,
                    // parallax: true,
                    slidesPerView:1,
                    // slidesPerGroupSkip: 2,
                    autoplay:true,
                    loop:true,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
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
        <div class="container">
            <?php if(have_rows('banner')){?>
                <div class="swiper banner-slider">
                    <div class="swiper-wrapper">
                        <?php while(have_rows('banner')){the_row()?>
                            <div class="swiper-slide">
                                <div class="content">
                                    <?php if($banner_image=get_sub_field('banner_image')){?>
                                        <div class="image">
                                            <img src="<?php echo esc_url($banner_image['url']); ?>"
                                            alt="<?php if(esc_attr($banner_image['alt'])){echo esc_attr($banner_image['alt']);}else{?>runner<?php }?>"
                                            title="<?php if(esc_attr($banner_image['title'])){echo esc_attr($banner_image['title']);}else{?>runner<?php }?>">
                                        </div>
                                    <?php }?>
                                    <div class="text">
                                        <?php if($sub_title=get_sub_field('sub_title')){?>
                                            <span><?php echo $sub_title?> </span>
                                        <?php }?>
                                        <?php if($title=get_sub_field('title')){?>
                                            <h1 class="main"><?php echo $title?></h1>
                                        <?php }?>
                                        <?php if($button_link=get_sub_field('button_link')){?>
                                            <a href="<?php echo $button_link?>"><?php the_sub_field('button_text')?></a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            <?php }?>



            <?php if(have_rows('second_section')){while(have_rows('second_section')){the_row()?>
                <div class="bannerAbout">
                    <div class="aboutContent">
                        <?php if(have_rows('first_box')){while(have_rows('first_box')){the_row()?>
                            <div class="aboutUs">
                                <?php if($icon=get_sub_field('icon')){?>
                                    <img src="<?php echo $icon?>" alt="about-icon">
                                <?php }?>
                                <div class="text" data-aos="fade-up" data-aos-duration="1000">
                                    <?php if($content=get_sub_field('content')){?>
                                        <?php echo $content?>
                                    <?php }?>
                                    <?php if($button_link=get_sub_field('button_link')){?>
                                        <a href="<?php echo $button_link?>">Read More <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none"><path d="M0.791016 1L5.02202 5L0.791016 9" stroke="white" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                    <?php }?>
                                </div>
                            </div>
                        <?php }}?>
                        <?php if(have_rows('second_box')){while(have_rows('second_box')){the_row()?>
                            <div class="education">
                                <?php if($image=get_sub_field('image')){?>
                                    <div class="image">
                                        <img src="<?php echo esc_url($image['url']); ?>"
                                            alt="<?php if(esc_attr($image['alt'])){echo esc_attr($image['alt']);}else{?>sports-edu-res<?php }?>"
                                            title="<?php if(esc_attr($image['title'])){echo esc_attr($image['title']);}else{?>sports-edu-res<?php }?>"  id="sports-edu-res">
                                    </div>
                                <?php }?>
                                <div class="text" data-aos="fade-up" data-aos-duration="1000">
                                    <?php if($content=get_sub_field('content')){?>
                                        <?php echo $content?>
                                    <?php }?>
                                    <?php if($button_link=get_sub_field('button_link')){?>
                                        <a href="<?php echo $button_link?>">Read More <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none"><path d="M1 1L5.231 5L1 9" stroke="#0050DD" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                    <?php }?>
                                </div>
                            </div>
                        <?php }}?>
                        <?php if(have_rows('third_box')){while(have_rows('third_box')){the_row()?>
                            <div class="joinNow">
                                <?php if($icon=get_sub_field('icon')){?>
                                    <img src="<?php echo $icon?>" alt="academy-feature">
                                <?php }?>
                                <div class="text" data-aos="fade-up" data-aos-duration="1000">
                                    <?php if($text=get_sub_field('text')){?>
                                        <h2><?php echo $text?></h2>
                                    <?php }?>
                                    <?php if($button_link=get_sub_field('button_link')){?>
                                        <a href="<?php echo $button_link?>"><?php the_sub_field('button_text')?></a>
                                    <?php }?>
                                </div>
                            </div>
                        <?php }}?>
                    </div>
                </div>
            <?php }}?>
        </div>




        <?php if(have_rows('sports_section')){while(have_rows('sports_section')){the_row()?>
            <div class="sports">
                <div class="container">
                    <?php if($title=get_sub_field('title')){?>
                        <h2 data-aos="fade-up" data-aos-duration="1000"><?php echo $title?></h2>
                    <?php }?>
                    <?php if(have_rows('sports')){?>
                        <div class="desktopsportsContent">
                            <?php while(have_rows('sports')){the_row()?>
                                <?php if($sport=get_sub_field('sport')){?>
                                    <a href="<?php the_sub_field('link')?>" class="sports-link"><span><?php echo $sport?></span></a>
                                <?php }?>
                            <?php }?>
                        </div>
                    <?php }?>
                </div>
                <div class="mobile-sports">
                    <div id="sports-main">
                        <div id="div1">
                            &nbsp; &nbsp;<img src="<?php echo get_template_directory_uri(); ?>/images/home/banner/Sports.png" alt="">
                        </div>
                        <div id="div2">
                            &nbsp; &nbsp;<img src="<?php echo get_template_directory_uri(); ?>/images/home/banner/Sports.png" alt="">
                        </div>
                    </div>
                    <?php if(have_rows('sports')){?>
                        <div class="swiper sports-slider">
                            <div class="swiper-wrapper">
                                <?php while(have_rows('sports')){the_row()?>
                                    <?php if($sport=get_sub_field('sport')){?>
                                        <div class="swiper-slide">
                                            <div class="title">
                                                <div class="link"><a href="<?php the_sub_field('link')?>" class="sports-link"><span><?php echo $sport?></span></a></div>
                                            </div>
                                        </div>
                                    <?php }?>
                                <?php }?>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </section>
    <?php }}?>

    <?php if(have_rows('career_section')){while(have_rows('career_section')){the_row()?>
        <section class="start-sporting-career">
            <div class="container">
                <div class="careerContent">
                    <?php if($title=get_sub_field('title')){?>
                        <h2 data-aos="fade-up" data-aos-duration="1000"><?php echo $title?></h2>
                    <?php }?>
                    <?php if($right_content=get_sub_field('right_content')){?>
                        <div class="courses" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" >
                            <?php echo $right_content?>
                        </div>
                    <?php }?>
                </div>
            </div>
        </section>
    <?php }}?>


    <?php if(have_rows('service_section')){while(have_rows('service_section')){the_row()?>
        <section class="our-services">
            <div class="container">
                <?php if($title_content=get_sub_field('title_content')){?>
                    <div data-aos="fade-up" data-aos-duration="1000">
                        <?php echo $title_content?>
                    </div>
                <?php }?>
                <?php if(have_rows('services')){?>
                    <div class="services-content" data-aos="fade-up" data-aos-duration="1000">
                        <?php while(have_rows('services')){the_row()?>
                            <a href="<?php the_sub_field('link')?>">
                                <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                                    <?php if($icon=get_sub_field('icon')){?>
                                        <img src="<?php echo esc_url($icon['url']); ?>"
                                            alt="<?php if(esc_attr($icon['alt'])){echo esc_attr($icon['alt']);}else{?>Sriher sports services<?php }?>"
                                            title="<?php if(esc_attr($icon['title'])){echo esc_attr($icon['title']);}else{?>Sriher sports services<?php }?>">
                                    <?php }?>
                                    <?php if($service=get_sub_field('service')){?>
                                        <h3><?php echo $service?></h3>
                                    <?php }?>
                                </div>
                            </a>
                        <?php }?>
                    </div>
                <?php }?>
            </div>
        </section>
    <?php }}?>


    <?php if(have_rows('gallery_section')){while(have_rows('gallery_section')){the_row()?>
        <section class="gallery">
            <div class="container">
                <?php if($title_content=get_sub_field('title_content')){?>
                    <div data-aos="fade-up" data-aos-duration="1000">
                        <?php echo $title_content?>
                    </div>
                <?php }?>

                <div class="gallery-content" data-aos="fade-up" data-aos-duration="1000">
                    <?php if($left_side_big_image=get_sub_field('left_side_big_image')){?>
                        <div class="large-image">
                            <div class="image">
                                <img src="<?php echo esc_url($left_side_big_image['url']); ?>"
                                alt="<?php if(esc_attr($left_side_big_image['alt'])){echo esc_attr($left_side_big_image['alt']);}else{?>image<?php }?>"
                                title="<?php if(esc_attr($left_side_big_image['title'])){echo esc_attr($left_side_big_image['title']);}else{?>image<?php }?>">
                            </div>
                        </div>
                    <?php }?>
                    <?php if(have_rows('right_side_images')){?>
                        <div class="grid">
                            <?php while(have_rows('right_side_images')){the_row()?>
                                <?php if($image=get_sub_field('image')){?>
                                    <div class="image">
                                    <img src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php if(esc_attr($image['alt'])){echo esc_attr($image['alt']);}else{?>image<?php }?>"
                                title="<?php if(esc_attr($image['title'])){echo esc_attr($image['title']);}else{?>image<?php }?>">
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div>
                    <?php }?>
                </div>
                <span><a href="<?php the_sub_field('button_link')?>">VIEW MORE</a></span>
            </div>
        </section>
    <?php }}?>




    <?php if(have_rows('testimonial_section')){while(have_rows('testimonial_section')){the_row()?>
        <section class="in-the-spotlight">
            <div class="container">
                <?php if($title_content=get_sub_field('title_content')){?>
                    <div data-aos="fade-up" data-aos-duration="1000">
                        <?php echo $title_content?>
                    </div>
                <?php }?>

                <?php if(have_rows('testimonials')){?>
                    <div class="swiper spotlight-slider">
                        <div class="swiper-wrapper">
                            <?php while(have_rows('testimonials')){the_row()?>
                                <div class="swiper-slide">
                                    <div class="spotContent">
                                        <?php if($image=get_sub_field('image')){?>
                                            <div class="image">
                                                <img src="<?php echo esc_url($image['url']); ?>"
                                                alt="<?php if(esc_attr($image['alt'])){echo esc_attr($image['alt']);}else{?>image<?php }?>"
                                                title="<?php if(esc_attr($image['title'])){echo esc_attr($image['title']);}else{?>image<?php }?>">
                                            </div>
                                        <?php }?>
                                        <?php if($testimonial=get_sub_field('testimonial')){?>
                                            <div class="text">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/home/spotlight/quotes.svg" alt="quotes">
                                                <?php echo $testimonial?>
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                <?php }?>
            </div>
        </section>
    <?php }}?>



    <section class="latest">
        <div class="container">
            <?php $args=array(
                'post_type'=>'post',
                'post_status'=>'publish',
                'posts_per_page'=>'2',
            );
            $latest_news=new WP_Query($args)?>
            <div class="latestNews">
                <?php if($latest_news->have_posts()){?>
                <div class="heading">
                    <?php if($title=get_field('news_section_title')){?>
                    <h2><?php echo $title?></h2>
                    <?php }?>
                    <a href="<?php echo home_url('/news')?>" class="desk-viewall">View all News <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none"><path d="M1 1L5 5L1 9" stroke="#007FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                </div>
                <div class="newsContent">
                <?php while($latest_news->have_posts()){$latest_news->the_post()?>
                    <div class="card">
                        <?php if (has_post_thumbnail()) {?>
                            <div class="image">
                            <?php  $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');?>
                                <img src="<?php echo $img_url[0]?>" alt="image">
                            </div>
                        <?php }?>
                        <div class="text" data-aos="fade-up" data-aos-duration="1000">
                            <h4><?php the_title()?></h4>
                            <a href="<?php the_permalink()?>">Read more <svg xmlns="http://www.w3.org/2000/svg" width="7" height="11" viewBox="0 0 7 11" fill="none"><path d="M1.45312 1.59741L5.33044 5.329L1.45312 9.06059" stroke="#007FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <?php };wp_reset_postdata()?>
                <a href="" class="mobile-viewall">View all News <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none"><path d="M1 1L5 5L1 9" stroke="#007FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
            </div>

            <?php if(have_rows('event_section')){while(have_rows('event_section')){the_row()?>
                <div class="latestEvents">
                    <div class="heading">
                        <?php if($title=get_sub_field('title')){?>
                            <h3><?php echo $title?></h3>
                        <?php }?>
                        <a href="<?php the_sub_field('link')?>" class="desk-viewall">View all Events <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none"><path d="M1 1L5 5L1 9" stroke="#007FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                    </div>
                    <?php if(have_rows('events')){?>
                        <div class="eventsContent">
                            <?php while(have_rows('events')){the_row()?>
                                <div class="card">
                                    <?php if($image=get_sub_field('image')){?>
                                        <div class="image">
                                            <img src="<?php echo esc_url($image['url']); ?>"
                                                alt="<?php if(esc_attr($image['alt'])){echo esc_attr($image['alt']);}else{?>event<?php }?>"
                                                title="<?php if(esc_attr($image['title'])){echo esc_attr($image['title']);}else{?>event<?php }?>">
                                        </div>
                                    <?php }?>
                                    <?php if($event_detail=get_sub_field('event_detail')){?>
                                        <div class="text" data-aos="fade-up" data-aos-duration="1000">
                                            <a href="<?php the_sub_field('link')?>">
                                                <?php echo $event_detail?>
                                            </a>
                                        </div>
                                    <?php }?>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <a href="<?php the_sub_field('link')?>" class="mobile-viewall">View all Events <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none"><path d="M1 1L5 5L1 9" stroke="#007FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                </div>
            <?php }}?>
        </div>
    </section>


    <?php if(have_rows('partner_section')){while(have_rows('partner_section')){the_row()?>
        <section class="associated-partners">
            <div class="container">
                <?php if($title=get_sub_field('title')){?>
                    <h2><?php echo $title?></h2>
                <?php }?>
                <div class="swiper partners-slider">
                    <?php if(have_rows('partners')){?>
                        <div class="swiper-wrapper">
                            <?php while(have_rows('partners')){the_row()?>
                                <?php if($partner_logo=get_sub_field('partner_logo')){?>
                                    <div class="swiper-slide">
                                        <div class="image">
                                            <img src="<?php echo esc_url($partner_logo['url']); ?>"
                                                alt="<?php if(esc_attr($partner_logo['alt'])){echo esc_attr($partner_logo['alt']);}else{?>partner logo<?php }?>"
                                                title="<?php if(esc_attr($partner_logo['title'])){echo esc_attr($partner_logo['title']);}else{?>partner logo<?php }?>">
                                        </div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div>
                    <?php }?>
                </div>
            </div>
        </section>
    <?php }}?>


</div>

<?php get_footer(); ?>