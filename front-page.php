<?php

get_header(); 

$home_img_url = get_option(  'lm-home-img-url' );
$youtube_url = get_option(  'lm-home-youtube-url' );
$cta_url = get_option(  'lm-home-cta-url' );
$cta_text = get_option(  'lm-home-cta-text', 'Click Here' );
$header_text = get_option(  'lm-home-header-text', 'Lightning Monkey' );
$subheader_text = get_option(  'lm-home-subheader-text', 'Fast, Responsive and Customizable' );
$content_text = get_option(  'lm-home-content-text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ornare imperdiet urna. Ut vehicula enim non bibendum tristique. Ut ut vulputate massa, vitae aliquet magna. Proin eleifend nibh neque, vitae tristique ex pellentesque quis.' );


$left_header = get_option(  'lm-home-left-header', 'Left Header' );
$center_header = get_option(  'lm-home-center-header', 'Center Header' );
$right_header = get_option(  'lm-home-right-header', 'Right Header' );

$left_text = get_option(  'lm-home-left-text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ornare imperdiet urna.' );
$center_text = get_option(  'lm-home-center-text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ornare imperdiet urna.' );
$right_text = get_option(  'lm-home-right-text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ornare imperdiet urna.' );

?>

<div class="container-wrapper home-container-wrapper" id="home-page-main-container">
    <div class="container" id="home-page">
        <div class="row section">
            <div class="col-md-6 left-home">     

                <h1 id="home-header"><?php echo $header_text; ?></h1>
                <h3 id="home-subheader"><?php echo $subheader_text; ?></h3>
                <?php echo '<div id="home-text">' . $content_text . '</div>'; ?>

                <?php echo '<div><a href="' . $cta_url . '" id="home-cta-button">' . $cta_text . '</a></div>'; ?>
            </div>

            <div class="col-md-6 right-home">
                <div id="home-img-wrapper">
                    <?php 
                        if(!empty($youtube_url)){
                            echo $youtube_url;
                        }elseif(!empty($home_img_url)){
                            echo '<img src="' . $home_img_url . '"/>';
                        }else{
                            $default_img_url = get_template_directory_uri() . '/images/responsive_illustration.jpg';
                            echo '<img src="' . $default_img_url . '"/>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-wrapper container-wrapper-bg home-container-wrapper">
    <div class="container">

        <div class="row section">
            <div class="col-md-4">
                <div class="content home-section-wrapper">
                    <h3 class="home-section-header"><?php echo $left_header; ?></h3>
                    <div class="home-section-content"><?php echo $left_text; ?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content home-section-wrapper">
                    <h3 class="home-section-header"><?php echo $center_header; ?></h3>
                    <div class="home-section-content"><?php echo $center_text; ?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content home-section-wrapper">
                    <h3 class="home-section-header"><?php echo $right_header; ?></h3>
                    <div class="home-section-content"><?php echo $right_text; ?></div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php the_content(); ?>


  
<?php get_footer(); ?>