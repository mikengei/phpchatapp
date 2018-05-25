<?php
/**
 * Handle mesaages being sent or received
 *Extends for Core.php 
 * handle queries
 */
 class Chat extends Core{

      //fetch messages
     public function fetchmessage(){
         /**
          * SELECT table chat->column message
          * SELECT table users->column username and user_id
          *
          *FROM the table chat
          *JOIN users table
          *ON based on which keys
          *arrange in descending order based on timestamp
          */
        $this->query("
            SELECT     `chat`.`message`,
                       `users`.`username`,
                       `users`.`user_id`
            FROM       `chat`
            JOIN       `users`
            ON         `chat`.`user_id`=`users`.`user_id`
            ORDER BY   `chat`.timestamp
            DESC            
        ");

        return $this->rows();
     }
      //Throw message
     public function throwmessage($user_id,$message){
         //insert in to db
         $this->query("INSERT INTO `chat` (`user_id`,`message`,`timestamp`) VALUES (".(int)$user_id.",'".$this->db->real_escape_string(htmlentities($message)) ."', UNIX_TIMESTAMP())");

     }

 }




?>