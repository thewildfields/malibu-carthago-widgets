<?php 

function ___mcw__filter_out_vans_terms( $item ) {
    return str_contains( strtolower($item), 'vans' );
}

