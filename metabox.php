<?php
    function my_custom_meta_box(  ){
       
        add_meta_box('custom-meta', 'Custom Meta', 'my_custom_meta_callback', 'post', 'side', 'high');
    }
add_action('add_meta_boxes', 'my_custom_meta_box');
    function my_custom_meta_callback($post){
        wp_nonce_field('wp-action-nonce', 'wp-name-nonce');
		?>
       		<p><label for="file">File Name</label> </p>
        	<input type="text" class="widefat" name="file" id="file" value="<?php echo get_post_meta(get_the_ID(), 'file', true); ?>">
       
       		<p><label for="link">Link Site</label> </p>
        	<input type="text" class="widefat" name="link" id="link" value="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>">
        	
      		<p><label for="modal">Model</label> </p>
        	<input type="text" class="widefat" name="modal" id="modal" value="<?php echo get_post_meta(get_the_ID(), 'modal', true); ?>">
        	
      		<label for="size">File Size</label> 
        	<input type="text" class="widefat" name="size" id="size" value="<?php echo get_post_meta(get_the_ID(), 'size', true); ?>">

        <?php
       
    }
    function my_data_save_post($post_id){
       
        if( cmb_user_can_save_meta_box_data($post_id, 'wp-name-nonce') ){
			
            if(isset($_POST['file'])){
                $name = stripslashes(strip_tags($_POST['file']));
                update_post_meta($post_id, 'file', $name);
            }
			if(isset($_POST['link'])){
                $link = stripslashes(strip_tags($_POST['link']));
                update_post_meta($post_id, 'link', $link);
            }
			if(isset($_POST['modal'])){
                $modal = stripslashes(strip_tags($_POST['modal']));
                update_post_meta($post_id, 'modal', $modal);
            }
			if(isset($_POST['size'])){
                $value = stripslashes(strip_tags($_POST['size']));
                update_post_meta($post_id, 'size', $value);
            }
        }
    }
add_action('save_post', 'my_data_save_post');
    function cmb_user_can_save_meta_box_data( $post_id, $nonce ){
        $autosve = wp_is_post_autosave($post_id);
        $revision = wp_is_post_revision($post_id);
        
        $nonce = isset($_POST[$nonce]) && wp_verify_nonce($_POST[$nonce], 'wp-action-nonce');
        
        return !($autosve || $revision ) && $nonce;
        
    }
/**
*  for showing pending count in wordpres menu area 
*/
function show_pending_number($menu) {
    $types = array("post", "contact-form", "classes");
    $status = "pending";
    foreach($types as $type) {
        $num_posts = wp_count_posts($type, 'readable');
        $pending_count = 0;
        if (!empty($num_posts->$status)) $pending_count = $num_posts->$status;
 
        if ($type == 'post') {
            $menu_str = 'edit.php';
        } else {
            $menu_str = 'edit.php?post_type=' . $type;
        }
 
        foreach( $menu as $menu_key => $menu_data ) {
            if( $menu_str != $menu_data[2] )
                continue;
            $menu[$menu_key][0] .= " <span class='update-plugins count-$pending_count'><span class='plugin-count'>"
                . number_format_i18n($pending_count)
                . '</span></span>';
        }
    }
    return $menu;
}
add_filter('add_menu_classes', 'show_pending_number');



// second way 
<?php
    function my_custom_meta_box(  ){
       
        add_meta_box('custom-meta', 'Custom Meta', 'my_custom_meta_callback', 'post', 'normal');
    }
add_action('add_meta_boxes', 'my_custom_meta_box');
    function my_custom_meta_callback($post){
        wp_nonce_field('wp-action-nonce', 'wp-name-nonce');
        $html = '<label for="name">';
        $html .='Your Name';
        $html .='</label>';
        $html .= '<input type="text" id="name" name="name" value="'.get_post_meta($post->ID, 'name', true).'">';
        
        $html .= '<label for="email">';
        $html .='Your Emial';
        $html .='</label>';
        $html .= '<input type="email" id="email" name="email">';
        echo $html;
    }
    function my_data_save_post($post_id){
       
        if( cmb_user_can_save_meta_box_data($post_id, 'wp-name-nonce') ){
            if(isset($_POST['name'])){
                $value = stripslashes(strip_tags($_POST['name']));
                update_post_meta($post_id, 'name', $value);
            }
        }
    }
add_action('save_post', 'my_data_save_post');
    function cmb_user_can_save_meta_box_data( $post_id, $nonce ){
        $autosve = wp_is_post_autosave($post_id);
        $revision = wp_is_post_revision($post_id);
        
        $nonce = isset($_POST[$nonce]) && wp_verify_nonce($_POST[$nonce], 'wp-action-nonce');
        
        return !($autosve || $revision ) && $nonce;
        
    }
function display_metabox($content){
    if(is_single()){   // for specific is_page || is_psot || post_type It will be declared
           $html = '';
        $meta_id = get_post_meta(get_the_ID(), 'name', true);
        if(!empty($meta_id)){
            echo $html = 'hi I am displaying: '.$meta_id;
        }
      $content .= $html;
    }
    
    return $content;
    
}
add_action('the_content', 'display_metabox');

