<?php
/**
* User Model
*/
class User extends Models {

    public function __construct(){
        parent::__construct();

        // Validate fields
        $this->validate = array(
            'username' => array(
                'required' => true,
                'rules' => array(
                    array(
                        'rule' => VALID_NOT_EMPTY,
                        'message' => "Please write a username."
                    )
                )
            ),
            'email' => array(
                'required' => true,
                'rules' => array(
                    array(
                        'rule' => VALID_EMAIL,
                        'message' => "Write a valid email."
                    ),
                    array(
                        'rule' => array('emailRegistered'),
                        'message' => "Email already exists in our database. Please sign up with a unique email or log in."
                    )
                )
            ),
            'password' => array(
                'required' => true,
                'rules' => array(
                    // array(
                    //     'rule' => array('validatePassword'),
                    //     'message' => "Please, check your password, must have least one uppercase letter and at least one lower case letter, and at least one number. <br />The length must be at least 6 char but no more than 14."
                    // ),
                    array(
                        'rule' => array('confirmPassword'),
                        'message' => "The passwords don't match, re-enter the password in the second field."
                    )
                )
            )
        );
    }

    /**
     *
     * Check in the database if the email is registered by some user 
     * if it is found return true
     * if it is not found return false 
     *
     * @param string $email 
     * @return boolean
     */
    function emailRegistered($email){
        $isRegistered = false;

        // Check if email exists
        $sql = "SELECT email FROM users WHERE email = '{$email}'";
        $this->db->query($sql);
        $isRegistered = $this->db->numRows() > 0;

        return $isRegistered;
    }

    /**
     * Rules to validate password
     *
     * @param string $password
     * @return boolean
     */
    function validatePassword($password){
        return (!(strlen($password) >= 6 && strlen($password) <= 14) || !preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)\S{6,14}$/', $password));
    }

    /**
     * Confirm password validation
     * @return boolean
     */
    public function confirmPassword($password){
        return ($password !== $this['confirm_password']);
    }

    /**
     * Override ActiveRecord create method
     * Encript password with md5
     *
     * @return int
     */
    public function create($values){

        $values['password'] = md5($values['password']);
        $values['created'] = date('Y-m-d H:i:s');
        return parent::create($values);
    }

    /**
     * Login
     * @param strin $email
     * @param string $password
     */
    public function login($email, $password){
        $this->findBy('email', $email);
        return (!$this->isNew() && $this['password'] === md5($password));
    }
}
?>