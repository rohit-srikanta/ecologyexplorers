<html>
<body>
<div class="indexmain">
<h2>Welcome to the Ecology Explorers Data Center!</h2>
<br>
<br>
<p class="text">Registered participants can enter data from an Ecology Explorers research project</p>
<p class="text">Everybody may download data from all Ecology Explorers research projects</p>
<div class="text">

</div>

<br> For data entry
<?php echo $this->Html->link('Login',array('controller' => 'teachers', 'action' => 'login')); ?>
<br>
<br> To participate 
<?php echo $this->Html->link('Register',array('controller' => 'teachers', 'action' => 'register')); ?>
<br>
<br>
<?php echo $this->Form->postLink('Logout', array('action' => 'logout'));?>
<br>
<br><br><br><br><br><br>
</body>
</html>
