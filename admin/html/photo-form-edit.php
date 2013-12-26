            <div class="headTitle">#<?php echo $var['im_id']+1024;?></span> - <i class="fa fa-quote-left"></i> <?php echo iconv_substr($var['im_description'],0,60,"UTF-8").'...';?> <i class="fa fa-quote-right"></i></div>
            <div class="form">
            <form action="Javascript:editPhoto(<?php echo $var['im_id'];?>,$('#link').val(),$('#textArea').val(),$('#category').val(),$('#keyword').val());">
                <div class="photoInput">
                    <div class="imageResult" id="imageResult"><img src="<?php echo $var['im_image'];?>"></div>
                    <div class="input">
                        <p><i class="fa fa-camera"></i> ลิ้งรูปภาพ</p>
                        <input type="text" id="link" class="input-text" autocomplete="off" placeholder="ตัวอย่าง: http://www.domain.com/photo.jpg" autofocus required onKeyUp="Javascript:loadImage($('#link').val());" value="<?php echo $var['im_image'];?>">
                    </div>
                    <script type="text/javascript">
                        loadImage($('#link').val());
                    </script>
                </div>

                <p><i class="fa fa-pencil"></i> ข้อความ</p>
                <!-- <input type="text" id="title" class="input-text" autocomplete="off" placeholder="หัวข้อบทความ" autofocus required value="<?php echo $var['ar_title'];?>"> -->
                
                <textarea id="textArea" class="input-area animated" placeholder="เขียนบทความ , สามารถใช้แท็ก html ได้" onKeyUp="Javascript:exampleArticle($('#textArea').val());"><?php echo stripslashes($mydev->br2nl($var['im_text']));?></textarea>
                <?php include'editor.php';?>

                <p><i class="fa fa-folder-open"></i> หมวดหมู่</p>
                <select class="input-select s" id="category">
                    <?php $category->listCategoryToSelectForm($dbHandle,$var['im_category_id'],0);?>
                </select>

                <p><i class="fa fa-tag"></i> คำสำคัญ</p>
                <input type="text" name="keyword" id="keyword" class="input-text s" placeholder="ดินสอ,ดินสอสี,น้ำยาล้างจาน" value="<?php echo $var['im_keyword'];?>">
                
                <br>
                <input type="submit" class="input-submit" name="submit" value="อัพเดทข้อมูล">
            </form>

            </div>