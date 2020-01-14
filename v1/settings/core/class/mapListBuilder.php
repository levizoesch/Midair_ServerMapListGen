<?php

class mapListBuilder {
	
	private $Title;

	function __construct() {
		
		$this->FormFields = new FormFields();
		$this->mapList = new mapList();
		
		$this->Midair_Logo = 'logo.png';
		$this->Midair_LogoLocation = BASE_URL . IMG_DIR;
		/*
		* Web Page - Title
		*/
		$this->Title = 'Midair: Maplist Builder';
		
	}

	function submit() {
	
		if (!empty($_POST)) {
			return 'Success';	
		}
		else {
			return 'Submission Failed.';	
		}
		
	}

	function buildPage($html_body) {
		
		$html = NULL;
		/*
		* Build generalized HTML Markup
		*/

		$html = ''
			. '<!doctype html>'
			. '<html>'
			. '<head>'
			. '<meta charset="utf-8">'
			. '<title>' . $this->Title . '</title>'
			. '</head>'
			. '<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">'
			. '<link rel="stylesheet" type="text/css" href="http://mapgenerator.traqza.com/v1/assets/css/style.css">'
			. '<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>'
			. '<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">'
			. '<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>'
			. '<script src="http://mapgenerator.traqza.com/v1/assets/js/scripts.js"></script>'
			. '<body>'
			. $html_body
			. '</body>'
			. '<script>$(function() {
     $("#all-ctf").change(function() {
         if ($(this).prop("checked")) {
             $(".ctf").bootstrapToggle("on");
         } else {
             $(".ctf").bootstrapToggle("off");
         }
     })
	 
	 $("#all-lctf").change(function() {
         if ($(this).prop("checked")) {
             $(".lctf").bootstrapToggle("on");
         } else {
             $(".lctf").bootstrapToggle("off");
         }
     })
	 $("#all-rb").change(function() {
         if ($(this).prop("checked")) {
             $(".rb").bootstrapToggle("on");
         } else {
             $(".rb").bootstrapToggle("off");
         }
     })
	 $("#all-ar").change(function() {
         if ($(this).prop("checked")) {
             $(".ar").bootstrapToggle("on");
         } else {
             $(".ar").bootstrapToggle("off");
         }
     })
 })</script>'
			. '</html>'
			.'';
		
		return $html;
	
	}
		
	function html_buildMarkup() {
		
		$html = NULL;
		$html .= '<center><img src="'. $this->Midair_LogoLocation . $this->Midair_Logo.'" width="30%"></center>'
			. '<form class="form-horizontal" name="mapgenerator" action="index.php" method="post">'
			. '<div class="row">'
			. '<div class="col-lg-6 col-lg-push-3">'
			. '<div class="panel panel-info">'
				. '<div class="panel-heading">'
					. '<h3 class="panel-title"> <b>Midair</b> Map Generator </h3>'
				. '</div>'
				. '<div class="panel-body">'
					. $this->toggleAll()
					. '<div class="row">'
					. '<div class="col-lg-4 col-md-6 col-sm-12">'
					. '<center><h3>CTF</h3></center>'
					. $this->maps_FormCTF()
					.'</div>'
					.'<div class="col-lg-4 col-md-6 col-sm-12">'
					. '<center><h3>LCTF</h3></center>'
					. $this->maps_FormLCTF()
					. '</div>'
					.'<div class="col-lg-4 col-md-6 col-sm-12">'
					. '<center><h3>Arena</h3></center>'
					. $this->maps_FormAR()
					. '<center><h3>Rabbit</h3></center>'
					. $this->maps_FormRB()
					. '<br>'
					. '</div>'
					
				. '</div><br><br>'
				.'<center><button type="submit" class="btn btn-sm btn-success">Generate</button><center>'
			. '</div>'
			. '</div>'
			. '</div>'

			. '<form>';
			
			return $html;
	}
	
	function dump($var) {
		echo '<pre>';
			var_dump($var);
		echo '</pre>';	
	}
	function html_resultsMarkup() {
		
		$MapList = $this->mapList->MapList($_POST);
		
		$html = NULL;
		$html .= '<center><img src="'. $this->Midair_LogoLocation . $this->Midair_Logo.'" width="30%"></center>'
			. '<form class="form-horizontal" action="index.php" method="post">'
			. '<div class="row">'
			. '<div class="col-lg-4 col-lg-push-4">'
			. '<div class="panel panel-info">'
				. '<div class="panel-heading">'
					. '<h3 class="panel-title"> Generated Map Results </h3>'
				. '</div>'
				. '<div class="panel-body">'
				. '<b>Directions</b><br>'
					.'Copy and paste map list below into your <b>MapList.ini</b> located within the server config folder.
					Make sure to restart the server.<br><b>Note</b>: Admins can still access all maps in game console regardless if theyre not in the list below.<br>'
					.'<div class="well" style="background:#989898">';
						$html .= '///////////////////////////////////////////////////////<br>';
						$html .= '// Map Generator by <b>Krayvok</b><br>';
						$html .= '///////////////////////////////////////////////////////<br>';
						$html .= '<br>';
						$html .= '[MapList]';
						$html .= '<br>';
						$html .= '<br>';
						
						if (!empty($MapList['ctf_'])) {
							$html .= '// CTF Map List' . '<br>';
							foreach ($MapList['ctf_'] as $result) {
								$html .= $result . '<br>';
							}
							$html .= '<br>';
						}
						
						if (!empty($MapList['lctf_'])) {
							$html .= '// LCTF Map List' . '<br>';
							foreach ($MapList['lctf_'] as $result) {
								$html .= $result . '<br>';
							}
							$html .= '<br>';
						}
						
						if (!empty($MapList['ar_'])) {
							$html .= '// Arena Map List' . '<br>';
							foreach ($MapList['ar_'] as $result) {
								$html .= $result . '<br>';
							}
							$html .= '<br>';
						}
						
						if (!empty($MapList['rb_'])) {
							$html .= '// Rabbit Map List' . '<br>';
							foreach ($MapList['rb_'] as $result) {
								$html .= $result . '<br>';
							}
						}
				
				$html . '</div>';
			$html .= '</div>';
			$html .= '<center><button class="btn btn-warning">Go Back</button></center>'
			. '</div>'
			. '</div>'
			. '</div>'
			. '<form>';
			
			return $html;
	}
	function toggleAll() {
	
		$html = NULL;
		$checked = false;
		$html .= '<div class="row">'
		. '<div class="col-lg-4 col-lg-push-4">';
		$html .= $this->FormFields->Checkbox(
			array(
				'label' => 'Toggle CTF',
				'name' => '',
				'checked' => $checked,
				'id' => 'all-ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'All',
				'data_off_txt' => 'None',
				'data_on_style' => 'primary',
				'data_off_style' => 'default',
				'onclick' => 'toggle()'
			)	
		);
		$html .= $this->FormFields->Checkbox(
			array(
				'label' => 'Toggle LCTF',
				'name' => '',
				'checked' => $checked,
				'id' => 'all-lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'All',
				'data_off_txt' => 'None',
				'data_on_style' => 'primary',
				'data_off_style' => 'default',
				'onclick' => 'toggle()'
			)	
		);
		$html .= $this->FormFields->Checkbox(
			array(
				'label' => 'Toggle Arena',
				'name' => '',
				'checked' => $checked,
				'id' => 'all-ar',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'All',
				'data_off_txt' => 'None',
				'data_on_style' => 'primary',
				'data_off_style' => 'default',
				'onclick' => 'toggle()'
			)	
		);
		$html .= $this->FormFields->Checkbox(
			array(
				'label' => 'Toggle Rabbit',
				'name' => '',
				'checked' => $checked,
				'id' => 'all-rb',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'All',
				'data_off_txt' => 'None',
				'data_on_style' => 'primary',
				'data_off_style' => 'default',
				'onclick' => 'toggle()'
			)	
		);
  		$html .= '</div></div>';
		
		return $html;
		
	}
	function maps_FormLCTF() {
		
		$form = NULL;
		
		$checked = false;
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Kryosis',
				'name' => 'lctf_kryosis',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Minora',
				'name' => 'lctf_minora',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Outpost99',
				'name' => 'lctf_outpost99',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Ingonyama',
				'name' => 'lctf_ingonyama',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Iratus',
				'name' => 'lctf_iratus',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Brynhildr',
				'name' => 'lctf_brynhildr',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'SunsetCove',
				'name' => 'lctf_sunsetcove',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Iguana',
				'name' => 'lctf_iguana',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Exhumed',
				'name' => 'lctf_exhumed',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Tolar',
				'name' => 'lctf_tolar',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Hypothermia',
				'name' => 'lctf_hypothermia',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Elite',
				'name' => 'lctf_elite',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'NightFlare',
				'name' => 'lctf_nightflare',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Snowfall',
				'name' => 'lctf_snowfall',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Crashsite',
				'name' => 'lctf_crashsite',
				'checked' => $checked,
				'class' => 'lctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		return $form;

	}
	
	function maps_FormCTF() {
		
		$form = NULL;
		$checked = false;	
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Outpost99',
				'name' => 'ctf_outpost99',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);	
				
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Iratus',
				'name' => 'ctf_iratus',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Brynhildr',
				'name' => 'ctf_brynhildr',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'SunsetCove',
				'name' => 'ctf_sunsetcove',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Tolar',
				'name' => 'ctf_tolar',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Elite',
				'name' => 'ctf_elite',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'NightFlare',
				'name' => 'ctf_nightflare',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		//$form .= $this->FormFields->Checkbox(
		//	array(
		//		'label' => 'Flatland',
		//		'name' => 'ctf_flatland',
		//		'checked' => $checked,
		//		'class' => 'ctf'
		//	)	
		//);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Snowfall',
				'name' => 'ctf_snowfall',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Icewind',
				'name' => 'ctf_icewind',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Verdant',
				'name' => 'ctf_verdant',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'HowlingSpires',
				'name' => 'ctf_howlingspires',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Tenebris',
				'name' => 'ctf_tenebris',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Icedance',
				'name' => 'ctf_icedance',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Massive',
				'name' => 'ctf_massive',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Aria_II',
				'name' => 'ctf_aria2',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Dam',
				'name' => 'ctf_dam',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'DesertedSands',
				'name' => 'ctf_desertedsands',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Hoki',
				'name' => 'ctf_hoki',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Ignitus',
				'name' => 'ctf_ignitus',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'FrozenLines',
				'name' => 'ctf_frozenlines',
				'checked' => $checked,
				'class' => 'ctf',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
						
		return $form;
		
	}
	
	function maps_FormAR() {
		
		$form = NULL;
		$checked = false;
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'SnowArena',
				'name' => 'ar_snowarena',
				'checked' => $checked,
				'class' => 'ar',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Research',
				'name' => 'ar_research',
				'checked' => $checked,
				'class' => 'ar',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'ReactorCore',
				'name' => 'ar_reactorcore',
				'checked' => $checked,
				'class' => 'ar',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Crashsite',
				'name' => 'ar_crashsite',
				'checked' => $checked,
				'class' => 'ar',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Autumnal',
				'name' => 'ar_autumnal',
				'checked' => $checked,
				'class' => 'ar',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Aquarena',
				'name' => 'ar_aquarena',
				'checked' => $checked,
				'class' => 'ar',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
			
		return $form;

	}
	
		function maps_FormRB() {
		
		$form = NULL;
		$checked = false;
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Tribulus',
				'name' => 'rb_tribulus',
				'checked' => $checked,
				'class' => 'rb',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Tolar',
				'name' => 'rb_tolar',
				'checked' => $checked,
				'class' => 'rb',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'SunsetCove',
				'name' => 'rb_sunsetcove',
				'checked' => $checked,
				'class' => 'rb',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Speedway',
				'name' => 'rb_speedway',
				'checked' => $checked,
				'class' => 'rb',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Outpost99',
				'name' => 'rb_outpost99',
				'checked' => $checked,
				'class' => 'rb',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Minora',
				'name' => 'rb_minora',
				'checked' => $checked,
				'class' => 'rb',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Iguana',
				'name' => 'rb_iguana',
				'checked' => $checked,
				'class' => 'rb',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Elite',
				'name' => 'rb_elite',
				'checked' => $checked,
				'class' => 'rb',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Crystalline',
				'name' => 'rb_crystalline',
				'checked' => $checked,
				'class' => 'rb',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
		$form .= $this->FormFields->Checkbox(
			array(
				'label' => 'Brynhildr',
				'name' => 'rb_brynhildr',
				'checked' => $checked,
				'class' => 'rb',
				'checkbox_size' => 'mini',
				'data_on_txt' => 'Include',
				'data_off_txt' => 'Omit',
				'data_on_style' => 'success',
				'data_off_style' => 'danger'
			)	
		);
			
		return $form;

	}
	
}