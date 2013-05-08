<div class="search-job-string">
<?php 
	$view = '<div class="row row-' . $job_string['number'] . '">';
	$view .= '<div class="title title-' . $job_string['number'] . '">' . $job_string['title'] . '</div>';
	$view .= '<div class="price price-' . $job_string['number'] . '">' . $job_string['price'] . '</div>';
	$view .= '<div class="description description-' . $job_string['number'] . '">' . $job_string['description'] . '</div>';
	$view .= '<div class="date date-' . $job_string['number'] . '">' . $job_string['created'] . '</div>';
	
	$view .= '</div>';
    print $view; 
?>
</div>