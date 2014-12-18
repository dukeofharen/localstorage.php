<?php
class LocalStorage implements LocalStorageInterface{
	private static $mysqli;
	
	public function LocalStorage(){
		if(LocalStorage::$mysqli == null){
			LocalStorage::$mysqli = new mysqli(LOCALSTORAGE_HOST, LOCALSTORAGE_USERNAME, LOCALSTORAGE_PASSWORD, LOCALSTORAGE_DATABASE);
		}
	}
	
	public function get($key){
		$query = "SELECT `value` FROM localstorage WHERE `key` = '".$this->escape($key)."'";
		if($q_result = LocalStorage::$mysqli->query($query)){
			while($row = $q_result->fetch_assoc()){
				return $row["value"];
			}
		}
		return null;
	}
	
	public function add($key, $value){
		if($this->get($key) !== null){
			$query = "UPDATE localstorage SET `value` = '".$this->escape($value)."' WHERE `key` = '".$this->escape($key)."'";
		}
		else{
			$query = "INSERT INTO localstorage SET `key` = '".$this->escape($key)."', `value` = '".$this->escape($value)."'";
		}
		LocalStorage::$mysqli->query($query);
	}
	
	public function delete($key){
		$query = "DELETE FROM localstorage WHERE `key` = '".$this->escape($key)."'";
		LocalStorage::$mysqli->query($query);
	}
	
	private function escape($value){
		return LocalStorage::$mysqli->real_escape_string($value);
	}
}
?>