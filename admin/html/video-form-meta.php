                    <input type="submit" class="input-submit" name="submit" value="เพิ่มคลิปใหม่">
                    <br>

                    <div class="image">
                         <div class="item"><img src="http://img.youtube.com/vi/<?php echo $var['code'];?>/1.jpg"></div>
                         <div class="item"><img src="http://img.youtube.com/vi/<?php echo $var['code'];?>/2.jpg"></div>
                         <div class="item"><img src="http://img.youtube.com/vi/<?php echo $var['code'];?>/3.jpg"></div>
                    </div>

                    <p>คลิปวิดีโอ</p>
                    <input type="text" name="title" id="title" class="input-text" autocomplete="off" required value="<?php echo $var['title'];?>">
                    <textarea id="textArea" class="input-area animated"><?php echo $var['description'];?></textarea>
                    <?php include'editor.php';?>

                    <p>หมวดหมู่</p>
                    <select class="input-select s" id="category">
                         <?php $category->listCategoryToSelectForm($dbHandle,0,0);?>
                    </select>

                    <p>คำสำคัญ</p>
                    <input type="text" name="keyword" id="keyword" class="input-text s" value="<?php echo $var1['keyword'];?>">
                
                    <br>
                    <input type="submit" class="input-submit" name="submit" value="เพิ่มคลิปใหม่">