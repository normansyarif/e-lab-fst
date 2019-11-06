<?php

function hari(){
	$hari = date ("D");
 
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return $hari_ini;
 
}

function bulan(){
	$bulan = date ("n");
 
	switch($bulan){
		case '1':
			$bulan = "Januari";
		break;
 
		case '2':			
			$bulan = "Febriari";
		break;
 
		case '3':
			$bulan = "Maret";
		break;
 
		case '4':
			$bulan = "April";
		break;
 
		case '5':
			$bulan = "Mei";
		break;
 
		case '6':
			$bulan = "Juni";
		break;
 
		case '7':
			$bulan = "Juli";
		break;

		case '8':
			$bulan = "Agustus";
		break;

		case '9':
			$bulan = "September";
		break;

		case '10':
			$bulan = "Oktober";
		break;

		case '11':
			$bulan = "November";
		break;

		case '12':
			$bulan = "Desember";
		break;
		
		default:
			$bulan = "Tidak di ketahui";		
		break;
	}
 
	return $bulan;
 
}
