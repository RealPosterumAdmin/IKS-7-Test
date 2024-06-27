<?php
session_start();
if (isset($_SESSION['user_id'])) {
	$user_id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
}

require_once 'DatabaseClass.php';

class AuthClass {
    private $db;
    public function __construct(DatabaseClass $db)
    {
        $this->db = $db;
    }

    public function register($name, $email, $password)
    {
	    $search = "SELECT * FROM users WHERE email = ?";
	    $result = $this->db->select($search, [$email]);
	    $user = $result[0] ?? null;

		if (!$user)
		{
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
			$query = $this->db->insert($sql, [$name, $email, $hashedPassword]);

			$_SESSION['user_id'] = $query;
			$_SESSION['user_name'] = $name;
			return TRUE;
		} else
		{
			return FALSE;
		}

    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $result = $this->db->select($sql, [$email]);
        $user = $result[0] ?? null;
        if ($user && password_verify($password, $user['password']))
        {
	        $_SESSION['user_id'] = $user['id'];
	        $_SESSION['user_name'] = $user['name'];
	        return TRUE;
        } else
        {
            return FALSE;
        }
    }
} ?>