<?php

namespace Core\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use JMS\Serializer\Annotation as JMS;

/**
 * File
 *
 * @ORM\Table(name="media")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\MediaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Media
{
    /**
     * @var string $id
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @var string $fileName
     * @ORM\Column(name="file_name", type="string", length=255, nullable=true)
     */
    protected $fileName;

    /**
     * @var string $filePath
     * @ORM\Column(name="file_path", type="string", length=45, nullable=true)
     */
    protected $filePath;

    /**
     * @var string $filePath
     * @ORM\Column(name="file_minetype", type="string", length=100, nullable=true)
     */
    protected $mimeType;

    /**
     * @var string $filePath
     * @ORM\Column(name="is_default", type="boolean", nullable=true)
     */
    protected $isDefault;

    /**
     * @var string $fileName
     * @ORM\Column(name="real_name", type="string", length=100, nullable=true)
     */
    protected $realName;

    /**
     * @var string
     */
    private $tempFilename;

    /**
     * @var UploadedFile $file
     */
    protected $file;

    /**
     * File constructor.
     */
    public function __construct()
    {
        $this->isDefault = false;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fileName
     *
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        if ($fileName)
            $this->fileName = $fileName;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set file
     *
     * @param UploadedFile $file
     */
    public function setFile($file)
    {
        if ($file) {
            $this->file = $file;
            try {
                $extension = $file->getClientOriginalExtension();
                $this->fileName = sha1(uniqid(mt_rand(), true)) . '.' . $extension;
                $this->setRealName($file->getClientOriginalName());
                $mimeType = mime_content_type($file->getRealPath());
                $this->mimeType = $mimeType;
            } catch (\Exception $e) {
                dump($e->getMessage());
                die;
            }
        }
    }

    /**
     * Get file
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }


    public function getAbsolutePath()
    {
        return null === $this->fileName ? null : $this->getUploadRootDir() . '/' . $this->fileName;
    }

    public function getRelativePath()
    {
        return null === $this->fileName ? null : $this->getUploadDir() . '/' . $this->fileName;
    }

    public function getUploadRootDir()
    {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    /**
     * @JMS\VirtualProperty("file-url")
     * @JMS\Groups({"Student"})
     * @return null|string
     */
    public function getWebPath()
    {
        if (file_exists($this->getUploadRootDir() . '/' . $this->fileName))
            return null === $this->fileName ? null : '/' . $this->getRelativePath();
        else
            return null;
    }

    protected function getUploadDir()
    {
        $uploadDir = "uploads";

        if ($this->getFilePath()) {
            $uploadDir = DIRECTORY_SEPARATOR . $this->getFilePath();
        }
        return $uploadDir;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null === $this->file) {
            return;
        }
        $this->setFilePath($this->getUploadDir());
        return $this;
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        if (null !== $this->tempFilename) {
            $oldFile = $this->getUploadRootDir() . '/' . $this->id . '.' . $this->tempFilename;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        $a = $this->file->move($this->getUploadRootDir(), $this->fileName);
    }

//    /** Image Resizing Helper
//     * @param $newWidth
//     * @param $newHeight
//     * @return $this|bool
//     */
//    public function resizeImage($file, $newWidth, $newHeight)
//    {
//        $filePath = $file->getUploadRootDir() . "/" . $file->getFileName();
//        $thumbnailPath = $thumbnail->getUploadRootDir() . "/" . $thumbnail->getFileName();
//        fopen($thumbnailPath, "w");
//        copy($filePath, $thumbnailPath);
//        $image = $this->openImage($thumbnailPath);
//        if (!$image)
//            return false;
//
//        list($width, $height) = getimagesize($thumbnailPath);
//        if (($height <= $newHeight) && ($width <= $newWidth)) {
//            $newHeight = $height;
//            $newWidth = $width;
//        } else if (($newHeight / $height) > ($newWidth / $width)) {
//            $newHeight = $height * ($newWidth / $width);
//        } else {
//            $newWidth = $width * ($newHeight / $height);
//        }
//        $out = @imagecreatetruecolor($newWidth, $newHeight);
//        imagecopyresampled($out, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
//
//        return $this->saveImage($out, $thumbnailPath);
//    }

    protected function openImage($file)
    {

        $extension = strrchr($file, '.');
        $extension = strtolower($extension);
        switch ($extension) {
            case '.jpg':
                return @imagecreatefromjpeg($file);
            case '.jpeg':
                return @imagecreatefromjpeg($file);
            case '.gif':
                return @imagecreatefromgif($file);
            case '.png':
                return @imagecreatefrompng($file);
            case '.bmp':
                return @imagecreatefromwbmp($file);
            default:
                return false;
        }
    }

    protected function saveImage($image, $file)
    {
        $extension = strrchr($file, '.');
        $extension = strtolower($extension);
        switch ($extension) {
            case '.jpg':
                return imagejpeg($image, $file);
            case '.jpeg':
                return imagejpeg($image, $file);
            case '.gif':
                return imagegif($image, $file);
            case '.png':
                return imagepng($image, $file);
            case '.bmp':
                return imagewbmp($image, $file);
            default:
                return false;
        }
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        $this->tempFilename = $this->getUploadRootDir() . '/' . $this->fileName;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (file_exists($this->tempFilename)) {
            unlink($this->tempFilename);
        }
    }

    function getRealName()
    {
        return $this->realName;
    }

    function setRealName($realName)
    {
        $this->realName = $realName;
    }

    function getFilePath()
    {
        return $this->filePath;
    }

    function setFilePath($filePath = null)
    {
        $this->filePath = $filePath;
    }

    public function __toString()
    {
        return (String)$this->id;
    }

    public function remove()
    {
        if (file_exists($this->getAbsolutePath())) {
            unlink($this->getAbsolutePath());
        }
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return mixed
     */
    public function getExtension()
    {

        $explode = explode('.', $this->fileName);
        $ext = end($explode);
        return $ext;
    }

    /**
     * @return string
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param string $isDefault
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
    }

    /**
     * @return bool
     */
    public function isPdf()
    {
        if (in_array($this->mimeType, ['application/pdf', 'application/x-pdf'])) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isImage()
    {

        if (in_array($this->mimeType, ['image/png', 'image/jpeg'])) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isVideo()
    {
        if (in_array($this->mimeType, ['video/mp4', 'video/avi', 'video/x-m4v'])) {
            return true;
        }
        return false;
    }

    /**
     * @param $newWidth
     * @param $newHeight
     * @return array
     */
    public function getThumbnailDimensions($oldWidth, $oldHeight, $newWidth, $newHeight)
    {
        $newDimensions = [];

        if (($oldHeight <= $newHeight) && ($oldWidth <= $newWidth)) {
            $newHeight = $oldHeight;
            $newWidth = $oldWidth;
        } else if (($newHeight / $oldHeight) > ($newWidth / $oldWidth)) {
            $newHeight = $oldHeight * ($newWidth / $oldWidth);
        } else {
            $newWidth = $oldWidth * ($newHeight / $oldHeight);
        }
        $newDimensions['width']  = (int)$newWidth;
        $newDimensions['height'] = (int)$newHeight;

        return $newDimensions;
    }
}
