<?php
class WishDB extends mysqli {


    // single instance of self shared among all instances
    private static $instance = null;


    // db connection config vars
    private $user = "root";
    private $pass = "password";
    private $dbName = "birthday";
    private $dbHost = "localhost";

	
	//This method must be static, and must return an instance of the object if the object
 //does not already exist.
 public static function getInstance() {
   if (!self::$instance instanceof self) {
     self::$instance = new self;
   }
   return self::$instance;
 }

 // The clone and wakeup methods prevents external instantiation of copies of the Singleton class,
 // thus eliminating the possibility of duplicate objects.
 public function __clone() {
   trigger_error('Clone is not allowed.', E_USER_ERROR);
 }
 public function __wakeup() {
   trigger_error('Deserializing is not allowed.', E_USER_ERROR);
 }
	
	// private constructor
private function __construct() {
    parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
    if (mysqli_connect_error()) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    parent::set_charset('utf-8');
}
public function get_wishes_by_wisher_id($user) {
    return $this->query("SELECT id, wish FROM birthdaywishes WHERE wishowner=" . $user);
}
public function add_stuff($item, $id) {
    
	//return $this->query("INSERT INTO partystuff (id, items, birthdayPersonID,) VALUES("$item", "$id"))";
	return $this->query("INSERT INTO partystuff (items, birthdayPersonID) VALUES ('" . $item . "', '" . $id . "')");
	
}
public function get_items_by_wisher_id($user) {
    return $this->query("SELECT id, items FROM partystuff WHERE birthdayPersonID=" . $user);
}

}

	
	
	
