            <div class="headTitle"><i class="fa fa-plus-circle"></i> เพิ่มคลิปวิดีโอใหม่</div>
            <div class="form">
            <form action="Javascript:editVideo(<?php echo $var['vi_id'];?>,document.getElementById('category').value,document.getElementById('title').value,document.getElementById('textArea').value,document.getElementById('keyword').value);">
                <p>ลิ้งวิดีโอ <span id="loading"></span></p>
                <input type="text" name="link" id="link" class="input-text" autocomplete="off" autofocus required value="<?php echo $var['vi_code'];?>" disabled>
                <div class="text">อย่าน้อย 6 ตัวอักษร</div>
                    
                    <input type="submit" class="input-submit" name="submit" value="เพิ่มคลิปใหม่">
                    <br>

                    <div class="image">
                         <div class="item"><img src="http://img.youtube.com/vi/<?php echo $var['vi_code'];?>/1.jpg"></div>
                         <div class="item"><img src="http://img.youtube.com/vi/<?php echo $var['vi_code'];?>/2.jpg"></div>
                         <div class="item"><img src="http://img.youtube.com/vi/<?php echo $var['vi_code'];?>/3.jpg"></div>
                    </div>

                    <p><i class="fa fa-pencil"></i> ข้อความ</p>
                    <input type="text" id="title" class="input-text" autocomplete="off" placeholder="หัวข้อบทความ" autofocus required value="<?php echo stripslashes($var['vi_title']);?>">
                
                    <textarea id="textArea" class="input-area animated" placeholder="เขียนบทความ , สามารถใช้แท็ก html ได้" onKeyUp="Javascript:exampleArticle($('#textArea').val());"><?php echo stripslashes($mydev->br2nl($var['vi_text']));?></textarea>
                    <?php include'editor.php';?>

                    <p><i class="fa fa-folder-open"></i> หมวดหมู่</p>
                    <select class="input-select s" id="category">
                        <?php $category->listCategoryToSelectForm($dbHandle,$var['vi_category_id'],0);?>
                    </select>

                    <p><i class="fa fa-tag"></i> คำสำคัญ</p>
                    <input type="text" name="keyword" id="keyword" class="input-text s" placeholder="ดินสอ,ดินสอสี,น้ำยาล้างจาน" value="<?php echo $var['vi_keyword'];?>">

                    <br>
                    <input type="submit" class="input-submit" name="submit" value="เพิ่มคลิปใหม่">
            </form>

            </div>