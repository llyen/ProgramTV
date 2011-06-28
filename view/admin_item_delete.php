<?php
if($_SESSION['admin']!='true') Router::redirect('admin');

$item = new Item($database);
$itemId = $_GET['id'];
if($item->remove($itemId)){
    $result = '<div class="info">Operacja zakończyła się powodzeniem.</div>';
}else{
    $result = '<div class="error">Nie udało się dodać nowego kanału.</div>';
}
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny :: Pozycje :: Edytuj</h2>
    <div id="nav">
        <ul>
            <li><a href="<?php echo Router::uri('admin_panel');?>">&laquo; Wstecz</a></li>
            <li><a href="<?php echo Router::uri('admin_item');?>">Wyświetl</a></li>
            <li><a href="<?php echo Router::uri('admin_item_add');?>">Dodaj</a></li>
        </ul>
    </div>
</div>
<div id="content">
    <?=$result;?>
</div>