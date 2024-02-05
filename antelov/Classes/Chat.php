<?php
    /*
    get_chat_by_user_id($id_1)
    
    show_all_msgs
    */
    class Chat extends Db {
        public function __construct() {
            $this->con = $this->con();
        }
        private function startSession() {
            if(!isset($_SESSION)) { 
                ob_start();
                session_start(); 
            }
        }
        private function endSession() {
            if(isset($_SESSION)) { 
                ob_start();
                session_start(); 
            }
        }
        public function create() {
            $this->startSession();


            $from_id = intval($_POST['from_id']);
            $to_id = intval($_POST['to_id']);
            $msg = $_POST['msg'];
            
            
            $stmt = $this->con->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
            $stmt->bind_param('i', $from_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            foreach($data as $row):
                $photos = json_decode($row['photo'], true);
                if(empty($photos)) {
                    $from_img = '';
                } else {
                    $from_img = $photos['sm'];
                }
                
                $details = json_decode($row['user_details'], true);
                if($row['account_type'] == 'personal') {
                    $fname = $details['fname'];
                    $lname = $details['lname'];
                    $from_name = $fname . ' ' . $lname;
                } else if($row['account_type'] == 'business') {
                    $from_name = $details['name'];
                }            
            endforeach;
            $stmt->close();

            $stmt = $this->con->prepare("SELECT * FROM users WHERE id=?");
            $stmt->bind_param('i', $to_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            foreach($data as $row):
                $photos = json_decode($row['photo'], true);
                if(empty($photos)) {
                    $to_img = '';
                } else {
                    $to_img = $photos['sm'];
                }
                $details = json_decode($row['user_details'], true);
                if($row['account_type'] == 'personal') {
                    $fname = $details['fname'];
                    $lname = $details['lname'];
                    $to_name = $fname . ' ' . $lname;
                } else if($row['account_type'] == 'business') {
                    $to_name = $details['name'];
                }            
            endforeach;
            $stmt->close();
            
            $now = new DateTime("now", new DateTimeZone('Asia/Singapore') );
            $created_at = $now->format('Y-m-d H:i:s');

            
            
            $stmt = $this->con->prepare("INSERT INTO chat (from_id, to_id, from_name, to_name, from_img, to_img, msg, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iissssss", $from_id, $to_id, $from_name, $to_name, $from_img, $to_img, $msg, $created_at);
            $stmt->execute();
            $stmt->close();
        }
        public function form($from_id, $to_id) {
            $this->startSession();
            echo $this->show_chat($from_id, $to_id);
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                if($userdata['uid'] != $from_id) {
                    $from = $to_id;
                    $to = $from_id;
                } else {
                    $from = $from_id;
                    $to = $to_id;
                }
            }
            echo "<form id='msgForm' onsubmit='return create_msg(event)' autocomplete='off' method='POST'>
                <input type='hidden' name='from_id' id='from_id' value='$from'>
                <input type='hidden' name='to_id' id='to_id' value='$to'>
                <div class='input-group' id='textarea-group'>
                    <textarea name='msg' id='msg' cols='20' rows='2'></textarea>
                </div>
                <div class='input-group'>
                    <input type='submit' class='send' name='send' value='Send'>
                </div>
            </form>";
        }
        private function get_chat_by_ids($id_1, $id_2) {
            $chats_array = array();
            $stmt = $this->con->prepare("SELECT * FROM chat WHERE (from_id=? OR to_id=?) AND (from_id=? OR to_id=?) ORDER BY id ASC");
            $stmt->bind_param('iiii', $id_1, $id_1, $id_2, $id_2);
            $stmt->execute();

            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            foreach($data as $row):
                $id = $row['id'];
                $from_id = $row['from_id'];
                $to_id = $row['to_id'];
                $from_name = $row['from_name'];
                $to_name = $row['to_name'];
                $msg = $row['msg'];
                $created_at = $row['created_at'];

                $booking_date = new DateTime($created_at, new DateTimeZone('Asia/Singapore') );
                $MjYDate = $booking_date->format("M j, Y");
                $time = $booking_date->format("h:m A");
                $chat_array = array(
                    "id" => $id,
                    "from_id" => $from_id,
                    "to_id" => $to_id,
                    "from_name" => $from_name,
                    "to_name" => $to_name,
                    "msg" => $msg,
                    "created_at" => $created_at,
                    "mjy" => $MjYDate,
                    "time" => $time
                );
                array_push($chats_array, $chat_array);
            endforeach;
            $stmt->close();
            return $chats_array;
        }
        public function show_chat($id_1, $id_2) {
            $chats_array = $this->get_chat_by_ids($id_1, $id_2);
            $count = count($chats_array);


            $chatsStr = "";

            if ($count == 0) {
                $chatsStr .= "";
            } else {
                foreach($chats_array as $chat_array):
                    $msg = nl2br($chat_array['msg']);
                    if(!empty($chat_array['from_img'])) {
                        $photo = "<img src='./img/{$chat_array['from_img']}' alt=''>";
                    } else {
                        $photo = "<img src='./img/avi.png' alt=''>";
                    }
                    $chatsStr .= "
                    <div class='msg' id='m-{$chat_array['id']}'>
                        <div class='msg-row-1'>
                            <div class='header'>
                                <div class='avi-wrapper'>
                                    $photo
                                </div>
                            </div>
                        </div>
                        <div class='msg-row-2'>
                            <div class='msg-head'>
                                <div class='name'>
                                    <a hre='./profile?id={$chat_array['from_id']}'><b>{$chat_array['from_name']}</b></a>
                                </div>
                                <div class='time'>
                                    <span>{$chat_array['mjy']}</span>
                                    <span>{$chat_array['time']}</span>
                                </div>
                            </div>
                            <div class='msg-body'>
                                <p>$msg</p>
                            </div>

                        </div>
                    </div>";         
                endforeach;
            }
    
            return "<div id='hide-chat-msgs' onclick='hide();'>
                <i class='fas fa-angle-left'></i>
            </div>
            <div id='chat'>             
                <div id='chat-inner'>
                    $chatsStr
                </div>
            </div>";
        }

        private function get_chat_by_user_id($id) {
            $chats_array = array();
            $stmt = $this->con->prepare("SELECT * FROM chat WHERE from_id=? OR to_id=? ORDER BY id ASC");
            $stmt->bind_param('ii', $id, $id);
            $stmt->execute();

            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            foreach($data as $row):
                $elapsed = elapsed($row['created_at']);

                $id = $row['id'];
                $from_id = $row['from_id'];
                $to_id = $row['to_id'];
                $from_name = $row['from_name'];
                $to_name = $row['to_name'];
                $msg = substr($row['msg'], 0, 25).'...';
                $created_at = $row['created_at'];

                $booking_date = new DateTime($created_at, new DateTimeZone('Asia/Singapore') );
                $MjYDate = $booking_date->format("M j, Y");
                $time = $booking_date->format("h:m A");
                
                if(count($chats_array) > 0) {
                    foreach($chats_array as $chat_array):
                        if(
                            ($chat_array['from_id'] == $from_id && $chat_array['to_id'] == $to_id) ||
                            ($chat_array['from_id'] == $to_id && $chat_array['to_id'] == $from_id)
                        ) {
                            array_splice($chats_array, 0, 1);
                        }
                    endforeach;
                }
                $chat_array = array(
                    "id" => $id,
                    "from_id" => $from_id,
                    "to_id" => $to_id,
                    "from_name" => $from_name,
                    "to_name" => $to_name,
                    "msg" => $msg,
                    "created_at" => $created_at,
                    "mjy" => $MjYDate,
                    "time" => $time,
                    'elapsed' => $elapsed
                );
                array_push($chats_array, $chat_array);
            endforeach;
            $stmt->close();

            if(isset($_POST['account_id']) && isset($_SESSION['user'])) {
                $account_id = intval($_POST['account_id']);

                $userdata = json_decode($_SESSION['user'], true);
                $uid = $userdata['uid'];

                $contact_status = 0; 
                foreach ($chats_array as $chat_array):
                    if(
                        $chat_array['to_id'] == $account_id ||
                        $chat_array['from_id'] == $account_id
                    ) {
                        $contact_status = 1; 
                    }
                endforeach;
                if($contact_status == 0) {
                    $stmt2 = $this->con->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
                    $stmt2->bind_param('i', $account_id);
                    $stmt2->execute();
        
                    $result2 = $stmt2->get_result();
                    if($result2->num_rows > 0) {
                        $data2 = $result2->fetch_all(MYSQLI_ASSOC);
                        foreach($data2 as $row2):                
                            $details = json_decode($row2['user_details'], true);
                            if($row2['account_type'] == 'personal') {
                                $fname = $details['fname'];
                                $lname = $details['lname'];
                                $to_name = $fname . ' ' . $lname;
                            } else if($row2['account_type'] == 'business') {
                                $to_name = $details['name'];
                            } 
                            $photos = json_decode($row2['photo'], true);
                            if(empty($photos)) {
                                $to_img = '';
                            } else {
                                $to_img = $photos['sm'];
                            }
                        endforeach;
                    } else {
                        echo 'user not found';
                    }
                    $stmt2->close();


                    $stmt3 = $this->con->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
                    $stmt3->bind_param('i', $uid);
                    $stmt3->execute();
        
                    $result3 = $stmt3->get_result();
                    $data3 = $result3->fetch_all(MYSQLI_ASSOC);
                    foreach($data3 as $row3):
                        $details = json_decode($row3['user_details'], true);
                        if($row3['account_type'] == 'personal') {
                            $fname = $details['fname'];
                            $lname = $details['lname'];
                            $from_name = $fname . ' ' . $lname;
                        }
                        if($row3['account_type'] == 'business') {
                            $from_name = $details['name'];
                        } 
                        $photos = json_decode($row3['photo'], true);
                        if(empty($photos)) {
                            $from_img = '';
                        } else {
                            $from_img = $photos['sm'];
                        }
                    endforeach;
                    $stmt3->close();

                    $chat_array = array(
                        "id" => $id,
                        "from_id" => $uid,
                        "to_id" => $account_id,
                        "from_name" => $from_name,
                        "to_name" => $to_name,
                        "msg" => '',
                        // "created_at" => $created_at,
                        // "mjy" => $MjYDate,
                        // "time" => $time,
                        'elapsed' => ''
                    );
                    array_push($chats_array, $chat_array);
                }    
            }
            // var_dump($chats_array);
            return $chats_array;
        }
        public function show_all_msgs($id) {
            $chats_array = $this->get_chat_by_user_id($id);
            // var_dump($chats_array);
            $count = count($chats_array);


            $msgSummaryStr = "";

            if ($count == 0) {
                $msgSummaryStr .= "";
            } else {
                foreach($chats_array as $chat_array):  
                    if(isset($_SESSION['user'])) {
                        $userdata = json_decode($_SESSION['user'], true);
                        $uid = $userdata['uid'];
                        if($uid == $chat_array['from_id']) {
                            $name = $chat_array['to_name'];
                        } else if($uid == $chat_array['to_id']) {
                            $name = $chat_array['from_name'];
                        }        
                    }
                    $msg = nl2br($chat_array['msg']);
                    if(!empty($chat_array['from_img'])) {
                        $photo = "<img src='./img/{$chat_array['from_img']}' alt=''>";
                    } else {
                        $photo = "<img src='./img/avi.png' alt=''>";
                    }
                    $msgSummaryStr .= "
                    <div class='msg-summary' id='ms-{$chat_array['from_id']}-{$chat_array['to_id']}' onclick='show_clicked_msg(this.id)'>
                        <div class='msg-summary-1'>
                            <div class='header'>
                                <div class='avi-wrapper'>
                                    $photo
                                </div>
                            </div>
                        </div>
                        <div class='msg-summary-2'>
                            <div class='msg-head'>
                                <div class='name'>
                                    <span><b>$name</b></span>
                                </div>
                                <div class='time'>
                                    <span>{$chat_array['elapsed']}</span>
                                </div>
                            </div>
                            <div class='msg-body'>
                                <p>$msg</p>
                            </div>

                        </div>
                    </div>";         
                endforeach;
            }
    
            return "<div class='msg-summaries' id='msg-summaries'>             
                <div class='msg-summaries-inner'>
                    $msgSummaryStr
                </div>
            </div>";
        }
    }
?>