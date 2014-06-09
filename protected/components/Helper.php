<?php
// protected/components/Helper.php

class Helper {

     private $metaData = array(
        'title' => 'Budimo Ljudi - Pomozimo onima kojima je pomoć potrebna',
        'description' => 'Servis za organizovanje volonterskih akcija pomoći ugroženom stanovništvu',
        'keywords' => 'volonter, pomoc, humanost, akcija pomoci',
        'image' => 'social-thumb.jpg',
        'url' => 'http://budimoljudi.com',
    );

    public function getMeta()
    {
        return $this->metaData;
    }

    public function setMeta($newMeta)
    {
        $this->metaData['title'] = ($newMeta['title'])?$newMeta['title']:$this->metaData['title'];
    }
}