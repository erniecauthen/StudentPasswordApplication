<?php
$this->extend('/Students/reset');
?>
<div class='reset_section'>   
    <?php echo $this->Form->create('students', ['class' => 'reset_dialog']); ?>
    <div class="reset_body">
        <div class='inline_input identifier'>
            <div class="input_full">
                <span class='user_select_identifier'>Enter your First Name, Last Name, and either your 900 number <b>OR</b> last 4.</span>
            </div>        
        </div>    
        <div class='inline_input'>
            <div class="width48">
                <?= $this->Form->input('FIRST_NAME', ['placeholder' => 'First Name', 'id' => 'firstname', 'label' => 'First Name', 'type' => 'text', 'required' => true]); ?>
            </div>
            <div class="width48 right-align">
                <?= $this->Form->input('LAST_NAME', ['placeholder' => 'Last Name', 'id' => 'lastname', 'label' => 'Last Name', 'type' => 'text', 'required' => true]); ?>
            </div>
        </div>      
        <div class='inline_input id_numbers'>
            <div class="width48">
                <?= $this->Form->input('STUDENT_ID', ['placeholder' => '#900 Number', 'id' => 'studentid', 'label' => 'Student ID', 'type' => 'text', 'minlength' => '9', 'maxlength' => '9']); ?>
            </div>
            <div class="width48 right-align">
                <?= $this->Form->input('LAST_4', ['placeholder' => 'Last 4', 'id' => 'last4', 'label' => 'Last 4', 'type' => 'text', 'minlength' => '4', 'maxlength' => '4']); ?>
            </div>
        </div>        
    </div>
    <div class="input_footer">
        <div class='signin'><a href="#" class="search">Find Account</a></div>
    </div>
    <div class="searching_message" title="Please wait...">
        <span>Please wait while we are sarching for your account...</span>
    </div>
</div>