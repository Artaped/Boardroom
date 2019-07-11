<div>
    <a href="/rooms/1">Room</a>
</div>
<form action="#" method="post">
    <div>
        <div>
            <div>1)Enter new administrator's name <br>
            (required). <br>
                <input type="text" name="name" placeholder="Name"></div>
            <div> 2)Enter new administrator's email <br>
            (required). <br>
                <input type="text" name="email"></div>
            <div>
                <input type="submit" name="submit" value="Add">
            </div>
        </div>
    </div>
    <br>
</form>
<div>
    <h3>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </h3>
</div>

