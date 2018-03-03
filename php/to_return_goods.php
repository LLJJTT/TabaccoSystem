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
    // 接收订单号/商品id/订货量
    $order_number = $_POST['order_number'];
    $gid = $_POST['gid'];
    $order_quantity = $_POST['order_quantity'];
    $order_type = $_POST['order_type'];

    // 更新库存(库存+退货)
    $sql3 = "UPDATE invertory_goods_list SET number1 = number1 +'$order_quantity' WHERE id=$gid";
    $result3 = $mysqli->query($sql3);

    // 未处理表data 更新到 已处理表中的data
    $sql1 = "INSERT INTO already_handle_order(order_num,date,goods_name,order_quantity,unit_price,orderer,order_amount,address,contact,remarks,gid) SELECT order_num,date,goods_name,order_quantity,unit_price,orderer,order_amount,address,contact,remarks,gid  FROM return_order WHERE order_num=$order_number";
    $result1 = $mysqli->query($sql1);

    // 修改已处理订单类型
    $sql4 = "UPDATE already_handle_order SET type = '$order_type' WHERE order_num=$order_number";
    $result4 = $mysqli->query($sql4);
    
    // 删除未处理表中data
    $sql2 = "DELETE FROM return_order WHERE order_num=$order_number";
    $result = $mysqli->query($sql2);

    // 给前端返回数据，前端判断状态1或0
    if ($result === TRUE && $result1 === TRUE){
      $arr = array('status' => 1, 'msg' => '删除成功');
      echo json_encode($arr);
    } 
    else {
      $arr = array('status' => 0, 'msg' => '删除失败');
      echo json_encode($arr);
    }
?>










