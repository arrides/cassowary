<div class="messages-left-string">
<?php 
	$view = '<div class="row row-' . $user_string['number'] . ' ' . $user_string['addclass'] . '">';
	$view .= '<div class="avatar avatar-' . $user_string['number'] . '">' . $user_string['avatar'] . '</div>';
	$view .= '<div class="name name-' . $user_string['number'] . '">' . $user_string['link'] . '</div>';
	
	$view .= '</div>';
    print $view; 
?>
</div>