<?php 
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }


    
    public function upload($path, $name)
    {
        if ($this->validate()) {
            //$this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);

            FileHelper::createDirectory('uploads/' . $path . '/');
            $this->imageFile->saveAs('uploads/' . $path . '/' . $name);

            return true;
        } else {
            return false;
        }
    }
}

?>