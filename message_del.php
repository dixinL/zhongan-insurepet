<?php
/**
 * Created by PhpStorm.
 * User: Dixin
 * Date: 2018/6/12/012
 * Time: 13:03
 */

$channelOrderNo = $_POST['channelOrderNo'];

$host="localhost";
$username="root";
$password="1234";

$connection= mysql_connect ($host, $username, $password);

if (!$connection) {
    die ("数据库连接失败");
}

$result=mysql_select_db ("dixin");

if (! $result) {
    die ("保存失败，请重试");
}
mysql_query("set character set 'utf8'");//读库
mysql_query("set names 'utf8'");//写库
//这个是你要插入的数组
//删除
$exec="delete from dixin.zhongan_table where channelOrderNo = '$channelOrderNo';";
$result= mysql_query($exec);
if (!$result){
    echo '删除失败';
}
else{
    echo '';
}
//这里是插入数据库的语句
mysql_close($connection);
?>
