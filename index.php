<?PHP
$pagetitle='Expenses Table';
include 'header.php';
require 'Array.php';
?>
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
            
        </table>
    <?PHP
include 'footer.php';
?>
