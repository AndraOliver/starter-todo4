<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mtce
 *
 * @author andraavram
 */
class Mtce extends Application {
    //put your code here
    public function index()
        {
                $this->data['pagetitle'] = 'TODO List Maintenance';
                $tasks = $this->tasks->all(); // get all the tasks               

                /*    
                 * 
                 * // substitute the status name
                foreach ($tasks as $task)
                        if (!empty($task->status))
                                $task->status = $this->app->status($task->status);    
                // convert the array of task objects into an array of associative objects       
                foreach ($tasks as $task)
                        $converted[] = (array) $task;

                // and then pass them on
                $this->data['display_tasks'] = $converted;
                $this->data['pagebody'] = 'itemlist';
                $this->render();
                 * 
                 */
                 
                // substitute the status name
                foreach ($tasks as $task)
                    if (!empty($task->status))
                                $task->status = $this->app->status($task->status);

                // build the task presentation output
                $result = '';   // start with an empty array        
                foreach ($tasks as $task)
                    $result .= $this->parser->parse('oneitem',(array)$task,true);

                // and then pass them on
                $this->data['display_tasks'] = $result;
                $this->data['pagebody'] = 'itemlist';
                $this->render();
        }
    
}
