<?php
//start a session
session_start();

//assign global session
//check if url get method  'user'  is set and assign 1 or 0
$_SESSION['user']=(isset($_GET['user'])==true) ? (int)$_GET['user'] : 0;

//--------------------------------------------------------------------------------
/*require 'core/classes/Core.php';
require 'core/classes/Chat.php';

$chat=new Chat();

//test select
//echo '<pre>'.print_r($chat->fetchmessage(),true).'</pre>';

//test insert
$chat->throwmessage(1,'this is a test message');
*/
//--------------------------------------------------------------------------------------
?>

<html>
<head>
   <title>Lets Chat</title>
   
   <link href="css/styles.css" rel="stylesheet"/>
</head>
<body>


<div class="chat">
 <div class="messages">
    <div class="message">
        
    </div>
 </div>

    <textarea class="entry" placeholder="write something here ......." ></textarea>
  
</div>      



   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/chat.js"></script>
</body>
</html>