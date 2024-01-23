<?php
    $open = "product";
    require_once ("../../autoload/autoload.php");
    $product = $db->fetchALL("product");

    if(isset($_GET['page']))
    {
        $p=$_GET['page'];
    }
    else
    {
        $p=1;
    }
    $sqlcategory = "SELECT product.*,category.name as namecate, tacgia.name as nametacgia, nxb.name as namenxb,cotyphathanh.name as namecongty  FROM product
                    LEFT JOIN category on category.id = product.category_id LEFT JOIN tacgia on tacgia.id = product.id_tacgia LEFT JOIN nxb on nxb.id = product.id_nxb
                    LEFT JOIN cotyphathanh on cotyphathanh.id = product.id_cotyphathanh";

    $product = $db->fetchJone('product',$sqlcategory,$p,4,true);
    if(isset($product['page']))
    {
        $sotrang= $product['page'];
        unset($product['page']);
    }
?>

<!--header-->
<?php require_once ("../../layouts/header.php"); ?>
        <!-- Begin Page Content -->
<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Đây là trang quản trị của admin</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
          <!-- Content Row -->
          <!-- Content Row -->
          <!-- Content Row -->
</div>
        <!-- /.container-fluid -->
<div class="container-fluid">
    <?php if(isset($_SESSION['success'])) : ?>
                        <div class="alert alert-success alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?> 
                        </div>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?> 
                        </div>
                     <?php endif; ?>
    <div class="card-header py-3">
       
        <div class="m-0 font-weight-bold text-primary">
            <a href="add.php" class="btn btn-primary btn-user">Thêm sản phẩm</a> 
        </div>

    </div>
    <div class="table-responsive">
        <table class="table table-bordered" style="width: 150%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sách</th>
                    <th>Giá sách</th>
                    <th>Giảm giá</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Tên tác giả</th>
                    <th>Nhà xuất bản</th>
                    <th>Công ty phát hành</th>
                    <th>Kích thước</th>
                    <th>Loại bìa</th>
                    <th>Số trang</th>
                    <th>SKU</th>
                    <th>Video</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php $stt=1; foreach ($product as $item) : ?>
                <tr>
                    <td><?php echo $stt  ?></td>
                    <td ><?php echo $item['name'] ?></td>
                    <td><?php echo $item['price'] ?></td>
                    <td><?php echo $item['sale'] ?></td>
                    <td>
                        <img src="/WebBanSach/public/uploads/product/<?php echo $item['thunbar'] ?>" width="150px" height="200px">
                    </td>
                    <td><?php echo $item['soluong'] ?></td>
                    <td><?php echo $item['namecate'] ?></td>
                    <td><?php echo $item['nametacgia'] ?></td>
                    <td><?php echo $item['namenxb'] ?></td>
                    <td><?php echo $item['namecongty'] ?></td>

                    <td><?php echo $item['kichthuoc'] ?></td>
                    <td><?php echo $item['loaibia'] ?></td>
                    <td><?php echo $item['sotrang'] ?></td>
                    <td><?php echo $item['sku'] ?></td>
                    <td><?php echo $item['video'] ?></td>
                    <td>
                         <a href="edit.php?id= <?php echo $item['id'] ?> " class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                                              <i class="fas fa-info-circle"></i>
                                            </span>
                            <span class="text">Sửa</span>
                        </a>
                    </td>
                    <td>
                         <a href="delete.php?id= <?php echo $item['id'] ?> " class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                                              <i class="fas fa-trash"></i>
                                            </span>
                            <span class="text">Xóa</span>
                        </a>
                    </td>

                </tr>
                <?php $stt++;  endforeach; ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
            </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">

                                <li class="<?php echo ($i==$p) ? 'active' : '' ?>" ><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                </li>
                                <?php for( $i= 1; $i<=$sotrang; $i++) : ?>
                                <?php
                                    if(isset($_GET['page']))
                                    {
                                        $p=$_GET['page'];
                                    } 
                                    else
                                    {
                                        $p = 1;
                                    }
                                ?>
                                <li class="<?php echo ($i==$p) ? 'active' : '' ?>">
                                    <a href="?page=<?php echo $i; ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i; ?></a>
                                </li>
                                <?php endfor; ?>
                                <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
        </div>
    </div>
</div>


<!-- End of Main Content -->

<!-- Footer -->
<?php require_once ("../../layouts/footer.php"); ?>