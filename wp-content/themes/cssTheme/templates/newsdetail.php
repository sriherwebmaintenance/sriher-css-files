<?php
    /*
    Template Name: NewsDetail Page
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

<div class="news_detail_page">
    <section class="innerBanner">
        <div class="container">
            <div class="bannerText">
                <h1>News</h1>
                <p>Stay Informed with the Latest Headlines Here</p>
            </div>
        </div>
    </section>
    <section class="newsDetail">
        <div class="container">
            <div class="text">
               <h2>Revolutionizing Athlete Care</h2>
                <h4>Posted by CSS on 12 October 2023 in News</h4>
                <h5>Cras id dui. Aenean massa. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor. Proin magna. Nam at tortor in tellus interdum sagittis. In dui magna, posuere eget, vestibulum.</h5>
            </div>
            <div class="image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/news/newsdetail.png" alt="newsdetail">
            </div>
            <div class="text bottom-text">
                <div class="content">
                    <h3>Ut varius tincidunt libero</h3>
                    <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id purus. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Fusce pharetra convallis urna. Maecenas ullamcorper, dui et placerat feugiat, eros pede varius nisi, condimentum viverra felis nunc et lorem. Aliquam eu nunc. Nunc egestas, augue at pellentesque laoreet, felis eros vehicula leo, at malesuada velit leo quis pede. Maecenas ullamcorper, dui et placerat feugiat, eros pede varius nisi, condimentum viverra felis nunc et lorem.</p>
                </div>
                <div class="content">
                    <h3>Donec interdum</h3>
                    <p>Fusce vulputate eleifend sapien. Ut leo. Praesent turpis. Maecenas vestibulum mollis diam. Pellentesque auctor neque nec urna.</p>
                    <ul>
                        <li>Aenean tellus metus bibendum sed</li>
                        <li>Nullam accumsan lorem in dui.</li>
                        <li>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</li>
                        <li>In ut quam vitae odio lacinia tincidunt.</li>
                        <li>Phasellus accumsan cursus velit.</li>
                        <li>Nulla neque dolor, sagittis eget, iaculis quis, molestie non, velit. Suspendisse feugiat.</li>
                    </ul>
                </div>
                <div class="content">
                    <h3>Praesent metus tellus</h3>
                    <p>Suspendisse non nisl sit amet velit hendrerit rutrum. Aenean ut eros et nisl sagittis vestibulum. Sed mollis, eros et ultrices tempus, mauris ipsum aliquam libero, non adipiscing dolor urna a orci. Fusce pharetra convallis urna. Fusce commodo aliquam arcu. Sed hendrerit. Praesent adipiscing. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Curabitur a felis in nunc fringilla tristique. Nam commodo suscipit quam.</p>
                    <p>Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ullamcorper mauris at ligula. Sed lectus. Curabitur a felis in nunc fringilla tristique. Pellentesque ut neque.</p>
                </div>
            </div>
            <div class="view-all-share">
                <a href="" id="grid"><img src="<?php echo get_template_directory_uri(); ?>/images/news/grid.svg" alt="grid">View all news</a>
                <a href="" id="share">share <img src="<?php echo get_template_directory_uri(); ?>/images/news/share.png" alt="share"></a>
            </div>
        </div>
    </section>
    <!-- <section class="start-journey">
        <div class="container">
            <div class="content">
                <h2>Start Your Journey to Sporting Greatness Now!</h2>
                <a href="">explore courses</a>
            </div>
        </div>
    </section> -->
</div>
<?php get_footer(); ?>