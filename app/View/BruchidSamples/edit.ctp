
<html>

<div>
		<?php echo $this->element('links'); ?>
</div>

<?php $this->Html->addCrumb('Modify Ecology Explorers Data', '/teachers/modifySpeciesData');
$this->Html->addCrumb('Modify Data', '/ArthroSamples/modifyDataPickDate');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>
<br><br><br>

<p><b>Edit Bruchid Data</b></p>
<br>
        <?php echo $this->Form->create('BruchidSample', array('class'=>'form'));     
        echo $this->Form->input('observer', array('size'=>25,'div'=>'formfield'));
        echo $this->Form->input('tree_type', array('div'=>'formfield','options' => $treeOptions));
        echo $this->Form->input('site_type', array('div'=>'formfield','options' => $habOptions));
        echo $this->Form->input('location', array('size'=>50,'div'=>'formfield'));
        echo $this->Form->input('id', array('type' => 'hidden')); ?>
        
        
        <table>
        <tr>
        <th>Tree Number</th>
        <th>Pod Number</th>
        <th>Number of Holes</th>
        <th>Number of Seeds</th>
        </tr>
        
        		<?php for($i=0;$i<count($this->request->data['BruchidSpecimen']);$i++) { ?>
        
        		<tr>
        			<td><?php echo $this->Form->input('BruchidSpecimen.'.$i.'.tree_no',array('label' => '','size' => '10'))?>
        			</td>
        			<td><?php echo $this->Form->input('BruchidSpecimen.'.$i.'.pod_no',array('label' => '','size' => '10'))?>
        			</td>
        			<td><?php echo $this->Form->input('BruchidSpecimen.'.$i.'.hole_count',array('type' => 'number','label' => ''))?>
        			</td>
        			<td><?php echo $this->Form->input('BruchidSpecimen.'.$i.'.seed_count',array('type' => 'number','label' => ''))?>
        			</td>
        			<td><?php echo $this->Form->input('BruchidSpecimen.'.$i.'.id',array('type' => 'hidden'))?>
        			</td>
        		</tr>
        
        		<?php }?>
        	</table>
        	
       <?php echo $this->Form->end('Save'); ?>
</html>