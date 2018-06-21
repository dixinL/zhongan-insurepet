<?php
/**
 * Created by PhpStorm.
 * User: Dixin
 * Date: 2018/6/6/006
 * Time: 17:22
 */
header('Content-Type: text/html;charset=utf-8');
//生成24位唯一号码，格式：YYYY-MMDD-HHII-SS-NNNN,NNNN-CC，其中：YYYY=年份，MM=月份，DD=日期，HH=24格式小时，II=分，SS=秒，NNNNNNNN=随机数，CC=检查码
@date_default_timezone_set("PRC");
//生成日期
$order_date = date('Y-m-d');
//生成号码主体（YYYYMMDDHHIISSNNNNNNNN）
$order_id_main = date('YmdHi') .'S'. rand(10000000,99999999);
//生成号码主体长度
$order_id_len = strlen($order_id_main);
$order_id_sum = 0;
for($i=0; $i<$order_id_len; $i++){
    $order_id_sum += (int)(substr($order_id_main,$i,1));
}
//唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
$order_id = $order_id_main .'S'. str_pad((100 - $order_id_sum % 100) % 100,2,'0',STR_PAD_LEFT);
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
//$exec="delete from dixin.leagueoflegends where id IN ($i)";
//写入
$exec="insert into dixin.zhongan_table VALUES ('','".$order_id."','".$_POST['insuredGender']."','".$_POST['insuredBirthDay']."','".$_POST['insuredCertiNo']."','".$_POST['insuredCertiType']."','".$_POST['insuredUserName']."','".$_POST['insuredPhone']."','".$_POST['premiumPayTime']."','".$_POST['contactMail']."','".$_POST['birthday']."','".$_POST['dogCode']."','".$_POST['insureDate']."')";
$result= mysql_query($exec);
if (!$result){
    echo '保存失败';
}
else{
    echo '保存成功';
}
//这里是插入数据库的语句
mysql_close($connection);
?>
