<?php

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return [
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        'booster' => realpath(__DIR__ . '/../extensions/yiibooster'), // change if necessary
        'eflot' => realpath(__DIR__ . '/../extensions/EFLOT'), // change if necessary
    ],
    'name' => 'Intradox',
    'defaultController' => 'site/index',
    'theme' => 'intradox',
    'preload' => [
        'booster',
        'log',
    ],
    'params' => [
        // this is used in contact page
        'adminEmail' => 'John Snook <jsnook@gmail.com>',
        'managerEmail' => 'Marjorie Snook <msnook@newfields.com>',
        'baseUlr' => 'https://id3.newfields.com',
        // this is for defining where the document files will live
        'docs_path' => '/var/lib/intradox/intradox3/',
        'thumbs_path' => '/var/www/intradox3/images/thumbnails/',
        'wc_path' => '/var/lib/sphinxsearch/data/wordcount/',
        'ldap' => [
            'host' => 'venus.newfields.com',
            'ou' => 'users', // such as "people" or "users"
            'dc' => ['newfields', 'com'],
        ],
    ],
    // autoloading model and component classes
    'import' => [
        'application.models.*',
        'application.components.*',
        'application.behaviors.*',
        'booster.*',
        'application.extensions.*',
    ],
    'modules' => [
        // uncomment the following to enable the Gii tool
//        'gii' => [
//            'class' => 'system.gii.GiiModule',
//            'password' => 'heygurl',
//            // If removed, Gii defaults to localhost only. Edit carefully to taste.
//            'ipFilters' => [$_SERVER['REMOTE_ADDR']],
//            'generatorPaths' => [
//                'booster.gii',
//            ],
//        ],

        'intralib' => [
            'defaultController' => 'monograph',
            'edocsPath' => '/var/lib/intradox/intralib2/',
        ],
    ],
    // application components
    'components' => [
        // booster configuration
        'booster' => [
            'class' => 'ext.yiibooster.components.Booster',
        ],
        'user' => [
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ],
        'request' => [
            'hostInfo' => 'https://id3.newfields.com',
        ],
        'db' => [
            'connectionString' => 'pgsql:dbname=intradox3',
            'emulatePrepare' => true,
            'username' => 'intradox3',
            'password' => null,
            'charset' => 'utf8',
            'enableProfiling' => true,
            'enableParamLogging' => true,
        ],
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>[
          'urlFormat'=>'path',
          'rules'=>[
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ],
          ],
         */
        'errorHandler' => [
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ],
        'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                [
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ],
                [
                    'class' => 'CWebLogRoute',
                    'categories' => 'system.db.CDbCommand',
                    'levels' => 'error, warning', // trace to list for goodstuff
                    'showInFireBug' => true,
                ],
            // uncomment the following to show log messages on web pages
//                [
//                    'class' => 'CWebLogRoute',
//                    'enabled' => YII_DEBUG,
//                ],
            ],
        ],
    ],
];
?>