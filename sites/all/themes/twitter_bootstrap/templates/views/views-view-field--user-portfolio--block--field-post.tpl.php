<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>
<?php 
  if($row->node_type == "tweet") {
	$tags_list = array();
	$pattern = "/#[0-9A-Za-z_]+/";
	preg_match_all($pattern, $output, $tags_list);
	$result = array_unique($tags_list[0]);
	foreach ($result as $word => $tid) {
		//dsm($result);dsm($word);dsm($tid);
		$output = str_replace($tid, '<span class="tweet-tag">' . $tid . '</span>', $output);	
	}
	print '"' . $output . '"'; 
  }
?>
