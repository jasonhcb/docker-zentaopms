<?php
class manualModel extends model
{
	public function setMenu()
    {
        common::setMenuVars($this->lang->manual->menu, 'name', array($this->app->company->name));
    }
	
   public function create(){
       $title=$this->post->title;
       $content =$this->post->content;
       $manual->title=$title;
       $manual->content=$content;
       $manual->creater=$this->app->user->realname;
       $manual->time=Date('Y-m-d H:i:s');
       $manual->editer= $manual->creater;
       $manual->edittime= $manual->time;
       $dir=dirname(__FILE__).'/data/';
       if(!file_exists($dir))  mkdir($dir);
       $data=json_encode($manual);
       $filename=$dir.'/'.time().'.data';
       $res=@file_put_contents($filename , $data);
       return $res;
   }

   public function getManuals($name=''){
    $dir = dirname(__FILE__).'/data/';
    if(file_exists($dir)){
         if($name){
           $data = @file_get_contents($dir.$name.'.data');
           return json_decode($data);
         }else{
            $handle=opendir($dir);
            $array_manuals = array();
            while( ($file=readdir($handle)) !== false ){
                if ($file != "." && $file != ".." && pathinfo($file, PATHINFO_EXTENSION)=='data'){
                    $data = @file_get_contents($dir.$file);
                    $k = pathinfo($file, PATHINFO_FILENAME);
                    $array_manuals[$k] = json_decode($data);
                }

            }
            closedir($handle);
            krsort($array_manuals);
            return $array_manuals;
         }
     }

   }

   public function update($name){
       $filePath = dirname(__FILE__).'/data/'.$name.'.data';
       $predata= @file_get_contents($filePath);
       
       $manual=json_decode($predata);
       $manual->title=$this->post->title;
       $manual->content=$this->post->content;
       $manual->editer=$this->app->user->realname;
       $manual->edittime=Date('Y-m-d H:i:s');
       $data=json_encode($manual);
       $res=@file_put_contents($filePath , $data);
       return $res;
   }

   public function delete($name){
     $filePath = dirname(__FILE__).'/data/'.$name.'.data';
     $res=unlink($filePath);
     return $res;
   }

}
