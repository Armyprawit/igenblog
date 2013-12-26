<?php
	include'../class/setting.php';
?>
			<div class="headTitle"><i class="fa fa-plus-circle"></i> เพิ่มคลิปวิดีโอใหม่</div>
            <div class="form">
            <form action="Javascript:createVideo(document.getElementById('link').value,document.getElementById('category').value,document.getElementById('title').value,document.getElementById('description').value,document.getElementById('keyword').value);">
                <p>ลิ้งวิดีโอ <span id="loading"></span></p>
                <input type="text" name="link" id="link" class="input-text" autocomplete="off" autofocus required onKeyUp="Javascript:getMetaVideo(document.getElementById('link').value);">
                <div class="text">อย่าน้อย 6 ตัวอักษร</div>
                
                <div id="meta"></div>
            </form>

            </div>