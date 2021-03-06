<?php
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Weee CMS',
    'import' => array(
        'application.components.*',
        'm.users.models.User',
        'm.users.components.*',
    ),
    'aliases' => array(
        'weee' => 'application',
    ),
    'defaultController' => 'main/main/index',
    'components' => array(
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                // Module Pages
                'page/<url:\w+>' => 'pages/main/view',
                // Module Blogs
                'blogs/list' => 'blogs/blog/index',
                'blog/<url:\w+>' => 'blogs/blog/view',
                'topic/add' => 'blogs/post/create',
                'topic/edit' => 'blogs/post/update',
                'topic/<id:\d+>' => 'blogs/post/view',
                'topics' => 'blogs/post/index',
                '<controller>/<id:\d+>' => '<controller>/view',
                '<controller>/<action>' => '<controller>/<action>',
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=weee',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'weee_',
            'enableProfiling' => true,
            'enableParamLogging' => true,
        ),
        'authManager' => array(
            'class' => 'PhpAuthManager',
        ),
        'user' => array(
            'class' => 'WebUser',
            'loginUrl' => array('/users/main/login'),
            'allowAutoLogin' => true,
        ),
        'errorHandler' => array(
            'errorAction' => '/main/main/error',
        ),
    ),
    'modules' => array('blogs', 'comments', 'admin',
        'main' => array(
            'class' => 'weee\modules\main\MainModule',
        ),
        'users' => array(
            'class' => 'weee\modules\users\UsersModule',
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '214365',
            'generatorPaths' => array('ext.gii_generators',),
        ),
    ),
);