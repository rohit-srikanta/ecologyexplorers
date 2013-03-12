<html>

<br>
    <?php echo $this->Html->link('Home',array('controller' => 'teachers', 'action' => 'back')); ?>

<br>
<br>
    <table width="80%" cellpadding="0" cellspacing="0" border="0">
        <?php echo $this->Form->create('Site');?>    
        
        <tr>
            <td width="20%"> <?php echo $this->Form->input('site_Id'); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
             
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('site_name'); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('address'); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('location'); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('description'); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('city'); ?> </td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> <?php echo $this->Form->input('zipcode'); ?> </td>
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
            <td width="20%"><?php echo $this->Form->end('Create Site'); ?></td>
            <td width="20%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            <td width="30%"> &nbsp;</td>
            
        </tr>
    </table>
    
 <?php
 
 ?>
</html>
