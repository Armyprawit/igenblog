            <div class="headTitle"><i class="fa fa-plus-circle"></i> เพิ่มหมวดหมู่</div>
            <div class="form">
            <form action="Javascript:formCategory('create',0,document.getElementById('title').value,document.getElementById('url').value,document.getElementById('description').value,document.getElementById('keyword').value,document.getElementById('image').value);">
                <p>ชื่อหมวดหมู่</p>
                <input type="text" name="title" id="title" class="input-text" autocomplete="off" placeholder="ใส่ชื่อหมวดที่นี่" required>
                <div class="text">* อย่าน้อย 6 ตัวอักษร</div>
                
                <p>ลิ้งหมวดหมู่</p>
                <input type="text" name="url" id="url" class="input-text" autocomplete="off" required placeholder="ห้ามเว้นวรรค , หรือใช้ - หรือ _ แทนเว้นวรรค">
                <div class="text">* ตัวอย่าง food, mobile-review, people_awesome</div>

                <p>รายละเอียด</p>
                <textarea name="description" id="description" class="input-area" placeholder="เพิ่มรายละเอียดที่นี่..."></textarea>
                <div class="text">* รายละเอียดจะมีผลกับ SEO</div>

                <p>คำสำคัญ</p>
                <input type="text" name="keyword" id="keyword" class="input-text">
                <div class="text">ตัวอย่าง: ดินสอ,ดินสอสี,น้ำยาล้างจาน</div>
                
                <p>ลิ้งรูปภาพประจำหมวด</p>
                <input type="url" name="image" id="image" class="input-text" id="url" onKeyUp="JavaScript:resultPostImage(document.getElementById('url').value)" placeholder="http://igensite.com/image/logo.png">
                <div class="text">* อย่าน้อย 6 ตัวอักษร</div>
                
                <br>
                <input type="submit" class="input-submit" name="submit" value="อัพเดทข้อมูล">
            </form>

            </div>