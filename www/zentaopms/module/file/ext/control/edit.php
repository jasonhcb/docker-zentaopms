<?php
 /**
 * 
 */
include '../../control.php';
 class myFile extends file
 {
 	
    public function edit($fileID)
    {
        if($_POST)
        {
            
            $this->app->loadLang('action');
            $file = $this->file->getByID($fileID);
            
            $titles = $this->dao->select('title,extension')->from(TABLE_FILE)->where('objectID')->eq($file->objectID)->andWhere('objectType')->eq($file->objectType)->andWhere('deleted')->eq(0)->fetchAll();
            $arrtitle = array();
            if($this->post->fileName != $file->title){
            	foreach ($titles as $key => $val) {
            		$arrtitle[] = $val->title.'.'.$val->extension;
            	}
 
            	if(in_array($this->post->fileName.'.'.$file->extension , $arrtitle)){
                   echo js::alert($this->lang->file->rename);
                   die();            		
            	}
            }
           
            $this->dao->update(TABLE_FILE)->set('title')->eq($this->post->fileName)->where('id')->eq($fileID)->exec();

            $extension = "." . $file->extension;
            $actionID = $this->loadModel('action')->create($file->objectType, $file->objectID, 'editfile', '', $this->post->fileName . $extension);
            $changes[] = array('field' => 'fileName', 'old' => $file->title . $extension, 'new' => $this->post->fileName . $extension);
            $this->action->logHistory($actionID, $changes);

            die(js::reload('parent.parent'));
        }

        $this->view->file = $this->file->getById($fileID);
        $this->display();
    }
 }

?>