<html>
<head>
</head>

<br>
<?php echo $this->Html->link('Home',array('controller' => 'teachers', 'action' => 'back')); ?>
<br>

<?php echo $this->Form->create('Habitat',array('class'=>'form'));   ?>
<legend class="formfield">
	<b>Habitat Details</b>
	<p> Please verify the Habitat details. Update the details if necessary	</p>
</legend>
<div class="formfield">
	<?php echo $this->Form->input('school',array('div'=>'formfield_school','options' => $schooloptions,'disabled' => 'disabled'));
 echo $this->Form->input('Habitat.type',array('disabled' => 'disabled','div'=>'formfield','empty' => 'Select','label' => 'Habitat Type','options' => $habitatTypeOptions,'id' => 'habitat_select')); 
 echo $this->Form->input('site_name',array('disabled' => 'disabled','div'=>'formfield','options' => $siteOptions,'error' => array('wrap' => 'div','class' => 'formerror')));  ?>
 </div>
<div class="formfield">
	<?php   
 echo $this->Form->input('Habitat.recording_date',array('div'=>'formfield'));  ?>
</div>

<?php if('AR' == $this->request->data['Habitat']['type']){ ?>
<div class="formfield" id="arthro">
	<?php  echo $this->Form->input('Habitat.num_traps',array('options' => $percentOptions,'div'=>'formfield'));  
  echo $this->Form->input('Habitat.trap_arrange',array('default'=> 'Line', 'div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));?>
</div>
<?php }?>

<?php if('VE' == $this->request->data['Habitat']['type']){ ?>
<div class="formfield" id="veg">
	<?php echo $this->Form->input('Habitat.area',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); ?>
</div>
<?php }?>

<?php if('BI' == $this->request->data['Habitat']['type']){ ?>
<div class="formfield" id="birds">
	<?php echo $this->Form->input('Habitat.percent_observed',array('options' => $percentOptions,'div'=>'formfield'));  
echo $this->Form->input('Habitat.radius',array('options' => $percentOptions,'div'=>'formfield')); ?>
</div>
<?php }?>

<legend class="formfield">
	<b>Vegetation (> 1.5 m) </b>
</legend>

<div class="formfield">
	<?php  echo $this->Form->input('Habitat.tree_canopy',array('label' => '% Tree Canopy', 'options' => $percentOptions,'div'=>'formfield')); ?>
</div>

<legend class="formfield">
	<b>Vegetation (0.15 m - 1.5 m) </b>
</legend>

<div class="formfield">
	<?php echo $this->Form->input('Habitat.scrub_cover',array('label' => '% Shrub Cover','options' => $percentOptions,'div'=>'formfield')); ?>
</div>

<legend class="formfield">
	<b>Vegetation and Non-Vegetation (0 m - 0.15 m)</b>
</legend>

<div class="formfield">
	<?php echo $this->Form->input('Habitat.gravel_soil',array('label'=> '% Gravel or Soil','options' => $percentOptions,'div'=>'formfield'));
 echo $this->Form->input('Habitat.lawn',array('label'=> '% Lawn','options' => $percentOptions,'div'=>'formfield')); 
 echo $this->Form->input('Habitat.paved_building',array('label'=> '% Paved or Building','options' => $percentOptions,'div'=>'formfield')); 
 echo $this->Form->input('Habitat.other',array('label' => '% Other Vegetation', 'options' => $percentOptions,'div'=>'formfield')); 
 echo $this->Form->input('Habitat.water',array('label'=> '% Water','options' => $percentOptions,'div'=>'formfield'));  ?>
</div>

<?php echo $this->Form->end('Update Habitat',array('div'=>'submit')); ?>
</html>
