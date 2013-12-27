            <div class="headTitle">#<?php echo $var['ba_id']+1024;?></span> - <i class="fa fa-quote-left"></i> <?php echo $var['ba_title'];?> <i class="fa fa-quote-right"></i></div>

            <div class="form">
            <form action="Javascript:editBanner(<?php echo $var['ba_id'];?>,$('#title').val(),$('#image').val(),$('#link').val(),$('#zone').val());">
                <div class="photoInput">
                    <div class="imageResult" id="imageResult"><img src="<?php echo $var['ar_image'];?>"></div>
                    <div class="input">
                        <p><i class="fa fa-camera"></i> ลิ้งรูปภาพ</p>
                        <input type="text" id="image" class="input-text" autocomplete="off" placeholder="ตัวอย่าง: http://www.domain.com/photo.jpg" autofocus required onKeyUp="Javascript:loadImage($('#image').val());" value="<?php echo $var['ba_image'];?>">
                    </div>
                    <script type="text/javascript">
                        loadImage($('#image').val());
                    </script>
                </div>

                <p>ลิ้งออก</p>
                <input type="text" id="link" class="input-text" autocomplete="off" value="<?php echo $var['ba_link'];?>">
                <div class="text">อย่าน้อย 6 ตัวอักษร</div>

                <p>ZONE</p>
                <select class="input-select s" id="zone">
                    <option value="1" <?php if($var['ba_zone'] == 1){echo'selected';}?>>A</option>
                    <option value="2" <?php if($var['ba_zone'] == 2){echo'selected';}?>>B</option>
                    <option value="3" <?php if($var['ba_zone'] == 3){echo'selected';}?>>C</option>
                    <option value="4" <?php if($var['ba_zone'] == 4){echo'selected';}?>>D</option>
                </select>

                <p><i class="fa fa-tag"></i> คำสำคัญ</p>
                <input type="text" id="title" class="input-text s" placeholder="ดินสอ,ดินสอสี,น้ำยาล้างจาน" value="<?php echo $var['ba_title'];?>">
                
                <br>
                <input type="submit" class="input-submit" name="submit" value="อัพเดทข้อมูล">
            </form>

            </div>