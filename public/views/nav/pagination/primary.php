<?php $pagination->display( [
	'leading_zeroes' => true,
	'prev_text'       => $pagination->isLastPage() ? '&larr; Previous' : '',
	'next_text'       => 'Next &rarr;',
	'nav_class'       => 'pagination',
	'title_class'     => 'pagination-title',
	'list_class'      => 'pagination-items',
	'item_class'      => 'pagination-item pagination-item--%s',
	'anchor_class'    => 'pagination-anchor pagination-anchor--%s',
] );