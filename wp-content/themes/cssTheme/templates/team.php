<?php
    /*
    Template Name: Team Page
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


                $(".tab_content").hide(); //Hide all content
                $("ul.teamTab li:first").addClass("active").show(); //Activate first tab
                $(".tab_content:first").show(); //Show first tab content
                //On Click Event
                $("ul.teamTab li").click(function() {
                    $("ul.teamTab li").removeClass("active"); //Remove any "active" class
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

<div class="team_page">
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




    <?php if(have_rows('team_section')){?>
        <section class="team">
            <div class="container">
                <ul class="teamTab">
                    <?php $i=1;while(have_rows('team_section')){the_row()?>
                        <?php if($tab_title=get_sub_field('tab_title')){?>
                            <li><a class="tab<?php if($i==1){?> active<?php }?>" href="#<?php echo str_replace(" ","-",$tab_title);$i=2;?>"><span><?php echo $tab_title?></span></a></li>
                        <?php }?>
                    <?php }?>
                </ul>
                <div class="tab_container">
                    <?php  while(have_rows('team_section')){the_row();$tab_title=get_sub_field('tab_title')?>
                        <div class="tab_content" id="<?php echo str_replace(" ","-",$tab_title);?>">
                            <div class="teamContent" >
                                <?php if(have_rows('team_members')){while(have_rows('team_members')){the_row()?>
                                    <div class="card">
                                        <?php if($photo=get_sub_field('photo')){?>
                                            <div class="image">
                                                <img src="<?php echo esc_url($photo['url']); ?>"
                                                alt="<?php if(esc_attr($photo['alt'])){echo esc_attr($photo['alt']);}else{?>Team member<?php }?>"
                                                title="<?php if(esc_attr($photo['title'])){echo esc_attr($photo['title']);}else{?>Team member<?php }?>">
                                            </div>
                                        <?php }?>
                                        <?php if($member_detail=get_sub_field('member_detail')){?>
                                            <div class="text">
                                                <?php echo $member_detail?>
                                            </div>
                                        <?php }?>
                                    </div>
                                <?php }}?>

                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </section>
    <?php }?>
</div>

<?php get_footer(); ?>