<?php

namespace DDP\App ;

defined( 'ABSPATH' ) || exit ;

use DDP\App\Controllers\DeleteDraft;

class Route
{
    function routeFunction()
    {
        $draft = new DeleteDraft();

        add_action( 'ddp_auto_delete_drafts_event' , [ $draft , 'deleteDraftPost' ] ) ;
        register_activation_hook( DDP_PLUGIN_FILE , array( $draft , 'scheduleEvent' ) ) ;
        register_deactivation_hook( DDP_PLUGIN_FILE , 'wp_clear_scheduled_hook' );
    }
}