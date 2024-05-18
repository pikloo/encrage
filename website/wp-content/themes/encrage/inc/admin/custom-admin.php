<?

// afficher la barre d'administration qu'aux administrateurs
if (!current_user_can('manage_options')) {
    add_filter('show_admin_bar', '__return_false');
}

// if (!function_exists('custom_login_url')) {
//     add_filter('login_url', 'custom_login_url', PHP_INT_MAX);
//     function custom_login_url($login_url)
//     {
//         return str_replace('bureau', 'encrage-login', $login_url);
//     }
// }

if (!function_exists('custom_login_url')) {
    add_filter('logout_url', 'custom_logout_url', PHP_INT_MAX);
    function custom_logout_url($logout_url)
    {
        $logout_url = home_url('/bureau.php?action=logout');
        $logout_url = wp_nonce_url($logout_url, 'log-out');
        return $logout_url;
    }
}


if (!function_exists('custom_lost_password_url')) {
    add_filter('lostpassword_url', 'custom_lost_password_url', PHP_INT_MAX);
    function custom_lost_password_url($lost_password_url)
    {
        $lost_password_url = home_url('/bureau.php?action=lostpassword');
        $lost_password_url = wp_nonce_url($lost_password_url, 'log-out');
        return $lost_password_url;
    }
}

if (!function_exists('custom_redirect_after_logout')) {
    add_action('wp_logout', 'custom_redirect_after_logout');
    function custom_redirect_after_logout()
    {
        if (!is_admin()) {
            wp_safe_redirect(home_url());
            exit();
        }
    }
}

if (!function_exists('edit_login_logo')) {
    function edit_login_logo()
    {
?>
        <style type="text/css">
            .login #login h1 {
                background: #FFF;
            }

            .login #login h1 a {
                background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ancrage_logo.png');
                height: max-content;
                padding: 4px;
            }
        </style>
<?php }
    add_action('login_enqueue_scripts', 'edit_login_logo');
}

if (!function_exists('admin_custom_logo')) {

    add_action('admin_head', 'admin_custom_logo');
    function admin_custom_logo()
    {
?>
        <style type="text/css">
            #wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon:before {
                background-image: url("<?= get_stylesheet_directory_uri() ?>/assets/images/admin/tiny-logo-encrage.png");
                background-position: 0 0;
                color: rgba(0, 0, 0, 0);
            }

            #wpadminbar #wp-admin-bar-wp-logo.hover>.ab-item .ab-icon {
                background-position: 0 0;
            }
        </style>

    <?php
    }
}


if (!function_exists('login_page_style')) {
    add_action('login_enqueue_scripts', 'login_page_style');
    function login_page_style()
    {
    ?>
        <div class="background-cover"></div>
        <style type="text/css" media="screen">
            .background-cover {
                background: url('<?= get_stylesheet_directory_uri() ?>/assets/images/admin/login-bg.jpg') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 10;
                overflow: hidden;
                width: 100%;
                height: 100%;
            }

            #login {
                z-index: 9999;
                position: relative;
            }

            .login form {
                box-shadow: 0px 0px 0px 0px !important;
            }

            /* .login h1 a {
                background: url('<?= get_stylesheet_directory_uri() ?>/images/background') no-repeat center top !important; } */

                        /* input.button-primary, button.button-primary, a.button-primary {
                        border-radius: 3px !important;
                        background:url('<?= get_stylesheet_directory_uri() ?>/images/background');
                            border:none !important;
                            font-weight:normal !important;
                            text-shadow:none !important;
                        } */

                        .button:active, .submit input:active, .button-secondary:active {
                            background:#96C800 !important;
                            text-shadow: none !important;
                        }

                        .login #nav a, .login #backtoblog a {
                            color:#fff !important;
                            text-shadow: none !important;
                        }

                        .login #nav a:hover, .login #backtoblog a:hover {
                            color:#96C800 !important;
                            text-shadow: none !important;
                        }

                        .login #nav, .login #backtoblog {
                            text-shadow: none !important;
                        }
        </style>
<?php
    }
}
