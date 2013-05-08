<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php
// bad way
$mapping_array = array(
    0 => ' node-blog-post',
    1 => ' node-article',
    2 => ' node-facebook-post',
    3 => ' node-tweet',
    );
 foreach($view->result as $id => $row) {
   $classes_array[$id] .= $mapping_array[$row->field_field_job_type[0]['raw']['value']];
 }
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <div <?php if ($classes_array[$id]) { print 'class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
