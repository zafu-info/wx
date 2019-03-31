<?php
/*
PHPqrCode��һ��PHP��ά��������⣬�����������������ɶ�ά�룬�����ṩ�����غͶ����ʾdemo��

�鿴��ַ��http://phpqrcode.sourceforge.net/��
    ���ع����ṩ������ֻ��Ҫʹ��phpqrcode.php�Ϳ������ɶ�ά���ˣ���Ȼ����PHP�������뿪��֧��GD2�� phpqrcode.php�ṩ��һ���ؼ���png()���������в���$text��ʾ���ɶ�λ�ĵ���Ϣ�ı�������$outfile��ʾ�Ƿ������ά��ͼƬ �ļ���Ĭ�Ϸ񣻲���$level��ʾ�ݴ��ʣ�Ҳ�����б����ǵ�������ʶ�𣬷ֱ��� L��QR_ECLEVEL_L��7%����M��QR_ECLEVEL_M��15%����Q��QR_ECLEVEL_Q��25%����H��QR_ECLEVEL_H��30%���� ����$size��ʾ����ͼƬ��С��Ĭ����3������$margin��ʾ��ά����Χ�߿�հ�������ֵ������$saveandprint��ʾ�Ƿ񱣴��ά�벢 ��ʾ��



����PHP qrCode�ǳ��򵥣����´��뼴������һ������Ϊ"http://www.****.cn"�Ķ�ά��.
 */

include 'PHPqrCode/phpqrcode.php';  //����phpqrcode���ļ�

$value = 'http://www.sinosg.com.cn/wx/index.php?sbNum=2019010101'; //��ά������

$errorCorrectionLevel = 'L';//�ݴ�����

$matrixPointSize = 6;//����ͼƬ��С

//���ɶ�ά��ͼƬ

QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);

$logo = 'logo.png';//׼���õ�logoͼƬ  ��Ҫ���뵽��ά���е�logo

$QR = 'qrcode.png';//�Ѿ����ɵ�ԭʼ��ά��ͼ



if ($logo !== FALSE) {

    $QR = imagecreatefromstring(file_get_contents($QR));

    $logo = imagecreatefromstring(file_get_contents($logo));

    $QR_width = imagesx($QR);//��ά��ͼƬ����

    $QR_height = imagesy($QR);//��ά��ͼƬ�߶�

    $logo_width = imagesx($logo);//logoͼƬ����

    $logo_height = imagesy($logo);//logoͼƬ�߶�

    $logo_qr_width = $QR_width / 5;

    $scale = $logo_width/$logo_qr_width;

    $logo_qr_height = $logo_height/$scale;

    $from_width = ($QR_width - $logo_qr_width) / 2;

//�������ͼƬ��������С

    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,

        $logo_qr_height, $logo_width, $logo_height);

}

//���ͼƬ

imagepng($QR, 'helloweba.png');

echo '<img src="helloweba.png">';

?>