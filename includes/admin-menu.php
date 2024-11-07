<?php

class Nazmul_Academy_Admin_Menu {
    public function __construct()
    {
        add_action('admin_menu', [$this, 'admin_menu']);
    }
    public function admin_menu(){
        add_menu_page(
            'Nazmul Academy Plugin',//page_title
            'Nazmul Academy Plugin',//menu_title
            'manage_options',//capability  Specific roll কে Specific মেনু দেখাতে চাইলে capability যুক্ত করতে হবে।
            'nazmul_academy_plugin',//menu_slug
            ([$this, 'nazmul_academy_plugin_callback']), //callback 
            // array($this, 'nazmul_academy_plugin_callback')//callback 
        );
    }
    public function nazmul_academy_plugin_callback(){
       //get post এর অ্যারেটাকে বাহিরে রাখতে হয়।
       $post_args = array(
            'posts_type' => 'post',
            'tax_query' => array(
              array(
                'taxonomy' => 'category',
              'field' =>  'term_id', //field string আকাকের েএকটা আইডি নেই।
// http://wppdb2.test/wp-admin/admin.php?page=nazmul_academy_plugin&customized_category=-1 হবে term_id
              'terms' => $_GET['customized_category'], 
              // All Categort যদি -1 থাকে তাহলে তো কুইরি করার প্রয়োজন নেই। অর্থাৎ ট্যাক্সোনমি রান করার প্রয়োজন নেই।আমি এটা তখনই দেখাবো যখন এটার ভ্যালু সেট করা এবং -১ 
              ),
            ),
        ) ;

    if( isset ($_GET['customized_category']) && $_GET['customized_category'] != '-1'){
        $post_args['tax_query'] = array(
              array(
                'taxonomy' => 'category',
              'field' =>  'term_id', //field string আকাকের েএকটা আইডি নেই।
// http://wppdb2.test/wp-admin/admin.php?page=nazmul_academy_plugin&customized_category=-1 হবে term_id
              'terms' => $_GET['customized_category'], 
              // All Categort যদি -1 থাকে তাহলে তো কুইরি করার প্রয়োজন নেই। অর্থাৎ ট্যাক্সোনমি রান করার প্রয়োজন নেই।আমি এটা তখনই দেখাবো যখন এটার ভ্যালু সেট করা এবং -১ 
              ),
            );
    }
        $posts = get_posts($post_args);
        $terms = get_terms( array(
            'taxonomy'   => 'category',
            'hide_empty' => false,
        ) );
        print_r($terms);
        include_once __DIR__.'/templates/nazmul_academy_plugin.php';
    }
}





//From Rectify Chatgpt
// class Nazmul_Academy_Admin_Menu {
//     public function __construct() {
//         add_action('admin_menu', [$this, 'add_admin_menu']);
//     }

//     public function add_admin_menu() {
//         add_menu_page(
//             'Nazmul Academy Plugin',
//             'Nazmul Academy',
//             'manage_options',
//             'nazmul-academy',
//             [$this, 'display_admin_page'],
//             'dashicons-welcome-learn-more',
//             20
//         );
//     }

//     public function display_admin_page() {
//         echo '<h1>Welcome to Nazmul Academy Plugin</h1>';
//     }
// }
