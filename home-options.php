<?php

add_action('admin_menu', 'lm_home_menu');
function lm_home_menu(){
    add_theme_page('Lightning Monkey Home Settings', 'Customize Home Page', 'administrator', 'lm-home-settings', 'lm_home_page');

    add_action( 'admin_init', 'register_home_settings' );
}

function register_home_settings() {
    register_setting( 'lm-home-group', 'lm-home-img-url' );
    register_setting( 'lm-home-group', 'lm-home-youtube-url' );
    register_setting( 'lm-home-group', 'lm-home-cta-url' );
    register_setting( 'lm-home-group', 'lm-home-cta-text' );
    register_setting( 'lm-home-group', 'lm-home-header-text' );
    register_setting( 'lm-home-group', 'lm-home-subheader-text' );
    register_setting( 'lm-home-group', 'lm-home-content-text' );

    register_setting( 'lm-home-group', 'lm-home-left-header' );
    register_setting( 'lm-home-group', 'lm-home-center-header' );
    register_setting( 'lm-home-group', 'lm-home-right-header' );

    register_setting( 'lm-home-group', 'lm-home-left-text' );
    register_setting( 'lm-home-group', 'lm-home-center-text' );
    register_setting( 'lm-home-group', 'lm-home-right-text' );
}

function lm_home_page(){ ?>
<div class="wrap lm-admin-wrap">


        <form method="post" action="options.php">
            <?php settings_fields( 'lm-home-group' ); ?>
            <?php do_settings_sections( 'lm-home-group' ); ?>

            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Home Content</a></li>
                    <li><a href="#tabs-2">CTA</a></li>
                    <li><a href="#tabs-3">Image/Video</a></li>
                    <li><a href="#tabs-4">Home Sections</a></li>
                </ul>

            <div id="tabs-1" class="ui-tabs-active ui-state-active">
                <h2>Home Page Content</h2>
                <label>Home Page Header</label>
                <input type="text" name="lm-home-header-text" value="<?php echo esc_attr( get_option('lm-home-header-text') ); ?>" />
                <label>Home Page Subheader</label>
                <input type="text" name="lm-home-subheader-text" value="<?php echo esc_attr( get_option('lm-home-subheader-text') ); ?>" />
                <label>Home Page Content</label>
                <textarea name="lm-home-content-text"><?php echo esc_attr( get_option('lm-home-content-text') ); ?></textarea>
            </div>

            <div id="tabs-2">
                <h2>Home Page Call to Action</h2>
                <label>Call to Action Button Text</label>
                <input type="text" name="lm-home-cta-text" value="<?php echo esc_attr( get_option('lm-home-cta-text') ); ?>" />
                <label>Call to Action Button URL</label>
                <input placeholder="copy and paste the link here" type="text" name="lm-home-cta-url" value="<?php echo esc_attr( get_option('lm-home-cta-url') ); ?>" />
            </div>

            <div id="tabs-3">
                <h2>Home Page Image</h2>
                <button id="logo-button">Choose or Upload Home Page Image</button>
                <input id="img-url" type="text" name="lm-home-img-url" value="<?php echo esc_attr( get_option('lm-home-img-url') ); ?>" />
                <h2>Youtube Video</h2>
                <p>If you'd like to use a Youtube video instead of an image, copy and paste the <strong>embed link</strong> here.  You can find it on the videos page on Youtube.</p>
                <input placeholder="copy and paste the link here" type="text" name="lm-home-youtube-url" value="<?php echo esc_attr( get_option('lm-home-youtube-url') ); ?>" />
            </div>

            <div id="tabs-4">
                <div class="admin-33">
                    <h2>Left Home Page Section</h2>
                    <label>Header</label>
                    <input type="text" name="lm-home-left-header" value="<?php echo esc_attr( get_option('lm-home-left-header') ); ?>" />
                    <label>Text</label>
                    <textarea name="lm-home-left-text"><?php echo esc_attr( get_option('lm-home-left-text') ); ?></textarea>
                </div>
                <div class="admin-33">
                    <h2>Center Home Page Section</h2>
                    <label>Header</label>
                    <input type="text" name="lm-home-center-header" value="<?php echo esc_attr( get_option('lm-home-center-header') ); ?>" />
                    <label>Text</label>
                    <textarea name="lm-home-center-text"><?php echo esc_attr( get_option('lm-home-center-text') ); ?></textarea>
                </div>
                <div class="admin-33">
                    <h2>Right Home Page Section</h2>
                    <label>Header</label>
                    <input type="text" name="lm-home-right-header" value="<?php echo esc_attr( get_option('lm-home-right-header') ); ?>" />
                    <label>Text</label>
                    <textarea name="lm-home-right-text"><?php echo esc_attr( get_option('lm-home-right-text') ); ?></textarea>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php submit_button(); ?>
                </div>
        </form>
</div>
<?php } ?>