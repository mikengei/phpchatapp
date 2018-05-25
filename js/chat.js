//global namespace to avoid conflicts
var chat={};

//ajax defination to get message from chat.php
//Has been linked by init.php to all the other php
chat.fetchMessage=function(){

    $.ajax({
         url: 'ajax/chat.php',
         type: 'post',
         data: {method:'fetch'},

         success:function(data){
             $('.chat .messages').html(data);      
         } 
    });
}


chat.throwmessage=function(message){
    //make sure that message lenght  isnt == 0
    if($.trim(message).length != 0){
       $.ajax({
           
        url: 'ajax/chat.php',
        type: 'post',
        data: {method:'throw', message:message},

        success:function(data){
             chat.fetchMessage();
             chat.entry.val('');       
          } 
        });
    }
}

//object interms of a selector in DOM
chat.entry=$('.chat .entry');

//detect keydown 
//on press enter submit
chat.entry.bind('keydown',function(e){

     if (e.keyCode === 13 && e.shiftKey === false){
        //send message       
        chat.throwmessage($(this).val());
          
        //prevent on click enter doesnt go to new line        
        e.preventdefault;
     }
});


//refresh time for messages in chat.php
chat.interval=setInterval(chat.fetchMessage,5000);
//fix on refresh page message data is lost
chat.fetchMessage();