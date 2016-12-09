<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
</div>
</div>
<?php if(isset($pageJS)) js::execute($pageJS);?>
</body>
</html>
