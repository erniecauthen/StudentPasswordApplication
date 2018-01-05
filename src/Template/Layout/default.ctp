<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Atlanta Technical College';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->css([
            'alertifyjs/alertify',
            'base',
            'cake',
            'home',
            'jquery-ui',
            'students'
        ]); 
    ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->meta('atc_logo.ico', '/atc_logo.ico', ['type' => 'icon']); ?>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
</head>
<?PHP
    if ($this->request->params['controller'] == 'Pages' && $this->request->params['action'] == 'display') {
        echo '<body class="con_pages action_display">';
    } else if ($this->request->params['controller'] != 'Pages' && $this->request->params['action'] != 'display') {
        echo '<div class="con_standalone con_' . $page_controller . ' action_' . $page_action . '">' . $this->fetch('content') . '</div>';
    } else {
        echo $this->fetch('content');
    }
    echo $this->Flash->render();
    
    echo $this->Html->script([
        //alertify
        'alertifyjs/alertify',
        
        //jQuery
        'external/jquery',
        'jquery-ui',
        'jquery.validate.1.17',
        
        'students',
        'main'
    ]);
    
    echo '<script>$(function() { StandaloneLoadWindow("' . preg_replace("/[^A-Za-z0-9 ]/", '', $window_class) . '"); });</script>';
?>
</body>
</html>
