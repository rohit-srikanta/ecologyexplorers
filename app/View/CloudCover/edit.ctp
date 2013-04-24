
<html>

<div>
		<?php echo $this->element('links'); ?>
</div>

<?php $this->Html->addCrumb('Modify Ecology Explorers Data', '/teachers/modifySpeciesData');
$this->Html->addCrumb('Modify Cloud Cover Details ', 'modifyCloudCover');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>
<br><br>
<p><b>Edit Cloud Cover </b></p>
<br>
        <?php echo $this->Form->create('CloudCover', array('class'=>'form'));     
        echo $this->Form->input('cloud_cover_name', array('div'=>'formfield'));
        echo $this->Form->input('id', array('type' => 'hidden')); 
        echo $this->Form->end('Save'); ?>
   
</html>