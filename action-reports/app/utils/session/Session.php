<?php


namespace App\utils\session;


class Session
{
    private static $instance = null;

    private $email;
    private $firstname;
    private $lastname;

    public function __construct()
    {
    }

    public static function getInstance() {

        if(is_null(self::$instance)) {
            self::$instance = new Session();
        }

        return self::$instance;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function destroy(){
        self::$instance = null;
    }

    public static function exist(){
        if(is_null(self::$instance))
            return false;
        else
            return true;
    }

}