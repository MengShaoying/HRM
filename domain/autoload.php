<?php

spl_autoload_register(function ($class_name) {

    $class_maps = array(
        'account_dao' => 'dao/account.php',
        'account' => 'entity/account.php',
    );

    if (isset($class_maps[$class_name])) {
         include __DIR__.'/'.$class_maps[$class_name];
    }
});
