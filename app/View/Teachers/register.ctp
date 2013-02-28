<html>

<br>
<br>&nbsp;&nbsp;
<?php echo $this->Html->link('Home',array('controller' => 'teachers', 'action' => 'back')); ?>
<br>
<br>
    <table >
        <?php echo $this->Form->create('Teacher');?>    
        <tr>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> <?php echo $this->Form->input('name'); ?> </td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> <?php echo $this->Form->input('username'); ?> </td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> <?php echo $this->Form->input('password'); ?> </td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> <?php echo $this->Form->input('email_address'); ?> </td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
        </tr>
        <tr>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> <?php echo $this->Form->input('school',$schools);?> </td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
        </tr>       
        <tr>
            <td width="20%"> &nbsp;</td>
            <td width="20%"><?php echo $this->Form->end('Register'); ?></td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
            <td width="20%"> &nbsp;</td>
        </tr>
    </table>

    
</html>