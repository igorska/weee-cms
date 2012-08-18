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
        <link href="/css/admin/app.css?<?php echo filemtime(Yii::getPathOfAlias('www') . '/css/app.css'); ?>" rel="stylesheet">
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                
                <div class="nav-collapse">
                    <ul class="nav">
                        <li><a href="/">← На сайт</a></li>
                    </ul>
                </div>
                
                <a class="brand" href="/admin"><span style="color: #fff; font-weight: 300; font-size: 18px;">Админ-панель</span></a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Контент <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $this->createUrl('/main/newsAdmin/index'); ?>">Новости</a></li>
                                <li><a href="<?php echo $this->createUrl('/main/newsCategoryAdmin/index'); ?>">Категории новостей</a></li>
                                <li><a href="<?php echo $this->createUrl('/main/pageAdmin/index'); ?>">Статические страницы</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav">
                        <li><a href="<?php echo $this->createUrl('/pages/main/view', array('url' => 'about')); ?>">О нас</a></li>
                    </ul>

                    <?php $this->widget('application.modules.users.widgets.Menu'); ?>
                </div>
            </div>
        </div>

        <div id="main_wrapper">
            <?php if (Yii::app()->user->hasFlash('success')): ?>
                <div class="alert alert-success"><?php echo Yii::app()->user->getFlash('success'); ?></div>
            <?php endif; ?>

            <?php
            $this->widget('Breadcrumbs', array(
                'links' => $this->crumbs,
                'homeLink' => '/admin',
                'homeLabel' => 'Админ-панель'
            ));
            ?>

            <div id="content"><?php echo $content; ?></div>
            <div id="notify"></div>

            <div>
                <hr/>
                &copy; GameHosting 2012  <a href="/about" class="feed-link" style="float: right;">О сайте</a>
            </div>
        </div>  
    </body>
</html>
