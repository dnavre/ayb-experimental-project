<?php
/**
 * Created by PhpStorm.
 * User: Vahik
 * Date: 02.05.2015
 * Time: 13:00
 */

class ImageResizeConfig {
    private $width;
    private $height;
    private $transparent;


    /**
     *@return int New Image Height
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height Set New Image Height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return bool New Image Transparent
     */
    public function getTransparent()
    {
        return $this->transparent;
    }

    /**
     * @param bool $transparent Set New Image transparent
     */
    public function setTransparent($transparent)
    {
        $this->transparent = $transparent;
    }

    /**
     * @return int New Image Width
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width Set New Image Width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }



} 