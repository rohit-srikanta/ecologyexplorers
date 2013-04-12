<html>
<h2>Welcome to the Ecology Explorers Data Center!</h2>
<br>
<br>
<body>


	<p>
		<?php if(!($this->Session->read('UserType')))
		{?>
	
			<p class="text">Registered participants can enter data from an Ecology Explorers research project</p>
			<p class="text">Everybody may download data from all Ecology Explorers research projects</p>
			<div class="text">
				<ul>
					<li><?php echo$this->Html->link('Teacher directions', '/files/myfile.pdf');?>
					</li>
					<li><?php echo$this->Html->link('Student directions', '/files/myfile1.pdf');?>
					</li>
				</ul>
			</div>
	
			<div class="seperation"></div>
			<p>Submit Data</p>
			<p>Submit data from your Ecology Explorer research project.</p>
	
			<p>Available only to registered Ecology Explorers teachers.
			<?php echo "Click Here to ".$this->Html->link('Login',array('controller' => 'teachers', 'action' => 'login'));?>
			<?php echo "Click Here to ".$this->Html->link('Register',array('controller' => 'teachers', 'action' => 'register'));?>
		
			<div class="seperation"></div>
		<?php }
	?>

	<p>
		<?php if('A' == $this->Session->read('UserType'))
		{?>
			Welcome back <?php echo $this->Session->read('Username')?>!<br> <br>
			<?php echo $this->Html->link('Approve Users', array('action' => 'approveUser'));?>
			<br> <br>
			<?php echo $this->Html->link('Create Schools', array('controller' => 'schools', 'action' => 'createSchool'));?>
			<br> <br>
			<?php echo $this->Html->link('Modify Users', array('action' => 'modifyUser'));?>
			<br><br>
			<?php echo $this->Html->link('Modify Species Data', array('controller' => 'birdtaxon', 'action' => 'modifyBirdTaxonData'));?>
			<br><br>
		<?php }
		?>
		<?php if($this->Session->read('User'))
		{
			echo $this->Html->link('Edit Profile', array('action' => 'editProfile'));?>
			<br> <br>
			<?php echo $this->Html->link('Create Class',  array('controller' => 'teachersclass', 'action' => 'createClass')); ?>
			<br> <br>
			<?php echo $this->Html->link('Create Site',  array('controller' => 'sites', 'action' => 'createSite')); ?>
			<br> 
			</p><div class="seperation"></div><p>
				<?php echo $this->Html->link('Submit Data',  array('controller' => 'teachers', 'action' => 'submitData'));?>
			<p>Submit data from your Ecology Explorer research project</p>		
			<p>Available only to registered Ecology Explorers teachers.</p>
		
			<div class="seperation"></div><p>
	
		<?php 
		}?>
		<?php echo $this->Html->link('Download Data',array('controller' => 'teachers', 'action' => 'downloadData'));?>

	<p>Query data from other Ecology Explorers or some of the CAP-LTER research projects</p>
	<p>Available to both guests and registered Ecology Explorers users.</p>
	<?php if($this->Session->check('User'))
	{?>
		<div class="seperation"><br><div class="logout">		
		<?php echo $this->Form->postLink('Logout', array('controller' => 'teachers','action' => 'logout'));
	}
	?>
	</div>


	<br>
</body>
</html>
