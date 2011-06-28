<?php
if($_SESSION['admin']!='true') Router::redirect('admin');

if($_POST){
    $item = new Item($database);
    if($item->save($_POST)){
        $result = '<div class="info">Operacja zakończyła się powodzeniem.</div>';
    }else{
        $result = '<div class="error">Nie udało się dodać nowego kanału.</div>';
    }
}
$category = new Category($database);
$results = $category->get();
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny :: Pozycje :: Dodaj</h2>
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
    <form action="" method="post">
    <table id="channel">
        <tr><td>Nazwa</td></tr>
        <tr><td><input type="text" name="item_name" /></td></tr>
        <tr><td>Kategoria</td></tr>
        <tr>
            <td>
                <select name="category_id">
                <?php while($c = $results->fetch()): ?>
                    <option value="<?=$c['category_id'];?>"><?=$c['category_name'];?></option>
                <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr><td>Opis</td></tr>
        <tr><td><textarea name="item_description"></textarea></td></tr>
        <tr><td>Czas trwania</td></tr>
        <tr><td><input type="text" name="item_delay" /></td></tr>
        <tr></tr>
        <tr><td><input type="submit" value="dodaj" /></td></tr>
    </table>
    </form>
</div>