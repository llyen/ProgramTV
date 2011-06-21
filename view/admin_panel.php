<?php
if($_SESSION['admin']!='true') Router::redirect('admin');
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny</h2>
    <div id="nav">
        <ul>
            <li><a href="<?php echo Router::uri('admin_channel');?>">Kanały</a></li>
            <li><a href="<?php echo Router::uri('admin_item');?>">Pozycje</a></li>
            <li><a href="<?php echo Router::uri('admin_category');?>">Kategorie</a></li>
            <li><a href="<?php echo Router::uri('admin_program');?>">Programy</a></li>
            <li><a href="<?php echo Router::uri('admin_logout');?>">Wyloguj</a></li>
        </ul>
    </div>
</div>