<?php
    /*
    Template Name: Education Page
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

            });
        </script>
	<?php
    }
?>

<div class="education_page">
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


    <?php if($content=get_field('first_section_content')){?>
        <section class="top-notch">
            <div class="container">
                <?php echo $content?>
            </div>
        </section>
    <?php }?>
    <section class="courses-offered">
        <div class="container">
            <?php if($title=get_field('second_section_title')){?>
                <h2><?php echo $title?></h2>
            <?php }?>
            <div class="tabSection">
                <?php $terms=get_terms(array(
                    'taxonomy' => 'programmes-category',
                ) );?>
                <div class="tabsMenu">
                    <ul class="tabs">
                        <?php $i=1;foreach ( $terms as $term ) {?>
                            <li><a href="#<?php echo str_replace(" ","-",$term->name);?>" class="tab<?php if($i==1){$i=2?> active<?php }?>"><?php echo $term->name?></a></li>
                        <?php }?>
                    </ul>
                </div>

                <?php ?>
                <div class="tab_container">
                    <?php foreach ( $terms as $term ) {?>
                        <?php
                            $args = array(
                                'post_type' => 'programmes',
                                'post_status' => 'publish',
                                'posts_per_page' =>-1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'programmes-category',
                                        'terms' => $term,
                                    )
                                ),
                            );
                            $programme = new WP_Query($args);
                        ?>
                        <div id="<?php echo str_replace(" ","-",$term->name);?>" class="tab_content">
                            <?php if($programme->have_posts()){while($programme->have_posts()){$programme->the_post()?>
                                <div class="card">
                                    <?php if (has_post_thumbnail()) {
                                        $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');?>
                                        <div class="image">
                                            <img src="<?php echo $img_url[0]?>" alt="image">
                                        </div>
                                    <?php }?>
                                    <div class="text">
                                        <h3><?php the_title()?></h3>
                                        <?php if($listing_page_box_content=get_field('listing_page_box_content')){?>
                                            <?php echo $listing_page_box_content?>
                                        <?php }?>
                                        <a href="<?php the_permalink() ?>">more info</a>
                                    </div>
                                </div>
                            <?php }}?>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>


</div>


<?php get_footer(); ?>