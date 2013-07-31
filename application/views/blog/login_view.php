<div class="main">
<?php echo validation_errors(); ?>

<?php echo form_open('check_login') ?>

  <label for="username">Name</label> 
  <input type="input" name="username" value="<?php echo set_value('username'); ?>" /><br />

  <label for="password">Password</label>
 <input type="password" name="password" /><br />
  
  <input type="submit" name="submit" value="Log In" /> 

</form>
</div>
