<h1>Tin tức</h1>
<div class="wrapper-blog">
    <!-- list news -->
    <div class="row">
        <?php if($num_page > 0){
            foreach ($arr as $rows){?>
            <div class="col-md-6 article"> <a href="index.php?controller=news_detail&id=<?php echo $rows->pk_news_id?>" class="image"> <img src="public/upload/news/<?php echo $rows->c_img?>" alt="<?php echo $rows->c_name?>" title="<?php echo $rows->c_name?>" class="img-responsive"> </a>
                <h3><a href="index.php?controller=news_detail&id=<?php echo $rows->pk_news_id?>"><?php echo $rows->c_name?></a></h3>
                <p class="date"></p>
                <p class="desc"></p>
            </div>
        <?php }
        }?>

<!--        <div class="col-md-6 article"> <a href="/lg-ra-mat-loat-tv-oled-4k-tich-hop-hdr-tai-ces-2016" class="image"> <img src="public/frontend/images/tvlg.jpg" alt="LG ra mắt loạt TV OLED 4K tích hợp HDR tại CES 2016" title="LG ra mắt loạt TV OLED 4K tích hợp HDR tại CES 2016" class="img-responsive"> </a>-->
<!--            <h3><a href="/lg-ra-mat-loat-tv-oled-4k-tich-hop-hdr-tai-ces-2016">LG ra mắt loạt TV OLED 4K tích hợp HDR tại CES 2016</a></h3>-->
<!--            <p class="date">08/01/2016</p>-->
<!--            <p class="desc"></p>-->
<!--        </div>-->
<!--        <div class="col-md-6 article"> <a href="/lg-ra-mat-loat-tv-oled-4k-tich-hop-hdr-tai-ces-2016" class="image"> <img src="public/frontend/images/tvlg.jpg" alt="LG ra mắt loạt TV OLED 4K tích hợp HDR tại CES 2016" title="LG ra mắt loạt TV OLED 4K tích hợp HDR tại CES 2016" class="img-responsive"> </a>-->
<!--            <h3><a href="/lg-ra-mat-loat-tv-oled-4k-tich-hop-hdr-tai-ces-2016">LG ra mắt loạt TV OLED 4K tích hợp HDR tại CES 2016</a></h3>-->
<!--            <p class="date">08/01/2016</p>-->
<!--            <p class="desc"></p>-->
<!--        </div>-->
<!--        <div class="col-md-6 article"> <a href="/lg-ra-mat-loat-tv-oled-4k-tich-hop-hdr-tai-ces-2016" class="image"> <img src="public/frontend/images/tvlg.jpg" alt="LG ra mắt loạt TV OLED 4K tích hợp HDR tại CES 2016" title="LG ra mắt loạt TV OLED 4K tích hợp HDR tại CES 2016" class="img-responsive"> </a>-->
<!--            <h3><a href="/lg-ra-mat-loat-tv-oled-4k-tich-hop-hdr-tai-ces-2016">LG ra mắt loạt TV OLED 4K tích hợp HDR tại CES 2016</a></h3>-->
<!--            <p class="date">08/01/2016</p>-->
<!--            <p class="desc"></p>-->
<!--        </div>-->
    </div>
    <!-- end list news -->

    <ul class="pagination pull-right" style="margin-top: 0px !important">

        <li><a href="#">Trang</a></li>
        <?php for($i=1;$i<=$num_page;$i++){?>
            <li><a href="index.php?controller=news&p=<?php echo $i?>"><?php echo $i?></a></li>
        <?php }?>
    </ul>
</div>
        