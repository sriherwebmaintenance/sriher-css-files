<?php
    /*
    Template Name: Programme  Page
    */
    get_header();
    wp_enqueue_script('sticky');
    add_action('wp_footer','page_scripts',25);
    function page_scripts(){?>
        <script>
                $(document).ready(function () {
                $('.tab').click(function() {
                    $('.tab.active').removeClass("active");
                    $(this).addClass("active");
                });

                //Default Action
                $(".tab_content").hide(); //Hide all content
                $("ul.tabs li:first").addClass("active").show(); //Activate first tab
                $(".tab_content:first").show(); //Show first tab content

                //On Click Event
                $("ul.tabs li").click(function() {
                    $("ul.tabs li").removeClass("active"); //Remove any "active" class
                    $(this).addClass("active"); //Add "active" class to selected tab
                    $(".tab_content").hide(); //Hide all tab content
                    var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                    $(activeTab).fadeIn(); //Fade in the active content
                    return false;
                });

                var sticky = new Sticky(".callbackform");
                sticky.update();

            });
        </script>
	<?php
    }
?>
<div class="programme_page">
    <section class="innerBanner">
        <div class="container">
            <div class="bannerContent">
                <div class="left">
                    <h1><?php the_title()?></h1>
                    <?php if($baner_content=get_field('detail_page_banner_content')){?>
                        <?php echo $baner_content?>
                    <?php }?>
                </div>
                <div class="right">
                    <?php if($baner_image=get_field('banner_image')){?>
                        <div class="image">
                            <img src="<?php echo esc_url($baner_image['url']); ?>"
                            alt="<?php if(esc_attr($baner_image['alt'])){echo esc_attr($baner_image['alt']);}else{?>image<?php }?>"
                            title="<?php if(esc_attr($baner_image['title'])){echo esc_attr($baner_image['title']);}else{?>image<?php }?>">
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <section class="programme">
        <div class="container">
            <div class="programmeContent" data-sticky-container>
                <div class="left">
                    <div class="tabSection">
                        <?php if(have_rows('detail_page_content')){?>
                            <div class="tabsMenu">
                                <ul class="tabs">
                                    <?php $i=1;while(have_rows('detail_page_content')){the_row()?>
                                        <?php if($tab_title=get_sub_field('tab_title')){?>
                                            <li><a href="#<?php echo str_replace(" ","-",$tab_title);?>" class="tab<?php if($i==1){$i=2;?> active<?php }?>"><?php echo $tab_title?></a></li>
                                        <?php }?>
                                    <?php }?>
                                </ul>
                            </div>
                        <?php }?>


                        <?php if(have_rows('detail_page_content')){?>
                            <div class="tab_container">
                                <?php while(have_rows('detail_page_content')){the_row();$tab_title=get_sub_field('tab_title')?>
                                        <div id="<?php echo str_replace(" ","-",$tab_title);?>" class="tab_content">
                                            <?php if(have_rows('add_section')){while(have_rows('add_section')){the_row(); if($content=get_sub_field('content')){?>
                                                <div class="content">
                                                    <?php echo $content?>
                                                </div>
                                            <?php }}}?>
                                            <?php if(have_rows('table')){?>
                                                <div class="curriculum-table">
                                                    <?php while(have_rows('table')){the_row(); ?>
                                                        <div class="table-block">
                                                            <div class="left">
                                                                <?php if($title=get_sub_field('title')){?>
                                                                    <h3><?php echo $title?></h3>
                                                                <?php }?>
                                                            </div>
                                                            <div class="right">
                                                                <?php if($content=get_sub_field('content')){?>
                                                                    <p><?php echo $content?></p>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            <?php }?>


                                            <?php if(have_rows('testimonials')){?>
                                                <div class="testimonial-table">
                                                    <?php while(have_rows('testimonials')){the_row(); ?>
                                                        <div class="table-block">
                                                            <?php if($image=get_sub_field('image')){?>
                                                                <div class="image">
                                                                    <img src="<?php echo $image?>" alt="test">
                                                                </div>
                                                            <?php }else{?>
                                                                <div class="image">
                                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/test.png" alt="test">
                                                                </div>
                                                            <?php }?>
                                                            <div class="text">
                                                                <div class="title">
                                                                    <?php if($details=get_sub_field('details')){?>
                                                                        <?php echo $details?>
                                                                    <?php }?>
                                                                </div>
                                                                <?php if($content=get_sub_field('content')){?>
                                                                    <p><?php echo $content?></p>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            <?php }?>


                                            <?php if($brochure=get_sub_field('brochure')){?>
                                                <a href="<?php echo $brochure?>" class="download"><img src="<?php echo get_template_directory_uri(); ?>/images/education/pdf.svg" alt="icon"><span>Download Brochure</span></a>
                                            <?php }?>
                                        </div>

                                <?php }?>


                            </div>
                        <?php }?>
                    </div>
                </div>
                <div class="right">
                    <div class="callbackform" data-margin-top="100" data-sticky-for="1023">
                        <h2>Request a call back</h2>
                        <?php echo do_shortcode('[contact-form-7 id="8d3ad2c" title="Request a call back programme detail page"]')?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>