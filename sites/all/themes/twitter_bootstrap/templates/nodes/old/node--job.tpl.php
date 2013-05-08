<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<div class=node-inner>

  <div class="node-header">
    <?php print render($title_prefix); ?>    
    
    <?php if (!$page && $title): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php if ($display_submitted): ?>
      <span class="submitted">
        <?php print $user_picture; ?>
        <?php print $submitted; ?>
      </span>
    <?php endif; ?>
  </div>

  <?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
    //dsm($node);
    
    //print render($content);
    print '<div class="title-price">';
    print '<div class="node-title">' . $node->title . '</div>';
    print '<div class="price">' . render(field_view_field("node", $node, "field_price")) . '</div>';
    print '</div>';
    print '<div class="company-location-created"><ul>';
    print '<li class="company">' .  render(field_view_field("node", $node, "field_company")) . '</li>';
    print '<li class="location">' .  render(field_view_field("node", $node, "field_location")) . '</li>';
    if (isset($node->created)){

     $difference = time() - $node->created;
     $ago = format_interval($difference, 1) . t(" ago");
     print '<li class="created">' .  $ago . '</li>';
    }
    print '</ul></div>';
    print '<div class="node-description">' . render(field_view_field("node", $node, "field_description")) . '</div>';
    
  ?>

  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
    <div class="node-footer">
      <?php print render($content['field_tags']); ?>
      <?php print render($content['links']); ?>
    </div>
  <?php endif; ?>

  <?php print render($content['comments']); ?>
</div>
</article> <!-- /.node -->
