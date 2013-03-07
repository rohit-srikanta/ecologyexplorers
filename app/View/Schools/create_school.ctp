<html>

<br>
<br>
<?php echo $this->Html->link('Home',array('controller' => 'teachers', 'action' => 'back')); ?>
<br>
<br>
<?php if('A' == $this->Session->read('UserType'))
	{ ?>
    <table >
        <?php echo $this->Form->create('School');?>    
        <tr>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> <?php echo $this->Form->input('school_Id'); ?> </td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> <?php echo $this->Form->input('school_name'); ?> </td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> <?php echo $this->Form->input('address'); ?> </td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> <?php echo $this->Form->input('zipcode'); ?> </td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
        </tr>   
        <tr>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> <?php echo $this->Form->input('city'); ?> </td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
        </tr>    
        <tr>
            <td width="20%"> &nbsp;</td>
            <td width="20%"><?php echo $this->Form->end('Create School'); ?></td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
        </tr>
    </table>

 <?php }
?>  
</html>