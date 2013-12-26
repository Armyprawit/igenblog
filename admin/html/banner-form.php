            <div class="headTitle"><i class="fa fa-plus-circle"></i> เพิ่มหมวดหมู่ใหม่</div>
            <div class="form">
            <form action="Javascript:formCategory('create',0,document.getElementById('title').value,document.getElementById('url').value,document.getElementById('description').value,document.getElementById('keyword').value,document.getElementById('image').value);">
                <p>ลิ้งรูปภาพ</p>
                <input type="text" name="link" id="link" class="input-text" autocomplete="off" autofocus required onKeyUp="Javascript:loadImage($('#link').val());">
                <div class="text">อย่าน้อย 6 ตัวอักษร</div>

                <div id="imageResult"></div>

                <p>ลิ้งรูปภาพ</p>
                <input type="text" name="title" id="title" class="input-text" autocomplete="off" autofocus required onKeyUp="Javascript:loadImage($('#link').val());">
                <div class="text">อย่าน้อย 6 ตัวอักษร</div>

                <p>ลิ้งออก</p>
                <input type="text" name="linkTo" id="linkTo" class="input-text" autocomplete="off" autofocus required onKeyUp="Javascript:loadImage($('#link').val());">
                <div class="text">อย่าน้อย 6 ตัวอักษร</div>

                <p>ZONE</p>
                <select class="input-select" id="category">
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                </select>
                
                <br>
                <input type="submit" class="input-submit" name="submit" value="อัพเดทข้อมูล">
            </form>

            </div>