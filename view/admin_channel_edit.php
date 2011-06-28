<?php
if($_SESSION['admin']!='true') Router::redirect('admin');

if($_POST){
    $channel = new Channel($database);
    if($channel->update($_POST)){
        $result = '<div class="info">Operacja zakończyła się powodzeniem.</div>';
    }else{
        $result = '<div class="error">Nie udało się dodać nowego kanału.</div>';
    }
}
$channel = new Channel($database);
$channelId = $_GET['id'];
$c = $channel->get($channelId)->fetch();
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny :: Kanały :: Edytuj</h2>
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
    <form action="" method="post">
    <input type="hidden" name="channel_id" value="<?=$channelId;?>" />
    <table id="channel">
        <tr><td>Nazwa</td></tr>
        <tr><td><input type="text" name="channel_name" value="<?=$c['channel_name'];?>" /></td></tr>
        <tr><td>Opis</td></tr>
        <tr><td><textarea name="channel_description"><?=$c['channel_description'];?></textarea></td></tr>
        <tr></tr>
        <tr><td><input type="submit" value="edytuj" /></td></tr>
    </table>
    </form>
</div>