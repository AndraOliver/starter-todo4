<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of toDoEntity
 *
 * @author Lucas
 */
class Task_entity extends Entity {
    //put your code here
    private $task;
    private $id;
    private $priority;
    private $size;
    private $group;
    private $status;
    private $deadline;
    private $flag;
    //Create Setters for Form fields 
    //
    
    function getId() {
    return $this->id;
    }

    function setId($id) {
    $this->id = $id;
    }

    function getDeadline() {
        return $this->deadline;
    }

    function getFlag() {
        return $this->flag;
    }

    function setDeadline($deadline) {
        $this->deadline = $deadline;
    }

    function setFlag($flag) {
        $this->flag = $flag;
    }

      public function setTask($task) {
        
        if (empty($task))
        {
            throw new InvalidArgumentException('Cannot be empty.');
        }
        $this->task = $task;
    }

   public function setPriority($priority) {
        
         if (empty($priority))
        {
            throw new InvalidArgumentException('Cannot be empty.');
        }
        $this->priority = $priority;
    }

  public  function setSize($size) {
        
        if (empty($size))
        {
            throw new InvalidArgumentException('Cannot be empty.');
        }
        
        if (!is_numeric($size))
            throw new Exception('Size must be numeric');
        
        $this->size = $size;
    }

   public function setGroup($group) {
        
        if (empty($group))
        {
            throw new InvalidArgumentException('Cannot be empty.');
        }
        
        if (!is_numeric($group))
            throw new Exception('Group must be numeric');
        
        $this->group = $group;
    }

   public function setStatus($status) {
        
        if (empty($status))
        {
            throw new InvalidArgumentException('Cannot be empty.');
        }
        
        if($status !=1 && $status !=2)
            throw new Exception('Status must be 1 for incomplete or 2 for complete');    
        
        $this->status = $status;
    }

       
    public function __get($key) {
        return $this->$key;
    }

    
}
