<?php

class mapList {

		private $RB_Minora;
		private $RB_Speedway;
		private $RB_Crystalline;
		private $RB_Tribulus;
		private $RB_Outpost99;
		private $RB_Tenebris;
		private $RB_Elite;
		private $RB_Iguana;
		private $RB_Brynhildr;
		private $RB_Tolar;
		private $RB_SunsetCove;
		private $RB_Aquarena;

		private $AR_Crashsite;
		private $AR_Research;
		private $AR_Autumnal;
		private $AR_Authority;
		private $AR_ClusterRail;

		private $CTF_Brynhildr;
		private $CTF_Icewind;
		private $CTF_Abaddon;
		private $CTF_Verdant;
		private $CTF_Iratus;
		private $CTF_HowlingSpires;
		private $CTF_Tenebris;
		private $CTF_Icedance;
		private $CTF_Massive;
		private $CTF_Aria2;
		private $CTF_Dam;
		private $CTF_DesertedSands;
		private $CTF_Hoki;
		private $CTF_Ignitus;
		private $CTF_SnowFall;
		private $CTF_Tolar;
		private $CTF_Elite;
		private $CTF_NightFlare;
		private $CTF_Outpost99;
		private $CTF_SunsetCove;
		private $CTF_FrozenLines;

		private $LCTF_Kryosis;
		private $LCTF_Minora;
		private $LCTF_Outpost99;
		private $LCTF_Ingonyama;
		private $LCTF_Iratus;
		private $LCTF_Brynhildr;
		private $LCTF_SunsetCove;
		private $LCTF_Iguana;
		private $LCTF_Exhumed;
		private $LCTF_Tolar;
		private $LCTF_Hypothermia;
		private $LCTF_ClusterRail;
		private $LCTF_Elite;
		private $LCTF_NightFlare;
		private $LCTF_Snowfall;
		private $LCTF_Crashsite;

	function __construct() {
		
		$this->RB_Tribulus = 'Map=RB-Tribulus';
		$this->RB_Tolar = 'Map=RB-Tolar';
		$this->RB_SunsetCove = 'Map=RB-SunsetCove';
		$this->RB_Speedway = 'Map=RB-Speedway';
		$this->RB_Outpost99 = 'Map=RB-Outpost99';
		$this->RB_Minora = 'Map=RB-Minora';
		$this->RB_Iguana = 'Map=RB-Iguana';
		$this->RB_Elite = 'Map=RB-Elite';
		$this->RB_Crystalline = 'Map=RB-Crystalline';
		$this->RB_Brynhildr = 'Map=RB-Brynhildr';
		
		$this->AR_SnowArena = 'Map=AR-SnowArena';
		$this->AR_Research = 'Map=AR-Research';
		$this->AR_ReactorCore = 'Map=AR-ReactorCore';
		$this->AR_Crashsite = 'Map=AR-Crashsite';
		$this->AR_Autumnal = 'Map=AR-Autumnal';
		$this->AR_Aquarena = 'Map=AR-Aquarena';

		$this->CTF_Brynhildr = 'Map=CTF-Brynhildr';
		$this->CTF_Icewind = 'Map=CTF-Icewind';
		$this->CTF_Verdant = 'Map=CTF-Verdant';
		$this->CTF_Iratus = 'Map=CTF-Iratus';
		$this->CTF_HowlingSpires = 'Map=CTF-HowlingSpires';
		$this->CTF_Tenebris = 'Map=CTF-Tenebris';
		$this->CTF_Icedance = 'Map=CTF-Icedance';
		$this->CTF_Massive = 'Map=CTF-Massive';
		$this->CTF_Aria2 = 'Map=CTF-Aria_II';
		$this->CTF_Dam = 'Map=CTF-Dam';
		$this->CTF_DesertedSands = 'Map=CTF-DesertedSands';
		$this->CTF_Hoki = 'Map=CTF-Hoki';
		$this->CTF_Ignitus = 'Map=CTF-Ignitus';
		$this->CTF_SnowFall = 'Map=CTF-SnowFall';
		$this->CTF_Tolar = 'Map=CTF-Tolar';
		$this->CTF_Elite = 'Map=CTF-Elite';
		$this->CTF_NightFlare = 'Map=CTF-NightFlare';
		$this->CTF_Outpost99 = 'Map=CTF-Outpost99';
		$this->CTF_SunsetCove = 'Map=CTF-SunsetCove';
		$this->CTF_FrozenLines = 'Map=CTF-FrozenLines';
		//$this->CTF_Flatland = 'Map=CTF-Flatland';

		$this->LCTF_Kryosis = 'Map=LCTF-Kryosis';
		$this->LCTF_Minora = 'Map=LCTF-Minora';
		$this->LCTF_Outpost99 = 'Map=LCTF-Outpost99';
		$this->LCTF_Ingonyama = 'Map=LCTF-Ingonyama';
		$this->LCTF_Iratus = 'Map=LCTF-Iratus';
		$this->LCTF_Brynhildr = 'Map=LCTF-Brynhildr';
		$this->LCTF_SunsetCove = 'Map=LCTF-SunsetCove';
		$this->LCTF_Iguana = 'Map=LCTF-Iguana';
		$this->LCTF_Exhumed = 'Map=LCTF-Exhumed';
		$this->LCTF_Tolar = 'Map=LCTF-Tolar';
		$this->LCTF_Hypothermia = 'Map=LCTF-Hypothermia';
		$this->LCTF_Elite = 'Map=LCTF-Elite';
		$this->LCTF_NightFlare = 'Map=LCTF-NightFlare';
		$this->LCTF_Snowfall = 'Map=LCTF-Snowfall';
		$this->LCTF_Crashsite = 'Map=LCTF-Crashsite';

	}
	
	function MapList($o) {
		
		$array = array();
				
		// CTF
		$CTF = 'ctf_';
		$i = 0;
		if ($o[$CTF . 'outpost99']) {
			$array[$CTF][$i] = $this->CTF_Outpost99;
			$i++;
		}
		if ($o[$CTF . 'iratus']) {
			$array[$CTF][$i] = $this->CTF_Iratus;
			$i++;
		}
		if ($o[$CTF . 'brynhildr']) {
			$array[$CTF][$i] = $this->CTF_Brynhildr;
			$i++;
		}
		if ($o[$CTF . 'sunsetcove']) {
			$array[$CTF][$i] = $this->CTF_SunsetCove;
			$i++;
		}
		if ($o[$CTF . 'tolar']) {
			$array[$CTF][$i] = $this->CTF_Tolar;
			$i++;
		}
		if ($o[$CTF . 'elite']) {
			$array[$CTF][$i] = $this->CTF_Elite;
			$i++;
		}
		if ($o[$CTF . 'nightflare']) {
			$array[$CTF][$i] = $this->CTF_NightFlare;
			$i++;
		}
		if ($o[$CTF . 'snowfall']) {
			$array[$CTF][$i] = $this->CTF_SnowFall;
			$i++;
		}
		if ($o[$CTF . 'icewind']) {
			$array[$CTF][$i] = $this->CTF_Icewind;
			$i++;
		}
		if ($o[$CTF . 'verdant']) {
			$array[$CTF][$i] = $this->CTF_Verdant;
			$i++;
		}
		if ($o[$CTF . 'howlingspires']) {
			$array[$CTF][$i] = $this->CTF_HowlingSpires;
			$i++;
		}
		if ($o[$CTF . 'tenebris']) {
			$array[$CTF][$i] = $this->CTF_Tenebris;
			$i++;
		}
		if ($o[$CTF . 'icedance']) {
			$array[$CTF][$i] = $this->CTF_Icedance;
			$i++;
		}
		if ($o[$CTF . 'massive']) {
			$array[$CTF][$i] = $this->CTF_Massive;
			$i++;
		}
		if ($o[$CTF . 'aria2']) {
			$array[$CTF][$i] = $this->CTF_Aria2;
			$i++;
		}
		if ($o[$CTF . 'dam']) {
			$array[$CTF][$i] = $this->CTF_Dam;
			$i++;
		}
		if ($o[$CTF . 'desertedsands']) {
			$array[$CTF][$i] = $this->CTF_DesertedSands;
			$i++;
		}
		if ($o[$CTF . 'hoki']) {
			$array[$CTF][$i] = $this->CTF_Hoki;
			$i++;
		}
		if ($o[$CTF . 'ignitus']) {
			$array[$CTF][$i] = $this->CTF_Ignitus;
			$i++;
		}
		if ($o[$CTF . 'frozenlines']) {
			$array[$CTF][$i] = $this->CTF_FrozenLines;
			$i++;
		}
		
		// LCTF
		$LCTF = 'lctf_';
		$i = 0;
		if ($o[$LCTF . 'crashsite']) {
			$array[$LCTF][$i] = $this->LCTF_Crashsite;
			$i++;
		}
		if ($o[$LCTF . 'minora']) {
			$array[$LCTF][$i] = $this->LCTF_Minora;
			$i++;
		}
		if ($o[$LCTF . 'outpost99']) {
			$array[$LCTF][$i] = $this->LCTF_Outpost99;
			$i++;
		}
		if ($o[$LCTF . 'ingonyama']) {
			$array[$LCTF][$i] = $this->LCTF_Ingonyama;
			$i++;
		}
		if ($o[$LCTF . 'iratus']) {
			$array[$LCTF][$i] = $this->LCTF_Iratus;
			$i++;
		}
		if ($o[$LCTF . 'brynhildr']) {
			$array[$LCTF][$i] = $this->LCTF_Brynhildr;
			$i++;
		}
		if ($o[$LCTF . 'sunsetcove']) {
			$array[$LCTF][$i] = $this->LCTF_SunsetCove;
			$i++;
		}
		if ($o[$LCTF . 'iguana']) {
			$array[$LCTF][$i] = $this->LCTF_Iguana;
			$i++;
		}
		if ($o[$LCTF . 'exhumed']) {
			$array[$LCTF][$i] = $this->LCTF_Exhumed;
			$i++;
		}
		if ($o[$LCTF . 'tolar']) {
			$array[$LCTF][$i] = $this->LCTF_Tolar;
			$i++;
		}
		if ($o[$LCTF . 'hypothermia']) {
			$array[$LCTF][$i] = $this->LCTF_Hypothermia;
			$i++;
		}
		if ($o[$LCTF . 'elite']) {
			$array[$LCTF][$i] = $this->LCTF_Elite;
			$i++;
		}
		if ($o[$LCTF . 'nightflare']) {
			$array[$LCTF][$i] = $this->LCTF_NightFlare;
			$i++;
		}
		if ($o[$LCTF . 'snowfall']) {
			$array[$LCTF][$i] = $this->LCTF_Snowfall;
			$i++;
		}
		if ($o[$LCTF . 'crashsite']) {
			$array[$LCTF][$i] = $this->LCTF_Crashsite;
			$i++;
		}
		if ($o[$LCTF . 'kryosis']) {
			$array[$LCTF][$i] = $this->LCTF_Kryosis;
			$i++;
		}
		
		// Rabbit
		$RB = 'rb_';
		$i = 0;
		if ($o[$RB . 'tribulus']) {
			$array[$RB][$i] = $this->RB_Tribulus;
			$i++;
		}
		if ($o[$RB . 'tolar']) {
			$array[$RB][$i] = $this->RB_Tolar;
			$i++;
		}
		if ($o[$RB . 'sunsetcove']) {
			$array[$RB][$i] = $this->RB_SunsetCove;
			$i++;
		}
		if ($o[$RB . 'speedway']) {
			$array[$RB][$i] = $this->RB_Speedway;
			$i++;
		}
		if ($o[$RB . 'outpost99']) {
			$array[$RB][$i] = $this->RB_Outpost99;
			$i++;
		}
		if ($o[$RB . 'minora']) {	
			$array[$RB][$i] = $this->RB_Minora;
			$i++;
		}
		if ($o[$RB . 'iguana']) {
			$array[$RB][$i] = $this->RB_Iguana;
			$i++;
		}
		if ($o[$RB . 'elite']) {
			$array[$RB][$i] = $this->RB_Elite;
			$i++;
		}
		if ($o[$RB . 'crystalline']) {
			$array[$RB][$i] = $this->RB_Crystalline;
			$i++;
		}
		if ($o[$RB . 'brynhildr']) {
			$array[$RB][$i] = $this->RB_Brynhildr;
			$i++;
		}		

		// Arena
		$AR = 'ar_';
		$i = 0;
		if ($o[$AR . 'snowarena']) {
			$array[$AR][$i] = $this->AR_SnowArena;
			$i++;
		}
		if ($o[$AR . 'research']) {
			$array[$AR][$i] = $this->AR_Research;
			$i++;
		}
		if ($o[$AR . 'reactorcore']) {
			$array[$AR][$i] = $this->AR_ReactorCore;
			$i++;
		}
		if ($o[$AR . 'crashsite']) {
			$array[$AR][$i] = $this->AR_Crashsite;
			$i++;
		}
		if ($o[$AR . 'autumnal']) {
			$array[$AR][$i] = $this->AR_Autumnal;
			$i++;
		}
		if ($o[$AR . 'aquarena']) {
			$array[$AR][$i] = $this->AR_Aquarena;
			$i++;
		}
		
		return $array;


	}

}


?>