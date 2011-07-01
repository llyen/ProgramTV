<?php
if($_SESSION['admin']!='true') Router::redirect('admin');

$channel = new Channel($database);
$result = $channel->get();
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny :: Programy</h2>
    <div id="nav">
        <ul>
            <li><a href="<?php echo Router::uri('admin_panel');?>">&laquo; Wstecz</a></li>
            <li><a href="<?php echo Router::uri('admin_program');?>">Wyświetl</a></li>
        </ul>
    </div>
</div>
<div id="content">
<table>
        <tr><td style="width: 150px;">Kanał</td></tr>
        <?php while($c = $result->fetch()): ?>
        <tr>
            <td><a href="<?=Router::uri('admin_program_view', array($c['channel_id']));?>"><?=$c['channel_name'];?></a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>