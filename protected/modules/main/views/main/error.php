
<br/>
<center><h3><?php echo $error['message']; ?></h3></center>

<?php if (YII_DEBUG === true): ?>
<dl class="dl-horizontal">
    <dt>Файл</dt>
    <dd><?php echo $error['file']; ?></dd>
    
    <dt>Строка</dt>
    <dd><?php echo $error['line']; ?></dd>
    
    <dt>Тип</dt>
    <dd><?php echo $error['type']; ?></dd>
    
    <dt>Трейс</dt>
    <dd><pre><?php echo $error['trace']; ?></pre></dd>
</dl>
<?php endif; ?>
