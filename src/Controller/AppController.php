<?php
namespace App\Controller;

use Cake\Utility\Inflector;
use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->request_data = $this->request->data;

        $header = array('Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Headers' => 'Origin, Authorization, X-Requested-With, Content-Type, Accept',
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS');
        
        $this->response->header('Content-Type: application/json');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        
        if(empty($this->window_class)) {
            $this->window_class = $this->request->params['controller'] .
                str_replace(' ', '', ucwords(str_replace('_', ' ', $this->request->params['action']))) . 'Window';
        }        

        $this->response->header('Window_class', $this->window_class);
        
        if($this->request->is('ajax')) {
            if (file_exists(APP . 'Template' . DS . 'Layout' . DS . $this->viewBuilder()->layout() . '_ajax.ctp')) {
                $this->viewBuilder()->layout($this->viewBuilder()->layout() . '_ajax');
                die();
            } else {
                $this->viewBuilder()->layout('ajax');
            }
        }        
        
        $this->set('window_class', $this->window_class);
        $this->set('page_controller', strtolower(Inflector::underscore($this->request->params['controller'])));
        $this->set('page_action', strtolower(Inflector::underscore($this->request->params['action'])));
    }
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $controller = $this->request->controller;
        $action = $this->request->action;
        
        $session = $this->request->session();
        $session->write('Controller', $controller);
        $session->write('action', $action);        
    }
}
