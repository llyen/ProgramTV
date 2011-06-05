<?php

require_once 'system/class.settings.php';

$settings = new Settings();
echo $settings->params['db']['name'];