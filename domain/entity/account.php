<?php

class account extends entity
{
    public $structs = [
        'email' => '',
        'password' => '',
        'last_login_ip' => '',
        'status' => '',
    ];

    public static $entity_display_name = '账户';
    public static $entity_description = '登陆系统所使用的账户';

    public static $struct_types = [
        'email' => 'text',
        'password' => 'text',
        'last_login_ip' => 'text',
        'status' => 'enum',
    ];

    public static $struct_display_names = [
        'email' => '电子邮箱',
        'password' => '密码',
        'last_login_ip' => '最后登陆IP',
        'status' => '状态',
    ];

    public static $struct_descriptions = [
        'email' => '登陆所使用的账号',
        'password' => '登陆所使用的密码',
        'last_login_ip' => '该账户最后一次登陆的IP地址',
        'status' => '账户的状态',
    ];

    const STATUS_VALID = 'VALID';
    const STATUS_INVALID = 'INVALID';

    const STATUS_MAPS = [
        self::STATUS_VALID => '有效',
        self::STATUS_INVALID => '无效',
    ];

    public static $struct_formats = [
        'email' => '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',
        'last_login_ip' => '/^(?:(?:2[0-4][0-9]\.)|(?:25[0-5]\.)|(?:1[0-9][0-9]\.)|(?:[1-9][0-9]\.)|(?:[0-9]\.)){3}(?:(?:2[0-5][0-5])|(?:25[0-5])|(?:1[0-9][0-9])|(?:[1-9][0-9])|(?:[0-9]))$/',
        'status' => self::STATUS_MAPS,
    ];

    public static $struct_format_descriptions = [
        'email' => '请输入有效的电子邮箱地址',
        'last_login_ip' => '请输入有效的IP地址',
        'status' => '请选择范围内的状态',
    ];

    public function __construct()
    {/*{{{*/
        
    }/*}}}*/

    public static function create()
    {/*{{{*/
        return parent::init();
    }/*}}}*/

    public function get_status_description()
    {
        return self::STATUS_MAPS[$this->status];
    }

}