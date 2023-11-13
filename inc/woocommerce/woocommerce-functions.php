<?php

/**
* Hide Added to Cart message in Woocommerce
*/
add_filter( 'wc_add_to_cart_message_html', '__return_false' );

