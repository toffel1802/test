<?php

class TodosController extends AppController {
	public $helpers = array('Form');
	
    public function index() {
    $todos = $this->Todo->find('all', array('conditions' => array('Todo.resolved'=>false)));
		$this->set('todos', $todos);
    $this->set('resolved', $this->Todo->find('all', array('conditions' => array('Todo.resolved'=>true))));
        
	}

	public function add() {
		if($this->request->is('post')) {
			$this->Todo->create();
      $this->Todo->set($this->request->data);
      if ($this->Todo->validates()) {
    // it validated logic
        } else {
    // didn't validate logic
    $errors = $this->Todo->validationErrors;
    debug($errors);
      }
			if($this->Todo->save($this->request->data)) {
				return $this->redirect(array('action' => 'index'));
			}
      else
      {
        throw new NotFoundException('Could not find your todo');
      }
		}
	} 

  
  
  	public function edit($id) {
    $todo = $this->Todo->find('first', array('conditions' => array('Todo.id'=>$id)));
    $this->set('todo', $todo);
		if($this->request->is('post')) {
      $this->Todo->id = $id;
      $this->Todo->saveField('description', $this->request->data['Todo']['description']);
      $this->Todo->saveField('days', $this->request->data['Todo']['days']);
      $this->Todo->saveField('hours', $this->request->data['Todo']['hours']);
      $this->Todo->saveField('minute', $this->request->data['Todo']['minute']);

				return $this->redirect(array('action' => 'index'));

		}
    
	}
  
  

	public function resolve($id) {
		if($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if(!$this->Todo->exists($id)) {
			throw new NotFoundException('Could not find your todo');
		}

		$this->Todo->id = $id;
		$this->Todo->saveField('resolved', true);
		return $this->redirect(array('action'=>'index'));
	}
  
public function unresolved($id) {
		if($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if(!$this->Todo->exists($id)) {
			throw new NotFoundException('Could not find your todo');
		}

		$this->Todo->id = $id;
		$this->Todo->saveField('resolved', false);
		return $this->redirect(array('action'=>'index'));
	}
  
  
  
	public function delete($id) {
		if($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if(!$this->Todo->exists($id)) {
			throw new NotFoundException('Could not find your todo');
		}

		$this->Todo->id = $id;
		$this->Todo->delete($id);
		return $this->redirect(array('action'=>'index'));
	}  
}
