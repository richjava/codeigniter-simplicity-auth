<h1>Sign In</h1>
<?php
//success message
if ($this->session->flashdata('error')):
    ?>
    <div class="alert alert-error" role="alert"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif; ?>
<?php echo validation_errors(); ?>
<?php echo form_open('auth/validate_user'); ?>
<fieldset>
    <div class="field">
	<?php echo form_label('Username', 'username'); ?>
	<?php echo form_input('username', set_value('username')); ?>
    </div>
    <div class="field">
	<?php echo form_label('Password', 'password'); ?>
	<?php echo form_password('password', set_value('password')); ?>
    </div>
    <div class="wrapper" style="text-align:right;">
	<?php echo form_submit('submit', 'Login'); ?>
    </div>	
</fieldset>
<?php echo form_close(); ?>

<?php echo "Don't have an account? ".anchor('auth/signup', "Create an account."); ?>