localstorage.php
================

The flexibility of JavaScript's localStorage, implemented to work with PHP. localStorage is a flexible and simple way to store your variables, without the hassle of querying. It's ideal for storing configuration variables, but not very ideal for storing relational data (like user accounts). localstorage.php can save any type of variable, because the variables are serialized before being saved. Let's take a look at an example:

	<?php
	// Set a localStorage variable
	localStorage("test", array("test" => "This is a test!"));
	// Read the localStorage variable. If the variable doesn't exist, "null" is returned.
	var_dump(localStorage("test"));
	// By passing "null" as second parameter, the localStorage with a specific "key" variable is deleted
	localStorage("test", null);
	?>

As you can see, it's very simple. It needs some configuration though. As for now, I've added two ways for localstorage.php to store the variables: in the file system or in a MySQL database. Let's take a look at how we can install localstorage.php.

**localstorage.php with file system**

	<?php
	define("LOCALSTORAGE_TYPE", "file");
	// This folder should exist and an .htaccess file should be added so that the values can't be browsed with the browser
	define("LOCALSTORAGE_FOLDER", "./values");
	include("./localstorage.php");
	?>

**localstorage.php with MySQL**

	<?php
	define("LOCALSTORAGE_TYPE", "mysql");
	// The MySQL settings. The database should exist and the script "mysql.sql" should be executed in this database.
	define("LOCALSTORAGE_HOST", "localhost");
	define("LOCALSTORAGE_USERNAME", "root");
	define("LOCALSTORAGE_PASSWORD", "password");
	define("LOCALSTORAGE_DATABASE", "localstorage");
	include("./localstorage.php");
	?>
	
localstorage.php is configured correctly now. Have fun.

**Creating a new of saving the localStorage variables**

I've made adding new sources flexible. The constant "LOCALSTORAGE_TYPE" corresponds to the file name; so "mysql" corresponds to "mysql.php". If you want to add a new source, the class should be called "LocalStorage" and it should implement the interface "LocalStorageInterface". For inspiration, see "file.php" and "mysql.php".