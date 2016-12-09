
public function isFilenameExists($htmlTagName = 'files', $labelsName = 'labels', $objectID = '', $objectType = 'doc') {
    $uploadfiles = $this->getUpload($htmlTagName, $labelsName);
    $filenames = array();
    foreach ($uploadfiles as $uf) {
        $filenames[] = $uf['title'] . '.' . $uf['extension'];
    }
    $files = $this->dao->select('title,extension')->from(TABLE_FILE)->where('objectID')->eq($objectID)->andWhere('deleted')->eq(0)->andWhere('objectType')->eq($objectType)->fetchAll();
    $titles = array();
    if ($files) {
        foreach ($files as $file) {
            $title = $file->title . '.' . $file->extension;
            $titles[] = $title;
        }
    }
    if (!empty($titles)) {
        $filenames = array_merge($filenames, $titles);
    }
    $num1 = count($filenames);
    $filenames = array_unique($filenames);
    $num2 = count($filenames);
    if ($num1 > $num2) {
        return $this->lang->file->rename;
    }
    return false;
}
