<?
	require_once($_SERVER['DOCUMENT_ROOT']."/inc/oa_config.php");
	include_once( "utility_file.php" );

	//?MODULE=TDLIB&YM=1103&ATTACHMENT_ID=113270745&ATTACHMENT_NAME=0000.jpg
	$MODULE				= $_GET['MODULE'];
	$YM					= $_GET['YM'];
	$ATTACHMENT_ID		= $_GET['ATTACHMENT_ID'];
	$ATTACHMENT_NAME	= $_GET['ATTACHMENT_NAME'];

	$FB_STR1 = urldecode( $ATTACHMENT_NAME );
	if ( strstr( $FB_STR1, "/" ) || strstr( $FB_STR1, "\\" ) )
	{
		exit( );
	}


	$ATTACHMENT_ID_OLD = $ATTACHMENT_ID;
	$ATTACHMENT_ID = attach_id_decode( $ATTACHMENT_ID, $ATTACHMENT_NAME );
	$MYOA_ATTACHMENT_NAME = $ATTACHMENT_NAME;
	if ( $MODULE != "" && $YM != "" )
	{
		$URL = $ATTACH_PATH2.$MODULE."/".$YM."/".$ATTACHMENT_ID.".".$ATTACHMENT_NAME;
	}
	else
	{
		$URL = $ATTACH_PATH.$ATTACHMENT_ID."/".$ATTACHMENT_NAME;
	}
	//print $ATTACHMENT_ID;
	if ( !file_exists( $URL ) )
	{
		if ( $MODULE == "" && $YM == "" )
		{
			$ATTACHMENT_ID = ( $ATTACHMENT_ID_OLD - 2 ) / 3;
			$URL = $ATTACH_PATH.$ATTACHMENT_ID."/".$ATTACHMENT_NAME;

			if ( !file_exists( $URL ) )
			{
				echo "�ļ�����".$MYOA_ATTACHMENT_NAME."<br>��Ǹ���������ʵ��ļ������ڣ������Ѿ���ɾ����ת�ƣ�����ϵOA����Ա��<br>";
				button_back();
				exit( );
			}
		}
		else
		{
			echo "�ļ�����".$MYOA_ATTACHMENT_NAME."<br>��Ǹ���������ʵ��ļ������ڣ������Ѿ���ɾ����ת�ƣ�����ϵOA����Ա��<br>";
			button_back();
			exit( );
		}
	}
	$file_ext = strtolower( substr( $MYOA_ATTACHMENT_NAME, strpos( $MYOA_ATTACHMENT_NAME, "." ) ) );
	if ( $DIRECT_VIEW )
	{
		switch ( $file_ext )
		{
			case ".jpg" :
			case ".bmp" :
			case ".gif" :
			case ".png" :
			case ".wmv" :
			case ".html" :
			case ".htm" :
			case ".wav" :
			case ".mid" :
			case ".mht" :
				$COTENT_TYPE = 0;
				$COTENT_TYPE_DESC = "application/octet-stream";
				break;
			case ".pdf" :
				$COTENT_TYPE = 0;
				$COTENT_TYPE_DESC = "application/pdf";
				break;
			case ".swf" :
				$COTENT_TYPE = 0;
				$COTENT_TYPE_DESC = "application/x-shockwave-flash";
				break;
			default :
				$COTENT_TYPE = 1;
				$COTENT_TYPE_DESC = "application/octet-stream";
				break;
		}
	}
	else
	{
		$COTENT_TYPE = 1;
		$COTENT_TYPE_DESC = "application/octet-stream";
	}
	ob_end_clean( );
	header( "Cache-control: private" );
	header( "Content-type: {$COTENT_TYPE_DESC}" );
	header( "Accept-Ranges: bytes" );
	header( "Accept-Length: ".filesize( $URL ) );
	if ( $COTENT_TYPE == 1 )
	{
		header( "Content-Disposition: attachment; filename={$MYOA_ATTACHMENT_NAME}" );
	}
	else
	{
		header( "Content-Disposition: filename={$MYOA_ATTACHMENT_NAME}" );
	}
	readfile( $URL );
?>
