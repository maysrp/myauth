<?php
   	/*
		main/code.php 生成验证码 存储在session['code']；
		调用 $_POST形式

		登入接口
		$_POST['code']  [验证码]
		$_POST['username'] [用户名]
		$_POST['password'] [密码]
   	*/
	require  'main/medoo.php';
    require  'main/function.php';
    require  'config.php';
    require  'main/class.php';
    session_start();

    $user=new User($config);


    $u=isset($_SESSION['user'])?$_SESSION['user']:0;
    if($u){
    	$re['status']=true;
        $re['con']=$u;
    	json($re);
    }else{
    	$code=isset($_POST['code'])?$_POST['code']:0;// [验证码]
		$un=isset($_POST['username'])?$_POST['username']:0;//[用户名]
		$pw=isset($_POST['password'])?$_POST['password']:0;//[密码]
    	if(isset($_SESSION['code'])){
    		if ($_SESSION['code']==$code) {
    			$re=$user->login($un,$pw);
    			json($re);
    		}else{
    			json('0');
    		}
    	}else{
    		json('0');
    	}
    }
    $_SESSION['code']=salt();
