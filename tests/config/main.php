<?php
// Define the include paths.
use JoeFallon\AutoLoader;

define("APPLICATION_ENV", "development");
define("BASE_PATH", realpath(dirname(__FILE__) . "/../../"));
define("SRC_PATH", BASE_PATH . "/src");
define("VEND_PATH", BASE_PATH . "/vendor");
define("TESTS_PATH", BASE_PATH . "/tests");

set_include_path(get_include_path() . ":" . SRC_PATH . ":" . TESTS_PATH);

// Composer autoloading.
require(VEND_PATH . "/autoload.php");

// All other (i.e. non-composer) autoloading.
AutoLoader::registerAutoLoad();

define("DB_HOST", "localhost");
define("DB_PORT", 3306);
define("DB_NAME", "doctrine_spike");
define("DB_USER", "doctrine_spike");
define("DB_PASS", "doctrine_spike");
