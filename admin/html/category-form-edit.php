            <div class="headTitle">#<?php echo $var['ca_id'].' : '.$var['ca_title'];?></div>
            <div class="form">
            <form action="Javascript:formCategory('edit',<?php echo $var['ca_id'];?>,document.getElementById('title').value,document.getElementById('url').value,document.getElementById('description').value,document.getElementById('keyword').value,document.getElementById('image').value);">
                <p>ชื่อหมวด</p>
                <input type="text" name="title" id="title" class="input-text" autocomplete="off" required placeholder="ใส่ชื่อหมวดที่นี่" value="<?php echo $var['ca_title'];?>">
                <div class="text">* อย่าน้อย 6 ตัวอักษร</div>
                
                <p>ลิ้งหมดวหมู่</p>
                <input type="text" name="url" id="url" class="input-text" autocomplete="off" required value="<?php echo $var['ca_url'];?>" disabled placeholder="ห้ามเว้นวรรค , หรือใช้ - หรือ _ แทนเว้นวรรค">
                <div class="text">* ตัวอย่าง food, mobile-review, people_awesome</div>

                <p>รายละเอียด</p>
                <textarea name="description" id="description" class="input-area" placeholder="เพิ่มรายละเอียดที่นี่..."><?php echo $var['ca_description'];?></textarea>
                <div class="text">* รายละเอียดจะมีผลกับ SEO</div>

                <p>คำสำคัญ</p>
                <input type="text" name="keyword" id="keyword" class="input-text" value="<?php echo $var['ca_keyword'];?>">
                <div class="text">ตัวอย่าง: ดินสอ,ดินสอสี,น้ำยาล้างจาน</div>
                
                <p>ลิ้งรูปภาพประจำหมวด</p>
                <input type="url" name="image" id="image" class="input-text" id="url" onKeyUp="JavaScript:resultPostImage(document.getElementById('url').value)" placeholder="http://igensite.com/image/logo.png">
                <div class="text">* อย่าน้อย 6 ตัวอักษร</div>
                
                <br>
                <input type="submit" class="input-submit" name="submit" value="อัพเดทข้อมูล">
            </form>

            </div>