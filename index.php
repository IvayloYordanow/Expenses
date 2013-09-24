<?PHP
$pagetitle='Expenses Table';
include 'header.php';
require 'Array.php';

    
?>
<form method="POST">
        
           <div>
           <select name="groups">
               <?php
               $groups=$_POST["group"];
               
               foreach ($Type as $key=> $value)
                   {
                   if($key ==$groups ){
                       $selected='selected';
                   }
                   else {
                       $selected='';
                   }
                  echo '<option value= "'.$key.'">'.$value.'</option>';
               }
               
               ?> 
           </select>
               <input type="submit" value="Filter"/>
            
        </div>
    </form>
    <br>
   

        <a href="form.php">Expenses</a>

        <table border="1">
            <tr>
                <td>Date</td>
                <td>Name</td>
                <td>Expenses</td>
                <td>Group</td> 
            </tr>
            
            
            <?php
            if(file_exists('data.txt')){
                
                $result=  file('data.txt');
                
                foreach ($result as $value) {
                    $columns=  explode('!', $value);
                    
                    
                
                    
                    echo '<tr>
                 <td>'.$columns[0].'</td>
                 <td>'.$columns[1].'</td>
                 <td>'.$columns[2].'</td>
                 <td>'.$Type[trim($columns[3])].'</td>    
                         </tr>';
                    
                }
            }
            
            ?>
            
            
            
            
            
            <?php
if (isset($_POST['group'])) {
    $group = $_POST['group'];
}
 $group=-1;

  if ($group === trim($columns[3])){
      echo '<tr>
                 <td>'.$columns[0].'</td>
                 <td>'.$columns[1].'</td>
                 <td>'.$columns[2].'</td>
                 <td>'.$Type[trim($columns[3])].'</td>    
                         </tr>';
                    
      
      
  }      

  else {
      
      
  }
  

?>
            
        </table>
    <?PHP
include 'footer.php';
?>

