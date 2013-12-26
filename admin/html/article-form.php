            <div class="headTitle"><i class="fa fa-plus-circle"></i> เพิ่มหมวดหมู่ใหม่</div>
            <div class="form">
            <form action="Javascript:createArticle($('#image').val(),$('#title').val(),$('#textArea').val(),$('#category').val(),$('#keyword').val(),$('#credit').val());">
                
                <div class="photoInput">
                    <div class="imageResult" id="imageResult"></div>
                    <div class="input">
                        <p><i class="fa fa-camera"></i> ลิ้งรูปภาพ</p>
                        <input type="text" id="image" class="input-text" autocomplete="off" placeholder="ตัวอย่าง: http://www.domain.com/photo.jpg" autofocus required onKeyUp="Javascript:loadImage($('#image').val());">
                    </div>
                </div>

                <p><i class="fa fa-pencil"></i> บทความ</p>
                <input type="text" id="title" class="input-text" autocomplete="off" placeholder="หัวข้อบทความ" autofocus required>
                
                <textarea id="textArea" class="input-area animated" placeholder="เขียนบทความ , สามารถใช้แท็ก html ได้" onKeyUp="Javascript:exampleArticle($('#textArea').val());"></textarea>
                <?php include'editor.php';?>
                

                <p><i class="fa fa-folder-open"></i> หมวดหมู่</p>
                <select id="category" class="input-select s">
                    <?php $category->listCategoryToSelectForm($dbHandle,0,1);?>
                </select>

                <p><i class="fa fa-tag"></i> คำสำคัญ</p>
                <input type="text" id="keyword" class="input-text s" placeholder="ดินสอ,ดินสอสี,น้ำยาล้างจาน">

                <p><i class="fa fa-location-arrow"></i> แหล่งที่มา</p>
                <input type="text" id="credit" class="input-text s" placeholder="http://www.igensite.com">
                
                <br>
                <input type="submit" class="input-submit" name="submit" value="บทความใหม่">
            </form>
            </div>