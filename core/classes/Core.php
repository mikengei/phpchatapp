<?php
/**
 * Databases functions
 * Queries
 * 
 */
class Core{
   /**
    * $db--->link connection
    * $result--> query results
    */
    protected $db,$results;
    private $rows;

    public function __construct(){
         //connection
        $this->db=new mysqli('localhost','root','','chat');

    }
    public function query($sql){
      //store query in results
       $this->results=$this->db->query($sql);
       //my method
          //$this->results=mysqli_query($this->db,$sql);

    }
    
    public function rows(){
        /*show data in the database
          while($this->rows=mysqli_fetch_assoc($this->results)){
               echo "h2".$this->rows['username']."</h2><br>";
          }*/

     /*loop for query*/
        for($x=1; $x <= $this->db->affected_rows; $x++){
            $this->rows[]=$this->results->fetch_assoc();
        }
        return $this->rows;
    }

    


}



?>