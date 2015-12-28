<?php
use JoeFallon\KissTest\UnitTest;

require("config/main.php");
require("config/db_cleaner.php");
require("config/doctrine.php");


/*
 * Entity Tests
 */
new ProductTests();



UnitTest::getAllUnitTestsSummary();
