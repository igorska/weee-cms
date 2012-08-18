<div style="width: 300px; margin: auto;">
    <?php echo CHtml::errorSummary($model); ?>
    <form method="post">
        <label>Логин</label>
        <input type="text" class="input-block-level" value="<?php echo $model->login; ?>" name="LoginForm[login]"/>

        <label>Пароль</label>
        <input type="password" class="input-block-level" value="<?php echo $model->password; ?>" name="LoginForm[password]"/>

        <br/><br/>
        <input type="submit" class="btn btn-primary" value="Войти"/>
    </form>
</div>
