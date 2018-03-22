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
    
    

    $one = $_POST['one'];
    $two = $_POST['two'];
    $inpcontent = $_POST['inpcontent'];
    if ($one=="已处理") {
        $table = 'already_handle_order';
        if ($two=="按订单号"){
            $way = 'order_num';
        }
        else if($two=="按烟草名"){
            $way = 'goods_name';
        }
        else if($two=="按订货人"){
            $way = 'orderer';
        }
    }
    else if ($one=="未处理") {
       $table = 'no_handle_order';
        if ($two=="按订单号"){
            $way = 'order_num';
        }
        else if($two=="按烟草名"){
            $way = 'goods_name';
        }
        else if($two=="按订货人"){
            $way = 'orderer';
        }
    }
    else if ($one=="退货单"){
        $table = 'return_order';
        if ($two=="按订单号"){
            $way = 'order_num';
        }
        else if($two=="按烟草名"){
            $way = 'goods_name';
        }
        else if($two=="按订货人"){
            $way = 'orderer';
        }
    }
    $sql = "SELECT * FROM $table WHERE $way = '$inpcontent' ";
    $res = $mysqli->query($sql);
    function result($result){
        $arr = array();
        if ($result->num_rows > 0) {
            // 输出每行数据
            while($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        } else {
            $arr = array('status' => 0, 'msg' => '无数据');
        }
        return $arr;
    }
    function row($result){
        $row = $result->fetch_array();
        return $row;
    }
    $rs = result($res);
    echo json_encode($rs);

?>










