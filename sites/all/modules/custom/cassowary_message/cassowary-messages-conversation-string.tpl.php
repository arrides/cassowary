<div class="conversation-string">
<?php 

	$view = '<div class="row row-' . $conversation_string['number'] . '">';
	$view .= '<div class="old-conversation-company">';
	if(isset($conversation_string['unread']) && ($conversation_string['unread'] != 0)){
		$view .= '<div class="new">' . $conversation_string['unread'] . '</div>';
	} else {
		$view .= '<div class="not-new">' . 0 . '</div>';
	}	
	
	$view .= '<div class="conversation conversation-' . $conversation_string['con_id'] . '">' . $conversation_string['link'] . '</div>';
	if(isset($conversation_string['company'])){
	  $view .= '<div class="company company-' . $conversation_string['con_id'] . '">' . $conversation_string['company'] . '</div>';
	}
	$view .= '</div>';
	if(isset($conversation_string['hired'])){
		$view .= '<div class="hired hired-' . $conversation_string['number'] . '">' . $conversation_string['hired'] . '</div>';
	}
	
	$view .= '<div class="control-buttons">';
	$view .= '<div class="view-link view-link-' . $conversation_string['number'] . '">' . $conversation_string['link_view'] . '</div>';
	$view .= '<div class="view-link-archive view-link-archive-' . $conversation_string['number'] . '">' . $conversation_string['link_archive'] . '</div>';	
	$view .= '<div class="view-link-delete view-link-delete-' . $conversation_string['number'] . '">' . $conversation_string['link_delete'] . '</div>';
	$view .= '</div></div>';
    print $view; 
?>
</div>