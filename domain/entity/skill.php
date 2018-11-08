<?php

class skill extends entity
{
    public $structs = [
        'name' => '',
    ];

    public static $entity_display_name = '技能';
    public static $entity_description = '人员技能素质';

    public static $struct_types = [
        'name' => 'text',
    ];

    public static $struct_display_names = [
        'name' => '名字',
    ];

    public static $struct_descriptions = [
        'name' => '技能名字',
    ];

    public static $struct_formats = [
        
    ];

    public static $struct_format_descriptions = [
        
    ];

    public function __construct()
    {/*{{{*/
        
    }/*}}}*/

    public static function create()
    {/*{{{*/
        return parent::init();
    }/*}}}*/

}