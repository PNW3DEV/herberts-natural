<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.0
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
            'name'               => 'Oneclick demo installer', // The plugin name.
            'slug'               => 'easy_installer', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/lib/plugins/easy_installer.zip',  // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),

        // This is an example of how to include a plugin from a private repo in your theme.
        array(
            'name'               => 'WooCommerce', // The plugin name.
            'slug'               => 'woocommerce', // The plugin slug (typically the folder name).
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name'      => __('Woocommerce Shortcodes', 'eshopper'),
            'slug'      => 'woocommerce-shortcodes',
            'required'  => true,
        ),
        array(
            'name'      => __('Woocommerce Wishlist', 'eshopper'),
            'slug'      => 'yith-woocommerce-wishlist',
            'required'  => true,
        ),
		// This is an example of how to include a plugin from a private repo in your theme.
        array(
            'name'               => 'Regenerate Thumbnails', // The plugin name.
            'slug'               => 'regenerate-thumbnails', // The plugin slug (typically the folder name).
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			
        ),
		// This is an example of how to include a plugin from a private repo in your theme.
        array(
            'name'               => 'SiteOrigin Widgets Bundle', // The plugin name.
            'slug'               => 'so-widgets-bundle', // The plugin slug (typically the folder name).
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		 ),
		// This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'               => 'Black Studio TinyMCE Widget', // The plugin name.
            'slug'               => 'black-studio-tinymce-widget', // The plugin slug (typically the folder name).
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
           ),

        // This is an example of how to include a plugin from a private repo in your theme.
        array(
            'name'               => 'Contact Form 7', // The plugin name.
            'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			),
        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'               => 'Perch Shortcodes', // The plugin name.
            'slug'               => 'perch-shortcodes', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/lib/plugins/perch-shortcodes.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
		
		// This is an example of how to include a plugin from a private repo in your theme.
        array(
            'name'               => 'Page Builder by SiteOrigin', // The plugin name.
            'slug'               => 'siteorigin-panels', // The plugin slug (typically the folder name).
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			),
		
		// This is an example of how to include a plugin from a private repo in your theme.
        array(
            'name'               => 'Newsletter', // The plugin name.
            'slug'               => 'newsletter', // The plugin slug (typically the folder name).
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			),
		// This is an example of how to include a plugin from a private repo in your theme.
        array(
            'name'               => 'Revolution Slider', // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/lib/plugins/revslider-5.2.5.zip',  // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '5.2.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
        array(
                'name'      => __('Max Mega Menu', 'eshopper'),
                'slug'      => 'megamenu',
                'required'  => true,
            ),
        array(
            'name'               => __('Megamenu Addon', 'eshopper'), // The plugin name.
            'slug'               => 'megamenu-pro', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/lib/plugins/megamenu-pro.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', THEMENAME ),
            'menu_title'                      => __( 'Install Plugins', THEMENAME ),
            'installing'                      => __( 'Installing Plugin: %s', THEMENAME ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', THEMENAME ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', THEMENAME ),
            'plugin_activated'                => __( 'Plugin activated successfully.', THEMENAME ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', THEMENAME ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}