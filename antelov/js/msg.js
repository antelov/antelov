
// var chat = document.getElementById('chat');
// chat.scrollTop = chat.scrollHeight;

function create_msg(event) {
    event.preventDefault();
    var form = $('form')[0];
    var formData = new FormData(form);

    // Get Ids
    var id_1 = document.getElementById('from_id').value;
    var id_2 = document.getElementById('to_id').value;

    // Create Message
    $.ajax({
        url : './controllers/msg-handler.php',
        type: 'POST', 
        data : formData,
        async: false,
        cache : false,
        contentType: false,
        processData: false,
        success: function(response, textStatus, jqXHR) {
            console.log(response);
            // $("#chat").load(location.href + " #chat-inner");
            // window.setTimeout(function() {
            //     var chat = document.getElementById('chat');
            //     chat.scrollTop = chat.scrollHeight;
            // }, 100);     


            // Display Message     
            msgIds(id_1, id_2);
            window.setTimeout(function() {
                var chat = document.getElementById('chat');
                chat.scrollTop = chat.scrollHeight;
            }, 100);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}

function hideMsgs() {
    var msgNodes = document.querySelectorAll('.msg');   
    for (let i = 0; i < msgNodes.length; i++) {
        msgNodes[i].style.position = 'absolute';
        msgNodes[i].style.zIndex = -10;
        msgNodes[i].style.opacity = 0;
    }
}
// hideMsgs()
function show_clicked_msg(id) {
    var idArr = id.split('-');
    idNumFrom = idArr[1];
    idNumTo = idArr[2];
    msgIds(idNumFrom, idNumTo);

    window.setTimeout(function() {
        var chat = document.getElementById('chat');
        chat.scrollTop = chat.scrollHeight;
    }, 100);


    var chat_right = document.getElementById('chat-right');
    var msg_summaries = document.getElementById('msg-summaries');

    var w = window.innerWidth;
    if(w < 800) {
        if(!chat_right.classList.contains('show-chat')) {
            chat_right.classList.add('show-chat');
            msg_summaries.classList.add('hide-msg-summary');
        } else {
            chat_right.classList.remove('show-chat');
            msg_summaries.classList.remove('hide-msg-summary');
        }
    }


    toggleClass(id, 'show-chat-msg', 'hide-chat-msg');
}
function hide() {
    var w = window.innerWidth;
    var chat_right = document.getElementById('chat-right');
    var msg_summaries = document.getElementById('msg-summaries');

    if(w < 800) {

        chat_right.classList.remove('show-chat');
        msg_summaries.classList.remove('hide-msg-summary');
        
    }
}
function msgIds(id_1, id_2) {
    $.ajax({
        url : './controllers/msg-handler', // Url of backend (can be python, php, etc..)
        type: 'POST', // data type (can be get, post, put, delete)
        data : "id_1="+id_1+"&id_2="+id_2,
        async: false,
        success: function(response, textStatus, jqXHR) {
            document.getElementById("chat-right").innerHTML = response;
            // console.log(response);
            // loader.classList.remove('loader-animation');
            // window.location.href = pagename;
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}
