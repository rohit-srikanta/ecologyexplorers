
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

<p><b>Edit Arthropod Data</b></p>
<br>
        <?php echo $this->Form->create('ArthroSample', array('class'=>'form'));     
        echo $this->Form->input('comments',array('type'=>'char','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('observer', array('size'=>25,'div'=>'formfield'));
        echo $this->Form->input('id', array('type' => 'hidden')); 
        ?>
        <p align="center"><b>Please make sure that you enter all 3 values. </b></p>
        <table>
        <tr>
        <th>Trap No</th>
        <th>Arthropod Order</th>
        <th>Tally Number</th>
        </tr>
        
        		<?php for($i=0;$i<count($this->request->data['ArthroSpecimen']);$i++) { ?>
        
        		<tr>
        			<td><?php echo $this->Form->input('ArthroSpecimen.'.$i.'.trap_no',array('label' => ''))?>
        			</td>
        			<td><?php echo $this->Form->input('ArthroSpecimen.'.$i.'.arthro_taxon_id',array('label' => '','empty' => 'Select','options' => $orderOptions))?>
        			</td>
        			<td><?php echo $this->Form->input('ArthroSpecimen.'.$i.'.frequency',array('type' =>'number','label' => ''))?>
        			</td>
        			<td><?php echo $this->Form->input('ArthroSpecimen.'.$i.'.id',array('type' => 'hidden'))?>
        			</td>
        		</tr>
        
        		<?php }?>
        	</table>
        	<?php 
        echo $this->Form->end('Save'); ?>
   
</html>