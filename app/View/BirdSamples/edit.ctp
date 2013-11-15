
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

<p><b>Edit Bird Data</b></p>
<br>
        <?php echo $this->Form->create('BirdSample', array('class'=>'form'));     
        echo $this->Form->input('comments',array('type'=>'char','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('observer', array('size'=>25,'div'=>'formfield'));
        echo $this->Form->input('time_start', array('div'=>'formfield'));
        echo $this->Form->input('time_end', array('div'=>'formfield'));
        echo $this->Form->input('id', array('type' => 'hidden')); ?>
        
        <table>
        <tr>
        <th>Species Name</th>
        <th>Number of Birds</th>
        </tr>
        
        		<?php for($i=0;$i<count($this->request->data['BirdSpecimen']);$i++) { ?>
        
        		<tr>
        			<td><?php echo $this->Form->input('BirdSpecimen.'.$i.'.species_id',array('label' => '','empty' => 'Select','options' => $birdOptions))?>
        			</td>
        			<td><?php echo $this->Form->input('BirdSpecimen.'.$i.'.frequency',array('type' =>'number','label' => ''))?>
        			</td>
        			<td><?php echo $this->Form->input('BirdSpecimen.'.$i.'.id',array('type' => 'hidden'))?>
        			</td>        			
        		</tr>
        
        		<?php }?>
        	</table>
        	
        <?php echo $this->Form->end('Save'); ?>
   
</html>