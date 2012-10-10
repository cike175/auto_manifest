<?php 
	require_once 'util.php';
	//配置信息
	$webroot = '../';
	$urlroot = '';
	//需要缓存的目录和文件(目录内的所有文件都将被输出)
	$sources = array(
		'img',
		'js/test.js',
		'css',
		'/index.html',
	);
	
	$updateTime = 0;
	$files = listFiles($sources, $updateTime, $webroot, $urlroot);
?>
CACHE MANIFEST 
# version <?php echo $updateTime;?>

CACHE:
<?php echoFiles($files);?>

NETWORK:
*

FALLBACK:
