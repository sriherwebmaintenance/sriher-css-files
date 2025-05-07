<?php
    /*
    Template Name: News Page
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

<div class="news_page">
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
    <?php
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' =>10,
        );
        $news = new WP_Query($args);
        if($news->have_posts()){
    ?>
    <?php $i=1;while($news->have_posts()){$news->the_post();if($i==1){$i++;?>
            <section class="athlete-care">
                <div class="container">
                    <div class="athlete-care-content">
                        <div class="left">
                            <?php if (has_post_thumbnail()) {
                                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');?>
                                <img src="<?php echo $img_url[0]?>" alt="image">
                            <?php }?>
                        </div>
                        <div class="right">
                            <div class="text" data-aos="fade-up" data-aos-duration="1500">
                                <span>Latest News</span>
                                <h2><?php the_title()?></h2>
                                <p><?php the_excerpt()?></p>
                                <a href="<?php echo get_permalink()?>">Read more <svg xmlns="http://www.w3.org/2000/svg" width="7" height="11" viewBox="0 0 7 11" fill="none"><path d="M1.45312 1.59741L5.33044 5.329L1.45312 9.06059" stroke="#007FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php }}?>

        <section class="news">
            <div class="container">
                <div class="newsContent">
                    <?php $i=1;while($news->have_posts()){$news->the_post();if($i==1){$i++;continue;}?>
                        <div class="card">
                            <?php if (has_post_thumbnail()) {
                                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');?>
                                <img src="<?php echo $img_url[0]?>" alt="image">
                            <?php }?>
                            <div class="cardText">
                                <h3><?php the_title()?></h3>
                                <p><?php the_excerpt()?></p>
                                <a title="Click to more details" href="<?php echo get_permalink()?>">Read more <svg xmlns="http://www.w3.org/2000/svg" width="7" height="11" viewBox="0 0 7 11" fill="none"><path d="M1.45312 1.59741L5.33044 5.329L1.45312 9.06059" stroke="#007FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                            </div>
                        </div>
                    <?php $i++;}?>
                </div>
                <a href="" class="load-more">LOAD MORE</a>
            </div>
        </section>
    <?php }?>
</div>

<?php get_footer(); ?>