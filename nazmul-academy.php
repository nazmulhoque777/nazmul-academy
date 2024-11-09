<?php 
/*
 * Plugin Name:     Nazmul Academy Admin Menu
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:           Md Nazmul Hoque
 * Author URI:        nazmulhoque.xyz
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       nazmulhoque
 * Domain Path:       /languages
 * Requires Plugins: It is my first plugin porject
 */
//সিঙ্গেলটন প্যাটার্নে েএকটাই instance তৈরি হবে।যার কারণে কেউ বাহির থেকে ফাংশানকে কল করতে পারবেনা।
 class Nazmul_Academy_Plugin{
    private static $instance;
    public static function get_instance(){
        if (! self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //সিঙ্গেলটন বানানোর কারনে __construct প্রাইভেট হয়ে গেছে করার কারনে
    public function __construct()
    {
        //require_classes শুধু মাএ __construct এর ভেতরেই কল করবে অন্য কোথাও require_classes কে কল করতে দেওয়া হবেনা। 
      $this->require_classes();  
    }
    //বাহির থেকে কাউকে কল করতে দেওয়া হবেনা তাই প্রাইভেট ফাংশান কল করা হয়েছে।
    private function require_classes(){
        require_once __DIR__.'/includes/admin-menu.php';
        require_once __DIR__.'/includes/post-column.php';

       new Nazmul_Academy_Admin_Menu();
       new Nazmul_Academy_Post_Column();

    }
 }
//instance একটা কল করা হয়েছে যার কারনে এই প্লাগিন একবারই রান হবে।
  Nazmul_Academy_Plugin::get_instance();



//From Rectify Chatgpt

// class Nazmul_Academy_Plugin {
//     private static $instance;

//     public static function get_instance() {
//         if (!self::$instance) {
//             self::$instance = new self();
//         }
//         return self::$instance;
//     }

//     private function __construct() {
//         $this->require_classes();
//     }

//     private function require_classes() {
//         // Ensure the file path is correct and the file exists
//         if (file_exists(__DIR__ . '/includes/admin-menu.php')) {
//             require_once __DIR__ . '/includes/admin-menu.php';
//             new Nazmul_Academy_Admin_Menu();
//         } else {
//             // Handle the error gracefully if the file does not exist
//             wp_die('Error: admin-menu.php file is missing.');
//         }
//     }
// }

// // Instantiate the plugin
// Nazmul_Academy_Plugin::get_instance();

