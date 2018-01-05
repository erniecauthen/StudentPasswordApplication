<?php
/*
 * See the DATAOBJECTS.MD to understand what we are doing fully with each of our functions and why we have setup our Controllers this way.
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session;
use Cake\ORM\TableRegistry;


/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 *
 * @method \App\Model\Entity\Student[] paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController
{            
    
    public function initialize() {
        
        parent::initialize();
        $this->loadModel('Acceptedregistered');
        $this->loadModel('Appliedstudents');
    }
    
    //Default function called by the Layout/default.ctp file. This loads the basic page and also redirects for the reset_input function.
    public function reset() {

        $this->window_class = 'StudentsReset';
        
        return $this->redirect(['controller' => 'Students', 'action' => 'reset_input']);
    }
    
    public function reset_input() {
        
        $this->window_class = 'StudentsResetInput';
      
        if ($this->request->is(['ajax'])) {
            $data = $this->request->data;
            
            $validStudent = $this->Students->findRequestingStudent($data);
            
            if (!empty($validStudent)) {
                
                $session = $this->request->session();
                
                $session->write('Student.uniqueKey', $data['uniqueKey']);
                
                $return = [
                    'sAMAccountName'    => $validStudent[0]['sAMAccountName'],
                    'PIDM'              => $validStudent[0]['PIDM'],
                    'status'            => 'success'
                ];
                echo json_encode($return);
                exit;
            } else {
                $return = [
                    'status'            => 'error'
                ];
                echo json_encode($return);
                exit;
            }
        }            
        
        $this->set(compact('student'));
        $this->set('_serialize', ['student']);
    }
    
    //Function for the reset_password page. 
    public function reset_password($accountID) {
        
        $this->window_class = 'StudentsResetPassword';
        $session = $this->request->session();
        $uniqueKey = $session->read('Student.uniqueKey');
        
        if (isset($uniqueKey)) {
            $student = $this->Students->findStudentByAccountID($accountID);
            $session->delete('Student.uniqueKey');
        }
        
        if ($this->request->is(['ajax'])) {
            $data = $this->request->data;

            $reset = $this->Students->ldapPasswordReset($data);

            echo json_encode($reset);
            exit;
        }         
        
        $this->set('uniqueKey', $uniqueKey);
        $this->set(compact('student', 'sessionId'));
        $this->set('_serialize', ['student']);
    }
    
    //Function that is called upon a successful reset. There is no data to display and it is a simple success page to display a success message.
    public function reset_success() {

    }
    
    //Function that shows the reset_error page. There are no users actions which can occur on this page other than routing back to the reset_input page.
    public function reset_error() {
        
    }
}
