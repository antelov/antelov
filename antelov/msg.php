<?php include './partials/header.php'; ?>
<?php include './partials/navigation.php'; ?>

<!-- https://giordins.ga/chat.php -->
<!-- https://giordins.ga/msg.php -->
<style>
    .page-wrapper {
        width: 70%;
        margin-top: 280px;
        margin-bottom: 60px;
    }
    .chat-section {
        width: 1200px;
        display: grid;
        grid-template-columns: 400px 800px;
        justify-content: flex-start;
        column-gap: 0px;
        border-left: 1px solid #dbdbdb;
        height: 600px;
        border-left: 1px solid #dbdbdb;
        border-right: 1px solid #dbdbdb;
        border-top: 1px solid #dbdbdb;
        border-bottom: 1px solid #dbdbdb;
        margin: 0 auto;
    }
    .chat-right {
        width: 100%;
        display: grid;
        grid-auto-rows: min-content;
        grid-template-columns: 100%;
        row-gap: 0px;
    }
    #chat {
        display: grid;
        width: 100%;
        height: 390px;
        overflow-Y: scroll;
        border-left: 1px solid #dbdbdb;
        /* border-bottom: 1px solid #dbdbdb; */
    }
    .msg-summaries {
        width: 100%;
        height: inherit;
        overflow-Y: scroll;
    }
    #chat .msg {
        padding: 30px 40px 40px 30px;
        display: grid;
        grid-template-columns: 40px auto;
        column-gap: 2%;
        /* border-bottom: 1px solid #dbdbdb; */
        transition: opacity .2s,transform .5s,width .2s,-webkit-transform .5s;
        /* position: absolute;
        z-index: -10;
        opacity: 0; */
    }
    #chat .msg:hover {
        background-color: rgb(245,245,245);
    }
    #chat .msg:nth-child(1) {
        border-top: 1px solid #dbdbdb;
    }
    .msg .avi-wrapper {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
    }
    .avi-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    #chat .msg-row-2 {
        display: grid;
        row-gap: 10px;
    }
    #chat .msg-row-2 .msg-head {
        display: grid;
        grid-template-columns: auto auto;
        justify-content: flex-start;
        column-gap: 10px;
    }
    .msg-head .name a b {
        color: #222325;
        font-size: 15px;
    }
    .msg-head .time span {
        color: #95979d;
        font-size: 15px;
    }
    #chat .msg-body p {
        line-height: 1.4;
        font-size: 16px;
        color: #555;
    }
    input[type="submit"]:hover {
        background-color: var(--btn-bg-hover);
    }
    .msg-summaries {
        border-top: 1px solid #e4e5e7;
    }
    .msg-summary {
        display: grid;
        grid-template-columns: 30px auto;
        column-gap: 5%;
        border-bottom: 1px solid #e4e5e7;
        padding: 28px 40px 30px 30px;
        cursor: pointer;
        transition: opacity .2s,transform .5s,width .2s,-webkit-transform .5s;
    }
    .msg-summary:hover {
        background-color: rgb(245,245,245);
    }
    .msg-summary .avi-wrapper {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        overflow: hidden;
    }
    .msg-summary-2 {
        display: grid;
        grid-template-columns: 100%;
        row-gap: 5px;
    }
    .msg-summary .msg-head {
        display: grid;
        grid-template-columns: 100px auto;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
    }
    .msg-summary .msg-head .name span b {
        font-size: 14px;
    }
    .msg-summary .msg-head .time span {
        font-size: 14px;
    }
    .msg-summary .msg-body p {
        font-size: 15px;
        color: #555;
    }
    #msgForm {
        padding: 20px 40px 20px 40px;
        width: 100%;
        display: grid;
        grid-template-rows: auto;
        grid-template-columns: 100%;
        row-gap: 20px;
    }
    #msgForm #textarea-group {
        width: 100%;
    }
    #msgForm textarea#msg {
        /* border: 1px solid #c8c8c8; */
        border: none;
        /* background-color: rgb(252,252,252); */
        background-color: #fff;
        color: #7a7d85;
        box-shadow: 0 1px 5px 0 rgb(0 0 0 / 10%)
    }
    #msgForm input[type='submit'] {
        width: 150px;
        font-size: 15px;
        font-weight: bold;

        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        outline: none;
        border: none;
        height: 45px;
        display: grid;
        align-items: center;
        justify-content: center;
        color: #fff;
        background-color: var(--btn-bg);
        border-radius: 5px;
        transition: .3s;
        font-family: var(--font-1);
        margin-left: auto;
    }
    #msgForm input[type='submit']:hover {
        background-color: var(--btn-bg-hover);
    }
    
    .show-chat#chat-right {
        display: grid;
        grid-column-start: 1;
        grid-column-end: 2;
    }
    .hide-chat#chat-right {
        display: none;
        grid-column-start: 2;
        grid-column-end: 3;
    }
    .hide-msg-summary#msg-summaries {
        display: none;
        grid-column-start: 2;
        grid-column-end: 3;
    }
    .show-msg-summary#msg-summaries {
        display: grid;
        grid-column-start: 1;
        grid-column-end: 2;
    }
    #hide-chat-msgs {
        padding: 10px 30px;
        background-color: #f2f2f2;
    }
    .fas.fa-angle-left::before {
        font-size: 23px;
        color: #a6a6a6;
        cursor: pointer;
    }
    @media screen and (max-width: 1280px) {
        .page-wrapper {
            width: 100%;
            margin-top: 230px;
        }
        .chat-section {
            width: 900px;
            display: grid;
            grid-template-columns: 300px 600px;
        }  
        .msg-summary {
            padding: 20px 20px 20px 20px;
            grid-template-columns: 40px auto;
            column-gap: 10px;
        }
        .msg-summary .msg-head {
            display: grid;
            grid-template-columns: 100%;
        }  
        .msg-summary .avi-wrapper {
            width: 40px;
            height: 40px;
        }
    }
    @media screen and (max-width: 800px) {
        .chat-right {
            display: none;
        }
        .page-wrapper {
            width: 90%;
            margin-top: 100px;
            margin-bottom: 60px;
        }
        .chat-section {
            width: 600px;
            display: grid;
            grid-template-columns: 600px 600px;
            overflow-X: hidden;
        }
        #chat .msg {
            padding: 30px 20px 40px 20px;
            grid-template-columns: 50px auto;
            column-gap: 5%;
        }
        .msg .avi-wrapper {
            width: 50px;
            height: 50px;
        }
        #chat .msg-row-2 .msg-head {
            display: grid;
            grid-template-columns: 100%;
            justify-content: flex-start;
            column-gap: 10px;
        }
        .msg-summary {
            padding: 30px 30px 30px 30px;
            grid-template-columns: 40px auto;
            column-gap: 20px;
        }
    }
    @media screen and (max-width: 414px) {
        .page-wrapper {
            width: 100%;
        }
        .chat-section {
            width: 350px;
            display: grid;
            grid-template-columns: 350px 350px;
            overflow-X: hidden;
            height: 700px;
        }
    }
</style>

<div class='page-wrapper'>
    <?php
        include './Classes/Chat.php';
        $chat = new Chat();
        $from_id = $user->get_uid();    
        ?>   
        <div class='chat-section'>
            <?php
                echo $chat->show_all_msgs($from_id);          
            ?>
            <div class='chat-right' id='chat-right'>
                <?php
                    if(isset($_POST['account_id'])) {
                        if(isset($_SESSION['user'])) {
                            $userdata = json_decode($_SESSION['user'], true);
                            $uid = $userdata['uid'];

                            $chat->form($_POST['account_id'], $uid);
                        }
                    }
                ?>
            </div>
        </div>
</div>







<?php include './partials/footer.php'; ?>