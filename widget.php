<?php
class my_custom_wi_try extends wp_widget{
    function __construct(){
        parent::__construct('my_custom_wi_try', 'My Widget', array('description'=> 'This is my cstom widget'));
    }
    function widget($args, $instance){
        $title = $instance['title'];
        $facebook = $instance['facebook'];
        echo $args['before_widget'].$args['before_title'].$title.$args['after_title'];
        echo "<p>Your Id: ".$facebook.$args['after_widget']."</p>";
    }
    function form($instance){
        $title = $instance['title'];
        $facebook = $instance['facebook'];
?>      
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Title</label></p>
     <p><input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>"
	 name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>"></p>


    <p><label for="<?php echo $this->get_field_id('facebook'); ?>">Title</label></p>
     <p><input class="widefat" type="text" id="<?php echo $this->get_field_id('facebook'); ?>"
	 name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo esc_attr($facebook); ?>"></p>

        <?php
    } 
}
function my_custo_widge_bar(){
    register_widget('my_custom_wi_try');
}
add_action('widgets_init', 'my_custo_widge_bar');
/// professional widget
class opinio_widget extends WP_Widget{
    function __construct(){
        parent::__construct('opinio_widget', 'Openion Widget', array('description' => 'this is your opinion'));
    }
    
    function widget($args, $instance){
           $openion = $instance['title'];
           $company = $instance['company'];
        
            echo $args['before_widget'].$args['before_title'].$openion.$args['after_title'];
            echo "<p>Compnay: ".$company.$args['after_widget']."</p>";
    }
    
    function form($instance){
        if($instance['title']){
            $openion = $instance['title'];
        }else{
            $openion = 'Plese select anything';
        }
        $company = $instance['company'];
        ?>
    
        <p><label for="<?php echo $this->get_field_id('title'); ?>">Title</label></p>
     <p><input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($openion); ?>"></p>


        <p><label for="<?php echo $this->get_field_id('company'); ?>">Title</label></p>
     <p><input class="widefat" type="text" id="<?php echo $this->get_field_id('company'); ?>" name="<?php echo $this->get_field_name('company'); ?>" value="<?php echo esc_attr($company); ?>"></p>

    <?php
        
    }
    
}
    // alter method for decrlaration hook
    add_action('widgets_init', function(){
         register_widget('opinio_widget');
    });
