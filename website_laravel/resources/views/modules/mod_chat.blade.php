<div class="include_all" onclick="process_show_hide()">
    <div class="title_mod_chat">
        Chat nhé
    </div>
    <div class="form_chat">
        <div class="list_message_chat">
            <div class="item_chat">
                test test
            </div>
            <div class="item_chat">
                test test
            </div>
        </div>
    </div>
</div>

<script>
    var show_hide_form = 0;
    function process_show_hide(){
        show_hide_form = 1 - show_hide_form;
        if(show_hide_form == 1){
            $('.include_all .form_chat').height(200);
        }
        else {
            $('.include_all .form_chat').height(0);
        }
    }
</script>