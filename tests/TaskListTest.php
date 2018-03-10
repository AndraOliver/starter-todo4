<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * @author Lucas
 */
use PHPUnit\Framework\TestCase;
class TaskListTest extends TestCase
{
    private $CI;
    public function setUp()
    {
        // Load CI instance normally
        $this->CI = &get_instance();
        $this->CI->load->model('tasks');
    }
    
    function testUncompletedTasks()
    {
        $completed = 0;
        $size = $this->CI->tasks->size();
        $data = $this->CI->tasks->all();
        foreach($data as $task)
        {
            if (!empty($task->status) && $task->status == 2)
            {
                $completed++;
            }
        }
        $this->assertTrue($completed < $size);
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    function testSizeEmptyReturningException(){
        $this->CI->load->model('task_entity');
        $entity = new Task_entity();
        $entity->setSize(null);

        
        
    }
    /**
     * @expectedException Exception
     */
    
    function testSizeIsNumeric(){
        $this->CI->load->model('task_entity');
        $entity = new Task_entity();
        $entity->setSize("a");
        //$this->expectException(Exception::class);
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    function testGroupEmptyReturningException(){
        $this->CI->load->model('task_entity');
        $entity = new Task_entity();
        $entity->setGroup(null); 
    }
    /**
     * @expectedException Exception
     */
    
    function testGroupIsNumeric(){
        $this->CI->load->model('task_entity');
        $entity = new Task_entity();
        $entity->setGroup("abc");
        //$this->expectException(Exception::class);
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    function testStatusEmptyReturningException(){
        $this->CI->load->model('task_entity');
        $entity = new Task_entity();
        $entity->setStatus(null); 
    }
    
    /**
     * @expectedException Exception
     */
    
    function testStatusNot1Or2ReturnsException(){
        $this->CI->load->model('task_entity');
        $entity = new Task_entity();
        $entity->setStatus(3);
        //$this->expectException(Exception::class);
    }
}
