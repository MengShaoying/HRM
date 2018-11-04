<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>{{ project::$entity_display_name }}</title>
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
        @foreach (project::$struct_types as $struct => $type)
        <th>{{ array_key_exists($struct, project::$struct_display_names)? project::$struct_display_names[$struct]: $struct }}</th>
        @endforeach
        <th>
            <a href='/projects/add'>添加</a>
        </th>
    </tr>
</thead>
    @foreach ($projects as $id => $project)
    <tr>
        <td>{{ $id }}</td>
        @foreach (project::$struct_types as $struct => $type)
        @if (project::$struct_types[$struct] === 'enum')
        <td>{{ $project->{'get_'.$struct.'_description'}() }}</td>
        @else
        <td>{{ $project->{$struct} }}</td>
        @endif
        @endforeach
        <td>
            <a href='/projects/update/{{ $project->id }}}'>修改</a>
            <a href='javascript:delete_{{ $project->id }}.submit();'>删除</a>
            <form id='delete_{{ $project->id }}' action='/projects/delete/{{ $project->id }}' method='POST'></form>
        </td>
    </tr>
    @endforeach
<tbody>
</tbody>
</table>
</body>
</html>