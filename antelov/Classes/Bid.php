<?php
    /*
        create()
        get_requests()
        show_requests()
    */
    class Bid extends Request {
        public function __construct() {
            $this->con = $this->con();
        }
        public function apply() {    
            
            var_dump($_POST);
            $request_id = intval($_POST['request_id']);
            $amount = $_POST['amount'];
            $additional_info = $_POST['additional_info'];
            $bid_status = 'pending';

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
                array_push($additional_services_arr, "Long Distance Push");
            }
            if(isset($_POST["assembly"])) {
                array_push($additional_services_arr, "Assembly");
            }
            if(isset($_POST["storage"])) {
                array_push($additional_services_arr, "Storage");
            }
            $additional_services = json_encode($additional_services_arr, true);

            // Business Id
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                $business_id = intval($userdata['uid']);

                $stmt = $this->con->prepare("SELECT * FROM users WHERE id=?");
                $stmt->bind_param('i', $business_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $data = $result->fetch_all(MYSQLI_ASSOC);
                foreach($data as $row):
                    $user_details = json_decode($row['user_details'], true); 
                    // var_dump($user_details);
                    $business_name = $user_details['name'];
                endforeach;
                $stmt->close();  
            }

            // Personal Id
            $request_status = 'started';
            $stmt = $this->con->prepare("SELECT * FROM requests WHERE id=? AND request_status=? ORDER BY id DESC");
            $stmt->bind_param('is', $request_id, $request_status);
            $stmt->execute();     
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            foreach($data as $row):
                $item_name = $row['item_name'];
                $personal_id = $row['account_id'];
                $bid_count = $row['bid_count'];
            endforeach;
            $stmt->close();  

            $now = new DateTime("now", new DateTimeZone('Asia/Singapore') );
            $created_at = $now->format('Y-m-d H:i:s');
            $updated_at = $created_at;
            $completed_at = '';

            var_dump($personal_id, $business_id, $business_name, $request_id, $additional_services, $additional_info, $item_name, $amount, $bid_status, $created_at, $updated_at, $completed_at);
            // var_dump($personal_id, $business_id, $request_id, $amount, $created_at, $updated_at);
            $stmt = $this->con->prepare("INSERT INTO bids (personal_id, business_id, business_name, request_id, additional_services, additional_info, item_name, amount, bid_status, created_at, updated_at, completed_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iisissssssss", $personal_id, $business_id, $business_name, $request_id, $additional_services, $additional_info, $item_name, $amount, $bid_status, $created_at, $updated_at, $completed_at);
            $stmt->execute();
            $stmt->close();

            $bid_count = $bid_count + 1;

            $stmt = $this->con->prepare("UPDATE requests SET bid_count=?, updated_at=? WHERE id=?");
            $stmt->bind_param('isi', $bid_count, $updated_at, $request_id);
            $stmt->execute();
            $stmt->close();

            header('location: ../request?id='.$request_id);
        }
        public function get_bids_by_ids($business_id, $personal_id, $bid_status=null) {
            $bids_array = array();

            if($bid_status != null) {
                $stmt = $this->con->prepare("SELECT * FROM bids WHERE business_id=? AND personal_id=? AND bid_status=? ORDER BY id DESC");
                $stmt->bind_param('iis', $business_id, $personal_id, $bid_status);
                $stmt->execute();
            } else {
                $stmt = $this->con->prepare("SELECT * FROM bids WHERE business_id=? AND personal_id=? ORDER BY id DESC");
                $stmt->bind_param('ii', $business_id, $personal_id);
                $stmt->execute();
            }
            

            $result = $stmt->get_result();
            $bidCount = $result->num_rows;
            $data = $result->fetch_all(MYSQLI_ASSOC);
            if($bidCount > 0) {
                foreach($data as $row):

                    $elapsed = elapsed($row['created_at']);

                    $bid_array = array(
                        'id' => $row['id'],
                        'personal_id' => $row['personal_id'], 
                        'business_id' => $row['business_id'], 
                        'request_id' => $row['request_id'], 
                        'additional_services' => $row['additional_services'], 
                        'additional_info' => $row['additional_info'], 
                        'item_name' => $row['item_name'],
                        'amount' => $row['amount'], 
                        'bid_status' => $row['bid_status'], 
                        'created_at' => $row['created_at'], 
                        'updated_at' => $row['updated_at'],
                        'completed_at' => $row['completed_at'],
                        'elapsed' => $elapsed
                    );
                    array_push($bids_array, $bid_array);
                endforeach;
                $stmt->close();
            }
            return $bids_array;
        }
        private function get_bids_by_business_id($business_id) {
            $bids_array = array();

            $pending = 'pending';
            $accepted = 'accepted';
            
            $stmt = $this->con->prepare("SELECT * FROM bids WHERE business_id=? AND (bid_status=? OR bid_status=?) ORDER BY id DESC");
            $stmt->bind_param('iss', $business_id, $pending, $accepted);
            $stmt->execute();


            $result = $stmt->get_result();
            $bidCount = $result->num_rows;
            $data = $result->fetch_all(MYSQLI_ASSOC);
            if($bidCount > 0) {
                foreach($data as $row):

                    $elapsed = elapsed($row['created_at']);

                    $bid_array = array(
                        'id' => $row['id'],
                        'personal_id' => $row['personal_id'], 
                        'business_id' => $row['business_id'], 
                        'request_id' => $row['request_id'], 
                        'additional_services' => $row['additional_services'], 
                        'additional_info' => $row['additional_info'], 
                        'item_name' => $row['item_name'],
                        'amount' => $row['amount'], 
                        'bid_status' => $row['bid_status'], 
                        'created_at' => $row['created_at'], 
                        'updated_at' => $row['updated_at'],
                        'completed_at' => $row['completed_at'],
                        'elapsed' => $elapsed
                    );
                    array_push($bids_array, $bid_array);
                endforeach;
                $stmt->close();
            }
            return $bids_array;
        }
        public function show_bids_by_business_id($business_id) {
            $bids_array = $this->get_bids_by_business_id($business_id);
            
            $num_of_rows = count($bids_array);
            $d = '$';
            $bidsStr = "";

            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                $uid = $userdata['uid'];

                if ($business_id == $uid) {

                
                    if($num_of_rows > 0) {
                        
                        $bidsTop = "<div class='requests-top bids-top'>
                            <div class='num-of-rows'>
                                $num_of_rows Bids Made
                            </div>
                        </div>";


                        for($x=0; $x<$num_of_rows; $x++) {
                            $bid_array = $bids_array[$x];

                            // Additional Services
                            $new_str = str_to_str($bid_array['additional_services']);
                            // var_dump($new_str);
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
                            
                            // Item name
                            $item_name_str = "<div class='box-title'>
                                <a href='./request?id={$bid_array['request_id']}'>
                                    <span>{$bid_array['item_name']}</span>
                                </a>
                            </div>";

                            $additional_info_str = "";
                            if(!empty($bid_array['additional_info'])) {
                                $additional_info = nl2br($bid_array['additional_info']);
                                $additional_info_str .= "
                                    $additional_info
                                "; 
                            }
            
            
                            $bidsStr .= "
                            <div class='box'>
                                <div class='box-body'>    
                                    <div class='col col-1'>
                                        $item_name_str
                                        $services_str
                                    </div>
                                    <div class='box-info-col col' id='col-2'>
                                        <div class='box-info'>
                                            <span>Amount: </span>
                                            <span>{$d}{$bid_array['amount']}</span>
                                        </div> 
                                        
                                    </div> 
                                    <div class='box-info-col col' id='col-3'>
                                        <div class='bid-status'>
                                            <span>{$bid_array['bid_status']}</span>
                                        </div> 
                                        
                                    </div> 
                                </div>   
                                <div class='add-info'> 
                                    $additional_info_str          
                                </div>    
                            </div>"; 
                        }
                        return "<div id='bids_by_business_id'>
                            $bidsTop
                            <div class='bids'>
                                $bidsStr
                            </div>
                        </div>";
                    }
                }
            }
            
            return $bidsStr;
        }
        private function get_bids_by_request_id($request_id) {
            $bids_array = array();
            
            $stmt = $this->con->prepare("SELECT * FROM bids WHERE request_id=? ORDER BY id DESC");
            $stmt->bind_param('i', $request_id);
            $stmt->execute();

            $result = $stmt->get_result();
            $bidCount = $result->num_rows;
            $data = $result->fetch_all(MYSQLI_ASSOC);
            if($bidCount > 0) {
                foreach($data as $row):

                    $elapsed = elapsed($row['created_at']);

                    $bid_array = array(
                        'id' => $row['id'],
                        'personal_id' => $row['personal_id'], 
                        'business_id' => $row['business_id'],  
                        'business_name' => $row['business_name'],
                        'request_id' => $row['request_id'], 
                        'additional_services' => $row['additional_services'], 
                        'additional_info' => $row['additional_info'], 
                        'item_name' => $row['item_name'],
                        'amount' => $row['amount'], 
                        'bid_status' => $row['bid_status'], 
                        'created_at' => $row['created_at'], 
                        'updated_at' => $row['updated_at'],
                        'completed_at' => $row['completed_at'],
                        'elapsed' => $elapsed
                    );
                    if($row['bid_status'] == 'accepted') {
                        $bids_array = empty_array($bids_array);
                        array_push($bids_array, $bid_array);
                        break;
                    } else {
                        array_push($bids_array, $bid_array);
                    }
                endforeach;
                $stmt->close();
            }
            return $bids_array;
        }
        public function show_bids_by_request_id($request_id) {
            $status = 0;

            $bids_array = $this->get_bids_by_request_id($request_id);
            
            $num_of_rows = count($bids_array);

            $bidsStr = "";
            $d = '$';
            if($num_of_rows > 0) {
                for($x=0; $x<$num_of_rows; $x++) {
                    $bid_array = $bids_array[$x];

                    $personal_id = $bid_array['personal_id'];
                    $business_id = $bid_array['business_id'];

                    // var_dump($personal_id, $business_id);


                    
                    // Item name
                    $item_name_str = "<div class='box-title'>
                        <a href='./user-profile?id={$bid_array['business_id']}'>
                            <span>{$bid_array['business_name']}</span>
                        </a>
                    </div>";


                    // Additional Services
                    $new_str = str_to_str($bid_array['additional_services']);
                    // var_dump($new_str);
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
                    $additional_info_str = "";
                    if(!empty($bid_array['additional_info'])) {
                        $additional_info = nl2br($bid_array['additional_info']);
                        $additional_info_str .= "
                            $additional_info
                        "; 
                    }
                   
                    /* 
                        If a bid is accepted or completed no other bids will be shown
                    */
                    if(isset($_SESSION['user'])) {
                        $userdata = json_decode($_SESSION['user'], true);
                        if($userdata['uid'] == $personal_id) {
                            if (
                                $bid_array['bid_status'] == 'accepted' || 
                                $bid_array['bid_status'] == 'completed'
                            ) {
                                $status = 1;
                                $accept_str = "<div class='box-info-col col' id='col-3'>
                                    <div class='bid-status'>
                                        <span>{$bid_array['bid_status']}</span>
                                    </div>                
                                </div>";

                            } else if($bid_array['bid_status'] == 'pending') {
                                $accept_str = "
                                <div class='btn-link register-link' onclick='accept(this.id);' id='bid-{$bid_array['id']}' href='./registration'>
                                    Accept
                                </div>";
                            }

                            if($status == 1) {
                                $bidsStr .= "";
                            }
                            $bidsStr .= "
                            <div class='box'>
                                <div class='box-body'>    
                                    <div class='col col-1'>
                                        $item_name_str
                                        $services_str
                                    </div>
                                    <div class='box-info-col col' id='col-2'>
                                        <div class='box-info'>
                                            <span>Amount: </span>
                                            <span>{$d}{$bid_array['amount']}</span>
                                        </div> 
                                    </div> 
                                    $accept_str
                                </div>     
                                <div class='add-info'>              
                                    $additional_info_str      
                                </div>      
                            </div>"; 
                            if($status == 1) {
                                break;
                            }
                        } else if($userdata['uid'] == $business_id) {
                            $bidsStr .= "
                            <div class='box'>
                                <div class='box-body'>    
                                    <div class='col col-1'>
                                        $item_name_str
                                        $services_str
                                    </div>
                                    <div class='box-info-col col' id='col-2'>
                                        <div class='box-info'>
                                            <span>Amount: </span>
                                            <span>{$d}{$bid_array['amount']}</span>
                                        </div> 
                                    </div> 
                                    <div class='box-info-col col' id='col-3'>
                                        <div class='bid-status'>
                                            <span>{$bid_array['bid_status']}</span>
                                        </div>                
                                    </div>
                                </div>     
                                <div class='add-info'> 
                                    $additional_info_str          
                                </div>        
                            </div>"; 
                        }
                    } 
                }
            }
            if(strlen($bidsStr) > 0) {
                return "<div class='request-bids'>
                    $bidsStr
                </div>";
            } else {
                return;
            }
        }
        public function accept($bidId) {
            $bid_status = 'accepted';
            $stmt = $this->con->prepare("UPDATE bids SET bid_status=? WHERE id=?");
            $stmt->bind_param('si', $bid_status, $bidId);
            $stmt->execute();
            $stmt->close();

            $stmt = $this->con->prepare("SELECT * FROM bids WHERE id=? LIMIT 1");
            $stmt->bind_param('i', $bidId);
            $stmt->execute();

            $result = $stmt->get_result();
            $bidCount = $result->num_rows;
            $data = $result->fetch_all(MYSQLI_ASSOC);
            if($bidCount > 0) {
                foreach($data as $row):
                    $request_id = $row['request_id'];
                    $amount = $row['amount'];
                endforeach;
            }
            $stmt->close();

            $request_status = 'active';
            $stmt = $this->con->prepare("UPDATE requests SET request_status=?, current_bid=? WHERE id=?");
            $stmt->bind_param('ssi', $request_status, $amount, $request_id);
            $stmt->execute();
            $stmt->close();
        }
    }

?>
        