<?php
    /*
    Template Name: Careers Page
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

<div class="careers_page">
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
        <section class="work-with-us">
            <div class="container">
                <div class="work-with-usContent">
                    <?php if($left_content=get_sub_field('left_content')){?>
                        <div class="left">
                            <?php echo $left_content?>
                        </div>
                    <?php }?>
                    <?php if($right_text=get_sub_field('right_text')){?>
                        <div class="right">
                            <h3><?php echo $right_text?></h3>
                        </div>
                    <?php }?>
                </div>
            </div>
            <?php if($image=get_field('image')){?>
            <div class="display-img">
                <img src="<?php echo esc_url($image['url']); ?>"
                alt="<?php if(esc_attr($image['alt'])){echo esc_attr($image['alt']);}else{?>sri rama chandra sports career<?php }?>"
                title="<?php if(esc_attr($image['title'])){echo esc_attr($image['title']);}else{?>sri rama chandra sports career<?php }?>">
            </div>
            <?php }?>
        </section>
    <?php }}?>

    <?php if(have_rows('open_position_section')){while(have_rows('open_position_section')){the_row()?>
        <section class="open-positions">
            <div class="container">
                <?php if($titles=get_sub_field('titles')){?>
                    <?php echo $titles?>
                <?php }?>
                <?php if(have_rows('positions')){?>
                <div class="open-positionsContent">
                    <table id="myTable">
                        <tbody>
                            <?php while(have_rows('positions')){the_row()?>
                            <tr>
                                <?php if($position_title=get_sub_field('position_title')){?>
                                    <td class="job-role"><?php echo $position_title?></td>
                                <?php }?>
                                <?php if($position_type_and_location=get_sub_field('position_type_and_location')){?>
                                    <td class="job-location"><?php echo $position_type_and_location?></td>
                                <?php }?>
                                <?php if($experience=get_sub_field('experience')){?>
                                    <td class="experience"><?php echo $experience?></td>
                                <?php }?>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                <?php }?>
                <?php if($bottom_content=get_sub_field('bottom_content')){?>
                    <?php echo $bottom_content?>
                <?php }?>
            </div>
        </section>
    <?php }}?>
</div>
<?php get_footer(); ?>