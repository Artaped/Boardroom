<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        table {
            width: auto;
            height: auto;
            border-collapse: collapse;
        }

        td {
            padding: 40px;
            padding-right: 40px;
            border: 1px solid black;
        }

        th {
            padding: 10px;
            border: 1px solid black;
        }

        caption {
            margin-bottom: 20px;
            font-size: 18px;
        }
    </style>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="ontainer">
    <h3 align="center"><b>This is Rooms page</b></h3>
    <div align="center">
        <a href="/rooms/1">room1</a>
        <a href="/rooms/2">room2</a>
        <a href="/rooms/3">room3</a>
    </div>
</div>
<div class="row">
    <div><a href="<?php echo $currentMonthNumber -1;?>"><</a></div>
    <div><a href="<?php echo $currentMonthNumber?>"><?php echo $currentMonth?></a></div>
    <div><a href="<?php echo $currentMonthNumber +1?>">></a></div>
</div>
<hr>
<div class="container" style="width: 70%">
    <div align="center">
        <table border=1>
            <thead>
            <tr>
                <th>Пн</th>
                <th>Вт</th>
                <th>Ср</th>
                <th>Чт</th>
                <th>Пт</th>
                <th>Сб</th>
                <th>Вс</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($month as $week): ?>
                <tr>
                    <?php for ($i = 1; $i <= 7; $i++): ?>
                        <td><a href="/data/<?= $week[$i] ?? "" ?>"><?= $week[$i] ?? "" ?></a></td>
                    <?php endfor; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div style="float: right; margin-top: -350px">
            <a href="/book/create">Book It</a><br>
            <a href="/employee">Employee List</a>
        </div>
    </div>
</div>


</body>
</html>