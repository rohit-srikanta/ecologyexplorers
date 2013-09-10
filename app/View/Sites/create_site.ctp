<html>
<head>
<script>
	$(document).ready(function() {
		$('#habitat_select').change(function() {
			$value = this.value;

			if ($value == '') {
				$('#arthro').hide();
				$('#birds').hide();
				$('#veg').hide();
				$('#arthro_desc').hide();
				$('#birds_desc').hide();
				$('#veg_desc').hide();
				$('#bruchids_desc').hide();
				$('#water').hide();
			} else if ($value == 'AR') {
				$('#arthro').show();
				$('#birds').hide();
				$('#veg').show();
				$('#arthro_desc').show();
				$('#birds_desc').hide();
				$('#veg_desc').hide();
				$('#bruchids_desc').hide();
				$('#water').hide();
			} else if ($value == 'BI') {
				$('#arthro').hide();
				$('#birds').show();
				$('#veg').hide();
				$('#arthro_desc').hide();
				$('#birds_desc').show();
				$('#veg_desc').hide();
				$('#bruchids_desc').hide();
				$('#water').show();
			} else if ($value == 'VE') {
				$('#arthro').hide();
				$('#birds').hide();
				$('#veg').show();
				$('#arthro_desc').hide();
				$('#birds_desc').hide();
				$('#veg_desc').show();
				$('#bruchids_desc').hide();
				$('#water').show();
			} else if ($value == 'BR') {
				$('#arthro').hide();
				$('#birds').hide();
				$('#veg').hide();
				$('#arthro_desc').hide();
				$('#birds_desc').hide();
				$('#veg_desc').hide();
				$('#bruchids_desc').show();
				$('#water').hide();
			}
		}).change();
	});
</script>
</head>

<div>
		<?php echo $this->element('links'); ?>
</div>

<?php
$this->Html->addCrumb('Create Site', 'createSite');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>
<br>	<h2>Site Description</h2>
<?php echo $this->Form->create('Site',array('class'=>'form','id' => 'createSite'));   ?>
<div class="formfield">
	<?php echo $this->Form->input('school_id',array('div'=>'formfield','options' => $schooloptions));
 echo $this->Form->input('Habitat.type',array('div'=>'formfield','empty' => 'Select','label' => 'Habitat Type','options' => $habitatTypeOptions,'id' => 'habitat_select')); 
 echo $this->Form->input('site_id',array('label' => 'Site ID','type'=>'char','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
 echo $this->Form->input('site_name',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));  
 echo $this->Form->input('address',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));  
 echo $this->Form->input('location',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));  
 echo $this->Form->input('description',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
 echo $this->Form->input('city',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
 echo $this->Form->input('zipcode',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));  ?>
</div>

<br>
<legend class="formfield">
	<b>Habitat Description</b>
</legend>

<div class="formfield" id="arthro_desc">
	<p class="formtitle">Please fill out the <?php  echo$this->Html->link('Site and Habitat Description sheet', '/files/site_habitat_arthro.pdf');?> before entering the data. 
	The sheet has information on how the data has to be entered</p>
</div>

<div class="formfield" id="birds_desc">
	<p class="formtitle">Please fill out the <?php  echo$this->Html->link('Site and Habitat Description sheet', '/files/site_habitat_bird.pdf');?> before entering the data. 
	The sheet has information on how the data has to be entered</p>
</div>

<div class="formfield" id="bruchids_desc">
	<p class="formtitle">Please fill out the <?php  echo$this->Html->link('Site and Habitat Description sheet', '/files/site_habitat_bruchids.pdf');?> before entering the data. 
	The sheet has information on how the data has to be entered</p>
</div>

<div class="formfield" id="veg_desc">
	<p class="formtitle">Please fill out the <?php  echo$this->Html->link('Site and Habitat Description sheet', '/files/site_habitat_veg.pdf');?> before entering the data. 
	The sheet has information on how the data has to be entered</p>
</div>

<div class="formfield">
	<?php   
 echo $this->Form->input('Habitat.recording_date',array('div'=>'formfield'));  ?>
</div>

<div class="formfield" id="arthro">
	<?php  echo $this->Form->input('Habitat.num_traps',array('options' => $percentOptions,'div'=>'formfield'));  
  echo $this->Form->input('Habitat.trap_arrange',array('default'=> 'Line', 'div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));?>
</div>

<div class="formfield" id="veg">
	<?php echo $this->Form->input('Habitat.area (m&sup2;)',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); ?>
</div>

<div class="formfield" id="birds">
	<?php echo $this->Form->input('Habitat.percent_observed',array('options' => $percentOptions,'div'=>'formfield'));  
echo $this->Form->input('Habitat.radius',array('options' => $percentOptions,'div'=>'formfield')); ?>
</div>

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
	<?php echo $this->Form->input('Habitat.shrubcover',array('label' => '% Shrub Cover','options' => $percentOptions,'div'=>'formfield')); ?>
</div>

<legend class="formfield">
	<b>Vegetation and Non-Vegetation (0 m - 0.15 m)</b>
</legend>

<div class="formfield">
	<?php echo $this->Form->input('Habitat.gravel_soil',array('label'=> '% Gravel or Soil','options' => $percentOptions,'div'=>'formfield'));
 echo $this->Form->input('Habitat.lawn',array('label'=> '% Lawn','options' => $percentOptions,'div'=>'formfield')); 
 echo $this->Form->input('Habitat.paved_building',array('label'=> '% Paved or Building','options' => $percentOptions,'div'=>'formfield')); 
 echo $this->Form->input('Habitat.other',array('label' => '% Other Vegetation', 'options' => $percentOptions,'div'=>'formfield')); 
 ?>
</div>

<div class="formfield" id="water">
	<?php echo $this->Form->input('Habitat.water',array('label'=> '% Water','options' => $percentOptions,'div'=>'formfield'));  ?>
</div>

<?php echo $this->Form->end('Create Site',array('div'=>'submit')); ?>

</html>
