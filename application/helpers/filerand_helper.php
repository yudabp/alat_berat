<?php
if(!defined('BASEPATH')) exit('no file allowed');
  function imgRandom($length = 15) {
	    $characters = '0123456789';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}
	
	function comcode($length = 6) {
	    $characters = '0123456789';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}
