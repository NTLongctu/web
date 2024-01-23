<?php
    $open = "product";
    require_once ("../../autoload/autoload.php");
    $category = $db->fetchALL("category");
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $error = [];
        if(postInput('name')=='')
        {
            $error['name'] = "Hãy nhập tên sách!";
        }
        if(postInput('gia')=='')
        {
            $error['gia'] = "Hãy nhập giá sách!";
        }
        if(!isset($_FILES['thunbar']))
        {
            $error['thunbar'] = "Bạn chưa chọn hình!";
        }
        if(postInput('soluong')=='')
        {
            $error['soluong'] = "Hãy nhập số lượng sách!";
        }
        if(postInput('id_tacgia')=='')
        {
            $error['id_tacgia'] = "Hãy nhập tên tác giả sách!";
        }
        if(postInput('id_nhaxuatban')=='')
        {
            $error['id_nhaxuatban'] = "Hãy nhập nhà xuất bản!";
        }
        if(postInput('id_Congtyohathanh')=='')
        {
            $error['id_Congtyohathanh'] = "Hãy nhập công ty phát hành sách!";
        }
        if(postInput('kichthuoc')=='')
        {
            $error['kichthuoc'] = "Hẫy nhập kích thước!";
        }
        if(postInput('loaibia')=='')
        {
            $error['loaibia'] = "Hãy nhập loại bìa!";
        }
        if(postInput('sotrang')=='')
        {
            $error['sotrang'] = "Hãy nhập số trang!";
        }
        if(postInput('sku')=='')
        {
            $error['sku'] = "Hãy nhập mã SKU của sản phẩm!";
        }
        if(postInput('link')=='')
        {
            $error['link'] = "nhập link từ youtube!";
        }
        if(postInput('mota')=='')
        {
            $error['mota'] = "hãy viết mô tả!";
        }
        /*$isset = $db -> fetchOne("product","name = '".$data['name']."'");
        if(count($isset)>0)
        {
            $_SESSION['error'] = "Thêm thất bại tên danh mục đã tồn tại!  ";
        }*/
        
        $tg = ["name" => postInput('id_tacgia')];//ten phía dưới
        $nxb = ["name" => postInput('id_nhaxuatban')];
        $cy = ["name" => postInput('id_Congtyohathanh')];
        if(empty($error))
        {
            $kttacgia = $db -> fetchOne("tacgia","name = '".postInput('id_tacgia')."'");
            if(empty($kttacgia))
            {
                $insert = $db->insert("tacgia",$tg);
            }
            $kttacgia = $db -> fetchOne("tacgia","name = '".postInput('id_tacgia')."'");
            $id_tacgia = layid($kttacgia);


            $ktnxb = $db -> fetchOne("nxb","name = '".postInput('id_nhaxuatban')."'");
            if(empty($ktnxb))
            {
                $insert = $db->insert("nxb", $nxb);
            }
            $ktnxb = $db -> fetchOne("nxb","name = '".postInput('id_nhaxuatban')."'");
            $id_nhaxuatban = layid($ktnxb);



            $ktcongty = $db -> fetchOne("cotyphathanh","name = '".postInput('id_Congtyohathanh')."'");
            if(empty($ktcongty))
            {
                $insert = $db->insert("cotyphathanh", $cy);
            }
            $ktcongty = $db -> fetchOne("cotyphathanh","name = '".postInput('id_Congtyohathanh')."'");
            $id_Congtyohathanh = layid($ktcongty);

            $data =
            [
                "name" => postInput('name'),
                "price" => postInput('gia'),
                "sale" => postInput('sale'),
                "thunbar" => postInput('thunbar'),
                "soluong"=>postInput('soluong'),
                "category_id" =>postInput('category_id'),
                "id_tacgia"=> $id_tacgia,
                "id_nxb"=>$id_nhaxuatban,
                "id_cotyphathanh" =>$id_Congtyohathanh,
                "kichthuoc"=>postInput('kichthuoc'),
                "loaibia" => postInput('loaibia'),
                "sotrang" => postInput('sotrang'),
                "sku" => postInput('sku'),
                "video" => postInput('link'),
                "content" => postInput('mota'),

            ];
            if(isset($_FILES['thunbar']))
            {
                $file_name = $_FILES['thunbar']['name'];
                $file_tmp = $_FILES['thunbar']['tmp_name'];
                $file_type = $_FILES['thunbar']['type'];
                $file_erro = $_FILES['thunbar']['error'];

                if($file_erro == 0 )
                {
                    $part = ROOT."product/";
                    $data['thunbar'] = $file_name;
                }
            }

            $id_insert = $db->insert("product",$data);
            if($id_insert)
            {
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION['success'] = "Thêm mới thành công! ";
                redirectAdmin("product");
            } 
            else
            {
                $_SESSION['error'] = "Thêm mới thất bại! ";
                redirectAdmin("product");

            }



        }
       
    }
?>

<!--header-->
<?php require_once ("../../layouts/header.php"); ?>
<div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
       <div class="container">
        <?php if(isset($_SESSION['success'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?> 
                        </div>
                     <?php endif; ?>
    <h2>thêm sản phẩm mới</h2>
    <form action="" class="needs-validation" method="POST" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Tên sách:</label>
                        <input type="text" class="form-control"  placeholder="Nhập tên sách."  name='name'>
                        <?php if(isset($error['name'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error['name']; unset($error['name']); ?> 
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label >Giá sản phẩm:</label>
                        <input type="number" class="form-control"  placeholder="Nhập giá sách." name='gia'>
                        <?php if(isset($error['gia'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error['gia']; unset($error['gia']); ?> 
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label >sale:</label>
                        <input type="text" class="form-control"  placeholder="Nhập giá giảm VD:10%." name='sale'>
                    </div>
                    <div class="form-group">
                        <label >Chọn hình</label>
                        <input type="file" class="form-control" name="thunbar">
                        <?php if(isset($error['thunbar'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error['thunbar']; unset($error['thunbar']); ?> 
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label >Số lượng:</label>
                        <input type="text" class="form-control"  placeholder="Nhập số lượng." name='soluong'>
                        <?php if(isset($error['soluong'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error['soluong']; unset($error['soluong']); ?> 
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        
                        <label >Chọn danh mục sản phẩm:</label>
                        <select class="form-control" name="category_id" >
                           <?php foreach ($category as $item) : ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    
                    </div>
                    
                    <div class="form-group">
                        <label >Tên tác giả:</label>
                        <input type="text" class="form-control"  placeholder="Nhập tên tác giả." name='id_tacgia'>
                        <?php if(isset($error['id_tacgia'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error['id_tacgia']; unset($error['id_tacgia']); ?> 
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Nhà xuất bản:</label>
                        <input type="text" class="form-control"  placeholder="Nhập tên nhà xuất bản." name='id_nhaxuatban'>
                        <?php if(isset($error['id_nhaxuatban'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error['id_nhaxuatban']; unset($error['id_nhaxuatban']); ?> 
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label >Công ty phát hành:</label>
                        <input type="text" class="form-control"  placeholder="Nhập công ty phát hành." name='id_Congtyohathanh'>
                        <?php if(isset($error['id_Congtyohathanh'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error['id_Congtyohathanh']; unset($error['id_Congtyohathanh']); ?> 
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label >Kích thước:</label>
                        <input type="text" class="form-control"  placeholder="Nhập kích thước." name="kichthuoc">
                        <?php if(isset($error['kichthuoc'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error['kichthuoc']; unset($error['kichthuoc']); ?> 
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label >Loại bìa:</label>
                        <input type="text" class="form-control"  placeholder="Nhập loại bìa." name="loaibia">
                        <?php if(isset($error['loaibia'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error['loaibia']; unset($error['loaibia']); ?> 
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label >Số trang</label>
                        <input type="number" class="form-control"  placeholder="Nhập số trang." name="sotrang">
                        <?php if(isset($error['sotrang'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error['sotrang']; unset($error['sotrang']); ?> 
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label >SKU:</label>
                        <input type="text" class="form-control"  placeholder="Nhập SKU." name="sku">
                        <?php if(isset($error['sku'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error['sku']; unset($error['sku']); ?> 
                        </div>
                        <?php endif; ?>
                    </div>
                   
                    <div class="form-group">
                        <label >Nhập link từ youtube:</label>
                        <input type="text" class="form-control"  placeholder="Nhúng link:" name="link">
                        <?php if(isset($error['link'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error['link']; unset($error['link']); ?> 
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
                <div class="form-group">
                      <label for="comment">nhập mô tả :</label>
                      <textarea class="form-control" rows="5" placeholder="Nhập mô tả sản phẩm." name="mota"></textarea>
                      <?php if(isset($error['mota'])) : ?>
                        <div class="alert alert-danger alert-dismissable"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error['mota']; unset($error['mota']); ?> 
                        </div>
                        <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </div>
            </div>
    </form>
</div>
    </div>
</div>

<!-- Footer -->
<?php require_once ("../../layouts/footer.php"); ?>