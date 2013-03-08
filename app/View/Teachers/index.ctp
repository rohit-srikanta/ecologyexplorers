<html>
<body>
<div class="indexmain">
<h2>Welcome to the Ecology Explorers Data Center!</h2>
<br>
<br>
<p class="text">Registered participants can enter data from an Ecology Explorers research project</p>
<p class="text">Everybody may download data from all Ecology Explorers research projects</p>
<br>  
<?php if(!($this->Session->read('UserType')))
    	{
			echo "To Participate and enter data ".$this->Html->link('Login',array('controller' => 'teachers', 'action' => 'login'));?>
			<br>
			<br>  
			<?php echo "Dont have a profile? ".$this->Html->link('Register',array('controller' => 'teachers', 'action' => 'register')); 		
		}
?>
<?php if('A' == $this->Session->read('UserType'))
		{
			echo $this->Html->link('Approve Users', array('action' => 'approveUser'));?>
			<br>
			<br>
			<?php echo $this->Html->link('Create Schools', array('controller' => 'schools', 'action' => 'createSchool'));?>
			<br>
			<br>
			<?php echo $this->Html->link('Modify Users', array('action' => 'modifyUser'));
			
		}
?>
<br>
<br>
<?php if($this->Session->check('User'))
		{
			echo $this->Form->postLink('Logout', array('action' => 'logout'));
		}
?>
<br>
<br>
<br>
</body>
</html>
