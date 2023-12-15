<?php
// user.php
class User {

    protected $iduser, $username, $email, $password;

    public function __construct($iduser, $username, $email, $password) {
        $this->iduser = $iduser;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    //_____________________id_______________________

    public function getIduser() {
        return $this->iduser;
    }

    //_____________________name_______________________
    public function getUsername() {
        return $this->username;
    }
    
    //_____________________email_______________________
    public function getEmail() {
        return $this->email;
    }

    //_____________________password_______________________
    public function getPassword() {
        return $this->password;
    }
}
?>
