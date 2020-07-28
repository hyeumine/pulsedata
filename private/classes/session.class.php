<?php 

class Session {

  public static function login($admin){
    
    session_regenerate_id();
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['lgu_code'] = $admin['lgu_code'];
    $_SESSION['contact_person'] = $admin['contact_person'];
    $_SESSION['last_login'] = time();
    return true;
  }


  public static function is_logged_in(){
    // Having a admin_id in the session serves a dual-purpose:
    // - Its presence indicates the admin is logged in.
    // - Its value tells which admin for looking up their record.
    return isset($_SESSION['admin_id']);
  }

  public static function logout() {
    unset($_SESSION['admin_id']);
    unset($_SESSION['lgu_code']);
    unset($_SESSION['contact_person']);
    return true;
  }

  public static function message($msg="") {
    if(!empty($msg)) {
      // Then this is a "set" message
      $_SESSION['message'] = $msg;
      return true;
    } else {
      // Then this is a "get" message
      return $_SESSION['message'] ?? '';
    }
  }

  public static function clear_message() {
    unset($_SESSION['message']);
  }

}

?>