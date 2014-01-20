<?php
	include'../class/setting.php';
    $var = $facebookpage->getFeedData($dbHandle,$_POST['id']);
?>
			<div class="headTitle"><i class="fa fa-plus-circle"></i> คลิปวิดีโอใหม่</div>
            <div class="form">
            <form action="Javascript:createVideo($('#link').val(),$('#category').val(),$('#title').val(),$('#textArea').val(),$('#keyword').val());">

                <p><i class="fa fa-youtube-play"></i> ลิ้งวิดีโอ <span id="loading"></span></p>

                <input type="text" name="link" id="link" placeholder="Youtube, Vimeo, Dailymotion" class="input-text" autocomplete="off" required value="<?php echo $var['ff_id'];?>">
                <div class="text"><i class="fa fa-hand-o-right"></i> ตัวอย่าง : http://www.youtube.com/watch?v=9xOl9dfZMcE</div>

                <div class="image">
                    <div class="item"><img src="<?php echo $var['ff_picture'];?>"></div>
                </div>

                <br>
                <input type="submit" class="input-submit" name="submit" value="เพิ่มคลิปใหม่">

                <p>คลิปวิดีโอ</p>
                <input type="text" name="title" id="title" class="input-text" autocomplete="off" required value="<?php echo $var['ff_message'];?>">
                <textarea id="textArea" class="input-area animated"><?php echo $var['ff_message'];?></textarea>
                <?php include'../html/editor.php';?>

                <p>หมวดหมู่</p>
                <select class="input-select s" id="category">
                    <?php $category->listCategoryToSelectForm($dbHandle,0,0);?>
                </select>

                <p>คำสำคัญ</p>
                <input type="text" name="keyword" id="keyword" class="input-text s" value="<?php echo $var1['keyword'];?>">
                
                
            </form>

            </div>