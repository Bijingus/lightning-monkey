<!DOCTYPE html>
<html style="margin-top:0 !important" <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php
      $logo_url = esc_url( get_theme_mod( 'lm-logo' ) );
      $facebook = esc_url(get_theme_mod( 'lm-facebook-url' ));
      $twitter = esc_url(get_theme_mod( 'lm-twitter-url' ));
      $youtube = esc_url(get_theme_mod( 'lm-youtube-url' ));
      $google = esc_url(get_theme_mod( 'lm-google-plus-url' ));
      $tumblr = esc_url(get_theme_mod( 'lm-tumblr-url' ));
      $pinterest = esc_url(get_theme_mod( 'lm-pinterest-url' ));
      $linkedin = esc_url(get_theme_mod( 'lm-linkedin-url' ));
      $instagram = esc_url(get_theme_mod( 'lm-instagram-url' ));
      $flickr = esc_url(get_theme_mod( 'lm-flickr-url' ));
      $vine = esc_url(get_theme_mod( 'lm-vine-url' ));

      $blog_name = get_bloginfo('name');
    ?>
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php 
          // Fix menu overlap
          if ( is_admin_bar_showing() ) echo '<div id="admin-bar-comp" style="min-height: 28px;"></div>'; 
    ?>
    <div id="header-wrapper">
        <div class="container" id="main-header">
          <div class="row">
            <div class="col-xs-6">
            </div>
            <div class="col-xs-6">
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
                <span class="sr-only"><?php echo __('Toggle navigation', 'lightning-monkey'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

                <?php if($logo_url){ ?>
                  <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
                    <img src="<?php echo $logo_url; ?>" />
                  </a>
                <?php }else{ ?>
                  <a class="no-logo" href="<?php echo esc_url(home_url());?> "><?php echo $blog_name; ?></a>
                <?php } ?>
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