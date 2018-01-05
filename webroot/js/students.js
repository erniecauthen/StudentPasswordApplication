/*  
 * Iniitial script called upon our reset_input page being loaded. 
 */
function StudentsResetInput(script_dom) {
    //Setting up the initial variables
    var self = this;
    self.window = script_dom;
    this.window = $(script_dom);

    //This function only allows for numbers to be called on keypress
    function isNumber(e) {
        if (e.keyCode <= 31 || e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 191 || e.keyCode === 111 || ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 95 && e.keyCode <= 105))) {
            return true;
        }
        return false;
    }
    
    //We limit the studentID and last4 fields to be numbers only
    $('#studentid').keydown(isNumber);
    $('#last4').keydown(isNumber);
    
    //We are now looking to see if the user is filling out the last 4 field
    //If they are filling this field out and there is a required on the #900 then
    //we are going to remove that.
    $('#last4').keyup(function() {
        if ($('#studentid').has('required')) {
            $('#studentid').removeAttr('required');
            var error = document.getElementById("studentid-error");
            if (error) {
                $(error).remove();
            }
        }
        if ($('#last4').val() == "") {
            $('#last4').removeAttr('required');
            var error = document.getElementById("last4-error");
            if (error) {
                $(error).remove();
            }
        }
    });
    
    //We allow for users to press enter to submit the form.
    $(this.window).keydown(pageSubmit);
    
    //Begin of the user submit function
    $('.search').on('click', function() {
        //Check to make sure that the form data is valid
        $('.reset_dialog').validate({
            //We are going to require the First Name and Last Name fields no matter what
            rules: {
                FIRST_NAME: "required",
                LAST_NAME: "required"
            },
            messages: {
                //These are the messages that we are requiring. The STUDENT_ID and LAST_4
                //have qualifying conditions that are checked according to what is filled out                
                FIRST_NAME: "First name is required",
                LAST_NAME: "Last name is required",
                STUDENT_ID: {
                    required: "Please enter your 900 number",
                    minlength: "You must have 9 numbers"
                },
                LAST_4: {
                    required: "Please enter your last 4",
                    minlength: 'You must have 4 digits'
                }
            }
        });        
        
        //We declare two values here, our studentID and last4.
        var studentID = $('#studentid').val();
        var last4 = $('#last4').val();
        
        //We check to see if studentID and last4 are NOT set
        if (!studentID && !last4) {
            //if the last4 and studentID are not set then we are going to make studentid required
            document.getElementById("studentid").required = true;
            document.getElementById("last4").required = false;
        } else if (studentID && !last4) {
            //if there is a studentid and NO last4 then we are editing the required fields 
            document.getElementById("studentid").required = true;
            document.getElementById("last4").required = false;
        } else if (!studentID && last4) {
            document.getElementById("studentid").required = false;
            document.getElementById("last4").required = true;
        }

        //We set a variable of true/false for our valid dialog form
        var checkValid = $('.reset_dialog').valid();        
        
        //If the checkValid is true then we run through the submit process
        if (checkValid === true) {
            
            //We are first going to popup a modal box that informs the user about
            //their account being searched for. This can NOT be closed by the user 
            //and we are going to close this manually later once we get a result.
            $('.searching_message').dialog({
                modal: true,
                draggable: false
            });
            
            //We set our data that we are going to submit
            formData = $('.reset_dialog').serializeArray();
            formData.push({name: "uniqueKey", value: generateUUID()});
            
            //We are using ajax to send out data to the Students controller and the reset_input function
            $.ajax({
                type    : 'POST',
                url     : '/Students/reset_input',
                data    : formData,
                dataType: 'JSON',
                success : function(response) {
                    //If we get a successful response then close the modal box
                    $('.searching_message').dialog('close');
                    
                    //If the response status is TRUE then redirect to the reset_password page with
                    //the users PIDM. This PIDM is what we are going to use to get their sAMAccountName
                    //later on
                    if (response.status == 'success') {
                        window.location = '/students/reset_password/' + response.PIDM;
                    
                    //If the response is FALSE then return an error to the user that we were unable
                    //to find their account. Let them know to check their information and if they still
                    //have problems then they need to contact the help desk
                    } else if (response.status == 'error') {
                        alertify.alert('We were unable to find your account with the information you provided. Please check the information and try again.');
                    }
                },
            });
        } else {
            //If the form valid is not true then we are going to return to the user to recheck
            //their info and to try again.
            alertify.alert('You must enter your First Name, Last Name, and either your 900 number or last 4.');
        }
    });   
}

/*
 * Script called on the reset_password page
 */
function StudentsResetPassword(script_dom) {
    //Declaring the inital variables
    var self = this;
    self.window = script_dom;
    this.window = $(script_dom);
    
    //We allow for users to press enter to submit the form.
    $(this.window).keydown(pageSubmit);    
    
    //We are going to validate the keydowns on the .newPassword input field
    $('.newPassword').keydown(function(e) {
        //Here we check to see if the keycode is 9 (tab) and if the popup invalid item notifications are either 
        //all set which means the user hasn't done anything OR if they are all cleared which means the password
        //should be valid. If that is the case then we will hide the password popup
        if (e.keyCode === 9 && ($('ul').find('li.invalid').length === 5 || $('ul').find('li.invalid').length === 0)) {
            $('.password_info_popup').hide();
        }
        //If the user tried to tab but the form is visile because of the presence of unmet reqirements
        //then we wll stop the tab and set the focus to the newPassword input
        if (e.keyCode === 9 && $('.password_info_popup').is(':visible') === true) {
            e.preventDefault();
            $('.newPassword').focus();
        }        
    });
    
    //We are going to validate the keyups for the newPassword field. Upon satifying the condition
    //we are going to remove the "invalid" class and add a "valid" to the item. This will change the
    //color of the entry and notify the user what is still lacking
    $('.newPassword').keyup(function() {
        
        //We are going to get our password that has been input as well as the users name
        var password = $(this).val();
        var user = $('#studentName').val();

        //Passwords must be at LEAST 8
        if (password.length > 7) {
            $('#length').removeClass('invalid').addClass('valid');
            
            //We verify that the return of the function checkPassword is true. This is needed
            //so that the passwords are rejected by AD when a user goes to set it
            if (checkPassword(user, password) !== false) {
               $('#name').removeClass('valid').addClass('invalid');
            } else {
               $('#name').removeClass('invalid').addClass('valid');
            }
        } else {
            $('#length').removeClass('valid').addClass('invalid');
            $('#name').removeClass('valid').addClass('invalid');
        }
        //Passwords must have a least 1 lower characer
        if (password.match(/[a-z]/)) {
            $('#lower').removeClass('invalid').addClass('valid');
        } else {
            $('#lower').removeClass('valid').addClass('invalid');
        }
        //Passowrds must have at least 1 upper character
        if (password.match(/[A-Z]/)) {
            $('#capital').removeClass('invalid').addClass('valid');
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
        }
        //Passwords must have at least 1 number
        if (password.match(/\d/)) {
            $('#number').removeClass('invalid').addClass('valid');
        } else {
            $('#number').removeClass('valid').addClass('invalid');
        }
    });
    
    //We are running some checks on the .confirmPassword input
    $('.confirmPassword').keyup(function() {        
        //If our .newPassword and .confirmPassword match then go ahead and remove the 
        //'Passwords do not match' validator
        if ($('.newPassword').val() === $('.confirmPassword').val()) {    
        $('.reset_password_dialog').validate({
            rules: {
            },
            messages: {
            }
        });
        //Otherwise we will show the error that 'Passwords do not match' in red text above the
        //.confirmPassword input
        } else {       
            $('.reset_password_dialog').validate({
                //Make sure that the confirmPassword is equal to the newPassword
                rules: {
                    confirmPassword: {
                        equalTo: '[name="newPassword"]'
                    }
                },
                //Show an error message that the passwords don't match
                messages: {
                    confirmPassword: "Passwords do not match"
                }
            });   
        }
    });

    //Being of our user submitting the form
    $('.submit').on('click', function() {
        //We are going to validate the form. We have already done some validation above with
        //the .confirmPassword but this is to make sure our form can't be submitted with mismatched
        //passwords by the user (NOT everyone reads what is in RED above the input field)
        $('.reset_password_dialog').validate({
            //Make sure that the confirmPassword is equal to the newPassword
            rules: {
                confirmPassword: {
                    equalTo: '[name="newPassword"]'
                }
            },
            //Show an error message that the passwords don't match
            messages: {
                confirmPassword: "Passwords do not match"
            }
        });        

        //We are going to set a true/false on checkValid
        var checkValid = $('.reset_password_dialog').valid();
        
        //If the checkValid is true then fire it off
        if (checkValid === true) {
            //We are going to set the studentID variable
            var studentID = $('#studentID').val();
            //We are getting our data to pass back by serializing the form
            formData = $('.reset_password_dialog').serialize();
            
            //We use ajax to send the data to the Students controller and the reset_password
            //function. We are setting the studentID as the id so that we can find the sAMAccountName
            //without having to requery the database for the user
            $.ajax({
                type    : 'POST',
                url     : '/Students/reset_password/'+studentID,
                data    : formData,
                dataType: 'JSON',
                success : function(response) {
                    console.log(response);
                    //On a successful response lets evaluate our returns
                    if (response.status === true) {
                        //If the status is true then clear the form out and redirect to the 
                        //reset_success page!
                        $('.reset_password_dialog')[0].reset();
                        window.location = '/students/reset_success/';
                    } else if (response.status === false) {
                        //If the status is false then we will display in an alert what went wrong. 
                        //The message values are set in the StudentsTable.php file
                        alertify.alert(response.message);
                    }
                }
            });
        } else {
            //If checkValid is false then return the error that the passwords don't match and that
            //the user should try again
            alertify.alert('Your passwords do not match. Please enter your desired password again to try again.');
        }
    });   
    
    //Check for clicks within our window
    $(this.window).on('click', function(event) {
        //Is the click on the newPassword input and the popup is hidden?
        if ($('.newPassword').is(event.target) && $('.password_info_popup').is(':visible') === false) {
            $('.password_info_popup').show();
        }
        //Is the click NOT on the newPassword but the form hasn't been filled out yet OR all values are met?
        if (!$('.newPassword').is(event.target) && ($('ul').find('li.invalid').length === 5 || $('ul').find('li.invalid').length === 0)) {
            $('.password_info_popup').hide();
        }
        //Is the click outside the newPassword but there are still invalid items?
        if (!$('.newPassword').is(event.target) && $('.password_info_popup').is(':visible') === true) {
            moveCursorToEnd($('.newPassword'));
        }
    });
    
    $('.return').on('click', function() {
        window.location = '/students/reset/';
    });
}

function moveCursorToEnd(el) {
    el = $(el)[0];

    // Trigger input to adjust size
    $(el).trigger('input');

    // Scroll to bottom
    $(el).scrollTop(el.scrollHeight);

    // Move cursor to end
    if (typeof window.getSelection != 'undefined' && typeof document.createRange != 'undefined') {
        var range = document.createRange();
        range.selectNodeContents(el);
        range.collapse(false);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);
    } else if (typeof document.body.createTextRange != "undefined") {
        var textRange = document.body.createTextRange();
        textRange.moveToElementText(el);
        textRange.collapse(false);
        textRange.select();
    }
    // Focus
    el.focus();
}

function returnToSearch() {
    window.location = '/students/reset/';
}

/*
 * Function to check the username and password values
 */
function checkPassword(name, password) {
    //Set the matchedName var and concat the name value to a length of 4 in order to 
    //verify our password doesnt have 4 consecutive letters that match the users name
    var matchedName = 
            name.match(/.{4}/g).concat(
            name.substr(1).match(/.{4}/g),
            name.substr(2).match(/.{4}/g),
            name.substr(3).match(/.{4}/g));
            
    //We are using RegExp to run through our matchedName and test the password value
    var verify = new RegExp(matchedName.join("|"), "i").test(password);
    
    //The verify value will either be TRUE or FALSE
    return verify;
}

//Page sumbit action with the enter keypress
function pageSubmit(event) {
    //We check to see if the key pressed is enter
    if (event.keyCode === 13) {
        
        //We then have to go a long round about way to find the page we are on
        //Then we drill down to find the form of the page
        //Finally we drill down again to find the <a> of the page
        //This was done becuase this function was being called on both pages when enter was
        //pressed.
        var page   = $(event)[0].currentTarget;
        var form   = $(page).find('form');
        var submit = ($(form).find('a'));
        $(submit).click();
    }
}

//UUID generated on the inital search for the student account. This is passed to the session
//once the student account is found and is required to view the password page.
function generateUUID() {
    var d = new Date().getTime();
    var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        var r = (d + Math.random() * 16) % 16 | 0;
        d = Math.floor(d / 16);
        return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
    });
    return uuid;
}