<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Framework/Tools.php';

class Layout_View
{
    private $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }
    
    /**
     * function printHTMLPage
     *
     * Prints the content of the whole website
     *
     * @param head 		(string) Is the head of the HTML structure
     * @param header 	(string) Is the menu and logo section
     * @param bodyType	(string) Is for CSS purposes
     * @param body		(string) Content of the website
     *
     */
    
    public function printHTMLPage($section)
    {
        ?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8" />
            <title><?php echo $this->data['info']['title'].' - '.$this->data['seo']['title']; ?></title>
            <meta name="apple-mobile-web-app-capable" content="yes" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
            <meta name="HandheldFriendly" content="true" />
            <meta name="apple-touch-fullscreen" content="yes" />
            <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/favicon/apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon/favicon-16x16.png">
            <link rel="manifest" href="/assets/images/favicon/site.webmanifest">
            <link rel="mask-icon" href="/assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
            <link rel="shortcut icon" href="/assets/images/favicon/favicon.ico">
            <meta name="msapplication-TileColor" content="#da532c">
            <meta name="msapplication-config" content="/assets/images/favicon/browserconfig.xml">
            <meta name="theme-color" content="#ffffff">
            <!-- Google Fonts-->
            <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
            
            <?php 
            echo self::getCommonStyle();
            ?>
        </head>
		<body>
			<div class="page">
				<?php 
                echo self::getCommonHeader();
                ?>
                <!--========================================================
                                  CONTENT
                =========================================================-->
            		<main>
                    	<?php
        			    switch ($section) 
        			    {
                        case 'index':
                            echo self :: getIndexPolaroids();
                            echo self :: getRule();
                            echo self :: getIndexWelcome();
                            echo self :: getIndexPreAbout();
                            echo self :: getIndexContact();
                            echo self :: getIndexGallery();
        				    break;
        				    
                        case 'services':
                            echo self :: getServiceSectionOne();
                            echo self :: getRule();
                            echo self :: getServicesPolaroids();
                            echo self :: getIndexWelcome();
                            echo self :: getIndexPreAbout();
                            echo self :: getIndexContact();
                            echo self :: getIndexGallery();
                        break;
        				
        				    default:
        				    break;
        			    }
                    ?>
            		</main>
            		<?php
                    echo self::getFooter(); 
                ?>
			</div>
			<?php
			echo self::getCommonScripts();
			echo self::getGoogleAnalytics()
			?>
			<!-- <div id="getSize"><p>W: <span></span></p><p>H: <span></span></p></div> -->
		</body>
	</html>
    <?php
    }
    
    public function getCommonStyle()
    {
        ob_start();
        ?>
        <!-- MAIN STYLESHEETS-->
        <link rel="stylesheet" href="/assets/css/bootstrap.css" type="text/css" media="all" />
        <link rel="stylesheet" href="/assets/css/theme.css" type="text/css" media="all" />
        <?php
        $style = ob_get_contents();
        ob_end_clean();
        return $style;
    }
    
    public function getCommonScripts()
    {
        ob_start();
        ?>
    		<script src="/js/jquery.js"></script>
        <script src="/js/jquery-migrate-1.2.1.js"></script>
        
            <!--[if lt IE 9]>
            <html class="lt-ie9">
            <div style=' clear: both; text-align:center; position: relative;'>
                <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
                    <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                         alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
                </a>
            </div>
            <script src="js/html5shiv.js"></script>
            <![endif]-->
        
        <script src='/js/device.min.js'></script>
        <script src="/js/script.js"></script>
    		<?php
    	$scripts = ob_get_contents();
    	ob_end_clean();
    	return $scripts;
    }
    
    public function getGoogleAnalytics()
	{
		ob_start();
		?>
		<?php 
		$google = ob_get_contents();
		ob_end_clean();
		return $google;
	}
    public function getCommonHeader()
    {
        ob_start();
        ?>
        <!--========================================================
                              HEADER
        =========================================================-->
        <header>
            <div id="stuck_container" class="stuck_container">
                <!-- 
                <div class="brand inset-1">
                    <h1 class="brand_name">
                        <a href="index.html">Engraving</a>
                    </h1>
                </div>
                 -->
    
                <nav class="nav inset-2">
                    <ul class="sf-menu font-menu" data-type="navbar">
                        <li class="active">
                            <a href="/">ABOUT US</a>
                        </li>
                        <li>
                            <a href="/services/">SERVICES</a>
                        </li>
                        <li>
                            <a href="index-1.back.html">GALLERY</a>
                        </li>
                        <!-- <li>
                            <a href="index-2.html">GALLERY</a>
                            <ul>
                                <li>
                                    <a href="index.html#">Testimonials</a>
                                </li>
                                <li>
                                    <a href="index.html#">Conse ctetur</a>
                                    <ul>
                                        <li>
                                            <a href="index.html#">Lorem</a>
                                        </li>
                                        <li>
                                            <a href="index.html#">Dolor</a>
                                        </li>
                                        <li>
                                            <a href="index.html#">Sit amet</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="index.html#">Do eiusmod</a>
                                </li>
                                <li>
                                    <a href="index.html#">Incididunt ut</a>
                                </li>
                                <li>
                                    <a href="index.html#">Et dolore</a>
                                </li>
                                <li>
                                    <a href="index.html#">Ut enim ad minim</a>
                                </li>
                            </ul>
                        </li> -->
                        <li>
                            <a href="index-2.back.html">TESTIMONIALS</a>
                        </li>
                        <li>
                            <a href="index-4.back.html">BLOG</a>
                        </li>
                        <li>
                            <a href="index-4.back.html">CONTACT</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getFooter()
    {
        ob_start();
        ?>
        <!--========================================================
                              FOOTER
        =========================================================-->
        <footer>
            <section>
                <div class="container text-center">
                    <h2 class="small">Follow us</h2>
                    
                       <!-- {%FOOTER_LINK} -->
                    <ul class="inline-list">
                        <li class="wow fadeInUp" data-wow-delay="0.4s"> 
                            <a href= "https://web.facebook.com/myperfectweddingmexico/"><img class="social" src="/images/icono-fb.png" alt=""></a>
                        </li>
                        <li class="wow fadeInUp" data-wow-delay="0.6s">
                            <a href="https://www.instagram.com/myperfectweddingmexico/"><img class="social" src="/images/Icono-In.png" alt=""></a>
                        </li>
                        <li class="wow fadeInUp" data-wow-delay="0.8s">
                            <img class="social" src="/images/icono-pn.png" alt=""><a href='index.html#'></a>
                        </li>
                    </ul>
                </div>
            </section>
        </footer>
        <!-- 
        <footer>
            <section>
                <div class="container text-center">
                    <h2 class="small">Follow us</h2>
                    
                       
                    <ul class="inline-list">
                        <li class="wow fadeInUp" data-wow-delay="0.4s"> 
                            <a href= "https://web.facebook.com/myperfectweddingmexico/"><img class="social" src="/images/icono-fb.png" alt=""></a>
                        </li>
                        <li class="wow fadeInUp" data-wow-delay="0.6s">
                            <a href="https://www.instagram.com/myperfectweddingmexico/"><img class="social" src="/images/Icono-In.png" alt=""></a>
                        </li>
                        <li class="wow fadeInUp" data-wow-delay="0.8s">
                            <img class="social" src="/images/icono-pn.png" alt=""><a href='index.html#'></a>
                        </li>
                    </ul>
                </div>
            </section>
        </footer> -->
        <?php
        $footer = ob_get_contents();
        ob_end_clean();
        return $footer;
    }
    
    public function getIndexPolaroids()
    {
        ob_start();
        ?>
        <section class="bg-img-index-section-one well-4 bg-rosa">
            <div class="container">
                <div class="row">
                    <div class="polaroid-box posicion col-md-3 col-md-offset-1 col-sm-6 col-offset-xs wow fadeInLeft" data-wow-delay="0.8s">
						<div class="polaroid">
                            <div class="text-center">
                             <a href="#"><img src="<?php echo $this->data['info']['url']; ?>/images/home/polaroids/michelle-about-me-polaroid.jpg" alt=""></a>
                                <h2 class="small">Michelle</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInLeft" data-wow-delay="0.6s">
                    		<div class="polaroid-big">
                            <div class="text-center">
                                <img src="<?php echo $this->data['info']['url']; ?>/images/home/polaroids/michelle-services-polaroid.jpg" alt=""/>
                                <h2 class="small">Services</h2>
                            </div>
                        </div>
                    </div>
                    <div class="polaroid-box col-md-3 col-sm-6 col-md-offset-0 col-sm-offset-3 wow fadeInLeft" data-wow-delay="0.4s">
                    		<div class="polaroid">
                            <div class="text-center">
                                <a href="#"><img src="<?php echo $this->data['info']['url']; ?>/images/home/polaroids/michelle-our-work-polaroid.jpg" alt=""></a>
                                <h2 class="small">Our work</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getIndexWelcome()
    {
        ob_start();
        ?>
        <section class="well__off-1 well__off-2">
            <div class="container text-center wow fadeInUp animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
            		<hr class="rose-index-welcome">
                <h2 class="small">Welcome</h2>
                <p class="off inset-5"></p>
                <p class="off inset-5 regular-font"> Welcome to our site - Have a look around & begin to envision the wedding of your dreams!</p>
				<div class="row">
                    <div class="col-md-3 col-sm-6 col-offset-xs wow fadeInLeft animated" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                        <div class="text-center">
                            <img src="<?php echo $this->data['info']['url']; ?>images/home/welcome/1OUR-SERVICES-01.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-offset-xs wow fadeInLeft animated" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                        <div class="text-center">
                            <img src="<?php echo $this->data['info']['url']; ?>images/home/welcome/2Meet-Michelle-01.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-offset-xs wow fadeInLeft animated" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                        <div class="text-center">
                            <img src="<?php echo $this->data['info']['url']; ?>images/home/welcome/3GALLERY-01.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-offset-xs wow fadeInLeft animated" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                        <div class="text-center">
                            <img src="<?php echo $this->data['info']['url']; ?>images/home/welcome/4LoveStories-01.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getIndexPreAbout()
    {
        ob_start();
        ?>
        <section class="well__off-1 well__off-3">
        		
            <div class="container text-center wow fadeInUp animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
				
				<div class="img-rose-index-pre-about">
					<img class="" src="/images/home/rose-index-pre-about.svg">
				</div>
				<div class="row">
                    <div class="no-margin col-md-5 col-sm-5 col-offset-xs wow fadeInLeft animated" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                        <div class="photo-side">
                            <img src="<?php echo $this->data['info']['url']; ?>images/home/pre-about/my-perfect-wedding-pre-about.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-5 col-offset-xs wow fadeInLeft animated" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                        <div class="text-center text-side ">
                            <h2 class="inner-headers">MICHELLE SALAZAR</h2>
                            <h3 class="overload">Wedding planner</h3>
                            <p class="off inset-5">
                                
                            </p>
            
                            <p class="off regular-font text-justify"> 
                            		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>

                        </div>
                    </div>
                    <div class="col-md-12 border-art"></div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getIndexContact()
    {
        ob_start();
        ?>
        <section class="bg-rosa">
        		<div class="img-rose-index-contact">
					<img class="" src="/images/home/D.svg">
				</div>
            <div class="container">
                <h2 class="overload-section-title-left" >Contact us</h2>
                
                
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <p class="font-menu">Get in touch, tell us more about your wedding plans</p>
                        <form class='mailform' method="post" action="/bat/rd-mailform.php">
                            <input type="hidden" name="form-type" value="contact"/>
                            <fieldset>
                                <div class="mailform-wrap">
                                    <label data-add-placeholder>
                                        <input type="text"
                                               name="name"
                                               placeholder="Name*:"
                                               data-constraints="@LettersOnly @NotEmpty"/>
                                    </label>
            
                                    <label data-add-placeholder>
                                        <input type="text"
                                               name="email"
                                               placeholder="E-mail*:"
                                               data-constraints="@Email @NotEmpty"/>
                                    </label>
                                    <br><br>
                                    <div class="numero">
                                    <label  data-add-placeholder>
                                        <input type="text"
                                               name="Wedding date:"
                                               placeholder="Wedding date:"
                                               data-constraints="@Phone @NotEmpty"/>
                                    </label>
                                        </div>
                                    <br><br><br>
                                    <div class="margen">
                                    <label data-add-placeholder>
                                        <input type="text"
                                               name="Type of ceremony:"
                                               placeholder="Type of ceremony:"
                                               data-constraints="@Phone @NotEmpty"/>
                                    </label>
                                        </div>


                                </div>
                                <label data-add-placeholder>
                                    <textarea name="How do you envision your perfect wedding?:" placeholder="How do you envision your perfect wedding?:"
                                              data-constraints="@NotEmpty"></textarea>
                                </label>

                                <div class="wrapper">
                                    <p class="prefix-1"></p>
                                    <div class="mfControls">
                                        <button class="btn btn-md btn-default" type="submit">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getIndexGallery()
    {
        ob_start();
        ?>
        <section class="well-2 bg-rosa">
            <div class="float-box container">
                <div class="wow fadeIn" data-wow-delay="0.4s">
                    <a class="thumb" href="<?php echo $this->data['info']['url']; ?>/images/home/1IG_Home.png" data-gallery="1">
                        <img src="<?php echo $this->data['info']['url']; ?>images/home/gallery/1IG_Home.png" alt=""/>
                        <span class="thumb_overlay"></span>
                    </a>
                </div>
                <div class="wow fadeIn" data-wow-delay="0.6s">
                    <a class="thumb" href="<?php echo $this->data['info']['url']; ?>/images/home/gallery/2IG_Home.png" data-gallery="1">
                        <img src="<?php echo $this->data['info']['url']; ?>images/home/gallery/2IG_Home.png" alt=""/>
                        <span class="thumb_overlay"></span>
                    </a>
                </div>
                <div class="wow fadeIn" data-wow-delay="0.8s">
                    <a class="thumb" href="<?php echo $this->data['info']['url']; ?>/images/home/gallery/3IG_Home.png" data-gallery="1">
                        <img src="<?php echo $this->data['info']['url']; ?>images/home/gallery/3IG_Home.png" alt=""/>
                        <span class="thumb_overlay"></span>
                    </a>
                </div>
                <div class="wow fadeIn" data-wow-delay="0.6s">
                    <a class="thumb" href="<?php echo $this->data['info']['url']; ?>/images/home/gallery/4IG_Home.png" data-gallery="1">
                        <img src="<?php echo $this->data['info']['url']; ?>images/home/gallery/4IG_Home.png" alt=""/>
                        <span class="thumb_overlay"></span>
                    </a>
                </div>
                <div class="wow fadeIn" data-wow-delay="0.4s">
                    <a class="thumb" href="<?php echo $this->data['info']['url']; ?>/images/home/gallery/5IG_Home.png" data-gallery="1">
                        <img src="<?php echo $this->data['info']['url']; ?>images/home/gallery/5IG_Home.png" alt=""/>
                        <span class="thumb_overlay"></span>
                    </a>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getSlider()
    {
        ob_start();
        ?>
        <section>
            <div class="camera_container">
                <div id="camera" class="camera_wrap">
                    <div data-src="<?php echo $this->data['info']['url']; ?>/images/page-1_slide01.jpg">
                        <div class="camera_caption fadeIn">
                            <div class="container">
                                <h2>creating beautiful</h2>

                                <h3>engraved products for you</h3>

                                <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor
                                   incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                   exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                   dolor in reprehenderit in voluptate velit esse.</p>
                            </div>
                        </div>
                    </div>
                    <div data-src="<?php echo $this->data['info']['url']; ?>/images/page-1_slide02.jpg">
                        <div class="camera_caption fadeIn">
                            <div class="container">
                                <h2>a full service</h2>

                                <h3>engraving company</h3>

                                <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor
                                   incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                   exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                   dolor in reprehenderit in voluptate velit esse.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $slider = ob_get_contents();
        ob_end_clean();
        return $slider;
    }
    
    public function getIndexItems()
    {
        ob_start();
        ?>
        <section class="bg-img-primary well">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-offset-xs wow fadeInLeft" data-wow-delay="0.8s">
                        <div class="text-center">
                            <img src="images/page-1_img01.jpg" alt=""/>

                            <h4>welcome</h4>
                            <h5>to our company</h5>

                            <p class="inset-3">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                               tempor
                                               incididunt ut
                                               labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                               exercitation ullamco
                                               laboris
                                               nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                               reprehenderit in
                                               voluptate
                                               velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                               occaecat cupidatat non
                                               proident.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInLeft" data-wow-delay="0.6s">
                        <div class="text-center">
                            <img src="images/page-1_img02.jpg" alt=""/>

                            <h4>about</h4>
                            <h5>our company</h5>

                            <p class="inset-3">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                               tempor
                                               incididunt ut
                                               labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                               exercitation ullamco
                                               laboris
                                               nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                               reprehenderit in
                                               voluptate
                                               velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                               occaecat cupidatat non
                                               proident.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-md-offset-0 col-sm-offset-3 wow fadeInLeft" data-wow-delay="0.4s">
                        <div class="text-center">
                            <img src="images/page-1_img03.jpg" alt=""/>

                            <h4>special</h4>
                            <h5>offers</h5>

                            <p class="inset-3">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                               tempor
                                               incididunt ut
                                               labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                               exercitation ullamco
                                               laboris
                                               nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                               reprehenderit in
                                               voluptate
                                               velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                               occaecat cupidatat non
                                               proident.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    
    
    public function getRule()
    {
        ob_start();
        ?>
        <section class="container">
            <hr>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getServiceSectionOne()
    {
        ob_start();
        ?>
        <section class="bg-less-rosa">
            <div class="container">
            		<img src="/images/my-perfect-wedding-services-quote.png" alt="" />
            </div>
        </section>
        <?php
        $slider = ob_get_contents();
        ob_end_clean();
        return $slider;
    }
    
    public function getServicesPolaroids()
    {
        ob_start();
        ?>
        <section class="bg-img-index-section-one well-4 bg-rosa">
            <div class="container">
                <div class="row">
                    <div class="posicion col-md-3 col-md-offset-1 col-sm-6 col-offset-xs wow fadeInLeft" data-wow-delay="0.8s">
						<div class="polaroid">
                            <div class="text-center">
                             <a href="#"><img src="/images/michelle-about-me-polaroid.jpg" alt=""></a>
                                <h2 class="small">Wedding Planning</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInLeft" data-wow-delay="0.6s">
                    		<div class="polaroid-big">
                            <div class="text-center">
                                <img src="/images/michelle-services-polaroid.jpg" alt=""/>
                                <h2 class="small">Vendor Liasom</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-md-offset-0 col-sm-offset-3 wow fadeInLeft" data-wow-delay="0.4s">
                    		<div class="polaroid">
                            <div class="text-center">
                                <a href="#"><img src="/images/michelle-our-work-polaroid.jpg" alt=""></a>
                                <h2 class="small">Wedding Locations</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function myMethod()
    {
        ob_start();
        ?>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
}