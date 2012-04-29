<h3>Список модулей</h3>

<?php foreach ($modules as $k => $module): ?>
    <?php if (count($module['models']) == 0) continue; ?>
    
    <hr/>
    <h4><?php echo $module['name']; ?></h4>
    <?php echo $module['description']; ?>
   
    <ul>
        <?php foreach ($module['models'] as $model): ?>
            <li><a href="<?php echo $this->createUrl('/admin/main/modellist', array('module_name' => $k, 'model_name' => $model)); ?>"><?php echo $this->module->getModelName($this->module->loadModel($k, $model)); ?></a></li>
        <?php endforeach; ?>
    </ul>
    
<?php endforeach; ?>

