<?php
if($_SESSION['admin']!='true') Router::redirect('admin');

$channel = new Channel($database);
$channelId = $_GET['id'];
if($channel->remove($channelId)){
    $result = '<div class="info">Operacja zakończyła się powodzeniem.</div>';
}else{
    $result = '<div class="error">Nie udało się usunąć kanału.</div>';
}
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny :: Kanały :: Usuń</h2>
    <div id="nav">
        <ul>
            <li><a href="<?php echo Router::uri('admin_panel');?>">&laquo; Wstecz</a></li>
            <li><a href="<?php echo Router::uri('admin_channel');?>">Wyświetl</a></li>
            <li><a href="<?php echo Router::uri('admin_channel_add');?>">Dodaj</a></li>
        </ul>
    </div>
</div>
<div id="content">
    <?=$result;?>
</div>