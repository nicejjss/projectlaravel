<?php
//    if(isset($_SESSION["cart"])){
//        foreach ($_SESSION["cart"] as $key => $item) {
//            print_r($key);
//      }
//    }

    if(isset($_SESSION["customer_id"])){

    if(isset($_SESSION["cart"]))
    {
        if(count($_SESSION["cart"])>0){
?>
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
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $totalnumber=0;
                   $totalprice = 0;
                   $eachprice = 0;
                foreach ($_SESSION["cart"] as $key => $value){
                    $eachprice = $value["quantity"]*$value["price"];
                    $totalprice += $eachprice;
                    $totalnumber+=$value["quantity"];
                   ?>
                    <tr>
                        <td><img src="public/upload/product/<?php echo $value["img"]?>" class="img-responsive" /></td>
                        <td><a href="index.php?controller=product_detail&id=<?php echo $value["code"]?>"><?php echo $value["name"]?></a></td>
                        <td> <?php echo  number_format($value["price"],0,'','.')?>₫ </td>
                        <td><input type="number" id="qty" min="1" class="input-control" value="<?php echo $value["quantity"]?>" name="<?php echo $key?>" required="Không thể để trống"></td>
                        <td><p><b><?php echo number_format($eachprice,0,'','.')?>₫</b></p></td>
                        <td><a href="index.php?controller=cart&act=delete&id=<?php echo $value["code"]?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php
                }?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6"><a href="index.php?controller=cart&act=destroy" class="button pull-left">Xóa toàn bộ</a> <a href="index.php" class="button pull-right black">Tiếp tục mua hàng</a>
                        <input type="submit" class="button pull-right" value="Cập nhật"></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </form>
    <div class="total-cart"> Tổng thanh toán:
        <?php echo "Tổng Hàng:".$totalnumber?>
        <?php echo "Tổng Tiền:".number_format($totalprice,0,'','.')?>₫ <br>
        <a href="index.php?controller=checkout" class="button black">Thanh toán</a>
    </div>
</div>
<?php
        }
        else echo "<h1>Bạn Chưa Có Sản Phẩm Trong Giỏ Hàng</h1>";
    } else echo "<h1>Bạn Chưa Có Sản Phẩm Trong Giỏ Hàng</h1>";}
    else echo "<h1>Phải Đăng Nhập Để Mua Hàng </h1>";
?>