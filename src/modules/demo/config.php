<?php

use humhub\modules\dashboard\widgets\Sidebar;

return [
    'class' => 'humhub\modules\demo\Module',
    'events' => [
        [
        	'class' => Sidebar::className(),
        	'callback' => [
        		'humhub\modules\demo\Module', 'onSidebarInit'
        	],
        	'event' => Sidebar::EVENT_INIT,
    	],
	'id'        => 'demo',
	'namespace' => 'humhub\modules\demo',
];
