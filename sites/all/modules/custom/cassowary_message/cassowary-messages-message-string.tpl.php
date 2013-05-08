<div class="messages-right-string">
<?php 
	$view = '<div class="row-message row-message-' . $user_message_string['number'] . '">';
	$view .= '<div class="avatar avatar-' . $user_message_string['number'] . '">' . $user_message_string['avatar'] . '</div>';
	$view .= '<div class="name name-' . $user_message_string['number'] . '">' . $user_message_string['author'] . '</div>';
	if(isset($user_message_string['view_profile'])){
		$view .= '<div class="view_profile view_profile-' . $user_message_string['number'] . '">' . $user_message_string['view_profile'] . '</div>';		
	}
	$view .= '<div class="timeago timeago-' . $user_message_string['number'] . '">' . $user_message_string['ago'] . '</div>';
	$view .= '<div class="message message-' . $user_message_string['number'] . '">' . strip_tags($user_message_string['body']) . '</div>';
	$view .= '</div>';
    print $view; 
?>
</div>