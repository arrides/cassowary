<div class="search-resume-left">
<?php print $left; ?>
</div>
<div class="search-resume-middle">
<?php 
  print '<div class="show_result">' . $show_result . '<div class="pager_count">' . $pager_count. '</div></div>';
  print '<div class="sort_by">' . $sort_by . '<div class="pager_top">' . $pager . '</div></div>';;  
  print $middle;
  print $pager;
?>
</div>
<div class="search-resume-rigth">
<?php if(isset($right)) print $right; ?>
</div>
