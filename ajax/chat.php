<?php

/***
 * page will be used to refersh data in the chat box
 * its called by ajax
 */
 require '../core/init.php';

  //
 if (isset($_POST['method']) === true && empty($_POST['method']) === false){
    //create object
     $chat =new Chat();
     //
     $method=trim($_POST['method']);

      //
     if($method === 'fetch'){
           //fetch message then output
             //call method
             $messages=$chat->fetchmessage();

             //check if empty
             if(empty($messages) === true){
                echo '<small>No messages currently available</small>';
             }else{
                //loop
                foreach($messages as $message){
                   ?> 
                      <div class="message">
                          <a href="#"><?php echo $message['username'];?></a> says:
                          <p><?php echo $message['message'];?></p>   
                      </div> 
                   <?php
                }
             }
         
       }else if($method === 'throw' && isset($_POST['message'])===true){
            ///throw message into db

              //trim
            $message=trim($_POST['message']);
                 //check if empty
            if(empty($message)===false){

                $chat->throwmessage($_SESSION['user'],$message);
            }

      }
 }

?>