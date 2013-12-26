            <div class="headTitle"><i class="fa fa-plus-circle"></i> รูปภาพใหม่</div>
            <div class="form">
            <form action="Javascript:createPhoto($('#image').val(),$('#textArea').val(),$('#category').val(),$('#keyword').val());">
                <div class="photoInput">
                    <div class="imageResult" id="imageResult"><img src="<?php echo $var['ar_image'];?>"></div>
                    <div class="input">
                        <p><i class="fa fa-camera"></i> ลิ้งรูปภาพ</p>
                        <input type="text" id="image" class="input-text" autocomplete="off" placeholder="ตัวอย่าง: http://www.domain.com/photo.jpg" autofocus required onKeyUp="Javascript:loadImage($('#image').val());" value="<?php echo $var['ar_image'];?>">
                    </div>
                </div>

                <p><i class="fa fa-pencil"></i> ข้อความ</p>
                <!-- <input type="text" id="title" class="input-text" autocomplete="off" placeholder="หัวข้อบทความ" autofocus required value="<?php echo $var['ar_title'];?>"> -->
                
                <textarea id="textArea" class="input-area animated" placeholder="เขียนบทความ , สามารถใช้แท็ก html ได้" onKeyUp="Javascript:exampleArticle($('#textArea').val());"><?php echo stripslashes($mydev->br2nl($var['im_text']));?></textarea>
                <?php include'editor.php';?>

                <p><i class="fa fa-folder-open"></i> หมวดหมู่</p>
                <select class="input-select s" id="category">
                    <?php $category->listCategoryToSelectForm($dbHandle,0,1);?>
                </select>

                <p><i class="fa fa-tag"></i> คำสำคัญ</p>
                <input type="text" name="keyword" id="keyword" class="input-text s" placeholder="ดินสอ,ดินสอสี,น้ำยาล้างจาน">
                
                <br>
                <input type="submit" class="input-submit" name="submit" value="อัพเดทข้อมูล">
            </form>

            </div>