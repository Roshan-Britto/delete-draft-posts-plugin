<?php

namespace DDP\App\Controllers;

defined( 'ABSPATH' ) || exit;

class DeleteDraft
{
    function deleteDraftPost()
    {
        $args = array( 
            'post_type' => 'post' ,
            'post_status' => [ 'draft' , 'trash' ] ,
            'post_per_page' => -1
        ) ;
        $draftPost = get_posts( $args ) ;
        foreach ( $draftPost as $dpost ) 
        {
            wp_delete_post( $dpost->ID, true ) ; 
        }
    }

    function scheduleEvent( )
    {
        if( ! wp_next_scheduled( 'ddp_auto_delete_drafts_event' ) )
        {
            wp_schedule_event( strtotime( get_gmt_from_date( date( 'Y-m-d 10:00:00' ) ) ) , 'daily' , 'ddp_auto_delete_drafts_event' ) ;
        }
    }
}
