<?php
     /*
    Template Name: Contact Page
    */
    get_header();

?>

<div class="contact_page">
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



    <section class="contact">
        <div class="container">
            <div class="contactContent">
                <div class="form">
                    <?php if($form_title=get_field('form_title')){?>
                        <h2><?php echo $form_title?></h2>
                    <?php }?>
                    <?php echo do_shortcode('[contact-form-7 id="4ca51b5" title="Contact form]')?>
                </div>
                <div class="contactAddress">
                    <?php if($address=get_field('address')){?>
                        <?php echo $address?>
                    <?php }?>
                    <ul>
                        <?php if($map_link=get_field('map_link')){?>
                            <li id="loc"><img src="<?php echo get_template_directory_uri(); ?>/images/contact/loc.svg" alt="loc"><a target="_blanks" href="<?php echo $map_link?>"><span>View Location on Map</span></a></li>
                        <?php }?>
                        <?php if($phone=get_field('phone')){?>
                            <li><img src="<?php echo get_template_directory_uri(); ?>/images/contact/phone.svg" alt="phone"><span>Phone :<a href="tel:<?php echo $phone?>"><?php echo $phone?></a> </span></li>
                        <?php }?>
                        <?php if($phone=get_field('mobile')){?>
                            <li><img src="<?php echo get_template_directory_uri(); ?>/images/contact/mobile.svg" alt="mobile"><span>Mobile :<a href="tel:+<?php echo $phone?>"><?php echo $phone?></a> </span></li>
                        <?php }?>
                        <?php if($mail=get_field('mail')){?>
                            <li><img src="<?php echo get_template_directory_uri(); ?>/images/contact/email.svg" alt="email"><span>Email :<a href="mailto:<?php echo $mail?>"><?php echo $mail?></a></span></li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </section>


</div>


<?php get_footer(); ?>