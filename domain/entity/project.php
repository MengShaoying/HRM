<?php

class project extends entity
{
    public $structs = [
        'name' => '',
        'jira_project_key' => '',
        'description' => '',
    ];

    public static $entity_display_name = '项目';
    public static $entity_description = '项目';

    public static $struct_types = [
        'name' => 'text',
        'jira_project_key' => 'text',
        'description' => 'text',
    ];

    public static $struct_display_names = [
        'name' => '项目名',
        'jira_project_key' => 'JIRA标识',
        'description' => '描述',
    ];

    public static $struct_descriptions = [
        'name' => '项目名',
        'jira_project_key' => '项目在JIRA中的标识符',
        'description' => '项目的大概介绍',
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