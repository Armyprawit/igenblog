            <div class="headTitle"><?php echo $var['ch_username'];?> <span id="loading" class="loading"></span> <span id="setting" class="setting"></span> <div id="process"></div></div>
            <div class="form" id="updateResult">
            	<select id="category" class="input-select s">
                    <?php $category->listCategoryToSelectForm($dbHandle,10000,0);?>
                </select>

                <select id="status" class="input-select s">
                    <option value="0">ฉบับร่าง</option>
                    <option value="1">เผยแพร่ทันที</option>
                </select>

                <select id="http" class="input-select s">
                    <option value="0">http</option>
                    <option value="1" selected>https</option>
                </select>

            	<div class="toProcess start" onClick="Javascript:updateVideoYoutube('<?php echo $var['ch_username'];?>',$('#http').val(),$('#category').val(),$('#status').val(),1,1);$('#updateResult').html('');"><i class="fa fa-refresh"></i> อัพเดท <?php echo $var['ch_username'];?></div>
            </form>

            </div>