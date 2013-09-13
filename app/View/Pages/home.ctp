
<h2>Welcome to the Ecology Explorers Data Center!</h2>
<br>
<br>
<div class="topright">
	<?php echo $this->Html->link($this->Session->read('Username'),array('controller' => 'teachers', 'action' => 'home')); ?>

</div>
	<p class="text">Registered participants can enter data from an Ecology
		Explorers research project</p>
	<p class="text">Everybody may download data from all Ecology Explorers
		research projects</p>
	<div class="text">
		<ul>
			<li><?php echo$this->Html->link('Teacher directions', '/files/TeachersGuide.pdf');?>
			</li>
			<li><?php echo$this->Html->link('Student directions', '/files/myfile1.pdf');?>
			</li>
		</ul>
	</div>
	<p>

		<?php if(!($this->Session->read('UserType')))
		{
    		?>
    		<div class="seperation"></div><p>
    		Submit Data</p>
	<p>Submit data from your Ecology Explorer research project.</p>

	<p>
		Available only to registered Ecology Explorers teachers.

		<?php echo "Click Here to ".$this->Html->link('Login',array('controller' => 'teachers', 'action' => 'login'));?>

		<?php echo "Click Here to ".$this->Html->link('Register',array('controller' => 'teachers', 'action' => 'register')); 		
		}
		?></p>
	

<p>
	<?php if($this->Session->read('User'))
	{
		?><div class="seperation"></div><p>
	<?php echo $this->Html->link('Submit Data',  array('controller' => 'teachers', 'action' => 'submitData')); ?>

	<p>Submit data from your Ecology Explorer research project</p>

	<p>Available only to registered Ecology Explorers teachers.</p>
	<?php }?>
	<div class="seperation"></div><p>
		<?php echo $this->Html->link('Download Data',array('controller' => 'teachers', 'action' => 'downloadData'));?>
		<br>
	
	
	<p>Query data from other Ecology Explorers or some of the CAP-LTER
		research projects</p>

	<p>Available to both guests and registered Ecology Explorers users.</p>

	<?php if($this->Session->check('User'))
	{?>
		<div class="seperation"><br><div class="logout">		
		<?php echo $this->Form->postLink('Logout', array('controller' => 'teachers','action' => 'logout'));
	}
	?>
	</div>
	<br>
