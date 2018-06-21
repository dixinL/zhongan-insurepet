<?php
/**
 * Created by PhpStorm.
 * User: Dixin
 * Date: 2018/6/8/008
 * Time: 14:33
 */
$regCode=$_POST['registration_code'];
if ($regCode=='1a2b3c4d'){
    $host="localhost";
    $username="root";
    $password="1234";

    $connection= mysql_connect ($host, $username, $password);

    if (!$connection) {
        die ("数据库连接失败");
    }

    $result=mysql_select_db ("dixin");

    if (! $result) {
        die ("注册失败，请重试");
    }
    mysql_query("set character set 'utf8'");//读库
    mysql_query("set names 'utf8'");//写库
//这个是你要插入的数组
//删除
//$exec="delete from dixin.leagueoflegends where id IN ($i)";
//写入
    $exec="insert into dixin.zhongan_user VALUES ('','".$_POST['userName']."','".$_POST['passWord']."')";
    $result= mysql_query($exec);
    if (!$result){
        echo '注册失败';
    }
    else{
        echo '注册成功';
    }
//这里是插入数据库的语句
    mysql_close($connection);
}else{
 echo '注册码错误，请重新输入';
}
?>