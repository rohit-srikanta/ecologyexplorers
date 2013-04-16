
<html>

<div>
	<?php echo $this->element('links'); ?>
</div>
<p><b>Add Cloud Cover</b></p>
<br>
<?php echo $this->Form->create('CloudCover', array('class'=>'form'));     
        echo $this->Form->input('cloud_cover_name', array('div'=>'formfield'));
echo $this->Form->end('Add'); ?>

</html>
