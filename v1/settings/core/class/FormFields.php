<?php
class FormFields {

	function Checkbox($option) {
	
		$output = NULL;
		
		if (!empty($option['error'])) {
			$output .= '<p>' . $option['error'] . '</p>';
		}
		$output .= '<li class="list-group-item">';
		if (!empty($option['label'])) {
			$output .= $option['label'];
		}
		$output .= '<div class="material-switch pull-right">'
		.'<input ';

		if (!empty($option['id'])) {
			$output .= 'id="'.$option['id'].'" ';
		}
		if (!empty($option['name'])) {
			$output .= 'name="'.$option['name'].'" ';
		}
		if (!empty($option['class'])) {
			$output .= 'class="'.$option['class'].'" ';
		}
		if (!empty($option['data_on_txt'])) {
			$output .= 'data-on="'.$option['data_on_txt'].'" ';
		}
		if (!empty($option['data_off_txt'])) {
			$output .= 'data-off="'.$option['data_off_txt'].'" ';
		}
		if (!empty($option['data_on_style'])) {
			$output .= 'data-onstyle="'.$option['data_on_style'].'" ';
		}
		if (!empty($option['data_off_style'])) {
			$output .= 'data-offstyle="'.$option['data_off_style'].'" ';
		}
		if (!empty($option['checkbox_size'])) {
			$output .= 'data-size="'.$option['checkbox_size'].'" ';
		}
		if (!empty($option['onclick'])) {
			$output .= 'onclick="'.$option['onclick'].'" ';
		}
		if ($option['checked']) {
			$output .= 'checked ';	
		}
			
		$output .= 'type="checkbox" data-toggle="toggle"';
		
		$output .='/>'
		.'</div>'
		.'</li>';
		
		return $output;
		

	}

}
?>