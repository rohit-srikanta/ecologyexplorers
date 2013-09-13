<html>


<br>
<body>
	<div>
		<?php echo $this->element('links'); ?>
	</div>
	<?php  $this->Html->addCrumb('Profile', 'index'); 
	$this->Html->addCrumb('Download Data', 'downloadData');
	$this->Html->addCrumb('Data Retrieved', 'retrievedData');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>

	<p>Congratulations - your query worked !!</p>
	<br>
	<p>
		<?php
		echo $this->Html->image('downloadData.png', array('width'=>'150px'));
		echo $this->Html->link('To Save Data,Click Here',array('controller'=>'teachers','action'=>'export'), array('target'=>'_blank'));
		?></p>
	<br>
	<p>
		To Download Data... <br> (Warning! This may take a while if you have a
		large file!)
	</p>

	<p>
		<b> If you use a PC</b> Click on the To Save Data, Click Here link. <br> Or right click on the To Save Data, Click Here link
		and choose choose "Save Target As" . Save the file on your computer
		or on a disk.
	</p>
	<p>
		<b>If you use a Mac</b> Click on the To Save Data, Click Here link.<br> Right click (or press the Control button while
		clicking) on the Save Data. Click here icon and choose "save link as"
		(in Netscape) or "Save Target As" (in Internet Explorer). Save the file on your computer or on a disk.
	</p>

	<p><br> Once the file has been saved, open up the file in your spreadsheet program (i.e.
		EXCEL).</p>
</body>
</html>
