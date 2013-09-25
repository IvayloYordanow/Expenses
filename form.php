<?PHP
mb_internal_encoding('UTF-8');
$pagetitle='Form to fill';
include 'header.php';
require 'Array.php';

$error=false;

if($_POST){

    $username=trim($_POST['username']);
    $username=  strip_tags($_POST['username']);
    $username=str_replace('!', '', $username);
    $costs=trim($_POST['costs']);
    $costs=str_replace('!', '', $costs);
    $costs=str_replace(',', '.', $costs);
    $group=(int)$_POST['group'];
    
    $error=false;



	   $date=trim($_POST['date']);	
           $date = strtotime("$date 00:00:01");
        
     if (!$date){	
         echo '<p>Invalid Date. Type the date in this format - "dd/mm/yyyy"</p>';	
         $error=true;

     }
       else {
           
           $date = date('d/m/Y', $date);
       }    

    if(mb_strlen($username)<4)
     
    {
    echo '<p> Too short name </p>';
    $error=true;
    
    }

    if(mb_strlen($username)>100){
    
    echo '<p> Too long name </p>';
    $error=true;
    }


    if (!is_numeric($costs))
                
    {
    echo 'Cost must be a number';
    $error=true;
    }


    if($costs<=0)
    {
    echo '<p>Wrong expensess</p>'; 
    $error=true;
    }

    if(! $Type [$group]){
    
    echo '<p>Invalid Group</p>';
    $error=true;
    }



    if(!$error){
    $result=$date.'!'.$username.'!'.$costs.'!'.$group."\r\n";
         if (file_put_contents('data.txt',$result,FILE_APPEND)){
         echo 'Record saved';
         } 
    }
   }

?>
        <a href="index.php">Please fill the form</a>
       
        <form method="POST">
            <table>
                
                <tr>
        <td><label for="date">Date:</label></td>
        <td> <input type="text" name="date" value="dd/mm/yyyy" id="date" /></td>
                </tr>
                
               
                <tr>
        <td><label for="name">Name:</label></td>
        <td><input type="text" name="username" id="name"/></td>
                </tr>
                
                
                <tr> 
        <td><label for="costs">Cost:</label></td> 
        <td><input type="text" name="costs" id="costs"/></td>
                </tr>
            
             </table>
            
            <br>
            
            
        <table>
            <tr>
                <td> Select a type from the drop down menu<td>
            </tr>
            
            <tr>
                <td>
                    <select name="group">
                    <?php
               
                    foreach ($Type as $key=> $value) {
                    echo '<option value= "'.$key.'">'.$value.'</option>';
                     }
               
                     ?>
                   
                   
                    </select>
            
                 
        
                
                    <input type="submit" value="Add"></div>
                </td>
            </tr>
            
         </table>
        </form>
        
     <?PHP
include 'footer.php';
     ?>

