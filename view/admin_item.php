<?php
if($_SESSION['admin']!='true') Router::redirect('admin');
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny :: Pozycje</h2>
    <div id="nav">
        <ul>
            <li><a href="<?php echo Router::uri('admin_panel');?>">&laquo; Wstecz</a></li>
            <li><a href="<?php echo Router::uri('admin_item');?>">Wyświetl</a></li>
            <li><a href="<?php echo Router::uri('admin_item_add');?>">Dodaj</a></li>
        </ul>
    </div>
</div>