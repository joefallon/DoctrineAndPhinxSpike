<?php
use JoeFallon\KissTest\UnitTest;

require("config/main.php");
require("config/db_cleaner.php");
require("config/doctrine.php");

UnitTest::getAllUnitTestsSummary();