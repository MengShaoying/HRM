<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>{{ skill_category::$entity_display_name }}</title>
    <style>
     table {
         font-family: verdana,arial,sans-serif;
         font-size:11px;
         color:#333333;
         border-width: 1px;
         border-color: #666666;
         border-collapse: collapse;
         width: 100%;
     }
     table th {
         border-width: 1px;
         padding: 8px;
         border-style: solid;
         border-color: #666666;
         background-color: #dedede;
         text-align: center;
     }
     table td {
         border-width: 1px;
         padding: 8px;
         border-style: solid;
         border-color: #666666;
         background-color: #ffffff;
         text-align: center;
     }
    </style>
</head>
<body>
<table>
<thead>
    <tr>
        <th>ID</th>
        @foreach (skill_category::$struct_types as $struct => $type)
        <th>{{ array_key_exists($struct, skill_category::$struct_display_names)? skill_category::$struct_display_names[$struct]: $struct }}</th>
        @endforeach
        <th>
            <a href='/skill_categorys/add'>添加</a>
        </th>
    </tr>
</thead>
    @foreach ($skill_categorys as $id => $skill_category)
    <tr>
        <td>{{ $id }}</td>
        @foreach (skill_category::$struct_types as $struct => $type)
        @if (skill_category::$struct_types[$struct] === 'enum')
        <td>{{ $skill_category->{'get_'.$struct.'_description'}() }}</td>
        @else
        <td>{{ $skill_category->{$struct} }}</td>
        @endif
        @endforeach
        <td>
            <a href='/skill_categorys/update/{{ $skill_category->id }}}'>修改</a>
            <a href='javascript:delete_{{ $skill_category->id }}.submit();'>删除</a>
            <form id='delete_{{ $skill_category->id }}' action='/skill_categorys/delete/{{ $skill_category->id }}' method='POST'></form>
        </td>
    </tr>
    @endforeach
<tbody>
</tbody>
</table>
</body>
</html>