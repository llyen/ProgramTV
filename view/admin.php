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
<div id="content">
<div class="form">
    <?php if($error!=''): ?>
    <div class="error">
        <?=$error;?>
    </div>
    <?php endif; ?>
    <form method="post" action="">
        <label for="login">login:</label><input id="login" type="text" name="login" /><br />
        <label for="password">hasło:</label><input id="password" type="password" name="password" /><br />
        <input type="submit" value="zaloguj" />
    </form>
</div>
</div>
<?php
//}
?>