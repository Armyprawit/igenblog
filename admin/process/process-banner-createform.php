<?php
	include'../class/setting.php';
?>
		    <div class="headTitle"><i class="fa fa-plus-circle"></i> รูปภาพใหม่</div>
            <div class="form">
            <form action="Javascript:createBanner($('#title').val(),$('#image').val(),$('#link').val(),$('#zone').val());">
                <div class="photoInput">
                    <div class="imageResult" id="imageResult"><img src="<?php echo $var['ar_image'];?>"></div>
                    <div class="input">
                        <p><i class="fa fa-camera"></i> ลิ้งรูปภาพ</p>
                        <input type="text" id="image" class="input-text" autocomplete="off" placeholder="ตัวอย่าง: http://www.domain.com/photo.jpg" autofocus required onKeyUp="Javascript:loadImage($('#image').val());" value="<?php echo $var['ar_image'];?>">
                    </div>
                </div>

                <p>ลิ้งออก</p>
                <input type="text" id="link" class="input-text" autocomplete="off">
                <div class="text">อย่าน้อย 6 ตัวอักษร</div>

                <p>ZONE</p>
                <select class="input-select s" id="zone">
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">C</option>
                    <option value="4">D</option>
                </select>

                <p><i class="fa fa-tag"></i> คำสำคัญ</p>
                <input type="text" id="title" class="input-text s" placeholder="ดินสอ,ดินสอสี,น้ำยาล้างจาน">
                
                <br>
                <input type="submit" class="input-submit" name="submit" value="อัพเดทข้อมูล">
            </form>

            </div>