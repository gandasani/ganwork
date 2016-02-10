<?php namespace App\Core;

class Session {
    
    public function start_session(){
        //Start safe Session
        session_start();
        session_regenerate_id(true);
        header("Cache-control: private");
    }
    
    public function name($name){
        $this->session_name = $name;
        return $this;
    }
    
    public function set($value, $expired = ''){
        $_SESSION[$this->session_name] = $value;
        if($expired){
            //expired time
            $_SESSION['expired_'.$this->session_name] = $expired;
        } 
    }
    
    public function destroy(){
        $_SESSION[$this->session_name] = '';
        $_SESSION['expired_'.$this->session_name] = '';
    }
    
    public function check(){
        if($_SESSION['expired_'.$this->session_name] && $_SESSION['expired_'.$this->session_name] > time()){
            return true;
        } else {
            $_SESSION[$this->session_name] = '';
            $_SESSION['expired_'.$this->session_name] = '';
            return false;
        }
    }
    
    public function get(){
        return $_SESSION[$this->session_name];
    }
    
    public function get_expired(){
        return $_SESSION['expired_'.$this->session_name];
    }
    
    public function refresh($add_time = ''){
        if($add_time){
            if($_SESSION['expired_'.$this->session_name] && $_SESSION['expired_'.$this->session_name] > time()){
                $_SESSION['expired_'.$this->session_name] = time() + $add_time;
            } else {
                $this->destroy();
            }
        }
    }
}