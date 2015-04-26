<?

class FileHelper
{
    /**
     * @param $path
     * @param string $extension
     * @return string
     */
    public static function getRandomFileName($path, $extension = '', $create = false)
    {
        $extension = $extension ? '.' . $extension : '';
        $path = $path ? $path . '/' : '';

        if($create && !file_exists($path)) {
            mkdir($path, 0777, true);
        }

        do {
            $name = md5(microtime() . rand(0, 9999));
            $file = $path . $name . $extension;
        } while (file_exists($file));

        return $name;
    }

    /**
     * upload image
     * @param $file
     * @return bool
     */
    public static function upload_image($path,$file)
    {
        $directory = mt_rand(0, 5);

        //определение имени файла
        $extension = mb_strtolower($file->extensionName);
        $filename = FileHelper::getRandomFileName(Yii::app()->baseUrl . $path . $directory . '/', $extension, true);
        $filename = $directory . '/' . $filename . '.' . $extension;

        return ($file->saveAs(Yii::app()->params['imgPath'] . $filename)) ? $filename : false;
    }
}