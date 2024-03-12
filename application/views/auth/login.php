<!DOCTYPE html>
<html>
    <?php $this->load->view('head'); ?>
<body>
    <?php $this->load->view('header'); ?>
    <div class="container">
        <?php 
            if(!empty($success_msg)) {
                echo '<p class="statusMsg">'.$success_msg.'</p>';
            } elseif(!empty($error_msg)) {
                echo '<p class="statusMsg">'.$error_msg.'</p>';
            }
            if(isset($message_display)){
                echo $message_display;
            }
            echo form_open('dashboard/login', 'autocomplete="off", class="form"');
        ?>
        <h2>Login</h2>
        <?php echo form_label('Username'); 
            $data = array(
                    'name' => 'username',
                    'placeholder' => 'Enter Username',
                    'required' => 'required'
                );
            echo form_input($data);
            echo form_error('username','<span class="help-block">','</span>');
        ?>
        <?php echo form_label('Password'); 
            $data = array(
                    'name' => 'password',
                    'placeholder' => 'Enter Password',
                    'required' => 'required'
                );
            echo form_password($data);
            echo form_error('password','<span class="help-block">','</span>');
        ?>
        <?php 	
            $data = array(
                'value' => 'Login',
                'name' => 'loginSubmit'
            );
            echo form_submit($data);
            echo form_close();
        ?>
        <p>Don't have an account? <a href="sign_up.html">Sign up</a></p>
		</form>
	</div>
</body>
</html>