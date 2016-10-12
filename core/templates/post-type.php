<?php

class PostType{

	public function __construct($singular, $plural, $text_domain)
	{
		//get file content
		$content = $this->generate_post_type($singular, $plural, $text_domain);

		//create file
		$this->generate_file($singular, $content);

		//add file to loader.php
		$this->include_file($singular);
	}

	protected function include_file($filename)
	{
		$loader = fopen("loader.php", "a");
		fwrite($loader, "require_once('includes/$filename.php');\n");
		fclose($loader);
	}

	protected function generate_file($filename, $content)
	{
		$file = fopen("includes/$filename.php", "w");
		fwrite($file, $content);
		fclose($file);
	}

	protected function generate_post_type($singular, $plural, $text_domain)
	{
		//just return the file content
		return '<?php
// Register '.$singular.' Post Type
function '.$singular.'_post_type() {

	$labels = array(
		"name"                  => __( "'.ucwords($plural).'", "'.$text_domain.'" ),
		"singular_name"         => __( "'.ucwords($singular).'", "'.$text_domain.'" ),
		"menu_name"             => __( "'.ucwords($plural).'", "'.$text_domain.'" ),
		"name_admin_bar"        => __( "'.ucwords($singular).'", "'.$text_domain.'" ),
		"archives"              => __( "Item Archives", "'.$text_domain.'" ),
		"parent_item_colon"     => __( "Parent Item:", "'.$text_domain.'" ),
		"all_items"             => __( "All Items", "'.$text_domain.'" ),
		"add_new_item"          => __( "Add New Item", "'.$text_domain.'" ),
		"add_new"               => __( "Add New", "'.$text_domain.'" ),
		"new_item"              => __( "New Item", "'.$text_domain.'" ),
		"edit_item"             => __( "Edit Item", "'.$text_domain.'" ),
		"update_item"           => __( "Update Item", "'.$text_domain.'" ),
		"view_item"             => __( "View Item", "'.$text_domain.'" ),
		"search_items"          => __( "Search Item", "'.$text_domain.'" ),
		"not_found"             => __( "Not found", "'.$text_domain.'" ),
		"not_found_in_trash"    => __( "Not found in Trash", "'.$text_domain.'" ),
		"featured_image"        => __( "Featured Image", "'.$text_domain.'" ),
		"set_featured_image"    => __( "Set featured image", "'.$text_domain.'" ),
		"remove_featured_image" => __( "Remove featured image", "'.$text_domain.'" ),
		"use_featured_image"    => __( "Use as featured image", "'.$text_domain.'" ),
		"insert_into_item"      => __( "Insert into item", "'.$text_domain.'" ),
		"uploaded_to_this_item" => __( "Uploaded to this item", "'.$text_domain.'" ),
		"items_list"            => __( "Items list", "'.$text_domain.'" ),
		"items_list_navigation" => __( "Items list navigation", "'.$text_domain.'" ),
		"filter_items_list"     => __( "Filter items list", "'.$text_domain.'" ),
	);
	$args = array(
		"label"                 => __( "'.ucwords($singular).'", "'.$text_domain.'" ),
		"description"           => __( "'.ucwords($singular).' Description", "'.$text_domain.'" ),
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
	register_post_type( "'.$singular.'", $args );

}
add_action( "init", "'.$singular.'_post_type", 0 );
';
	}
}