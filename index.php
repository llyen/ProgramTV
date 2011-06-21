<?php
session_start();
ob_start();
error_reporting(E_ALL | E_STRICT);
//print_r($_SERVER);
require_once 'system/class.settings.php';
require_once 'system/class.database.php';
require_once 'system/class.router.php';
require_once 'system/class.user.php';
require_once 'system/abstract.class.element.php';
require_once 'system/class.item.php';
require_once 'system/routes.php';

$settings = new Settings();
$database = new Database($settings);
//$item = new Item();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ProgramTV</title>
        <link rel="stylesheet" type="text/css" href="http://127.0.0.1/programtv/style.css" />
        <!--<base href="http://127.0.0.1/programtv/" />-->
    </head>
<body>
    
    <?php  require_once 'view/'.$route.'.php';  ?>
    
</body>
</html>
<?php
ob_end_flush();
?>