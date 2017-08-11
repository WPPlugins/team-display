<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
        exit;
}

delete_option( 'wdo_team_builder_option' );

?>