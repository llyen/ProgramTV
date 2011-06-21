<?php
if($_SESSION['admin'] == 'true'){
    Router::redirect('admin_panel');
}elseif($_POST){
    if(User::authUser($settings, $database, $_POST)){
        $_SESSION['admin'] = 'true';
        Router::redirect('admin_panel');
    }else{
        $error = 'Nieprawidłowy login lub hasło.';
    }
}//else{
?>
<div id="header">
    <h2>ProgramTV :: Panel administracyjny</h2>
</div>
<?=$error;?>
<form method="post" action="">
login: <input type="text" name="login" /><br />
hasło: <input type="password" name="password" /><br />
<input type="submit" value="zaloguj" />
</form>
<?php
//}
?>