	<header id="header">
        <div class="header">
            <a href="index.php">
            <div id="logo">
                <i class="fa fa-leaf"></i> IGENBLOG
            </div>
            </a>
            <div id="stat">
                
                <div class="item">
                    <i class="fa fa-search"></i> <span class="text"><?php echo $analytic->pageViewData($dbHandle,1)?> VIEW</span>
                </div>
                
                <div class="item">
                    <i class="fa fa-clock-o"></i> <span class="text" id="clock">&nbsp;</span>
                </div>

                <div class="item">
                    <i class="fa fa-desktop"></i> <span class="text">50 WEB</span>
                </div>
                <div class="item">
                    <i class="fa fa-mobile"></i> <span class="text">64 MOBILE</span>
                </div>
            </div>
        </div>
    </header>