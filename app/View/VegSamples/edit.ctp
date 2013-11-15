
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

<p><b>Edit Vegetation Data</b></p>
<br>
        <?php echo $this->Form->create('VegSample', array('class'=>'form'));     
        echo $this->Form->input('observer', array('size'=>25,'div'=>'formfield'));
        echo $this->Form->input('cactus_count', array('div'=>'formfield'));
        echo $this->Form->input('tree_count', array('div'=>'formfield'));
        echo $this->Form->input('shrub_count', array('div'=>'formfield'));
        echo $this->Form->input('id', array('type' => 'hidden')); ?>
        
        <table >
		<tr>
			<th>Vegetation Id</th>
			<th >Vegetation Type</th>
			<th>Species Name</th>
			<th>CBH (m)</th>
			<th>Height (m) </th>
			<th>Canopy Size (m&sup2;) </th>
			<th>Comments/Location</th>
		</tr>

		<?php for($i=0;$i<count($this->request->data['VegSpecimen']);$i++) { ?>

		<tr>
			<td><?php echo $this->Form->input('VegSpecimen.'.$i.'.veg_no',array('label' => '','size' => '10'))?></td>
			<td><?php echo $this->Form->input('VegSpecimen.'.$i.'.plant_type',array('label' => '','empty' => 'Select','options' => array('Tree' =>'Tree', 'Cactus'=>'Cactus', 'Shrub'=>'Shrub'),))?></td>
			<td><?php echo $this->Form->input('VegSpecimen.'.$i.'.species_id',array('label' => '','empty' => 'Select','options' => $vegOptions))?></td>
			<td><?php echo $this->Form->input('VegSpecimen.'.$i.'.circumference',array('type' =>'number','label' => ''))?></td>
			<td><?php echo $this->Form->input('VegSpecimen.'.$i.'.height',array('label' => '','type' =>'number'))?></td>
			<td><?php echo $this->Form->input('VegSpecimen.'.$i.'.canopy',array('label' => '','type' =>'number'))?></td>
			<td><?php echo $this->Form->input('VegSpecimen.'.$i.'.comments',array('label' => '','type'=>'textarea','rows' => 2, 'cols' => 35))?></td>
			<td><?php echo $this->Form->input('VegSpecimen.'.$i.'.id',array('type' => 'hidden'))?></td>
		</tr>

		<?php }?>
	</table>
        
        
       <?php  echo $this->Form->end('Save'); ?>
   
</html>