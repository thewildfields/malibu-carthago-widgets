<?php

function ___mcw__display_error_message($message){
    $messageContent = esc_html__($message, 'malibu-carthago-widgets');
    echo '<h2>'.$messageContent.'</h2>';
    return;
}