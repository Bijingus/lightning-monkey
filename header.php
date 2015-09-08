<!DOCTYPE html>
<html style="margin-top:0 !important" <?php language_attributes(); ?>>
    <body <?php body_class(); ?>>
    <head>

      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-56652847-1', 'auto');
        ga('send', 'pageview');

      </script>

        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php wp_title( '·', TRUE, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

        <?php
          $logo_url = get_option( 'lm-logo-url', get_template_directory_uri() . '/images/Lightning-Monkey-Logo.png' );
          $slogan = get_option('lm-slogan');
          $facebook = get_option( 'lm-facebook-url' );
          $twitter = get_option( 'lm-twitter-url' );
          $youtube = get_option( 'lm-youtube-url' );
          $google = get_option( 'lm-google-plus-url' );
          $tumblr = get_option( 'lm-tumblr-url' );
          $pinterest = get_option( 'lm-pinterest-url' );
          $linkedin = get_option( 'lm-linkedin-url' );
          $instagram = get_option( 'lm-instagram-url' );
          $flickr = get_option( 'lm-flickr-url' );
          $vine = get_option( 'lm-vine-url' );
        ?>

        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php 
              // Fix menu overlap bug..
              if ( is_admin_bar_showing() ) echo '<div id="admin-bar-comp" style="min-height: 28px;"></div>'; 
        ?>
        <div id="header-wrapper">
            <div class="container" id="main-header">
              <div class="row">
                <div class="col-xs-12">
                  <div class="social-icons">
                    <?php if(!empty($facebook)){ ?>
                      <a href="<?php echo $facebook; ?>"<i class="fa fa-facebook" title="Facebook"></i></a>
                    <?php } ?>
                    <?php if(!empty($twitter)){ ?>
                      <a href="<?php echo $twitter; ?>"<i class="fa fa-twitter" title="Twitter"></i></a>
                    <?php } ?>
                    <?php if(!empty($youtube)){ ?>
                      <a href="<?php echo $youtube; ?>"<i class="fa fa-youtube" title="Youtube"></i></a>
                    <?php } ?>
                    <?php if(!empty($google)){ ?>
                      <a href="<?php echo $google; ?>"<i class="fa fa-google-plus" title="Google Plus"></i></a>
                    <?php } ?>
                    <?php if(!empty($tumblr)){ ?>
                      <a href="<?php echo $tumblr; ?>"<i class="fa fa-tumblr" title="Tumblr"></i></a>
                    <?php } ?>
                    <?php if(!empty($pinterest)){ ?>
                      <a href="<?php echo $pinterest; ?>"<i class="fa fa-pinterest" title="Pinterest"></i></a>
                    <?php } ?>
                    <?php if(!empty($linkedin)){ ?>
                      <a href="<?php echo $linkedin; ?>"<i class="fa fa-linkedin" title="linkedIn"></i></a>
                    <?php } ?>
                    <?php if(!empty($instagram)){ ?>
                      <a href="<?php echo $instagram; ?>"<i class="fa fa-instagram" title="Instagram"></i></a>
                    <?php } ?>
                    <?php if(!empty($flickr)){ ?>
                      <a href="<?php echo $flickr; ?>"<i class="fa fa-flickr" title="Flickr"></i></a>
                    <?php } ?>
                    <?php if(!empty($vine)){ ?>
                      <a href="<?php echo $vine; ?>"<i class="fa fa-vine" title="Vine"></i></a>
                    <?php } ?>
                  </div>
                </div>
                <div style="clear:both;"></div>
            </div>
            <nav class="navbar navbar-default" role="navigation">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="background:none !important">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="<?php echo home_url(); ?>">
                    <?php if($logo_url){ ?>
                      <img src="<?php echo $logo_url; ?>" />
                    <?php }else{
                      echo '<a href="' . home_url() . '"><span class="no-logo">' . get_bloginfo('name') . '</span></a>';
                    } ?>
                  </a>
                </div>

                    <?php
                        wp_nav_menu( array(
                            'menu'              => 'primary',
                            'theme_location'    => 'primary-menu',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'bs-example-navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'sort_column' => 'menu_order',
                            'walker'            => new wp_bootstrap_navwalker())
                        );
                    ?>
                </div>
            </nav>
           </div>
        </div>

        <div class="clearfix"></div>
        <?php wp_head(); ?>
    </head>