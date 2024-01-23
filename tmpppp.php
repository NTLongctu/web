<?php 
    $sqlthang1 = " SELECT MONTH(ngaylap) as thang ,tongtien FROM hd  ";
    $t = $db->fetchsql($sqlthang1);
    $t1=0;$t2=0;$t3=0;$t4=0;$t5=0;$t6=0;$t7=0;$t8=0;$t9=0;$t10=0;$t11=0;$t12=0;
    _debug($t);
    foreach ($t as $item) {
        if($item['thang']== 1)
            $t1+=$item['tongtien'];
        if($item['thang']== 2)
            $t2+=$item['tongtien'];
        if($item['thang']== 3)
            $t3+=$item['tongtien'];
        if($item['thang']== 4)
            $t4+=$item['tongtien'];
        if($item['thang']== 5)
            $t4+=$item['tongtien'];
        if($item['thang']== 6)
            $t6+=$item['tongtien'];
        if($item['thang']== 7)
            $t7+=$item['tongtien'];
        if($item['thang']== 8)
            $t8+=$item['tongtien'];
        if($item['thang']== 9)
            $t9+=$item['tongtien'];
        if($item['thang']== 10)
            $t10+=$item['tongtien'];
        if($item['thang']== 11)
            $t11+=$item['tongtien'];
        if($item['thang']== 12)
            $t12+=$item['tongtien'];

    }
    $datamonth = [$t1,$t2,$t3,$t4,$t5,$t6,$t7,$t8,$t9,$t10,$t11,$t12];
    _debug($datamonth); 
    $sql ="SELECT * FROM users WHERE id =".$_SESSION['name_id']." ";
    $users =$db->fetchsql($sql);
?>