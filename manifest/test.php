<?php 
	require_once 'util.php';
	//������Ϣ
	$webroot = '../';
	$urlroot = '';
	//��Ҫ�����Ŀ¼���ļ�(Ŀ¼�ڵ������ļ����������)
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
