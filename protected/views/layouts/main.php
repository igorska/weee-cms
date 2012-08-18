<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $this->pageTitle; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <script src="/js/jquery.min.js"></script>
        <script src="/js/jqueryui.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/app.js?<?php echo filemtime(Yii::getPathOfAlias('www') . '/js/app.js'); ?>"></script>
        <link href="/css/jqueryui.css" rel="stylesheet">
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/app.css?<?php echo filemtime(Yii::getPathOfAlias('www') . '/css/app.css'); ?>" rel="stylesheet">
    </head>
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <a class="brand" href="/"><span style="color: white;"><?php echo Yii::app()->name; ?></span> <sup>dev</sup></a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li><a href="/about">О сайте</a></li>
                    </ul>
                </div>

                <?php $this->widget('application.modules.users.widgets.Menu'); ?>
            </div>
        </div>

        <div id="main_wrapper">
            <?php if (Yii::app()->user->hasFlash('success')): ?>
                <div class="alert alert-success"><?php echo Yii::app()->user->getFlash('success'); ?></div>
            <?php endif; ?>

            <?php if (Yii::app()->user->hasFlash('info')): ?>
                <div class="alert alert-info"><?php echo Yii::app()->user->getFlash('info'); ?></div>
            <?php endif; ?>

            <?php if (Yii::app()->user->hasFlash('error')): ?>
                <div class="alert alert-error"><?php echo Yii::app()->user->getFlash('error'); ?></div>
            <?php endif; ?>

            <div id="content"><?php echo $content; ?></div>
            <div id="notify"></div>

            <div>
                <hr/>
                &copy; <?php echo Yii::app()->name; ?> <?php echo date('Y'); ?>  <a href="/about" class="feed-link" style="float: right;">О сайте</a>
            </div>
        </div>
    </body>
</html>
