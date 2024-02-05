<?php
    /*
    login()
    create()
    get_user()
    change_password($pwd, $id)
    update_user($id)
    show_user_profile_nav()
    show_user_profile_mob()
    check_user_session
    show_accounts_admin($user_status, $account_status, $account_type)
    update_account_status($status, $id)
    delete_account
    */
    class User extends Db {
        public function __construct() {
            $this->con = $this->con();
        }
        public function startSession() {
            ob_start();
            session_start();
        }
        public function endSession() {
            session_unset();
            session_destroy();
        }
        public function get_uid() {
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                $uid = $userdata['uid'];
                return $uid;
            }
        }
        public function get_user_status() {
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                $user_status = $userdata['user_status'];
                return $user_status;
            }
        }
        public function get_account_status() {
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                $account_status = $userdata['account_status'];
                return $account_status;
            }
        }

        public function get_account_type() {
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                $account_type = $userdata['account_type'];
                return $account_type;
            }
        }
        public function login() {
            $this->startSession();

            $email = $_POST['email'];
            $password = $_POST['password'];     
            
            $exclude_status = 'deleted';

            $stmt = $this->con->prepare("SELECT * FROM users WHERE email=? AND user_account_status!=?");
            $stmt->bind_param('ss', $email, $exclude_status);
            $stmt->execute();
            
            $result = $stmt->get_result();
            $userCount = $result->num_rows;
            
            if($userCount == 0) {
                echo 'status=0';
                return;
            } else {   
                $data = $result->fetch_all(MYSQLI_ASSOC);         
                foreach($data as $row):
                    if($row["user_account_status"] == 'not verified') {
                        echo 'status=000';
                        return;
                    } else if ($row["user_account_status"] == 'verified') {
                        if($password === trim($row['pwd'])) {
                        // if($pwd_check == true) {
                            if (isset($_POST["remember"]) && !empty($_POST["remember"])) {
                                setcookie("uid", $row['id'], time() + (10 * 365 * 24 * 60 * 60));
                                // Username is stored as cookie for 10 years as
                                // 10years * 365days * 24hrs * 60mins * 60secs
                                setcookie("user_email", $email, time() + (10 * 365 * 24 * 60 * 60));
                                // Password is stored as cookie for 10 years as 
                                // 10years * 365days * 24hrs * 60mins * 60secs
                                setcookie("user_password", $password, time() + (10 * 365 * 24 * 60 * 60));            
                            } else {
                                if (isset($_COOKIE["user_login"])) {
                                    setcookie("user_login", "");
                                }
                                if (isset($_COOKIE["user_password"])) {
                                    setcookie("user_password", "");
                                }                    
                            }
                            $pfp = $this->get_profile_img($row['photo']);
                            $userdata = array(
                                'logged' => 1,
                                'uid' => $row['id'],
                                'email' => $email,
                                'user_img' => $pfp,
                                'user_status' => $row['user_status'],
                                'account_status' => $row['user_account_status'],
                                'account_type' => $row['account_type']
                            );
                            $_SESSION['user'] = json_encode($userdata, true);
                            
                            if($row['user_status'] == 'admin') {
                                echo 'status=1';
                                return;
                            } else {
                                echo 'status=2';
                                return;
                            }
                        } else {
                            echo 'status=00';
                            return;
                        }
                    } else {
                        echo 'status=0000';
                        return;
                    }
                endforeach;
            }        
            $stmt->close();
        }
        public function logout() {
            $this->startSession();
            $this->endSession();
            header('location: ../'); 
        }
        public function check_user_session() {
            $server = $_SERVER['SERVER_NAME'];
            $uriArray = explode('/', $_SERVER['REQUEST_URI']);
            $pagename = basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $files = array("index");
            // var_dump($_SESSION['user']);

            if($server === 'localhost') {
                $folder = $uriArray[2];
            }  else {
                $folder = $uriArray[1];
            }
            if($folder == "admin") {     
                $adminNavBtn = "<div id='navBtn'>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>";
                $path = '../';
            } else {
                $adminNavBtn = "";
                $path = './';
            }
            // var_dump($folder, $pagename, $package_status);
            /*
                If user session is not set (user not logged in) redirect to home page
                If user_status does not equal 'admin' redirect
            */
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                
                if($userdata['user_status'] == 'admin') {
                    $user_img = 'admin.png';
                } else {
                    $user_img = $userdata['user_img'];
                }
                if($userdata['user_status'] == 'admin') {  
                    if($folder == 'admin') {
                        echo "<div class='admin_bar'>
                            <div class='inner_div'>
                                <div class='site-links'>
                                    <div class='logo'>                
                                        <div class='logo-text'>
                                            <a href='../'>
                                                <img src='../img/6.png?v=2' alt=''>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class='profile-btn'>
                                    <div id='profile-trigger'>
                                        <div><a href='../user-profile?id={$userdata['uid']}'>Admin</a></div>
                                        <div id='profile-pic-wrapper'>
                                            <img src='../img/$user_img'> 
                                        </div>
                                        <div>
                                            <i onclick='profileTrigger();' class='fas fa-angle-down'></i>
                                        </div>
                                    </div>
                                    <div id='profile-dropdown'>
                                        <a style='color:#000;' href='../controllers/logout-handler'>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    } else {
                        return;
                    }
                } else if ($userdata['user_status'] == 'member') {
                    if ($folder == "admin") {
                        header('location: ../');
                    } else {
                        if ($userdata['account_type'] == 'personal') {
                            $h = 1;
                        } else if($userdata['account_status'] == 'business') {
                            $h = 2;
                        }
                    }
                }
            } else if (!isset($_SESSION['user'])) {
                $h = 3;
                if($folder == "admin") {
                    header('location: ../');
                    exit();
                }
                if($pagename == "new-request" || $pagename == "msg" || $pagename == "user-profile") {
                    header('location: ./login');
                    exit();
                }
            }
            // var_dump($userdata);
        }
        public function create() {
            // var_dump($_POST);
            $this->startSession();
            $account_type = $_POST['account_type'];

            if($account_type == 'personal') {
                $email = $_POST['email'];

                $details = array(
                    'fname' => $_POST['fname'],
                    'lname' => $_POST['lname'],
                    'age' => $_POST['age']
                );
                $user_details = json_encode($details, true);

                $phone = $_POST['phone'];      
                $age = intval($_POST['age']);      
                $password = $_POST['password'];      
                $repeat_password = $_POST['repeat_password'];      
                $user_address = $_POST['address'];      
                $account_status = 'new';
            } elseif($account_type == 'business') {
                $email = $_POST['business_email'];      
                $phone = $_POST['business_phone'];   

                $details = array(
                    'name' => $_POST['business_name']
                );
                $user_details = json_encode($details, true);   

                $password = $_POST['business_password'];      
                $repeat_password = $_POST['repeat_business_password'];      
                $user_address = $_POST['business_address'];    
            }
            $user_account_status = 'not verified';
            $user_status = 'member';

            $now = new DateTime("now", new DateTimeZone('Asia/Singapore') );
            $created_at = $now->format('Y-m-d H:i:s');

            $updated_at = $created_at;

            $payment_details = '';

            


            $img = $_FILES['image']['name'];
            if(!empty($img)) {
                $allowed = array('png', 'jpg', 'jpeg', 'webp');
                $ext = pathinfo($img, PATHINFO_EXTENSION);

                // CHECK IF FILE TYPE IS ALLOWED
                if (!in_array($ext, $allowed)) {
                    echo '<span class=errorMsg>Incorrect File Type</span>';
                    exit();
                } else {
                    $imagePath = '../img/';
                    $uniquesavename = intval(time().uniqid(rand(10, 20)));
                    $uniquesavename2 = time().uniqid(rand(10, 20)).'2';
    
                    // var_dump($uniquesavename, $uniquesavename2);
                    $destFile = $imagePath . $uniquesavename . '.'.$ext;
                    $destFile2 = $imagePath . $uniquesavename2. '.'.$ext;
    
                    $tempname = $_FILES['image']['tmp_name'];
    
                    // $size = getimagesize($tempname);
                    // $width = $size[0];
                    // $height = $size[1];
    
                    $img_sm = resize_image($tempname, 400, 400);
    
                    imagejpeg($img_sm, $destFile, $uniquesavename);
                    move_uploaded_file($tempname,  $destFile2);
    
                    $file_array = array(
                        'sm' => $uniquesavename . '.'.$ext,
                        'lg' => $uniquesavename2 . '.'.$ext
                    );
                    $photo = json_encode($file_array, true);
                }
            } else {
                $photo = '';
            }
            
            // $password = $this->generate_pwd(12);
            

            
            if($password == $repeat_password) {
                $stmt = $this->con->prepare("INSERT INTO users(email, phone, user_details, pwd, user_address, photo, user_status, user_account_status, account_type, payment_details, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssssssss", $email, $phone, $user_details, $password, $user_address, $photo, $user_status, $user_account_status, $account_type, $payment_details, $created_at, $updated_at);
            } else {
                echo '<div>Passwords don\'t match</div>';
            }
             

            if($stmt->execute()) {
                $_SESSION['email'] = $email;
            } else {
                echo '<div>There was an error</div>';
            }

            $stmt->close();

            

            // SEND THE EMAIL
            $server = $_SERVER['SERVER_NAME'];

            if($server === 'localhost') {
                return;
            } else {
                // Generate verification link
                $url = $this->generatePwdLink($email);

                // Send email
                $to = $email;
                $subject = 'Antelov Verification Email';
                $msgBody = "<p>Verify your email by clicking link below</p>";
                $msgBody .= '<a href="'.$url.'">'.$url.'</a>';
                $this->sendEmailSwiftMailer($to, $subject, $msgBody);  
            }
        }
        private function get_profile_img($photo) {
            $p = json_decode($photo, true);
            if(is_array($p)) {
                $pfp = $p['sm'];
            } else {
                $pfp = 'avi.png';
            }
            return $pfp;
        }
        public function verify() {
            if(isset($_GET['selector']) && isset($_GET['validator'])) {
                $selector = $_GET['selector'];
                $validator = $_GET['validator'];
           
                $stmt = $this->con->prepare("SELECT * FROM pwd_reset WHERE pwd_reset_selector=?");
                $stmt->bind_param('s', $selector);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows == 0) {
                    $user_account_status = 'not verified';
                } else {              
                    $data = $result->fetch_all(MYSQLI_ASSOC);
                    foreach($data as $row):
                        $token_bin = hex2bin($validator);
                        $token_check = password_verify($token_bin, $row['pwd_reset_token']);                  
                        if($token_check === false) {
                            $user_account_status = 'not verified';
                        } elseif($token_check === true) {
                            $email = $row['pwd_reset_email'];
                            $stmt->close();

                            $exclude_status = 'deleted';
                            $user_account_status = 'verified';
                            $stmt = $this->con->prepare("UPDATE users SET user_account_status=? WHERE user_account_status!=? AND email=?");
                            $stmt->bind_param('sss', $user_account_status, $exclude_status, $email);
                            $stmt->execute();
                            $stmt->close();
                        }
                    endforeach;

                    // DELETE EXISTING TOKENS
                    $stmt = $this->con->prepare("DELETE FROM pwd_reset WHERE pwd_reset_email=?");
                    $stmt->bind_param('s', $email);
                    $stmt->execute();
                    $stmt->close();
                }
                return $user_account_status;
            }
        }
        private function generatePwdLink($email) {
            // GENERATE PASSWORD LINK
            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);
        
            
            // This link will be sent to the user by email
            $url = "https://giordins.ga/confirmation?selector=".$selector."&validator=".bin2hex($token);
            // Expiration date for token (1800ms = 1hr)
            $expires = date("U") + 1800;
            // Insert token in the database (we'll need a new table for this)
        
            // DELETE EXISTING TOKENS
            $stmt = $this->con->prepare("DELETE FROM pwd_reset WHERE pwd_reset_email=?");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->close();
            // INSERT NEW TOKEN
            $stmt = $this->con->prepare("INSERT INTO pwd_reset (pwd_reset_email, pwd_reset_selector, pwd_reset_token, pwd_reset_expires) VALUES (?, ?, ?, ?);");
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            $stmt->bind_param('ssss', $email, $selector, $hashedToken, $expires);
            $stmt->execute();
            $stmt->close();

            return $url;
        }
        public function sendEmailSwiftMailer($to, $subject, $msgBody) {
            // Swiftmailer
            require_once '../vendor/autoload.php';
            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('testemail6329@gmail.com')
            ->setPassword('jqirpnikokarwynn')
            ;
            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
        
            
            $message = (new Swift_Message($subject))
            ->setFrom(['testemail6329@gmail.com' => 'Antelov'])
            ->setTo([$to])
            ->setBody($msgBody,'text/html')
            ;
            // Send the message
            $result = $mailer->send($message);
        }
        // get_personal_accounts('member', 'account_status', 'personal');
        private function get_accounts($user_status, $account_status=null, $account_type = null, $search = null) {
            $accounts_array = array();

            $deleted = 'deleted';

            if($account_type == null && $search == null) {
                $stmt = $this->con->prepare("SELECT * FROM users WHERE user_status=? AND user_account_status!=? ORDER BY id DESC");
                $stmt->bind_param('ss', $user_status, $deleted);
                $stmt->execute();
            } else if($search != null) {
                if($account_type == 'personal' || $account_type == 'business') {
                    $stmt = $this->con->prepare("SELECT * FROM users WHERE account_type=? AND user_status=? AND user_account_status!=? AND (user_details LIKE '%$search%' || email LIKE '%$search%' || phone LIKE '%$search%') ORDER BY id DESC");
                    $stmt->bind_param('sss', $account_type, $user_status, $deleted);
                    $stmt->execute();
                } else if($account_type == null && $account_status == 'deleted') {
                    $stmt = $this->con->prepare("SELECT * FROM users WHERE user_status=? AND user_account_status=? AND (user_details LIKE '%$search%' || email LIKE '%$search%' || phone LIKE '%$search%') ORDER BY id DESC");
                    $stmt->bind_param('sss', $user_status, $deleted);
                    $stmt->execute();
                }
            } else {
                $stmt = $this->con->prepare("SELECT * FROM users WHERE account_type=? AND user_status=? ORDER BY id DESC");
                $stmt->bind_param('ss', $account_type, $user_status);
                $stmt->execute();
            }

            $meta = $stmt->result_metadata();
            $result = array();
            while ($field = $meta->fetch_field()) {
                $parameters[] = &$row[$field->name];
            }
            call_user_func_array(array($stmt, 'bind_result'), $parameters);
            while ($stmt->fetch()) {
                foreach($row as $key => $val) {
                    $x[$key] = $val;
                }
                $result[] = $x;
            }
            if(count($result) > 0) {
                foreach($result as $row):

                    $elapsed = elapsed($row['created_at']);

                    $account_array = array(
                        'id' => $row['id'],
                        'email' => $row['email'],
                        'phone' => $row['phone'],
                        'user_details' => $row['user_details'],
                        'pwd' => $row['pwd'],
                        'user_address' => $row['user_address'],
                        'photo' => $row['photo'],
                        'user_status' => $row['user_status'],
                        'user_account_status' => $row['user_account_status'],
                        'account_type' => $row['account_type'],
                        'payment_details' => $row['payment_details'],
                        'created_at' => $row['created_at'],
                        'updated_at' => $row['updated_at'],
                        'elapsed' => $elapsed
                    );
                    array_push($accounts_array, $account_array);
                endforeach;
                $stmt->close();
            }
            return $accounts_array;
        }
        public function show_accounts($user_status, $account_status, $account_type) {
            if($account_type == 'personal') {
                $users_array = $this->get_accounts('member', 'verified', 'personal');
            } else {
                $users_array = $this->get_accounts('member', 'verified', 'business');
            }

            $num_of_rows = count($users_array);
            $results_per_page = 5;
            // Number of total pages available
            $num_of_pages = ceil($num_of_rows/$results_per_page);
            // var_dump($num_of_pages);
            // Determine which page user is currently on
            if(!isset($_GET['page'])) {
                $page = 1;
            } else {
                if($_GET['page'] == 0) {
                    $page = 1;
                } else {
                    $page = intval($_GET['page']);
                }
            }
            $starting_limit_number = ($page-1)*$results_per_page;

            $usersStr = "";

            for($x=$starting_limit_number; $x<$starting_limit_number+$results_per_page; $x++) {
                if($x < $num_of_rows) {
                    $user_array = $users_array[$x];
                    

                    
                    if(!empty($user_array['photo'])) {
                        if(!empty($user_account_status) && isset($user_account_status) && $user_account_status == 'approved') {
                            $photoStr = "<div class='proposal-photo'>
                                <img src='./img/{$user_array['photo']}'>
                            </div>";
                        } else {
                            $photoStr = "<div class='proposal-photo'>
                                <img src='./img/{$user_array['photo']}'>
                                <div class='img-overlay-outer'>
                                    <div class='img-overlay'>
                                        <div class='img-overlay-inner'>
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    } else {
                        $photoStr = "<div class='proposal-photo'>
                            <img src='./img/avi.png?v=2'>
                        </div>";
                    }
                    $user_details = json_decode($user_array['user_details'], true);
                    if($user_array['account_type'] == 'personal') {
                        // $fname = $user_details->fname;
                        // $lanme = $user_details->lname;
                        // $age = $user_details->age;
                        $fname = $user_details['fname'];
                        $lanme = $user_details['lname'];
                        $age = $user_details['age'];

                        $name_str = "<div class='col' id='col-1'>
                            <span>Name: </span>
                            <span>$fname $lanme</span>
                        </div>";
                        $age_str = "<div class='col' id='col-1'>
                            <span>Age: </span>
                            <span>$age</span>
                        </div>";
                    }
                    if($user_array['account_type'] == 'business') {
                        // $name = $user_details->name;
                        $fname = $user_details['name'];
                        $name_str = "<div class='col' id='col-1'>
                            <span>Name: </span>
                            <span>$name</span>
                        </div>";
                        $age_str = "";
                    }
                    $elapsed = "<div class='col' id='col-2'>
                        <span>{$user_array['elapsed']}</span>
                    </div>";

                    $usersStr .= "
                    <div class='proposal'>
                        <div class='proposal-head'>
                            $name_str
                            $elapsed
                        </div>
                        <div class='proposal-body'>
                            $age_str
                        </div>              
                    </div>";         
                // endforeach;
                }
            }
            if($page == 1) {
                $prev = $page;
            } else {
                $prev = $page - 1;
            }
            if($page == $num_of_pages) {
                $next = $page;
            } else {
                $next = $page + 1;
            }
            $usersFooter = "<div class='pagination'>
                <div>
                    <a class='page-num arrow' href='./index?page=".$prev."'>
                        <i class='fas fa-arrow-left'></i>
                    </a>
                </div>
            <div class='pagination-links'>";
            for($p=1;$p<=$num_of_pages;$p++) {
                if($page == $p) {
                    $usersFooter .= "<a class='page-num current-page' href='./contacts?page=".$p."'>".$p."</a> ";
                } 
                else {
                    if($num_of_pages >= $page + 1 && $page > 2) {
                        if($p == $page - 2 || $p == $page - 1 || $p == $page + 1) {
                            $usersFooter .= "<a class='page-num' style='' href='./index?page=".$p."'>".$p."</a> ";
                        }
                    } elseif ($num_of_pages >= $page + 2 && $page == 2) {
                        if($p == $page - 1 || $p <= $page + 2) {
                            $usersFooter .= "<a class='page-num' style='' href='./index?page=".$p."'>".$p."</a> ";
                        }
                    } elseif ($num_of_pages >= $page + 3 && $page == 1) {
                        if($p <= $page + 3) {
                            $usersFooter .= "<a class='page-num' style='' href='./index?page=".$p."'>".$p."</a> ";
                        }
                    } elseif ($num_of_pages < $page + 3 && $page == 1) {
                        if($p <= $page + 2) {
                            $usersFooter .= "<a class='page-num' style='' href='./index?page=".$p."'>".$p."</a> ";
                        }
                    } elseif ($num_of_pages < $page + 2 && $page == 1) {
                        if($p <= $page + 1) {
                            $usersFooter .= "<a class='page-num' style='' href='./index?page=".$p."'>".$p."</a> ";
                        }
                    } elseif ($page > 3 && $page == $num_of_pages) {
                        if($p == $page - 1 || $p == $page - 2 || $p == $page - 3) {
                            $usersFooter .= "<a class='page-num' style='' href='./index?page=".$p."'>".$p."</a> ";
                        }
                    } elseif ($page == 3 && $page == $num_of_pages) {
                        if($p == $page - 1 || $p == $page - 2) {
                            $usersFooter .= "<a class='page-num' style='' href='./index?page=".$p."'>".$p."</a> ";
                        }
                    } elseif ($page == 2 && $page == $num_of_pages) {
                        if($p == $page - 1) {
                            $usersFooter .= "<a class='page-num' style='' href='./index?page=".$p."'>".$p."</a> ";
                        }
                    }
                }
            }
            $usersFooter .= "</div>
                <div>
                    <a class='page-num arrow' href='./index?page=".$next."'>
                        <i class='fas fa-arrow-right'></i>
                    </a>
                </div>
            </div>";
            $usersStr .= $usersFooter;
            return $usersStr;
        }
        public function show_accounts_admin($user_status, $account_status=null, $account_type = null, $search = null) {
            $scriptname = $_SERVER["SCRIPT_FILENAME"];
            $pagename = basename($_SERVER["SCRIPT_FILENAME"], '.php');

            if($search == null) {
                if($account_type == 'personal') {
                    $users_array = $this->get_accounts('member', null, 'personal');
                } else if($account_type == 'business') {
                    $users_array = $this->get_accounts('member', null, 'business');
                } else if($account_status == 'deleted') {
                    $users_array = $this->get_accounts('member', null, 'deleted');
                }
            } else {
                if($account_type == 'personal') {
                    $users_array = $this->get_accounts('member', 'personal', $search);
                } else if($account_type == 'business') {
                    $users_array = $this->get_accounts('member', 'business', $search);
                } else if($account_status == 'deleted') {
                    $users_array = $this->get_accounts('member', 'deleted', null, $search);
                }
            }   

            $num_of_rows = count($users_array);
            $results_per_page = 5;
            // Number of total pages available
            $num_of_pages = ceil($num_of_rows/$results_per_page);
            // var_dump($num_of_pages);
            // Determine which page user is currently on
            if(!isset($_GET['page'])) {
                $page = 1;
            } else {
                if($_GET['page'] == 0) {
                    $page = 1;
                } else {
                    $page = intval($_GET['page']);
                }
            }
            $starting_limit_number = ($page-1)*$results_per_page;

            $usersStr = "<div class='profiles-wrapper'>
                <input type='hidden' id='user_count' value='$num_of_rows'>
                <div class='profiles-header'>
                    <div>

                    </div>
                    <div>
                        Full Name
                    </div>
                    <div>
                        Email
                    </div>
                    <div>
                        Phone
                    </div>
                    <div class='actions'>
                        Actions
                    </div>
                </div>
                <div class='profiles-body'>";

            for($x=$starting_limit_number; $x<$starting_limit_number+$results_per_page; $x++) {
                if($x < $num_of_rows) {
                    $user_array = $users_array[$x];
                    
                    $user_id = $user_array['id'];
                    
                    if(!empty($user_array['photo'])) {
                        if(!empty($user_account_status) && isset($user_account_status) && $user_account_status == 'approved') {
                            $photoStr = "<div class='proposal-photo'>
                                <img src='./img/{$user_array['photo']}'>
                            </div>";
                        } else {
                            $photoStr = "<div class='proposal-photo'>
                                <img src='../img/{$user_array['photo']}'>
                                <div class='img-overlay-outer'>
                                    <div class='img-overlay'>
                                        <div class='img-overlay-inner'>
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    } else {
                        $photoStr = "<div class='proposal-photo'>
                            <img src='../img/avi.png?v=2'>
                        </div>";
                    }
                    $user_details = json_decode($user_array['user_details'], true);
                    if($user_array['account_type'] == 'personal') {
                        // $fname = $user_details->fname;
                        // $lanme = $user_details->lname;
                        // $age = $user_details->age;
                        $fname = $user_details['fname'];
                        $lanme = $user_details['lname'];
                        $age = $user_details['age'];

                        $name_str = "<div>
                            <span>$fname $lanme</span>
                        </div>";
                        $age_str = "<div class='proposal-info'>
                            <span>Age: </span>
                            <span>$age</span>
                        </div>";
                    }
                    if($user_array['account_type'] == 'business') {
                        // $name = $user_details->name;
                        $name = $user_details['name'];
                        $name_str = "<div>
                            <span>$name</span>
                        </div>";
                        $age_str = "";
                    }
                    // if($user_array['user_account_status'] == 'verified') {
                    //     $actionsStr = "<div class='actions'>
                    //         <span class='placeholder-span'></span>
                    //         <div onclick='change_status(\"$pagename\", \"not verified\", $user_id);'><i class='fas fa-times'></i></div>
                    //         <div><i onclick='change_status(\"$pagename\", \"deleted\", $user_id);' class='fa fa-trash' aria-hidden='true'></i></div>
                    //     </div>";
                    // }
                    // if($user_array['user_account_status'] == 'not verified') {
                        $actionsStr = "<div class='actions'>
                            <div onclick='change_status(\"$pagename\", \"verified\", $user_id);'><i class='fas fa-check'></i></div>
                            <div onclick='change_status(\"$pagename\", \"not verified\", $user_id);'><i class='fas fa-times'></i></div>
                            <div><i onclick='change_status(\"$pagename\", \"deleted\", $user_id);' class='fa fa-trash' aria-hidden='true'></i></div>
                        </div>";
                    // }
                    // if($user_array['user_account_status'] == 'deleted') {
                    //     $actionsStr = "<div class='actions'>
                    //         <div onclick='change_status(\"$pagename\", \"verified\", $user_id);'><i class='fas fa-check'></i></div>
                    //         <div onclick='change_status(\"$pagename\", \"not verified\", $user_id);'><i class='fas fa-times'></i></div>
                    //         <span class='placeholder-span'></span>
                    //     </div>";
                    // }
                    
                    $elapsed = "<div class='col' id='col-2'>
                        <span>{$user_array['elapsed']}</span>
                    </div>";

                    $usersStr .= "
                    <div class='profile'>
                        <div class='profile-head'>
                            <div class='profile-arrow'>
                                <i class='fas fa-angle-down'></i>                             
                            </div>
                            $name_str
                            <div>
                                <span>{$user_array['email']}</span>
                            </div>
                            <div>
                                <span>{$user_array['phone']}</span>
                            </div> 
                            $actionsStr
                        </div> 
                        <div class='profile-body' style='display: none;'>
                            <div class='profile-body-inner'>
                                <div class='col' id='col-1'>
                                    $photoStr
                                </div>

                                <div class='proposal-info-col col' id='col-2'>
                                    <div class='proposal-info'>
                                        <span>Address: </span>
                                        <span>{$user_array['user_address']}</span>
                                    </div>
                                    $age_str
                                    <div class='proposal-info'>
                                        <span>Account Type: </span>
                                        <span>{$user_array['account_type']}</span>
                                    </div>
                                    <div class='proposal-info'>
                                        <span>Account Status: </span>
                                        <span>{$user_array['user_account_status']}</span>
                                    </div>
                                    <div class='proposal-info'>
                                        <span>Created At: </span>
                                        <span>$elapsed</span>
                                    </div>
                                </div>
                            </div>
                        </div>             
                    </div>";         
                // endforeach;
                }
            }
            $usersStr .= "</div>
            ";
            if($page == 1) {
                $prev = $page;
            } else {
                $prev = $page - 1;
            }
            if($page == $num_of_pages) {
                $next = $page;
            } else {
                $next = $page + 1;
            }
            
            $userFooter = "
            <div class='profiles-footer' style='margin-left: auto; color:rgb(94,92,91); font-size: 16px;'>
                <div>
                    Showing $page of $num_of_pages
                </div>
            </div>
            </div>
            ";
            $userFooter .= "
            <style>
                .pagination div:nth-child(1) a {
                    color: rgb(138,138,138);
                    background-color: rgb(255,255,255);
                    border: 1px solid rgb(138,138,138);
                }
                .pagination div:nth-child(2) a {
                    color: rgb(255,255,255);
                    background-color: rgb(255,158,65);
                    border: none;
                }
            </style>
            <div class='pagination'>
                <div>
                    <a class='page-num arrow' href='./$pagename?page=".$prev."'>
                        <i class='fas fa-angle-left'></i>
                    </a>
                </div>";
            $userFooter .= "
                <div>
                    <a class='page-num arrow' href='./$pagename?page=".$next."'>
                        <i class='fas fa-angle-right'></i>
                    </a>
                </div>
            </div>";
            $usersStr .= $userFooter;
            $usersStr .= "</div>";
            return $usersStr;
        }
        private function get_user($id, $user_status, $account_status, $account_type) {
            $user_array = array();

            $exclude_status = 'deleted';

            $stmt = $this->con->prepare("SELECT * FROM users WHERE account_type=? AND user_status=? AND user_account_status!=? AND id=? ORDER BY id DESC");
            $stmt->bind_param('sssi', $account_type, $user_status, $exclude_status, $id);
            $stmt->execute();

            $meta = $stmt->result_metadata();
            $result = array();
            while ($field = $meta->fetch_field()) {
                $parameters[] = &$row[$field->name];
            }
            call_user_func_array(array($stmt, 'bind_result'), $parameters);
            while ($stmt->fetch()) {
                foreach($row as $key => $val) {
                    $x[$key] = $val;
                }
                $result[] = $x;
            }
            if(count($result) > 0) {
                foreach($result as $row):

                    // Get interval between now and account creation
                    $created_at = new DateTime($row['created_at'], new DateTimeZone('Asia/Karachi') );

                    $date = new DateTime("now", new DateTimeZone('Asia/Karachi') );

                    $interval = $date->diff($created_at);
                    $elapsed_str = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
                    $elapsed_array = explode(' ', $elapsed_str);
                    $elapsed = '';
                    if(intval($elapsed_array[0]) > 0) {
                        if(intval($elapsed_array[0]) == 1) {
                            $elapsed = strval($elapsed_array[0]) . ' yr ago';
                        } else {
                            $elapsed = strval($elapsed_array[0]) . ' yrs ago';
                        }
                    } elseif(intval($elapsed_array[2]) > 0) {
                        if(intval($elapsed_array[2]) == 1) {
                            $elapsed = strval($elapsed_array[2]) . ' month ago';
                        } else {
                            $elapsed = strval($elapsed_array[2]) . ' months ago';
                        }
                    } elseif(intval($elapsed_array[4]) > 0) {
                        if(intval($elapsed_array[4]) == 1) {
                            $elapsed = strval($elapsed_array[4]) . ' day ago';
                        } else {
                            $elapsed = strval($elapsed_array[4]) . ' days ago';
                        }
                    } elseif(intval($elapsed_array[6]) > 0) {
                        if(intval($elapsed_array[6]) == 1) {
                            $elapsed = strval($elapsed_array[6]) . ' hr ago';
                        } else {
                            $elapsed = strval($elapsed_array[6]) . ' hrs ago';
                        }
                    } elseif(intval($elapsed_array[8]) > 0) {
                        if(intval($elapsed_array[8]) == 1) {
                            $elapsed = strval($elapsed_array[8]) . ' min ago';
                        } else {
                            $elapsed = strval($elapsed_array[8]) . ' mins ago';
                        }
                    } elseif(intval($elapsed_array[10]) > 0) {
                        if(intval($elapsed_array[10]) == 1) {
                            $elapsed = strval($elapsed_array[10]) . ' second ago';
                        } else {
                            $elapsed = strval($elapsed_array[10]) . ' seconds ago';
                        }
                    }


                    $user_array = array(
                        'id' => $row['id'],
                        'email' => $row['email'],
                        'phone' => $row['phone'],
                        'user_details' => $row['user_details'],
                        'pwd' => $row['pwd'],
                        'user_address' => $row['user_address'],
                        'photo' => $row['photo'],
                        'user_status' => $row['user_status'],
                        'user_account_status' => $row['user_account_status'],
                        'account_type' => $row['account_type'],
                        'payment_details' => $row['payment_details'],
                        'created_at' => $row['created_at'],
                        'updated_at' => $row['updated_at'],
                        'elapsed' => $elapsed
                    );
                endforeach;
                $stmt->close();
            }
            return $user_array;
        }
        private function get_user_by_id($id) {
            $user_array = array();

            $stmt = $this->con->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
            $stmt->bind_param('i', $id);
            $stmt->execute();

            $result = $stmt->get_result();
            $userCount = $result->num_rows;
            $data = $result->fetch_all(MYSQLI_ASSOC);
            if($userCount > 0) {
                foreach($data as $row):

                    // Get interval between now and account creation
                    $created_at =$row['created_at'];

                    $elapsed = elapsed($row['created_at']);


                    $user_array = array(
                        'id' => $row['id'],
                        'email' => $row['email'],
                        'phone' => $row['phone'],
                        'user_details' => $row['user_details'],
                        'pwd' => $row['pwd'],
                        'user_address' => $row['user_address'],
                        'photo' => $row['photo'],
                        'user_status' => $row['user_status'],
                        'user_account_status' => $row['user_account_status'],
                        'account_type' => $row['account_type'],
                        'payment_details' => $row['payment_details'],
                        'created_at' => $row['created_at'],
                        'updated_at' => $row['updated_at'],
                        'elapsed' => $elapsed
                    );
                endforeach;
                $stmt->close();
            }
            return $user_array;
        }

        public function profile_account_type($id) {
            $user_array = $this->get_user_by_id($id);
            return $user_array['account_type'];
        }
        public function show_user_profile($id) {
            $user_array = $this->get_user_by_id($id);           
            $uid = $this->get_uid();

            $pfpImg = $this->get_profile_img($user_array['photo']);
            $user_details = json_decode($user_array['user_details'], true);
            if($user_array['account_type'] == 'personal') {
                $fname = $user_details['fname'];
                $lanme = $user_details['lname'];
                $age = $user_details['age'];

                $name_str = "<div class='profile-info'>
                    <span>Name: </span>
                    <span>$fname $lanme</span>
                </div>";
                $age_str = "<div class='profile-info'>
                    <span>Age: </span>
                    <span>$age</span>
                </div>";
            }
            if($user_array['account_type'] == 'business') {
                // $name = $user_details->name;
                $name = $user_details['name'];
                $name_str = "<div class='profile-info'>
                    <span>Name: </span>
                    <span>$name</span>
                </div>";
                $age_str = "";
            }
            $phone = $user_array['phone'];
            if(!empty($user_array['user_address'])) {
                $address_str = "<div class='profile-info'>
                    <span>Address: </span>
                    <span>{$user_array['user_address']}</span>
                </div>";
            } else {
                $address_str = "";
            }

            if($uid == $id) {
                $editStr = "
                <form action='./edit' method='post' class='prof-edit-form'>
                    <input type='hidden' name='uid' value='$uid'>
                    <button type='submit' class='nostyle'>
                        Edit
                    </button>
                </form>";
            } else {
                $editStr = "";
            }
            return "
            <div class='user-profile'>
                <div class='user-profile-header'>
                    $editStr
                </div>
                <div class='user-profile-body'>
                    <div class='user-profile-img'>
                        <img src='./img/$pfpImg'>
                    </div>
                    <div class='user-profile-details'>
                        $name_str
                        $age_str
                        $address_str
                    </div>  
                </div> 
            </div>";

        }
        public function profile_section_1($id, $user_status, $account_status, $account_type) {
            $user_array = $this->get_user($id, $user_status, $account_status, $account_type);
            // Photo
            if(empty($user_array['photo'])) {
                $pfpImg = 'avi.png';
            } else {
                $p = json_decode($user_array['photo'], true);
                if(is_array($p)) {
                    $pfpImg = $p['sm'];
                } else {
                    $pfpImg = 'avi.png';
                }
            }
            $user_details = json_decode($user_array['user_details'], true);
            
            $phone = $user_array['phone'];
            $address = $user_array['user_address'];
            if($user_array['account_type'] == 'personal') {
                // $fname = $user_details->fname;
                // $lanme = $user_details->lname;
                $age = $user_details['age'];

                // $name_input = "<div class='col' id='col-1'>
                //     <span>Name: </span>
                //     <span>$fname $lanme</span>
                // </div>";
                $age_input = "<div class='input-group'>
                    <div class='input-row'>
                        <div class='input-col input-col-1'>
                            <label for='age'>Age</label>
                        </div>
                        <div class='input-col input-col-2'>
                            <input type='number' step='1' min='18' max='80' class='age' name='age' id='age' value='$age'>
                            <div class='error' id='ageError'></div>
                        </div>
                    </div>           
                </div>";
            }
            if($user_array['account_type'] == 'business') {
                // $name_input = $user_details->name;
                // $name_str = "<div class='col' id='col-1'>
                //     <span>Name: </span>
                //     <span>$name</span>
                // </div>";
                $age_input = "";
            }
            $address_input = "<div class='input-group'>
                <div class='input-row'>
                    <div class='input-col input-col-1'>
                        <label for='address'>Address</label>
                    </div>
                    <div class='input-col input-col-2'>
                        <input type='text' class='address' name='address' id='address' value='$address'>
                        <div class='error' id='addressError'></div>               
                    </div>
                </div>           
            </div>";
            $phone_input = "<div class='input-group'>
                <div class='input-row'>
                    <div class='input-col input-col-1'>
                        <label for='phone'>Phone</label>
                    </div>
                    <div class='input-col input-col-2'>
                        <input type='number' class='phone' name='phone' id='phone' value='$phone'>
                        <div class='error' id='phoneError'></div>
                    </div>
                </div>           
            </div>";

            if(!empty($user_array['photo'])) {
                $oldImg = json_decode($user_array['photo'], true);
                $oldImg = $oldImg['lg'];
            } else {
                $oldImg = '';
            }

            return "<div class='profile-section' id='profile-section-1'>
                <form id='user_update_form' runat='server' id='profile-img-update-form' method='post' enctype='multipart-formdata'>
                    <input type='hidden' id='old_img' name='old_img' value='{$oldImg}'>
                    <input type='hidden' name='update_user_profile' value='true'>
                    <input type='hidden' id='user_id' name='user_id' value='$id'>
                    <div class='p-header'>
                        <div class='pfp-placeholder'>
                            <img id='no-photo-avi' src='./img/$pfpImg' alt=''>
                            <img id='pfp-img-preview' src='#' alt='your image' />
                        </div>                 
                        <div id='pfp-update-btns'>
                            <button id='pfpBtn' onclick='return fireButton(event);'><i class='fas fa-long-arrow-alt-up'></i>Upload</button>       
                            <input class='input' id='image' type='file' name='image' value='' style='display: none;'>
                            <button id='pfpRemoveBtn' onclick='return removeImg(event);'>Remove</button>
                        </div>               
                    </div>
                    <div class='p-body'>
                        <div class='p-card'>
                            $phone_input
                            $address_input                   
                            $age_input 
                        </div>     
                        <div id='updateProfileBtn' onclick='updateUserProfile();'>
                            Update
                        </div>
                    </div>
                </form>
            </div>
            ";
        }
        public function profile_section_2($id, $user_status, $account_status, $account_type) {
            $user_array = $this->get_user($id, $user_status, $account_status, $account_type);
            return "<div class='profile-section' id='profile-section-2'>
                <div class='change-password'>
                    <form id='change_pwd' method='post'>
                        <input type='hidden' id='pwd_user_id' name='pwd_user_id' value='$id'>
                        <div class='update-user-form-heading'>
                            Change Password
                        </div>
                        <div id='pwd-row'>
                            <div class='pwd-inner'>
                                <div id='pwd_inputs'>
                                    <input onchange='validatePwd(event)' type='password' name='old_pwd' id='old_pwd' value='' placeholder='Old Password'>
                                    <input onchange='validatePwd(event)' type='password' name='new_pwd' id='new_pwd' value='' placeholder='New Password''>
                                    <input onchange='validatePwd(event)' type='password' name='repeat_pwd' id='repeat_pwd' value='' placeholder='Confirm Password'>
                                </div>
                                <div id='pwd-error'>

                                </div>
                                <div style='margin-top: 0;' id='pwdBtn' onclick='changePwd(event);'>Update</div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class='delete-account'>
                    <form id='delete_form' method='post' action='./controllers/user-handler'>
                        <input type='hidden' name='delete_user_id' value='$id'>
                        <div class='update-user-form-heading'>
                            Delete Account
                        </div>
                        <div class='update-user-form-subheading'>
                            This will permanently delete your account and all its settings, you will also lose your membership and will have to register again
                        </div>
                        <div id='deleteBtn' onclick='popup(\"delPopup\");'>Delete Account</div>
                    </form>
                </div>
            </div>";
        }
        public function change_password($pwd, $id) {
            $stmt = $this->con->prepare("UPDATE users SET pwd=? WHERE id=?");
            $stmt->bind_param('si', $pwd, $id);
            $stmt->execute();
            $stmt->close();
        }
        public function update_user($id, $user_status, $account_status, $account_type) {
            $user_id = intval($id);
            $oldImg = $_POST['old_img'];
            $user_address = $_POST['address'];

            $user_array = $this->get_user($id, $user_status, $account_status, $account_type);
            $old_user_details = json_decode($user_array['user_details'], true);
            $phone = $_POST['phone'];

            if($account_type == 'personal') {
                $details = array(
                    'fname' => $old_user_details['fname'],
                    'lname' => $old_user_details['lname'],
                    'age' => $_POST['age']
                );
            } else {
                $details = array(
                    'name' => $old_user_details['name']
                );
            }
            $user_details = json_encode($details, true);

            $img = $_FILES['image']['name'];

            $old_photo_array = json_encode($user_array['photo'], true);

            if(is_array($old_photo_array)) {
                $old_photo_lg = $old_photo_array['lg'];
                $old_photo_sm = $old_photo_array['sm'];
            }

            // CHECK IF INPUT IS EMPTY
            if(!empty($img)) {
                if($img !== $oldImg) {
                    $allowed = array('png', 'jpg', 'jpeg', 'webp');
                    $ext = pathinfo($img, PATHINFO_EXTENSION);
    
                    // CHECK IF FILE TYPE IS ALLOWED
                    if (!in_array($ext, $allowed)) {
                        echo '<span class=errorMsg>Incorrect File Type</span>';
                        exit();
                    } else {
                        $imagePath = '../img/';
                        $uniquesavename = intval(time().uniqid(rand(10, 20)));
                        $uniquesavename2 = time().uniqid(rand(10, 20)).'2';
        
                        // var_dump($uniquesavename, $uniquesavename2);
                        $destFile = $imagePath . $uniquesavename . '.'.$ext;
                        $destFile2 = $imagePath . $uniquesavename2. '.'.$ext;
        
                        $tempname = $_FILES['image']['tmp_name'];
        
                        // $size = getimagesize($tempname);
                        // $width = $size[0];
                        // $height = $size[1];
        
                        $img_sm = resize_image($tempname, 400, 400);
        
                        imagejpeg($img_sm, $destFile, $uniquesavename);
                        move_uploaded_file($tempname,  $destFile2);
        
                        $file_array = array(
                            'sm' => $uniquesavename . '.'.$ext,
                            'lg' => $uniquesavename2 . '.'.$ext
                        );
                        $photo = json_encode($file_array, true);

                        if(is_array($old_photo_array)) {
                            if(!empty($old_photo_sm)) {
                                unlink("../img/$old_photo_sm");
                            }
                            if(!empty($old_photo_lg)) {
                                unlink("../img/$old_photo_lg");
                            }
                        }
                    }
                } else {
                    $photo = $user_array['photo'];
                }
            } else {
                if(!empty($oldImg)) {
                    $photo = $user_array['photo'];
                } else {
                    $photo = '';
                }
            }
            
            $now = new DateTime("now", new DateTimeZone('Asia/Singapore') );
            $updated_at = $now->format('Y-m-d H:i:s');
            // var_dump($phone, $user_details, $user_address, $photo, $updated_at, $user_id);

            $stmt = $this->con->prepare("UPDATE users SET phone=?, user_details=?, user_address=?, photo=?, updated_at=? WHERE id=?");
            $stmt->bind_param('sssssi', $phone, $user_details, $user_address, $photo, $updated_at, $user_id);
            $stmt->execute();
            $stmt->close();
        }
        public function delete_account($id) {
            $account_status = 'deleted';
            $stmt = $this->con->prepare("UPDATE users SET user_account_status=? WHERE id=?");
            $stmt->bind_param('si', $account_status, $id);
            $stmt->execute();
            $stmt->close();
            $this->con->close();
            $this->logout();
            header('location: ../');
        }
        public function show_user_profile_nav() {
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                if(isset($userdata['logged']) && isset($userdata['uid']) && isset($userdata['email']) && isset($userdata['user_status']) && isset($userdata['account_status'])) {
                    $user_img = $userdata['user_img'];
                    if(empty($user_img)) {
                        $user_img = 'avi.png?v=2';
                    }
                    if($userdata['logged'] == 1) { 
                        // $package_status = $this->get_packages_status();
                        // if($package_status == 'enabled') {
                            if($userdata['account_status'] != 'verified') {
                                $status_str = "<div style='color: #fff;'></div>";
                            }
                            if($userdata['account_status'] == 'verified') {
                                $status_str = "<div class='verified-sign'><i class='fas fa-check'></i></div>";
                            }    
                        // } else {
                        //     $status_str = "";
                        // }
                        $profileBtn = "
                        <div class='profile-btn user-area-pfp-btn'>
                            <div id='profile-trigger'>
                                $status_str
                                <div><a href='./user-profile?id={$userdata['uid']}'>My Profile</a></div>
                                <div id='profile-pic-wrapper'>
                                    <img src='./img/$user_img'> 
                                </div>
                                <div>
                                    <i onclick='profileTrigger();' class='fas fa-angle-down'></i>
                                </div>
                            </div>
                            <div id='profile-dropdown'>
                                <a style='color: #000;' href='./controllers/logout-handler'>Logout</a>
                            </div>
                        </div>";
                        return $profileBtn;
                    } else {
                        $profileBtn = "<div class='signup-btn'>
                            <a id='nav-login' href='./login'>Login</a> / 
                            <a id='nav-register' href='./registration'>Register</a>
                        </div>";
                        return $profileBtn;
                    }
                } else {
                    $profileBtn = "<div class='signup-btn'>
                        <a id='nav-login' href='./login'>Login</a> / 
                        <a id='nav-register' href='./registration'>Register</a>
                    </div>";
                    return $profileBtn;
                }
            } else {
                $profileBtn = "<div class='signup-btn'>
                    <a id='nav-login' href='./login'>Login</a> / 
                    <a id='nav-register' href='./registration'>Register</a>
                </div>";
                return $profileBtn;
            }
        }
        public function show_user_profile_mob() {
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                if(isset($userdata['logged']) && isset($userdata['uid']) && isset($userdata['email']) && isset($userdata['user_status']) && isset($userdata['account_status'])) {
                    $user_img = $userdata['user_img'];
                    if(empty($user_img)) {
                        $user_img = 'avi.png?v=2';
                    }
                    if($userdata['logged'] == 1) {     
                        $profileBtn = "<div class='profile-btn user-area-pfp-mob'>
                            <div id='profile-trigger'>                   
                                <div id='profile-pic-wrapper'>
                                    <img src='./img/$user_img'> 
                                </div>
                                <div><a style='color: #000;' href='./user-profile?id={$userdata['uid']}'>My Profile</a></div>
                            </div>
                            <div id='logout-btn'>
                                <a href='./controllers/logout-handler'>Logout</a>
                            </div>
                        </div>";
                        return $profileBtn;
                    } else {
                        $profileBtn = "
                        <div id='mob-register'>
                            <div class='signup-btn'>
                                <a id='nav-register' href='./registration'>Register</a>
                            </div>
                            <div class='signup-btn'>
                                <a id='login-mobile' href='./login'>Login</a>
                            </div>
                        </div>";
                        return $profileBtn;
                    }
                } 
            } else {
                $profileBtn = "
                <div id='mob-register'>
                    <div class='signup-btn'>
                        <a id='nav-register' href='./registration'>Register Yourself</a>
                    </div>
                    <div class='signup-btn'>
                        <a id='login-mobile' href='./login'>Login</a>
                    </div>
                </div>";
                return $profileBtn;
            }
        }

        public function show_user_profile_nav_mob() {
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                if(isset($userdata['logged']) && isset($userdata['uid']) && isset($userdata['email']) && isset($userdata['user_status']) && isset($userdata['account_status'])) {
                    $user_img = $userdata['user_img'];
                    if(empty($user_img)) {
                        $user_img = 'avi.png?v=2';
                    }
                    if($userdata['logged'] == 1) { 
                        // $package_status = $this->get_packages_status();
                        // if($package_status == 'enabled') {
                            if($userdata['account_status'] != 'verified') {
                                $status_str = "<div style='color: #fff;'></div>";
                            }
                            if($userdata['account_status'] == 'verified') {
                                $status_str = "<div class='verified-sign'><i class='fas fa-check'></i></div>";
                            }    
                        // } else {
                        //     $status_str = "";
                        // }
                        $profileBtn = "
                        <div class='profile-btn user-area-pfp-btn'>
                            <div id='profile-trigger'>
                                <a href='./user-profile?id={$userdata['uid']}'>
                                    <div id='profile-pic-wrapper'>
                                        <img src='./img/$user_img'> 
                                    </div>
                                </a>
                            </div>
                            <div id='profile-dropdown'>
                                <a style='color: #000;' href='./controllers/logout-handler'>Logout</a>
                            </div>
                        </div>";
                        return $profileBtn;
                    } else {
                        $profileBtn = "<div class='signup-btn'>
                            <a id='nav-login' href='./login'>Login</a> / 
                            <a id='nav-register' href='./registration'>Register</a>
                        </div>";
                        return $profileBtn;
                    }
                } else {
                    $profileBtn = "<div class='signup-btn'>
                        <a id='nav-login' href='./login'>Login</a> / 
                        <a id='nav-register' href='./registration'>Register</a>
                    </div>";
                    return $profileBtn;
                }
            } else {
                $profileBtn = "<div class='signup-btn'>
                    <a id='nav-login' href='./login'>Login</a> / 
                    <a id='nav-register' href='./registration'>Register</a>
                </div>";
                return $profileBtn;
            }
        }
        public function check_pwd($pass, $id) {
            $stmt = $this->con->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
            $stmt->bind_param('i', $id);
            $stmt->execute();

            $result = $stmt->get_result();
            $userCount = $result->num_rows;
            $data = $result->fetch_all(MYSQLI_ASSOC);
            if($userCount > 0) {
                foreach($data as $row):
                    $pwd = $row['pwd'];
                endforeach;
                $stmt->close();
                if($pass !== $pwd) {
                    echo "<div class='error'>Invalid Password</div>";
                } else {
                    echo "";
                }
                return;
            } else {
                echo "<div class='error'>Invalid Password</div>";
                return;
            }
        }
        public function update_account_status($status, $id) {
            $stmt = $this->con->prepare("UPDATE users SET user_account_status=? WHERE id=?");
            $stmt->bind_param('si', $status, $id);
            $stmt->execute();
            $stmt->close();
        }
        // public function show_all_users() {

        // }
    }

    
?>