<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="/rooms">Main page</a>
<h1>Employee List</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Remove</th>
        <th>Edit</th>
    </tr>

    <?php
    foreach ($employees as $employee):?>
    <tr>
        <td><a href="mailto:<?=$employee['email']?>"><?=$employee['name']?></a></td>
        <td>
            <a onclick="return confirm('Are you sure you want to delete this contact?')"
               href="/employee/delete/<?=$employee['id']?>">
               Remove
            </a>
        </td>
        <td><a href="/employee/update/<?=$employee['id']?>">Edit</a></td>
    </tr>
    <?php endforeach;?>

</table>
<br>
<a href="/employee/create">Add a new Employee</a>
<h3>
    <?php $messenger->printError();?>
    <?php $messenger->printResult();?>
</h3>
</body>
</html>