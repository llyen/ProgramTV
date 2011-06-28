<?php
if($_SESSION['admin']!='true') Router::redirect('admin');

$channel = new Channel($database);
$result = $channel->get();
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny :: Kanały</h2>
    <div id="nav">
        <ul>
            <li><a href="<?php echo Router::uri('admin_panel');?>">&laquo; Wstecz</a></li>
            <li><a href="<?php echo Router::uri('admin_channel');?>">Wyświetl</a></li>
            <li><a href="<?php echo Router::uri('admin_channel_add');?>">Dodaj</a></li>
        </ul>
    </div>
</div>
<div id="content">
    <table>
        <tr><td style="width: 150px;">Nazwa</td><td style="width: 350px;">Opis</td><td>Akcje</td></tr>
        <?php while($c = $result->fetch()): ?>
        <tr>
            <td><?=$c['channel_name'];?></td>
            <td><?  if(strlen($c['channel_description'] > (int) $settings->params['other']['cut_after'])){
                        echo substr($c['channel_description'], 0, $settings->params['other']['cut_after']).'..';
                    } else {
                        echo $c['channel_description'];
                    }?>
            </td>
            <td>
                <a href="<?=Router::uri('admin_channel_edit', array($c['channel_id']));?>">edytuj</a>
                <a href="<?=Router::uri('admin_channel_delete', array($c['channel_id']));?>">usuń</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>