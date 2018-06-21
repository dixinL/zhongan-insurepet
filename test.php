<?php
$img = GrabImage("$_POST[name]", "");
if ($img):echo 'true';
//如果返回值为真，这显示已经采集到服务器上的图片
else:echo "false";
endif;
//否则，输出采集失败


function GrabImage($url, $filename = "") {
    if ($url == ""):return false;
    endif;
    //如果$url地址为空，直接退出
    //echo '<img src="' . $url. '.pdf">';
    if ($filename == "") {
        //如果没有指定新的文件名
        $ext = strrchr($url, ".");
        //echo '<img src="' . $ext. '.pdf">';
        //得到$url的图片格式
        //if ($ext != ".gif" && $ext != ".jpg"):return false;
        //endif;
        //如果图片格式不为.gif或者.jpg，直接退出
        $filename = 'insurance_policy/'.date("YMdHis") . '.pdf';
        //用天月面时分秒来命名新的文件名
    }
    ob_start();//打开输出
    readfile($url);//输出图片文件
    $img = ob_get_contents();//得到浏览器输出
    ob_end_clean();//清除输出并关闭
    $size = strlen($img);//得到图片大小
    $fp2 = @fopen($filename, "a");
    fwrite($fp2, $img);//向当前目录写入图片文件，并重新命名
    fclose($fp2);





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
//写入
    $exec="insert into dixin.zhonganimg VALUES ('','".$filename."')";
    $result= mysql_query($exec);
    if (!$result){
        echo '保存失败';
    }
    else{
        $exec1="select * from dixin.zhonganimg where Imgsrc = '".$filename."'";
        $result= mysql_query($exec1);
        if (!$result){
            echo '保存失败';
        }
        else{
            echo '<img src="' . $filename. '">保存成功';
        }
    }

//这里是插入数据库的语句
    mysql_close($connection);

    return $filename;//返回新的文件名

}

?>
