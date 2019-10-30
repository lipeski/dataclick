if ( (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) || (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin']) ) 
{
    header("Location: http://www.google.com");
    exit(); 
}