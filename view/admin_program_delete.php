<?php
if($_SESSION['admin']!='true') Router::redirect('admin');

$program = new Program($database);
$programId = $_GET['id'];
if($program->remove($programId)){
    $result = '<div class="info">Operacja zakończyła się powodzeniem.</div>';
}else{
    $result = '<div class="error">Nie udało się dodać nowego kanału.</div>';
}
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny :: Program :: Usuń</h2>
    <div id="nav">
        <ul>
            <li><a href="<?php echo Router::uri('admin_panel');?>">&laquo; Wstecz</a></li>
            <li><a href="<?php echo Router::uri('admin_program');?>">Wyświetl</a></li>
        </ul>
    </div>
</div>
<div id="content">
    <?=$result;?>
</div>