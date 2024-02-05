<?php
    /*
        create()
        get_request($id)
        get_requests()
        show_requests()
        show_request()
        show_bids_by_request_id()
        elapsed()
        complete
    */
    class Request extends Db {
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
        public function create() {
            $this->startSession();
            // Location
            $lat = $_POST['my_lat'];
            $lng = $_POST['my_lng'];
            $lat_2 = $_POST['my_lat_2'];
            $lng_2 = $_POST['my_lng_2'];

            // Basic info
            $item_name = $_POST['item_name'];
            $unit_type = $_POST['unit_type'];
            $collection_address = $_POST['collection_address'];
            $dropoff_address = $_POST['dropoff_address'];
            $vehicle_type = $_POST['vehicle'];
            $budget = $_POST['budget'];
            $booking = $_POST['booking'];
            $payment_method = $_POST['payment_method'];


            $now = new DateTime("now", new DateTimeZone('Asia/Singapore') );
            $created_at = $now->format('Y-m-d H:i:s');
            $updated_at = $created_at;
            $completed_at = '';

            // Additional info
            $additional_info = $_POST['additional_info'];

            // Other information
            // Account Id
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                $account_id = intval($userdata['uid']);
            }
            $account_type = 'personal';
            $user_location = '';
            $bid_count = 0; 
            $current_bid = 0;
            $request_status = 'started';

            // Item photo and Video
            $img = $_FILES['image']['name'];
            $video_file = $_FILES['video_file']['name'];

            $imagePath = '../img/';
            // echo $_POST['imgBase64'];
            if(!empty($video_file)) {
                $video_allowed = array('mp4');
                $video_ext = pathinfo($video_file, PATHINFO_EXTENSION);
                if(in_array(strtolower($video_ext), $video_allowed)) {
                    $uniquesavename_video = intval(time().uniqid(rand(10, 20)));
                    $destFile = $imagePath . $uniquesavename_video . '.'.$video_ext;
                    $tempname = $_FILES['video_file']['tmp_name'];
                    move_uploaded_file($tempname,  $destFile);
                }
                if(isset($_POST['imgBase64']) and !empty($_POST['imgBase64'])) {
                    $data = $_POST['imgBase64'];
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);
                    $uniquesavename_thumb = intval(time().uniqid(rand(10, 20)));
                    $fileName =  $uniquesavename_thumb;
                    file_put_contents($imagePath.$fileName, $data);
                }
                $video_array = array(
                    'video' => $uniquesavename_video.'.'.$video_ext,
                    'thumb' => $fileName
                );
                $video = json_encode($video_array, true);
            } else {
                $video = '';
            }


            if(!empty($img)) {
                $allowed = array('png', 'jpg', 'jpeg', 'webp');
                $ext = pathinfo($img, PATHINFO_EXTENSION);
                // CHECK IF FILE TYPE IS ALLOWED
                if (!in_array(strtolower($ext), $allowed)) {

                    echo '<span class=errorMsg>Incorrect File Type</span>';
                    exit();
                    
                } else {
                    $uniquesavename = intval(time().uniqid(rand(10, 20)));
                    $uniquesavename2 = time().uniqid(rand(10, 20)).'2';
    
                    // var_dump($uniquesavename, $uniquesavename2);
                    $destFile = $imagePath . $uniquesavename . '.'.$ext;
                    $destFile2 = $imagePath . $uniquesavename2. '.'.$ext;
    
                    $tempname = $_FILES['image']['tmp_name'];
    
                    // $size = getimagesize($tempname);
                    // $width = $size[0];
                    // $height = $size[1];
    
                    $img_sm = resize_image($tempname, 300, 300);
    
                    imagejpeg($img_sm, $destFile, $uniquesavename);
                    move_uploaded_file($tempname,  $destFile2);
    
                    $photo_array = array(
                        'sm' => $uniquesavename . '.'.$ext,
                        'lg' => $uniquesavename2 . '.'.$ext
                    );
                    $photos = json_encode($photo_array, true);
                    /* 
                        "{"sm":"163437185616616.jpg","lg":"163437185619616a89106133f2.jpg"}"
                    */
                }
            } else {
                $photos = '';
            }

            $item_files_array = array(
                'p' => $photos,
                'v' => $video
            );
            $item_files = json_encode($item_files_array, true);
            /*
            // Mo video
            {
                "p":"{
                    \"sm\":\"163508249311617560.png\",
                    \"lg\":\"163508249320617560fd202c62.png\"
                }",
                "v":""
            }
            */
            
            // Additional services
            $additional_services_arr = array();
                
            if(isset($_POST["fragility"])) {
                array_push($additional_services_arr, "Fragility");
            }
            if(isset($_POST["staircase"])) {
                array_push($additional_services_arr, "Staircase/lift");
            }
            if(isset($_POST["manpower"])) {
                array_push($additional_services_arr, "Manpower");
            }
            if(isset($_POST["stair_carry"])) {
                array_push($additional_services_arr, "Stair carry");
            }
            if(isset($_POST["long_distance_push"])) {
                array_push($additional_services_arr, "Long distance push");
            }
            if(isset($_POST["assembly"])) {
                array_push($additional_services_arr, "Assembly");
            }
            if(isset($_POST["storage"])) {
                array_push($additional_services_arr, "Storage");
            }
            // var_dump($lat, $lng, $lat_2, $lng_2, $item_name, $item_files, $unit_type, $collection_address, $dropoff_address, $vehicle_type, $additional_services, $booking, $budget, $preferred_payment, $bid_count, $current_bid, $additional_info, $request_status, $account_id, $account_type, $created_at, $updated_at);
            $additional_services = json_encode($additional_services_arr, true);
            $stmt = $this->con->prepare("INSERT INTO requests (lat, lng, lat_2, lng_2, item_name, item_files, unit_type, collection_address, dropoff_address, vehicle_type, additional_services, booking, budget, preferred_payment, bid_count, current_bid, additional_info, request_status, account_id, account_type, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssssssssisssisss", $lat, $lng, $lat_2, $lng_2, $item_name, $item_files, $unit_type, $collection_address, $dropoff_address, $vehicle_type, $additional_services, $booking, $budget, $preferred_payment, $bid_count, $current_bid, $additional_info, $request_status, $account_id, $account_type, $created_at, $updated_at);
            $stmt->execute();
            $stmt->close();
        }
        private function get_request($id) {
            $request_array = array();
            
            
            $stmt = $this->con->prepare("SELECT * FROM requests WHERE id=? ORDER BY id DESC");
            $stmt->bind_param('i', $id);
            $stmt->execute();
                

            $result = $stmt->get_result();
            $reqCount = $result->num_rows;
            $data = $result->fetch_all(MYSQLI_ASSOC);
            if($reqCount > 0) {
                foreach($data as $row):

                    $created_at = $row['created_at'];
                    $elapsed = elapsed($row['created_at']);

                    $stmt2 = $this->con->prepare("SELECT * FROM users WHERE id=? ORDER BY id DESC");
                    $stmt2->bind_param('i', intval($row['account_id']));
                    $stmt2->execute();
                    $result2 = $stmt2->get_result();
                    $data2 = $result2->fetch_all(MYSQLI_ASSOC);
                    foreach($data2 as $row2):
                        $user_details = json_decode($row2['user_details'], true);
                        $fname = $user_details['fname']; 
                        $lname = $user_details['lname'];
                        // var_dump($fname);
                    endforeach;
                    $stmt2->close();

                    $request_array = array(
                        'id' => $row['id'],
                        'lat' => $row['lat'],
                        'lng' => $row['lng'], 
                        'lat_2' => $row['lat_2'],
                        'lng_2' => $row['lng_2'], 
                        'item_name' => $row['item_name'], 
                        'item_files' => $row['item_files'], 
                        'unit_type' => $row['unit_type'], 
                        'collection_address' => $row['collection_address'],
                        'dropoff_address' => $row['dropoff_address'],
                        'vehicle_type' => $row['vehicle_type'], 
                        'additional_services' => $row['additional_services'], 
                        'booking' => $row['booking'], 
                        'budget' => $row['budget'], 
                        'preferred_payment' => $row['preferred_payment'], 
                        'bid_count' => $row['bid_count'], 
                        'current_bid' => $row['current_bid'], 
                        'account_id' => $row['account_id'], 
                        'fname' => $fname, 
                        'lname' => $lname, 
                        'additional_info' => $row['additional_info'], 
                        'account_type' => $row['account_type'], 
                        'request_status' => $row['request_status'], 
                        'created_at' => $row['created_at'], 
                        'updated_at' => $row['updated_at'],
                        'elapsed' => $elapsed
                    );
                endforeach;
                $stmt->close();
            }
            return $request_array;
        }

        
        public function show_request($id) {

            $request_array = $this->get_request($id);
            $requestStr = "";

            // var_dump($request_array);

            $additional_info = nl2br($request_array['additional_info']);
            
            $item_files = json_decode($request_array['item_files'], true);
            $d = '$';
            
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                $uid = $userdata['uid'];
                $account_type = $userdata['account_type'];
            }

            $b = 0;

            $stmt = $this->con->prepare("SELECT * FROM bids WHERE request_id=? ORDER BY id DESC");
            $stmt->bind_param('i', $request_id);
            $stmt->execute();

            $result = $stmt->get_result();
            $bidCount = $result->num_rows;
            $data = $result->fetch_all(MYSQLI_ASSOC);
            if($bidCount > 0) {
                foreach($data as $row):
                    if($row['business_id'] == $uid) {
                        $b = 1;
                        break;
                    }
                endforeach;
            }
            



            $request_status = $request_array['request_status'];
            if($account_type == 'business') {   
                $stmt = $this->con->prepare("SELECT * FROM bids WHERE request_id=? AND business_id=? ORDER BY id DESC");
                $stmt->bind_param('ii', $id, $uid);
                $stmt->execute();     
                $result = $stmt->get_result();
                $bidCount = $result->num_rows;

                if($bidCount == 0) {
                    $apply_str = "<div class='btns-row'>
                        <div>
                            <form action='./msg' method='POST' class='send-msg'>
                                <input type='hidden' name='account_id' value='{$request_array['account_id']}'>
                                <input type='submit' class='btn-link register-link' name='send-a-msg' value='SEND A MESSAGE'>
                            </form>
                        </div>
                        <div class='btn-link register-link' onclick='apply(this.id);' id='{$request_array['booking']}-{$request_array['id']}' href='./registration'>
                            Create Offer
                        </div>
                    </div>";
                } else {
                    $apply_str = "<div class='btns-row'>
                        <div>
                            <form action='./msg' method='POST' class='send-msg'>
                                <input type='hidden' name='account_id' value='{$request_array['account_id']}'>
                                <input type='submit' class='btn-link register-link' name='send-a-msg' value='SEND A MESSAGE'>
                            </form>
                        </div>
                    </div>";
                }
            } else {
                if($request_status == 'active') {
                    $apply_str = "<div class='btn-link register-link complete' onclick='completed(this.id);' id='{$request_array['booking']}-{$request_array['id']}'>
                        Mark as Complete
                    </div>";
                } else if ($request_status == 'started') {
                    $apply_str = "<div class='btn-link register-link cancel' onclick='cancelled(this.id);' id='{$request_array['booking']}-{$request_array['id']}'>
                        Cancel This Request
                    </div>";
                } else {
                    $apply_str = "";
                }
            }
            // Photo String
            $photoStr = "";
            $videoStr = "";
            if(!empty($request_array['item_files'])) {
                $item_files = json_decode($request_array['item_files'], true);
                if(!empty($item_files['p'])) {
                    $photos = json_decode($item_files['p'], true);
                    $photoStr = "<div class='box-photo box-photo-lg'>
                        <img src='./img/{$photos['lg']}'>
                    </div>";
                }
                if(!empty($item_files['v'])) {
                    $videos = json_decode($item_files['v'], true);
                    $videoStr = "<div class='box-video'>
                        <video width='350' height='200' controls>
                            <source src='./img/{$videos['video']}' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>
                    </div>";
                } 
            } 
            // Location String
            if(!empty($request_array['collection_address'])) {
                $collection_address = "<div class='additional-services'>               
                    <div>
                        Collection (Postal Code):
                    </div>
                    <div>
                        <span>{$request_array['collection_address']}</span>
                    </div>
                </div>";
            } else {
                $collection_address = "";
            }
            if(!empty($request_array['dropoff_address'])) {
                $dropoff_address = "<div class='additional-services'>               
                    
                    <div>
                        Dropoff (Postal Code):
                    </div>
                    <div>
                        <span>{$request_array['dropoff_address']}</span>
                    </div>
                </div>";
            } else {
                $dropoff_address = "";
            }
            // Additional info string
            
            if(!empty($additional_info)) {
                $additional_info_str = "<div class='description-info'>
                    $additional_info
                </div>";
            } else {
                $additional_info_str = "";
            }

            // Additional services

            if(!empty($request_array['unit_type'])) {
                $unit_type = "<div class='additional-services'>
                    <div>
                        Unit Type:
                    </div>
                    <div>
                        <span>{$request_array['unit_type']}</span>
                    </div>
                </div>";
            } else {
                $unit_type = "";
            }
            if(!empty($request_array['vehicle_type'])) {
                $vehicle = "<div class='additional-services'>
                    <div>
                        Vehicle:
                    </div>
                    <div>
                        <span>{$request_array['vehicle_type']}</span>
                    </div>
                </div>";
            } else {
                $vehicle = "";
            }
            if(!empty($request_array['preferred_payment'])) {
                $payment = "<div class='additional-services'>
                    <div>
                        <span>Payment: </span>
                    </div>
                    <div>
                        <span>{$request_array['preferred_payment']}</span>
                    </div>
                </div>";
            } else {
                $payment = "";
            }
            if(!empty($request_array['bid_count'])) {
                $bids = "<div class='additional-services'>
                    <div>
                        <span>Bids: </span>
                    </div>
                    <div>
                        <span>{$request_array['bid_count']}</span>
                    </div>
                </div>";
            } else {
                $bids = "";
            }
            if(!empty($request_array['current_bid'])) {
                $current_bid = "<div class='additional-services'>
                    <div>
                        <span>Current Bid: </span>
                    </div>
                    <div>
                        <span>{$d}{$request_array['current_bid']}</span>
                    </div>
                </div>";
            } else {
                $current_bid = "";
            }
            if(!empty($request_array['budget'])) {
                $budget = "<div class='additional-services'>
                    <div>
                        <span>Budget</span>
                        <span style='color: gray;'>
                            ({$request_array['booking']}): 
                        </span>
                    </div>
                    <div>

                        <span>                                   
                            {$d}{$request_array['budget']}                                   
                        </span>
                    </div>
                </div>";
            } else {
                $budget = "";
            }

            // Additional Services
            $new_str = str_to_str($request_array['additional_services']);
            if(strlen($new_str) > 0) {
                $services_str = "<div class='additional-services'>
                    <div>
                        Additional Services: 
                    </div>
                    <div>
                        $new_str
                    </div>
                </div>";
            } else {
                $services_str = "";
            }
            $requestStr .= "<div class='single-request'>   
                <input type='hidden' name='my_lat' id='my_lat' value={$request_array['lat']}>
                <input type='hidden' name='my_lng' id='my_lng' value={$request_array['lng']}>    
                <input type='hidden' name='my_lat_2' id='my_lat_2' value={$request_array['lat_2']}>
                <input type='hidden' name='my_lng_2' id='my_lng_2' value={$request_array['lng_2']}>    
                <div class='row-1'>
                    <h3>
                        {$request_array['fname']} {$request_array['lname']}
                    </h3>
                    <span class='elapsed'>{$request_array['elapsed']}</span>
                </div>
                <div class='row-2'>
                    <div class='item-name-wrapper'>
                        <span>Item: </span>
                        <span class='item-name'>{$request_array['item_name']}</span>   
                    </div>
                    $additional_info_str
                </div>




                $photoStr
                $videoStr
                $services_str
                $unit_type
                $vehicle
                $payment
                $bids
                $current_bid
                $budget
                $collection_address
                $dropoff_address
                <div class='request-location'>
                    <div class='request-location'>
                        Location
                    </div>
                    <div class='map-wrapper'>
                        <div id='map'>

                        </div>
                    </div>
                </div>
                $apply_str
            </div>";     
            return $requestStr;
        }
        private function get_requests($request_status, $personal_id = null, $filter = false) {
            $requests_array = array();

            
            
            if($personal_id == null) {
                if($filter == false) {
                    $stmt = $this->con->prepare("SELECT * FROM requests WHERE request_status=? ORDER BY id DESC");
                    $stmt->bind_param('s', $request_status);
                    $stmt->execute();
                } else {
                    $booking = $_GET['booking'];
                    $additional_services = $_GET['additional_services'];
                    $vehicle_type = $_GET['vehicle_type'];
                    // var_dump($booking, $additional_services, $vehicle_type);
                    // additional_services LIKE '%$additional_services%'
                    if(
                        strtolower($booking) === 'any' && 
                        strtolower($additional_services) === 'any' && 
                        strtolower($vehicle_type) === 'any'
                    ) {
                        $stmt = $this->con->prepare("SELECT * FROM requests WHERE request_status=? ORDER BY id DESC");
                        $stmt->bind_param('s', $request_status);
                    } else if(
                        strtolower($booking) === 'any' && 
                        strtolower($additional_services) === 'any' && 
                        strtolower($vehicle_type) !== 'any'
                    ) {
                        $stmt = $this->con->prepare("SELECT * FROM requests WHERE vehicle_type=? AND request_status=? ORDER BY id DESC");
                        $stmt->bind_param('ss', $vehicle_type, $request_status);
                    } else if(
                        strtolower($booking) === 'any' && 
                        strtolower($additional_services) !== 'any' && 
                        strtolower($vehicle_type) === 'any'
                    ) {
                        $stmt = $this->con->prepare("SELECT * FROM requests WHERE additional_services LIKE '%$additional_services%' AND request_status=? ORDER BY id DESC");
                        $stmt->bind_param('s', $request_status);
                    } else if(
                        strtolower($booking) !== 'any' && 
                        strtolower($additional_services) === 'any' && 
                        strtolower($vehicle_type) === 'any'
                    ) {
                        $stmt = $this->con->prepare("SELECT * FROM requests WHERE booking=? AND request_status=? ORDER BY id DESC");
                        $stmt->bind_param('ss', $booking, $request_status);
                    } else if(
                        strtolower($booking) !== 'any' && 
                        strtolower($additional_services) !== 'any' && 
                        strtolower($vehicle_type) === 'any'
                    ) {
                        $stmt = $this->con->prepare("SELECT * FROM requests WHERE booking=? AND additional_services LIKE '%$additional_services%' AND request_status=? ORDER BY id DESC");
                        $stmt->bind_param('ss', $booking, $request_status);
                    } else if(
                        strtolower($booking) !== 'any' && 
                        strtolower($additional_services) !== 'any' && 
                        strtolower($vehicle_type) !== 'any'
                    ) {
                        $stmt = $this->con->prepare("SELECT * FROM requests WHERE booking=? AND vehicle_type=? AND additional_services LIKE '%$additional_services%' AND request_status=? ORDER BY id DESC");
                        $stmt->bind_param('sss', $booking, $vehicle_type, $request_status);
                    } else if(
                        strtolower($booking) == 'any' && 
                        strtolower($additional_services) !== 'any' && 
                        strtolower($vehicle_type) !== 'any'
                    ) {
                        $stmt = $this->con->prepare("SELECT * FROM requests WHERE vehicle_type=? AND additional_services LIKE '%$additional_services%' AND request_status=? ORDER BY id DESC");
                        $stmt->bind_param('ss', $vehicle_type, $request_status);
                    } else if(
                        strtolower($booking) !== 'any' && 
                        strtolower($additional_services) !== 'any' && 
                        strtolower($vehicle_type) == 'any'
                    ) {
                        $stmt = $this->con->prepare("SELECT * FROM requests WHERE booking=? AND additional_services LIKE '%$additional_services%' AND request_status=? ORDER BY id DESC");
                        $stmt->bind_param('ss', $booking, $request_status);
                    }
                }
            } else {
                $stmt = $this->con->prepare("SELECT * FROM requests WHERE request_status=? AND account_id=? ORDER BY id DESC");
                $stmt->bind_param('si', $request_status, $personal_id);   
            }
            $stmt->execute();

            $result = $stmt->get_result();
            $reqCount = $result->num_rows;
            if($reqCount > 0) {
                $data = $result->fetch_all(MYSQLI_ASSOC);         
                foreach($data as $row):

                    // Get interval between now and account creation
                    

                    $elapsed = elapsed($row['created_at']);

                   

                    $stmt2 = $this->con->prepare("SELECT * FROM users WHERE id=? ORDER BY id DESC");
                    $stmt2->bind_param('i', intval($row['account_id']));
                    $stmt2->execute();
                    $result2 = $stmt2->get_result();
                    $data2 = $result2->fetch_all(MYSQLI_ASSOC);
                    foreach($data2 as $row2):
                        $user_details = json_decode($row2['user_details'], true);
                        $fname = $user_details['fname']; 
                        $lname = $user_details['lname'];
                        // var_dump($fname);
                    endforeach;
                    $stmt2->close();

                    $request_array = array(
                        'id' => $row['id'],
                        'item_name' => $row['item_name'], 
                        'item_files' => $row['item_files'], 
                        'unit_type' => $row['unit_type'], 
                        'collection_address' => $row['collection_address'],
                        'dropoff_address' => $row['dropoff_address'],
                        'vehicle_type' => $row['vehicle_type'], 
                        'additional_services' => $row['additional_services'], 
                        'booking' => $row['booking'], 
                        'budget' => $row['budget'], 
                        'preferred_payment' => $row['preferred_payment'], 
                        'bid_count' => $row['bid_count'], 
                        'current_bid' => $row['current_bid'], 
                        'account_id' => $row['account_id'], 
                        'fname' => $fname, 
                        'lname' => $lname, 
                        'additional_info' => $row['additional_info'], 
                        'account_type' => $row['account_type'], 
                        'request_status' => $row['request_status'], 
                        'created_at' => $row['created_at'], 
                        'updated_at' => $row['updated_at'],
                        'elapsed' => $elapsed
                    );
                    array_push($requests_array, $request_array);
                endforeach;
                $stmt->close();
            } 
            return $requests_array;
        }
        public function show_requests($request_status, $personal_id = null, $filter = false) {
            if($personal_id == null) {
                if($filter == false) {
                    $requests_array = $this->get_requests($request_status);
                } else {
                    $requests_array = $this->get_requests($request_status, $personal_id, $filter);
                }
            } else {
                $requests_array = $this->get_requests($request_status, $personal_id);
                $apply_str = "";
            }
            
            
            $num_of_rows = count($requests_array);
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

            $requestsStr = "";
            if($personal_id !== null) {
                $reqHeader = "";
            } else {
                $reqHeader = "";
            }
            if($personal_id !== null) {
                $reqTop = "<div class='requests-top'>
                    <div class='num-of-rows'>
                        $num_of_rows Requests
                    </div>
                    <div>
                        <a href='./new-request'>Create Request</a>
                    </div>
                </div>";
            } else {
                $reqTop = "<div class='requests-top'>
                    <div class='num-of-rows'>
                        $num_of_rows requests
                    </div>
                </div>";
            }

            $requestsStr .= "
                $reqTop
                $reqHeader
                ";

            $d = '$';

            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                $uid = $userdata['uid'];
                $account_type = $userdata['account_type'];
            }

            for($x=$starting_limit_number; $x<$starting_limit_number+$results_per_page; $x++) {
                if($x < $num_of_rows) {
                    $request_array = $requests_array[$x];
                    $additional_info = nl2br($request_array['additional_info']);
                    
                    $item_files = json_decode($request_array['item_files'], true);
                    
                    $id = $request_array['id'];
                    
                    if($personal_id == null) {           
                        $stmt = $this->con->prepare("SELECT * FROM bids WHERE request_id=? AND business_id=? ORDER BY id DESC");
                        $stmt->bind_param('ii', $id, $uid);
                        $stmt->execute();     
                        $result = $stmt->get_result();
                        $bidCount = $result->num_rows;
        
                        if($bidCount == 0) {
                            $apply_str = "<div class='btns-row'>
                                <div>
                                    <form action='./msg' method='POST' class='send-msg'>
                                        <input type='hidden' name='account_id' value='{$request_array['account_id']}'>
                                        <input type='submit' class='btn-link register-link' name='send-a-msg' value='SEND A MESSAGE'>
                                    </form>
                                </div>
                                <div class='btn-link register-link' onclick='apply(this.id);' id='{$request_array['booking']}-{$request_array['id']}' href='./registration'>
                                    Create Offer
                                </div>
                            </div>";
                        } else {
                            $apply_str = "<div class='btns-row'>
                                <div>
                                    <form action='./msg' method='POST' class='send-msg'>
                                        <input type='hidden' name='account_id' value='{$request_array['account_id']}'>
                                        <input type='submit' class='btn-link register-link' name='send-a-msg' value='SEND A MESSAGE'>
                                    </form>
                                </div>
                            </div>";
                        }
                    } else {
                        $apply_str = "";
                    }
                    // Item name
                    $item_name_str = "<div class='box-title'>
                        <a href='./request?id={$request_array['id']}'>
                            <span>{$request_array['item_name']}</span>
                        </a>
                    </div>";
                    // Photo String
                    if(!empty($item_files['p'])) {
                        $photos = json_decode($item_files['p'], true);
                        $photoStr = "<div class='box-photo box-photo-sm'>
                            <img src='./img/{$photos['sm']}'>
                        </div>";
                    } else {
                        $photoStr = "<div class='box-photo'>
                            <img src='./img/placeholder.png?v=2'>
                        </div>";
                    }
                    // Location String
                    if(!empty($request_array['user_location'])) {
                        $location_str = "<div class='address'>               
                            <span>{$request_array['user_location']}
                        </div>";
                    } else {
                        $location_str = "";
                    }
                    // Additional info string
                    
                    if(!empty($additional_info)) {
                        $additional_info_str = "<div class='description-info'>
                            $additional_info
                        </div>";
                    } else {
                        $additional_info_str = "";
                    }

                    // Additional services
                    $services_str = '';
                    $additional_services = json_decode($request_array['additional_services'], true);
                    // $services_array = explode(",", $services_array);
                    // Additional Services
                    $new_str = str_to_str($request_array['additional_services']);
                    if(strlen($new_str) > 0) {
                        $services_str = "<div class='additional-services'>
                            <div>
                                Additional Services: 
                            </div>
                            <div>
                                $new_str
                            </div>
                        </div>";
                    } else {
                        $services_str = "";
                    }

                    
                    $requestsStr .= "
                    <div class='box'>
                        <div class='box-head'>
                            <div class='col' id='col-1'>
                                <span>{$request_array['fname']} {$request_array['lname']}</span>
                            </div>
                            <div class='col' id='col-2'>
                                <span class='elapsed'>{$request_array['elapsed']}</span>
                            </div>
                        </div>
                        <div class='box-body'>    
                            <div class='col col-1'>
                                $item_name_str
                                $location_str
                                $additional_info_str
                                $services_str
                            </div>
                            <div class='box-info-col col' id='col-2'>
                                <div class='box-info'>
                                    <span>Bids: </span>
                                    <span>{$request_array['bid_count']}</span>
                                </div>
                                <div class='box-info'>
                                    <span>Current Bid: </span>
                                    <span>{$d}{$request_array['current_bid']}</span>
                                </div>
                                <div class='box-info'>
                                    <span>
                                        <span>
                                            Budget: 
                                        </span>                   
                                        <span style='color: gray;'>
                                            ({$request_array['booking']})
                                        </span>
                                    </span>
                                    <span>                                   
                                        {$d}{$request_array['budget']}                                   
                                    </span>
                                </div>
                            </div>
                            <div class='col col-3'>
                                $photoStr
                            </div>  
                        </div>   
                        <div class='box-footer'>  
                            $apply_str  
                        </div>           
                    </div>";         
                // endforeach;
                // <a href='buttn'>Button</a>
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
            $requestsFooter = "<div class='pagination'>
                <div>
                    <a class='page-num arrow' href='./index?page=".$prev."'>
                        <i class='fas fa-arrow-left'></i>
                    </a>
                </div>
            <div class='pagination-links'>";
            for($p=1;$p<=$num_of_pages;$p++) {
                if($page == $p) {
                    $requestsFooter .= "<a class='page-num current-page' href='./index?page=".$p."'>".$p."</a> ";
                } else {
                    if($page == $num_of_pages) {
                        if($p >= $page - 3) {
                            $requestsFooter .= "<a class='page-num' href='./index?page=".$p."'>".$p."</a> ";
                        } 
                    } else {
                        if($page < 4) {
                            if($p < 5) {
                                $requestsFooter .= "<a class='page-num' href='./index?page=".$p."'>".$p."</a> ";
                            }
                        } else {
                            if( ($p > $page - 3 && $p < $page) || ($p > $page && $p < $page + 2)) {
                                $requestsFooter .= "<a class='page-num' href='./index?page=".$p."'>".$p."</a> ";
                            }
                        }                
                    }
                }
            }
            $requestsFooter .= "</div>
                <div>
                    <a class='page-num arrow' href='./index?page=".$next."'>
                        <i class='fas fa-arrow-right'></i>
                    </a>
                </div>
            </div>";
            $requestsStr .= $requestsFooter;
            return $requestsStr;
        }
        public function completed($request_id) {
            $pending = 'pending';
            $completed = 'completed';
            $accepted = 'accepted';

            $now = new DateTime("now", new DateTimeZone('Asia/Singapore') );
            $completed_at = $now->format('Y-m-d H:i:s');

            $stmt = $this->con->prepare("UPDATE bids SET bid_status=?, completed_at=? WHERE bid_status=? AND request_id=?");
            $stmt->bind_param('sssi', $completed, $completed_at, $accepted, $request_id);
            $stmt->execute();
            $stmt->close();

            $stmt = $this->con->prepare("UPDATE requests SET request_status=?, completed_at=? WHERE id=?");
            $stmt->bind_param('ssi', $completed, $completed_at, $request_id);
            $stmt->execute();
            $stmt->close();



            $stmt = $this->con->prepare("DELETE FROM bids WHERE request_id=? AND bid_status=?");
            $stmt->bind_param('is', $request_id, $pending);
            $stmt->execute();
            $stmt->close();

            header('location: ../request?id='.$request_id);
        }
        public function cancelled($request_id) {
            $cancelled = 'cancelled';

            $now = new DateTime("now", new DateTimeZone('Asia/Singapore') );
            $completed_at = $now->format('Y-m-d H:i:s');

            $stmt = $this->con->prepare("UPDATE requests SET request_status=? WHERE id=?");
            $stmt->bind_param('si', $cancelled, $request_id);
            $stmt->execute();
            $stmt->close();

            $pending = 'pending';

            $stmt = $this->con->prepare("DELETE FROM bids WHERE request_id=? AND bid_status=?");
            $stmt->bind_param('is', $request_id, $pending);
            $stmt->execute();
            $stmt->close();

            header('location: ../');
        }

        public function show_requests_all($request_status, $personal_id = null, $filter = false) {
            if($personal_id == null) {
                if($filter == false) {
                    $requests_array = $this->get_requests($request_status);
                } else {
                    $requests_array = $this->get_requests($request_status, $personal_id, $filter);
                }
            } else {
                $requests_array = $this->get_requests($request_status, $personal_id);
                
            }
            $num_of_rows = count($requests_array);
            

            

            $requestsStr = "";
            if($personal_id !== null) {
                $reqHeader = "";
            } else {
                $reqHeader = "";
            }
            if($personal_id !== null) {
                $req = 0;
                if($request_status == 'active') {
                    if($num_of_rows == 0) {
                        $requests_started_array = $this->get_requests('started', $personal_id);
                        if(count($requests_started_array) > 0) {
                            $req = 1;
                        }
                        $request_top_text = "No Active Requests";
                    } else if($num_of_rows == 1) {
                        $request_top_text = "$num_of_rows Active Request";           
                    } else {
                        $request_top_text = "$num_of_rows Active Requests";
                    }
                } else if($request_status == 'started') {
                    if($num_of_rows == 0) {
                        $requests_started_array = $this->get_requests('active', $personal_id);
                        if(count($requests_started_array) > 0) {
                            $req = 1;
                        }
                        $request_top_text = "No Requests Started";
                    } else if($num_of_rows == 1) {
                        $request_top_text = "$num_of_rows Request Started";           
                    } else {
                        $request_top_text = "$num_of_rows Requests Started";
                    }
                } 
                if($req == 1) {
                    $reqTop = "";
                } else {
                    $reqTop = "<div class='requests-top'>
                        <div class='num-of-rows'>
                            $request_top_text
                        </div>
                        <div>
                            <a href='./new-request'>Create Request</a>
                        </div>
                    </div>";
                }
            } else {
                $reqTop = "<div class='requests-top'>
                    <div class='num-of-rows'>
                        $num_of_rows requests
                    </div>
                </div>";
            }

            $requestsStr .= "
                $reqTop
                $reqHeader
                ";

            $d = '$';
            foreach ($requests_array as $request_array):
                
                    $additional_info = nl2br($request_array['additional_info']);
                    
                    $item_files = json_decode($request_array['item_files'], true);
                    
                    
                    if($personal_id == null) {           
                        $apply_str = "<div class='btns-row'>
                            <div>
                                <form action='./msg' method='POST' class='send-msg'>
                                    <input type='hidden' name='account_id' value='{$request_array['account_id']}'>
                                    <input type='submit' class='btn-link register-link' name='send-a-msg' value='SEND A MESSAGE'>
                                </form>
                            </div>
                            <div class='btn-link register-link' onclick='apply(this.id);' id='{$request_array['booking']}-{$request_array['id']}' href='./registration'>
                                Create Offer
                            </div>
                        </div>";
                    } else {
                        if($request_status == 'active') {
                            $apply_str = "<div class='btn-link register-link complete' onclick='completed(this.id);' id='{$request_array['booking']}-{$request_array['id']}'>
                                Mark as Complete
                            </div>";
                        } else if ($request_status == 'started') {
                            $apply_str = "<div class='btn-link register-link cancel' onclick='cancelled(this.id);' id='{$request_array['booking']}-{$request_array['id']}'>
                                Cancel This Request
                            </div>";
                        } else {
                            $apply_str = "";
                        }
                    }
                    // Item name
                    $item_name_str = "<div class='box-title'>
                        <a href='./request?id={$request_array['id']}'>
                            <span>{$request_array['item_name']}</span>
                        </a>
                    </div>";
                    // Photo String
                    if(!empty($item_files['p'])) {
                        $photos = json_decode($item_files['p'], true);
                        $photoStr = "<div class='box-photo box-photo-sm'>
                            <img src='./img/{$photos['sm']}'>
                        </div>";
                    } else {
                        $photoStr = "<div class='box-photo'>
                            <img src='./img/placeholder.png?v=2'>
                        </div>";
                    }
                    // Location String
                    if(!empty($request_array['user_location'])) {
                        $location_str = "<div class='address'>               
                            <span>{$request_array['user_location']}
                        </div>";
                    } else {
                        $location_str = "";
                    }
                    // Additional info string
                    
                    if(!empty($additional_info)) {
                        $additional_info_str = "<div class='description-info'>
                            $additional_info
                        </div>";
                    } else {
                        $additional_info_str = "";
                    }

                    // Additional services
                    $services_str = '';
                    $additional_services = json_decode($request_array['additional_services'], true);
                    // $services_array = explode(",", $services_array);
                    // Additional Services
                    $new_str = str_to_str($request_array['additional_services']);
                    if(strlen($new_str) > 0) {
                        $services_str = "<div class='additional-services'>
                            <div>
                                Additional Services: 
                            </div>
                            <div>
                                $new_str
                            </div>
                        </div>";
                    } else {
                        $services_str = "";
                    }

                    
                $requestsStr .= "
                <div class='box'>
                    <div class='box-head'>
                        <div class='col' id='col-1'>
                            <span>{$request_array['fname']} {$request_array['lname']}</span>
                        </div>
                        <div class='col' id='col-2'>
                            <span class='elapsed'>{$request_array['elapsed']}</span>
                        </div>
                    </div>
                    <div class='box-body'>    
                        <div class='col col-1'>
                            $item_name_str
                            $location_str
                            $additional_info_str
                            $services_str
                        </div>
                        <div class='box-info-col col' id='col-2'>
                            <div class='box-info'>
                                <span>Bids: </span>
                                <span>{$request_array['bid_count']}</span>
                            </div>
                            <div class='box-info'>
                                <span>Current Bid: </span>
                                <span>{$d}{$request_array['current_bid']}</span>
                            </div>
                            <div class='box-info'>
                                <span>
                                    <span>
                                        Budget: 
                                    </span>                   
                                    <span style='color: gray;'>
                                        ({$request_array['booking']})
                                    </span>
                                </span>
                                <span>                                   
                                    {$d}{$request_array['budget']}                                   
                                </span>
                            </div>
                        </div>
                        <div class='col col-3'>
                            $photoStr
                        </div>  
                    </div>   
                    <div class='box-footer'>  
                        $apply_str  
                    </div>           
                </div>";     
            endforeach;
            return $requestsStr;
        }
    }
?>