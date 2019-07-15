<div>
    <a href="/rooms">Room</a>
</div>
<form action="#" method="post">
            <div>
                <div>
                    <div style="float: left; width: 300px; height: 100px;" >1)Enter new administrator's name <br>
                        (required). <br>
                        <input type="text" name="name"  value="<?php echo $employee['name'] ?>"></div>
                    <div style="float: left; width: 300px; height: 100px;"> 2)Enter new administrator's email <br>
                        (required). <br>
                        <input type="text" name="email"  value="<?php echo $employee['email'] ?>"></div>
                    <div style="float: left; width: 600px; height: 100px;">
                        <input type="submit" name="submit" value="Add">
                    </div>
                </div>
            </div>
</form>
<h3>
    <h3>
        <?php $messenger->printError();?>
        <?php $messenger->printResult();?>
    </h3>
</h3>

