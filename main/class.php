<?php
	 class User{
    	protected $db;
    	function __construct($config){
    		$this->db = new medoo($config);
    	}
    	function login($u,$p){
    		$where['name']=$u;
    		$info=$this->db->get('user','*',$where);
    		if($info){
    			$password=$info['password'];
    			$salt=$info['salt'];
    			$jugg=pwd($p,$salt);
    			//echo $jugg;
    			if($jugg==$password){
    				$re['status']=true;
    				$re['con']=$info;
    				$_SESSION['user']=$info;
    				$uid=$info['uid'];
    				$this->info($uid);//登入
    			}else{
    				$re['status']=false;
    				$re['con']="密码错误 1";			
    			}
    		}else{
    				$re['status']=false;	
    				$re['con']="没有找到该用户 2";			

    		}
    		return $re;
    	}
    	function join($u,$e,$p){
    		if($this->is_name($u)){
    			$re['status']=false;
    			$re['con']="该用户已经注册 1";
    			return $re;
    		}
    		if($this->is_email($e)){
    			$re['status']=false;
    			$re['con']="该邮箱已经注册 2";
    			return $re;
    		}
    		$add['name']=$u;
    		$add['email']=$e;
    		$add['salt']=salt();
    		$add['password']=pwd($p,$add['salt']);
    		$ja=$this->db->insert('user',$add);
    		if($ja){
    			$re['status']=true;
    		}else{
    			$re['status']=false;
    		}
    		return $re;
    		
    	}
    	function info($uid){
    		$where['uid']=$uid;
    		$info=$this->db->get('user','*',$where);
    		$v=json_decode($info['info']);
    		$v[]=info();

    		$info['info']=json_encode($v);
    		$this->db->update('user',$info,$where);
    	}
    	function is_name($name){
    		$where['name']=$name;
    		$info=$this->db->get('user','*',$where);
    		if($info){
    			return true;
    		}else{
    			return false;
    		}
    	}
    	function is_email($email){
    		$where['email']=$email;
    		$info=$this->db->get('user','*',$where);
    		if($info){
    			return true;
    		}else{
    			return false;
    		}
    	}
    }