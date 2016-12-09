<?php
 die();
?>
20161205 15:33:26: /ztp/zentaopms/www/index.php?m=distribution&f=view
  SELECT * FROM `zt_company` ORDER BY `id`  LIMIT 1 
  SELECT * FROM `zt_config` WHERE owner IN ('system','') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 

20161205 15:33:26: /ztp/zentaopms/www/index.php?m=user&f=ssologin&referer=L3p0cC96ZW50YW9wbXMvd3d3L2luZGV4LnBocD9tPWRpc3RyaWJ1dGlvbiZmPXZpZXc=
  SELECT * FROM `zt_config` WHERE owner IN ('system','') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 

20161205 15:33:27: /ztp/zentaopms/www/index.php?m=user&f=ssologin&referer=L3p0cC96ZW50YW9wbXMvd3d3L2luZGV4LnBocD9tPWRpc3RyaWJ1dGlvbiZmPXZpZXc=&ticket=ST-1740600-4bACUl7A6i1premdhpsu-cas01.hand-china.com
  SELECT * FROM `zt_config` WHERE owner IN ('system','') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 

20161205 15:33:27: /ztp/zentaopms/www/index.php?m=user&f=ssologin&referer=L3p0cC96ZW50YW9wbXMvd3d3L2luZGV4LnBocD9tPWRpc3RyaWJ1dGlvbiZmPXZpZXc=
  SELECT * FROM `zt_config` WHERE owner IN ('system','') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_user` WHERE account  = '11014'
  UPDATE `zt_user` SET  `fails` = '0', `locked` = '0000-00-00 00:00:00' WHERE account  = '11014'
  SELECT t1.acl FROM `zt_group` AS t1  LEFT JOIN `zt_usergroup` AS t2  ON t1.id=t2.group  WHERE t2.account  = '11014'
  SELECT module, method FROM `zt_usergroup` AS t1  LEFT JOIN `zt_grouppriv` AS t2  ON t1.group = t2.group  WHERE t1.account  = '11014'
  SELECT `group` FROM `zt_usergroup` WHERE `account` = '11014' 
  INSERT INTO `zt_action` SET `objectType` = 'user',`objectID` = '5486',`actor` = '11014',`action` = 'login',`date` = '2016-12-05 15:33:27',`comment` = '',`extra` = '',`product` = ',0,',`project` = '0'

20161205 15:33:27: /ztp/zentaopms/www/index.php?m=index&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 

20161205 15:33:27: /ztp/zentaopms/www/index.php?m=my&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE account  = '11014' AND  module  = 'my' AND  hidden  = '0' ORDER BY `order` 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161205 15:33:28: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=555&module=my
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '555'

20161205 15:33:28: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=559&module=my
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '559'
  SELECT * FROM `zt_product` WHERE deleted  = '0' AND  status  != 'closed' ORDER BY `order` desc 
  SELECT distinct t1.id FROM `zt_product` AS t1  LEFT JOIN `zt_projectproduct` AS t2  ON t1.id = t2.product  LEFT JOIN `zt_team` AS t3  ON t2.project = t3.project  LEFT JOIN `zt_project` AS t4  ON t2.project = t4.id  WHERE t1.acl  = 'open' OR (t1.acl = 'custom' AND (INSTR(CONCAT(',', t1.whitelist, ','), ',1,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',12,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',14,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',22,') > 0))  OR t1.PO  = '11014' OR t1.QD  = '11014' OR t1.RD  = '11014' OR t1.createdBy  = '11014' OR t3.account  = '11014' AND  t1.deleted  = '0' AND  t4.deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('3830','3366','1108','179','13','12','1') ORDER BY `order` desc 
  SELECT COUNT(*) AS recTotal FROM `zt_product` WHERE id IN ('3830','3366','1108','179','13','12','1') 
  SELECT * FROM `zt_product` WHERE id IN ('3830','3366','1108','179','13','12','1') ORDER BY `order` desc 
  SELECT product, status, count(status) AS count FROM `zt_story` WHERE deleted  = '0' AND  product IN ('3830','3366','1108','179','13','12','1') GROUP BY product, status
  SELECT product, count(*) AS count FROM `zt_productplan` WHERE deleted  = '0' AND  product IN ('3830','3366','1108','179','13','12','1') AND  end  > '2016-12-05 15:33:28' GROUP BY product
  SELECT product, count(*) AS count FROM `zt_release` WHERE deleted  = '0' AND  product IN ('3830','3366','1108','179','13','12','1') GROUP BY product
  SELECT product,count(*) AS conut FROM `zt_bug` WHERE deleted  = '0' AND  product IN ('3830','3366','1108','179','13','12','1') GROUP BY product
  SELECT product,count(*) AS count FROM `zt_bug` WHERE status  = 'active' AND  deleted  = '0' AND  product IN ('3830','3366','1108','179','13','12','1') GROUP BY product
  SELECT product,count(*) AS count FROM `zt_bug` WHERE AssignedTo  = '' AND  deleted  = '0' AND  product IN ('3830','3366','1108','179','13','12','1') GROUP BY product

20161205 15:33:29: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=558&module=my
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '558'
  SELECT * FROM `zt_todo` WHERE account  = '11014' AND  date  >= '1970-01-01' AND  date  <= '2109-01-01' AND  status IN ('wait','doing') ORDER BY `date`,`status`,`begin`  LIMIT 20 
  SELECT * FROM `zt_todo` WHERE account  = '11014' AND  date  >= '1970-01-01' AND  date  <= '2109-01-01' AND  status IN ('wait','doing') ORDER BY `date`,`status`,`begin`  LIMIT 20 

20161205 15:33:29: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=557&module=my
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '557'
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  status  != 'done' AND  deleted  = '0' ORDER BY `order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE id IN ('9','1','1098','1589') ORDER BY `order` desc 
  SELECT COUNT(*) AS recTotal FROM `zt_project` WHERE id IN ('9','1','1098','1589') 
  SELECT * FROM `zt_project` WHERE id IN ('9','1','1098','1589') ORDER BY `order` desc 
  SELECT id, project, estimate, consumed, `left`, status, closedReason FROM `zt_task` WHERE project IN ('9','1','1098','1589') AND  deleted  = '0'
  SELECT project, date AS name, `left` AS value FROM `zt_burn` WHERE project IN ('9','1','1098','1589') ORDER BY `date` desc 

20161205 15:33:29: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=561&module=my
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '561'
  DESC `zt_bug`
  SELECT * FROM `zt_bug` WHERE deleted  = '0' AND  assignedTo  = '11014' ORDER BY `id` desc  LIMIT 15 

20161205 15:33:29: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=556&module=my
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '556'

20161205 15:33:29: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=560&module=my
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '560'
  DESC `zt_task`
  SELECT t1.*, t2.id as projectID, t2.name as projectName, t3.id as storyID, t3.title as storyTitle, t3.status AS storyStatus, t3.version AS latestStoryVersion FROM `zt_task` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project = t2.id  LEFT JOIN `zt_story` AS t3  ON t1.story = t3.id  WHERE t1.deleted  = '0' AND  t1.assignedTo  = '11014' ORDER BY `id` desc  LIMIT 15 
  SELECT t1.*, t2.id as projectID, t2.name as projectName, t3.id as storyID, t3.title as storyTitle, t3.status AS storyStatus, t3.version AS latestStoryVersion FROM `zt_task` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project = t2.id  LEFT JOIN `zt_story` AS t3  ON t1.story = t3.id  WHERE t1.deleted  = '0' AND  t1.assignedTo  = '11014' ORDER BY `id` desc  LIMIT 15 

20161205 15:33:29: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=562&module=my
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '562'
  SELECT t1.*, t2.name as productTitle FROM `zt_story` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.deleted  = '0' AND  assignedTo  = '11014' ORDER BY `id` desc 
  SELECT COUNT(*) AS recTotal FROM `zt_story` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.deleted  = '0' AND  assignedTo  = '11014' 
  SELECT t1.*, t2.name as productTitle FROM `zt_story` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.deleted  = '0' AND  assignedTo  = '11014' ORDER BY `id` desc 
  SELECT t1.*, t2.name as productTitle FROM `zt_story` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.deleted  = '0' AND  assignedTo  = '11014' ORDER BY `id` desc 
  SELECT t1.*, t2.name as productTitle FROM `zt_story` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.deleted  = '0' AND  assignedTo  = '11014' ORDER BY `id` desc 
  SELECT id,title FROM `zt_productplan` WHERE product IN ('') AND  deleted  = '0'
  SELECT * FROM `zt_storystage` WHERE branch IN ('0')

20161205 15:33:29: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=563&module=my
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '563'
  SELECT t1.assignedTo AS assignedTo, t2.* FROM `zt_testrun` AS t1  LEFT JOIN `zt_case` AS t2  ON t1.case = t2.id  LEFT JOIN `zt_testtask` AS t3  ON t1.task = t3.id  WHERE t1.assignedTo  = '11014' AND  t1.status  != 'done' AND  t3.status  != 'done' AND  t3.deleted  = '0' AND  t2.deleted  = '0' ORDER BY `id` desc  LIMIT 15 

20161205 15:33:29: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=564&module=my
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '564'
  SELECT * FROM `zt_action` WHERE 1  AND  date  > '20161205' AND  date  < '2016-12-06' ORDER BY `date` desc 
  SELECT commiter, account, realname FROM `zt_user` WHERE commiter  != ''
  SELECT id, account AS name FROM `zt_user` WHERE id IN ('5486')
  SELECT account, realname, deleted FROM `zt_user` ORDER BY `account` 

20161205 15:35:27: /ztp/zentaopms/www/index.php?m=cron&f=ajaxExec&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'cron' AND  section  = 'run' AND  `key`  = 'status'
  UPDATE `zt_config` SET  `value` = 'running' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  UPDATE `zt_cron` SET  `lastTime` = '2016-12-05 15:33:27' WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  UPDATE `zt_cron` SET `status` = 'normal',`lastTime` = '2016-12-05 15:33:27' WHERE id  = '1'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  SELECT * FROM `zt_cron` WHERE id  = '2'
  SELECT * FROM `zt_cron` WHERE id  = '3'
  SELECT * FROM `zt_cron` WHERE id  = '4'
  SELECT * FROM `zt_cron` WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE id  = '6'
  SELECT * FROM `zt_cron` WHERE id  = '7'
  SELECT * FROM `zt_cron` WHERE id  = '8'
  SELECT * FROM `zt_cron` WHERE id  = '10'
  SELECT * FROM `zt_cron` WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-12-05 15:34:27' WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '1'
  SELECT * FROM `zt_cron` WHERE id  = '2'
  SELECT * FROM `zt_cron` WHERE id  = '3'
  SELECT * FROM `zt_cron` WHERE id  = '4'
  SELECT * FROM `zt_cron` WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE id  = '6'
  SELECT * FROM `zt_cron` WHERE id  = '7'
  SELECT * FROM `zt_cron` WHERE id  = '8'
  SELECT * FROM `zt_cron` WHERE id  = '10'
  SELECT * FROM `zt_cron` WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-12-05 15:34:27' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-12-05 15:35:27' WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '1'
  SELECT * FROM `zt_cron` WHERE id  = '2'
  SELECT * FROM `zt_cron` WHERE id  = '3'
  SELECT * FROM `zt_cron` WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-12-05 15:35:27' WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '4'
  SELECT * FROM `zt_cron` WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-12-05 15:35:27' WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE id  = '6'
  SELECT * FROM `zt_cron` WHERE id  = '7'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-12-05 15:35:27' WHERE id  = '7'
  SELECT * FROM `zt_mailqueue` WHERE 1=1  AND  status  = 'wait' ORDER BY `id` asc 
  SELECT id,status FROM `zt_mailqueue` ORDER BY `id` desc  LIMIT 1 
  DELETE FROM `zt_mailqueue` WHERE status  != 'wait' AND  sendTime  <= '2016-12-03 15:35:27'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '7'
  SELECT * FROM `zt_cron` WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-12-05 15:35:27' WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '8'
  SELECT * FROM `zt_cron` WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-12-05 15:35:27' WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '10'
  SELECT * FROM `zt_cron` WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-12-05 15:35:27' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-12-05 15:35:27' WHERE id  = '14'

