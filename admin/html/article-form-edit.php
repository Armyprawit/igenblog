            <div class="headTitle"><span class="id">#<?php echo $var['ar_id']+1024;?></span> - <i class="fa fa-quote-left"></i> <?php echo $var['ar_title'];?> <i class="fa fa-quote-right"></i></div>
            <div class="form">
            <form action="Javascript:editArticle(<?php echo $var['ar_id'];?>,$('#image').val(),$('#title').val(),$('#textArea').val(),$('#category').val(),$('#keyword').val(),$('#credit').val());">
                
                <div class="photoInput">
                    <div class="imageResult" id="imageResult"><img src="<?php echo $var['ar_image'];?>"></div>
                    <div class="input">
                        <p><i class="fa fa-camera"></i> ลิ้งรูปภาพ</p>
                        <input type="text" id="image" class="input-text" autocomplete="off" placeholder="ตัวอย่าง: http://www.domain.com/photo.jpg" autofocus required onKeyUp="Javascript:loadImage($('#image').val());" value="<?php echo $var['ar_image'];?>">
                    </div>
                </div>

                <p><i class="fa fa-pencil"></i> บทความ</p>
                <input type="text" id="title" class="input-text" autocomplete="off" placeholder="หัวข้อบทความ" autofocus required value="<?php echo stripslashes($var['ar_title']);?>">
                
                <textarea id="textArea" class="input-area animated" placeholder="เขียนบทความ , สามารถใช้แท็ก html ได้" onKeyUp="Javascript:exampleArticle($('#textArea').val());"><?php echo stripslashes($mydev->br2nl($var['ar_text']));?></textarea>
                <?php include'editor.php';?>
                

                <p><i class="fa fa-folder-open"></i> หมวดหมู่</p>
                <select id="category" class="input-select s">
                    <?php $category->listCategoryToSelectForm($dbHandle,$var['ar_category_id'],0);?>
                </select>

                <p><i class="fa fa-tag"></i> คำสำคัญ</p>
                <input type="text" id="keyword" class="input-text s" placeholder="ดินสอ,ดินสอสี,น้ำยาล้างจาน" value="<?php echo $var['ar_keyword'];?>">

                <p><i class="fa fa-location-arrow"></i> แหล่งที่มา</p>
                <input type="text" id="credit" class="input-text s" placeholder="http://www.igensite.com" value="<?php echo $var['ar_credit'];?>">
                
                <br>
                <div class="btn-delete"><i class="fa fa-times"></i> ลบบทความ</div>
                <input type="submit" class="input-submit" name="submit" value="บันทึกบทความ">
            </form>
            </div>