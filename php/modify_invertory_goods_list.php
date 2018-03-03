<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');
    // 连接数据库名称
    $mysql_conf = array(
        'host'    => '127.0.0.1', 
        'db'      => 'tobaccosystem', 
        'db_user' => 'root', 
        'db_pwd'  => '', 
        );
    $mysqli = @new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
    //诊断连接错误
    if ($mysqli->connect_errno) {
        die("could not connect to the database:\n" . $mysqli->connect_error);
    }
    $mysqli->query("set names 'utf8';");
    //连接数据库
    $select_db = $mysqli->select_db($mysql_conf['db']);
    if (!$select_db) {
        die("could not connect to the db:\n" .  $mysqli->error);
    }
    // 定义变量，接收前端传过来的参数值
    $name = $_POST['name'];
    $number1 = $_POST['number1'];
    $inprice = $_POST['inprice'];
    $sell_price = $_POST['sell_price'];
    $profit = $_POST['profit'];
    $profitall = $_POST['profitall'];
    $goods_address = $_POST['goods_address'];
    $type1 = $_POST['type1'];
    $type2 = $_POST['type2'];
    $supplier_name = $_POST['supplier_name'];
    $supplier_phone = $_POST['supplier_phone'];
    $supplier_address = $_POST['supplier_address'];
    $add_person = $_POST['add_person'];
    // 更改烟草数据信息
    $result = $mysqli->query("UPDATE invertory_goods_list SET number1='$number1',in_price='$inprice',sell_price='$sell_price',profit='$profit',profit_all='$profitall',good_address='$goods_address',type1='$type1',type2='$type2',supplier_name='$supplier_name',supplier_phone='$supplier_phone',supplier_address='$supplier_address',add_person='$add_person' WHERE name="."'$name'");
    // 判断影响的行数
    $rs = mysqli_affected_rows($mysqli);
    // 没影响
    if (!$rs) {
      $arr = array('status' => 2, 'msg' => '更改失败');//插入失败
      echo json_encode($arr);
    }
    // 影响了
    else {
      $arr = array('status' => 1, 'msg' => '更改成功');//插入成功
      echo json_encode($arr);
    }
?>










