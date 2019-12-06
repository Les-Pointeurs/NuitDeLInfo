@push("foot")
    <script>
        $(document).ready(function() {
            let msgdiv = $(".msg_history");

            function addMsg(msg) {
                let div = $("<div></div>");
                if (msg.fromUser)
                    div.addClass("outgoing_msg");
                else
                    div.addClass("incoming_msg");
                let inner = $("<div></div>");
                div.append(inner);
                if (msg.fromUser)
                    inner.addClass("sent_msg");
                else {
                    inner.addClass("received_msg");
                    let inn = $("<div></div>");
                    inn.addClass("received_withd_msg");
                    inner.append(inn);
                    inner = inn;
                }
                let p = $("<p></p>");
                if (msg.fromUser)
                    p.text(msg.text);
                else
                    p.html(msg.text);
                inner.append(p);
                msgdiv.append(div);
                msgdiv.scrollTop(999999);
            }

            if (!localStorage.messages) {
                let msg2 = {
                    "text": "Bonjour, comment puis-je vous aider ?",
                    "fromUser": false
                };
                localStorage.messages = JSON.stringify([msg2]);
                addMsg(msg2);
            }
            else
            {
                for(let msg of JSON.parse(localStorage.messages))
                {
                    addMsg(msg);
                }
            }

            $(".write_msg").keypress(function (e) {
                if (e.keyCode == 13) {
                    $(".msg_send_btn").click();
                }
            });

            $(".msg_send_btn").click(function() {
                let inp = $(".write_msg").val();
                let msg1 = {
                    "text": inp,
                    "fromUser": true
                };
                let arr = JSON.parse(localStorage.messages);
                arr.push(msg1);
                localStorage.messages = JSON.stringify(arr);
                addMsg(msg1);

                $(".write_msg").val("");

                $.get("{{route("chatbot.get")}}", {
                    "input": inp
                }, function(data) {
                    let msg2 = {
                        "text": data,
                        "fromUser": false
                    };
                    let arr = JSON.parse(localStorage.messages);
                    arr.push(msg2);
                    localStorage.messages = JSON.stringify(arr);
                    addMsg(msg2);
                });
            });
        });
    </script>
@endpush

<div class="mesgs">
    <div class="msg_history">
    </div>
    <div class="type_msg">
        <div class="input_msg_write">
            <input type="text" class="write_msg" placeholder="Entrez votre message" />
            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
