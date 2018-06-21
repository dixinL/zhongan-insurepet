
<?php
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
$exec="select * from dixin.zhongan_table";
$result= mysql_query($exec);
if (!$result){
    echo '数据读取失败';
}
else{
    while($row = mysql_fetch_row($result)){
        echo "<button type=\"button\" class=\"btn btn-default choose\" onclick='recoverMessage($row[0])'>$row[1]</button>";
    }
}
//这里是插入数据库的语句
mysql_close($connection);
?>
