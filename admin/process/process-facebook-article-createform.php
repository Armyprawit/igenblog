<?php
	include'../class/setting.php';
    $var = $facebookpage->getFeedData($dbHandle,$_POST['id']);
?>
			<div class="headTitle"><i class="fa fa-plus-circle"></i> เพิ่มหมวดหมู่ใหม่</div>

            <div class="form">

            <form action="Javascript:createArticle($('#id').val(),$('#image').val(),$('#title').val(),$('#textArea').val(),$('#category').val(),$('#keyword').val(),$('#credit').val());">

                <input type="hidden" id="id" value="<?php echo $var['ff_id'];?>">
                
                <div class="photoInput">
                    <div class="imageResult" id="imageResult"></div>

                    <div class="input">
                        <p>ลิ้งรูปภาพ</p>
                        <input type="text" id="image" class="input-text" autocomplete="off" placeholder="ตัวอย่าง: http://www.domain.com/photo.jpg" autofocus required onKeyUp="Javascript:loadImage($('#image').val());" value="<?php echo $var['ff_source'];?>">
                    </div>

                    <script type="text/javascript">
                        loadImage($('#image').val());
                    </script>
                </div>

                <p>บทความ</p>
                <input type="text" id="title" class="input-text" autocomplete="off" placeholder="หัวข้อบทความ" autofocus required>
                
                <textarea id="textArea" class="input-area" onKeyUp="Javascript:exampleArticle($('#textArea').val());"><?php echo $var['ff_message'];?></textarea>
                <?php include'../html/editor.php';?>
                

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