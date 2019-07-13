<?php include DIR . "template/header.php" ?>
<div class="ontainer">
    <h3 align="center"><b>This is Rooms page</b></h3>
    <div align="center">
        <a href="/rooms?ym=<?= $_GET['ym'] ?>&room=1">room1</a>
        <a href="/rooms?ym=<?= $_GET['ym'] ?>&room=2">room2</a>
        <a href="/rooms?ym=<?= $_GET['ym'] ?>&room=3">room3</a>
    </div>
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
    <table class="table table-bordered" align="left">
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