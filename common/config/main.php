<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
	        'class' => 'yii\web\UrlManager',
	        'showScriptName' => false,
	        'enablePrettyUrl' => true,
	        'rules' => [
	        ],
	    ],
	    'view' => [
	         'theme' => [
	             'pathMap' => [
	                '@app/views' => '@app/views/yii2-app'
	             ],
	         ],
	    ],
    ],
    'modules' => [
	    'user' => [
	        'class' => 'dektrium\user\Module',
	        'enableUnconfirmedLogin' => true,
	        'admins' => ['admin']
	    ],
	    'gridview' =>  [
	        'class' => '\kartik\grid\Module',
	        // enter optional module parameters below - only if you need to  
	        // use your own export download action or custom translation 
	        // message source
	        'downloadAction' => 'gridview/export/download',
	        // 'i18n' => []
	    ]
	],
];
