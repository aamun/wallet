<?php
/**
* User Model
*/
class User extends Models {

    /**
     * Login 
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login($email, $password){
        $this->findBy('email', $email);
        return (!$this->isNew() && md5($password) === $this['password']);
    }


    /**
     * Override create method of ActiveRecord to encript the user password
     *
     * @param array $values
     * @return bool
     */
    public function create($values){
        // Encritpt with md5 the password field
        $values['password'] == md5($password);
        return parrent::create($values);
    }
}
?>