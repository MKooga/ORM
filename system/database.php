<?php

require 'classes/rb.php';
global $cfg;
R::setAutoResolve(TRUE);
R::setup("mysql:host=$cfg[DATABASE_HOSTNAME];dbname=$cfg[DATABASE_DATABASE]", $cfg['DATABASE_USERNAME'], $cfg['DATABASE_PASSWORD']);
R::exec("SET sql_mode = ''");

//R::freeze(TRUE);