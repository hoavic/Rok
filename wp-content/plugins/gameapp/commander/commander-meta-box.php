<?php

abstract class Gameapp_Commander_Meta_Box {

    public static function add() {
        $screens = [ 'commander'];
        foreach ( $screens as $screen ) {
            add_meta_box(
                'wporg_box_id',          // Unique ID
                'Custom Meta Box Title', // Box title
                [ self::class, 'html' ],   // Content callback, must be of type callable
                $screen                  // Post type
            );
        }
    }

    public static function save( int $post_id ) {
        if ( array_key_exists( 'nickname', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_nickname',
                $_POST['nickname']
            );
        }
        if ( array_key_exists( 'meta_image', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_meta_image',
                $_POST['meta_image']
            );
        }
    }

    public static function html( $post ) {
        $metas = get_post_meta( $post->ID); //var_dump($metas['_meta_image'][0]);
        ?>

        <p class="flex items-center gap-2">
            <label for="nickname">Description for this field</label>
            <input type="text" id="nickname" name="nickname" value="<?php if(isset($metas['_nickname'])) {echo $metas['_nickname'][0];} ?>" />
        </p>

        <p class="flex items-center gap-2">
            <label for="meta_image" class="prfx-row-title"><?php _e( 'Example File Upload', 'prfx-textdomain' )?></label>
            <input type="hidden" name="meta_image" id="meta_image" value="<?php if ( isset ( $metas['_meta_image'] ) ) echo $metas['_meta_image'][0]; ?>" />
            <?php 
                if(isset ( $metas['_meta_image']) ) {
                    $meta_image = json_decode($metas['_meta_image'][0]); //var_dump($meta_image->sizes);
                    if(isset($meta_image->sizes)) {
                        echo '<img class="p-1 w-72 bg-gray-300 rounded-lg" id="meta_image_preview" src="'.$meta_image->sizes->medium->url.'" />'; 
                    }
                } else {
                    echo '<img class="p-1 w-72 min-h-48 bg-gray-300 rounded-lg" id="meta_image_preview" src="" />'; 
                }
            ?>
            <input type="button" id="meta-image-button" class="button" value="<?php _e( 'Select/Change', 'prfx-textdomain' )?>" />
        </p>
        
        <?php
    }

    public static function enqueue() {
        global $typenow;
        if( $typenow == 'commander' ) {
            wp_enqueue_media();
     
            // Registers and enqueues the required javascript.
            wp_register_script( 'meta-box-image', plugin_dir_url( __FILE__ ) . 'js/commander.js', array( 'jquery' ) );
            wp_localize_script( 'meta-box-image', 'meta_image',
                array(
                    'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
                    'button' => __( 'Use this image', 'prfx-textdomain' ),
                )
            );
            wp_enqueue_script( 'meta-box-image' );
        }
    }
}

add_action( 'add_meta_boxes', [ 'Gameapp_Commander_Meta_Box', 'add' ] );
add_action( 'save_post', [ 'Gameapp_Commander_Meta_Box', 'save' ] );
add_action( 'admin_enqueue_scripts', [ 'Gameapp_Commander_Meta_Box', 'enqueue' ] );