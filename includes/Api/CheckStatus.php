<?php
namespace WpIntegrity\StoreKit\Api;

use WP_REST_Response;
use WP_REST_Server;

/**
 * Check Status Class
 *
 * Provides an API endpoint to check if a plugin or theme is active.
 *
 * @since 1.0.0
 */
class CheckStatus extends Base {

    /**
     * Class constructor
     *
     * Initializes the namespace and rest_base for the REST API endpoint.
     *
     * @since 1.0.0
     */
    public function __construct() {
        $this->namespace = 'storekit/v1';
        $this->rest_base = 'check_status';
    }

    /**
     * Register the REST API route
     *
     * Registers the route for checking the status of a plugin or theme.
     *
     * @since 1.0.0
     * @return void
     */
    public function register_routes() {
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base,
            [
                [
                    'methods'  => WP_REST_Server::READABLE,
                    'callback' => [ $this, 'check_status' ],
                    'args'     => [
                        'type' => [
                            'required'          => true,
                            'validate_callback' => function( $param ) {
                                return in_array( $param, [ 'plugin', 'theme' ], true );
                            },
                        ],
                        'slug'  => [
                            'required'          => true,
                            'validate_callback' => function( $param ) {
                                return is_string( $param ) && ! empty( $param );
                            },
                        ],
                    ],
                    'permission_callback' => [ $this, 'admin_permission_check' ],
                ],
            ]
        );
    }

    /**
     * Callback function to check if a plugin or theme is active
     *
     * Checks if the specified plugin or theme is currently active.
     *
     * @since 1.0.0
     *
     * @param WP_REST_Request $data The request data.
     * @return WP_REST_Response The response data.
     */
    public function check_status( $data ) {
        $type      = $data['type'];
        $slug      = $data['slug'];
        $is_active = false;

        if ( $type === 'plugin' ) {
            $active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
            $is_active      = in_array( $slug, $active_plugins, true );
        } elseif ( $type === 'theme' ) {
            $current_theme = wp_get_theme();
            $is_active     = $current_theme->get_stylesheet() === $slug || $current_theme->get_template() === $slug;
        }

        return new WP_REST_Response(
            [
                'type'      => $type,
                'slug'      => $slug,
                'is_active' => $is_active,
            ],
            200
        );
    }
}