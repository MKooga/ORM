<?php namespace Halo;


/**
 * Class auth authenticates user and permits to check if the user has been logged in
 * Automatically loaded when the controller has $requires_auth property.
 */
class Auth
{

    public $logged_in = FALSE;

    function __construct()
    {
        if (isset($_SESSION['user_id'])) {
            $this->logged_in = TRUE;

            $user = \R::load('user', $_SESSION['user_id']);
            $this->load_user_data($user);

        }
    }

    /**
     * Dynamically add all user table fields as object properties to auth object
     * @param $user
     */
    public
    function load_user_data($user)
    {
        $reflection = new \ReflectionClass($user);
        $properties = $reflection->getProperty('properties');
        $properties->setAccessible(true);
        $user_properties = $properties->getValue($user);

        foreach ($user_properties as $user_attr => $property) {
            $this->$user_attr = $property;
        }
        $this->logged_in = TRUE;
    }

    /**
     * Verifies if the user is logged in and authenticates if not and POST contains username, else displays the login form
     * @return bool Returns true when the user has been logged in
     */
    function require_auth()
    {
        global $db;


        // If user has already logged in...
        if ($this->logged_in) {
            return TRUE;
        }


        // Not all credentials were provided
        if (!(isset($_POST['email']) && isset($_POST['password']))) {

            $this->show_login();

        }


        // Attempt to retrieve user data from database
        $user = \R::findOne('user', 'email = ? AND password = ? AND deleted = 0', [$_POST['email'], $_POST['password']]);

        // No such user or wrong password
        if (empty($user->id)) {
            $this->show_login([__("Wrong username or password")]);
        }



        // User has provided correct login data if we are here
        $_SESSION['user_id'] = $user->id;

        // When logging in, user will be redirected to last url when she/he was before logging out
        isset($user->last_url) ? header("Location:" . BASE_URL . $user->last_url) : '';


        // Load $this->auth with users table's field values
        $this->load_user_data($user);


        return true;

    }

    /**
     * @param $errors
     */
    protected function show_login($errors = null)
    {
        global $supported_languages;

        $login = true;
        $controller = $this->controller->controller;
        $action = $this->controller->action;

        // Display the login form
        require 'templates/auth_template.php';

        // Prevent loading the requested controller (not authenticated)
        exit();
    }


}