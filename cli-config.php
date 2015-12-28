<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require("tests/config/main.php");
require("tests/config/db_cleaner.php");
require("tests/config/doctrine.php");

global $entityManager;

return ConsoleRunner::createHelperSet($entityManager);
