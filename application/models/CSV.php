<?php

  class CSV extends CI_Model{

    function fetch_record(){
      
      $query = "SELECT count(*) as total_rows FROM info";
      return $this->db->query($query)->row_array();
    }

    function fetch_all($offset, $per_page){
      $query = "SELECT * FROM info limit ". $offset .",". $per_page ."";
      return $this->db->query($query)->result_array();
    }


      function insert($FILE){

          ini_set('auto_detect_line_endings', TRUE);
          // session_start();
         
          if (isset($FILE["csv"]["size"]) && $FILE["csv"]["size"] > 0) { 
            
            //get the csv file ​
            $file = $FILE["csv"]["tmp_name"]; 
            //open the file​
            $handle = fopen($file,"r"); 
             
            //loop through the csv file and insert into database ​
            do { 
              if(isset($data[0])) 
              { 
                $insert_information = mysql_query("INSERT INTO info (first_name, last_name, company_name, address, 
                                     city, county, state, zip, phone1, phone2, email, web, created_at) VALUES 
                                 ('".$data[0]."', '".$data[1]."', '".$data[2]."','".$data[3]."', 
                                  '".$data[4]."', '".$data[5]."', '".$data[6]."', '".$data[7]."',   
                                  '".$data[8]."', '".$data[9]."', '".$data[10]."', '".$data[11]."', NOW())"); 
              }
            }
            while($data = fgetcsv($handle,1000));//fgetcsv() function returns the CSV fields in an array on success, or FALSE on failure and EOF​
          
          } 
          // else​ $_SESSION['error'] = "No file has been selected";
        
      }







    }




