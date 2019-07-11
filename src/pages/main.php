<!doctype html>
<html lang="en">
<head>
    <style>
        .form {
            margin-left: auto;
        }

        label {

            font-weight: normal;
        }

        .btn {
            margin-top: 3px;
        }

        h3 {
            color: red;
            text-align: center;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="form" style="">
    <?php if (isset($_SESSION['name'])): ?>
        <h3>Hello <?= ucfirst($_SESSION['name']) ?></h3>
        <a href="/rooms/1">Rooms</a>
        <a href='/logout'>Out</a>
    <?php else : ?>
        <form action="/login" method="post">
            <div class="group">
                <label>login</label><br>
                <input type="text" name="login" required>
            </div>
            <div class="group">
                <label>password</label><br>
                <input type="password" name="password" required>
            </div>
            <input type="submit" name="submit" class="btn">
        </form>
    <?php endif; ?>
</div>
<?php if (isset($_GET['error']) && $_GET['error'] === '1') : ?>
    <h3>Invalid username or password</h3>
<?php endif; ?>

</body>
</html>




