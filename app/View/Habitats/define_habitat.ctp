<html>
<head>

</head>
<br>
    <?php echo $this->Html->link('Home',array('controller' => 'teachers', 'action' => 'back')); ?>

<br>
<br>

<?php
        echo $content_for_layout;
    ?>
<table width="80%" cellpadding="0" cellspacing="0" border="0">
        <?php echo $this->Form->create('Habitat');?>    
        <tr>
            <td width="20%"> <?php echo $this->Form->input('type',array('empty' => 'Select','options' => $habitatTypeOptions,'id' => 'habitat_select')); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
         <tr>
            <td width="20%"> <?php echo $this->Form->input('recording_date',array( 'label' => 'Recording Date', 'dateFormat' => 'DMY')); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('area'); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('scrub_cover',array('options' => $percentOptions)); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('tree_canopy',array('options' => $percentOptions)); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('lawn',array('options' => $percentOptions)); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('other',array('options' => $percentOptions)); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('paved_building',array('options' => $percentOptions)); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('water',array('options' => $percentOptions)); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('gravel_soil',array('options' => $percentOptions)); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('num_traps',array('options' => $percentOptions)); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('trap_arrange'); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('percent_observed',array('options' => $percentOptions)); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('radius',array('options' => $percentOptions)); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        
         <tr>
            <td width="0%"> <?php echo $this->Form->input('school',array('options' => $schooloptions));?> </td>
            <td width="20%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
			<td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"><?php echo $this->Form->end('Define Habitat'); ?></td>
            <td width="20%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>            
        </tr>
     </table>
 </html>
