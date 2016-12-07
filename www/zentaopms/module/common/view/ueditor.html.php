<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<?php
$module = $this->moduleName;
$method = $this->methodName;
js::set('themeRoot', $themeRoot);
if(!isset($config->$module->editor->$method)) return;
$editor = $config->$module->editor->$method;
$editor['id'] = explode(',', $editor['id']);
$editorLangs  = array('en' => 'en', 'zh-cn' => 'zh-cn', 'zh-tw' => 'zh-tw');
$editorLang   = isset($editorLangs[$app->getClientLang()]) ? $editorLangs[$app->getClientLang()] : 'en';

/* set uid for upload. */
$uid = uniqid('');
js::set('kuid', $uid);
?>
<script type="text/javascript" charset="utf-8" src="<?php echo $jsRoot?>ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo $jsRoot?>ueditor/ueditor.all.min.js"> </script>
<script language='javascript'>
var editor = <?php echo json_encode($editor);?>;

var toolbars = [[
    'paragraph', 'fontfamily', 'fontsize', '|',
    'forecolor', 'backcolor', 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'blockquote', 'pasteplain', '|',
    'insertorderedlist', 'insertunorderedlist', 'justifyleft', 'justifycenter', 'justifyright', '|',
    'simpleupload', 'insertvideo', 'insertcode', '|',
    'link', 'unlink', '|',
    'inserttable', '|',
    'fullscreen', 'source', '|',
    'preview', 'help'
]];

$(document).ready(initUeditor);
function initUeditor(afterInit)
{
    $(':input[type=submit]').after("<input type='hidden' id='uid' name='uid' value=" + kuid + ">");
    var options = 
    {
        lang: '<?php echo $editorLang?>',
        toolbars: toolbars,
        serverUrl: '<?php echo $this->createLink('file', 'ajaxUeditorUpload', "uid=$uid")?>',
        autoClearinitialContent:false,
        wordCount:false,
        elementPathEnabled:false
    };
    $.each(editor.id, function(key, editorID)
    {
        if(!window.editor) window.editor = {};
        if($('#' + editorID).size() != 0)
        {
            ueditor = UE.getEditor(editorID, options);
            window.editor['#'] = window.editor[editorID] = ueditor;
            ueditor.addListener('ready', function()
            {
                $('#' + editorID).find('.edui-editor').css('z-index', '5');
            });
        }
    });

    if($.isFunction(afterInit)) afterInit();
}
</script>
