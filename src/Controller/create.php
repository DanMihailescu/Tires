<?php
    // src/Controller/create.php
    namespace App\Controller;

    class create{
        //if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['full_name']) && ($_POST['full_name'] == 'loginform')) {
            public function crt() {
                $name = $_POST['full_name'];
                $username = $_POST['email'];
                $password = $_POST['psw'];
                $repPassword = $_POST['psw-repeat'];
                if (!empty($username) || !empty($password)) {
                    if (password == $repPassword) {
                        $hostname = "localhost";
                        $un = "root";
                        $pw = "PineappleJuice124!";
                        $database = "login-info";

                        $conn = new mysqli($hostname,$un,$pw,$database);
                        if (mysqli_connect_error()) {
                            die('Connect Error('. mysqli_connect_errno(). ')'. mysqli_connect_error());
                        }
                        else {
                            $SELECT = "SELECT email in login-info where email = ? Limit 1";
                            $INSERT = "INSERT Into login-info (email, password, full_name), values(?,?,?)";

                            $stmt = $conn->prepare($SELECT);
                            $stmt->bind_param("s", $email);
                            $stmt->execute();
                            $stmt->bind_result($email);
                            $stmt->store_result();
                            $rnum = $stmt->num_rows;

                            if ($rnum==0) {
                                $stmt->close();
                                $stmt = $conn->prepare($INSERT);
                                $stmt->bind_param("ssssii", $username, $password, $name);
                                $stmt->execute();
                                echo  "User entered";
                            }
                            else {
                                echo "Email in use";
                            }
                            $stmt->close();
                            $conn->close();
                        }
                    }
                    else {
                        echo "Password does not match";
                        die();
                    }

                } 
                else {
                    echo "All fields required";
                    die();
                }
            }
        //}
    }
?>