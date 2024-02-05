<?php include './partials/header.php'; ?>
<?php include './partials/navigation.php'; ?>

<style>
    .confirmation {
        width: 500px;
        margin: 0px auto;
        display: flex;
        flex-flow: column nowrap;
    }
    .registration-successful {
        display: flex;
        flex-flow: column nowrap;
        align-items: center;
        justify-content: center;
        row-gap: 30px;
    }
    .registered div:nth-child(1) {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgb(0,143,19);
    }
    .registered div:nth-child(1) i {
        color: #fff;
        font-size: 13px;
    }
    .registered {
        color: rgb(0,143,19);
        padding: 10px 0;
        background-color: #fff;
        width: 55%;
        display: flex;
        flex-flow: row nowrap;
        align-items: center;
        justify-content: center;
        column-gap: 10px;
        font-size: 16px;
        font-family: var(--font-1);
        border-radius: 8px;
    }
    .check-email {
        width: 100%;
        display: flex;
        flex-flow: column nowrap;
        background-color: #fff;
        box-shadow: var(--box-shadow-1);
        border-radius: 12px;
    }
    .gmail-icon-wrapper {
        width: 100%;
        padding: 30px 0;
        display: flex;
        align-items: center;
        justify-content: center;
        /* border-bottom: 1px solid rgb(234,234,234); */
    }
    .check-email-content {
        width: 100%;
        padding: 30px;
        display: flex;
        flex-flow: column nowrap;
        align-items: center;
        justify-content: center;
        text-align: center;
        row-gap: 15px;
    }
    .check-email-heading {
        font-size: 21px;
        font-family: var(--font-3);
        color: rgb(70,70,70);
    }
    .check-email-text {
        font-size: 16px;
        font-family: var(--font-1);
        color: rgb(138,138,138);
    }
    .gmail-icon-circle {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: rgb(254,244,244);
        display: flex;
        flex-flow: column nowrap;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    .gmail-icon {
        width: 38px;
        height: 30px;
    }
    .gmail-icon img {
        width: inherit;
        height: inherit;
    }
    .confirmation-login-link {
        display: flex;
        margin: 30px 0 0 0;
    }
    a.go-to-login {       
        width: 180px;
        height: 50px;
        font-size: 18px;
        font-family: var(--font-1);
        color: rgb(255,129,8);
        background-color: rgb(255,255,255);
        border: 1px solid rgb(255,154,57);
        display: flex;
        justify-content: center;
        align-items: center;
        row-gap: 30px;
        border-radius: 8px;
        overflow: hidden;
    }
    .check-spam {
        margin: 20px 0;
        color: rgb(59,57,56);
        padding: 20px 50px;
        border: 1px solid rgb(191,187,184);
        font-size: 14px;
        line-height: 1.8;
        text-align: center;
        background-color: rgb(246,246,246);
    }
    @media screen and (max-width: 1560px) { 
        .confirmation {
            width: 350px;
        }
        .registered {
            width: 260px;
            font-size: 14px;
        }
        .check-email-content {
            padding: 30px 20px;
            row-gap: 10px;
        }
        .check-email-heading {
            font-size: 16px;
        }
        .check-email-text {
            font-size: 14px;
        }
        .gmail-icon-circle {
            width: 60px;
            height: 60px;
        }
        .gmail-icon {
            width: 35px;
            height: 30px;
        } 
        .check-spam {
            padding: 18px 18px;
            margin: 0px 0;
        }
        .confirmation-login-link {
            margin: 0px 0 0 0;
        }
        a.go-to-login {       
            width: 150px;
            height: 40px;
            font-size: 15px;
            font-family: var(--font-1);
            color: rgb(255,129,8);
            background-color: rgb(255,255,255);
            border: 1px solid rgb(255,154,57);
            display: flex;
            justify-content: center;
            align-items: center;
            row-gap: 30px;
            border-radius: 8px;
            overflow: hidden;
        }
    }
    @media screen and (max-width: 414px) {
        .confirmation {
            width: 95%;
        }
        .registered {
            width: 80%;
        }
        .check-email-content {
            padding: 30px 20px;
            row-gap: 10px;
        }
        .check-email-heading {
            font-size: 18px;
        }
        .check-email-text {
            font-size: 14px;
        }
        .gmail-icon-circle {
            width: 80px;
            height: 80px;
        }
        .gmail-icon {
            width: 35px;
            height: 30px;
        } 
        .check-spam {
            padding: 20px 20px;
        }
    }
</style>

<?php 
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        $email = '';
    }

    $status = $user->verify();
    if($status == 'not verified') {
        $success_text = 'Registered Successfully';
        $check_email_msg = "<div class='check-email-content'>
            <div class='check-email-heading'>Please check your email for the verification link</div>
        </div>";
        $login = "";
        $check_spam = "<div class='check-spam'>
            *If the email does not arrive in more than 5 mins, check your 
            spam folder. If not there contact our helpline or email us
        </div>";
    } else if($status == 'verified') {
        $success_text = 'Verified';
        $check_email_msg = "";
        $check_spam = "";
        $login = "<div class='confirmation-login-link'>
            <a class='go-to-login' href='./login'>Go to Login</a>
        </div>";
    } else {
        $success_text = 'Registered Successfully';
        $check_email_msg = "<div class='check-email-content'>
            <div class='check-email-heading'>Please check your email for the verification link</div>
        </div>";
        $check_spam = "<div class='check-spam'>
            *If the email does not arrive in more than 5 mins, check your 
            spam folder. If not there contact our helpline or email us
        </div>";
        $login = "";
    }
?>

<div class='page-wrapper'>
    <div class='confirmation'>
        <div class='registration-successful'>
            <div class='registered'>
                <div><i class="fas fa-check"></i></div>
                <div><?= $success_text; ?></div>
            </div>
            <div class='check-email'>
                <div class='gmail-icon-wrapper'>
                    <div class='gmail-icon-circle'>
                        <div class='gmail-icon'>
                            <img src="./img/2c1a7560c88ea83e6b2593cd07af8ad8.png" alt="">
                        </div>
                    </div>
                </div>
                <?= $check_email_msg; ?>
            </div>
            <?= $login; ?>
            <?= $check_spam; ?>

        </div>
    </div>
</div>



<?php include './partials/footer.php'; ?>