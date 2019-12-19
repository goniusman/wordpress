// js file 
(fucntion($){
     $(document).ready(function(){

            wp.customize('first_test', function(value){
                value.bind(function(to){
                    $('h1').text(to);
                });
            });
    
            wp.customize('color_select', function(value){
                value.bind(function(to){
                    $('h1').css('color', to);
                })
            })
    
    
            wp.customize('copyright_sel', function(value){
                value.bind(function(){
                    false === 'copyright_sel' ? $('h1').hide() : $('h1').show();
                })
            })
    
    
    })
 })(Jquery)


<?php
	// functions file
	//require get_template_directory().'/inc/admin.php';
	//require get_template_directory().'/inc/enqueue.php';
    //require get_template_directory().'/inc/theme-support.php';
    //require get_template_directory().'/inc/custom-theme.php';
        function my_own_customize_api($havejave){
                //text 
            $havejave->add_section('first_section', array(
                'title' => 'Osman fires',
                'priority' => 10
            ));
            
            $havejave->add_setting('first_test', array(
                'default' => 'My name is osman',
                'transport' => 'postMessage'
            ));
            $havejave->add_control('first_test', array(
                'section' => 'first_section',
                'label' => 'Type mor num',
                'type' => 'text'
            ));
                // load picture
            $havejave->add_setting('load_picture', array(
                'default' => '',
                'transport' => 'refresh'
            ));
            $havejave->add_control(
                new Wp_Customize_Image_Control($havejave, 'load_picture', array(
                    'section' => 'first_section',
                    'label' => 'Upload',
                    'settings' => 'load_picture'
                )
            ));
            
            // color customize 
            $havejave->add_section('color_section', array(
                'title' => 'Color Secting',
                'priority' => 20
            ));
            $havejave->add_setting('color_select', array(
                'default' => 'green',
                'transport' => 'postMessage',
            ));
            $havejave->add_control(
            new Wp_Customize_Color_Control($havejave, 'color_select', array(
                'section' => 'color_section',
                'label' => 'Change ',
                'settings' => 'color_select'
              )
            ));
            
            
            $havejave->add_section('Copyright', array(
                'title' => 'Visibility',
                'priority' => 10
            ));
            $havejave->add_setting('copyright_sel', array(
                'default' => true,
                'transport' => 'postMessage'
            ));
            $havejave->add_control('copyright_sel', array(
                'section' => 'Copyright',
                'label' => 'Check Box',
                'type' => 'Checkbox'
            ));
            
            
            
        }
add_action('customize_register', 'my_own_customize_api');
function my_function_style(){?>
    <style type="text/css">
        h1{
            color: <?php echo get_theme_mod('color_select'); ?>;
        }
</style>
    <?php
}
add_action('wp_head', 'my_function_style');
        // for jquier enquei
function my_js_file(){
    wp_enqueue_script('customize', get_template_directory_uri(). '/js/customizeapi.js', array('jquery', 'customize-preview'));
}
add_action('customize_preview_init','my_js_file');
