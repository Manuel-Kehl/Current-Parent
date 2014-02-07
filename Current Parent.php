<?php
/*
Plugin Name: Current Parent
Description: Adds the "current" class to the parent of the active navigation list item.
Version: 1.0
Author: Manuel Kehl
Author URI: http://www.manuel-kehl.de
*/

# get correct id for plugin
$thisfile=basename(__FILE__, ".php");

# register plugin
register_plugin(
	$thisfile, //Plugin id
	'Current Parent', 	//Plugin name
	'1.0', 		//Plugin version
	'Manuel Kehl',  //Plugin author
	'http://www.manuel-kehl.de/', //author website
	'Adds the "current" class to the parent of the active navigation list item.', //Plugin description
	'pages', //Page type
	''  //main function (administration) - there is no need for it, as there is no administration backend yet
);

#filter $menuitems
add_filter('menuitems', 'current_parent');


# functions
function current_parent($menuitems) {
  //get the parent of the current page
  $parent=get_parent(false);    
  
  //only go on, if a parent for the current page exists
  if (!empty($parent)) {
    $parenthtml='<li class="'.$parent;
    //add "current" to the list of classes of the parent list item
    $menuitems=str_replace($parenthtml, $parenthtml.' current', $menuitems);    
  }

  return $menuitems;
}

?>