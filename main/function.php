<?php
	function salt($min=1,$max=100000){
		return mt_rand($min,$max);
	}
	function pwd($str,$salt=0){
		if(!$salt){
			$salt=salt();
		}
		$str1=md5($str.$salt);
		$str2=strrev($str1);
		$str3=sha1($str2);
		return $str3;
	}
	function info(){
		$info['time']=time();
		$info['ip']=$_SERVER['REMOTE_ADDR'];
		return $info;
	}
	function json($info){
		$info=isset($info)?$info:0;
		if($info){
			$re=$info;
		}else{
			$re['status']='false';
		}
		header('Content-type:text/json'); 
		echo json_encode($re);
	}