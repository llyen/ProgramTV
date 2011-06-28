<?php
if($_SESSION['admin']!='true') Router::redirect('admin');

$category = new Category($database);
$result = $category->get();
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny :: Kategorie</h2>
    <div id="nav">
        <ul>
            <li><a href="<?php echo Router::uri('admin_panel');?>">&laquo; Wstecz</a></li>
            <li><a href="<?php echo Router::uri('admin_category');?>">Wyświetl</a></li>
            <li><a href="<?php echo Router::uri('admin_category_add');?>">Dodaj</a></li>
        </ul>
    </div>
</div>
<div id="content">
    <table>
        <tr><td style="width: 500px;">Nazwa</td><td>Akcje</td></tr>
        <?php while($c = $result->fetch()): ?>
        <tr>
            <td><?=$c['category_name'];?></td>
            <td>
                <a href="<?=Router::uri('admin_category_edit', array($c['category_id']));?>">edytuj</a>
                <a href="<?=Router::uri('admin_category_delete', array($c['category_id']));?>">usuń</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>