
<?php
/*
* In this file we will customize columns in the posts table.
*/
class Nazmul_Academy_Post_Column {
    /*
    * Constructor
    */
    public function __construct() {
        // কাস্টম কলাম যোগ করার জন্য ফিল্টার এবং অ্যাকশন হুক
        add_filter('manage_page_posts_columns', array($this, 'posts_columns'), 10, 1);
        add_action('manage_page_posts_custom_column', array($this, 'add_column_value'), 10, 2);
    }

    /*
    * কাস্টম কলাম যোগ করা হচ্ছে
    */
    public function posts_columns($columns) {
        $new_columns = array();

        // মূল কলামগুলিতে নতুন কলাম 'Thumbnails' যোগ করা হচ্ছে
        foreach ($columns as $key => $column) {
            $new_columns[$key] = $column;
            if ('cb' === $key) {
                $new_columns['image'] = 'Thumbnails';
            }
        }

        return $new_columns;
    }

    /*
    * কাস্টম কলামের মান দেখানো হচ্ছে
    */
    public function add_column_value($column_name, $post_id) {
        if ('image' == $column_name) {
            // যদি ফিচারড ইমেজ থাকে
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, 'thumbnail');
            } else {
                // একবারই "No Image" দেখাবে
                echo '<span style="color: red;">No Image</span>';
            }
        }
    }
}

// ক্লাসের ইনস্ট্যান্স তৈরি করা হচ্ছে
new Nazmul_Academy_Post_Column();



