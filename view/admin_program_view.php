<?php
if($_SESSION['admin']!='true') Router::redirect('admin');

$program = new Program($database);
$channelId = $_GET['id'];
$result = $program->getByChannelId($channelId);
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny :: Programy :: Wyświetl</h2>
    <div id="nav">
        <ul>
            <li><a href="<?php echo Router::uri('admin_panel');?>">&laquo; Wstecz</a></li>
            <li><a href="<?php echo Router::uri('admin_program');?>">Wyświetl</a></li>
            <li><a href="<?php echo Router::uri('admin_program_add', array($channelId));?>">Dodaj</a></li>
        </ul>
    </div>
</div>
<div id="content">
<table>
        <tr><td>Data</td><td>Opcje</td></tr>
        <?php while($p = $result->fetch()): ?>
        <tr>
            <td><?=$p['program_date'];?></td>
            <td>
                <a href="<?=Router::uri('admin_program_delete', array($p['program_id']));?>">usuń</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>