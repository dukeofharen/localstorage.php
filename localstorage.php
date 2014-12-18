<?php
include("./interface.php");
include("./".LOCALSTORAGE_TYPE.".php");
function localStorage($key, $value = ""){
	$obj = new LocalStorage;
	if($value !== "" && $value !== null){
		$obj->add($key, serialize($value));
		return;
	}
	else if($value === null){
		$obj->delete($key);
	}
	$value = $obj->get($key);
	return ($value == null ? null : unserialize($value));
}
?>