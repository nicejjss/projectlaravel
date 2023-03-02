<?php if(isset($_SESSION["customer_id"])){
    ?>
    <div class="wrapper-mini-cart"> <span class="icon"><i class="fa fa-shopping-cart"></i></span> <a href="index.php?controller=cart"> <span class="mini-cart-count"> <?php echo $totalpro>0?$totalpro:"";?> </span> sản phẩm <i class="fa fa-caret-down"></i></a>
        <div class="content-mini-cart">
            <?php if($totalpro>0){?>
            <div class="has-items">
                <ul class="list-unstyled">
                    <?php foreach ($_SESSION["cart"] as $value){?>
                    <li class="clearfix" id="item-1853038">
                        <div class="image"> <a href="index.php?controller=product_detail&id=<?php echo $value['code']?>"> <img alt="<?php echo $value['name']?>" src="public/upload/product/<?php echo $value['img']?>" title="<?php echo $value['name']?>" class="img-responsive"> </a> </div>
                        <div class="info">
                            <h3><a href="index.php?controller=product_detail&id=<?php echo $value['code']?>"><?php echo $value['name']?></a></h3>
                            <p><?php echo $value['quantity']?> x <?php echo number_format($value["price"],0,'','.')?>₫</p>
                        </div>
                        <div> <a href="index.php?controller=cart&act=delete&id=<?php echo $value['code']?>"> <i class="fa fa-times"></i></a> </div>
                    </li>
                     <?php }?>
                </ul>
                <a href="index.php?controller=checkout" class="button">Thanh toán</a>
            </div>
            <?php } else{ ?>
                <p>khong Co San Pham Nao </p>
            <?php   }?>
        </div>
    </div>
<?php }
    else { ?>
        <div class="wrapper-mini-cart"> <span class="icon"><i class="fa fa-shopping-cart"></i></span> <a href="index.php?controller=cart"> <span class="mini-cart-count"> <?php echo $totalpro>0?$totalpro:"";?> </span> sản phẩm <i class="fa fa-caret-down"></i></a>
            <div class="content-mini-cart">
                <?php if($totalpro>0){?>
                    <div class="has-items">
                        <ul class="list-unstyled">
                            <?php foreach ($_SESSION["cart"] as $value){?>
                                <li class="clearfix" id="item-1853038">
                                    <div class="image"> <a href="index.php?controller=product_detail&id=<?php echo $value['code']?>"> <img alt="<?php echo $value['name']?>" src="public/upload/product/<?php echo $value['img']?>" title="<?php echo $value['name']?>" class="img-responsive"> </a> </div>
                                    <div class="info">
                                        <h3><a href="index.php?controller=product_detail&id=<?php echo $value['code']?>"><?php echo $value['name']?></a></h3>
                                        <p><?php echo $value['quantity']?> x <?php echo number_format($value["price"],0,'','.')?>₫</p>
                                    </div>
                                    <div> <a href="index.php?controller=cart&act=delete&id=<?php echo $value['code']?>"> <i class="fa fa-times"></i></a> </div>
                                </li>
                            <?php }?>
                        </ul>
                        <a href="index.php?controller=checkout" class="button">Thanh toán</a>
                    </div>
                <?php } else{ ?>
                    <p>Phai Dang Nhap De Mua HAng</p>
                <?php   }?>
            </div>
        </div>

    <?php    }?>


