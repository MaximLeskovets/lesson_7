<?php
    function isPost()
    {
        if (!empty($_POST)) {
            return true;
        }
    }

    function isGet()
    {
        if (!empty($_GET)) {
            return true;
        }
    }

    function getNameFiles()
    {
        $path = 'json';
        $dir = opendir("$path");
        $i = 1;
        while (false !== ($file = readdir($dir))) {
            if (strpos($file, '.json', 1)) {
                $i++;
            }
        }
        return $i;
    }

    function getResult($i)
    {
        if (file_exists("json/$i.json")) {
            $json = file_get_contents("json/$i.json");
            $profiles = json_decode($json, true);
            echo "Вопрос : " . $profiles['question'] . "<br/>";
            echo "Ответ : " . $profiles['answer'] . "<br/>";
        }else{
            echo "Вопроса с таким айди не существует<br/>";
        }
    }
    function renderCapcha($name){
        header ('Content-Type: image/png');
        $im = imagecreatetruecolor(400, 240);
        $bg = imagecolorallocate($im, 100, 150, 100);
        $text_color = imagecolorallocate($im, 0, 14, 91);
        $fontFile = __DIR__ . '/asset/font.ttf';
        imagefill($im,0,0,$bg);
        imagettftext($im, 18, 0, 100, 80, $text_color, $fontFile, "Поздравляем $name");
        imagettftext($im, 14, 0, 50, 120, $text_color, $fontFile, "С успешным прохождением теста");
        imagepng($im);
        imagedestroy($im);
    }