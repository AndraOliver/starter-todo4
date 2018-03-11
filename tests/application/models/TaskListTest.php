<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * @author Lucas
 */
//require_once ('PHPUnit/Framework/TestCase.php');
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
        $this->assertTrue($completed < $size/2);
    }
    
    function testNotMoreThan3InProgress(){
        $inProgress = 0;
        $data = $this->CI->tasks->all();
        foreach($data as $task)
        {
            if ($task->status == 1)
            {
                $inProgress++;
            }
        }
        $this->assertTrue($inProgress < 3);
        
    }
    
    
}
