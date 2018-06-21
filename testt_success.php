<?php
/**
 * Created by PhpStorm.
 * User: Dixin
 * Date: 2018/6/8/008
 * Time: 13:58
 */
header('Content-Type: text/html;charset=utf-8');
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
$exec="insert into dixin.zhongan_table_success VALUES ('','".$_POST['channelOrderNo']."','".$_POST['insuredGender']."','".$_POST['insuredBirthDay']."','".$_POST['insuredCertiNo']."','".$_POST['insuredCertiType']."','".$_POST['insuredUserName']."','".$_POST['insuredPhone']."','".$_POST['premiumPayTime']."','".$_POST['contactMail']."','".$_POST['extraInfo']['birthday']."','".$_POST['extraInfo']['dogCode']."','".$_POST['insureDate']."')";
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
