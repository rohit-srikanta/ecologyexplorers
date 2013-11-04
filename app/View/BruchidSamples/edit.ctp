
<html>

<div>
		<?php echo $this->element('links'); ?>
</div>

<?php $this->Html->addCrumb('Modify Ecology Explorers Data', '/teachers/modifySpeciesData');
$this->Html->addCrumb('Modify Data', '/ArthroSamples/modifyDataPickDate');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>
<br><br><br>

<p><b>Edit Bruchid Data</b></p>
<br>
        <?php echo $this->Form->create('BruchidSample', array('class'=>'form'));     
        echo $this->Form->input('observer', array('size'=>25,'div'=>'formfield'));
        echo $this->Form->input('tree_type', array('div'=>'formfield','options' => $treeOptions));
        echo $this->Form->input('site_type', array('div'=>'formfield','options' => $habOptions));
        echo $this->Form->input('location', array('size'=>50,'div'=>'formfield'));
        echo $this->Form->input('id', array('type' => 'hidden')); 
        echo $this->Form->end('Save'); ?>
   
</html>