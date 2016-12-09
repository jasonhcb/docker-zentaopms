<div>
  <?php 
	echo "<div style='padding: 15px;'>";
        $new = 0;
		foreach($bulletins as $k => $bulletin)
		{
			echo "<ul><li>";
			//echo "<div style='width: 100%;'>";
			echo html::a(helper::createLink('bulletin', 'detail',"bulletinID=$k&onlybody=yes"), $bulletin['title'], '', "class='iframe'");
                        if($new++==0) echo "<em class='pull-right' style='font-size:10px;height:13px;line-height:13px;margin: 0 0 0 5px;color: red;border: 0'>new</em>";
			echo "<div class='pull-right'>";
			printf($bulletin['date']);
			echo "</div>";
			//echo "</div>";
			echo "</li></ul>";
		}
	echo "</div>";
 ?>
<script>
$(document).ready(function() 
{
    setModal();
});
</script>
</div>
