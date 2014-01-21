<?php
App::uses('AppModel', 'Model');

class Todo extends AppModel {
	public $validate = array(
		'description' => array(
			'required' => true,
			'rule' => array('minLength', 2),
			'message' => 'Needs to be at least 2 characters long'
		),
    'days' => array(
			'rule1' => array( 
            'allowEmpty' => true,      
            'rule'    => array('comparison', '>=', 1),
            'message' => 'min. 1 day',
         ),
        'rule2' => array(
              'rule' => 'numeric',
              'allowEmpty' => true,
              'message' => 'Numbers only'
        )
    ),
    'hours' => array(
			'rule1' => array( 
            'allowEmpty' => true,      
            'rule'    => array('comparison', '>=', 1),
            'message' => 'min. 1 hours',
         ),
        'rule2' => array(
              'rule' => 'numeric',
              'allowEmpty' => true,
              'message' => 'Numbers only'
        )
    ),
    'minute' => array(
			'rule1' => array( 
            'allowEmpty' => true,      
            'rule'    => array('comparison', '>=', 1),
            'message' => 'min. 1 minute',
         ),
        'rule2' => array(
              'rule' => 'numeric',
              'allowEmpty' => true,
              'message' => 'Numbers only'
        )
    ),
    
);
}
