<?php if(count($_SESSION["cart"])>0){?>
<h1>Hóa Đơn Thanh Toán</h1>
<form method="post" action="index.php?controller=checkout&&act=pay" style="margin-top: 20px">
    <label>Ho Ten: </label> <label><?php echo $customer->hovaten?></label>
    <br>
    <br>
    <label>Dia Chi: </label> <label><?php echo $customer->diachi?></label>
    <div class="template-cart">
        <form action="index.php?controller=cart&act=update" method="post">
            <div class="table-responsive">
                <table class="table table-cart">
                    <thead>
                    <tr>
                        <th class="image">Ảnh sản phẩm</th>
                        <th class="name">Tên sản phẩm</th>
                        <th class="price">Giá bán lẻ</th>
                        <th class="quantity">Số lượng</th>
                        <th class="price">Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $totalnumber =0;
                    $totalprice = 0;
                    $eachprice = 0;
                    foreach ($_SESSION["cart"] as $key => $value){
                        $eachprice = $value["quantity"]*$value["price"];
                        $totalprice += $eachprice;
                        $totalnumber+=$value["quantity"]
                        ?>
                        <tr>
                            <td><img src="public/upload/product/<?php echo $value["img"]?>" class="img-responsive" /></td>
                            <td><a href="index.php?controller=product_detail&id=<?php echo $value["code"]?>"><?php echo $value["name"]?></a></td>
                            <td> <?php echo number_format($value["price"],0,'','.')?>₫ </td>
                            <td><?php echo $value["quantity"]?></td>
                            <td><p><b><?php echo number_format($eachprice,0,'','.')?>₫</b></p></td>
                        </tr>
                        <?php
                    }?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6"><a href="index.php?controller=cart" class="button pull-left">Huy Don hang</a>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </form>
        <div class="total-cart"> Tổng tiền thanh toán:
            <?php echo "Tổng Hàng:".$totalnumber?>
            <?php echo "Tổng Tiền:".number_format($totalprice,0,'','.')?>₫ <br>
           <input type="submit" value="Thanh Toan Hoa Don"></div>
    </div>
</form>
<?php }else{
    echo "<h1>Thanh Toan Thanh Cong</h1>
                <br>
                <a href='index.php'class='button pull-left black'>Tiếp tục mua hàng</a> 
                    ";
}?>