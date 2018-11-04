<?php

class staff extends entity
{
    public $structs = [
        'name' => '',
        'sex' => '',
    ];

    public static $entity_display_name = '员工';
    public static $entity_description = '员工';

    public static $struct_types = [
        'name' => 'text',
        'sex' => 'enum',
    ];

    public static $struct_display_names = [
        'name' => '姓名',
        'sex' => '性别',
    ];

    public static $struct_descriptions = [
        'name' => '姓名',
        'sex' => '性别',
    ];

    const SEX_MALE = 'MALE';
    const SEX_FEMALE = 'FEMALE';

    const SEX_MAPS = [
        self::SEX_MALE => '男',
        self::SEX_FEMALE => '女',
    ];

    public static $struct_formats = [
        'sex' => self::SEX_MAPS,
    ];

    public static $struct_format_descriptions = [
        'sex' => '请选择性别',
    ];

    public function __construct()
    {/*{{{*/
        
    }/*}}}*/

    public static function create()
    {/*{{{*/
        return parent::init();
    }/*}}}*/

    public function get_sex_description()
    {
        return self::SEX_MAPS[$this->sex];
    }

}