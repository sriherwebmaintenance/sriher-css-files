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
                    <h1>B.Sc. (Hons) Sports & Exercise Sciences</h1>
                    <h2>Master the Skills, Strategies, and Science of Sports</h2>
                    <p>A multi-disciplinary programme designed to focus on the scientific principles that underpin the exercise and sport. A 4 year programme which offers many opportunities to apply theoretical knowledge in a variety of practical situations.</p>
                    <ul>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/education/blue-tick.svg" alt=""><span>Four Year Full Time</span></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/education/blue-tick.svg" alt=""><span>International standard</span></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/education/blue-tick.svg" alt=""><span>Credit based programme</span></li>
                    </ul>
                </div>
                <div class="right">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/education/detail-banner.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="programme">
        <div class="container">
            <div class="programmeContent" data-sticky-container >
                <div class="left">
                    <div class="tabSection">
                        <div class="tabsMenu">
                            <ul class="tabs">
                                <li><a href="#tab1" class="tab active">Overview</a></li>
                                <li><a href="#tab2" class="tab">curriculum</a></li>
                                <li><a href="#tab3" class="tab">Testimonials</a></li>
                            </ul>
                        </div>
                    
                        <div class="tab_container">
                            <div id="tab1" class="tab_content">
                                <div class="content">
                                    <h2>About the Course(Overview)</h2>
                                    <p>Offered by Sri Ramachandra Institute of Higher Education & Research (Deemed to be university), this multi-disciplinary 4-year program is designed to emphasize the scientific principles that underpin exercise and sport, offering numerous opportunities to apply theoretical knowledge in various practical situations.</p>
                                </div>
                                <div class="content">
                                    <h3>Who can do this programme?</h3>
                                    <p>Candidates must have passed HSC/CBSE/ISC or equivalent examination with Physics, Chemistry, and Biology (Mathematics is preferable but optional) as main subjects with the minimum of 70%.</p>
                                </div>
                                <div class="content">
                                    <h3>What would I study?</h3>
                                    <ul>
                                        <li>Four year programme (8 semesters) including one year of internship</li>
                                        <li>Choice based credit system</li>
                                        <li>Basic medical sciences</li>
                                        <li>Fundamental & Applied Sports Biomechanics</li>
                                        <li>Fundamental & Applied Exercise Physiology</li>
                                        <li>Exercise Prescription for Athletic Performance and Chronic Diseases</li>
                                        <li>Fundamental &Applied Sports Nutrition</li>
                                        <li>Fundamental &Applied Sports Psychology</li>
                                        <li>Research Methodology& Biostatistics</li>
                                        <li>Basic trauma care management</li>
                                        <li>Internship</li>
                                        <li>Research project</li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <h3>What are my career options?</h3>
                                    <ul>
                                        <li>Can work in a hospital: Sports Scientist can work in a hospital or in Rehabilitation centres or in the community. He / She can educate and train people about Fitness, Exercises & Sports Training and Injury prevention.</li>
                                        <li>Private Practice: may offer consultations to a wide range of people who seek opinions for lifestyle fitness, Sports Training and performance enhancement.</li>
                                        <li>Corporate sectors and Industries: There is a growing demand for Fitness consultants and Trainers in our country to work in large corporate sectors and industries which operate health care and fitness centres.</li>
                                        <li>Schools, Colleges & other Educational Institutions: Sports scientists along with Physical Education specialists can monitor the physical condition of the students and impart special training to improve their sports activities.</li>
                                        <li>Commercial Fitness Centres: can work as consultants in these facilities to offer scientific advice and training to their clients.</li>
                                        <li>Sports persons, Teams & Clubs: Opportunities exist to work with sports persons at individual level or with the various teams and sports clubs for a promising career</li>
                                    </ul>
                                </div>
                                <a href="" class="download"><img src="<?php echo get_template_directory_uri(); ?>/images/education/pdf.svg" alt=""><span>Download Brochure</span></a>
                            </div>
                            <div id="tab2" class="tab_content">
                                <div class="content">
                                    <h2>About the Course(curriculum)</h2>
                                    <p>Offered by Sri Ramachandra Institute of Higher Education & Research (Deemed to be university), this multi-disciplinary 4-year program is designed to emphasize the scientific principles that underpin exercise and sport, offering numerous opportunities to apply theoretical knowledge in various practical situations.</p>
                                </div>
                                <div class="content">
                                    <h3>Who can do this programme?</h3>
                                    <p>Candidates must have passed HSC/CBSE/ISC or equivalent examination with Physics, Chemistry, and Biology (Mathematics is preferable but optional) as main subjects with the minimum of 70%.</p>
                                </div>
                                <div class="content">
                                    <h3>What would I study?</h3>
                                    <ul>
                                        <li>Four year programme (8 semesters) including one year of internship</li>
                                        <li>Choice based credit system</li>
                                        <li>Basic medical sciences</li>
                                        <li>Fundamental & Applied Sports Biomechanics</li>
                                        <li>Fundamental & Applied Exercise Physiology</li>
                                        <li>Exercise Prescription for Athletic Performance and Chronic Diseases</li>
                                        <li>Fundamental &Applied Sports Nutrition</li>
                                        <li>Fundamental &Applied Sports Psychology</li>
                                        <li>Research Methodology& Biostatistics</li>
                                        <li>Basic trauma care management</li>
                                        <li>Internship</li>
                                        <li>Research project</li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <h3>What are my career options?</h3>
                                    <ul>
                                        <li>Can work in a hospital: Sports Scientist can work in a hospital or in Rehabilitation centres or in the community. He / She can educate and train people about Fitness, Exercises & Sports Training and Injury prevention.</li>
                                        <li>Private Practice: may offer consultations to a wide range of people who seek opinions for lifestyle fitness, Sports Training and performance enhancement.</li>
                                        <li>Corporate sectors and Industries: There is a growing demand for Fitness consultants and Trainers in our country to work in large corporate sectors and industries which operate health care and fitness centres.</li>
                                        <li>Schools, Colleges & other Educational Institutions: Sports scientists along with Physical Education specialists can monitor the physical condition of the students and impart special training to improve their sports activities.</li>
                                        <li>Commercial Fitness Centres: can work as consultants in these facilities to offer scientific advice and training to their clients.</li>
                                        <li>Sports persons, Teams & Clubs: Opportunities exist to work with sports persons at individual level or with the various teams and sports clubs for a promising career</li>
                                    </ul>
                                </div>
                                <a href="" class="download"><img src="<?php echo get_template_directory_uri(); ?>/images/education/pdf.svg" alt=""><span>Download Brochure</span></a>
                            </div>
                            <div id="tab3" class="tab_content">
                                <div class="content">
                                    <h2>About the Course(Testimonials)</h2>
                                    <p>Offered by Sri Ramachandra Institute of Higher Education & Research (Deemed to be university), this multi-disciplinary 4-year program is designed to emphasize the scientific principles that underpin exercise and sport, offering numerous opportunities to apply theoretical knowledge in various practical situations.</p>
                                </div>
                                <div class="content">
                                    <h3>Who can do this programme?</h3>
                                    <p>Candidates must have passed HSC/CBSE/ISC or equivalent examination with Physics, Chemistry, and Biology (Mathematics is preferable but optional) as main subjects with the minimum of 70%.</p>
                                </div>
                                <div class="content">
                                    <h3>What would I study?</h3>
                                    <ul>
                                        <li>Four year programme (8 semesters) including one year of internship</li>
                                        <li>Choice based credit system</li>
                                        <li>Basic medical sciences</li>
                                        <li>Fundamental & Applied Sports Biomechanics</li>
                                        <li>Fundamental & Applied Exercise Physiology</li>
                                        <li>Exercise Prescription for Athletic Performance and Chronic Diseases</li>
                                        <li>Fundamental &Applied Sports Nutrition</li>
                                        <li>Fundamental &Applied Sports Psychology</li>
                                        <li>Research Methodology& Biostatistics</li>
                                        <li>Basic trauma care management</li>
                                        <li>Internship</li>
                                        <li>Research project</li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <h3>What are my career options?</h3>
                                    <ul>
                                        <li>Can work in a hospital: Sports Scientist can work in a hospital or in Rehabilitation centres or in the community. He / She can educate and train people about Fitness, Exercises & Sports Training and Injury prevention.</li>
                                        <li>Private Practice: may offer consultations to a wide range of people who seek opinions for lifestyle fitness, Sports Training and performance enhancement.</li>
                                        <li>Corporate sectors and Industries: There is a growing demand for Fitness consultants and Trainers in our country to work in large corporate sectors and industries which operate health care and fitness centres.</li>
                                        <li>Schools, Colleges & other Educational Institutions: Sports scientists along with Physical Education specialists can monitor the physical condition of the students and impart special training to improve their sports activities.</li>
                                        <li>Commercial Fitness Centres: can work as consultants in these facilities to offer scientific advice and training to their clients.</li>
                                        <li>Sports persons, Teams & Clubs: Opportunities exist to work with sports persons at individual level or with the various teams and sports clubs for a promising career</li>
                                    </ul>
                                </div>
                                <a href="" class="download"><img src="<?php echo get_template_directory_uri(); ?>/images/education/pdf.svg" alt=""><span>Download Brochure</span></a>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="callbackform" data-margin-top="100" data-sticky-for="1023">
                        <h2>Request a call back</h2>
                        <form action="">
                            <input type="text" id="name" name="name" placeholder="Name" ><br>
                            <input type="text" id="contact" name="contact" placeholder="Phone Number"><br> 
                            <input type="text" id="email" name="email" placeholder="Email"><br>
                            <button class="">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="start-journey">
        <div class="container">
            <div class="content">
                <h2>Start Your Journey to Sporting Greatness Now!</h2>
                <a href="">explore courses</a>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>