<?php
$this->extend('/Students/reset');
?>
<div class="reset_password">
    <?php echo $this->Form->create($student, ['class' => 'reset_password_dialog']); ?>
    <input type="hidden" id="studentName" value="<?php echo $student[0]['FIRST_NAME'] .''. $student[0]['LAST_NAME'] ?>"/>
    <?= $this->Form->input('PIDM', ['type' => 'hidden', 'value' => $student[0]['PIDM'], 'id' => 'studentID']); ?>
    <?= $this->Form->input('sAMAccountName', ['type' => 'hidden', 'value' => $student[0]['sAMAccountName']]); ?>
    <div class="inline_input">
        <span class="student_account">Your user account name is <b><?= $student[0]['sAMAccountName']; ?></b>. Please enter a new password and confirm it.</span>
    </div>
    <div class="inline_input">
        <div class="width48">
            <?= $this->Form->input('newPassword', ['placeholder' => 'Password', 'class' => 'newPassword', 'type' => 'password', 'label' => false, 'required' => true]); ?>            
        </div>     
        <div class="width48 right-align">
            <span id="password_matching"></span>
            <?= $this->Form->input('confirmPassword', ['placeholder' => 'Confirm Password', 'class' => 'confirmPassword', 'type' => 'password', 'label' => false, 'required' => true]) ?>
        </div>
    </div>  
    <div class="row">
        <div class="password_info_popup" id="password_info_box">
            <div class="requirements_form">
                <div class="upper-arrow"></div>
                <div class="upper-arrow-outline"></div>
                <div class="requirements">
                    <div class="requirements_text">Password must meet the following requirements: </div>
                    <div class="requirments_checklist">
                        <ul class="password_requirements">
                            <li id="capital" class="invalid">At least <b>one upper case</b></li>
                            <li id="lower" class="invalid">At least <b>one lower case</b></li>
                            <li id="number" class="invalid">At least <b>one number</b></li>                       
                            <li id="length" class="invalid">At least <b>8 charcters</b></li>
                            <li id="name" class="invalid">Can not be part of your name</li>
                        </ul>                    
                    </div>
                </div>                
            </div>
        </div>          
    </div>
    <div class="input_footer">        
        <div class='reset'><a href="#" class="submit">Reset Password</a></div>
    </div>    
</div>