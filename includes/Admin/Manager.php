<?php
namespace WpIntegrity\StoreKit\Admin;

/**
 * Admin Manager Class
 * 
 * This class is responsible for initializing the admin settings for the StoreKit plugin.
 * 
 * @since 2.0.0
 */
class Manager {
    /**
     * Class constructor
     * 
     * Initializes the Settings class to manage the admin settings.
     * 
     * @since 2.0.0
     */
    public function __construct() {
        new Settings();
    }
}