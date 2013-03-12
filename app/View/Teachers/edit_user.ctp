<html>

<br>
    <?php echo $this->Html->link('Home',array('controller' => 'teachers', 'action' => 'back')); ?>
    <br><br>
    <?php echo $this->Html->link('Back',array('controller' => 'teachers', 'action' => 'modifyUser')); ?>
<br>
<br>
    <table width="80%" cellpadding="0" cellspacing="0" border="0">
        <?php echo $this->Form->create('Teacher');?>    
        <tr>
            <td width="20%"> <?php echo $this->Form->input('name');  ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('email_address'); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
         <tr>
            <td width="0%"> <?php echo $this->Form->input('type', array('options' => $userTypeOptions)); ?> </td>
            <td width="20%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
			<td width="30%"> &nbsp;</td>
        </tr>
         <tr>
            <td width="0%"> <?php echo $this->Form->input('school',array('options' => $schooloptions));?> </td>
            <td width="20%"><?php echo $this->Form->input('id', array('type' => 'hidden')); ?></td>
            <td width="20%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
			<td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"><?php echo $this->Form->end('Save'); ?></td>
            <td width="20%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            
        </tr>
    </table>
    
 <?php
 
 ?>
</html>
