<?php

class Person{
	
	static protected $database;
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

	// $condition = "";

	// $result = $condition ? 'foo' : 'bar';

	// echo $result;

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

	    // $this->qcode = isset( $args['qcode'] ) ? $args['qcode'] : "";
	    // $this->lgu_code =  isset( $args['lgu_code'] ) ? $args['lgu_code'] : "";
	    // $this->fname =  isset( $args['fname'] ) ? $args['fname'] : "";
	    // $this->mname =  isset( $args['mname'] ) ? $args['mname'] : "";
	    // $this->lname =  isset( $args['lname'] ) ? $args['lname'] : "";
	    // $this->mobile_number =  isset( $args['mobile_number'] ) ? $args['mobile_number'] : "";
	    // $this->address =  isset( $args['address'] ) ? $args['address'] : "";
	    // $this->details =  isset( $args['details'] ) ? $args['details'] : "";
	    // $this->status =  isset( $args['status'] ) ? $args['status'] : "";
	    // $this->start_date =  isset( $args['start_date'] ) ? $args['start_date'] : "";
	    // $this->created_at =  isset( $args['created_at'] ) ? $args['created_at'] : current_date();

	}

	static public function set_database($database) {
		self::$database = $database;
	}

  static public function find_by_sql($sql) {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }

    // results into objects
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = self::instantiate($record);
    }

    $result->free();

    return $object_array;
  }

  static public function find_all() {
    $sql = "SELECT * FROM qperson";
    return self::find_by_sql($sql);
  }

  static public function find_by_id($id) {
    $sql = "SELECT * FROM qperson ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $obj_array = self::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static protected function instantiate($record) {
    $object = new self;
    // Could manually assign values to properties
    // but automatically assignment is easier and re-usable
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->brand)) {
      $this->errors[] = "Brand cannot be blank.";
    }
    if(is_blank($this->model)) {
      $this->errors[] = "Model cannot be blank.";
    }
    return $this->errors;
  }

  protected function create() {
    $this->validate();
    if(!empty($this->errors)) { return false; }

    $attributes = $this->sanitized_attributes();
    $sql = "INSERT INTO qperson (";
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

    $sql = "UPDATE qperson SET ";
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

  public function merge_attributes($args=[]) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }

  // Properties which have database columns, excluding ID
  public function attributes() {
    $attributes = [];
    foreach(self::$db_columns as $column) {
      if($column == 'id') { continue; }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }

  protected function sanitized_attributes() {
    $sanitized = [];
    foreach($this->attributes() as $key => $value) {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }

	public function condition() {
		if($this->status > 0) {
		  return self::CONDITION_OPTIONS[$this->status];
		} else {
		  return "Unknown";
		}
	}

	public function delete() {
	    $sql = "DELETE FROM qperson ";
	    $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
	    $sql .= "LIMIT 1";
	    $result = self::$database->query($sql);
	    return $result;

	  }

}

?>