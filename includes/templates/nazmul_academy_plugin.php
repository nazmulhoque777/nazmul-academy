<div class="wrap"><h1 class="wp-heading-inline">
Nazmul Academy Customize Posts</h1>
<?php

$posts = get_posts([
    'posts_type' => 'post',
]);

// print_r($posts);
?>

             <div class="tablenav top">
                <!-- এটা Wp_admin url পাবে http://wppdb2.test/wp-admin/admin.php পাবে inspect করে দেখতে পারবো।-->
               <form method="get" action="<?php echo admin_url('admin.php'); ?>">
                <!-- যদি  আমরা হোম ইউআরএল দেখতে চাই  -->
      

                    <!-- েএখানে form বলে দিলাম তুমি name="page" value="nazmul_academy_plugin" কে সাবমিট করো।  -->
                    <!-- http://wppdb2.test/wp-admin/admin.php?page=nazmul_academy_plugin ata static-->
                    <input type="hidden" name="page" value="nazmul_academy_plugin">
				<div class="alignleft actions bulkactions">
                    <?php 
                    $selected_category = isset ($_GET ['customized_category']) ? $_GET['customized_category'] : '-1';
                    ?>
                    <!-- //lable tag না ব্যবহার করলেও েএকই কাজ করবে। -->
			   <!-- <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label> -->
               <select name="customized_category" id="bulk-action-selector-top">
                  <option value="-1" <?php selected( '-1', $selected_category ); ?>>All Categories</option>
                  <!-- Sourov vai ai line bad diasa -->
	              <!-- <option value="edit" class="hide-if-no-js">Edit</option> -->
	              <!--িএখান থেকে লুপ চালানো হয়েছে -->
                  <?php foreach ($terms as $term) : ?>
                    <!-- attribute এর ক্ষেএ এটি ব্যবহার করা হয় -->
                  <option value="<?php echo esc_attr($term->term_id) ;?>"<?php selected(  $term->term_id, $selected_category ); ?>>
                    <?php echo $term->name;?>
                </option>
                  <?php endforeach; ?>
               </select>
            <input type="submit" id="doaction" class="button action" value="Apply">
		 </div>
         </form>
     </div>

<table class="wp-list-table widefat fixed striped table-view-list posts">

<thead>
    <tr>
        <th>Title</th>
        <th>Author</th>
    </tr>
</thead>
<tbody>
    <?php 
    foreach ($posts as $post):
    $author = get_user_by('id', $post->post_author);
    ?>
    <tr>
        <td> <?php echo $post->post_title; ?> </td>
        <td> <?php echo $author->data->display_name; ?> </td>

       
    </tr>
    <?php endforeach; ?>
</tbody>

</table>

</div>