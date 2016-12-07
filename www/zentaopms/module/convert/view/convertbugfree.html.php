<tr class='text-center'>
  <th><?php echo $lang->convert->item?></th>
  <th><?php echo $lang->convert->count?></th>
  <th><?php echo $lang->convert->info?></th>
</tr>
<tr>
  <th><?php echo $lang->convert->bugfree->users;?></th>
  <td><?php echo $result['users'];?></td>
  <td class='f-12px'><?php if(isset($info['users'])) echo join('<br />', $info['users']);?></td>
</tr>
<tr>
  <th><?php echo $lang->convert->bugfree->projects;?></th>
  <td><?php echo $result['projects'];?></td>
  <td class='f-12px'><?php if(isset($info['projects'])) echo join('<br />', $info['projects']);?></td>
</tr>
<tr>
  <th><?php echo $lang->convert->bugfree->modules;?></th>
  <td><?php echo $result['modules'];?></td>
  <td class='f-12px'><?php if(isset($info['modules'])) echo join('<br />', $info['modules']);?></td>
</tr>
<tr>
  <th><?php echo $lang->convert->bugfree->bugs;?></th>
  <td><?php echo $result['bugs'];?></td>
  <td class='f-12px'><?php if(isset($info['bugs'])) echo join('<br />', $info['bugs']);?></td>
</tr>
<?php if($version > 1):?>
<tr>
  <th><?php echo $lang->convert->bugfree->cases;?></th>
  <td><?php echo $result['cases'];?></td>
  <td class='f-12px'><?php if(isset($info['cases'])) echo join('<br />', $info['cases']);?></td>
</tr>
<tr>
  <th><?php echo $lang->convert->bugfree->results;?></th>
  <td><?php echo $result['results'];?></td>
  <td class='f-12px'><?php if(isset($info['results'])) echo join('<br />', $info['results']);?></td>
</tr>

<?php endif;?>

<tr>
  <th><?php echo $lang->convert->bugfree->actions;?></th>
  <td><?php echo $result['actions'];?></td>
  <td class='f-12px'><?php if(isset($info['actions'])) echo join('<br />', $info['actions']);?></td>
</tr>
<tr>
  <th><?php echo $lang->convert->bugfree->files;?></th>
  <td><?php echo $result['files'];?></td>
  <td class='f-12px'><?php if(isset($info['files'])) echo join('<br />', $info['files']);?></td>
</tr>
