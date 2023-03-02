<div class="owl-slider">
    <div class="item">
        <!-- ============================ -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php for($i=0;$i<$number;$i++){?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $i?>" class="<?php echo $i==0?'active':'';?>"></li>
<?php }?>
<!--                <li data-target="#myCarousel" data-slide-to="1"></li>-->
<!--                <li data-target="#myCarousel" data-slide-to="2"></li>-->
<!--                <li data-target="#myCarousel" data-slide-to="3"></li>-->
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php foreach ($arr as $rows){?>
                <div class="item <?php echo $rows->pk_slide_id==1?'active':''?>"><img src="../../<?php echo $rows->c_img?>"
                                              alt="<?php echo $rows->c_name?>"></div>
                <?php }?>
<!--                <div class="item"><img src="../../public/frontend/images/slideshow1221b.jpg"-->
<!--                                       alt="Los Angeles"></div>-->
<!--                <div class="item"><img src="../../public/frontend/images/chicago.jpg" alt="Chicago">-->
<!--                </div>-->
<!--                <div class="item"><img src="../../public/frontend/images/ny.jpg" alt="New York"></div>-->
            </div>

            <!-- Left and right controls -->
        </div>
        <!-- ============================ -->
    </div>
</div>