<?php
if ( !defined( 'ABSPATH' ) ) exit;

function google_seo_schema_music($text) {
         global $post;
         $prefix = 'google_snippets';
       // Get the Music values for schema
        $google_seo_music_group = get_post_meta( $post->ID, $prefix.'music_group', true );
        $google_seo_track_name = get_post_meta( $post->ID, $prefix.'track_name', true );
        $google_seo_track_length = get_post_meta( $post->ID, $prefix.'track_length', true );
        $google_seo_play_count = get_post_meta( $post->ID, $prefix.'play_count', true );
        $google_seo_play_url = get_post_meta( $post->ID, $prefix.'play_url', true );
        $google_seo_buy_url = get_post_meta( $post->ID, $prefix.'buy_url', true );
        $google_seo_album_name = get_post_meta( $post->ID, $prefix.'album_name', true );
        $google_seo_album_link = get_post_meta( $post->ID, $prefix.'album_link', true );

        $google_seo_schema_music = '';
        $google_seo_schema_music .= '<div itemscope itemtype="http://schema.org/MusicGroup">';
        $google_seo_schema_music .= '<span style="visibility: hidden;">';
        $google_seo_schema_music .= '<h1 itemprop="name">'.$google_seo_music_group.'</h1>';
        $google_seo_schema_music .= '<h2>Songs</h2>
                                     <div itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">';
        $google_seo_schema_music .= '<span itemprop="name">'.$google_seo_track_name.'</span>';
        $google_seo_schema_music .= 'Length: <meta itemprop="duration" content="" />'.$google_seo_track_length.'-'.$google_seo_play_count ;
        $google_seo_schema_music .= '<meta itemprop="interactionCount" content="UserPlays:'.$google_seo_play_count.'"/>';
        $google_seo_schema_music .= '<a href="'.$google_seo_play_url.'" itemprop="audio">Play</a>';
        $google_seo_schema_music .= ' <a href="'.$google_seo_buy_url.'" itemprop="offers">Buy</a>';
        $google_seo_schema_music .= 'From album: <a href="'.$google_seo_album_link.'" itemprop="inAlbum">'.$google_seo_album_name.'</a>
    </div>  '; 
        $google_seo_schema_music .= '<a href="'.$google_seo_album_link.'" itemprop="url">Link</a> </span> </div>';

        return  $text.$google_seo_schema_music;
}

function google_seo_schema_add_music() {
global $post;
$prefix = 'google_snippets';
$google_seo_music_name = get_post_meta( $post->ID, $prefix.'music_group', true );
if( $google_seo_music_name != '' && !is_home() ) {
add_filter( "the_content", "google_seo_schema_music" );
}
}
add_action( 'wp', 'google_seo_schema_add_music' );

