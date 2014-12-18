<?php
class LocalStorage implements LocalStorageInterface{
	public function get($key){
		$path = $this->getPath($key);
		if(file_exists($path)){
			return @file_get_contents($path);
		}
		return null;
	}
	
	public function add($key, $value){
		$path = $this->getPath($key);
		@file_put_contents($path, $value);
	}
	
	public function delete($key){
		$path = $this->getPath($key);
		@unlink($path);
	}
	
	private function getFolder(){
		$folder = "";
		if(defined("LOCALSTORAGE_FOLDER")){
			$folder = LOCALSTORAGE_FOLDER;
		}
		else{
			$folder = "./loc_s";
		}
		return $folder;
	}
	
	private function getPath($key){
		return $this->getFolder()."/".$key.".val";
	}
}
?>