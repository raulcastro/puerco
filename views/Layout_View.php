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
        		<div class="loading text-center vertical-middle">
                <div class="row"><img src="/assets/images/loading.gif" width="200" alt="Loader logo" class="loader" />
                
                </div>
            </div>
			<?php 
            echo self::getCommonHeader();
            ?>
            	<?php
		    switch ($section) 
		    {
                case 'index':
                    echo self::getIndexSlider();
                    echo self::getIndexCovers();
                    echo self::getIndexClients();
                    echo self::getIndexGaleries();
			    break;
        				    
                case 'about':
                    echo self::getAboutBreadCrumb();
                    echo self::getAboutDescription();
                    echo self::getAboutProcess();
                break;
        				
			    default:
			    break;
		    }
            ?>
            		<?php
                    echo self::getFooter(); 
                ?>
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
    		<script src="/assets/js/packages.js"></script>
        <script src="/assets/js/theme.js"></script>
        <script src="/assets/js/map.js"></script>
        <script src="/assets/js/contact.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="/assets/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="/assets/js/slider-initialization.js"></script>
        <script type="text/javascript" src="/assets/js/revslider-extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="/assets/js/revslider-extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="/assets/js/revslider-extensions/revolution.extension.navigation.min.js"></script>
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
        <header class="main-navigation">
            <div class="container-fluid">
                <div class="col-md-2">
                    <a href="/" class="logo">
                    		<img src="<?php echo $this->data['info']['url']; ?>/assets/images/logo/Footer.svg" alt="Logo" />
                    	</a>
                    <div id="navicon">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                </div>
                <div class="col-md-10">
                    <nav>
                        <ul role="menu">
                            <li><a href="/">INICIO</a></li>
                            <li><a href="/acerca-de/">ACERCA DE</a></li>
                            <li class="dropdown"><a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"> PORTAFOLIO <span class="dropdown-icon">
                        <svg width="10" height="7">
                          <g></g>
                          <line fill="none" stroke="#fdfdfd" x1="-4.54458" y1="-5.33302" x2="5.38279" y2="4.59435"></line>
                          <line fill="none" stroke="#fdfdfd" x1="4.67324" y1="4.59752" x2="14.81695" y2="-5.54619"></line>
                        </svg></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="portfolio.html">MASONRY</a></li>
                                    <li><a href="portfolio-grid.html">GRID</a></li>
                                    <li><a href="portfolio-single.html">SINGLE PROJECT</a></li>
                                </ul>
                            </li>
                            <li><a href="services.html">SERVICIOS</a></li>
                            <li class="dropdown"><a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"> BLOG <span class="dropdown-icon">
                        <svg width="10" height="7">
                          <g></g>
                          <line fill="none" stroke="#fdfdfd" x1="-4.54458" y1="-5.33302" x2="5.38279" y2="4.59435"></line>
                          <line fill="none" stroke="#fdfdfd" x1="4.67324" y1="4.59752" x2="14.81695" y2="-5.54619"></line>
                        </svg></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="blog.html">BLOG</a></li>
                                    <li><a href="blog-post.html">BLOG POST</a></li>
                                    <li><a href="blog-sidebar.html">SIDEBAR</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">CONTACTO</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-navigation vertical-middle text-center">
                    <ul role="menu" class="text-center">
                        <li><a href="home.html#!" class="mobile-dropdown">INICIO</a>
                            <div class="content"><a href="home.html">SLIDER</a><a href="home-video.html">VIDEO</a><a href="home-parallax.html">PARALLAX</a><a href="home-fullscreen.html">FULLSCREEN</a></div>
                        </li>
                        <li><a href="about.html">Acerca de</a></li>
                        <li><a href="home.html#!" class="mobile-dropdown">PORTAFOLIO</a>
                            <div class="content"><a href="portfolio.html">MASONRY</a><a href="portfolio-grid.html">GRID</a><a href="portfolio-single.html">PROJECT POST</a></div>
                        </li>
                        <li><a href="services.html">SERVICIOS</a></li>
                        <li><a href="home.html#!" class="mobile-dropdown">BLOG</a>
                            <div class="content"><a href="blog.html">BLOG</a><a href="blog-post.html">BLOG POST</a></div>
                        </li>
                        <li><a href="contact.html">CONTACTO</a></li>
                    </ul>
                </div>
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
        <footer>
            <div class="container">
                <div data-os-animation="fadeInUp" data-os-animation-delay="0s" class="col-md-12 text-center os-animation">
                    <div class="section-head">
                        <h4>NEWSLETTER</h4>
                        <p>Subscribe to our newsletter to receive news, updates and the latest projects we are working on.</p>
                    </div>
                </div>
                <div data-os-animation="fadeInUp" data-os-animation-delay="0s" class="col-md-12 margin-top margin-bottom os-animation">
                    <form class="newsletter-form text-center">
                        <input placeholder="YOUR EMAIL ADDRESS..." class="form-control" />
                        <button type="submit">I'M IN</button>
                        <div class="col-md-12 text-center margin-top"><small>You have our word, no spam. Ever.</small></div>
                    </form>
                </div>
                <div class="col-md-12 margin-top">
                    <hr/>
                </div>
                <div class="col-md-6 text-left small-screen-text-center">
                    <div class="footer-message">
                        <p>2018 © Arian Falcon - Diseñador gráfico</p>
                    </div>
                </div>
                <div class="col-md-6 text-right small-screen-text-center">
                    <ul class="social-icons">
                        <!-- <li><a href="https://dribbble.com/session/new">DRIBBBLE</a></li> -->
                        <li><a href="https://www.behance.net/ArianF">BEHANCE</a></li>
                        <li><a href="https://www.artstation.com/artwork/gEAOE">ARTSTATION</a></li>
                        <li><a href="https://www.facebook.com/arian.diseno">FACEBOOCK</a></li>
                    </ul>
                </div>
            </div>
        </footer>
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
    
    public function getIndexSlider()
    {
        ob_start();
        ?>
        <div id="home-slider">
            <div class="rev_slider_wrapper header-introduction text-center">
                <div id="rev_slider_1" data-version="5.0" class="rev_slider">
                    <ul>
                        <li data-transition="slideoverup"><img src="<?php echo $this->data['info']['url']; ?>/assets/images/splash-image-11.jpg" alt="Slider Image" width="1920" height="1000" />
                            <div data-x="center" data-y="center" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="y:50;opacity:0s:400;s:400;e:Power2.easeInOut;" data-transform_out="y:+350;opacity:0s:400;s:400;e:Power2.easeInOut;" data-start="500" class="tp-caption caption-classic">
                                <h2>AVOIR</h2>
                            </div>
                        </li>
                        <li data-transition="slideoverup"><img src="<?php echo $this->data['info']['url']; ?>/assets/images/splash-image-1.jpg" alt="Slider Image" width="1920" height="1000" />
                            <div data-x="center" data-y="center" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="y:50;opacity:0s:400;s:400;e:Power2.easeInOut;" data-transform_out="x:-150;opacity:0s:400;s:400;e:Power2.easeInOut;" data-start="500" class="tp-caption caption-bordered"><span>CREATIVE DESIGN FIRM</span>
                                <h2>WELCOME</h2><a href="portfolio.html" class="btn btn-link">PORTFOLIO</a>
                            </div>
                        </li>
                        <li data-transition="slideoverup"><img src="<?php echo $this->data['info']['url']; ?>/assets/images/splash-image-7.jpg" alt="Slider Image" width="1920" height="700" />
                            <div data-x="center" data-y="middle" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="y:50;opacity:0s:400;s:400;e:Power2.easeInOut;" data-transform_out="opacity:0s:400;s:400;e:Power2.easeInOut;" data-start="500" class="tp-caption caption-classic">
                                <h2>AMAZING</h2><img src="<?php echo $this->data['info']['url']; ?>/assets/images/section-decor-white.png" width="40" alt="Divider" />
                                <p> Welcome to our studio. We are a passionated group of people, making high quality products designed to make your life easier.</p><a href="about.html" class="btn btn-white">ABOUT</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getIndexCovers()
    {
        ob_start();
        ?>
        <section class="section section-white">
            <div class="container-fluid">
                <div class="col-md-10 col-md-offset-1">
                    <ul class="masonry-wrap">
                        <li data-os-animation="fadeIn" data-os-animation-delay="0s" class="col-lg-6 os-animation">
                            <div class="masonry-item background-color-1">
                            		<img src="<?php echo $this->data['info']['url']; ?>/assets/images/portfolio-big-1.jpg" alt="Portfolio-image" />
                                <div class="masonry-item-overlay">
                                    <div class="masonry-item-overlay-inner">
                                        <h2>PENCIL</h2>
                                        <p>ILLUSTRATION</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li data-os-animation="fadeIn" data-os-animation-delay="0s" class="col-lg-6 os-animation">
                            <div class="masonry-item background-color-4">
                                <a href="portfolio-single.html">
                                		<img src="<?php echo $this->data['info']['url']; ?>/assets/images/portfolio-1.jpg" alt="Portfolio-image" />
                                    <div class="masonry-item-overlay">
                                        <div class="masonry-item-overlay-inner">
                                            <h2>COVER</h2>
                                            <p>PRINT</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li data-os-animation="fadeIn" data-os-animation-delay="0s" class="col-lg-6 os-animation">
                            <div class="masonry-item background-color-2">
                                <a href="portfolio-single.html">
                                		<img src="<?php echo $this->data['info']['url']; ?>/assets/images/portfolio-2.jpg" alt="Portfolio-image" />
                                    <div class="masonry-item-overlay">
                                        <div class="masonry-item-overlay-inner">
                                            <h2>MAGAZINE</h2>
                                            <p>PRINT</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li data-os-animation="fadeIn" data-os-animation-delay="0s" class="col-lg-12 os-animation">
                            <div class="masonry-item background-color-5">
                                <a href="portfolio-single.html">
                                		<img src="<?php echo $this->data['info']['url']; ?>/assets/images/portfolio-big-2.jpg" alt="Portfolio-image" />
                                    <div class="masonry-item-overlay">
                                        <div class="masonry-item-overlay-inner">
                                            <h2>BRANDING</h2>
                                            <p>WEB</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li data-os-animation="fadeIn" data-os-animation-delay="0s" class="col-lg-6 os-animation">
                            <div class="masonry-item background-color-2">
                                <a href="portfolio-single.html">
                                		<img src="<?php echo $this->data['info']['url']; ?>/assets/images/portfolio-big-3.jpg" alt="Portfolio-image" />
                                    <div class="masonry-item-overlay">
                                        <div class="masonry-item-overlay-inner">
                                            <h2>NINE</h2>
                                            <p>ILLUSTRATION</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li data-os-animation="fadeIn" data-os-animation-delay="0s" class="col-lg-6 os-animation">
                            <div class="masonry-item background-color-4">
                                <a href="portfolio-single.html">
                                		<img src="<?php echo $this->data['info']['url']; ?>/assets/images/portfolio-3.jpg" alt="Portfolio-image" />
                                    <div class="masonry-item-overlay">
                                        <div class="masonry-item-overlay-inner">
                                            <h2>LETTERS</h2>
                                            <p>WEB</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li data-os-animation="fadeIn" data-os-animation-delay="0s" class="col-lg-6 os-animation">
                            <div class="masonry-item background-color-3">
                                <a href="portfolio-single.html">
                                		<img src="<?php echo $this->data['info']['url']; ?>/assets/images/portfolio-big-4.jpg" alt="Portfolio-image" />
                                    <div class="masonry-item-overlay">
                                        <div class="masonry-item-overlay-inner">
                                            <h2>POSTER</h2>
                                            <p>PRINT</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getIndexClients()
    {
        ob_start();
        ?>
        <section class="section section-black">
            <div class="container">
                <div class="container banner">
                <div class="col-md-12 text-center"><span></span>
                    <h2></h2><img src="/assets/images/logo/Head.svg" width="500" alt="Divider" />
                </div>
                <div class="col-md-12 text-center"><span></span>
                    <h2></h2><img src="assets/images/section-decor-white.png" width="40" alt="Divider" />
                </div>
            </div>
                <div class="col-md-12 padding-top">
                    <div data-os-animation="fadeIn" data-os-animation-delay="0s" class="col-md-3 col-sm-6 col-xs-6 small-screen-margin-top os-animation"><img src="assets/images/logo1.png" alt="Client logo" /></div>
                    <div data-os-animation="fadeIn" data-os-animation-delay="0.1s" class="col-md-3 col-sm-6 col-xs-6 small-screen-margin-top os-animation"><img src="assets/images/logo2.png" alt="Client logo" /></div>
                    <div data-os-animation="fadeIn" data-os-animation-delay="0.2s" class="col-md-3 col-sm-6 col-xs-6 small-screen-margin-top os-animation"><img src="assets/images/logo4.png" alt="Client logo" /></div>
                    <div data-os-animation="fadeIn" data-os-animation-delay="0.3s" class="col-md-3 col-sm-6 col-xs-6 small-screen-margin-top os-animation"><img src="assets/images/logo3.png" alt="Client logo" /></div>
                    <div data-os-animation="fadeIn" data-os-animation-delay="0s" class="col-md-3 col-sm-6 col-xs-6 small-screen-margin-top margin-top padding-top os-animation"><img src="assets/images/logo4.png" alt="Client logo" /></div>
                    <div data-os-animation="fadeIn" data-os-animation-delay="0.1s" class="col-md-3 col-sm-6 col-xs-6 small-screen-margin-top margin-top padding-top os-animation"><img src="assets/images/logo1.png" alt="Client logo" /></div>
                    <div data-os-animation="fadeIn" data-os-animation-delay="0.2s" class="col-md-3 col-sm-6 col-xs-6 small-screen-margin-top margin-top padding-top os-animation"><img src="assets/images/logo3.png" alt="Client logo" /></div>
                    <div data-os-animation="fadeIn" data-os-animation-delay="0.3s" class="col-md-3 col-sm-6 col-xs-6 small-screen-margin-top margin-top padding-top os-animation"><img src="assets/images/logo2.png" alt="Client logo" /></div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getIndexGaleries()
    {
        ob_start();
        ?>
        <section class="section section-semi-white">
            <div class="col-md-12 text-center section-head padding-bottom">
            		<small>WE ARE ON</small>
                <h3>INSTAGRAM</h3>
                <p>Check out our firm's daily process and routine at instagram. We love to shoot pics, and we think it's fun to share with the world all this positive energy we have.</p>
            </div>
            <div class="row-fluid">
                <ul class="instagram-widget">
                    <li class="col-md-3 col-sm-6 col-xs-6">
                        <div class="row">
                            <a href="home.html#!"><img src="<?php echo $this->data['info']['url']; ?>/assets/images/widget-image-1.jpg" alt="Widget Image" /></a>
                        </div>
                    </li>
                    <li class="col-md-3 col-sm-6 col-xs-6">
                        <div class="row">
                            <a href="home.html#!"><img src="<?php echo $this->data['info']['url']; ?>/assets/images/widget-image-2.jpg" alt="Widget Image" /></a>
                        </div>
                    </li>
                    <li class="col-md-3 col-sm-6 col-xs-6">
                        <div class="row">
                            <a href="home.html#!"><img src="<?php echo $this->data['info']['url']; ?>/assets/images/widget-image-3.jpg" alt="Widget Image" /></a>
                        </div>
                    </li>
                    <li class="col-md-3 col-sm-6 col-xs-6">
                        <div class="row">
                            <a href="home.html#!"><img src="<?php echo $this->data['info']['url']; ?>/assets/images/widget-image-4.jpg" alt="Widget Image" /></a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="container">
                <div class="col-md-12 padding-top text-center">
                		<a class="btn btn-link">FOLLOW US </a>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getAboutBreadCrumb()
    {
        ob_start();
        ?>
        <section style="background-image: url(<?php echo $this->data['info']['url']; ?>/assets/images/splash-image-2.jpg)" class="header-introduction-small text-center background-image">
            <div class="container vertical-middle">
                <div class="row section-head section-head-white">
                    <h2>ABOUT</h2>
                    <ul class="breadcrumb">
                        <li><a href="home.html">AVOIR</a></li>
                        <li><a href="about.html#!">ABOUT</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getAboutDescription()
    {
        ob_start();
        ?>
        <section class="section section-white">
            <div class="container">
                <div class="col-md-12 text-center">
                		<div class="section-head">
                        <img src="<?php echo $this->data['info']['url']; ?>/assets/images/Inner-large-logo.svg" width="600" alt="Divider" />
                    </div>
                    <div class="section-head">
                        <img src="<?php echo $this->data['info']['url']; ?>/assets/images/section-decor-black.png" width="40" alt="Divider" />
                    </div>
                </div>
                <div data-os-animation="fadeIn" data-os-animation-delay="0s" class="col-md-12 text-block text-center">
                    <h4 class="os-animation">A STUDIO WITH FILLED WITH AMAZING PEOPLE</h4>
                    <p class="os-animation">You'll brought also divided every it him saying. Days spirit whales every fruit moving. Over land herb multiply moveth give bring thing blessed also whales unto. Air, were land she'd waters. Gathered Behold fifth created fifth great let let unto that moveth the life bring made. And shall isn't. And moved called spirit seed female darkness first you'll subdue lesser bring cattle stars also he to multiply one kind signs earth fly so open Creeping it them. Itself two had be after bring void him tree she'd, for of was green. Abundantly it bring fourth. Bring for i face living.</p>
                    <p class="os-animation">Given man days of for blessed spirit winged appear moveth beginning and gathering. Gathered meat seed, creepeth won't subdue Upon two of together that fifth also whales called replenish moved over rule two yielding third beast i day you'll great evening. Female female day seas yielding to deep of. For Greater female midst of beast she'd brought set image moving.</p>
                    <h4 class="os-animation">OUR ONLY TARGET: BUILD GREAT THINGS</h4>
                    <p class="os-animation">Great image there after Night earth god fowl, it female kind earth seasons give. And green said sixth whose without lights land own give, signs every void rule green he man. Whales creepeth have yielding isn't divided forth bring all god stars creature, so, own brought third seasons life every beast in greater life fish from seasons air subdue fill creature, is, rule, cattle. Shall given him grass tree fruitful.</p>
                    <div class="signature"><img src="<?php echo $this->data['info']['url']; ?>/assets/images/signature.png" width="150" alt="Signature" /><span>ARIAN El PUERCO FALCON<small>FOUNDER</small></span></div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getAboutProcess()
    {
        ob_start();
        ?>
        <section class="section section-black">
            <div class="container">
                <div class="row">
                    <div class="col-md-24 text-center margin-bottom">
                        <div class="section-head"><span>THE DESIGN &amp; DEVELOP</span>
                            <h3>PROCESS</h3><img src="<?php echo $this->data['info']['url']; ?>/assets/images/section-decor-white.png" width="40" alt="Divider" />
                        </div>
                    </div>
                    <div class="col-md-4 content-block margin-top"><span>.01</span>
                        <div><i class="icon-basic-archive-full"></i></div>
                        <h2>RESEARCH &AMP; PLAN</h2>
                        <p>Before we touch our keyboards, we discover and we plan on a paper the key elements we need to focus, and all the factors that matters for your case.</p>
                    </div>
                    <div class="col-md-4 content-block margin-top"><span>.02</span>
                        <div><i class="icon-basic-pencil-ruler"></i></div>
                        <h2>DESIGN &amp; DEVELOP</h2>
                        <p>Now it's the creative time for our team. After all the research - we carefully craft the requested project making sure it meets all the modern web &amp; technology standards.</p>
                    </div>
                    <div class="col-md-4 content-block margin-top"><span>.03</span>
                        <div><i class="icon-basic-key"></i></div>
                        <h2>DELIVER</h2>
                        <p>When it all ends, we are double checking that everything works as they should, and we will simply arrange a meeting to demonstrate, teach you how to use the product and deliver it.</p>
                    </div>
                    <div class="col-md-4 content-block margin-top"><span>.03</span>
                        <div><i class="icon-basic-key"></i></div>
                        <h2>DELIVER</h2>
                        <p>When it all ends, we are double checking that everything works as they should, and we will simply arrange a meeting to demonstrate, teach you how to use the product and deliver it.</p>
                    </div>
                    <div class="col-md-4 content-block margin-top"><span>.03</span>
                        <div><i class="icon-basic-key"></i></div>
                        <h2>DELIVER</h2>
                        <p>When it all ends, we are double checking that everything works as they should, and we will simply arrange a meeting to demonstrate, teach you how to use the product and deliver it.</p>
                    </div>
                    <div class="col-md-4 content-block margin-top"><span>.03</span>
                        <div><i class="icon-basic-key"></i></div>
                        <h2>DELIVER</h2>
                        <p>When it all ends, we are double checking that everything works as they should, and we will simply arrange a meeting to demonstrate, teach you how to use the product and deliver it.</p>
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