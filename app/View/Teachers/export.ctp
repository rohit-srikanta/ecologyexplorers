<?php
$line= $dateRetrieved[0];
$this->CSV->addRow(array_keys($line));
foreach ($dateRetrieved as $row)
{
	$this->CSV->addRow($row);
}
$filename='EcologyExplorersData-'.date('Y-m-d-H:i:s');
echo  $this->CSV->render($filename);
?>