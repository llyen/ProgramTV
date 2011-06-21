<?php
if($_SESSION['admin']!='true') Router::redirect('admin_main');
?>
<a href="<?php echo Router::uri('admin_channel');?>">Kanały</a><br />
<a href="<?php echo Router::uri('admin_item');?>">Pozycje</a><br />
<a href="<?php echo Router::uri('admin_program');?>">Programy</a><br />
<a href="<?php echo Router::uri('admin_logout');?>">Wyloguj</a>