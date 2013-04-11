<html>

<h2>Welcome to the Ecology Explorers Data Center!</h2>
<br>
<br>
<body>
	<div>
		<?php echo $this->element('links'); ?>
	</div>

	<p>Congratulations - your query worked!!</p>
	<br>
	<p>
		<?php
		echo $this->Html->link('To Save Data,Click Here',array('controller'=>'teachers','action'=>'export'), array('target'=>'_blank'));
		?></p>
	<br>
	<p>
		To Download Data... <br> (Warning! This may take a while if you have a
		large file!)
	</p>

	<p>
		<b> If you use a PC</b> Right click on the Save Data Click Here link
		and choose choose "save link as" .<br> Save the file on your computer
		or on a disk.<br> Open up the file in your spreadsheet program (i.e.
		EXCEL).
	</p>
	<p>
		<b>If you use a Mac</b> Right click (or press the Control button while
		clicking) on the Save Data. Click here icon and choose "save link as"
		(in Netscape) or "download link to disk" (in Internet Explorer).<br>
		Save the file on your computer or on a disk.<br> Open up the file in
		your spreadsheet program (i.e. EXCEL).
	</p>

</body>
</html>
