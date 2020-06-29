 
<?php 
    
function conexaoMysql(){
    
    $server = (string) "localhost";
    $user = (string) "wesley";
    $password = (string) "123";    
    $database = (string) "maktub"; 

    return mysqli_connect($server, $user, $password, $database);
}
