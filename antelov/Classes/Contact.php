<?php
    /*
    */
    class Contact extends Db {
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
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $msg = $_POST['msg'];
            
            $now = new DateTime("now", new DateTimeZone('Asia/Singapore') );
            $created_at = $now->format('Y-m-d H:i:s');
            
            $stmt = $this->con->prepare("INSERT INTO contacts (fname, lname, email, msg, created_at) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $fname, $lname, $email, $msg, $created_at);
            if($stmt->execute()) {
                echo "<div class='success'>Your message has been sent!</div>";
            } else {
                echo "<div class='error'>There was an error</div>";
            }
            $stmt->close();
            // $contact_array = array(
            //     "name" => $name,
            //     "surname" => $surname,
            //     "email" => $email,
            //     "phone" => $phone,
            //     "msg" => $msg,
            //     "created_at" => $created_at
            // );
        }
    }
?>