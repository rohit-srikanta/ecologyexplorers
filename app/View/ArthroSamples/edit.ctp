
<html>

<div>
		<?php echo $this->element('links'); ?>
</div>

<?php $this->Html->addCrumb('Modify Ecology Explorers Data', '/teachers/modifySpeciesData');
$this->Html->addCrumb('Modify Arthropod Species Details	', 'modifyArthroTaxonData');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>
<br><br><br>

<p><b>Edit Arthropod Data</b></p>
<br>
        <?php echo $this->Form->create('ArthroSample', array('class'=>'form'));     
        echo $this->Form->input('comments',array('type'=>'char','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('observer', array('size'=>25,'div'=>'formfield'));
        echo $this->Form->input('id', array('type' => 'hidden')); 
        echo $this->Form->end('Save'); ?>
   
</html>