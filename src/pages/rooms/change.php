<p>B.B.DETALIS</p>
<?php if(isset($_SESSION['result'])):?>
<?php echo $_SESSION['result'];
    unset($_SESSION['result']);
?>
<?php else:?>
<form action="#" method="post">
    <p>When:
        <input type="text" name="start" value="<?php echo substr($event['start_event'],11)?> ">
        -
        <input type="text" name="end" value="<?php echo substr($event['end_event'],11)?>">
    </p>
    <p>Notes:
        <input type="text" name="description" value="<?php echo $event['notes_event']?>">

    </p>

    <p>Who:
        <select name="employee">
            <option value="<?php echo $event['employee']?>"><?php echo $event['employee']?></option>
            <?php if($employees):?>
                <?php foreach ($employees as $employee):?>
                    <option value="<?php echo $employee['name']?>"><?php echo $employee['name']?></option>
                <?php endforeach;?>
            <?php endif;?>
        </select>
    </p>
    submitted: <?php echo $event['create_date']?><br>
    <div>

            <input type="hidden" name="id" value="<?php echo $event['id']?>">
            <input type="submit" name="update" value="UPDATE">
            <input type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this contact?')" value="DELETE">
        </form>
    </div>
<?php endif;?>

