<?php
$channel = new Channel($database);
$channels = $channel->get();
?>
<div id="container-main">
    <div id="header-main">
        <h3>ProgramTV</h3>
        <p>Projekt na zaliczenie z przedmiotu technologie internetowe</p>
    </div>
    <div id="nav">
        <ul>
            <li><a href="<?=Router::uri();?>">Strona główna</a></li>
        </ul>
    </div>
    
    <div id="content-main">
        <p>
            Lista dostępnych programów (w celu uzyskania szczegółów kliknij nazwę):
        </p>
            <?php while($c = $channels->fetch()): ?>
            <p class="name"><a href="<?=Router::uri('view', array($c['channel_id']));?>"><?=$c['channel_name'];?></a></p>
            <p class="desc"><?=$c['channel_description'];?></p>
            <?php endwhile; ?>
    </div>
        
    <div id="footer">
        Copyright &copy; 2011. All Rights Reserved.<br />Jakub Wawrzyniak &amp; Marcin Radajewski
    </div>
</div>