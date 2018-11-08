<?php

class skill_category extends entity
{
    public $structs = [
        'name' => '',
    ];

    public static $entity_display_name = '技能分类';
    public static $entity_description = '技能所属的分类';

    public static $struct_types = [
        'name' => 'text',
    ];

    public static $struct_display_names = [
        'name' => '名称',
    ];

    public static $struct_descriptions = [
        'name' => '分类的名称',
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