<?php
if ( !defined( 'ABSPATH' ) ) exit;

function google_seo_schema_people($text) {
         global $post;
         $prefix = 'google_snippets';
       // Get the product values for schema
        $google_seo_people_name          = get_post_meta( $post->ID, $prefix.'people_name', true );
        $google_seo_people_nick_name     = get_post_meta( $post->ID, $prefix.'people_nick_name', true );
        $google_seo_people_home_page_url = get_post_meta( $post->ID, $prefix.'people_home_page_url', true );
        $google_seo_people_street_address= get_post_meta( $post->ID, $prefix.'people_street_address', true );
        $google_seo_peoeple_locality     = get_post_meta( $post->ID, $prefix.'peoeple_locality', true );
        $google_seo_people_region        = get_post_meta( $post->ID, $prefix.'people_region', true );
        $google_seo_people_postal_code   = get_post_meta( $post->ID, $prefix.'people_postal_code', true );
        $google_seo_people_title         = get_post_meta( $post->ID, $prefix.'people_title', true );
        $google_seo_people_affliation    = get_post_meta( $post->ID, $prefix.'people_affliation', true );
        $google_seo_people_friend_name   = get_post_meta( $post->ID, $prefix.'people_friend_name', true );
        $google_seo_people_friend_url    = get_post_meta( $post->ID, $prefix.'people_friend_url', true );

        $google_seo_schema_people = '';
        $google_seo_schema_people .= '<div itemscope itemtype="http://data-vocabulary.org/Person">';
        $google_seo_schema_people .= '<span style="visibility: hidden;">';
        $google_seo_schema_people .= 'My name is <span itemprop="name">'.$google_seo_people_name.'</span>, ';
        $google_seo_schema_people .= 'but people call me <span itemprop="nickname">'.$google_seo_people_nick_name.'</span>.
  Here is my homepage: ';
        $google_seo_schema_people .= '<a href="'.$google_seo_people_home_page_url.'" itemprop="url">'.$google_seo_people_home_page_url.'</a>. My Website ';
        $google_seo_schema_people .= '<span itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">';
        $google_seo_schema_people .= '<span itemprop="locality">'.$google_seo_peoeple_locality.'</span>, ';
        $google_seo_schema_people .= '<span itemprop="region">'.$google_seo_people_region.'</span>  </span>';
        $google_seo_schema_people .= 'and work as an <span itemprop="title">'.$google_seo_people_title.'</span>';
        $google_seo_schema_people .= 'at <span itemprop="affiliation">'.$google_seo_people_affliation.'</span>.My friends:';
        $google_seo_schema_people .= '<a href="'.$google_seo_people_friend_url.'" rel="friend">'.$google_seo_people_friend_name.'</a>        </span>
</div>';

return $text.$google_seo_schema_people;
}

function google_seo_schema_add_people() {
global $post;
$prefix = 'google_snippets';
$google_seo_people_name = get_post_meta( $post->ID, $prefix.'people_name', true );
if( $google_seo_people_name != '' && !is_home() ) {
add_filter( "the_content", "google_seo_schema_people" );
}
}
add_action( 'wp', 'google_seo_schema_add_people' );


?>