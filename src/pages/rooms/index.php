<?php include DIR . "template/header.php" ?>
<div class="ontainer">
    <h1>
    <div align="center">
        <a href="/rooms?ym=<?= $_GET['ym'] ?>&room=1">Room 1</a>|
        <a href="/rooms?ym=<?= $_GET['ym'] ?>&room=2">Room 2</a>|
        <a href="/rooms?ym=<?= $_GET['ym'] ?>&room=3">Room 3</a>
    </div>
    </h1>
    <a href='/logout' id="logout">Logout</a>
</div>
<hr>
<div class="container">
    <ul class="list-inline">
        <li class="list-inline-item"><a href="?ym=<?= $prev; ?>" class="btn btn-link">&lt; prev</a></li>
        <li class="list-inline-item"><span class="title"><?= $title; ?></span></li>
        <li class="list-inline-item"><a href="?ym=<?= $next; ?>" class="btn btn-link">next &gt;</a></li>
    </ul>
    <p class="text-right"><a href="/rooms">Today</a></p>
    <table class="table table-bordered" align="left" style="background: aliceblue">
        <thead>
        <tr>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
            <th>Sunday</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($weeks as $week) {
            echo $week;
        }
        ?>
        </tbody>
    </table>

</div>
<div id="links">
    <a href="/book/create">Book It</a><br>
    <a href="/employee">Employee List</a>
</div>
</div>
</div>

<script>
    function basicPopup(url) {
        popupWindow = window.open(url, 'popUpWindow', 'height=500,width=500,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
    }
</script>
</body>
</html>