<?php

class bulletinModel extends model {

    public function getBulletinData($name = '') {
        $dir = dirname(__FILE__) . '/data/';
        if ($name) {
            $data = @file_get_contents($dir . $name . '.data');
            return unserialize($data);
        } else {
            $handle = opendir($dir . ".");
            $array_data = array();
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != ".." && pathinfo($file, PATHINFO_EXTENSION) == 'data') {
                    $data = @file_get_contents($dir . $file);
                    $k = pathinfo($file, PATHINFO_FILENAME);
                    $array_data["$k"] = unserialize($data);
                }
            }
            closedir($handle);
            krsort($array_data);
            return $array_data;
        }
    }

}