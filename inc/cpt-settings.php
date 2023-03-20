<?php

function cptui_register_my_cpts() {

/**
 * Post Type: Regions.
 */

$labels = [
    "name" => esc_html__( "Regions", "understrap" ),
    "singular_name" => esc_html__( "Region", "understrap" ),
    "menu_name" => esc_html__( "Regions", "understrap" ),
    "all_items" => esc_html__( "All Regions", "understrap" ),
    "add_new" => esc_html__( "Add new", "understrap" ),
    "add_new_item" => esc_html__( "Add new Region", "understrap" ),
    "edit_item" => esc_html__( "Edit Region", "understrap" ),
    "new_item" => esc_html__( "New Region", "understrap" ),
    "view_item" => esc_html__( "View Region", "understrap" ),
    "view_items" => esc_html__( "View Regions", "understrap" ),
    "search_items" => esc_html__( "Search Regions", "understrap" ),
    "not_found" => esc_html__( "No Regions found", "understrap" ),
    "not_found_in_trash" => esc_html__( "No Regions found in trash", "understrap" ),
    "parent" => esc_html__( "Parent Region:", "understrap" ),
    "featured_image" => esc_html__( "Featured image for this Region", "understrap" ),
    "set_featured_image" => esc_html__( "Set featured image for this Region", "understrap" ),
    "remove_featured_image" => esc_html__( "Remove featured image for this Region", "understrap" ),
    "use_featured_image" => esc_html__( "Use as featured image for this Region", "understrap" ),
    "archives" => esc_html__( "Region archives", "understrap" ),
    "insert_into_item" => esc_html__( "Insert into Region", "understrap" ),
    "uploaded_to_this_item" => esc_html__( "Upload to this Region", "understrap" ),
    "filter_items_list" => esc_html__( "Filter Regions list", "understrap" ),
    "items_list_navigation" => esc_html__( "Regions list navigation", "understrap" ),
    "items_list" => esc_html__( "Regions list", "understrap" ),
    "attributes" => esc_html__( "Regions attributes", "understrap" ),
    "name_admin_bar" => esc_html__( "Region", "understrap" ),
    "item_published" => esc_html__( "Region published", "understrap" ),
    "item_published_privately" => esc_html__( "Region published privately.", "understrap" ),
    "item_reverted_to_draft" => esc_html__( "Region reverted to draft.", "understrap" ),
    "item_scheduled" => esc_html__( "Region scheduled", "understrap" ),
    "item_updated" => esc_html__( "Region updated.", "understrap" ),
    "parent_item_colon" => esc_html__( "Parent Region:", "understrap" ),
];

$args = [
    "label" => esc_html__( "Regions", "understrap" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => false,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "rest_namespace" => "wp/v2",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => [ "slug" => "regions", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail" ],
    "show_in_graphql" => false,
];

register_post_type( "regions", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
    

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Region Type.
	 */

	$labels = [
		"name" => esc_html__( "Region Type", "understrap" ),
		"singular_name" => esc_html__( "Region Type", "understrap" ),
		"menu_name" => esc_html__( "Region Types", "understrap" ),
		"all_items" => esc_html__( "All Region Types", "understrap" ),
		"edit_item" => esc_html__( "Edit Region Type", "understrap" ),
		"view_item" => esc_html__( "View Region Type", "understrap" ),
		"update_item" => esc_html__( "Update Region Type name", "understrap" ),
		"add_new_item" => esc_html__( "Add new Region Type", "understrap" ),
		"new_item_name" => esc_html__( "New Region Type name", "understrap" ),
		"parent_item" => esc_html__( "Parent Region Type", "understrap" ),
		"parent_item_colon" => esc_html__( "Parent Region Type:", "understrap" ),
		"search_items" => esc_html__( "Search Region Types", "understrap" ),
		"popular_items" => esc_html__( "Popular Region Types", "understrap" ),
		"separate_items_with_commas" => esc_html__( "Separate Region Types with commas", "understrap" ),
		"add_or_remove_items" => esc_html__( "Add or remove Region Types", "understrap" ),
		"choose_from_most_used" => esc_html__( "Choose from the most used Region Types", "understrap" ),
		"not_found" => esc_html__( "No Region Types found", "understrap" ),
		"no_terms" => esc_html__( "No Region Types", "understrap" ),
		"items_list_navigation" => esc_html__( "Region Types list navigation", "understrap" ),
		"items_list" => esc_html__( "Region Types list", "understrap" ),
		"back_to_items" => esc_html__( "Back to Region Types", "understrap" ),
		"name_field_description" => esc_html__( "The name is how it appears on your site.", "understrap" ),
		"parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "understrap" ),
		"slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "understrap" ),
		"desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "understrap" ),
	];

	
	$args = [
		"label" => esc_html__( "Region Type", "understrap" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'region', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "regions_tax",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "regions_tax", [ "regions" ], $args );

	/**
	 * Taxonomy: Region Locations.
	 */

	$labels = [
		"name" => esc_html__( "Region Locations", "understrap" ),
		"singular_name" => esc_html__( "Region Location", "understrap" ),
		"menu_name" => esc_html__( "Region Locations", "understrap" ),
		"all_items" => esc_html__( "All Region Locations", "understrap" ),
		"edit_item" => esc_html__( "Edit Region Location", "understrap" ),
		"view_item" => esc_html__( "View Region Location", "understrap" ),
		"update_item" => esc_html__( "Update Region Location name", "understrap" ),
		"add_new_item" => esc_html__( "Add new Region Location", "understrap" ),
		"new_item_name" => esc_html__( "New Region Location name", "understrap" ),
		"parent_item" => esc_html__( "Parent Region Location", "understrap" ),
		"parent_item_colon" => esc_html__( "Parent Region Location:", "understrap" ),
		"search_items" => esc_html__( "Search Region Locations", "understrap" ),
		"popular_items" => esc_html__( "Popular Region Locations", "understrap" ),
		"separate_items_with_commas" => esc_html__( "Separate Region Locations with commas", "understrap" ),
		"add_or_remove_items" => esc_html__( "Add or remove Region Locations", "understrap" ),
		"choose_from_most_used" => esc_html__( "Choose from the most used Region Locations", "understrap" ),
		"not_found" => esc_html__( "No Region Locations found", "understrap" ),
		"no_terms" => esc_html__( "No Region Locations", "understrap" ),
		"items_list_navigation" => esc_html__( "Region Locations list navigation", "understrap" ),
		"items_list" => esc_html__( "Region Locations list", "understrap" ),
		"back_to_items" => esc_html__( "Back to Region Locations", "understrap" ),
		"name_field_description" => esc_html__( "The name is how it appears on your site.", "understrap" ),
		"parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "understrap" ),
		"slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "understrap" ),
		"desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "understrap" ),
	];

	
	$args = [
		"label" => esc_html__( "Region Locations", "understrap" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'region_location', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "region_location",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "region_location", [ "regions" ], $args );

	/**
	 * Taxonomy: Categories.
	 */

	$labels = [
		"name" => esc_html__( "Categories", "understrap" ),
		"singular_name" => esc_html__( "Category", "understrap" ),
		"menu_name" => esc_html__( "Categories", "understrap" ),
		"all_items" => esc_html__( "All Categories", "understrap" ),
		"edit_item" => esc_html__( "Edit Category", "understrap" ),
		"view_item" => esc_html__( "View Category", "understrap" ),
		"update_item" => esc_html__( "Update Category name", "understrap" ),
		"add_new_item" => esc_html__( "Add new Category", "understrap" ),
		"new_item_name" => esc_html__( "New Category name", "understrap" ),
		"parent_item" => esc_html__( "Parent Category", "understrap" ),
		"parent_item_colon" => esc_html__( "Parent Category:", "understrap" ),
		"search_items" => esc_html__( "Search Categories", "understrap" ),
		"popular_items" => esc_html__( "Popular Categories", "understrap" ),
		"separate_items_with_commas" => esc_html__( "Separate Categories with commas", "understrap" ),
		"add_or_remove_items" => esc_html__( "Add or remove Categories", "understrap" ),
		"choose_from_most_used" => esc_html__( "Choose from the most used Categories", "understrap" ),
		"not_found" => esc_html__( "No Categories found", "understrap" ),
		"no_terms" => esc_html__( "No Categories", "understrap" ),
		"items_list_navigation" => esc_html__( "Categories list navigation", "understrap" ),
		"items_list" => esc_html__( "Categories list", "understrap" ),
		"back_to_items" => esc_html__( "Back to Categories", "understrap" ),
		"name_field_description" => esc_html__( "The name is how it appears on your site.", "understrap" ),
		"parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "understrap" ),
		"slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "understrap" ),
		"desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "understrap" ),
	];

	
	$args = [
		"label" => esc_html__( "Categories", "understrap" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'region_cat', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "region_cat",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "region_cat", [ "regions" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );