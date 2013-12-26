<?php
	include'../class/setting.php';
?>
            <div class="headTitle"><i class="fa fa-plus-circle"></i> เพิ่มหมวดหมู่ใหม่</div>
            <div class="form">
            <form action="Javascript:createArticle($('#image').val(),$('#title').val(),$('#textArea').val(),$('#category').val(),$('#keyword').val(),$('#credit').val());">
                
                <div class="photoInput">
                    <div class="imageResult" id="imageResult"></div>
                    <div class="input">
                        <p>ลิ้งรูปภาพ</p>
                        <input type="text" id="image" class="input-text" autocomplete="off" placeholder="ตัวอย่าง: http://www.domain.com/photo.jpg" autofocus required onKeyUp="Javascript:loadImage($('#image').val());">
                    </div>
                </div>

                <p>บทความ</p>
                <input type="text" id="title" class="input-text" autocomplete="off" placeholder="หัวข้อบทความ" autofocus required>
                
                <textarea id="textArea" class="input-area" onKeyUp="Javascript:exampleArticle($('#textArea').val());"></textarea>
                <div class="control">
                    <div class="btn" onclick="javascript:addtag('textArea','h1');">H1</div>
                    <div class="btn" onclick="javascript:addtag('textArea','h2');">H2</div>
                    <div class="btn" onclick="javascript:addtag('textArea','p');">P</div>

                    <!-- <div class="btn" onclick="javascript:addtag('textArea','left');"><i class="fa fa-align-left"></i></div> -->
                    <!-- <div class="btn" onclick="javascript:addtag('textArea','center');"><i class="fa fa-align-center"></i></div> -->
                    <!-- <div class="btn" onclick="javascript:addtag('textArea','right');"><i class="fa fa-align-right"></i></div> -->
                    
                    <div class="btn" onclick="javascript:addtag('textArea','b');"><i class="fa fa-bold"></i></div>
                    <div class="btn" onclick="javascript:addtag('textArea','i');"><i class="fa fa-italic"></i></div>
                    <!-- <div class="btn" onclick="javascript:addtag('textArea','u');"><i class="fa fa-underline"></i></div> -->

                    <div class="btn" onclick="javascript:addtag('textArea','link');"><i class="fa fa-link"></i> Link</div>
                    <!-- <div class="btn" onclick="javascript:addtag('textArea','embed');"><i class="fa fa-code"></i> Embed</div> -->
                    <div class="btn" onclick="javascript:addtag('textArea','photo');"><i class="fa fa-camera"></i> Photo</div>
                    <!-- <div class="btn" onclick="javascript:addtag('textArea','highlight');"><i class="fa fa-quote-left"></i> Highlight</div> -->
                    <div class="btn" onclick="javascript:addtag('textArea','youtube');"><i class="fa fa-youtube-play"></i> Youtube</div>

                    <div class="btn" id="liveView-btn" onClick="Javascript:showLiveView('open');"><i class="fa fa-eye"></i> LiveView</div>
                    <div class="btn" id="clear-btn" onClick="Javascript:clearStyle($('#htmlStyle').val());"><i class="fa fa-eraser"></i> Clear Style</div>
                </div>
                

                <p>หมวดหมู่</p>
                <select id="category" class="input-select s">
                    <?php $category->listCategoryToSelectForm($dbHandle,0,0);?>
                </select>

                <p>คำสำคัญ</p>
                <input type="text" id="keyword" class="input-text s" placeholder="ดินสอ,ดินสอสี,น้ำยาล้างจาน">

                <p>แหล่งที่มา</p>
                <input type="text" id="credit" class="input-text s" placeholder="http://www.igensite.com">
                
                <br>
                <input type="submit" class="input-submit" name="submit" value="อัพเดทข้อมูล">
            </form>
            </div>