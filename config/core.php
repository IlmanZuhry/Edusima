<?php

class manz {
    var $talkhost = "localhost";
    var $user     = "root";
    var $pass     = "";
    var $dbname   = "edusima";
    public mysqli $koneksi;

    function __construct(){

        $this->koneksi = mysqli_connect(
            $this->talkhost,
            $this->user,
            $this->pass,
            $this->dbname
        );
        if(mysqli_connect_errno()){
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    }
    function generateUserCode(){
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		do {
			$id = '';
			for ($i = 0; $i < 6; $i++) {
				$code .= $chars[random_int(0, strlen($chars) - 1)];
			}
			$cek = mysqli_query($this->koneksi, "SELECT user_code FROM users WHERE user_code = '$code'");
		} while (mysqli_num_rows($cek) > 0);
		return $code;
	}

    function register($name, $email, $phone, $password, $role){
        $name  = mysqli_real_escape_string($this->koneksi, $name);
        $email = mysqli_real_escape_string($this->koneksi, $email);
        $phone = mysqli_real_escape_string($this->koneksi, $phone);
        $role  = mysqli_real_escape_string($this->koneksi, $role);
        $check = mysqli_query(
            $this->koneksi,
            "SELECT id FROM users WHERE email='$email'"
        );
        if(mysqli_num_rows($check) > 0){
            return [
                'status' => false,
                'message' => 'Email sudah digunakan'
            ];
        }
        $user_code = $this->generateUserCode();
        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        $query = "INSERT INTO users (user_code,name,email,phone,password,role)
        VALUES ('$user_code','$name','$email','$phone','$hashedPassword','$role')";
        $insert = mysqli_query($this->koneksi, $query);

        if($insert){
            return [
                'status' => true,
                'message' => 'Register berhasil'
            ];
        } else {
            return [
                'status' => false,
                'message' => mysqli_error($this->koneksi)
            ];
        }
    }

}
?>