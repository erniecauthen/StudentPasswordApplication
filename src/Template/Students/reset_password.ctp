<?php
$this->extend('/Students/reset');
?>
<div class="reset_password">
    <?php if (isset($uniqueKey)) { ?>
    <?php echo $this->Form->create($student, ['class' => 'reset_password_dialog']); ?>
    <div class="reset_body">
    <input type="hidden" id="studentName" value="<?php echo $student[0]['FIRST_NAME'] .''. $student[0]['LAST_NAME'] ?>"/>
        <?= $this->Form->input('PIDM', ['type' => 'hidden', 'value' => $student[0]['PIDM'], 'id' => 'studentID']); ?>
        <?= $this->Form->input('sAMAccountName', ['type' => 'hidden', 'value' => $student[0]['sAMAccountName']]); ?>
        <div class="inline_input">
            <div class="student_account">
                <span>Please enter a new password below and confirm it.</span>
                <span>User name : <b><?= $student[0]['sAMAccountName']; ?></b></span>
            </div>        
        </div>
        <div class="inline_input">
            <div class="width48">
                <?= $this->Form->input('newPassword', ['placeholder' => 'Password', 'class' => 'newPassword', 'type' => 'password', 'label' => 'Password', 'required' => true]); ?>            
            </div>     
            <div class="width48 right-align">
                <span id="password_matching"></span>
                <?= $this->Form->input('confirmPassword', ['placeholder' => 'Confirm Password', 'class' => 'confirmPassword', 'type' => 'password', 'label' => 'Confirm Password', 'required' => true]) ?>
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
    </div>    
    <div class="input_footer">        
        <div class='reset'><a href="#" class="submit">Reset Password</a></div>
    </div>
    <?php } else { ?>
    <div class="reset_body">
        <div class="inline_input error">
            <div class="unautorized_access">
                <span class="warning"><b>ATTENTION!</b></span>
                <span>You have either refreshed or attempted to access this page directly.</span>
                <span>Please click the link to go back and search for your account again.</span>          
            </div>
        </div>        
    </div>
    <div class="inline_input">
        <div class="return_link">
            <div class='reset'><a href="#" class="return">Return To Search</a></div>
        </div>        
    </div>
    <?php } ?>
</div>