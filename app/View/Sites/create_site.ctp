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
			} else if ($value == 'AR') {
				$('#arthro').show();
				$('#birds').hide();
				$('#veg').show();
				$('#arthro_desc').show();
				$('#birds_desc').hide();
				$('#veg_desc').hide();
				$('#bruchids_desc').hide();
			} else if ($value == 'BI') {
				$('#arthro').hide();
				$('#birds').show();
				$('#veg').hide();
				$('#arthro_desc').hide();
				$('#birds_desc').show();
				$('#veg_desc').hide();
				$('#bruchids_desc').hide();
			} else if ($value == 'VE') {
				$('#arthro').hide();
				$('#birds').hide();
				$('#veg').show();
				$('#arthro_desc').hide();
				$('#birds_desc').hide();
				$('#veg_desc').show();
				$('#bruchids_desc').hide();
			} else if ($value == 'BR') {
				$('#arthro').hide();
				$('#birds').hide();
				$('#veg').hide();
				$('#arthro_desc').hide();
				$('#birds_desc').hide();
				$('#veg_desc').hide();
				$('#bruchids_desc').show();
			}
		}).change();
	});
</script>
</head>

<br>
<div class="topright">
	<?php echo $this->Html->link($this->Session->read('Username'),array('controller' => 'teachers', 'action' => 'home')); ?>
</div>
<div class="topleft">
	<?php 
	echo $this->Html->link('<< Back','javascript:history.back(1);');?>
	</div>
<br>
<br>
<?php echo $this->Form->create('Site',array('class'=>'form','id' => 'createSite'));   ?>

<legend class="formfield">
	<b>Site Description</b>
</legend>

<div class="formfield">
	<?php echo $this->Form->input('school',array('div'=>'formfield_school','options' => $schooloptions));
 echo $this->Form->input('Habitat.type',array('div'=>'formfield','empty' => 'Select','label' => 'Habitat Type','options' => $habitatTypeOptions,'id' => 'habitat_select')); 
 echo $this->Form->input('site_Id',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
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
	<p class="formtitle">Provide a description of the site (trap line
		location) you are collecting data at. If you are collecting data at
		seven pitfall trap lines on your campus, you will enter seven
		different sites. You will need to provide a description of the habitat
		structure along your pitfall trap line. The description includes the
		amount and type of vegetation (or non-vegetation) at different heights
		in your trap line area.</p>
</div>

<div class="formfield" id="birds_desc">
	<p class="formtitle">Provide a site and habitat description of
		your point count location. If you are collecting data at seven
		locations on your campus, you will enter seven different sites. The
		description includes the amount and type of vegetation (or
		non-vegetation) at different heights in your point count circle.</p>
</div>

<div class="formfield" id="bruchids_desc">
	<p class="formtitle">Provide a site description of where you
		collected Palo Verde pods. If you are collecting data at seven
		locations, you will enter seven different sites.</p>
</div>

<div class="formfield" id="veg_desc">
	<p class="formtitle">Provide a site and habitat description of
		your research site. If you are collecting data at various locations on
		your campus, you will need to enter a description for each research
		site. The description includes the amount and type of vegetation (or
		non-vegetation) at different heights in your research site.</p>
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
	<?php echo $this->Form->input('Habitat.area',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); ?>
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
 echo $this->Form->input('Habitat.water',array('label'=> '% Water','options' => $percentOptions,'div'=>'formfield'));  ?>
</div>

<?php echo $this->Form->end('Create Site',array('div'=>'submit')); ?>

</html>
