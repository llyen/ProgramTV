<?php
if($_SESSION['admin']!='true') Router::redirect('admin');

$item = new Item($database);
$result = $item->get();
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
<div id="content">
    <table>
        <tr><td>Nazwa</td><td>Kategoria</td><td>Opis</td><td>Czas trwania</td><td>Akcje</td></tr>
        <?php while($c = $result->fetch()): ?>
        <tr>
            <td><?=$c['item_name'];?></td>
            <td><?=$c['category_name'];?></td>
            <td><?  if(strlen($c['item_description'] > (int) $settings->params['other']['cut_after'])){
                        echo substr($c['item_description'], 0, $settings->params['other']['cut_after']).'..';
                    } else {
                        echo $c['item_description'];
                    }?>
            </td>
            <td><?=date('H:i', $c['item_delay']);?></td>
            <td>
                <a href="<?=Router::uri('admin_item_edit', array($c['item_id']));?>">edytuj</a>
                <a href="<?=Router::uri('admin_item_delete', array($c['item_id']));?>">usuń</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>