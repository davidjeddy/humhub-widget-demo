<?php

use humhub\modules\dashboard\widgets\Sidebar;

return [
    'class' => 'humhub\modules\demo\Module',
    'events' => [ 
        // ref: https://www.humhub.org/docs/guide-dev-module-events.html
        [
            'class'    => Sidebar::className(),
            'callback' => [
                'humhub\modules\demo\Module', 'onSidebarInit'
            ],
            'event' => Sidebar::EVENT_INIT,
        ],
    ],
    'id'        => 'demo',
    'namespace' => 'humhub\modules\demo'
];
