
<a href="/rooms">Main page</a>
<h1>Employee List</h1>
<table>
    <tr>
        <th style="padding-right: 30px">Name</th>
        <th style="padding-right: 30px">Remove</th>
        <th style="padding-right: 30px">Edit</th>
    </tr>

    <?php
    foreach ($employees as $employee):?>
    <tr>
        <td style="padding-right: 30px"><a href="mailto:<?=$employee['email']?>"><?=$employee['name']?></a></td>
        <td style="padding-right: 30px">
            <a onclick="return confirm('Are you sure you want to delete this contact?')"
               href="/employee/delete/<?=$employee['id']?>">
               Remove
            </a>
        </td>
        <td style="padding-right: 30px"><a href="/employee/update/<?=$employee['id']?>">Edit</a></td>
    </tr>
    <?php endforeach;?>

</table>
<br>
<a href="/employee/create">Add a new Employee</a>
<h3>
    <?php $messenger->printResult();?>
    <?php $messenger->printError();?>
</h3>
</body>
</html>