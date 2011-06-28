<?php
if($_SESSION['admin']!='true') Router::redirect('admin');

if($_POST){
    $category = new category($database);
    if($category->update($_POST)){
        $result = '<div class="info">Operacja zakończyła się powodzeniem.</div>';
    }else{
        $result = '<div class="error">Nie udało się dodać nowego kanału.</div>';
    }
}
$category = new category($database);
$categoryId = $_GET['id'];
$c = $category->get($categoryId)->fetch();
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny :: Kategorie :: Edytuj</h2>
    <div id="nav">
        <ul>
            <li><a href="<?php echo Router::uri('admin_panel');?>">&laquo; Wstecz</a></li>
            <li><a href="<?php echo Router::uri('admin_category');?>">Wyświetl</a></li>
            <li><a href="<?php echo Router::uri('admin_category_add');?>">Dodaj</a></li>
        </ul>
    </div>
</div>
<div id="content">
    <?=$result;?>
    <form action="" method="post">
    <input type="hidden" name="category_id" value="<?=$categoryId;?>" />
    <table id="category">
        <tr><td>Nazwa</td></tr>
        <tr><td><input type="text" name="category_name" value="<?=$c['category_name'];?>" /></td></tr>
        <tr></tr>
        <tr><td><input type="submit" value="edytuj" /></td></tr>
    </table>
    </form>
</div>