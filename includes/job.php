<?php
// Register job Post Type
function job_post_type() {

	$labels = array(
		"name"                  => __( "Jobs", "themediatix" ),
		"singular_name"         => __( "Job", "themediatix" ),
		"menu_name"             => __( "Jobs", "themediatix" ),
		"name_admin_bar"        => __( "Job", "themediatix" ),
		"archives"              => __( "Item Archives", "themediatix" ),
		"parent_item_colon"     => __( "Parent Item:", "themediatix" ),
		"all_items"             => __( "All Items", "themediatix" ),
		"add_new_item"          => __( "Add New Item", "themediatix" ),
		"add_new"               => __( "Add New", "themediatix" ),
		"new_item"              => __( "New Item", "themediatix" ),
		"edit_item"             => __( "Edit Item", "themediatix" ),
		"update_item"           => __( "Update Item", "themediatix" ),
		"view_item"             => __( "View Item", "themediatix" ),
		"search_items"          => __( "Search Item", "themediatix" ),
		"not_found"             => __( "Not found", "themediatix" ),
		"not_found_in_trash"    => __( "Not found in Trash", "themediatix" ),
		"featured_image"        => __( "Featured Image", "themediatix" ),
		"set_featured_image"    => __( "Set featured image", "themediatix" ),
		"remove_featured_image" => __( "Remove featured image", "themediatix" ),
		"use_featured_image"    => __( "Use as featured image", "themediatix" ),
		"insert_into_item"      => __( "Insert into item", "themediatix" ),
		"uploaded_to_this_item" => __( "Uploaded to this item", "themediatix" ),
		"items_list"            => __( "Items list", "themediatix" ),
		"items_list_navigation" => __( "Items list navigation", "themediatix" ),
		"filter_items_list"     => __( "Filter items list", "themediatix" ),
	);
	$args = array(
		"label"                 => __( "Job", "themediatix" ),
		"description"           => __( "Job Description", "themediatix" ),
		"labels"                => $labels,
		"supports"              => array( ),
		"taxonomies"            => array( "category", "post_tag" ),
		"hierarchical"          => false,
		"public"                => true,
		"show_ui"               => true,
		"show_in_menu"          => true,
		"menu_position"         => 5,
		"show_in_admin_bar"     => true,
		"show_in_nav_menus"     => true,
		"can_export"            => true,
		"has_archive"           => true,		
		"exclude_from_search"   => false,
		"publicly_queryable"    => true,
		"capability_type"       => "page",
	);
	register_post_type( "job", $args );

}
add_action( "init", "job_post_type", 0 );
