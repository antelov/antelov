<?php
    class Review extends Db {
        public function __construct() {
            $this->con = $this->con();
        }
        private function startSession() {
            ob_start();
            session_start();
        }
        private function endSession() {
            session_unset();
            session_destroy();
        }
        public function create() {
                
            $personal_id = intval($_POST['personal_id']);
            $business_id = intval($_POST['business_id']);
            // $request_id = $_POST['request_id'];
            $rating = intval($_POST['rating_input']);
            $comment = $_POST['comment'];
                 
            $now = new DateTime("now", new DateTimeZone('Asia/Singapore') );
            $created_at = $now->format('Y-m-d H:i:s');

            var_dump($business_id, $personal_id, $rating, $comment, $created_at);
            
            $stmt = $this->con->prepare("INSERT INTO reviews (personal_id, business_id, rating, comment, created_at) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("iiiss", $personal_id, $business_id, $rating, $comment, $created_at);
            $stmt->execute();
            $stmt->close();

            header('location: ../user-profile?id='.$business_id);
        }
        private function getReviewsByIds($business_id, $personal_id) {
            $reviews_array = array();
            $stmt = $this->con->prepare("SELECT * FROM reviews WHERE business_id=? AND personal_id=? ORDER BY id DESC");
            $stmt->bind_param('ii', $business_id, $personal_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $reviewCount = $result->num_rows;
            $data = $result->fetch_all(MYSQLI_ASSOC);
            if($reviewCount > 0) {
                foreach($data as $row):

                    $id = $row['id'];
                    $business_id = $row['business_id'];
                    $personal_id = $row['personal_id'];
                    // $request_id = $row['request_id'];
                    $rating = $row['rating'];
                    $comment = $row['comment'];
                    $created_at = $row['created_at'];

                    $elapsed = elapsed($row['created_at']);

                    $user_status = 'member';
                    $exclude_status = 'deleted';
                    $stmt2 = $this->con->prepare("SELECT * FROM users WHERE user_status=? AND user_account_status!=? AND id=? ORDER BY id DESC");
                    $stmt2->bind_param('ssi', $user_status, $exclude_status, $personal_id);
                    $stmt2->execute();
                    $result2 = $stmt2->get_result();
                    $data2 = $result2->fetch_all(MYSQLI_ASSOC);
                    foreach($data2 as $row2):
                        $user_details = json_decode($row2['user_details'], true);
                        $fname = $user_details['fname'];
                        $lanme = $user_details['lname'];
                        $personal_name = $fname . ' '. $lanme;

                        $photos = json_decode($row2['photo'], true);
                        if(empty($photos)) {
                            $img = '';
                        } else {
                            $img = $photos['sm'];
                        }
                    endforeach;
                    $stmt2->close();

                    // $stmt3 = $this->con->prepare("SELECT * FROM users WHERE user_status=? AND user_account_status!=? AND id=? ORDER BY id DESC");
                    // $stmt3->bind_param('ssi', $user_status, $exclude_status, $business_id);
                    // $stmt3->execute();
                    // $result3 = $stmt3->get_result();
                    // $data3 = $result3->fetch_all(MYSQLI_ASSOC);
                    // foreach($data3 as $row3):
                    //     $user_details = json_decode($row3['user_details'], true);
                    //     $business_name = $user_details['name'];
                    // endforeach;
                    // $stmt3->close();

                    $review_array = array(
                        "id" => $id,
                        "business_id" => $business_id,
                        "personal_id" => $personal_id,
                        "personal_name" => $personal_name,
                        "photo" => $img,
                        // "request_id" => $request_id,
                        "rating" => $rating,
                        "comment" => $comment,
                        "created_at" => $created_at,
                        "elapsed" => $elapsed
                    );
                    array_push($reviews_array, $review_array);
                endforeach;
            }
            $stmt->close();
            return $reviews_array;
        }
        private function getReviews($business_id) {
            $reviews_array = array();
            $stmt = $this->con->prepare("SELECT * FROM reviews WHERE business_id=? ORDER BY id DESC");
            $stmt->bind_param('i', $business_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $reviewCount = $result->num_rows;
            $data = $result->fetch_all(MYSQLI_ASSOC);
            if($reviewCount > 0) {
                foreach($data as $row):

                    $id = $row['id'];
                    $business_id = $row['business_id'];
                    $personal_id = $row['personal_id'];
                    // $request_id = $row['request_id'];
                    $rating = $row['rating'];
                    $comment = $row['comment'];
                    $created_at = $row['created_at'];

                    $elapsed = elapsed($row['created_at']);

                    $user_status = 'member';
                    $exclude_status = 'deleted';
                    $stmt2 = $this->con->prepare("SELECT * FROM users WHERE user_status=? AND user_account_status!=? AND id=? ORDER BY id DESC");
                    $stmt2->bind_param('ssi', $user_status, $exclude_status, $personal_id);
                    $stmt2->execute();
                    $result2 = $stmt2->get_result();
                    $data2 = $result2->fetch_all(MYSQLI_ASSOC);
                    foreach($data2 as $row2):
                        $user_details = json_decode($row2['user_details'], true);
                        $fname = $user_details['fname'];
                        $lanme = $user_details['lname'];
                        $personal_name = $fname . ' '. $lanme;

                        $photos = json_decode($row2['photo'], true);
                        if(empty($photos)) {
                            $img = '';
                        } else {
                            $img = $photos['sm'];
                        }
                    endforeach;
                    $stmt2->close();

                    // $stmt3 = $this->con->prepare("SELECT * FROM users WHERE user_status=? AND user_account_status!=? AND id=? ORDER BY id DESC");
                    // $stmt3->bind_param('ssi', $user_status, $exclude_status, $business_id);
                    // $stmt3->execute();
                    // $result3 = $stmt3->get_result();
                    // $data3 = $result3->fetch_all(MYSQLI_ASSOC);
                    // foreach($data3 as $row3):
                    //     $user_details = json_decode($row3['user_details'], true);
                    //     $business_name = $user_details['name'];
                    // endforeach;
                    // $stmt3->close();

                    $review_array = array(
                        "id" => $id,
                        "business_id" => $business_id,
                        "personal_id" => $personal_id,
                        "personal_name" => $personal_name,
                        "photo" => $img,
                        // "request_id" => $request_id,
                        "rating" => $rating,
                        "comment" => $comment,
                        "created_at" => $created_at,
                        "elapsed" => $elapsed
                    );
                    array_push($reviews_array, $review_array);
                endforeach;
            }
            $stmt->close();
            return $reviews_array;
        }
        public function showReviews($business_id) {
            $reviews_array = $this->getReviews($business_id);
            $count = count($reviews_array);
            $reviewsStr = "";
            
            if($count == 0) {
                $count_str = "No Reviews";
            } else if($count == 1) {
                $count_str = "$count Review";
            } else {
                $count_str = "$count Reviews";
            }

            $write_review = "";
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                $uid = $userdata['uid'];
                $account_type = $userdata['account_type'];

                if($account_type == 'personal') {
                    // Count Reviews
                    $reviews_array_2 = $this->getReviewsByIds($business_id, $uid);
                    $reviews2Count = count($reviews_array_2);

                    // Count Bids
                    $bid = new Bid();
                    $bids_array = $bid->get_bids_by_ids($business_id, $uid, 'completed');
                    $bidsCount = count($bids_array); 
                    
                    if($reviews2Count < $bidsCount) {
                        foreach ($bids_array as $bid_array):
                            $e = elapsed_check($bid_array['completed_at']);
                            if($e == 1) {
                                break;
                            }
                        endforeach;

                        if($e == 1) {
                            $write_review .= "<div class='row' id='row-1'>
                                <div>$count_str</div>
                                <input type='hidden' name='business_id' id='business_id' value='$business_id'>
                                <div onclick='return revPopUp();' id='review-btn'>Write a review</div>
                            </div>";
                        }
                    }

                }
            }

            if ($count == 0) {
                $reviewsStr .= "";
            } else {
                $reviewsStr .= "<div class='reviews-wrapper'>";
                foreach($reviews_array as $review_array):
                    $comment = nl2br($review_array['comment']);
                    $rating = intval($review_array['rating']);
                    if($rating == 1) {
                        $ratingStr = "<span class='fill'></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>";
                    } elseif($rating == 2) {
                        $ratingStr = "<span class='fill'></span>
                        <span class='fill'></span>
                        <span></span>
                        <span></span>
                        <span></span>";
                    } elseif($rating == 3) {
                        $ratingStr = "
                        <span class='fill'></span>
                        <span class='fill'></span>
                        <span class='fill'></span>
                        <span></span>
                        <span></span>";
                    } elseif($rating == 4) {
                        $ratingStr = "<span class='fill'></span>
                        <span class='fill'></span>
                        <span class='fill'></span>
                        <span class='fill'></span>
                        <span></span>";
                    } elseif($rating == 5) {
                        $ratingStr = "<span class='fill'></span>
                        <span class='fill'></span>
                        <span class='fill'></span>
                        <span class='fill'></span>
                        <span class='fill'></span>";
                    }
                    if(!empty($review_array['photo'])) {
                        $photo = $review_array['photo'];
                    } else {
                        $photo = 'avi.png';
                    }
                    $reviewsStr .= "
                    <div class='review'>
                        <div class='review-row-1'>
                            <div class='header'>
                                <div class='avi-wrapper'>
                                    <img src='./img/$photo' alt=''>
                                </div>
                                <div class='review-details'>
                                    <div class='name'>
                                        <b>{$review_array['personal_name']}</b>
                                    </div>
                                    <div class='elapsed'>
                                        <b>{$review_array['elapsed']}</b>
                                    </div>
                                </div>
                                
                            </div>
                            <div class='stars'>
                            $ratingStr
                            </div>
                        </div>
                        <div class='review-row-2'>
                            <p>$comment</p>
                        </div>
                    </div>";         
                endforeach;
                $reviewsStr .= "</div>";
            }
    
            return "<div id='reviews'>             
                <div id='reviews-inner'>
                    $write_review
                    $reviewsStr
                </div>
            </div>";
        }
        public function review_popup($business_id) {
            $this->startSession();
            if(isset($_SESSION['user'])) {
                $userdata = json_decode($_SESSION['user'], true);
                $personal_id = $userdata['uid'];
            }
            $hidden_inputs = "
                <input type='hidden' name='business_id' id='business_id' value='$business_id'>
                <input type='hidden' name='personal_id' id='personal_id' value='$personal_id'>
            ";
            $heading = "<div class='form-heading'>
                <h3>Write a Review</h3>
            </div>";
            $name_input = "<div class='input-group'>
                <input type='text' class='name' name='name' id='name' placeholder='NAME'>
                <div class='error' id='nameError'></div>
            </div>";
            $rating_input = "<div class='rating'>
                <input type='hidden' name='rating_input' id='rating_input' value='0'>
                <div>Rating: </div>
                <div class='rating-stars'>
                    <span id='rating-1' onclick='return ratingVal(this.id);'></span>
                    <span id='rating-2' onclick='return ratingVal(this.id);'></span>
                    <span id='rating-3' onclick='return ratingVal(this.id);'></span>
                    <span id='rating-4' onclick='return ratingVal(this.id);'></span>
                    <span id='rating-5' onclick='return ratingVal(this.id);'></span>
                </div>
                <div class='error' id='ratingError'></div>
            </div>";
            $photo_input = "<div class='upload-photo'>
                <div>Upload a phpto</div>
                <div>
                    <input class='input' id='photo' type='file' name='photo'>
                </div>
            </div>";
            $comment_input = " <div class='input-group'>
                <textarea name='comment' id='comment' cols='30' rows='12' placeholder='COMMENT'></textarea>
                <div class='error' id='commentError'></div>
            </div>";
            $submit_btn = "<div class='input-group'>
                <input type='submit' class='send' name='send' value='Done'>
            </div>";


            return "
            <div id='write-a-review'>
                <div id='writeReviewWrapper'>
                    <div class='form-header'>
                        $heading
                    </div>
                    <form onsubmit='return validateReview(event)' autocomplete='off' action='./controllers/review-handler' id='signUpForm' class='sign_up' method='POST' enctype='multipart/form-data'>                 
                        $hidden_inputs
                        $rating_input
                        $comment_input
                        $submit_btn 
                    </form>
                </div>
            </div>";
        }
    }
?>