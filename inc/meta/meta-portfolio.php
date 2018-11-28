<?php
/**
 * The file is for creating the portfolio post type meta.
 * Meta output is defined on the portfolio single editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */

add_action('add_meta_boxes', 'bean_metabox_portfolio');
function bean_metabox_portfolio(){

$prefix = '_bean_';



/*===================================================================*/
/*  PORTFOLIO FORMAT SETTINGS
/*===================================================================*/
$meta_box = array(
    'id' => 'portfolio-type',
    'title' =>  esc_html__('Portfolio Format', '@@textdomain'),
    'description' => esc_html__('', '@@textdomain'),
    'page' => 'portfolio',
    'context' => 'side',
    'priority' => 'core',
    'fields'   => array(
        array(
            'name' => esc_html__('Gallery','@@textdomain'),
            'desc' => esc_html__('','@@textdomain'),
            'id' => $prefix.'portfolio_type_gallery',
            'type' => 'checkbox',
            'std' => true
            ),
        array(
            'name' => esc_html__('Video','@@textdomain'),
            'desc' => esc_html__('','@@textdomain'),
            'id' => $prefix.'portfolio_type_video',
            'type' => 'checkbox',
            'std' => false
            ),
    )
);
bean_add_meta_box( $meta_box );



/*===================================================================*/
/*  PORTFOLIO META SETTINGS
/*===================================================================*/
$meta_box = array(
    'id' => 'portfolio-meta',
    'title' =>  esc_html__('Portfolio Settings', '@@textdomain'),
    'description' => esc_html__('', '@@textdomain'),
    'page' => 'portfolio',
    'context' => 'normal',
    'priority' => 'high',
    'fields'   => array(
        array(
            'name' => esc_html__('Gallery Images:','@@textdomain'),
            'desc' => esc_html__('Upload, reorder and caption the post gallery.','@@textdomain'),
            'id' => $prefix .'portfolio_upload_images',
            'type' => 'images',
            'std' => esc_html__('Browse & Upload', '@@textdomain')
            ),
        array(
            'name'     => esc_html__('Date:', '@@textdomain'),
            'id' => $prefix.'portfolio_date',
            'type' => 'checkbox',
            'desc' => esc_html__('Display the date.', '@@textdomain'),
            'std' => false
            ),
        array(
            'name' => esc_html__('Views:', '@@textdomain'),
            'id' => $prefix.'portfolio_views',
            'type' => 'checkbox',
            'desc' => esc_html__('Display the view count.', '@@textdomain'),
            'std' => false
            ),
        array(
            'name' => esc_html__('Categories:', '@@textdomain'),
            'id' => $prefix.'portfolio_cats',
            'type' => 'checkbox',
            'desc' => esc_html__('Display the portfolio categories.', '@@textdomain'),
            'std' => false
            ),
        array(
            'name' => esc_html__('Tags:', '@@textdomain'),
            'id' => $prefix.'portfolio_tags',
            'type' => 'checkbox',
            'desc' => esc_html__('Display the portfolio tags.', '@@textdomain'),
            'std' => false
            ),
        array(
            'name' => esc_html__('Role:','@@textdomain'),
            'desc' => esc_html__('Display the role.','@@textdomain'),
            'id' => $prefix.'portfolio_role',
            'type' => 'text',
            'std' => ''
            ),
        array(
            'name' => esc_html__('Client:','@@textdomain'),
            'desc' => esc_html__('Display the client meta.','@@textdomain'),
            'id' => $prefix.'portfolio_client',
            'type' => 'text',
            'std' => ''
            ),
        array(
            'name' => esc_html__('URL:','@@textdomain'),
            'desc' => esc_html__('Display a URL to link to.','@@textdomain'),
            'id' => $prefix.'portfolio_url',
            'type' => 'text',
            'std' => ''
            ),
        array(
            'name' => esc_html__('External URL:','@@textdomain'),
            'desc' => esc_html__('Link this portfolio post to an external URL. For example, link this post to your Behance portfolio post.','@@textdomain'),
            'id' => $prefix.'portfolio_external_url',
            'type' => 'text',
            'std' => ''
            ),
    )
);
bean_add_meta_box( $meta_box );




/*===================================================================*/
/*  VIDEO POST FORMAT SETTINGS
/*===================================================================*/
$meta_box = array(
    'id' => 'bean-meta-box-portfolio-video',
    'title' => esc_html__('Video Settings', '@@textdomain'),
    'page' => 'portfolio',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => esc_html__('Lightbox Embed URL:', '@@textdomain'),
            'desc' => esc_html__('Insert your embeded URL to play in the blogroll grid pages.', '@@textdomain'),
            'id' => $prefix . 'portfolio_embed_url',
            'type' => 'text',
            'std' => ''
            ),
        array(
            'name' => esc_html__('Embed 1:', '@@textdomain'),
            'desc' => esc_html__('Insert your embeded code here.', '@@textdomain'),
            'id' => $prefix . 'portfolio_embed_code',
            'type' => 'textarea',
            'std' => ''
            ),
        array(
            'name' => esc_html__('Embed 2:', '@@textdomain'),
            'desc' => esc_html__('Insert your embeded code here.', '@@textdomain'),
            'id' => $prefix . 'portfolio_embed_code_2',
            'type' => 'textarea',
            'std' => ''
            ),
        array(
            'name' => esc_html__('Embed 3:', '@@textdomain'),
            'desc' => esc_html__('Insert your embeded code here.', '@@textdomain'),
            'id' => $prefix . 'portfolio_embed_code_3',
            'type' => 'textarea',
            'std' => ''
            ),
        array(
            'name' => esc_html__('Embed 4:', '@@textdomain'),
            'desc' => esc_html__('Insert your embeded code here.', '@@textdomain'),
            'id' => $prefix . 'portfolio_embed_code_4',
            'type' => 'textarea',
            'std' => ''
            ),
        array(
            'name' => esc_html__('Video Shortcodes:', '@@textdomain'),
            'desc' => __('Insert any <a target="_blank" href="https://codex.wordpress.org/Video_Shortcode">video shortcodes</a> here.', '@@textdomain'),
            'id' => $prefix . 'portfolio_video_shortcodes',
            'type' => 'textarea',
            'std' => ''
            ),
    ),

);
bean_add_meta_box( $meta_box );
} // END function bean_metabox_portfolio()