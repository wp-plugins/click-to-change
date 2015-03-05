<?php
/**
* Plugin Main Class
*/
class WCP_Click_to_Change
{
    
    function __construct()
    {
        add_filter( 'the_title', array($this, 'wcp_change_titles') );
        add_filter( 'the_content', array($this, 'wcp_change_contents') );
        add_action( 'wp_enqueue_scripts', array($this, 'wcp_load_script'));
        add_action('wp_ajax_wcp_change_post_database', array($this, 'wcp_change_post_in_db'));
    }

    public function wcp_change_titles($title){
        //only if admin
        if (current_user_can('manage_options') && in_the_loop()){
            $title = '<span contenteditable="true" id="wcp-title">'.$title.'</span>';
        }
        return $title;
    }

    public function wcp_change_contents($content){
        Global $post;
        //only if admin
        if (current_user_can('manage_options') && in_the_loop()){
          $content =  '<div contenteditable="true" id="wcp-content">'.$content.'</div><div class="wcp-click-change"><button id="wcp-save-post" data-id="'.$post->ID.'">Save</button><img src="'.plugin_dir_url( __FILE__ ).'/images/loader.gif"></div>';
        }    
        
        return $content;
    }


    public function wcp_load_script(){
        if (current_user_can('manage_options')){
          wp_enqueue_style( 'click-to-change-css', plugin_dir_url( __FILE__ ) . 'css/style.css');
          wp_enqueue_script( 'wcp-change-post', plugin_dir_url( __FILE__ ) . 'js/admin.js', array('jquery') );
          wp_localize_script( 'wcp-change-post', 'wcpAjax', array( 'url' => admin_url( 'admin-ajax.php' )));
        }
    }

    public function wcp_change_post_in_db(){
        extract($_REQUEST);

        // Sanitizing Fields
        $title = sanitize_post_field( 'post_title', $title, $postid, 'db' );
        $content = sanitize_post_field( 'post_content', $content, $postid, 'db' );

        $the_post = array(
            'ID'           => $postid,
            'post_title' => $title,
            'post_content' => $content,
        );

        // Update the post into the database
        if(wp_update_post($the_post)){
            echo 'Changes Saved!';
        }
        else {
            echo 'Failed!';
        }

        die(0);
    }    
}
?>