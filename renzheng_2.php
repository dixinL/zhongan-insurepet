<?php
/**
 * Created by PhpStorm.
 * User: Dixin
 * Date: 2018/6/12/012
 * Time: 20:40
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
    die ("数据读取失败");
}
mysql_query("set character set 'utf8'");//读库
mysql_query("set names 'utf8'");//写库
//这个是你要插入的数组
//删除
//$exec="delete from dixin.leagueoflegends where id IN ($i)";
//写入
$messId =$_POST['messageId'];
$exec="select * from dixin.zhongan_table_success where ID = '$messId';";
$result= mysql_query($exec);
if (!$result){
    echo '数据读取失败';
}
else{
    while($row = mysql_fetch_row($result)){
        echo "{'channelOrderNo':'" .$row[1]."','insuredGender':'" .$row[2]."','insuredBirthDay':'" .$row[3]."','insuredCertiNo':'" .$row[4]."','insuredCertiType':'" .$row[5]."','insuredUserName':'" .$row[6]."','insuredPhone':'" .$row[7]."','premiumPayTime':'" .$row[8]."','contactMail':'" .$row[9]."','birthday':'" .$row[10]."','dogCode':'" .$row[11]."','insureDate':'" .$row[12]."'}";
    }
}
//这里是插入数据库的语句
mysql_close($connection);
?>
