<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>All Customers</h2>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Dob</th>
    </tr>

    @foreach($data as $obj)
        <tr>
            <td>{{$obj->id}}</td>
            <td>{{$obj->name}}</td>
            <td>{{$obj->address}}</td>
            <td>{{$obj->dob}}</td>
        </tr>
    @endforeach
</table>

</body>
</html>

