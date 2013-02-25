<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
   
<p class="header">
<h1>
<?php 
$cakeDescription = __d('cake_dev', 'Ecology Explorers Data');
echo $this->Html->link($this->Html->image('cornerlogo.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://ecologyexplorers.asu.edu/',
					array('target' => '_blank', 'escape' => false)
				);
				echo "Ecology Explorers Data Center";
			?>
</h1>
</p>
