<p>B.B.DETALIS</p>
<p>When: <?php echo substr($event['start_event'],11)?> - <?php echo substr($event['end_event'],11)?></p>
<p>Notes:
    <select name="employee">
        <option value="<?php echo $event['employee']?>"><?php echo $event['employee']?></option>
        <?php if($employees):?>
            <?php foreach ($employees as $employee):?>
                <option value="<?php echo $employee['name']?>"><?php echo $employee['name']?></option>
            <?php endforeach;?>
        <?php endif;?>
    </select>
</p>
<p>Who: <?php echo $event['employee']?></p>
submitted: <?php echo $event['create_date']?><br>
<div><button>Update</button>
    <button name="delete">
        <a onclick="return confirm('Are you sure you want to delete this contact?')"
          href="/book/delete/<?=$event['id']?>">
          Remove
        </a></button></div>
