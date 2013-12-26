            <div class="headTitle"><i class="fa fa-plus-circle"></i> คลิปวิดีโอใหม่</div>
            <div class="form">
            <form action="Javascript:createVideo(document.getElementById('link').value,document.getElementById('category').value,document.getElementById('title').value,document.getElementById('textArea').value,document.getElementById('keyword').value);">
                <p><i class="fa fa-youtube-play"></i> ลิ้งวิดีโอ <span id="loading"></span></p>
                <input type="text" name="link" id="link" placeholder="Youtube, Vimeo, Dailymotion" class="input-text" autocomplete="off" autofocus required onKeyUp="Javascript:getMetaVideo(document.getElementById('link').value);">
                <div class="text"><i class="fa fa-hand-o-right"></i> ตัวอย่าง : http://www.youtube.com/watch?v=9xOl9dfZMcE</div>

                <div id="meta"></div>
            </form>

            </div>