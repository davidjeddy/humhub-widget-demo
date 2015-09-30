<?php

use humhub\modules\dashboard\widgets\Sidebar;


return [
    'class' => 'davdjeddy\demo\Module\Module',
    'events' => [ 
        // ref: https://www.humhub.org/docs/guide-dev-module-events.html
        [
            'class'    => Sidebar::className(),
            'callback' => [
                'davdjeddy\demo\Module\Module', 'onSidebarInit'
            ],
            'event' => Sidebar::EVENT_INIT,
        ],
    ],
    'id'        => 'demo',
    'namespace' => 'davdjeddy\demo\Module'
];
