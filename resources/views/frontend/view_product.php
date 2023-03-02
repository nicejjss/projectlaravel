<div class="special-collection">
    <div class="tabs-container">
        <div class="clearfix">
            <h2>Danh Mục: <?php echo $cate_name?></h2>
        </div>
    </div>
    <div class="tabs-content row">
        <div id="content-tabb1" class="content-tab content-tab-proindex" style="display:none">
            <div class="clearfix">
                <?php
                if($num_page > 0 ){
                foreach($arr as $rows)
                {
                    ?>
                    <div class="col-xs-6 col-md-3 col-sm-6 ">
                        <div class="product-grid" id="product-1168979">
                            <div class="image">
                                <a href="index.php?controller=product_detail&id=<?php echo $rows->pk_product_id ?>">
                                    <?php if($rows->c_img != "" && file_exists("public/upload/product/".$rows->c_img)){ ?>
                                        <img title="Sản phẩm ..." alt="Sản phẩm 2" class="img-responsive" src="public/upload/product/<?php echo $rows->c_img; ?>" style="max-width: 100px;">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="info">
                                <h3 class="name"><a href="index.php?controller=product_detail&id=<?php echo $rows->pk_product_id ?>"><?php echo $rows->c_name; ?></a></h3>
                                <p class="price-box"> <span class="special-price"> <span class="price product-price">  <?php echo number_format( $rows->c_price, 0, '', '.');?>₫</span> </span> </p>
                                <div class="action-btn">
                                    <form action="cart/add" method="post" enctype="multipart/form-data" id="product-actions-1168979">
                                        <a href="index.php?controller=product_detail&id=<?php echo $rows->pk_product_id ?>" class="button">Chọn sản phẩm</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                <!-- end box product -->
                <!-- paging -->
                <div style="clear: both;"></div>
                <ul class="pagination pull-right" style="margin-top: 0px !important; padding-right: 15px;">
                    <li><a href="#">Trang</a></li>
                    <?php
                    for($i = 1; $i <= $num_page; $i++)
                    {
                        ?>
                        <li><a href="index.php?controller=product&act=category&id=<?php echo $id?>&name=Sữa%20Vinamilk&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } }
                    else{
                        echo  "<h1>Không có sản phẩm trong Danh Mục này </h1>";
                    }
                    ?>

                </ul>
                <!-- end box product -->

            </div>
        </div>
    </div>
</div>

