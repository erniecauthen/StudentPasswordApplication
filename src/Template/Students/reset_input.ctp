<?php
$this->extend('/Students/reset');
?>
<div class='reset_section'>
    <?php echo $this->Form->create('students', ['class' => 'reset_dialog']); ?>
    <div class='inline_input'>
        <div class="width48">
            <?= $this->Form->input('FIRST_NAME', ['placeholder' => 'First Name', 'id' => 'firstname', 'type' => 'text', 'label' => false, 'required' => true]); ?>
        </div>
        <div class="width48 right-align">
            <?= $this->Form->input('LAST_NAME', ['placeholder' => 'Last Name', 'id' => 'lastname', 'type' => 'text', 'label' => false, 'required' => true]); ?>
        </div>
    </div>
    <div class='inline_input identifier'>
        <div class="input_full">
            <span class='user_select_identifier'>Enter either your 900 number OR the last 4 of your social.</span>
        </div>        
    </div>
    <div class='inline_input id_numbers'>
        <div class="width48">
            <?= $this->Form->input('STUDENT_ID', ['placeholder' => '#900 Number', 'id' => 'studentid', 'type' => 'text', 'label' => false, 'minlength' => '9', 'maxlength' => '9']); ?>
        </div>
        <div class="width48 right-align">
            <?= $this->Form->input('LAST_4', ['placeholder' => 'Last 4', 'id' => 'last4', 'type' => 'text', 'label' => false, 'minlength' => '4', 'maxlength' => '4']); ?>
        </div>
    </div>
    <div class="input_footer">
        <div class='signin'><a href="#" class="submit">Find Account</a></div>
    </div>
    <div class="searching_message" title="Please wait...">
        <span>Please wait while we are sarching for your account...</span>
    </div>
</div>