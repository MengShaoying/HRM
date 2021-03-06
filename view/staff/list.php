<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>{{ staff::$entity_display_name }}</title>
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
        @foreach (staff::$struct_types as $struct => $type)
        <th>{{ array_key_exists($struct, staff::$struct_display_names)? staff::$struct_display_names[$struct]: $struct }}</th>
        @endforeach
        <th>
            <a href='/staffs/add'>添加</a>
        </th>
    </tr>
</thead>
    @foreach ($staffs as $id => $staff)
    <tr>
        <td>{{ $id }}</td>
        @foreach (staff::$struct_types as $struct => $type)
        @if (staff::$struct_types[$struct] === 'enum')
        <td>{{ $staff->{'get_'.$struct.'_description'}() }}</td>
        @else
        <td>{{ $staff->{$struct} }}</td>
        @endif
        @endforeach
        <td>
            <a href='/staffs/update/{{ $staff->id }}}'>修改</a>
            <a href='javascript:delete_{{ $staff->id }}.submit();'>删除</a>
            <form id='delete_{{ $staff->id }}' action='/staffs/delete/{{ $staff->id }}' method='POST'></form>
        </td>
    </tr>
    @endforeach
<tbody>
</tbody>
</table>
</body>
</html>