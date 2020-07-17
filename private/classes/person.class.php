<?php

class Person extends DatabaseObject{
	
	static protected $table_name = 'qperson';
  	static protected $db_columns = [
  		'id', 
  		'qcode', 
  		'lgu_code', 
  		'fname', 
  		'mname', 
  		'lname', 
  		'mobile_number', 
  		'address', 
  		'details', 
  		'status',
  		'start_date', 
  		'created_at'
  	];

	public $id;
  	public $qcode;
  	public $lgu_code;
  	public $fname;
  	public $mname;
  	public $lname;
  	public $mobile_number;
  	public $address;
  	public $details;
  	public $status;
  	public $start_date;
  	public $created_at;

  	public const CONDITION_OPTIONS = [
	    1 => 'PUM',
	    2 => 'PUI',
	    3 => 'Covid+'
	];

	public function __construct($args=[]) {

	    $this->qcode = $args['qcode'] ?? '';
	    $this->lgu_code = $args['lgu_code'] ?? '';
	    $this->fname = $args['fname'] ?? '';
	    $this->mname = $args['mname'] ?? '';
	    $this->lname = $args['lname'] ?? '';
	    $this->mobile_number = $args['mobile_number'] ?? '';
	    $this->address = $args['address'] ?? '';
	    $this->details = $args['details'] ?? '';
	    $this->status = $args['status'] ?? '';
	    $this->start_date = $args['start_date'] ?? current_date();
	    $this->created_at = $args['created_at'] ?? current_date();

	}

	static public function find_all() {
    	$sql = "SELECT * FROM " . static::$table_name;
    	return static::find_by_sql($sql);
  	}

	static public function find_by_id($id) {
	    $sql = "SELECT * FROM " . static::$table_name . " ";
	    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
	    $obj_array = static::find_by_sql($sql);
	    if(!empty($obj_array)) {
	      return array_shift($obj_array);
	    } else {
	      return false;
	    }
	}

  	protected function create() {
   		$this->validate();
    	if(!empty($this->errors)) { return false; }

	    $attributes = $this->sanitized_attributes();
	    $sql = "INSERT INTO " . static::$table_name . " (";
	    $sql .= join(', ', array_keys($attributes));
	    $sql .= ") VALUES ('";
	    $sql .= join("', '", array_values($attributes));
	    $sql .= "')";
	    $result = self::$database->query($sql);
	    if($result) {
	      $this->id = self::$database->insert_id;
	    }
    	return $result;
 	}

	  protected function update() {
	    $this->validate();
	    if(!empty($this->errors)) { return false; }

	    $attributes = $this->sanitized_attributes();
	    $attribute_pairs = [];
	    foreach($attributes as $key => $value) {
	      $attribute_pairs[] = "{$key}='{$value}'";
	    }

	    $sql = "UPDATE " . static::$table_name . " SET ";
	    $sql .= join(', ', $attribute_pairs);
	    $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
	    $sql .= "LIMIT 1";
	    $result = self::$database->query($sql);
	    return $result;
	  }

	  public function save() {
	    // A new record will not have an ID yet
	    if(isset($this->id)) {
	      return $this->update();
	    } else {
	      return $this->create();
	    }
	  }

	public function condition() {
		if($this->status > 0) {
		  return self::CONDITION_OPTIONS[$this->status];
		} else {
		  return "Unknown";
		}
	}

	public function delete() {

	    $sql = "DELETE FROM " . static::$table_name . " ";
	    $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
	    $sql .= "LIMIT 1";
	    $result = self::$database->query($sql);
	    return $result;

	    // After deleting, the instance of the object will still
	    // exist, even though the database record does not.
	    // This can be useful, as in:
	    //   echo $user->first_name . " was deleted.";
	    // but, for example, we can't call $user->update() after
	    // calling $user->delete().
    }

}

?>