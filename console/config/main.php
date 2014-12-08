<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'console\controllers',
    'modules' => [
        'gii' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1'],
        'generators' => [
            // generator name
            'rb-model' => [
                //generator class
                'class'     => 'schmunk42\giiant\model\Generator',
                //setting for out templates
                'templates' => [
                    // template name => path to template
                    'rbModel' =>
                    '@app/giiTemplates/model/default',

                ]
            ]
        ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];
