<?php
add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){

//Theme Shortname
$shortname = "dt";


//Populate the options array
global $dt_options;
$dt_options = get_option('of_options');


//Access the WordPress Pages via an Array
$dt_pages = array();
$dt_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($dt_pages_obj as $dt_page) {
$dt_pages[$dt_page->ID] = $dt_page->post_name; }
$dt_pages_tmp = array_unshift($dt_pages, "Select a page:"); 
$dt_pagerep = str_replace("-", " ",  $dt_pages);

//Access the WordPress Categories via an Array
$dt_slug = array();  
$dt_categories_obj = get_categories('hide_empty=0');
foreach ($dt_categories_obj as $dt_cat) {
$dt_slug[$dt_cat->cat_ID] = $dt_cat->slug;}
$categories_tmp = array_unshift($dt_slug, "Select a category:");

/*
 * Site Options Panel
 */
$options = array(); // do not delete this line - sky will fall

//Map type
$tt_maptype = array (
'TERRAIN',
'HYBRID',
'SATELLITE',
'ROADMAP'
);

$tt_zoom = range(1,50);

//Achive/Category Layout
$tt_layout = array (
'archive-1columns' => '1columns.png',
'archive-2columns' => '2columns.png',
'archive-3columns' => '3columns.png'
);


//Theme Color
$tt_themecol = array (
'peterriver' => 'peterriver.png',
'red' => 'red.png',
'nephritis' => 'nephritis.png',
'wisteria' => 'wisteria.png',
'pink' => 'pink.png',
);

/* Google webfont array list */
require 'googlewebfont.php';

/* Option Page - General */	
$options[] = array( "name" => __('General','dubstrap'),
			"type" => "heading");
			
$options[] = array("name" => __('Site Logo','dubstrap'),
			"desc" => "upload your site logo",
			"id" => $shortname."_sitelogo",
			"type" => "upload");

$options[] = array("name" => __('Favicon','dubstrap'),
			"desc" => "upload you favicon.ico here",
			"id" => $shortname."_favicon",
			"type" => "upload");
			
$options[] = array("name" => __('Pageload Option','dubstrap'),
			"desc" => "check the box if you want to use the pageloader",
			"id" => $shortname."_pageload",
			"std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => __('Theme Color','dubstrap'),
			"desc" => __('Choose Base color','dubstrap'),
			"id" => $shortname."_themecol",
			"std" => "nephritis",
			"type" => "images",
			"options" => $tt_themecol );
			
/* Option Page - General */	
$options[] = array( "name" => __('Typhography','dubstrap'),
			"type" => "heading");
			
$options[] = array("name" => __('Heading Fonts','dubstrap'),
			"desc" => "Heading font-family",
			"id" => $shortname."_heading",
			"type" => "select",
			"std" => "Raleway",
			"options" => $tt_fonts);
			
$options[] = array("name" => __('Heading Letter Spacing','dubstrap'),
			"desc" => "Letter spacing for Heading",
			"id" => $shortname."_hlspacing",
			"type" => "text",
			"std" => "0px");
			
$options[] = array("name" => __('Navigation Menu Fonts','dubstrap'),
			"desc" => "navigation menu font-family",
			"id" => $shortname."_navfont",
			"type" => "select",
			"std" => "Raleway",
			"options" => $tt_fonts);

$options[] = array("name" => __('Navigation Menu Font Size','dubstrap'),
			"desc" => "Font Size for Navigation Menu",
			"id" => $shortname."_navfsize",
			"type" => "text",
			"std" => "");
			
$options[] = array("name" => __('Navigation Menu Letter Spacing','dubstrap'),
			"desc" => "Letter spacing for Navigation Menu",
			"id" => $shortname."_navspacing",
			"type" => "text",
			"std" => "0px");
			
$options[] = array("name" => __('Paragraph/Body Fonts','dubstrap'),
			"desc" => "Paragraph/body font-family",
			"id" => $shortname."_par",
			"type" => "select",
			"std" => "Lato",
			"options" => $tt_fonts);
/*			
$options[] = array("name" => __('Paragraph/Body Font Size','dubstrap'),
			"desc" => "Font Size for Paragraph/Body",
			"id" => $shortname."_pfsize",
			"type" => "text",
			"std" => "");
			
$options[] = array("name" => __('Paragraph/Body Spacing','dubstrap'),
			"desc" => "linespacing for paragraph/body",
			"id" => $shortname."_pbspacing",
			"type" => "text",
			"std" => "0px");
*/	
			
/* Option Page 	- Social Links */
$options[] = array( "name" => __('Social Links','dubstrap'),
			"type" => "heading");

$options[] = array( "name" => __('Facebook','dubstrap'),
			"desc" => __('Facebook Profile/Page Link','dubstrap'),
			"id" => $shortname."_facebook",
			"std" => "ryanhidajat",
			"type" => "text");	

$options[] = array( "name" => __('Twitter','dubstrap'),
			"desc" => __('Twitter Profile Username','dubstrap'),
			"id" => $shortname."_twitter",
			"std" => "ryanhidajat",
			"type" => "text");	
			
$options[] = array( "name" => __('Linkedin','dubstrap'),
			"desc" => __('Linkedin Full URL Link Profile','dubstrap'),
			"id" => $shortname."_linkedin",
			"std" => "http://www.linkedin.com/in/ryanhidajat",
			"type" => "text");
			
$options[] = array( "name" => __('Dribbble','dubstrap'),
			"desc" => __('Dribbble Full URL Link Profile','dubstrap'),
			"id" => $shortname."_dribbble",
			"std" => "http://www.dribbble.com",
			"type" => "text");	
			
$options[] = array( "name" => __('Google+','dubstrap'),
			"desc" => __('Google+ Full URL Link Profile','dubstrap'),
			"id" => $shortname."_gplus",
			"std" => "https://plus.google.com/106037309636687484460",
			"type" => "text");

$options[] = array( "name" => __('Pinterest','dubstrap'),
			"desc" => __('Pinterest Profile','dubstrap'),
			"id" => $shortname."_pinterest",
			"std" => "ryanhidajat",
			"type" => "text");	

$options[] = array( "name" => __('Flickr','dubstrap'),
			"desc" => __('Flickr Full URL Link Profile','dubstrap'),
			"id" => $shortname."_flickr",
			"std" => "http://flickr.com",
			"type" => "text");	

$options[] = array( "name" => __('Youtube','dubstrap'),
			"desc" => __('Youtube Profile','dubstrap'),
			"id" => $shortname."_youtube",
			"std" => "ryanhidajat",
			"type" => "text");

$options[] = array( "name" => __('Vimeo','dubstrap'),
			"desc" => __('Vimeo Full URL Link Profile','dubstrap'),
			"id" => $shortname."_vimeo",
			"std" => "http://vimeo.com",
			"type" => "text");	

$options[] = array( "name" => __('Dropbox','dubstrap'),
			"desc" => __('Dropbox Full URL Link Profile','dubstrap'),
			"id" => $shortname."_dropbox",
			"std" => "http://dropbox.com",
			"type" => "text");			

$options[] = array( "name" => __('Github','dubstrap'),
			"desc" => __('Github Profile Username','dubstrap'),
			"id" => $shortname."_github",
			"std" => "ryanhidajat",
			"type" => "text");		

$options[] = array( "name" => __('Tumblr','dubstrap'),
			"desc" => __('Tumblr Full URL Link Profile','dubstrap'),
			"id" => $shortname."_tumblr",
			"std" => "http://tumblr.com",
			"type" => "text");	

$options[] = array( "name" => __('Instagram','dubstrap'),
			"desc" => __('Instagram Full URL Link Profile','dubstrap'),
			"id" => $shortname."_instagram",
			"std" => "http://instagram.com",
			"type" => "text");			
		

/* Option Page  - Contact */
$options[] = array( "name" => __('Contact & Map','dubstrap'),
			"type" => "heading");
			
$options[] = array( "name" => __('Address','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_mapaddr",
			"std" => "13/2 Elizabeth Street",
			"type" => "text");
			
$options[] = array( "name" => __('Province/State/City','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_mapprov",
			"std" => "Melbourne VIC 3000",
			"type" => "text");
			
$options[] = array( "name" => __('Country','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_mapcountry",
			"std" => "Australia",
			"type" => "text");

$options[] = array( "name" => __('Map Style','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_maptype",
			"std" => "TERRAIN",		
			"type" => "select",
			"options" => $tt_maptype);
			
$options[] = array( "name" => __('Scrollable','dubstrap'),
			"desc" => __('check the box to enable to scrolling on the map.','dubstrap'),
			"id" => $shortname."_mapscroll",
			"std" => "false",		
			"type" => "checkbox");
			
$options[] = array( "name" => __('Map Zoom Level','dubstrap'),
			"desc" => __('inpute numbers from 1-50','dubstrap'),
			"id" => $shortname."_mapzoom",
			"std" => "18",
			"type" => "select",
			"options" => $tt_zoom);
			 
$options[] = array( "name" => __('Email','dubstrap'),
			"desc" => __('email','dubstrap'),
			"id" => $shortname."_footmail",
			"std" => "your@email.com",
			"type" => "text");
			
$options[] = array( "name" => __('Phone','dubstrap'),
			"desc" => __('phone','dubstrap'),
			"id" => $shortname."_footphone",
			"std" => "+62 (0) 1234 56789",
			"type" => "text");			
			
/* Option Page 	- Archive/Category */
$options[] = array( "name" => __('Archive Layout','dubstrap'),
			"type" => "heading");

$options[] = array( "name" => __('Archive Layout','dubstrap'),
			"desc" => __('choose Layout for Archive/Category pages','dubstrap'),
			"id" => $shortname."_layout",
			"std" => "3columns",
			"type" => "images",
			"options" => $tt_layout );

			
/* Option Page 	- Google Analytics */
$options[] = array( "name" => __('Google Analytics','dubstrap'),
			"type" => "heading");

$options[] = array( "name" => __('Tracking ID','dubstrap'),
			"desc" => __('Google Analytics Tracking ID<br>Sample <code>UA-1234567-89</code>','dubstrap'),
			"id" => $shortname."_gaid",
			"std" => "",
			"type" => "text");
						
/* Option Page  - Footer */	

$options[] = array( "name" => __('Footer','dubstrap'),
			"type" => "heading");
						
$options[] = array( "name" => __('Adress','dubstrap'),
			"desc" => __('Adress','dubstrap'),
			"id" => $shortname."_addr",
			"std" => "PO Box 0000 Proxy, North Pole",
			"type" => "text");
			
$options[] = array( "name" => __('Footer Copyright Text','dubstrap'),
			"desc" => __('text on footer copyright','dubstrap'),
			"id" => $shortname."_footcopy",
			"std" => "Developed by <a href='http://twitter.com/ryanhidajat'>Ryan Hidajat</a> and <a href='http://dubstrap.com'>dubstrap</a> Team",
			"type" => "textarea");


update_option('of_template',$options); 					  
update_option('of_shortname',$shortname);

}
}
?>