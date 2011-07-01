<?php
if($_SESSION['admin']!='true') Router::redirect('admin');

if($_POST){
    $program = new Program($database);
    if($program->save($_POST)){
        $result = '<div class="info">Operacja zakończyła się powodzeniem.</div>';
    }else{
        $result = '<div class="error">Nie udało się dodać nowego kanału.</div>';
    }
}

$channelId = $_GET['id'];
$item = new Item($database);
$items = $item->get();
$options = array();
while($i = $items->fetch()):
    $options[] = "<option value=".$i['item_id'].">".$i['item_name']."</option>";
endwhile;
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny :: Programy :: Dodaj</h2>
    <div id="nav">
        <ul>
            <li><a href="<?php echo Router::uri('admin_panel');?>">&laquo; Wstecz</a></li>
            <li><a href="<?php echo Router::uri('admin_program');?>">Wyświetl</a></li>
            <li><a href="<?php echo Router::uri('admin_program_add', array($channelId));?>">Dodaj</a></li>
        </ul>
    </div>
</div>
<div id="content">
<?=$result;?>
<form action="" method="post">
<input type="hidden" name="channel_id" value="<?=$channelId;?>" />
<table id="form">
        <tr><td style="width: 200px;">Data (w formacie Y-m-d):</td><td><input type="text" name="date" /></td></tr>
        <?php for($i=0; $i<12; $i++): ?>
        <tr>
            <td style="text-align: center;">
                <select name="hours[]">
                    <option value="<?=strtotime('00:00');?>">00:00</option>
                    <option value="<?=strtotime('00:30');?>">00:30</option>
                    <option value="<?=strtotime('01:00');?>">01:00</option>
                    <option value="<?=strtotime('01:30');?>">01:30</option>
                    <option value="<?=strtotime('02:00');?>">02:00</option>
                    <option value="<?=strtotime('02:30');?>">02:30</option>
                    <option value="<?=strtotime('03:00');?>">03:00</option>
                    <option value="<?=strtotime('03:30');?>">03:30</option>
                    <option value="<?=strtotime('04:00');?>">04:00</option>
                    <option value="<?=strtotime('04:30');?>">04:30</option>
                    <option value="<?=strtotime('05:00');?>">05:00</option>
                    <option value="<?=strtotime('05:30');?>">05:30</option>
                    <option value="<?=strtotime('06:00');?>">06:00</option>
                    <option value="<?=strtotime('06:30');?>">06:30</option>
                    <option value="<?=strtotime('07:00');?>">07:00</option>
                    <option value="<?=strtotime('07:30');?>">07:30</option>
                    <option value="<?=strtotime('08:00');?>">08:00</option>
                    <option value="<?=strtotime('08:30');?>">08:30</option>
                    <option value="<?=strtotime('09:00');?>">09:00</option>
                    <option value="<?=strtotime('09:30');?>">09:30</option>
                    <option value="<?=strtotime('10:00');?>">10:00</option>
                    <option value="<?=strtotime('10:30');?>">10:30</option>
                    <option value="<?=strtotime('11:00');?>">11:00</option>
                    <option value="<?=strtotime('11:30');?>">11:30</option>
                    <option value="<?=strtotime('12:00');?>">12:00</option>
                    <option value="<?=strtotime('12:30');?>">12:30</option>
                    <option value="<?=strtotime('13:00');?>">13:00</option>
                    <option value="<?=strtotime('13:30');?>">13:30</option>
                    <option value="<?=strtotime('14:00');?>">14:00</option>
                    <option value="<?=strtotime('14:30');?>">14:30</option>
                    <option value="<?=strtotime('15:00');?>">15:00</option>
                    <option value="<?=strtotime('15:30');?>">15:30</option>
                    <option value="<?=strtotime('16:00');?>">16:00</option>
                    <option value="<?=strtotime('16:30');?>">16:30</option>
                    <option value="<?=strtotime('17:00');?>">17:00</option>
                    <option value="<?=strtotime('17:30');?>">17:30</option>
                    <option value="<?=strtotime('18:00');?>">18:00</option>
                    <option value="<?=strtotime('18:30');?>">18:30</option>
                    <option value="<?=strtotime('19:00');?>">19:00</option>
                    <option value="<?=strtotime('19:30');?>">19:30</option>
                    <option value="<?=strtotime('20:00');?>">20:00</option>
                    <option value="<?=strtotime('20:30');?>">20:30</option>
                    <option value="<?=strtotime('21:00');?>">21:00</option>
                    <option value="<?=strtotime('21:30');?>">21:30</option>
                    <option value="<?=strtotime('22:00');?>">22:00</option>
                    <option value="<?=strtotime('22:30');?>">22:30</option>
                    <option value="<?=strtotime('23:00');?>">23:00</option>
                    <option value="<?=strtotime('23:30');?>">23:30</option>
                </select>
            </td>
            <td>
            <select name="item[]">
            <?php foreach($options as $opt) echo $opt; ?>
            </select>
            </td>
            <!--<td>-->
            <!--    <img src="http://127.0.0.1/programtv/img/plus.png" id="add" alt="dodaj">-->
            <!--</td>-->
        </tr>
        <?php endfor; ?>
        <tr><td><input type="submit" value="dodaj" /></td></tr>
    </table>
</form>
</div>