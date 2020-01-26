<?php
    // src/Controller/login.php
    namespace App\Controller;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class login extends Controller
    {
        public function home()
        {
            $hostname = "localhost";
            $username = "root";
            $password = "PineappleJuice124!";
            $database = "login-info";

            mysql_connect($hostname,$username,$password) or die ("connection failed");
            mysql_select_db($database) or die ("error connect database");
            
            if(isset($_POST['login'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $cek = mysql_num_rows(mysql_query("SELECT * FROM user_login WHERE email='$email' AND password='$password'"));
                $data = mysql_fetch_array(mysql_query("SELECT * FROM user_login WHERE email='$email' AND password='$password'"));
                if($cek > 0){
                    session_start();
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['name'] = $data['full_name'];
                    echo "<script language=\"javascript\">alert(\"welcome \");document.location.href='index.php';</script>";
                }else{
                    echo "<script language=\"javascript\">alert(\"Invalid username or password\");document.location.href='login.php';</script>";
                }
            }
        }
    }
?>