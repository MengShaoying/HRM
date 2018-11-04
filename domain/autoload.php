<?php

spl_autoload_register(function ($class_name) {

    $class_maps = array(
        'account_dao' => 'dao/account.php',
        'project_dao' => 'dao/project.php',
        'staff_dao' => 'dao/staff.php',
        'account' => 'entity/account.php',
        'project' => 'entity/project.php',
        'staff' => 'entity/staff.php',
    );

    if (isset($class_maps[$class_name])) {
         include __DIR__.'/'.$class_maps[$class_name];
    }
});
