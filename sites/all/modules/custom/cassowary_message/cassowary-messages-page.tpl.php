<div class="header-top"
	<?php print $header; ?>
</div>
<div class="content-wrapper">
	<div class="search-messages-left">
	<?php print $left; ?>
	</div>
	<div class="search-messages-middle">
	<?php 
	  print $middle;
	  print $pager;
	?>
	</div>
	<div class="search-messages-rigth">
	<?php if(isset($right)) print $right; ?>
	</div>
</div>