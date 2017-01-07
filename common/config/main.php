<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => [
        'languageSwitcher'
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'dateFormat' => 'php:Y-m-d',
            'datetimeFormat' => 'php:Y-m-d H:i:s',
       ],
        'languageSwitcher' => [
            'class' => 'common\components\LanguageSwitcher',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/../messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
    ],
];
