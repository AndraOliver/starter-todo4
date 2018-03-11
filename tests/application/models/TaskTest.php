<?php
declare (strict_types =1);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use PHPUnit\Framework\TestCase;
/**
 * Description of TaskTest
 *
 * @author Lucas
 */
class TaskTest extends TestCase
  {
    private $CI;
    private $Task;
    public function setUp()
    {
      // Load CI instance normally
      $this->CI = &get_instance();
      $this->CI->load->model('task_entity');
      $this->Task = new Task_entity();
    }
 
    public function testInvalidPriority() {
     $this->expectException('InvalidArgumentException');
     $this->Task->priority = null;
    }
    
    public function testPriority() {
        $this->Task->priority = 2;
        $this->assertEquals(2, $this->Task->priority);
    }
    
    public function testInvalidTask(){
        $this->expectException('InvalidArgumentException');
        $this->Task->task = null;
    }
    
    public function testTask(){
       $this->Task->task = 'Cleaning';
       $this->assertEquals('Cleaning', $this->Task->task);      
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
    
    function testSetSize(){
        $this->CI->load->model('task_entity');
        $entity = new Task_entity();
        $expected = 3;
        $entity->setSize($expected);
        $this->assertEquals($expected, $entity->size);
    }
    
    function testSetGroup(){
        $this->CI->load->model('task_entity');
        $entity = new Task_entity();
        $expected = 3;
        $entity->setGroup($expected);
        $this->assertEquals($expected, $entity->group);
    }
    
    function testSetStatus(){
        $this->CI->load->model('task_entity');
        $entity = new Task_entity();
        $expected = 2;
        $entity->setStatus($expected);
        $this->assertEquals($expected, $entity->status);
    }
         
  }