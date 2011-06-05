<?php

require_once 'system/class.settings.php';
require_once 'system/class.database.php';

$settings = new Settings();
$database = new Database($settings);