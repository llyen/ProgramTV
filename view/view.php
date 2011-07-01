<?php
$program = new Program($database);
$program = $program->getByChannelId($_GET['id']);
$items = array();
if($_POST){
    $programId = $_POST['id'];
    $selected = new Program($database);
    $selected = $selected->get($programId)->fetch();
    $item = new Item($database);
    foreach(unserialize($selected['program_items']) as $hour => $itemId){
        $i = $item->get($itemId)->fetch();
        $items[date('H:i', $hour)] = $i['item_name'];
    }
} else {
    
}

?>
<div id="container-main">
    <div id="header-main">
        <h3>ProgramTV</h3>
        <p>Projekt na zaliczenie z przedmiotu technologie internetowe</p>
    </div>
    <div id="nav">
        <ul>
            <li><a href="<?=Router::uri();?>">Strona główna</a></li>
        </ul>
    </div>
    <form action="" method="post">
        Program z dnia:
        <select name="id">
            <?php while($p = $program->fetch()): ;?>
            <option value="<?=$p['program_id'];?>"><?=$p['program_date'];?></option>
            <?php endwhile; ?>
        </select>
        <input type="submit" value="wybierz" />
    </form>
    
    <div id="content-main">
        <h3><?=$selected['channel_name'];?></h3>
        <table class="program">
        <?php foreach($items as $h => $i): ?>
        <tr>
            <td><?=$h;?></td><td><?=$i;?></td>
        </tr>
        <?php endforeach; ?>
        </table>
    </div>
        
    <div id="footer">
        Copyright &copy; 2011. All Rights Reserved.<br />Jakub Wawrzyniak &amp; Marcin Radajewski
    </div>
</div>