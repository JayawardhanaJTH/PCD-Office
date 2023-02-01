<div class="bot-wrapper">
    <div class="title">
        <h4>Simple Online Chatbot</h4>
    </div>
    <div id="bot-inner-wrapper">
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hello there, how can I help you?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#send-btn").on("click", function() {
            $value = $("#data").val();
            $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
            $(".form").append($msg);
            $("#data").val('');

            // start ajax code
            $.ajax({
                url: 'bot/message.php',
                type: 'POST',
                data: 'text=' + $value,
                success: function(result) {
                    $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                    $(".form").append($replay);
                    // when chat goes down the scroll bar automatically comes to the bottom
                    $(".form").scrollTop($(".form")[0].scrollHeight);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        var show = false;
        $(".title").on("click", function() {
            if (!show) {
                show = true;
                var wrapper = document.getElementById('bot-inner-wrapper').style.setProperty('display', 'block');
            } else {
                show = false;
                var wrapper = document.getElementById('bot-inner-wrapper').style.removeProperty('display');
            }
        });
    });
</script>