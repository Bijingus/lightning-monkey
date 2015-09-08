<?php
// create custom plugin settings menu
add_action('admin_menu', 'lm_create_menu');

function lm_create_menu() {
	add_theme_page('Lightning Monkey Settings', 'Theme Settings', 'administrator', 'lm-settings', 'lm_settings_page');

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {
	//register our settings
	register_setting( 'lm-settings-group', 'lm-logo-url' );
    register_setting( 'lm-settings-group', 'lm-facebook-url' );
    register_setting( 'lm-settings-group', 'lm-twitter-url' );
    register_setting( 'lm-settings-group', 'lm-youtube-url' );
    register_setting( 'lm-settings-group', 'lm-google-plus-url' );
    register_setting( 'lm-settings-group', 'lm-tumblr-url' );
    register_setting( 'lm-settings-group', 'lm-pinterest-url' );
    register_setting( 'lm-settings-group', 'lm-linkedin-url' );
    register_setting( 'lm-settings-group', 'lm-instagram-url' );
    register_setting( 'lm-settings-group', 'lm-flickr-url' );
    register_setting( 'lm-settings-group', 'lm-vine-url' );
}

function lm_settings_page() {
?>
<div class="wrap lm-admin-wrap">
    <form method="post" action="options.php">
        <?php settings_fields( 'lm-settings-group' ); ?>
        <?php do_settings_sections( 'lm-settings-group' ); ?>

        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Logo</a></li>
                <li><a href="#tabs-2">Social Icons</a></li>
            </ul>

            <div id="tabs-1" class="tab">
                <h2>Logo</h2>
                <label>Reccommended 80px height, 160px width.</label>
                <button id="logo-button">Choose or Upload Logo.</button>
                <input id="img-url" type="text" name="lm-logo-url" value="<?php echo esc_attr( get_option('lm-logo-url') ); ?>" />
            </div>

            <div id="tabs-2" class="tab">
                <h2>Socal Icons</h2>
                <p>Enter the URL for your social media page and the icon will automatically appear in the header and link to your page. <strong>Use the format http://www.website.com or http://website.com</strong></p>
                <label>Facebook</label>
                <input type="text" name="lm-facebook-url" value="<?php echo esc_attr( get_option('lm-facebook-url') ); ?>" />
                <br>
                <label>Twitter</label>
                <input type="text" name="lm-twitter-url" value="<?php echo esc_attr( get_option('lm-twitter-url') ); ?>" />
                <br>
                <label>Youtube</label>
                <input type="text" name="lm-youtube-url" value="<?php echo esc_attr( get_option('lm-youtube-url') ); ?>" />
                <br>
                <label>Google Plus</label>
                <input type="text" name="lm-google-plus-url" value="<?php echo esc_attr( get_option('lm-google-plus-url') ); ?>" />
                <br>
                <label>Tumblr</label>
                <input type="text" name="lm-tumblr-url" value="<?php echo esc_attr( get_option('lm-tumblr-url') ); ?>" />
                <br>
                <label>Pinterest</label>
                <input type="text" name="lm-pinterest-url" value="<?php echo esc_attr( get_option('lm-pinterest-url') ); ?>" />
                <br>
                <label>Linkedin</label>
                <input type="text" name="lm-linkedin-url" value="<?php echo esc_attr( get_option('lm-linkedin-url') ); ?>" />
                <br>
                <label>Instagram</label>
                <input type="text" name="lm-instagram-url" value="<?php echo esc_attr( get_option('lm-instagram-url') ); ?>" />
                <br>
                <label>Flickr</label>
                <input type="text" name="lm-flickr-url" value="<?php echo esc_attr( get_option('lm-flickr-url') ); ?>" />
                <br>
                <label>Vine</label>
                <input type="text" name="lm-vine-url" value="<?php echo esc_attr( get_option('lm-vine-url') ); ?>" />
            </div>
            
            <?php submit_button(); ?>

        </div>

    </form>
</div>
<?php } ?>