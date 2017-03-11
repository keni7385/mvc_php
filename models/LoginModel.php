<?php

/**
 * 
 */
class LoginModel extends Model
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function login() {
        $user = isset($_POST['username']) ? $_POST['username'] : null;
		$pass = isset($_POST['password']) ? $_POST['password'] : null;

        /*$sth = $this->db->prepare("SELECT id FROM users WHERE username=:user AND password=MD5(:pass)'");
        $sth->execute(array(
            ":user" => $user,
            ":pass" => $pass
        ));

        // $data = $sth->fetchAll();
        $count = $sth->rowCount();
        */
        
		if($user == 'keni' and md5($pass) == '9e7450b7264744f65fac41af35833d34') {
			$count = 1;
		}

        if($count > 0) {
            // login
            Session::getInstance()->set('username', $user);
			header("location: /dashboard");
        } else {
            // error!
            header("location: /login");
        }
    }
}



?>