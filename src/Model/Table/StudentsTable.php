<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Students Model
 */
class StudentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('students');
        $this->setDisplayField('PIDM');
        $this->setPrimaryKey('PIDM');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        return $validator; 
    }
    
    public function findRequestingStudent($student) {
        $firstName = $student['FIRST_NAME'];
        $lastName = $student['LAST_NAME'];
        $studentID = $student['STUDENT_ID'];
        $lastFour = $student['LAST_4'];         

        /* 
         * Setting our variables to search for the user later. Since
         * we don't know if they are a returning student or new student we will
         * have to look through two different tables 
         */
        $acceptedRegistered = TableRegistry::get('Acceptedregistered');
        $appliedStudents = TableRegistry::get('Appliedstudents');            


        /* If the student has passed the STUDENT_ID and NOT given us the LAST_4 we return the students account*/
        if (!empty($student['STUDENT_ID']) && (empty($student['LAST_4']))) {
            /* First we are going to search through to see if the student exists in the Acceptedregistered table  */
            $queryAcceptedRegistered = $acceptedRegistered->find('all', [
                'fields' => [
                    'PIDM',
                    'sAMAccountName',
                    'FIRST_NAME',
                    'LAST_NAME'
                ],
                'conditions' => [
                    'FIRST_NAME' => $firstName,
                    'LAST_NAME' => $lastName,
                    'STUDENT_ID' => $studentID                    
                ]
            ])->toArray();

            /* Now we will loop through the Appliedstudents table */
            $queryAppliedStudents = $appliedStudents->find('all', [
                'fields' => [
                    'PIDM',
                    'sAMAccountName',
                    'FIRST_NAME',
                    'LAST_NAME'
                ],
                'conditions' => [
                    'FIRST_NAME' => $firstName,
                    'LAST_NAME' => $lastName,
                    'STUDENT_ID' => $studentID                    
                ]
            ])->toArray();

            if (!empty($queryAcceptedRegistered)) {
                $validStudent = $queryAcceptedRegistered;
            } else if (!empty($queryAppliedStudents)) {
                $validStudent = $queryAppliedStudents;
            }
        /* Otherwise we will take an empty STUDENT_ID with a LAST_4 and check for the students account*/    
        } else if (empty($student['STUDENT_ID']) && (!empty($student['LAST_4']))) {
            /* First we are going to search through to see if the student exists in the Acceptedregistered table  */
            $queryAcceptedRegistered = $acceptedRegistered->find('all', [
                'fields' => [
                    'PIDM',
                    'sAMAccountName',
                    'FIRST_NAME',
                    'LAST_NAME'
                ],
                'conditions' => [
                    'FIRST_NAME' => $firstName,
                    'LAST_NAME' => $lastName,
                    'LAST_4' => $lastFour                   
                ]
            ])->toArray();

            /* Now we will loop through the Appliedstudents table */
            $queryAppliedStudents = $appliedStudents->find('all', [
                'fields' => [
                    'PIDM',
                    'sAMAccountName',
                    'FIRST_NAME',
                    'LAST_NAME'
                ],
                'conditions' => [
                    'FIRST_NAME' => $firstName,
                    'LAST_NAME' => $lastName,
                    'LAST_4' => $lastFour                   
                ]
            ])->toArray();

            if (!empty($queryAcceptedRegistered)) {
                $validStudent = $queryAcceptedRegistered;
            } else if (!empty($queryAppliedStudents)) {
                $validStudent = $queryAppliedStudents;
            }                
        /* Finally if the student decides to give us BOTH the STUDENT_ID and LAST_4 then we will use both to validate them */    
        } else if (!empty($student['STUDENT_ID']) && (!empty($student['LAST_4']))) {
            /* First we are going to search through to see if the student exists in the Acceptedregistered table  */
            $queryAcceptedRegistered = $acceptedRegistered->find('all', [
                'fields' => [
                    'PIDM',
                    'sAMAccountName',
                    'FIRST_NAME',
                    'LAST_NAME'
                ],
                'conditions' => [
                    'FIRST_NAME' => $firstName,
                    'LAST_NAME' => $lastName,
                    'STUDENT_ID' => $studentID,
                    'LAST_4' => $lastFour                    
                ]
            ])->toArray();

            /* Now we will loop through the Appliedstudents table */
            $queryAppliedStudents = $appliedStudents->find('all', [
                'fields' => [
                    'PIDM',
                    'sAMAccountName',
                    'FIRST_NAME',
                    'LAST_NAME'
                ],
                'conditions' => [
                    'FIRST_NAME' => $firstName,
                    'LAST_NAME' => $lastName,
                    'STUDENT_ID' => $studentID,
                    'LAST_4' => $lastFour                      
                ]
            ])->toArray();

            if (!empty($queryAcceptedRegistered)) {
                $validStudent = $queryAcceptedRegistered;
            } else if (!empty($queryAppliedStudents)) {
                $validStudent = $queryAppliedStudents;
            }                      
        }  
        
        if (!empty($validStudent)) {
            $requestingStudent = array_filter($validStudent);
        } else {
            $requestingStudent = '';
        }

        return $requestingStudent;
    }
    
    public function findStudentByAccountID($accountID){

        /* 
         * Setting our variables to search for the user later. Since
         * we don't know if they are a returning student or new student we will
         * have to look through two different tables 
         */
        $acceptedRegistered = TableRegistry::get('Acceptedregistered');
        $appliedStudents = TableRegistry::get('Appliedstudents');         
        
        /* First we are going to search through to see if the student exists in the Acceptedregistered table  */
        $queryAcceptedRegistered = $acceptedRegistered->find('all', [
            'fields' => [
                'sAMAccountName',
                'FIRST_NAME',
                'LAST_NAME',
                'PIDM'
            ],
            'conditions' => [
                'PIDM' => $accountID,                
            ]
        ])->toArray();

        /* Now we will loop through the Appliedstudents table */
        $queryAppliedStudents = $appliedStudents->find('all', [
            'fields' => [
                'sAMAccountName',
                'FIRST_NAME',
                'LAST_NAME',
                'PIDM'                
            ],
            'conditions' => [
                'PIDM' => $accountID,                
            ]
        ])->toArray();

        if (!empty($queryAcceptedRegistered)) {
            $validStudentAccount = $queryAcceptedRegistered;
        } else if (!empty($queryAppliedStudents)) {
            $validStudentAccount = $queryAppliedStudents;
        }
        
        $studentAccount = array_filter($validStudentAccount);
        
        return $studentAccount;
    }
    
    public function ldapPasswordReset($data) {
        $status = '';
        
        //Username requesting password change and password that we will use
        $userName = $data['sAMAccountName'];
        $passWord = $data['newPassword'];

        //LDAP server and port to connect to
        $ldapServer     = //'ENTER YOUR SERVER HERE. EXAMPLE = ldaps://ENTER.YOUR.DOMAIN.HERE.COM';
        $ldapPort       = 636;
        
        //Admin account used to connect to the LDAP server
        $ldapAccount    = //'ACCOUNT WITH AD ACCESS THAT CAN RESET ACCOUNTS. EXAMPLE = service-resetAccount';
        $ldapPassword   = //'PASSWORD FOR ACCOUNT';
        
        //Base DN which we will perform our searches
        $ldapTree       = //"BASE OU FOR STUDENT ACCOUNTS. EXAMPLE = OU=Students,DC=student,DC=atlantatech,DC=edu";

        //Connect and set the protocol version
        $ldapConn       = ldap_connect($ldapServer, $ldapPort);
        ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);         

        if($ldapConn) {
            //Bind to the LDAP server
            $bind = ldap_bind($ldapConn, $ldapAccount.'@ENTER.YOUR.DOMAIN.HERE.COM', $ldapPassword);
            
            if ($bind) {
                //Search for the user account by the sAMAccountName
                $result  = ldap_search($ldapConn,$ldapTree, 'sAMAccountName='. $userName .'');
                
                //Take the first entry that we find
                $first   = ldap_first_entry($ldapConn, $result);
                
                //Get the DN of the account
                $student = ldap_get_dn($ldapConn, $first);
                
                if ($result) {
                    
                    //Call the pwdEncryption function to set the password to unicode
                    $entry = $this->pwdEncryption($passWord);
                    
                    //Update the account with the new password
                    $replace = ldap_mod_replace($ldapConn, $student, $entry);
                    
                    if ($replace) {
                        //Set the status of true and return a message of the password has been changed
                        $status = [
                            'message'=> 'Password changed!',
                            'status' => true
                        ];
                    } else {
                        //Set status as false and let the user know there was an error setting the password
                        $status = [
                            'message'=> 'There was an issue setting the password on your account. Please verify that you are using alpha, numeric, and special characters such as (!@#$%^&*) only. If you continue to have issues please contact the help desk at 404-225-4400, option 1, ext 4357.',
                            'status' => false
                        ];
                    }
                } else {
                    //Set the status as false and let the user know there was an issue with the account itself
                    $status = [
                        'message'=> 'We were unable to find your account. Please contact the help desk at 404-225-4400, option 1, ext 4357.',
                        'status' => false
                    ];
                }
                ldap_close($ldapConn);
            } else {
                //Set the status as false and tell the user to notify us that we couldn't connect to AD
                $status = [
                    'message'=> 'There was an error trying to connect to the Active Directory. Please notify the Atlanta Technial College IT staff at 404-225-4400, option 1, ext 4357.',
                    'status' => false
                ];
            }
        } else {
            $status = [
                'message'=> 'Unable to create a basic connection to the AD. Please notify the Atlanta Technical College IT staff at 404-225-4400, option 1, ext 4357.',
                'status' => false
            ];
        }
        //Return back the status of our password update
        return $status;
    }
    
    public function pwdEncryption($password) {
        
        //Format the password for the unicode
        $newPassword = "\"" . $password . "\"";
        
        //Set the new password with the encoding
        $newPass = mb_convert_encoding($newPassword, "UTF-16LE");
        
        //Assign the userdata with the updated unicoded password
        $userdata["unicodePwd"] = $newPass;
        
        //Return the unicodePwd array onject
        return $userdata;
    }    
}
