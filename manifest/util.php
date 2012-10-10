<?php 
//更具配置信息，读取文件列表
function listFiles($sources, &$updateTime, $webroot = '../', $url = ''){
	$r = array();
	foreach($sources as $s){
		$r = array_merge($r, getFiles($webroot.'/'.$s, $updateTime, $url.'/'.$s));
	}
	return $r;
}
//读取文件列表
function getFiles($fileName, &$updateTime = 0, $url = '', $levels = 100, $types = array('jpg', 'png', 'gif', 'jpeg', 'css', 'js')){
	if(empty($fileName) || !$levels){
		return false;
	}
	$files = array();
	if(is_file($fileName)){
		$updateTime = getMax(filectime($fileName), $updateTime);
		$files[] = $url;
	}else if($dir = @opendir($fileName)){
		while(($file = readdir($dir)) !== false){
			if(in_array($file, array('.', '..')))
				continue;
			if(is_dir($fileName.'/'.$file)){
				$files2 = getFiles($fileName.'/'.$file, $updateTime, $url.'/'.$file, $levels - 1);
				if($files2){
					$files = array_merge($files, $files2);
				}
			}else{
				$updateTime = getMax(filectime($fileName.'/'.$file), $updateTime);
				$type = end(explode(".", $file));
				if(in_array($type, $types)){
					$files[] = $url.'/'.$file;
				}
			}
		}
	}
	@closedir($dir);
//	echo date("Y-m-d H:i:s",$updateTime).'<hr>';
	return $files;
}
//打印缓存文件列表
function echoFiles($files){
		for($i = 0; $i < count($files); $i++){
			echo $files[$i].'
';//后面加一个换行
		}
}
//取较大的更新时间
function getMax($a, $b){
	return $a < $b ? $b : $a;
}