<?php
error_reporting(E_ALL | E_STRICT);
ob_start();

require_once 'system/class.settings.php';
require_once 'system/class.database.php';
require_once 'system/class.router.php';
require_once 'system/abstract.class.element.php';
require_once 'system/class.item.php';
require_once 'system/routes.php';

$settings = new Settings();
$database = new Database($settings);
//$item = new Item();


?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ProgramTV</title>
    </head>
<body>
    
    <?php  require_once 'view/'.$route.'.php';  ?>
    
</body>
</html>
<?php
ob_end_flush();
?>