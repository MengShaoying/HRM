<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>{{ staff::$entity_display_name }}[{{ $staff->id }}]修改</title>
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
        @foreach (staff::$struct_types as $struct => $type)
        <th>{{ array_key_exists($struct, staff::$struct_display_names)? staff::$struct_display_names[$struct]: $struct }}</th>
        @endforeach
        <th>
            <a href='javascript:window.history.back(-1);'>取消</a>
        </th>
    </tr>
</thead>
    <tr>
        <form action='' method='POST'>
        @foreach (staff::$struct_types as $struct => $type)
        <td>
            @if (staff::$struct_types[$struct] === 'enum')
            <select name='{{ $struct }}'>
                @foreach (staff::$struct_formats[$struct] as $key => $value)
                <option value='{{ $key }}' {{ $key === $staff->{$struct}?'selected':'' }}>{{ $value }}</option>
                @endforeach
            </select>
            @else
            <input type='{{ $type }}' name='{{ $struct }}' value='{{ $staff->{$struct} }}'>
            @endif
        </td>
        @endforeach
        <td>
            <input type='submit' value='保存'>
        </td>
        </form>
    </tr>
<tbody>
</tbody>
</table>
</body>
<script>
</script>
</html>