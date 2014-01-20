<?php
	include'../class/setting.php';
    $var = $facebookpage->getFeedData($dbHandle,$_POST['id']);
?>

            <div class="headTitle"><i class="fa fa-plus-circle"></i> รูปภาพใหม่</div>

            <div class="form">
            <form action="Javascript:createPhoto($('#id').val(),$('#image').val(),$('#textArea').val(),$('#category').val(),$('#keyword').val());">

                <input type="hidden" id="id" value="<?php echo $var['ff_id'];?>">

                <div class="photoInput">
                    <div class="imageResult" id="imageResult">
                        <img src="<?php echo $var['ff_source'];?>">
                    </div>

                    <div class="input">
                        <p><i class="fa fa-camera"></i> ลิ้งรูปภาพ</p>
                        <input type="text" id="image" class="input-text" autocomplete="off" placeholder="ตัวอย่าง: http://www.domain.com/photo.jpg" required onBlur="Javascript:loadImage($('#image').val());" value="<?php echo $var['ff_source'];?>">
                    </div>
                    
                    <script type="text/javascript">
                        loadImage($('#image').val());
                    </script>
                </div>
                
                <textarea id="textArea" class="input-area animated" placeholder="เขียนบทความ , สามารถใช้แท็ก html ได้" onKeyUp="Javascript:exampleArticle($('#textArea').val());"><?php echo $var['ff_message'];?></textarea>
                <?php include'../html/editor.php';?>

                <p><i class="fa fa-folder-open"></i> หมวดหมู่</p>
                <select class="input-select s" id="category">
                    <?php $category->listCategoryToSelectForm($dbHandle,0,0);?>
                </select>

                <p><i class="fa fa-tag"></i> คำสำคัญ</p>
                <input type="text" name="keyword" id="keyword" class="input-text s" placeholder="ดินสอ,ดินสอสี,น้ำยาล้างจาน">
                
                <br>
                <input type="submit" class="input-submit" name="submit" value="อัพเดทข้อมูล">
            </form>

            </div>