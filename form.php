<?PHP
mb_internal_encoding('UTF-8');
$pagetitle='Form to fill';
include 'header.php';
require 'Array.php';

$error=false;

if($_POST){

$username=trim($_POST['username']);
$username=str_replace('!', '', $username);
$costs=trim($_POST['costs']);
$costs=str_replace('!', '', $costs);
$group=(int)$_POST['group'];
$error=false;



	$date=trim($_POST['date']);	
        $date = strtotime("$date 00:00:01");
        
if (!$date){	
echo '<p>Invalid Date. Type the date in this format - "dd/mm/yyyy"</p>';	
$error=true;

}
else $date = date('d/M/Y', $date);

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
    echo 'You must type a number';
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
        <div>Date:<input type="text" name="date" value="dd/mm/yyyy" /></div>
        <div>Name:<input type="text" name="username"/></div>
        <div>Cost:<input type="text" name="costs"/></div>
        <div>
           <select name="group">
               <?php
               
               foreach ($Type as $key=> $value) {
                  echo '<option value= "'.$key.'">'.$value.'</option>';
               }
               
               ?>
                   
                   
           </select>
            
        </div>
        
        <div><input type="submit" value="Dobavi"></div>
        </form>
        
     <?PHP
include 'footer.php';
?>
