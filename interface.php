<?php
interface LocalStorageInterface{
	public function get($key);
	public function add($key, $value);
	public function delete($key);
}
?>