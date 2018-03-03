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
    // 查找数据库是否添加过
    $result = $mysqli->query("select * from invertory_goods_list where name="."'$name'");
    $rs = $result->fetch_row();
    if ($rs!=null){
      $arr = array('status' => 0, 'msg' => '香烟已存在');
      echo json_encode($arr);
    }
    else{
      $sql = "INSERT INTO invertory_goods_list (name,number1,in_price,sell_price,profit,profit_all,good_address,type1,type2,supplier_name,supplier_phone,supplier_address,add_person) VALUES ('$name', '$number1','$inprice','$sell_price','$profit','$profitall','$goods_address', '$type1', '$type2', '$supplier_name', '$supplier_phone', '$supplier_address','$add_person')";
      $rs = $mysqli->query($sql);
      if (!$rs) {
        $arr = array('status' => 2, 'msg' => '添加失败');//插入失败
        echo json_encode($arr);
      }
      else {
        $arr = array('status' => 1, 'msg' => '添加成功');//插入成功
        echo json_encode($arr);
      }
    }
?>










