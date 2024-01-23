
<?php 
    require_once("layouts/header.php");
    $sumprice=0;
?>
        <div class="col-md-9 bor">
            <section class="box-main1">
                <h3 class="title-main"><a href=""> Giỏ hàng của bạn</a></h3>
                <?php if(isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success alert-dismissable"> 
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?> 
                    </div>
                <?php endif; ?>
                <table class="table table">
                    <?php if(isset($_SESSION['cart'])) : ?>
                    <thead>
                            <tr>
                                <th >Hình ảnh</th> 
                                <th>Thông tin sản phẩm</th>
                                <th>Số lượng </th>
                                <th>Tổng tiền</th>

                            </tr>
                    </thead>
                <?php endif; ?>
                    <tbody >
                        <?php if(isset($_SESSION['cart'])) :?>
                            <?php foreach ($_SESSION['cart'] as $key => $value) :?>
                                <tr>
                                    <td width="120px" height="120px" >
                                        <a href="detail.php?id=<?php echo$key;?>"><img src="public/uploads/product/<?php echo$value['thunbar']?>" width="100px" height="120px"> </a>
                                    </td>
                                    <td width="350px">
                                        <a href="detail.php?id=<?php echo$key;?>"><h4><?php echo $value['name'] ?></h4></a>
                                        <p>Tác giả: <i style="color: #1BA8FF"><?php echo$value['nametacgia']; ?></i></p>
                                        <p><h5><?php echo formatPricesale($value['price'],$value['sale']) ?>đ</h5></p>
                                        <p><strike class="sale"><?php echo formatPrice($value['price']) ?> đ </strike> | -<?php echo $value['sale']; ?>%</p>
                                        <pre style="display: block;font-size: 5px;font-family: monospace;white-space: pre;margin: 0px; border: none;background-color: white;">
                                            
                                        </pre>
                                        <a href="xoagiohang.php?id=<?php echo$key ?>"><h5>Xóa</h5></a>
                                    </td>
                                    <th>
                                        <input type="number" name="qty" value="<?php echo $value['qty'] ?>" class="form-control" id="qty" min=0  >

                                        <pre style="display: block;font-size: 5px;font-family: monospace;white-space: pre;margin: 0px; border: none;background-color: white;"></pre>
                                        <a href="#" class="updatecart" data-key=<?php echo $key ?>><h5>Cập nhật</h5></a>
                                    </th>
                                    <th><?php echo formatPrice($value['qty'] * $value['pricesale']) ?> đ</th>
                                </tr>
                                <?php $sumprice += $value['qty'] * $value['pricesale']; $_SESSION['tongtien'] = $sumprice; ?>
                            <?php endforeach; ?>
                        <?php else :?>

                            <tr>
                                <td><img src="/WebBanSach/public/uploads/product/khongcosanpham.png" style="width: 100%"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><a href="/WebBanSach/" class="btn btn-warning" >Tiếp tục mua hàng</a></td>
                            </tr>
                        <?php endif; ?>    
                    </tbody>
                </table>
                <?php if(!empty($_SESSION['cart'])) :?>
                <div class="col-md-5 pull-right"  >
                    <ul class="list-group" >
                        <li class="list-group-item">
                            <h3>Thông tin đơn hàng</h3>
                        </li>
                        <li class="list-group-item" >
                            <span class="badge"><?php echo formatPrice($_SESSION['tongtien']); ?>đ</span>
                            <h4>Tạm tính</h4>    
                        </li>
                        
                        <li class="list-group-item">
                            <span class="badge"><?php echo formatPrice($_SESSION['tongtien']); ?>đ</span>
                            <h4>Thành tiền</h4> 
                            <i >(Đã bao gồm VAT nếu có)</i>
                            
                        </li>
                        <li class="list-group-item">
                            <a href="index.php" class="btn btn-success">Tiếp tục mua hàng</a>
                            <a href="thanhtoan.php" class="btn btn-success">Thanh toán</a>
                            
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
            </section>
        </div>
        

    </div>
    
            
   
<?php require_once("layouts/footer.php") ?>         
