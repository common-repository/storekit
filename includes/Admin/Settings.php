<?php
namespace WpIntegrity\StoreKit\Admin;

/**
 * Admin Pages Handler Class
 *
 * Handles the creation and management of the admin pages for the StoreKit plugin.
 *
 * @since 2.0.0
 */
class Settings {

    /**
     * Class constructor
     *
     * Initializes the admin menu action.
     *
     * @since 1.0.0
     */
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    /**
     * Register our menu page
     *
     * Adds a new menu page for StoreKit in the WordPress admin dashboard.
     *
     * @since 1.0.0
     * @return void
     */
    public function admin_menu() {
        $capability = 'manage_options';
        $slug       = 'storekit';

        $storekit_icon_base64 = 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDI3LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+Cgkuc3Qwe29wYWNpdHk6MC45Nzg7ZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7ZW5hYmxlLWJhY2tncm91bmQ6bmV3ICAgIDt9Cjwvc3R5bGU+CjxnPgoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTQ3NC4xLDQ2NC42Yy0wLjItNjEuNywwLTEyMy4zLDAuNS0xODVjNi42LTQuOSwxMS4yLTExLjIsMTQtMTljMS42LTEwLjksMS45LTIxLjksMS0zMwoJCWMtMTAtMTEtMjAuMy0yMS42LTMxLTMyYy0wLjMtNTUtMC43LTExMC0xLTE2NWMtNC4zLTE2LjItMTQuNS0yNi41LTMwLjUtMzFjLTExMi43LDAtMjI1LjMsMC0zMzgsMGMtMTYsNC41LTI2LjIsMTQuOC0zMC41LDMxCgkJYy0wLjMsNTUtMC43LDExMC0xLDE2NWMtMTAuNywxMC40LTIxLDIxLTMxLDMyYy0wLjksMTEuMS0wLjYsMjIuMSwxLDMzYzIuOCw3LjgsNy40LDE0LjEsMTQsMTljMC41LDYxLjcsMC43LDEyMy4zLDAuNSwxODUKCQljLTIuOCwwLjMtNS41LDEuMi04LDIuNWMtMTQuMiw5LjgtMTkuMywyMy4zLTE1LjUsNDAuNWMwLjcsMS44LDEuOSwzLjIsMy41LDRjMTU3LjMsMCwzMTQuNywwLDQ3MiwwYzEuNi0wLjgsMi44LTIuMiwzLjUtNAoJCWMwLjItMy4zLDAuMy02LjcsMC41LTEwQzQ5OC40LDQ4MC4zLDQ5MC40LDQ2OS4zLDQ3NC4xLDQ2NC42eiBNNDcxLjUsMjM5LjVjMS41LDE0LjgtNC41LDI1LTE4LDMwLjVjLTIxLDEtMzEtOS4yLTMwLTMwLjUKCQlDNDM5LjUsMjM5LjUsNDU1LjUsMjM5LjUsNDcxLjUsMjM5LjV6IE0xOTksMzU2LjVjLTEwLjctMzUtMzQuMi00OS41LTcwLjUtNDMuNWMtMjEuNiw2LjktMzUuMSwyMS40LTQwLjUsNDMuNQoJCWMtMC41LDM1LjctMC43LDcxLjMtMC41LDEwN2MtMTAuNywwLTIxLjMsMC0zMiwwYzAtNTguNywwLTExNy4zLDAtMTc2YzEyLjYsMS45LDIzLjktMSwzNC04LjVjMi4zLTEuOCw0LTMuOSw1LTYuNQoJCWMxNC4yLDE1LjMsMzEuMiwxOS4xLDUxLDExLjVjNS42LTIuNiwxMC4zLTYuNSwxNC0xMS41YzEzLjgsMTUuNSwzMC41LDE5LjMsNTAsMTEuNWM1LjYtMi42LDEwLjMtNi41LDE0LTExLjUKCQljMTIsMTMuOSwyNywxOC40LDQ1LDEzLjVjNy42LTIuOCwxMy45LTcuMywxOS0xMy41YzEyLDEzLjksMjcsMTguNCw0NSwxMy41YzcuNi0yLjgsMTMuOS03LjMsMTktMTMuNWMxNC43LDE1LjksMzIsMTkuNCw1MiwxMC41CgkJYzQuOC0yLjYsOC44LTYuMSwxMi0xMC41YzEwLjUsMTIuMiwyMy44LDE3LjIsNDAsMTVjMCw1OC43LDAsMTE3LjMsMCwxNzZjLTg1LjMsMC0xNzAuNywwLTI1NiwwCgkJQzE5OS43LDQyNy44LDE5OS41LDM5Mi4yLDE5OSwzNTYuNXogTTE2Ny41LDM5OS41Yy0wLjEsMi40LDAuNiw0LjYsMiw2LjVjNC41LDEuNCw5LjIsMS45LDE0LDEuNWMwLDE4LjcsMCwzNy4zLDAsNTYKCQljLTI2LjcsMC01My4zLDAtODAsMGMtMC40LTM0LjcsMC4xLTY5LjQsMS41LTEwNGM0LjMtMTYuMiwxNC41LTI2LjUsMzAuNS0zMWMyNC0yLjIsMzkuNSw4LjIsNDYuNSwzMWMxLjMsMTAuNiwxLjgsMjEuMywxLjUsMzIKCQljLTQtMC4yLTgsMC0xMiwwLjVDMTY4LjUsMzkzLjUsMTY3LjIsMzk2LDE2Ny41LDM5OS41eiBNMTAzLjUsMjM5LjVjMTYsMCwzMiwwLDQ4LDBjMS41LDE0LjgtNC41LDI1LTE4LDMwLjUKCQlDMTEyLjUsMjcxLDEwMi41LDI2MC44LDEwMy41LDIzOS41eiBNMTY3LjUsMjM5LjVjMTYsMCwzMiwwLDQ4LDBjMS41LDE0LjgtNC41LDI1LTE4LDMwLjVDMTc2LjUsMjcxLDE2Ni41LDI2MC44LDE2Ny41LDIzOS41egoJCSBNMjMxLjUsMjM5LjVjMTYsMCwzMiwwLDQ4LDBjMS41LDE0LjgtNC41LDI1LTE4LDMwLjVDMjQwLjUsMjcxLDIzMC41LDI2MC44LDIzMS41LDIzOS41eiBNMjk1LjUsMjM5LjVjMTYsMCwzMiwwLDQ4LDAKCQljMS41LDE0LjgtNC41LDI1LTE4LDMwLjVDMzA0LjUsMjcxLDI5NC41LDI2MC44LDI5NS41LDIzOS41eiBNMzU5LjUsMjM5LjVjMTYsMCwzMiwwLDQ4LDBjMS41LDE0LjgtNC41LDI1LTE4LDMwLjUKCQlDMzY4LjUsMjcxLDM1OC41LDI2MC44LDM1OS41LDIzOS41eiBNNzQuMSwzMC40YzAtOC4zLDYuNy0xNSwxNS0xNWgzMzcuOGM4LjMsMCwxNSw2LjcsMTUsMTV2MTYxLjFoLTU1LjJjLTEuMy0xLjYtMy0yLjktNS0zLjcKCQljLTEuMy0yOC44LTIuOC01Ny42LTQuNS04Ni40YzYuNCwwLjgsMTAuOS0xLjYsMTMuNi03LjRjMC4zLTcuNywwLjUtMTUuNCwwLjgtMjNjOC4xLDMuOSwxNS43LDguNywyMi42LDE0LjQKCQljOS43LDEuOCwxNC4zLTIuMiwxMy42LTExLjljLTEuNi01LjUtMy4zLTExLTQuOS0xNi41Yy02LjQtMTQuOS0xNy41LTI0LjEtMzMuMy0yNy42Yy0yMi4yLTAuNS00NC40LTAuNS02Ni43LDAKCQljLTMuNiwxLjctNi41LDQuMy04LjYsNy44Yy0xLjUtMy40LTMuOC02LTctNy44Yy0zMC40LTYuOS00My4zLDQuOS0zOC43LDM1LjRjLTUuMiwyOS45LDcuMiw0MiwzNywzNi4yYzQuNS0xLjIsNy40LTQuMSw4LjYtOC42CgkJYzIuNyw1LjgsNy4yLDguOCwxMy42LDkuMWMtMS4zLDI4LjgtMi44LDU3LjYtNC41LDg2LjRjLTEuNSwwLjktMi45LDItNC4xLDMuMmMwLDAuMiwwLDAuMywwLDAuNWgtNTUuOWMwLTAuMSwwLTAuMiwwLjEtMC4zCgkJYzAuMS04LjUsMC0xNy0wLjMtMjUuNWMtMC41LTUuMi0yLjYtOS40LTYuNi0xMi44YzAuOC0xLDEuMy0yLjIsMS42LTMuNGMwLjQtNS40LDAuNC0xMC44LDAtMTYuMmMtMS43LTUuMy01LjMtNy44LTEwLjktNy41CgkJYy0wLjUtMTYuNi0wLjYtMzMuMy0wLjMtNDkuOWMxLjUtMi4zLDIuOS00LjYsNC40LTYuOWMwLjYtMS41LDAuOS0zLjEsMC45LTQuN2MtMS4zLTguOS0yLjYtMTcuNy00LjEtMjYuNWMtMS0yLjktMi43LTUuMi01LjMtNi45CgkJSDIyMWMtMi41LDEuMS00LjIsMy01LjMsNS42Yy0xLjYsOS40LTMuMSwxOC43LTQuNywyOC4xYzEuMSw0LjIsMy4xLDcuOSw1LjksMTEuMmMtMC4yLDE2LjYtMC4zLDMzLjMtMC4zLDQ5LjkKCQljLTYuMy0wLjMtMTAuMiwyLjYtMTEuNSw4LjdjLTAuNCw0LjYtMC40LDkuMiwwLDEzLjdjMC4yLDEuNiwwLjgsMywxLjYsNC40Yy0yLjYsMy4yLTQuNiw2LjctNS45LDEwLjZjLTAuMiw5LjMtMC40LDE4LjYtMC42LDI3LjkKCQljMCwwLjEsMCwwLjMsMC4xLDAuNEgxNzR2LTQuMmMwLDAsMCwwLTAuMSwwYzAuMS0xMi40LDAtMjQuOC0wLjQtMzcuMWMtMi4yLTYuNS01LjktNy41LTExLjEtM2MtMC40LDEzLjQtMC41LDI2LjctMC40LDQwLjFoLTI2CgkJYzAuMS0yOS4yLDAtNTguNC0wLjQtODcuNmMtMC42LTEuMy0xLjQtMi40LTIuNi0zLjNjLTMuOC0yLTcuMi00LjYtMTAtNy44Yy0xMS0xNS45LTEwLjItMzEsMi42LTQ1LjNjMC42LDYuOSwxLDEzLjksMS4xLDIwLjgKCQljNi43LDUuNiwxNC4xLDkuOCwyMi4zLDEyLjZjNy42LTMuMiwxNC44LTcuMSwyMS41LTExLjljMC45LTcuMSwxLjQtMTQuMywxLjUtMjEuNWMyLjMsMi4yLDQuMyw0LjcsNS45LDcuNAoJCWM2LjIsMTMsNS4yLDI1LjQtMywzNy4xYy00LDQuMS04LjIsNy44LTEyLjYsMTEuMWMtMC41LDkuOC0wLjUsMTkuNSwwLDI5LjNjMC43LDEsMS41LDEuOSwyLjIsMi45YzQuNywxLjQsNy43LTAuMiw4LjktNC43CgkJYzAuMi03LjIsMC41LTE0LjQsMC43LTIxLjVjMTAuNC03LjYsMTYuOC0xNy44LDE5LjMtMzAuNWMyLjQtMjAuMi00LjktMzUuNi0yMS45LTQ2LjRjLTUuMS0xLjMtOSwwLjMtMTEuNSw0LjgKCQljLTAuMSw4LjQtMC41LDE2LjgtMS4xLDI1LjNjLTMuMywxLjgtNi41LDMuNy05LjcsNS43Yy00LjgtMi41LTYtMy4yLTEwLjgtNS43Yy0wLjItNy45LTAuNS0xNS44LTAuNy0yMy44CgkJYy0yLjYtNi40LTcuMi04LjMtMTMuNy01LjZjLTkuNCw2LjItMTUuNywxNC43LTE4LjksMjUuNmMtNC44LDIxLDEuNCwzNy44LDE4LjYsNTAuNWMwLjQsMjguOSwwLjUsNTcuOCwwLjQsODYuN2gtNTBWMzAuNHoKCQkgTTMyOSw4OC42Yy0zLjItNC4zLTcuMy03LjUtMTIuMy05LjVjLTAuOC05LTEuMS0xOC4xLTAuOC0yNy4yYzUuOC0wLjgsOS45LTMuOSwxMi4zLTkuMWMyMC42LTAuMSw0MS4yLDAsNjEuNywwLjQKCQljMTIuNywzLjQsMjAuMywxMS41LDIyLjYsMjQuM2MtOC03LjQtMTcuMi05LjgtMjcuNi03Yy0yLDEuNC0zLjUsMy4yLTQuNSw1LjNjLTEuMSw3LjYtMS41LDE1LjMtMS4yLDIzCgkJQzM2Mi40LDg5LjIsMzQ1LjcsODkuMSwzMjksODguNnogTTM2OC4zLDE4Ny44Yy0xMC40LDAtMjAuOSwwLTMxLjMsMGMxLjQtMjguNSwyLjctNTcuMSw0LjEtODUuNmM3LjcsMCwxNS40LDAsMjMsMAoJCUMzNjYsMTMwLjcsMzY3LjMsMTU5LjMsMzY4LjMsMTg3Ljh6IE0zMDIuNiw0M2MwLDE1LjQsMCwzMC43LDAsNDYuMWMtNS4yLDAuMS0xMC40LDAtMTUuNi0wLjRjLTEuNS0wLjYtMi43LTEuNi0zLjctMi45CgkJYy0wLjUtMTMuMi0wLjUtMjYuMywwLTM5LjVjMC42LTEuNSwxLjUtMi42LDIuOS0zLjNDMjkxLjcsNDMsMjk3LjEsNDMsMzAyLjYsNDN6IE0yMzEuOCw2OS41Yy0yLjQtMC4xLTQuOC0wLjItNy4yLTAuMwoJCWMtMS0xLjMtMS45LTIuNi0yLjgtNC4xYzAuNi04LjMsMS41LTE2LjcsMi44LTI1YzQuNiwwLDkuMiwwLDEzLjcsMGMxLjMsOC40LDIuNSwxNS45LDMuNywyMy40QzI0MC42LDY4LjgsMjM3LjIsNzAuNywyMzEuOCw2OS41egoJCSBNMjM3LjEsMTI1LjZjLTMuNSwwLTcuMSwwLTEwLjYsMGMtMC4xLTE1LjQsMC4xLTMwLjgsMC42LTQ2LjJjMy4xLDAsNi4yLDAsOS40LDBDMjM2LjUsOTQuOSwyMzYuNywxMTAuMywyMzcuMSwxMjUuNnoKCQkgTTI0OC4zLDEzNS42YzAsMy43LDAsNy41LDAsMTEuMmMtMTEuMiwwLTIyLjUsMC0zMy43LDBjMC0zLjcsMC03LjUsMC0xMS4yQzIyNy45LDEzNS42LDIzOS4xLDEzNS42LDI0OC4zLDEzNS42eiBNMjE5LjYsMTU2LjgKCQljOC4xLTAuMSwxNi4yLDAsMjQuMywwLjNjNC43LDEuNCw3LjcsNC40LDksOWMwLjMsOC40LDAuNCwxNi44LDAuMywyNS4zaC00My4xYy0wLjEtOC44LDAtMTcuNywwLjMtMjYuNQoJCUMyMTIuMiwxNjAuNiwyMTUuMiwxNTcuOSwyMTkuNiwxNTYuOHogTTY3LjUsMjA3LjVjMTI1LjMtMC4yLDI1MC43LDAsMzc2LDAuNWM1LDUsMTAsMTAsMTUsMTVjLTEzNS4zLDAuNy0yNzAuNywwLjctNDA2LDAKCQlDNTcuNywyMTgsNjIuNywyMTIuOCw2Ny41LDIwNy41eiBNMzkuNSwyMzkuNWMxNiwwLDMyLDAsNDgsMGMxLjUsMTQuOC00LjUsMjUtMTgsMzAuNUM0OC41LDI3MSwzOC41LDI2MC44LDM5LjUsMjM5LjV6CgkJIE0zMi41LDQ5NS41YzAuOS05LjIsNS45LTE0LjYsMTUtMTZjMTM4LjctMC4yLDI3Ny4zLDAsNDE2LDAuNWM5LjMsMS4xLDE0LjMsNi4zLDE1LDE1LjVDMzI5LjgsNDk1LjUsMTgxLjIsNDk1LjUsMzIuNSw0OTUuNXoiLz4KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0yNDEuNyw0MzkuM2MzMS4yLDEuMiw2Mi42LDEuNyw5NCwxLjVjMzAuNy0wLjIsNjEuMy0wLjMsOTItMC41YzAuOS0wLjQsMS43LTAuOSwyLjUtMS41CgkJYzEuMi0yMC42LDEuNy00MS4yLDEuNS02MmMtMC4yLTIwLTAuMy00MC0wLjUtNjBjLTAuNC0wLjktMC45LTEuNy0xLjUtMi41Yy02MS45LTEuNS0xMjMuOS0yLTE4Ni0xLjVjLTEuNiwwLjgtMi44LDIuMS0zLjUsNAoJCWMtMC43LDQwLTAuNyw4MCwwLDEyMEMyNDAuNiw0MzcuNywyNDEuMSw0MzguNSwyNDEuNyw0MzkuM3ogTTM0My43LDMyOC44YzI0LDAsNDgsMCw3MiwwYzAsMTMuMywwLDI2LjcsMCw0MGMtMjQsMC00OCwwLTcyLDAKCQlDMzQzLjcsMzU1LjUsMzQzLjcsMzQyLjEsMzQzLjcsMzI4Ljh6IE0zNDMuNywzODQuOGMyNCwwLDQ4LDAsNzIsMGMwLDEzLjMsMCwyNi43LDAsNDBjLTI0LDAtNDgsMC03MiwwCgkJQzM0My43LDQxMS41LDM0My43LDM5OC4xLDM0My43LDM4NC44eiBNMjU1LjcsMzI4LjhjMjQsMCw0OCwwLDcyLDBjMCwxMy4zLDAsMjYuNywwLDQwYy0yNCwwLTQ4LDAtNzIsMAoJCUMyNTUuNywzNTUuNSwyNTUuNywzNDIuMSwyNTUuNywzMjguOHogTTI1NS43LDM4NC44YzI0LDAsNDgsMCw3MiwwYzAsMTMuMywwLDI2LjcsMCw0MGMtMjQsMC00OCwwLTcyLDAKCQlDMjU1LjcsNDExLjUsMjU1LjcsMzk4LjEsMjU1LjcsMzg0Ljh6Ii8+CjwvZz4KPC9zdmc+Cg==';

        $storekit_icon_data_uri = 'data:image/svg+xml;base64,' . $storekit_icon_base64;

        add_menu_page( 
            __( 'StoreKit', 'storekit' ), 
            __( 'StoreKit', 'storekit' ), 
            $capability, 
            $slug, 
            [ $this, 'render_settings_page' ], 
            $storekit_icon_data_uri 
        );

        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    }

    /**
     * Render Plugin's Menu Page
     *
     * Outputs the content for the StoreKit settings page.
     *
     * @since 2.0.0
     * @return void
     */
    public function render_settings_page() {
        echo '<div class="wrap"><div id="storekit-admin"></div></div>';
    }

    /**
     * Enqueue scripts and styles
     *
     * Enqueues the necessary scripts and styles for the StoreKit admin page.
     *
     * @since 2.0.0
     * @return void
     */
    public function enqueue_scripts() {
        wp_enqueue_style( 'storekit-admin' );
        wp_enqueue_script( 'storekit-admin' );

        // Localize script to pass nonce to JavaScript
        wp_localize_script( 'storekit-admin', 'storekitApiSettings', array(
            'nonce' => wp_create_nonce( 'wp_rest' ),
        ) );
    }
}
