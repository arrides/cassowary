<div class="search-job-string">
<?php
	$view = '<div class="row row-' . $resume_string['number'] . '">';
	$view .= '<div class="avatar avatar-' . $resume_string['number'] . '">' . $resume_string['avatar'] . '</div>';
	$view .= '<div class="location location-' . $resume_string['number'] . '">' . $resume_string['location'] . '</div>';	
	$view .= '<div class="title title-' . $resume_string['number'] . '">' . $resume_string['name'] . '</div>';

	$view .= '<div class="specialization specialization-' . $resume_string['number'] . '">' . $resume_string['specialization'] . '</div>';
	$view .= '<div class="bio bio-' . $resume_string['number'] . '">' . $resume_string['bio'] . '</div>';
	$view .= '<div class="contact_me contact_me-' . $resume_string['number'] . '">' . $resume_string['contact_me'] . '</div>';
	/*$view .= '<div class="price price-' . $resume_string['number'] . '">' . $resume_string['price'] . '</div>';
	$view .= '<div class="description description-' . $resume_string['number'] . '">' . $resume_string['description'] . '</div>';
	$view .= '<div class="date date-' . $resume_string['number'] . '">' . $resume_string['created'] . '</div>';*/
	
	$view .= '</div>';
    print $view; 
?>
</div>