<?php header("Content-type: text/html; charset=utf-8"); ?>
<?php

class git extends control
{
    function __construct()
    {
        parent::__construct();
    }

    public function git()
    {
        $result = $this->dao->select('id,gitaddress')->from(TABLE_PROJECT)
            ->fetchAll();
//      备份初始化文件
        copy("../config/git.php", "../backup");
        unlink("../config/git.php");
        file_put_contents('../config/git.php', '<?php' . "\n" .
            '$config->git = new stdClass();' . "\n" .
            '$config->git' . '->encodings = \'utf-8, gbk\';' . "\n" .
            '$config->git->client = \'/usr/bin/git\';' . "\n" . "\n");

        foreach ($result as $id) {
            if ($id->gitaddress) {
                file_put_contents('../config/git.php', "// " . substr_replace("$id->gitaddress", "rdc:handhand@", strpos("$id->gitaddress","://")+3, 0) . "\n", FILE_APPEND);
            }
            file_put_contents('../config/git.php', '$config->' . "git->repos[$id->id]['path'] = '/u01/repos/$id->id';" . "\n", FILE_APPEND);
        }
        foreach ($result as $id) {
            $file_path = "/u01/repos/$id->id";
            if (file_exists($file_path) == 1) {
                chdir($file_path);
                exec('git pull');
            } else {
                mkdir($file_path);
                exec("git clone " . substr_replace("$id->gitaddress", "rdc:handhand@", strpos("$id->gitaddress","://")+3, 0) . " /u01/repos/$id->id");
            }
        }
    }
}