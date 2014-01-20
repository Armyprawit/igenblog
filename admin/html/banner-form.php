            <div class="headTitle"><i class="fa fa-plus-circle"></i> ป้ายโฆษณาใหม่</div>
            <div class="form">
            <form action="Javascript:createBanner($('#title').val(),$('#image').val(),$('#link').val(),$('#zone').val());">
                <div class="photoInput">
                    <div class="imageResult" id="imageResult"><img src="<?php echo $var['ar_image'];?>"></div>
                    <div class="input">
                        <p><i class="fa fa-camera"></i> ลิ้งรูปภาพ</p>
                        <input type="text" id="image" class="input-text" autocomplete="off" placeholder="ตัวอย่าง: http://www.domain.com/photo.jpg" required onKeyUp="Javascript:loadImage($('#image').val());" value="<?php echo $var['ar_image'];?>">
                    </div>
                </div>

                <p><i class="fa fa-globe"></i> ลิ้งไปยัง</p>
                <input type="text" id="link" class="input-text" autocomplete="off" placeholder="http://igensite.com">
                <div class="text">อย่าน้อย 6 ตัวอักษร</div>

                <p><i class="fa fa-desktop"></i> ZONE</p>
                <select class="input-select s" id="zone">
                    <option value="1">ZONE 1</option>
                    <option value="2">ZONE 2</option>
                    <option value="3">ZONE 3</option>
                    <option value="4">ZONE 4</option>
                    <option value="5">ZONE 5</option>
                    <option value="6">ZONE 6</option>
                </select>

                <p><i class="fa fa-pencil"></i> ข้อความ</p>
                <input type="text" id="title" class="input-text s" placeholder="message...">
                
                <br>
                <input type="submit" class="input-submit" name="submit" value="อัพเดทข้อมูล">
            </form>

            </div>