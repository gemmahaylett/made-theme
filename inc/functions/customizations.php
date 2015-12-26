<?php 
// Remove admin bar for all users
show_admin_bar( false );

// Move ACF Options menu under Settings
//if( function_exists('acf_add_options_sub_page') )
//{
//    acf_add_options_sub_page(array(
//        'title' => __( 'Site Options', 'made-theme' ),
//        'parent' => 'options-general.php',
//        'capability' => 'manage_options'
//    ));
//}

// Add TinyMCE buttons that are disabled by default
function made_theme_mce_buttons_2($buttons) {	
	/**
	 * Add in a core button that's disabled by default
	 */
	$buttons[] = 'justify'; // fully justify text
	$buttons[] = 'hr'; // insert HR

	return $buttons;
}
add_filter('mce_buttons_2', 'made_theme_mce_buttons_2');

function get_category_tags($args) {
  global $wpdb;
  $tags = $wpdb->get_results
  ("
    SELECT DISTINCT terms2.term_id as tag_id, terms2.name as tag_name, null as tag_link
    FROM
      wp_posts as p1
      LEFT JOIN wp_term_relationships as r1 ON p1.ID = r1.object_ID
      LEFT JOIN wp_term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id
      LEFT JOIN wp_terms as terms1 ON t1.term_id = terms1.term_id,

      wp_posts as p2
      LEFT JOIN wp_term_relationships as r2 ON p2.ID = r2.object_ID
      LEFT JOIN wp_term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id
      LEFT JOIN wp_terms as terms2 ON t2.term_id = terms2.term_id
    WHERE
      t1.taxonomy = 'category' AND p1.post_status = 'publish' AND terms1.term_id IN (".$args['categories'].") AND
      t2.taxonomy = 'post_tag' AND p2.post_status = 'publish'
      AND p1.ID = p2.ID
    ORDER by tag_name
  ");
  $count = 0;
  foreach ($tags as $tag) {
    $tags[$count]->tag_link = get_tag_link($tag->tag_id);
    $count++;
  }
  return $tags;
}

if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}

function posts_on_homepage( $query ) {
  if ( $query->is_home() && $query->is_main_query() ) {
      $query->set( 'posts_per_page', 3 );
  }
}
add_action( 'pre_get_posts', 'posts_on_homepage' );

add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );

function my_ajax_pagination() {
  $post_id = json_decode( stripslashes( $_POST['post_id'] ), true );

  //get tag info
  $tags = wp_get_post_tags( $post_id );
  $offset = $_POST['offset'];
  $posts = new WP_Query( array( 'posts_per_page' => 1, 'post__not_in' => array($post_id), 'offset' => $offset, 'tag__in' => array($tags[0]->term_id) ) );
 // $posts = new WP_Query( $query_vars );
  $GLOBALS['wp_query'] = $posts;
  $tag_count = get_posts_count_by_tag($tags[0]->term_id);

  if( $posts->have_posts() ) {
    while ( $posts->have_posts() ) { 
      $posts->the_post();
      get_template_part( 'content', 'related' );
    }
  }

  if($_POST['offset']+1 >= $tag_count ) {
    echo '<div id="show-more-hide"></div>';
  }
  die();
}

function get_posts_count_by_tag($tag_name)
{
    $tags = get_tags(array ('search' => $tag_name) );
    foreach ($tags as $tag) {
      if ($tag->name == $tag_name) {
         return $tag->count;
      }
    }
    return 0;
}

require get_template_directory() . '/inc/init.php';

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

  unset( $tabs['description'] );        // Remove the description tab
  unset( $tabs['reviews'] );      // Remove the reviews tab
  //unset( $tabs['additional_information'] );   // Remove the additional information tab

  return $tabs;

}
?>