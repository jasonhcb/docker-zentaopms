<?php
 die();
?>
20161129 01:27:35: /ztp/zentaopms/www/index.php?m=misc&f=ping&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 

20161129 04:38:10: /ztp/zentaopms/www/index.php?m=misc&f=ping&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE 1 = 1  AND  owner IN ('system') AND  module IN ('common') AND  section IN ('global') AND  `key` IN ('sn')

20161129 06:48:51: /ztp/zentaopms/www/index.php?m=misc&f=ping&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE 1 = 1  AND  owner IN ('system') AND  module IN ('common') AND  section IN ('global') AND  `key` IN ('sn')

20161129 08:58:07: /ztp/zentaopms/www/index.php?m=misc&f=ping&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 

20161129 09:10:53: /ztp/zentaopms/www/index.php?m=distribution&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = ''
  SELECT * FROM `zt_branch` WHERE product IN ('') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('')
  SELECT openedVersion FROM `zt_project` WHERE id  = ''
  SELECT openedVersion FROM `zt_project` WHERE id  = ''
  SELECT * FROM `zt_module` WHERE root  = '0' AND  type  = 'task' ORDER BY `grade` desc,`order` 
  SELECT t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT COUNT(*) AS recTotal FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:10:54: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'distribution' ORDER BY `id` asc 

20161129 09:13:04: /ztp/zentaopms/www/index.php?m=distribution&f=download&id=1
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 

20161129 09:13:11: /ztp/zentaopms/www/index.php?m=distribution&f=download
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 

20161129 09:13:54: /ztp/zentaopms/www/index.php?m=cron&f=ajaxExec&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'cron' AND  section  = 'run' AND  `key`  = 'status'
  UPDATE `zt_config` SET  `value` = 'running' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  UPDATE `zt_cron` SET  `lastTime` = '2016-11-29 09:10:54' WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  UPDATE `zt_cron` SET `status` = 'normal',`lastTime` = '2016-11-29 09:10:54' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:11:54' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:11:54' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:12:54' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:12:54' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'

20161129 09:15:15: /ztp/zentaopms/www/index.php?m=cron&f=ajaxExec&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'cron' AND  section  = 'run' AND  `key`  = 'status'
  UPDATE `zt_config` SET  `value` = 'running' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  UPDATE `zt_cron` SET  `lastTime` = '2016-11-29 09:13:14' WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  UPDATE `zt_cron` SET `status` = 'normal',`lastTime` = '2016-11-29 09:13:14' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:14:14' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:14:14' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:15:14' WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '1'
  SELECT * FROM `zt_cron` WHERE id  = '2'
  SELECT * FROM `zt_cron` WHERE id  = '3'
  SELECT * FROM `zt_cron` WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:15:14' WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '4'
  SELECT * FROM `zt_cron` WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:15:14' WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE id  = '6'
  SELECT * FROM `zt_cron` WHERE id  = '7'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:15:14' WHERE id  = '7'
  SELECT * FROM `zt_mailqueue` WHERE 1=1  AND  status  = 'wait' ORDER BY `id` asc 
  SELECT id,status FROM `zt_mailqueue` ORDER BY `id` desc  LIMIT 1 
  DELETE FROM `zt_mailqueue` WHERE status  != 'wait' AND  sendTime  <= '2016-11-27 09:15:14'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '7'
  SELECT * FROM `zt_cron` WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:15:14' WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '8'
  SELECT * FROM `zt_cron` WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:15:14' WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '10'
  SELECT * FROM `zt_cron` WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:15:14' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:15:14' WHERE id  = '14'
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT COUNT(*) AS recTotal FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' 
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT * FROM `zt_task` WHERE story  = '655' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-05',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05',`actReqComfimEndDate` = '2016-08-05 12:33:50',`techDesign` = '符龙/9532',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-05',`onCodingStartDate` = '2016-08-05',`codeDevelop` = '符龙/9532',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-10 00:00:00',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-18 15:06:32',`actTestEndDate` = '2016-08-18 15:06:32',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-08-18',`actOnsiteTestEndDate` = '2016-08-18 11:46:30',`recopercent` = '100%',`confimDate` = '2016-08-18 11:46:30',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '80'
  SELECT * FROM `zt_hdc` WHERE id  = '80'
  SELECT * FROM `zt_task` WHERE story  = '657' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05 17:49:32',`actReqComfimEndDate` = '2016-08-05 17:49:32',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-25',`onCodingStartDate` = '2016-08-25',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-25 16:22:02',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:12',`actTestEndDate` = '2016-09-05 15:53:12',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:18:21',`actOnsiteTestEndDate` = '2016-10-31 16:18:21',`recopercent` = '100%',`confimDate` = '2016-10-31 16:18:21',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '81'
  SELECT * FROM `zt_hdc` WHERE id  = '81'
  SELECT * FROM `zt_task` WHERE story  = '658' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '亓义辉/8930',`actReqComfimBeganDate` = '2016-08-05 17:52:53',`actReqComfimEndDate` = '2016-08-05 17:52:53',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-09',`onCodingStartDate` = '2016-08-09',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:15:04',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:46',`actTestEndDate` = '2016-09-05 15:53:46',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:16:45',`actOnsiteTestEndDate` = '2016-10-31 16:16:45',`recopercent` = '100%',`confimDate` = '2016-10-31 16:16:45',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '82'
  SELECT * FROM `zt_hdc` WHERE id  = '82'
  SELECT * FROM `zt_task` WHERE story  = '659' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '段俊宇/3543',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '2016-08-11 11:29:36',`actReqComfimEndDate` = '2016-08-11 11:29:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-11',`onCodingStartDate` = '2016-08-11',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-11 11:36:52',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-11',`actTestEndDate` = '2016-08-11 11:38:35',`siteAccept` = '马佳怡/11624',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 09:36:27',`actOnsiteTestEndDate` = '2016-08-16 09:36:27',`recopercent` = '100%',`confimDate` = '2016-08-16 09:36:27',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '83'
  SELECT * FROM `zt_hdc` WHERE id  = '83'
  SELECT * FROM `zt_task` WHERE story  = '660' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '沈雨华/2376',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 15:09:31',`actOnsiteTestEndDate` = '2016-08-16 15:09:31',`recopercent` = '100%',`confimDate` = '2016-08-16 15:09:31',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '84'
  SELECT * FROM `zt_hdc` WHERE id  = '84'
  SELECT * FROM `zt_task` WHERE story  = '661' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '2016-08-17 14:35:59',`actReqComfimEndDate` = '2016-08-17 14:35:59',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-17 14:36:31',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '2016-08-16',`actCodeEndDate` = '2016-08-16 11:23:34',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:37:09',`actTestEndDate` = '2016-08-17 14:37:09',`siteAccept` = '林天桦/7409',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16',`actOnsiteTestEndDate` = '2016-08-16 16:21:33',`recopercent` = '100%',`confimDate` = '2016-08-16 16:21:33',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '85'
  SELECT * FROM `zt_hdc` WHERE id  = '85'
  SELECT * FROM `zt_task` WHERE story  = '662' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '何剑峰/8440',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '何剑峰/8440',`actReqComfimBeganDate` = '2016-08-17 14:54:19',`actReqComfimEndDate` = '2016-08-17 14:54:19',`techDesign` = '吕立元/4279',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-16 00:00:00',`codeDevelop` = '刘杰/5285',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-29 15:32:41',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-10',`actTestEndDate` = '2016-09-10 14:54:36',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-11-04 09:10:03',`actOnsiteTestEndDate` = '2016-11-04 09:10:03',`recopercent` = '100%',`confimDate` = '2016-11-04 09:10:03',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '86'
  SELECT * FROM `zt_hdc` WHERE id  = '86'
  SELECT * FROM `zt_task` WHERE story  = '663' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '87'
  SELECT * FROM `zt_hdc` WHERE id  = '87'
  SELECT * FROM `zt_task` WHERE story  = '664' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '黄乐/2529',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '黄乐/2529',`actReqComfimBeganDate` = '2016-08-17 14:32:36',`actReqComfimEndDate` = '2016-08-17 14:32:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:36:14',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:58:09',`actTestEndDate` = '2016-08-17 14:58:09',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-17 14:59:11',`actOnsiteTestEndDate` = '2016-08-17 14:59:11',`recopercent` = '100%',`confimDate` = '2016-08-17 14:59:11',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '88'
  SELECT * FROM `zt_hdc` WHERE id  = '88'
  SELECT * FROM `zt_task` WHERE story  = '686' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:11:37',`actReqComfimEndDate` = '2016-08-25 14:11:37',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:58:10',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-05 15:27:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:10:58',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-14',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '110'
  SELECT * FROM `zt_hdc` WHERE id  = '110'
  SELECT * FROM `zt_task` WHERE story  = '687' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17 14:06:53',`actReqComfimEndDate` = '2016-08-17 14:06:53',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-19 15:05:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:11:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-04 09:09:37',`actOnsiteTestEndDate` = '2016-11-04 09:09:37',`recopercent` = '100%',`confimDate` = '2016-11-04 09:09:37',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '111'
  SELECT * FROM `zt_hdc` WHERE id  = '111'
  SELECT * FROM `zt_task` WHERE story  = '688' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17',`actReqComfimEndDate` = '',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-08-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '112'
  SELECT * FROM `zt_hdc` WHERE id  = '112'
  SELECT * FROM `zt_task` WHERE story  = '689' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-18 10:10:05',`actReqComfimEndDate` = '2016-08-18 10:10:05',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:56:25',`codeDevelop` = '李德远/8741',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-24 17:47:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-08-31 17:52:42',`actTestEndDate` = '2016-08-31 17:52:42',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:11',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:11',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '113'
  SELECT * FROM `zt_hdc` WHERE id  = '113'
  SELECT * FROM `zt_task` WHERE story  = '690' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-11',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:06:22',`actReqComfimEndDate` = '2016-08-25 14:06:22',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-31 17:55:48',`codeDevelop` = '曹天娇/10340',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-31 17:25:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 15:26:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:26',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:26',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '114'
  SELECT * FROM `zt_hdc` WHERE id  = '114'
  SELECT * FROM `zt_task` WHERE story  = '902' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-02',`actReqComfimEndDate` = '2016-09-02 16:28:37',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-02 16:42:58',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-09-09',`actTestEndDate` = '2016-09-09 18:06:39',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-16',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '275'
  SELECT * FROM `zt_hdc` WHERE id  = '275'
  SELECT * FROM `zt_task` WHERE story  = '1630' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '贺斌/868',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '谢娇艳/2413',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '947'
  SELECT * FROM `zt_hdc` WHERE id  = '947'
  SELECT * FROM `zt_task` WHERE story  = '1631' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-28',`actReqComfimEndDate` = '2016-09-28 10:37:15',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-28 10:37:41',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-28 17:30:34',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-10-23 15:01:58',`actTestEndDate` = '2016-10-23 15:01:58',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-10-05 01:06:35',`actOnsiteTestEndDate` = '2016-10-05 01:06:35',`recopercent` = '100%',`confimDate` = '2016-10-05 01:06:35',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '948'
  SELECT * FROM `zt_hdc` WHERE id  = '948'
  SELECT * FROM `zt_task` WHERE story  = '3340' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:45',`actReqComfimEndDate` = '2016-10-23 15:01:45',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-24',`onCodingStartDate` = '2016-10-24',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-01 18:41:12',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:03:10',`actTestEndDate` = '2016-11-14 14:03:10',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '2580'
  SELECT * FROM `zt_hdc` WHERE id  = '2580'
  SELECT * FROM `zt_task` WHERE story  = '3341' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-10-23',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:28',`actReqComfimEndDate` = '2016-10-23 15:01:28',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-11-01',`onCodingStartDate` = '2016-11-01',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-02 19:25:10',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:37',`actTestEndDate` = '2016-11-14 14:02:37',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '2581'
  SELECT * FROM `zt_hdc` WHERE id  = '2581'
  SELECT * FROM `zt_task` WHERE story  = '3342' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:00:16',`actReqComfimEndDate` = '2016-10-23 15:00:16',`techDesign` = '陈俊/4268',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-25',`onCodingStartDate` = '2016-10-25',`codeDevelop` = '陈俊/4268',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-03 10:37:04',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:04',`actTestEndDate` = '2016-11-14 14:02:04',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:15:15' WHERE id  = '2582'
  SELECT * FROM `zt_hdc` WHERE id  = '2582'

20161129 09:20:13: /ztp/zentaopms/www/index.php?m=distribution&f=download&id=1
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 

20161129 09:20:17: /ztp/zentaopms/www/index.php?m=distribution&f=download&id=1
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT expire_date as expdate FROM `zt_csicode` WHERE release_id  = '1' AND  csi_code  = 'DFASFDSAFF' ORDER BY `expdate` DESC 

20161129 09:21:06: /ztp/zentaopms/www/index.php?m=distribution&f=download&id=1
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT expire_date as expdate FROM `zt_csicode` WHERE release_id  = '1' AND  csi_code  = 'DFASFDSAFF' ORDER BY `expdate` DESC 

20161129 09:21:11: /ztp/zentaopms/www/index.php?m=distribution&f=download&id=2
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 

20161129 09:21:13: /ztp/zentaopms/www/index.php?m=distribution&f=download&id=2
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT expire_date as expdate FROM `zt_csicode` WHERE release_id  = '2' AND  csi_code  = 'DFASFDSAFF' ORDER BY `expdate` DESC 

20161129 09:21:16: /ztp/zentaopms/www/index.php?m=distribution&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = ''
  SELECT * FROM `zt_branch` WHERE product IN ('') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('')
  SELECT openedVersion FROM `zt_project` WHERE id  = ''
  SELECT openedVersion FROM `zt_project` WHERE id  = ''
  SELECT * FROM `zt_module` WHERE root  = '0' AND  type  = 'task' ORDER BY `grade` desc,`order` 
  SELECT t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT COUNT(*) AS recTotal FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:21:17: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'distribution' ORDER BY `id` asc 

20161129 09:21:20: /ztp/zentaopms/www/index.php?m=correspondent&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:21:20: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:21:22: /ztp/zentaopms/www/index.php?m=correspondent&f=detail&id=1
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_csicode` WHERE custome_id  = '1' AND  user_id  = '11014'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:21:30: /ztp/zentaopms/www/index.php?m=distribution&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = ''
  SELECT * FROM `zt_branch` WHERE product IN ('') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('')
  SELECT openedVersion FROM `zt_project` WHERE id  = ''
  SELECT openedVersion FROM `zt_project` WHERE id  = ''
  SELECT * FROM `zt_module` WHERE root  = '0' AND  type  = 'task' ORDER BY `grade` desc,`order` 
  SELECT t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT COUNT(*) AS recTotal FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:21:30: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'distribution' ORDER BY `id` asc 

20161129 09:21:32: /ztp/zentaopms/www/index.php?m=distribution&f=download&id=1
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 

20161129 09:21:35: /ztp/zentaopms/www/index.php?m=distribution&f=download&id=1
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT expire_date as expdate FROM `zt_csicode` WHERE release_id  = '1' AND  csi_code  = 'dfbbad2ee719d607d0cc325aa219e67f' ORDER BY `expdate` DESC 

20161129 09:21:42: /ztp/zentaopms/www/index.php?m=distribution&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = ''
  SELECT * FROM `zt_branch` WHERE product IN ('') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('')
  SELECT openedVersion FROM `zt_project` WHERE id  = ''
  SELECT openedVersion FROM `zt_project` WHERE id  = ''
  SELECT * FROM `zt_module` WHERE root  = '0' AND  type  = 'task' ORDER BY `grade` desc,`order` 
  SELECT t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT COUNT(*) AS recTotal FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:21:42: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'distribution' ORDER BY `id` asc 

20161129 09:22:51: /ztp/zentaopms/www/index.php?m=correspondent&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:22:52: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:23:02: /ztp/zentaopms/www/index.php?m=correspondent&f=create
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:24:17: /ztp/zentaopms/www/index.php?m=correspondent&f=create
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  INSERT INTO `zt_custome` SET `buyproject` = '3',`promanager` = '005:吴晓通',`companyname` = '汉得信息科技股份有限公司',`project_id` = '9',`protimebegan` = '2016-11-15',`protimeend` = '2016-11-30',`contractid` = 'KGD13123124',`tel` = '',`email` = '',`create_time` = '2016-11-29 09:24:17',`create_by` = '11014'
  INSERT INTO `zt_approval` SET `buyproject` = '3',`custome_id` = '3',`create_time` = '2016-11-29 09:24:17'

20161129 09:24:17: /ztp/zentaopms/www/index.php?m=correspondent&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:24:17: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:24:22: /ztp/zentaopms/www/index.php?m=correspondent&f=myflow&browseType=myflow
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t2.create_by  = '11014' ORDER BY t1.`id` DESC 
  SELECT COUNT(*) AS recTotal FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t2.create_by  = '11014' 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t2.create_by  = '11014' ORDER BY t1.`id` DESC 
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:24:48: /ztp/zentaopms/www/index.php?m=correspondent&f=check
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' ORDER BY t1.`id` DESC 
  SELECT COUNT(*) AS recTotal FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' ORDER BY t1.`id` DESC 
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:24:48: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:24:53: /ztp/zentaopms/www/index.php?m=correspondent&f=check&browseType=check&type=uncheck
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' ORDER BY t1.`id` DESC 
  SELECT COUNT(*) AS recTotal FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' ORDER BY t1.`id` DESC 
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:24:53: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:25:03: /ztp/zentaopms/www/index.php?m=correspondent&f=passorrefuse&optid=6&type=pass
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  UPDATE `zt_approval` SET  `opinion` = '2', `editor` = '11014', `edit_time` = '2016-11-29 09:25:03' WHERE id  = '6'
  SELECT t1.id,t1.custome_id,t1.buyproject,t2.protimeend FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  WHERE t1.id  = '6'
  INSERT INTO `zt_csicode` SET `user_id` = '11014',`release_id` = '3',`custome_id` = '3',`csi_code` = '2e2bb84b8ceb41adb1504c5ba4dbd28c',`expire_date` = '2016-11-30'

20161129 09:25:03: /ztp/zentaopms/www/index.php?m=correspondent&f=check
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' ORDER BY t1.`id` DESC 
  SELECT COUNT(*) AS recTotal FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' ORDER BY t1.`id` DESC 
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:25:04: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:25:06: /ztp/zentaopms/www/index.php?m=correspondent&f=check&browseType=check&type=hscheck
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion IN ('1','2') ORDER BY t1.`id` DESC 
  SELECT COUNT(*) AS recTotal FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion IN ('1','2') 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion IN ('1','2') ORDER BY t1.`id` DESC 
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:25:06: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:25:14: /ztp/zentaopms/www/index.php?m=correspondent&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:25:14: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:25:17: /ztp/zentaopms/www/index.php?m=cron&f=ajaxExec&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'cron' AND  section  = 'run' AND  `key`  = 'status'
  UPDATE `zt_config` SET  `value` = 'running' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  UPDATE `zt_cron` SET  `lastTime` = '2016-11-29 09:21:17' WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  UPDATE `zt_cron` SET `status` = 'normal',`lastTime` = '2016-11-29 09:21:17' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:22:17' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:22:17' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:23:17' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:23:17' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:24:17' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:24:17' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:25:17' WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '1'
  SELECT * FROM `zt_cron` WHERE id  = '2'
  SELECT * FROM `zt_cron` WHERE id  = '3'
  SELECT * FROM `zt_cron` WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:25:17' WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '4'
  SELECT * FROM `zt_cron` WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:25:17' WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE id  = '6'
  SELECT * FROM `zt_cron` WHERE id  = '7'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:25:17' WHERE id  = '7'
  SELECT * FROM `zt_mailqueue` WHERE 1=1  AND  status  = 'wait' ORDER BY `id` asc 
  SELECT id,status FROM `zt_mailqueue` ORDER BY `id` desc  LIMIT 1 
  DELETE FROM `zt_mailqueue` WHERE status  != 'wait' AND  sendTime  <= '2016-11-27 09:25:17'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '7'
  SELECT * FROM `zt_cron` WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:25:17' WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '8'
  SELECT * FROM `zt_cron` WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:25:17' WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '10'
  SELECT * FROM `zt_cron` WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:25:17' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:25:17' WHERE id  = '14'
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT COUNT(*) AS recTotal FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' 
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT * FROM `zt_task` WHERE story  = '655' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-05',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05',`actReqComfimEndDate` = '2016-08-05 12:33:50',`techDesign` = '符龙/9532',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-05',`onCodingStartDate` = '2016-08-05',`codeDevelop` = '符龙/9532',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-10 00:00:00',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-18 15:06:32',`actTestEndDate` = '2016-08-18 15:06:32',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-08-18',`actOnsiteTestEndDate` = '2016-08-18 11:46:30',`recopercent` = '100%',`confimDate` = '2016-08-18 11:46:30',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '80'
  SELECT * FROM `zt_hdc` WHERE id  = '80'
  SELECT * FROM `zt_task` WHERE story  = '657' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05 17:49:32',`actReqComfimEndDate` = '2016-08-05 17:49:32',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-25',`onCodingStartDate` = '2016-08-25',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-25 16:22:02',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:12',`actTestEndDate` = '2016-09-05 15:53:12',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:18:21',`actOnsiteTestEndDate` = '2016-10-31 16:18:21',`recopercent` = '100%',`confimDate` = '2016-10-31 16:18:21',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '81'
  SELECT * FROM `zt_hdc` WHERE id  = '81'
  SELECT * FROM `zt_task` WHERE story  = '658' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '亓义辉/8930',`actReqComfimBeganDate` = '2016-08-05 17:52:53',`actReqComfimEndDate` = '2016-08-05 17:52:53',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-09',`onCodingStartDate` = '2016-08-09',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:15:04',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:46',`actTestEndDate` = '2016-09-05 15:53:46',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:16:45',`actOnsiteTestEndDate` = '2016-10-31 16:16:45',`recopercent` = '100%',`confimDate` = '2016-10-31 16:16:45',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '82'
  SELECT * FROM `zt_hdc` WHERE id  = '82'
  SELECT * FROM `zt_task` WHERE story  = '659' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '段俊宇/3543',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '2016-08-11 11:29:36',`actReqComfimEndDate` = '2016-08-11 11:29:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-11',`onCodingStartDate` = '2016-08-11',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-11 11:36:52',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-11',`actTestEndDate` = '2016-08-11 11:38:35',`siteAccept` = '马佳怡/11624',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 09:36:27',`actOnsiteTestEndDate` = '2016-08-16 09:36:27',`recopercent` = '100%',`confimDate` = '2016-08-16 09:36:27',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '83'
  SELECT * FROM `zt_hdc` WHERE id  = '83'
  SELECT * FROM `zt_task` WHERE story  = '660' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '沈雨华/2376',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 15:09:31',`actOnsiteTestEndDate` = '2016-08-16 15:09:31',`recopercent` = '100%',`confimDate` = '2016-08-16 15:09:31',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '84'
  SELECT * FROM `zt_hdc` WHERE id  = '84'
  SELECT * FROM `zt_task` WHERE story  = '661' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '2016-08-17 14:35:59',`actReqComfimEndDate` = '2016-08-17 14:35:59',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-17 14:36:31',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '2016-08-16',`actCodeEndDate` = '2016-08-16 11:23:34',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:37:09',`actTestEndDate` = '2016-08-17 14:37:09',`siteAccept` = '林天桦/7409',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16',`actOnsiteTestEndDate` = '2016-08-16 16:21:33',`recopercent` = '100%',`confimDate` = '2016-08-16 16:21:33',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '85'
  SELECT * FROM `zt_hdc` WHERE id  = '85'
  SELECT * FROM `zt_task` WHERE story  = '662' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '何剑峰/8440',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '何剑峰/8440',`actReqComfimBeganDate` = '2016-08-17 14:54:19',`actReqComfimEndDate` = '2016-08-17 14:54:19',`techDesign` = '吕立元/4279',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-16 00:00:00',`codeDevelop` = '刘杰/5285',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-29 15:32:41',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-10',`actTestEndDate` = '2016-09-10 14:54:36',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-11-04 09:10:03',`actOnsiteTestEndDate` = '2016-11-04 09:10:03',`recopercent` = '100%',`confimDate` = '2016-11-04 09:10:03',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '86'
  SELECT * FROM `zt_hdc` WHERE id  = '86'
  SELECT * FROM `zt_task` WHERE story  = '663' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '87'
  SELECT * FROM `zt_hdc` WHERE id  = '87'
  SELECT * FROM `zt_task` WHERE story  = '664' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '黄乐/2529',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '黄乐/2529',`actReqComfimBeganDate` = '2016-08-17 14:32:36',`actReqComfimEndDate` = '2016-08-17 14:32:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:36:14',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:58:09',`actTestEndDate` = '2016-08-17 14:58:09',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-17 14:59:11',`actOnsiteTestEndDate` = '2016-08-17 14:59:11',`recopercent` = '100%',`confimDate` = '2016-08-17 14:59:11',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '88'
  SELECT * FROM `zt_hdc` WHERE id  = '88'
  SELECT * FROM `zt_task` WHERE story  = '686' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:11:37',`actReqComfimEndDate` = '2016-08-25 14:11:37',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:58:10',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-05 15:27:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:10:58',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-14',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '110'
  SELECT * FROM `zt_hdc` WHERE id  = '110'
  SELECT * FROM `zt_task` WHERE story  = '687' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17 14:06:53',`actReqComfimEndDate` = '2016-08-17 14:06:53',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-19 15:05:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:11:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-04 09:09:37',`actOnsiteTestEndDate` = '2016-11-04 09:09:37',`recopercent` = '100%',`confimDate` = '2016-11-04 09:09:37',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '111'
  SELECT * FROM `zt_hdc` WHERE id  = '111'
  SELECT * FROM `zt_task` WHERE story  = '688' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17',`actReqComfimEndDate` = '',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-08-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '112'
  SELECT * FROM `zt_hdc` WHERE id  = '112'
  SELECT * FROM `zt_task` WHERE story  = '689' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-18 10:10:05',`actReqComfimEndDate` = '2016-08-18 10:10:05',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:56:25',`codeDevelop` = '李德远/8741',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-24 17:47:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-08-31 17:52:42',`actTestEndDate` = '2016-08-31 17:52:42',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:11',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:11',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '113'
  SELECT * FROM `zt_hdc` WHERE id  = '113'
  SELECT * FROM `zt_task` WHERE story  = '690' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-11',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:06:22',`actReqComfimEndDate` = '2016-08-25 14:06:22',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-31 17:55:48',`codeDevelop` = '曹天娇/10340',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-31 17:25:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 15:26:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:26',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:26',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '114'
  SELECT * FROM `zt_hdc` WHERE id  = '114'
  SELECT * FROM `zt_task` WHERE story  = '902' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-02',`actReqComfimEndDate` = '2016-09-02 16:28:37',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-02 16:42:58',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-09-09',`actTestEndDate` = '2016-09-09 18:06:39',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-16',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '275'
  SELECT * FROM `zt_hdc` WHERE id  = '275'
  SELECT * FROM `zt_task` WHERE story  = '1630' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '贺斌/868',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '谢娇艳/2413',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '947'
  SELECT * FROM `zt_hdc` WHERE id  = '947'
  SELECT * FROM `zt_task` WHERE story  = '1631' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-28',`actReqComfimEndDate` = '2016-09-28 10:37:15',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-28 10:37:41',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-28 17:30:34',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-10-23 15:01:58',`actTestEndDate` = '2016-10-23 15:01:58',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-10-05 01:06:35',`actOnsiteTestEndDate` = '2016-10-05 01:06:35',`recopercent` = '100%',`confimDate` = '2016-10-05 01:06:35',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '948'
  SELECT * FROM `zt_hdc` WHERE id  = '948'
  SELECT * FROM `zt_task` WHERE story  = '3340' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:45',`actReqComfimEndDate` = '2016-10-23 15:01:45',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-24',`onCodingStartDate` = '2016-10-24',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-01 18:41:12',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:03:10',`actTestEndDate` = '2016-11-14 14:03:10',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '2580'
  SELECT * FROM `zt_hdc` WHERE id  = '2580'
  SELECT * FROM `zt_task` WHERE story  = '3341' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-10-23',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:28',`actReqComfimEndDate` = '2016-10-23 15:01:28',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-11-01',`onCodingStartDate` = '2016-11-01',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-02 19:25:10',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:37',`actTestEndDate` = '2016-11-14 14:02:37',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '2581'
  SELECT * FROM `zt_hdc` WHERE id  = '2581'
  SELECT * FROM `zt_task` WHERE story  = '3342' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:00:16',`actReqComfimEndDate` = '2016-10-23 15:00:16',`techDesign` = '陈俊/4268',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-25',`onCodingStartDate` = '2016-10-25',`codeDevelop` = '陈俊/4268',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-03 10:37:04',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:04',`actTestEndDate` = '2016-11-14 14:02:04',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:25:17' WHERE id  = '2582'
  SELECT * FROM `zt_hdc` WHERE id  = '2582'

20161129 09:25:18: /ztp/zentaopms/www/index.php?m=correspondent&f=detail&id=1
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_csicode` WHERE custome_id  = '1' AND  user_id  = '11014'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:25:20: /ztp/zentaopms/www/index.php?m=correspondent&f=index&browseType=customerlist
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:25:21: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:25:22: /ztp/zentaopms/www/index.php?m=correspondent&f=detail&id=3
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_csicode` WHERE custome_id  = '3' AND  user_id  = '11014'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:26:00: /ztp/zentaopms/www/index.php?m=distribution&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = ''
  SELECT * FROM `zt_branch` WHERE product IN ('') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('')
  SELECT openedVersion FROM `zt_project` WHERE id  = ''
  SELECT openedVersion FROM `zt_project` WHERE id  = ''
  SELECT * FROM `zt_module` WHERE root  = '0' AND  type  = 'task' ORDER BY `grade` desc,`order` 
  SELECT t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT COUNT(*) AS recTotal FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:26:00: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'distribution' ORDER BY `id` asc 

20161129 09:26:04: /ztp/zentaopms/www/index.php?m=correspondent&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:26:04: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:28:18: /ztp/zentaopms/www/index.php?m=correspondent&f=detail&id=3
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_csicode` WHERE custome_id  = '3' AND  user_id  = '11014'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:28:28: /ztp/zentaopms/www/index.php?m=correspondent&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:28:29: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:28:31: /ztp/zentaopms/www/index.php?m=correspondent&f=create
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:29:38: /ztp/zentaopms/www/index.php?m=correspondent&f=create&addfield=1
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 

20161129 09:30:03: /ztp/zentaopms/www/index.php?m=correspondent&f=create&addfield=1
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 

20161129 09:30:17: /ztp/zentaopms/www/index.php?m=correspondent&f=create
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  INSERT INTO `zt_custome` SET `buyproject` = '3,4,2',`promanager` = '',`companyname` = '测试',`project_id` = '1098',`protimebegan` = '',`protimeend` = '',`contractid` = 'KGD13123124',`tel` = '',`email` = '',`create_time` = '2016-11-29 09:30:17',`create_by` = '11014'
  INSERT INTO `zt_approval` SET `buyproject` = '3,4,2',`custome_id` = '4',`create_time` = '2016-11-29 09:30:17'

20161129 09:30:17: /ztp/zentaopms/www/index.php?m=correspondent&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:30:17: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:30:18: /ztp/zentaopms/www/index.php?m=correspondent&f=myflow&browseType=myflow
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t2.create_by  = '11014' ORDER BY t1.`id` DESC 
  SELECT COUNT(*) AS recTotal FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t2.create_by  = '11014' 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t2.create_by  = '11014' ORDER BY t1.`id` DESC 
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:30:18: /ztp/zentaopms/www/index.php?m=cron&f=ajaxExec&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'cron' AND  section  = 'run' AND  `key`  = 'status'
  UPDATE `zt_config` SET  `value` = 'running' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  UPDATE `zt_cron` SET  `lastTime` = '2016-11-29 09:28:18' WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  UPDATE `zt_cron` SET `status` = 'normal',`lastTime` = '2016-11-29 09:28:18' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:29:18' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:29:18' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:30:18' WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '1'
  SELECT * FROM `zt_cron` WHERE id  = '2'
  SELECT * FROM `zt_cron` WHERE id  = '3'
  SELECT * FROM `zt_cron` WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:30:18' WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '4'
  SELECT * FROM `zt_cron` WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:30:18' WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE id  = '6'
  SELECT * FROM `zt_cron` WHERE id  = '7'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:30:18' WHERE id  = '7'
  SELECT * FROM `zt_mailqueue` WHERE 1=1  AND  status  = 'wait' ORDER BY `id` asc 
  SELECT id,status FROM `zt_mailqueue` ORDER BY `id` desc  LIMIT 1 
  DELETE FROM `zt_mailqueue` WHERE status  != 'wait' AND  sendTime  <= '2016-11-27 09:30:18'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '7'
  SELECT * FROM `zt_cron` WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:30:18' WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '8'
  SELECT * FROM `zt_cron` WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:30:18' WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '10'
  SELECT * FROM `zt_cron` WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:30:18' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:30:18' WHERE id  = '14'
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT COUNT(*) AS recTotal FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' 
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT * FROM `zt_task` WHERE story  = '655' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-05',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05',`actReqComfimEndDate` = '2016-08-05 12:33:50',`techDesign` = '符龙/9532',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-05',`onCodingStartDate` = '2016-08-05',`codeDevelop` = '符龙/9532',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-10 00:00:00',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-18 15:06:32',`actTestEndDate` = '2016-08-18 15:06:32',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-08-18',`actOnsiteTestEndDate` = '2016-08-18 11:46:30',`recopercent` = '100%',`confimDate` = '2016-08-18 11:46:30',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '80'
  SELECT * FROM `zt_hdc` WHERE id  = '80'
  SELECT * FROM `zt_task` WHERE story  = '657' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05 17:49:32',`actReqComfimEndDate` = '2016-08-05 17:49:32',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-25',`onCodingStartDate` = '2016-08-25',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-25 16:22:02',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:12',`actTestEndDate` = '2016-09-05 15:53:12',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:18:21',`actOnsiteTestEndDate` = '2016-10-31 16:18:21',`recopercent` = '100%',`confimDate` = '2016-10-31 16:18:21',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '81'
  SELECT * FROM `zt_hdc` WHERE id  = '81'
  SELECT * FROM `zt_task` WHERE story  = '658' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '亓义辉/8930',`actReqComfimBeganDate` = '2016-08-05 17:52:53',`actReqComfimEndDate` = '2016-08-05 17:52:53',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-09',`onCodingStartDate` = '2016-08-09',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:15:04',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:46',`actTestEndDate` = '2016-09-05 15:53:46',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:16:45',`actOnsiteTestEndDate` = '2016-10-31 16:16:45',`recopercent` = '100%',`confimDate` = '2016-10-31 16:16:45',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '82'
  SELECT * FROM `zt_hdc` WHERE id  = '82'
  SELECT * FROM `zt_task` WHERE story  = '659' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '段俊宇/3543',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '2016-08-11 11:29:36',`actReqComfimEndDate` = '2016-08-11 11:29:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-11',`onCodingStartDate` = '2016-08-11',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-11 11:36:52',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-11',`actTestEndDate` = '2016-08-11 11:38:35',`siteAccept` = '马佳怡/11624',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 09:36:27',`actOnsiteTestEndDate` = '2016-08-16 09:36:27',`recopercent` = '100%',`confimDate` = '2016-08-16 09:36:27',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '83'
  SELECT * FROM `zt_hdc` WHERE id  = '83'
  SELECT * FROM `zt_task` WHERE story  = '660' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '沈雨华/2376',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 15:09:31',`actOnsiteTestEndDate` = '2016-08-16 15:09:31',`recopercent` = '100%',`confimDate` = '2016-08-16 15:09:31',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '84'
  SELECT * FROM `zt_hdc` WHERE id  = '84'
  SELECT * FROM `zt_task` WHERE story  = '661' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '2016-08-17 14:35:59',`actReqComfimEndDate` = '2016-08-17 14:35:59',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-17 14:36:31',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '2016-08-16',`actCodeEndDate` = '2016-08-16 11:23:34',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:37:09',`actTestEndDate` = '2016-08-17 14:37:09',`siteAccept` = '林天桦/7409',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16',`actOnsiteTestEndDate` = '2016-08-16 16:21:33',`recopercent` = '100%',`confimDate` = '2016-08-16 16:21:33',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '85'
  SELECT * FROM `zt_hdc` WHERE id  = '85'
  SELECT * FROM `zt_task` WHERE story  = '662' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '何剑峰/8440',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '何剑峰/8440',`actReqComfimBeganDate` = '2016-08-17 14:54:19',`actReqComfimEndDate` = '2016-08-17 14:54:19',`techDesign` = '吕立元/4279',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-16 00:00:00',`codeDevelop` = '刘杰/5285',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-29 15:32:41',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-10',`actTestEndDate` = '2016-09-10 14:54:36',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-11-04 09:10:03',`actOnsiteTestEndDate` = '2016-11-04 09:10:03',`recopercent` = '100%',`confimDate` = '2016-11-04 09:10:03',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '86'
  SELECT * FROM `zt_hdc` WHERE id  = '86'
  SELECT * FROM `zt_task` WHERE story  = '663' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '87'
  SELECT * FROM `zt_hdc` WHERE id  = '87'
  SELECT * FROM `zt_task` WHERE story  = '664' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '黄乐/2529',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '黄乐/2529',`actReqComfimBeganDate` = '2016-08-17 14:32:36',`actReqComfimEndDate` = '2016-08-17 14:32:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:36:14',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:58:09',`actTestEndDate` = '2016-08-17 14:58:09',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-17 14:59:11',`actOnsiteTestEndDate` = '2016-08-17 14:59:11',`recopercent` = '100%',`confimDate` = '2016-08-17 14:59:11',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '88'
  SELECT * FROM `zt_hdc` WHERE id  = '88'
  SELECT * FROM `zt_task` WHERE story  = '686' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:11:37',`actReqComfimEndDate` = '2016-08-25 14:11:37',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:58:10',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-05 15:27:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:10:58',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-14',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '110'
  SELECT * FROM `zt_hdc` WHERE id  = '110'
  SELECT * FROM `zt_task` WHERE story  = '687' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17 14:06:53',`actReqComfimEndDate` = '2016-08-17 14:06:53',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-19 15:05:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:11:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-04 09:09:37',`actOnsiteTestEndDate` = '2016-11-04 09:09:37',`recopercent` = '100%',`confimDate` = '2016-11-04 09:09:37',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '111'
  SELECT * FROM `zt_hdc` WHERE id  = '111'
  SELECT * FROM `zt_task` WHERE story  = '688' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17',`actReqComfimEndDate` = '',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-08-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '112'
  SELECT * FROM `zt_hdc` WHERE id  = '112'
  SELECT * FROM `zt_task` WHERE story  = '689' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-18 10:10:05',`actReqComfimEndDate` = '2016-08-18 10:10:05',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:56:25',`codeDevelop` = '李德远/8741',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-24 17:47:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-08-31 17:52:42',`actTestEndDate` = '2016-08-31 17:52:42',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:11',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:11',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '113'
  SELECT * FROM `zt_hdc` WHERE id  = '113'
  SELECT * FROM `zt_task` WHERE story  = '690' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-11',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:06:22',`actReqComfimEndDate` = '2016-08-25 14:06:22',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-31 17:55:48',`codeDevelop` = '曹天娇/10340',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-31 17:25:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 15:26:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:26',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:26',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '114'
  SELECT * FROM `zt_hdc` WHERE id  = '114'
  SELECT * FROM `zt_task` WHERE story  = '902' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-02',`actReqComfimEndDate` = '2016-09-02 16:28:37',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-02 16:42:58',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-09-09',`actTestEndDate` = '2016-09-09 18:06:39',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-16',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '275'
  SELECT * FROM `zt_hdc` WHERE id  = '275'
  SELECT * FROM `zt_task` WHERE story  = '1630' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '贺斌/868',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '谢娇艳/2413',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '947'
  SELECT * FROM `zt_hdc` WHERE id  = '947'
  SELECT * FROM `zt_task` WHERE story  = '1631' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-28',`actReqComfimEndDate` = '2016-09-28 10:37:15',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-28 10:37:41',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-28 17:30:34',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-10-23 15:01:58',`actTestEndDate` = '2016-10-23 15:01:58',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-10-05 01:06:35',`actOnsiteTestEndDate` = '2016-10-05 01:06:35',`recopercent` = '100%',`confimDate` = '2016-10-05 01:06:35',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '948'
  SELECT * FROM `zt_hdc` WHERE id  = '948'
  SELECT * FROM `zt_task` WHERE story  = '3340' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:45',`actReqComfimEndDate` = '2016-10-23 15:01:45',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-24',`onCodingStartDate` = '2016-10-24',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-01 18:41:12',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:03:10',`actTestEndDate` = '2016-11-14 14:03:10',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '2580'
  SELECT * FROM `zt_hdc` WHERE id  = '2580'
  SELECT * FROM `zt_task` WHERE story  = '3341' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-10-23',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:28',`actReqComfimEndDate` = '2016-10-23 15:01:28',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-11-01',`onCodingStartDate` = '2016-11-01',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-02 19:25:10',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:37',`actTestEndDate` = '2016-11-14 14:02:37',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '2581'
  SELECT * FROM `zt_hdc` WHERE id  = '2581'
  SELECT * FROM `zt_task` WHERE story  = '3342' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:00:16',`actReqComfimEndDate` = '2016-10-23 15:00:16',`techDesign` = '陈俊/4268',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-25',`onCodingStartDate` = '2016-10-25',`codeDevelop` = '陈俊/4268',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-03 10:37:04',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:04',`actTestEndDate` = '2016-11-14 14:02:04',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:30:18' WHERE id  = '2582'
  SELECT * FROM `zt_hdc` WHERE id  = '2582'

20161129 09:30:20: /ztp/zentaopms/www/index.php?m=correspondent&f=check
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' ORDER BY t1.`id` DESC 
  SELECT COUNT(*) AS recTotal FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' ORDER BY t1.`id` DESC 
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:30:21: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:30:23: /ztp/zentaopms/www/index.php?m=correspondent&f=passorrefuse&optid=7&type=pass
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  UPDATE `zt_approval` SET  `opinion` = '2', `editor` = '11014', `edit_time` = '2016-11-29 09:30:23' WHERE id  = '7'
  SELECT t1.id,t1.custome_id,t1.buyproject,t2.protimeend FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  WHERE t1.id  = '7'
  INSERT INTO `zt_csicode` SET `user_id` = '11014',`release_id` = '3',`custome_id` = '4',`csi_code` = 'ac669571ec2282aa035f13ff2beb7fd9',`expire_date` = '0000-00-00'
  INSERT INTO `zt_csicode` SET `user_id` = '11014',`release_id` = '4',`custome_id` = '4',`csi_code` = '8bfaa615d0e5b61ec95529777decf784',`expire_date` = '0000-00-00'
  INSERT INTO `zt_csicode` SET `user_id` = '11014',`release_id` = '2',`custome_id` = '4',`csi_code` = '130990a75fe009745e0741d7c7f1bfaf',`expire_date` = '0000-00-00'

20161129 09:30:23: /ztp/zentaopms/www/index.php?m=correspondent&f=check
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' ORDER BY t1.`id` DESC 
  SELECT COUNT(*) AS recTotal FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' 
  SELECT t1.*,t2.companyname,t2.create_by,t2.contractid,t2.promanager,t2.protimebegan,t2.protimeend,t3.name as projectname,t5.name as deptname FROM `zt_approval` AS t1  LEFT JOIN `zt_custome` AS t2  ON t1.custome_id = t2.id  LEFT JOIN `zt_project` AS t3  ON t2.project_id = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.create_by = t4.account  LEFT JOIN `zt_dept` AS t5  ON t4.dept = t5.id  WHERE t2.status  = '1' AND  t1.opinion  = '0' ORDER BY t1.`id` DESC 
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:30:23: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:30:26: /ztp/zentaopms/www/index.php?m=correspondent&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:30:26: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:30:29: /ztp/zentaopms/www/index.php?m=correspondent&f=detail&id=4
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_csicode` WHERE custome_id  = '4' AND  user_id  = '11014'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:32:08: /ztp/zentaopms/www/index.php?m=distribution&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = ''
  SELECT * FROM `zt_branch` WHERE product IN ('') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('')
  SELECT openedVersion FROM `zt_project` WHERE id  = ''
  SELECT openedVersion FROM `zt_project` WHERE id  = ''
  SELECT * FROM `zt_module` WHERE root  = '0' AND  type  = 'task' ORDER BY `grade` desc,`order` 
  SELECT t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT COUNT(*) AS recTotal FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT t1.id,t1.product,t1.date,t1.desc,t1.name, t2.name as productName,t4.realname as manager, t3.name as buildName FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  LEFT JOIN `zt_user` AS t4  ON t2.po = t4.account  WHERE t1.deleted  = '0'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:32:08: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'distribution' ORDER BY `id` asc 

20161129 09:32:19: /ztp/zentaopms/www/index.php?m=product&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *,  IF(INSTR(" closed", status) < 2, 0, 1) AS isClosed FROM `zt_product` WHERE deleted  = '0' ORDER BY `isClosed`,`order` desc 
  SELECT distinct t1.id FROM `zt_product` AS t1  LEFT JOIN `zt_projectproduct` AS t2  ON t1.id = t2.product  LEFT JOIN `zt_team` AS t3  ON t2.project = t3.project  LEFT JOIN `zt_project` AS t4  ON t2.project = t4.id  WHERE t1.acl  = 'open' OR (t1.acl = 'custom' AND (INSTR(CONCAT(',', t1.whitelist, ','), ',1,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',12,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',14,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',22,') > 0))  OR t1.PO  = '11014' OR t1.QD  = '11014' OR t1.RD  = '11014' OR t1.createdBy  = '11014' OR t3.account  = '11014' AND  t1.deleted  = '0' AND  t4.deleted  = '0'

20161129 09:32:20: /ztp/zentaopms/www/index.php?m=product&f=browse
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *,  IF(INSTR(" closed", status) < 2, 0, 1) AS isClosed FROM `zt_product` WHERE deleted  = '0' ORDER BY `isClosed`,`order` desc 
  SELECT distinct t1.id FROM `zt_product` AS t1  LEFT JOIN `zt_projectproduct` AS t2  ON t1.id = t2.product  LEFT JOIN `zt_team` AS t3  ON t2.project = t3.project  LEFT JOIN `zt_project` AS t4  ON t2.project = t4.id  WHERE t1.acl  = 'open' OR (t1.acl = 'custom' AND (INSTR(CONCAT(',', t1.whitelist, ','), ',1,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',12,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',14,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',22,') > 0))  OR t1.PO  = '11014' OR t1.QD  = '11014' OR t1.RD  = '11014' OR t1.createdBy  = '11014' OR t3.account  = '11014' AND  t1.deleted  = '0' AND  t4.deleted  = '0'
  SELECT * FROM `zt_product` WHERE `id` = '1' 
  SELECT * FROM `zt_story` WHERE product IN ('1') AND  status IN ('','draft','active','changed') AND  deleted  = '0' ORDER BY `id` desc 
  SELECT COUNT(*) AS recTotal FROM `zt_story` WHERE product IN ('1') AND  status IN ('','draft','active','changed') AND  deleted  = '0' 
  SELECT * FROM `zt_story` WHERE product IN ('1') AND  status IN ('','draft','active','changed') AND  deleted  = '0' ORDER BY `id` desc   limit 0, 20 
  SELECT * FROM `zt_story` WHERE product IN ('1') AND  status IN ('','draft','active','changed') AND  deleted  = '0' ORDER BY `id` desc   limit 0, 20 
  SELECT id,title FROM `zt_productplan` WHERE product IN ('1') AND  deleted  = '0'
  SELECT * FROM `zt_storystage` WHERE branch IN ('0')
  SELECT * FROM `zt_story` WHERE product IN ('1') AND  status IN ('','draft','active','changed') AND  deleted  = '0' ORDER BY `id` desc   limit 0, 20 
  SELECT id,CONCAT(title, " [", begin, " ~ ", end, "]") as title FROM `zt_productplan` WHERE product IN ('1') AND  deleted  = '0' ORDER BY `begin` desc 
  SELECT * FROM `zt_product` WHERE `id` = '1' 
  SELECT * FROM `zt_module` WHERE root  = '1' AND  type  = 'story' ORDER BY `grade` desc,`order` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'story' ORDER BY `id` asc 
  SELECT * FROM `zt_product` WHERE `id` = '1' 
  SELECT id,CONCAT(title, " [", begin, " ~ ", end, "]") as title FROM `zt_productplan` WHERE product IN ('1') AND  deleted  = '0' ORDER BY `begin` desc 
  SELECT DISTINCT story FROM `zt_case` WHERE story IN ('3552','3499','3498','3349','3321','3308','3296','3295','3280','2502','2484','2302','2188','2179','2160','1992','1988','1872','1648','1647')
  SELECT * FROM `zt_product` WHERE `id` = '1' 
  SELECT * FROM `zt_module` WHERE root  = '1' AND  type  = 'story' ORDER BY `grade` desc,`order` 
  SELECT account, realname, deleted, INSTR(',pd,po,', role) AS roleOrder FROM `zt_user` WHERE deleted  = '0' ORDER BY `roleOrder` DESC,`account` 
  SELECT * FROM `zt_product` WHERE `id` = '1' 
  SELECT * FROM `zt_module` WHERE root  = '1' AND  type  = 'story' ORDER BY `grade` desc,`order` 
  SELECT * FROM `zt_branch` WHERE product  = '1' AND  deleted  = '0' ORDER BY `id` asc 
  SELECT * FROM `zt_product` WHERE `id` = '1' 
  SELECT * FROM `zt_storystage` WHERE story IN ('3552','3499','3498','3349','3321','3308','3296','3295','3280','2502','2484','2302','2188','2179','2160','1992','1988','1872','1648','1647')
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:32:23: /ztp/zentaopms/www/index.php?m=release&f=browse&productID=1
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_product` WHERE `id` = '1' 
  SELECT *,  IF(INSTR(" closed", status) < 2, 0, 1) AS isClosed FROM `zt_product` WHERE deleted  = '0' ORDER BY `isClosed`,`order` desc 
  SELECT distinct t1.id FROM `zt_product` AS t1  LEFT JOIN `zt_projectproduct` AS t2  ON t1.id = t2.product  LEFT JOIN `zt_team` AS t3  ON t2.project = t3.project  LEFT JOIN `zt_project` AS t4  ON t2.project = t4.id  WHERE t1.acl  = 'open' OR (t1.acl = 'custom' AND (INSTR(CONCAT(',', t1.whitelist, ','), ',1,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',12,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',14,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',22,') > 0))  OR t1.PO  = '11014' OR t1.QD  = '11014' OR t1.RD  = '11014' OR t1.createdBy  = '11014' OR t3.account  = '11014' AND  t1.deleted  = '0' AND  t4.deleted  = '0'
  SELECT * FROM `zt_product` WHERE `id` = '1' 
  SELECT t1.*, t2.name as productName, t3.name as buildName FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  WHERE t1.product  = '1' AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:32:25: /ztp/zentaopms/www/index.php?m=release&f=create&product=1&branch=0
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.id, t1.name, t1.project, t2.status as projectStatus, t3.id as releaseID, t3.status as releaseStatus, t4.name as branchName FROM `zt_build` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project = t2.id  LEFT JOIN `zt_release` AS t3  ON t1.id = t3.build  LEFT JOIN `zt_branch` AS t4  ON t1.branch = t4.id  WHERE t1.product IN ('1') AND  t1.deleted  = '0' ORDER BY t1.`date` desc,t1.`id` desc 
  SELECT build FROM `zt_release` WHERE deleted  = '0' AND  product  = '1'
  SELECT * FROM `zt_product` WHERE `id` = '1' 
  SELECT *,  IF(INSTR(" closed", status) < 2, 0, 1) AS isClosed FROM `zt_product` WHERE deleted  = '0' ORDER BY `isClosed`,`order` desc 
  SELECT distinct t1.id FROM `zt_product` AS t1  LEFT JOIN `zt_projectproduct` AS t2  ON t1.id = t2.product  LEFT JOIN `zt_team` AS t3  ON t2.project = t3.project  LEFT JOIN `zt_project` AS t4  ON t2.project = t4.id  WHERE t1.acl  = 'open' OR (t1.acl = 'custom' AND (INSTR(CONCAT(',', t1.whitelist, ','), ',1,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',12,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',14,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',22,') > 0))  OR t1.PO  = '11014' OR t1.QD  = '11014' OR t1.RD  = '11014' OR t1.createdBy  = '11014' OR t3.account  = '11014' AND  t1.deleted  = '0' AND  t4.deleted  = '0'
  SELECT * FROM `zt_product` WHERE `id` = '1' 
  SELECT id, name FROM `zt_release` WHERE product  = '1' ORDER BY `date` DESC  LIMIT 1 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:32:27: /ztp/zentaopms/www/index.php?m=project&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t2.id, t2.name, t2.type, t1.branch FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT id, name FROM `zt_project` WHERE parent  = '9'
  SELECT t1.*, t1.hours * t1.days AS totalHours, if(t2.deleted='0', t2.realname, t1.account) as realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '9'
  SELECT commiter, account, realname FROM `zt_user` WHERE commiter  != ''
  SELECT * FROM `zt_action` WHERE objectType IN('project', 'testtask', 'build')  AND  project  = '9' ORDER BY `date`,`id` 
  SELECT * FROM `zt_history` WHERE action IN ('4000','4531','4890','7541','7542','7740','8362','9709','10734','10743','26561') ORDER BY `id` 
  SELECT name FROM `zt_build` WHERE id  = '5'
  SELECT name FROM `zt_testtask` WHERE id  = '2'
  SELECT name FROM `zt_build` WHERE id  = '6'
  SELECT name FROM `zt_build` WHERE id  = '8'
  SELECT name FROM `zt_build` WHERE id  = '9'
  SELECT name FROM `zt_build` WHERE id  = '15'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_block` WHERE account  = '11014' AND  module  = 'project' AND  hidden  = '0' ORDER BY `order` 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:32:27: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=583&module=project
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '583'
  DESC `zt_task`
  SELECT t1.*, t2.id as projectID, t2.name as projectName, t3.id as storyID, t3.title as storyTitle, t3.status AS storyStatus, t3.version AS latestStoryVersion FROM `zt_task` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project = t2.id  LEFT JOIN `zt_story` AS t3  ON t1.story = t3.id  WHERE t1.deleted  = '0' AND  t1.assignedTo  = '11014' ORDER BY `id` desc  LIMIT 15 
  SELECT t1.*, t2.id as projectID, t2.name as projectName, t3.id as storyID, t3.title as storyTitle, t3.status AS storyStatus, t3.version AS latestStoryVersion FROM `zt_task` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project = t2.id  LEFT JOIN `zt_story` AS t3  ON t1.story = t3.id  WHERE t1.deleted  = '0' AND  t1.assignedTo  = '11014' ORDER BY `id` desc  LIMIT 15 

20161129 09:32:27: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=582&module=project
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '582'
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  status IN ('doing') AND  deleted  = '0' ORDER BY `order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE id IN ('9','1','1589') ORDER BY `order` desc 
  SELECT COUNT(*) AS recTotal FROM `zt_project` WHERE id IN ('9','1','1589') 
  SELECT * FROM `zt_project` WHERE id IN ('9','1','1589') ORDER BY `order` desc 
  SELECT id, project, estimate, consumed, `left`, status, closedReason FROM `zt_task` WHERE project IN ('9','1','1589') AND  deleted  = '0'
  SELECT project, date AS name, `left` AS value FROM `zt_burn` WHERE project IN ('9','1','1589') ORDER BY `date` desc 

20161129 09:32:28: /ztp/zentaopms/www/index.php?m=project&f=build&projectID=9
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t2.id, t2.name, t2.type, t1.branch FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT id, name FROM `zt_project` WHERE parent  = '9'
  SELECT t1.*, t1.hours * t1.days AS totalHours, if(t2.deleted='0', t2.realname, t1.account) as realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '9'
  SELECT commiter, account, realname FROM `zt_user` WHERE commiter  != ''
  SELECT * FROM `zt_action` WHERE objectType IN('project', 'testtask', 'build')  AND  project  = '9' ORDER BY `date`,`id` 
  SELECT * FROM `zt_history` WHERE action IN ('4000','4531','4890','7541','7542','7740','8362','9709','10734','10743','26561') ORDER BY `id` 
  SELECT name FROM `zt_build` WHERE id  = '5'
  SELECT name FROM `zt_testtask` WHERE id  = '2'
  SELECT name FROM `zt_build` WHERE id  = '6'
  SELECT name FROM `zt_build` WHERE id  = '8'
  SELECT name FROM `zt_build` WHERE id  = '9'
  SELECT name FROM `zt_build` WHERE id  = '15'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t1.*, t2.name as projectName, t3.name as productName, t4.name as branchName FROM `zt_build` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project = t2.id  LEFT JOIN `zt_product` AS t3  ON t1.product = t3.id  LEFT JOIN `zt_branch` AS t4  ON t1.branch = t4.id  WHERE t1.project  = '9' AND  t1.deleted  = '0' ORDER BY t1.`date` DESC,t1.`id` desc 
  SELECT account, realname, deleted FROM `zt_user` ORDER BY `account` 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:32:29: /ztp/zentaopms/www/index.php?m=build&f=create&project=9
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t2.id, t2.name, t2.type, t1.branch FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT id, name FROM `zt_build` WHERE project  = '9' ORDER BY `date` DESC  LIMIT 1 
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:35:09: /ztp/zentaopms/www/index.php?m=cron&f=ajaxExec&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'cron' AND  section  = 'run' AND  `key`  = 'status'
  UPDATE `zt_config` SET  `value` = 'running' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  UPDATE `zt_cron` SET  `lastTime` = '2016-11-29 09:32:08' WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  UPDATE `zt_cron` SET `status` = 'normal',`lastTime` = '2016-11-29 09:32:08' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:33:08' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:33:08' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:34:08' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:34:08' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:35:08' WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '1'
  SELECT * FROM `zt_cron` WHERE id  = '2'
  SELECT * FROM `zt_cron` WHERE id  = '3'
  SELECT * FROM `zt_cron` WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:35:08' WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '4'
  SELECT * FROM `zt_cron` WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:35:08' WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE id  = '6'
  SELECT * FROM `zt_cron` WHERE id  = '7'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:35:08' WHERE id  = '7'
  SELECT * FROM `zt_mailqueue` WHERE 1=1  AND  status  = 'wait' ORDER BY `id` asc 
  SELECT id,status FROM `zt_mailqueue` ORDER BY `id` desc  LIMIT 1 
  DELETE FROM `zt_mailqueue` WHERE status  != 'wait' AND  sendTime  <= '2016-11-27 09:35:08'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '7'
  SELECT * FROM `zt_cron` WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:35:08' WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '8'
  SELECT * FROM `zt_cron` WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:35:08' WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '10'
  SELECT * FROM `zt_cron` WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:35:08' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:35:08' WHERE id  = '14'
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT COUNT(*) AS recTotal FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' 
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT * FROM `zt_task` WHERE story  = '655' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-05',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05',`actReqComfimEndDate` = '2016-08-05 12:33:50',`techDesign` = '符龙/9532',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-05',`onCodingStartDate` = '2016-08-05',`codeDevelop` = '符龙/9532',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-10 00:00:00',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-18 15:06:32',`actTestEndDate` = '2016-08-18 15:06:32',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-08-18',`actOnsiteTestEndDate` = '2016-08-18 11:46:30',`recopercent` = '100%',`confimDate` = '2016-08-18 11:46:30',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '80'
  SELECT * FROM `zt_hdc` WHERE id  = '80'
  SELECT * FROM `zt_task` WHERE story  = '657' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05 17:49:32',`actReqComfimEndDate` = '2016-08-05 17:49:32',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-25',`onCodingStartDate` = '2016-08-25',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-25 16:22:02',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:12',`actTestEndDate` = '2016-09-05 15:53:12',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:18:21',`actOnsiteTestEndDate` = '2016-10-31 16:18:21',`recopercent` = '100%',`confimDate` = '2016-10-31 16:18:21',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '81'
  SELECT * FROM `zt_hdc` WHERE id  = '81'
  SELECT * FROM `zt_task` WHERE story  = '658' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '亓义辉/8930',`actReqComfimBeganDate` = '2016-08-05 17:52:53',`actReqComfimEndDate` = '2016-08-05 17:52:53',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-09',`onCodingStartDate` = '2016-08-09',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:15:04',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:46',`actTestEndDate` = '2016-09-05 15:53:46',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:16:45',`actOnsiteTestEndDate` = '2016-10-31 16:16:45',`recopercent` = '100%',`confimDate` = '2016-10-31 16:16:45',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '82'
  SELECT * FROM `zt_hdc` WHERE id  = '82'
  SELECT * FROM `zt_task` WHERE story  = '659' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '段俊宇/3543',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '2016-08-11 11:29:36',`actReqComfimEndDate` = '2016-08-11 11:29:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-11',`onCodingStartDate` = '2016-08-11',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-11 11:36:52',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-11',`actTestEndDate` = '2016-08-11 11:38:35',`siteAccept` = '马佳怡/11624',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 09:36:27',`actOnsiteTestEndDate` = '2016-08-16 09:36:27',`recopercent` = '100%',`confimDate` = '2016-08-16 09:36:27',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '83'
  SELECT * FROM `zt_hdc` WHERE id  = '83'
  SELECT * FROM `zt_task` WHERE story  = '660' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '沈雨华/2376',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 15:09:31',`actOnsiteTestEndDate` = '2016-08-16 15:09:31',`recopercent` = '100%',`confimDate` = '2016-08-16 15:09:31',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '84'
  SELECT * FROM `zt_hdc` WHERE id  = '84'
  SELECT * FROM `zt_task` WHERE story  = '661' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '2016-08-17 14:35:59',`actReqComfimEndDate` = '2016-08-17 14:35:59',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-17 14:36:31',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '2016-08-16',`actCodeEndDate` = '2016-08-16 11:23:34',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:37:09',`actTestEndDate` = '2016-08-17 14:37:09',`siteAccept` = '林天桦/7409',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16',`actOnsiteTestEndDate` = '2016-08-16 16:21:33',`recopercent` = '100%',`confimDate` = '2016-08-16 16:21:33',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '85'
  SELECT * FROM `zt_hdc` WHERE id  = '85'
  SELECT * FROM `zt_task` WHERE story  = '662' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '何剑峰/8440',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '何剑峰/8440',`actReqComfimBeganDate` = '2016-08-17 14:54:19',`actReqComfimEndDate` = '2016-08-17 14:54:19',`techDesign` = '吕立元/4279',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-16 00:00:00',`codeDevelop` = '刘杰/5285',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-29 15:32:41',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-10',`actTestEndDate` = '2016-09-10 14:54:36',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-11-04 09:10:03',`actOnsiteTestEndDate` = '2016-11-04 09:10:03',`recopercent` = '100%',`confimDate` = '2016-11-04 09:10:03',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '86'
  SELECT * FROM `zt_hdc` WHERE id  = '86'
  SELECT * FROM `zt_task` WHERE story  = '663' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '87'
  SELECT * FROM `zt_hdc` WHERE id  = '87'
  SELECT * FROM `zt_task` WHERE story  = '664' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '黄乐/2529',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '黄乐/2529',`actReqComfimBeganDate` = '2016-08-17 14:32:36',`actReqComfimEndDate` = '2016-08-17 14:32:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:36:14',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:58:09',`actTestEndDate` = '2016-08-17 14:58:09',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-17 14:59:11',`actOnsiteTestEndDate` = '2016-08-17 14:59:11',`recopercent` = '100%',`confimDate` = '2016-08-17 14:59:11',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '88'
  SELECT * FROM `zt_hdc` WHERE id  = '88'
  SELECT * FROM `zt_task` WHERE story  = '686' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:11:37',`actReqComfimEndDate` = '2016-08-25 14:11:37',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:58:10',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-05 15:27:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:10:58',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-14',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '110'
  SELECT * FROM `zt_hdc` WHERE id  = '110'
  SELECT * FROM `zt_task` WHERE story  = '687' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17 14:06:53',`actReqComfimEndDate` = '2016-08-17 14:06:53',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-19 15:05:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:11:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-04 09:09:37',`actOnsiteTestEndDate` = '2016-11-04 09:09:37',`recopercent` = '100%',`confimDate` = '2016-11-04 09:09:37',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '111'
  SELECT * FROM `zt_hdc` WHERE id  = '111'
  SELECT * FROM `zt_task` WHERE story  = '688' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17',`actReqComfimEndDate` = '',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-08-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '112'
  SELECT * FROM `zt_hdc` WHERE id  = '112'
  SELECT * FROM `zt_task` WHERE story  = '689' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-18 10:10:05',`actReqComfimEndDate` = '2016-08-18 10:10:05',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:56:25',`codeDevelop` = '李德远/8741',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-24 17:47:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-08-31 17:52:42',`actTestEndDate` = '2016-08-31 17:52:42',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:11',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:11',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '113'
  SELECT * FROM `zt_hdc` WHERE id  = '113'
  SELECT * FROM `zt_task` WHERE story  = '690' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-11',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:06:22',`actReqComfimEndDate` = '2016-08-25 14:06:22',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-31 17:55:48',`codeDevelop` = '曹天娇/10340',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-31 17:25:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 15:26:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:26',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:26',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '114'
  SELECT * FROM `zt_hdc` WHERE id  = '114'
  SELECT * FROM `zt_task` WHERE story  = '902' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-02',`actReqComfimEndDate` = '2016-09-02 16:28:37',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-02 16:42:58',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-09-09',`actTestEndDate` = '2016-09-09 18:06:39',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-16',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '275'
  SELECT * FROM `zt_hdc` WHERE id  = '275'
  SELECT * FROM `zt_task` WHERE story  = '1630' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '贺斌/868',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '谢娇艳/2413',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '947'
  SELECT * FROM `zt_hdc` WHERE id  = '947'
  SELECT * FROM `zt_task` WHERE story  = '1631' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-28',`actReqComfimEndDate` = '2016-09-28 10:37:15',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-28 10:37:41',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-28 17:30:34',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-10-23 15:01:58',`actTestEndDate` = '2016-10-23 15:01:58',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-10-05 01:06:35',`actOnsiteTestEndDate` = '2016-10-05 01:06:35',`recopercent` = '100%',`confimDate` = '2016-10-05 01:06:35',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '948'
  SELECT * FROM `zt_hdc` WHERE id  = '948'
  SELECT * FROM `zt_task` WHERE story  = '3340' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:45',`actReqComfimEndDate` = '2016-10-23 15:01:45',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-24',`onCodingStartDate` = '2016-10-24',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-01 18:41:12',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:03:10',`actTestEndDate` = '2016-11-14 14:03:10',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '2580'
  SELECT * FROM `zt_hdc` WHERE id  = '2580'
  SELECT * FROM `zt_task` WHERE story  = '3341' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-10-23',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:28',`actReqComfimEndDate` = '2016-10-23 15:01:28',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-11-01',`onCodingStartDate` = '2016-11-01',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-02 19:25:10',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:37',`actTestEndDate` = '2016-11-14 14:02:37',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '2581'
  SELECT * FROM `zt_hdc` WHERE id  = '2581'
  SELECT * FROM `zt_task` WHERE story  = '3342' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:00:16',`actReqComfimEndDate` = '2016-10-23 15:00:16',`techDesign` = '陈俊/4268',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-25',`onCodingStartDate` = '2016-10-25',`codeDevelop` = '陈俊/4268',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-03 10:37:04',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:04',`actTestEndDate` = '2016-11-14 14:02:04',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:35:09' WHERE id  = '2582'
  SELECT * FROM `zt_hdc` WHERE id  = '2582'

20161129 09:42:30: /ztp/zentaopms/www/index.php?m=misc&f=ping&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE 1 = 1  AND  owner IN ('system') AND  module IN ('common') AND  section IN ('global') AND  `key` IN ('sn')

20161129 09:47:18: /ztp/zentaopms/www/index.php?m=correspondent&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:47:19: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:47:19: /ztp/zentaopms/www/index.php?m=correspondent&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:47:20: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:47:24: /ztp/zentaopms/www/index.php?m=correspondent&f=detail&id=1
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_csicode` WHERE custome_id  = '1' AND  user_id  = '11014'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:47:27: /ztp/zentaopms/www/index.php?m=correspondent&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:47:27: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:47:29: /ztp/zentaopms/www/index.php?m=correspondent&f=index&browseType=customerlist
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:47:29: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:48:41: /ztp/zentaopms/www/index.php?m=correspondent&f=detail&id=4
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t1.*,t2.name as productname FROM `zt_release` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  LEFT JOIN `zt_build` AS t3  ON t1.build = t3.id  AND  t1.deleted  = '0' ORDER BY t1.`date` DESC 
  SELECT * FROM `zt_csicode` WHERE custome_id  = '4' AND  user_id  = '11014'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:49:15: /ztp/zentaopms/www/index.php?m=correspondent&f=index&browseType=customerlist
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT COUNT(*) AS recTotal FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT t1.*,t2.name as projectname FROM `zt_custome` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 09:49:15: /ztp/zentaopms/www/index.php?m=search&f=buildForm&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'correspondent' ORDER BY `id` asc 

20161129 09:50:18: /ztp/zentaopms/www/index.php?m=cron&f=ajaxExec&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'cron' AND  section  = 'run' AND  `key`  = 'status'
  UPDATE `zt_config` SET  `value` = 'running' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  UPDATE `zt_cron` SET  `lastTime` = '2016-11-29 09:47:18' WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  UPDATE `zt_cron` SET `status` = 'normal',`lastTime` = '2016-11-29 09:47:18' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:48:18' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:48:18' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:49:18' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:49:18' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:50:18' WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '1'
  SELECT * FROM `zt_cron` WHERE id  = '2'
  SELECT * FROM `zt_cron` WHERE id  = '3'
  SELECT * FROM `zt_cron` WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:50:18' WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '4'
  SELECT * FROM `zt_cron` WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:50:18' WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE id  = '6'
  SELECT * FROM `zt_cron` WHERE id  = '7'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:50:18' WHERE id  = '7'
  SELECT * FROM `zt_mailqueue` WHERE 1=1  AND  status  = 'wait' ORDER BY `id` asc 
  SELECT id,status FROM `zt_mailqueue` ORDER BY `id` desc  LIMIT 1 
  DELETE FROM `zt_mailqueue` WHERE status  != 'wait' AND  sendTime  <= '2016-11-27 09:50:18'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '7'
  SELECT * FROM `zt_cron` WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:50:18' WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '8'
  SELECT * FROM `zt_cron` WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:50:18' WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '10'
  SELECT * FROM `zt_cron` WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:50:18' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 09:50:18' WHERE id  = '14'
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT COUNT(*) AS recTotal FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' 
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT * FROM `zt_task` WHERE story  = '655' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-05',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05',`actReqComfimEndDate` = '2016-08-05 12:33:50',`techDesign` = '符龙/9532',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-05',`onCodingStartDate` = '2016-08-05',`codeDevelop` = '符龙/9532',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-10 00:00:00',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-18 15:06:32',`actTestEndDate` = '2016-08-18 15:06:32',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-08-18',`actOnsiteTestEndDate` = '2016-08-18 11:46:30',`recopercent` = '100%',`confimDate` = '2016-08-18 11:46:30',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '80'
  SELECT * FROM `zt_hdc` WHERE id  = '80'
  SELECT * FROM `zt_task` WHERE story  = '657' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05 17:49:32',`actReqComfimEndDate` = '2016-08-05 17:49:32',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-25',`onCodingStartDate` = '2016-08-25',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-25 16:22:02',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:12',`actTestEndDate` = '2016-09-05 15:53:12',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:18:21',`actOnsiteTestEndDate` = '2016-10-31 16:18:21',`recopercent` = '100%',`confimDate` = '2016-10-31 16:18:21',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '81'
  SELECT * FROM `zt_hdc` WHERE id  = '81'
  SELECT * FROM `zt_task` WHERE story  = '658' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '亓义辉/8930',`actReqComfimBeganDate` = '2016-08-05 17:52:53',`actReqComfimEndDate` = '2016-08-05 17:52:53',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-09',`onCodingStartDate` = '2016-08-09',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:15:04',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:46',`actTestEndDate` = '2016-09-05 15:53:46',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:16:45',`actOnsiteTestEndDate` = '2016-10-31 16:16:45',`recopercent` = '100%',`confimDate` = '2016-10-31 16:16:45',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '82'
  SELECT * FROM `zt_hdc` WHERE id  = '82'
  SELECT * FROM `zt_task` WHERE story  = '659' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '段俊宇/3543',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '2016-08-11 11:29:36',`actReqComfimEndDate` = '2016-08-11 11:29:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-11',`onCodingStartDate` = '2016-08-11',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-11 11:36:52',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-11',`actTestEndDate` = '2016-08-11 11:38:35',`siteAccept` = '马佳怡/11624',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 09:36:27',`actOnsiteTestEndDate` = '2016-08-16 09:36:27',`recopercent` = '100%',`confimDate` = '2016-08-16 09:36:27',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '83'
  SELECT * FROM `zt_hdc` WHERE id  = '83'
  SELECT * FROM `zt_task` WHERE story  = '660' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '沈雨华/2376',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 15:09:31',`actOnsiteTestEndDate` = '2016-08-16 15:09:31',`recopercent` = '100%',`confimDate` = '2016-08-16 15:09:31',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '84'
  SELECT * FROM `zt_hdc` WHERE id  = '84'
  SELECT * FROM `zt_task` WHERE story  = '661' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '2016-08-17 14:35:59',`actReqComfimEndDate` = '2016-08-17 14:35:59',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-17 14:36:31',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '2016-08-16',`actCodeEndDate` = '2016-08-16 11:23:34',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:37:09',`actTestEndDate` = '2016-08-17 14:37:09',`siteAccept` = '林天桦/7409',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16',`actOnsiteTestEndDate` = '2016-08-16 16:21:33',`recopercent` = '100%',`confimDate` = '2016-08-16 16:21:33',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '85'
  SELECT * FROM `zt_hdc` WHERE id  = '85'
  SELECT * FROM `zt_task` WHERE story  = '662' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '何剑峰/8440',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '何剑峰/8440',`actReqComfimBeganDate` = '2016-08-17 14:54:19',`actReqComfimEndDate` = '2016-08-17 14:54:19',`techDesign` = '吕立元/4279',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-16 00:00:00',`codeDevelop` = '刘杰/5285',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-29 15:32:41',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-10',`actTestEndDate` = '2016-09-10 14:54:36',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-11-04 09:10:03',`actOnsiteTestEndDate` = '2016-11-04 09:10:03',`recopercent` = '100%',`confimDate` = '2016-11-04 09:10:03',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '86'
  SELECT * FROM `zt_hdc` WHERE id  = '86'
  SELECT * FROM `zt_task` WHERE story  = '663' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '87'
  SELECT * FROM `zt_hdc` WHERE id  = '87'
  SELECT * FROM `zt_task` WHERE story  = '664' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '黄乐/2529',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '黄乐/2529',`actReqComfimBeganDate` = '2016-08-17 14:32:36',`actReqComfimEndDate` = '2016-08-17 14:32:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:36:14',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:58:09',`actTestEndDate` = '2016-08-17 14:58:09',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-17 14:59:11',`actOnsiteTestEndDate` = '2016-08-17 14:59:11',`recopercent` = '100%',`confimDate` = '2016-08-17 14:59:11',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '88'
  SELECT * FROM `zt_hdc` WHERE id  = '88'
  SELECT * FROM `zt_task` WHERE story  = '686' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:11:37',`actReqComfimEndDate` = '2016-08-25 14:11:37',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:58:10',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-05 15:27:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:10:58',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-14',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '110'
  SELECT * FROM `zt_hdc` WHERE id  = '110'
  SELECT * FROM `zt_task` WHERE story  = '687' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17 14:06:53',`actReqComfimEndDate` = '2016-08-17 14:06:53',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-19 15:05:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:11:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-04 09:09:37',`actOnsiteTestEndDate` = '2016-11-04 09:09:37',`recopercent` = '100%',`confimDate` = '2016-11-04 09:09:37',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '111'
  SELECT * FROM `zt_hdc` WHERE id  = '111'
  SELECT * FROM `zt_task` WHERE story  = '688' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17',`actReqComfimEndDate` = '',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-08-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '112'
  SELECT * FROM `zt_hdc` WHERE id  = '112'
  SELECT * FROM `zt_task` WHERE story  = '689' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-18 10:10:05',`actReqComfimEndDate` = '2016-08-18 10:10:05',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:56:25',`codeDevelop` = '李德远/8741',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-24 17:47:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-08-31 17:52:42',`actTestEndDate` = '2016-08-31 17:52:42',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:11',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:11',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '113'
  SELECT * FROM `zt_hdc` WHERE id  = '113'
  SELECT * FROM `zt_task` WHERE story  = '690' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-11',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:06:22',`actReqComfimEndDate` = '2016-08-25 14:06:22',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-31 17:55:48',`codeDevelop` = '曹天娇/10340',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-31 17:25:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 15:26:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:26',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:26',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '114'
  SELECT * FROM `zt_hdc` WHERE id  = '114'
  SELECT * FROM `zt_task` WHERE story  = '902' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-02',`actReqComfimEndDate` = '2016-09-02 16:28:37',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-02 16:42:58',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-09-09',`actTestEndDate` = '2016-09-09 18:06:39',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-16',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '275'
  SELECT * FROM `zt_hdc` WHERE id  = '275'
  SELECT * FROM `zt_task` WHERE story  = '1630' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '贺斌/868',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '谢娇艳/2413',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '947'
  SELECT * FROM `zt_hdc` WHERE id  = '947'
  SELECT * FROM `zt_task` WHERE story  = '1631' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-28',`actReqComfimEndDate` = '2016-09-28 10:37:15',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-28 10:37:41',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-28 17:30:34',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-10-23 15:01:58',`actTestEndDate` = '2016-10-23 15:01:58',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-10-05 01:06:35',`actOnsiteTestEndDate` = '2016-10-05 01:06:35',`recopercent` = '100%',`confimDate` = '2016-10-05 01:06:35',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '948'
  SELECT * FROM `zt_hdc` WHERE id  = '948'
  SELECT * FROM `zt_task` WHERE story  = '3340' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:45',`actReqComfimEndDate` = '2016-10-23 15:01:45',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-24',`onCodingStartDate` = '2016-10-24',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-01 18:41:12',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:03:10',`actTestEndDate` = '2016-11-14 14:03:10',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '2580'
  SELECT * FROM `zt_hdc` WHERE id  = '2580'
  SELECT * FROM `zt_task` WHERE story  = '3341' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-10-23',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:28',`actReqComfimEndDate` = '2016-10-23 15:01:28',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-11-01',`onCodingStartDate` = '2016-11-01',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-02 19:25:10',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:37',`actTestEndDate` = '2016-11-14 14:02:37',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '2581'
  SELECT * FROM `zt_hdc` WHERE id  = '2581'
  SELECT * FROM `zt_task` WHERE story  = '3342' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:00:16',`actReqComfimEndDate` = '2016-10-23 15:00:16',`techDesign` = '陈俊/4268',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-25',`onCodingStartDate` = '2016-10-25',`codeDevelop` = '陈俊/4268',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-03 10:37:04',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:04',`actTestEndDate` = '2016-11-14 14:02:04',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 09:50:18' WHERE id  = '2582'
  SELECT * FROM `zt_hdc` WHERE id  = '2582'

20161129 09:59:15: /ztp/zentaopms/www/index.php?m=misc&f=ping&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE 1 = 1  AND  owner IN ('system') AND  module IN ('common') AND  section IN ('global') AND  `key` IN ('sn')

20161129 10:09:05: /ztp/zentaopms/www/index.php?m=project&f=index
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t2.id, t2.name, t2.type, t1.branch FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT id, name FROM `zt_project` WHERE parent  = '9'
  SELECT t1.*, t1.hours * t1.days AS totalHours, if(t2.deleted='0', t2.realname, t1.account) as realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '9'
  SELECT commiter, account, realname FROM `zt_user` WHERE commiter  != ''
  SELECT * FROM `zt_action` WHERE objectType IN('project', 'testtask', 'build')  AND  project  = '9' ORDER BY `date`,`id` 
  SELECT * FROM `zt_history` WHERE action IN ('4000','4531','4890','7541','7542','7740','8362','9709','10734','10743','26561') ORDER BY `id` 
  SELECT name FROM `zt_build` WHERE id  = '5'
  SELECT name FROM `zt_testtask` WHERE id  = '2'
  SELECT name FROM `zt_build` WHERE id  = '6'
  SELECT name FROM `zt_build` WHERE id  = '8'
  SELECT name FROM `zt_build` WHERE id  = '9'
  SELECT name FROM `zt_build` WHERE id  = '15'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_block` WHERE account  = '11014' AND  module  = 'project' AND  hidden  = '0' ORDER BY `order` 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 10:09:06: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=582&module=project
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '582'
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  status IN ('doing') AND  deleted  = '0' ORDER BY `order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE id IN ('9','1','1589') ORDER BY `order` desc 
  SELECT COUNT(*) AS recTotal FROM `zt_project` WHERE id IN ('9','1','1589') 
  SELECT * FROM `zt_project` WHERE id IN ('9','1','1589') ORDER BY `order` desc 
  SELECT id, project, estimate, consumed, `left`, status, closedReason FROM `zt_task` WHERE project IN ('9','1','1589') AND  deleted  = '0'
  SELECT project, date AS name, `left` AS value FROM `zt_burn` WHERE project IN ('9','1','1589') ORDER BY `date` desc 

20161129 10:09:06: /ztp/zentaopms/www/index.php?m=block&f=printBlock&id=583&module=project
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_block` WHERE id  = '583'
  DESC `zt_task`
  SELECT t1.*, t2.id as projectID, t2.name as projectName, t3.id as storyID, t3.title as storyTitle, t3.status AS storyStatus, t3.version AS latestStoryVersion FROM `zt_task` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project = t2.id  LEFT JOIN `zt_story` AS t3  ON t1.story = t3.id  WHERE t1.deleted  = '0' AND  t1.assignedTo  = '11014' ORDER BY `id` desc  LIMIT 15 
  SELECT t1.*, t2.id as projectID, t2.name as projectName, t3.id as storyID, t3.title as storyTitle, t3.status AS storyStatus, t3.version AS latestStoryVersion FROM `zt_task` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project = t2.id  LEFT JOIN `zt_story` AS t3  ON t1.story = t3.id  WHERE t1.deleted  = '0' AND  t1.assignedTo  = '11014' ORDER BY `id` desc  LIMIT 15 

20161129 10:09:10: /ztp/zentaopms/www/index.php?m=project&f=story&projectID=9
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t2.id, t2.name, t2.type, t1.branch FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT id, name FROM `zt_project` WHERE parent  = '9'
  SELECT t1.*, t1.hours * t1.days AS totalHours, if(t2.deleted='0', t2.realname, t1.account) as realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '9'
  SELECT commiter, account, realname FROM `zt_user` WHERE commiter  != ''
  SELECT * FROM `zt_action` WHERE objectType IN('project', 'testtask', 'build')  AND  project  = '9' ORDER BY `date`,`id` 
  SELECT * FROM `zt_history` WHERE action IN ('4000','4531','4890','7541','7542','7740','8362','9709','10734','10743','26561') ORDER BY `id` 
  SELECT name FROM `zt_build` WHERE id  = '5'
  SELECT name FROM `zt_testtask` WHERE id  = '2'
  SELECT name FROM `zt_build` WHERE id  = '6'
  SELECT name FROM `zt_build` WHERE id  = '8'
  SELECT name FROM `zt_build` WHERE id  = '9'
  SELECT name FROM `zt_build` WHERE id  = '15'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT COUNT(distinct t2.id) AS recTotal FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT story, COUNT(*) AS tasks FROM `zt_task` WHERE story IN ('225','230','232','233','234','229','235','236') AND  deleted  = '0' AND  project  = '9' GROUP BY story
  SELECT account, realname, deleted FROM `zt_user` ORDER BY `account` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT DISTINCT story FROM `zt_case` WHERE story IN ('225','230','232','233','234','229','235','236')
  SELECT DISTINCT t3.path FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_module` AS t3  ON t2.module = t3.id  WHERE t1.project  = '9'
  SELECT path FROM `zt_module` WHERE root  = '9' AND  type  = 'task'
  SELECT DISTINCT t1.path FROM `zt_module` AS t1  LEFT JOIN `zt_task` AS t2  ON t1.id=t2.module  WHERE t2.module  != '0' AND  t2.project  = '9' AND  t2.deleted  = '0' AND  t1.type  = 'story'
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT * FROM `zt_module` WHERE (root = 12 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE (root = 13 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE (root = 179 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 10:09:17: /ztp/zentaopms/www/index.php?m=project&f=story&projectID=9
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t2.id, t2.name, t2.type, t1.branch FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT id, name FROM `zt_project` WHERE parent  = '9'
  SELECT t1.*, t1.hours * t1.days AS totalHours, if(t2.deleted='0', t2.realname, t1.account) as realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '9'
  SELECT commiter, account, realname FROM `zt_user` WHERE commiter  != ''
  SELECT * FROM `zt_action` WHERE objectType IN('project', 'testtask', 'build')  AND  project  = '9' ORDER BY `date`,`id` 
  SELECT * FROM `zt_history` WHERE action IN ('4000','4531','4890','7541','7542','7740','8362','9709','10734','10743','26561') ORDER BY `id` 
  SELECT name FROM `zt_build` WHERE id  = '5'
  SELECT name FROM `zt_testtask` WHERE id  = '2'
  SELECT name FROM `zt_build` WHERE id  = '6'
  SELECT name FROM `zt_build` WHERE id  = '8'
  SELECT name FROM `zt_build` WHERE id  = '9'
  SELECT name FROM `zt_build` WHERE id  = '15'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT COUNT(distinct t2.id) AS recTotal FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT story, COUNT(*) AS tasks FROM `zt_task` WHERE story IN ('225','230','232','233','234','229','235','236') AND  deleted  = '0' AND  project  = '9' GROUP BY story
  SELECT account, realname, deleted FROM `zt_user` ORDER BY `account` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT DISTINCT story FROM `zt_case` WHERE story IN ('225','230','232','233','234','229','235','236')
  SELECT DISTINCT t3.path FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_module` AS t3  ON t2.module = t3.id  WHERE t1.project  = '9'
  SELECT path FROM `zt_module` WHERE root  = '9' AND  type  = 'task'
  SELECT DISTINCT t1.path FROM `zt_module` AS t1  LEFT JOIN `zt_task` AS t2  ON t1.id=t2.module  WHERE t2.module  != '0' AND  t2.project  = '9' AND  t2.deleted  = '0' AND  t1.type  = 'story'
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT * FROM `zt_module` WHERE (root = 12 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE (root = 13 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE (root = 179 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 10:09:18: /ztp/zentaopms/www/index.php?m=project&f=story&projectID=9
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t2.id, t2.name, t2.type, t1.branch FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT id, name FROM `zt_project` WHERE parent  = '9'
  SELECT t1.*, t1.hours * t1.days AS totalHours, if(t2.deleted='0', t2.realname, t1.account) as realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '9'
  SELECT commiter, account, realname FROM `zt_user` WHERE commiter  != ''
  SELECT * FROM `zt_action` WHERE objectType IN('project', 'testtask', 'build')  AND  project  = '9' ORDER BY `date`,`id` 
  SELECT * FROM `zt_history` WHERE action IN ('4000','4531','4890','7541','7542','7740','8362','9709','10734','10743','26561') ORDER BY `id` 
  SELECT name FROM `zt_build` WHERE id  = '5'
  SELECT name FROM `zt_testtask` WHERE id  = '2'
  SELECT name FROM `zt_build` WHERE id  = '6'
  SELECT name FROM `zt_build` WHERE id  = '8'
  SELECT name FROM `zt_build` WHERE id  = '9'
  SELECT name FROM `zt_build` WHERE id  = '15'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT COUNT(distinct t2.id) AS recTotal FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT story, COUNT(*) AS tasks FROM `zt_task` WHERE story IN ('225','230','232','233','234','229','235','236') AND  deleted  = '0' AND  project  = '9' GROUP BY story
  SELECT account, realname, deleted FROM `zt_user` ORDER BY `account` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT DISTINCT story FROM `zt_case` WHERE story IN ('225','230','232','233','234','229','235','236')
  SELECT DISTINCT t3.path FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_module` AS t3  ON t2.module = t3.id  WHERE t1.project  = '9'
  SELECT path FROM `zt_module` WHERE root  = '9' AND  type  = 'task'
  SELECT DISTINCT t1.path FROM `zt_module` AS t1  LEFT JOIN `zt_task` AS t2  ON t1.id=t2.module  WHERE t2.module  != '0' AND  t2.project  = '9' AND  t2.deleted  = '0' AND  t1.type  = 'story'
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT * FROM `zt_module` WHERE (root = 12 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE (root = 13 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE (root = 179 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 10:09:21: /ztp/zentaopms/www/index.php?m=project&f=story&projectID=9
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t2.id, t2.name, t2.type, t1.branch FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT id, name FROM `zt_project` WHERE parent  = '9'
  SELECT t1.*, t1.hours * t1.days AS totalHours, if(t2.deleted='0', t2.realname, t1.account) as realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '9'
  SELECT commiter, account, realname FROM `zt_user` WHERE commiter  != ''
  SELECT * FROM `zt_action` WHERE objectType IN('project', 'testtask', 'build')  AND  project  = '9' ORDER BY `date`,`id` 
  SELECT * FROM `zt_history` WHERE action IN ('4000','4531','4890','7541','7542','7740','8362','9709','10734','10743','26561') ORDER BY `id` 
  SELECT name FROM `zt_build` WHERE id  = '5'
  SELECT name FROM `zt_testtask` WHERE id  = '2'
  SELECT name FROM `zt_build` WHERE id  = '6'
  SELECT name FROM `zt_build` WHERE id  = '8'
  SELECT name FROM `zt_build` WHERE id  = '9'
  SELECT name FROM `zt_build` WHERE id  = '15'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT COUNT(distinct t2.id) AS recTotal FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT story, COUNT(*) AS tasks FROM `zt_task` WHERE story IN ('225','230','232','233','234','229','235','236') AND  deleted  = '0' AND  project  = '9' GROUP BY story
  SELECT account, realname, deleted FROM `zt_user` ORDER BY `account` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT DISTINCT story FROM `zt_case` WHERE story IN ('225','230','232','233','234','229','235','236')
  SELECT DISTINCT t3.path FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_module` AS t3  ON t2.module = t3.id  WHERE t1.project  = '9'
  SELECT path FROM `zt_module` WHERE root  = '9' AND  type  = 'task'
  SELECT DISTINCT t1.path FROM `zt_module` AS t1  LEFT JOIN `zt_task` AS t2  ON t1.id=t2.module  WHERE t2.module  != '0' AND  t2.project  = '9' AND  t2.deleted  = '0' AND  t1.type  = 'story'
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT * FROM `zt_module` WHERE (root = 12 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE (root = 13 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE (root = 179 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 10:09:23: /ztp/zentaopms/www/index.php?m=project&f=story&projectID=9
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t2.id, t2.name, t2.type, t1.branch FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT id, name FROM `zt_project` WHERE parent  = '9'
  SELECT t1.*, t1.hours * t1.days AS totalHours, if(t2.deleted='0', t2.realname, t1.account) as realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '9'
  SELECT commiter, account, realname FROM `zt_user` WHERE commiter  != ''
  SELECT * FROM `zt_action` WHERE objectType IN('project', 'testtask', 'build')  AND  project  = '9' ORDER BY `date`,`id` 
  SELECT * FROM `zt_history` WHERE action IN ('4000','4531','4890','7541','7542','7740','8362','9709','10734','10743','26561') ORDER BY `id` 
  SELECT name FROM `zt_build` WHERE id  = '5'
  SELECT name FROM `zt_testtask` WHERE id  = '2'
  SELECT name FROM `zt_build` WHERE id  = '6'
  SELECT name FROM `zt_build` WHERE id  = '8'
  SELECT name FROM `zt_build` WHERE id  = '9'
  SELECT name FROM `zt_build` WHERE id  = '15'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT COUNT(distinct t2.id) AS recTotal FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT distinct t1.*, t2.*,t3.branch as productBranch,t4.type as productType,t2.version as version FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_projectproduct` AS t3  ON t1.project = t3.project  LEFT JOIN `zt_product` AS t4  ON t2.product = t4.id  WHERE t1.project  = '9' AND  t2.deleted  = '0' ORDER BY `pri`,`id` asc 
  SELECT story, COUNT(*) AS tasks FROM `zt_task` WHERE story IN ('225','230','232','233','234','229','235','236') AND  deleted  = '0' AND  project  = '9' GROUP BY story
  SELECT account, realname, deleted FROM `zt_user` ORDER BY `account` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT DISTINCT story FROM `zt_case` WHERE story IN ('225','230','232','233','234','229','235','236')
  SELECT DISTINCT t3.path FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_module` AS t3  ON t2.module = t3.id  WHERE t1.project  = '9'
  SELECT path FROM `zt_module` WHERE root  = '9' AND  type  = 'task'
  SELECT DISTINCT t1.path FROM `zt_module` AS t1  LEFT JOIN `zt_task` AS t2  ON t1.id=t2.module  WHERE t2.module  != '0' AND  t2.project  = '9' AND  t2.deleted  = '0' AND  t1.type  = 'story'
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT * FROM `zt_module` WHERE (root = 12 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE (root = 13 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE (root = 179 and type = 'story')  AND  branch  = '0' ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 10:09:26: /ztp/zentaopms/www/index.php?m=project&f=task&projectID=9
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t2.id, t2.name, t2.type, t1.branch FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT id, name FROM `zt_project` WHERE parent  = '9'
  SELECT t1.*, t1.hours * t1.days AS totalHours, if(t2.deleted='0', t2.realname, t1.account) as realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '9'
  SELECT commiter, account, realname FROM `zt_user` WHERE commiter  != ''
  SELECT * FROM `zt_action` WHERE objectType IN('project', 'testtask', 'build')  AND  project  = '9' ORDER BY `date`,`id` 
  SELECT * FROM `zt_history` WHERE action IN ('4000','4531','4890','7541','7542','7740','8362','9709','10734','10743','26561') ORDER BY `id` 
  SELECT name FROM `zt_build` WHERE id  = '5'
  SELECT name FROM `zt_testtask` WHERE id  = '2'
  SELECT name FROM `zt_build` WHERE id  = '6'
  SELECT name FROM `zt_build` WHERE id  = '8'
  SELECT name FROM `zt_build` WHERE id  = '9'
  SELECT name FROM `zt_build` WHERE id  = '15'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT t1.*, t2.id AS storyID, t2.title AS storyTitle, t2.product, t2.branch, t2.version AS latestStoryVersion, t2.status AS storyStatus, t3.realname AS assignedToRealName FROM `zt_task` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_user` AS t3  ON t1.assignedTo = t3.account  WHERE t1.project  = '9' AND  t1.deleted  = '0' AND  t1.status IN ('','wait','doing','done','pause','cancel') ORDER BY `status`,`id` desc 
  SELECT COUNT(*) AS recTotal FROM `zt_task` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_user` AS t3  ON t1.assignedTo = t3.account  WHERE t1.project  = '9' AND  t1.deleted  = '0' AND  t1.status IN ('','wait','doing','done','pause','cancel') 
  SELECT t1.*, t2.id AS storyID, t2.title AS storyTitle, t2.product, t2.branch, t2.version AS latestStoryVersion, t2.status AS storyStatus, t3.realname AS assignedToRealName FROM `zt_task` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_user` AS t3  ON t1.assignedTo = t3.account  WHERE t1.project  = '9' AND  t1.deleted  = '0' AND  t1.status IN ('','wait','doing','done','pause','cancel') ORDER BY `status`,`id` desc 
  SELECT t1.*, t2.id AS storyID, t2.title AS storyTitle, t2.product, t2.branch, t2.version AS latestStoryVersion, t2.status AS storyStatus, t3.realname AS assignedToRealName FROM `zt_task` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_user` AS t3  ON t1.assignedTo = t3.account  WHERE t1.project  = '9' AND  t1.deleted  = '0' AND  t1.status IN ('','wait','doing','done','pause','cancel') ORDER BY `status`,`id` desc 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT openedVersion FROM `zt_project` WHERE id  = '9'
  SELECT product,branch FROM `zt_projectproduct` WHERE project  = '9'
  SELECT id,root,branch FROM `zt_module` WHERE root IN ('12','13','179') AND  type  = 'story'
  SELECT id FROM `zt_module` WHERE root  = '9' AND  type  = 'task'
  SELECT DISTINCT t1.id FROM `zt_module` AS t1  LEFT JOIN `zt_task` AS t2  ON t1.id=t2.module  WHERE t2.module  != '0' AND  t2.project  = '9' AND  t2.deleted  = '0' AND  t1.type  = 'story'
  SELECT * FROM `zt_module` WHERE root = 9 and type = 'task' and parent = 0 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task') OR (root = 12 and type = 'story'))  ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task') OR (root = 13 and type = 'story'))  ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task') OR (root = 179 and type = 'story'))  ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'task' ORDER BY `id` asc 
  SELECT account, realname, deleted FROM `zt_user` ORDER BY `account` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT openedVersion FROM `zt_project` WHERE id  = '9'
  SELECT product,branch FROM `zt_projectproduct` WHERE project  = '9'
  SELECT id,root,branch FROM `zt_module` WHERE root IN ('12','13','179') AND  type  = 'story'
  SELECT id FROM `zt_module` WHERE root  = '9' AND  type  = 'task'
  SELECT DISTINCT t1.id FROM `zt_module` AS t1  LEFT JOIN `zt_task` AS t2  ON t1.id=t2.module  WHERE t2.module  != '0' AND  t2.project  = '9' AND  t2.deleted  = '0' AND  t1.type  = 'story'
  SELECT * FROM `zt_module` WHERE root = 9 and type = 'task' and parent = 0 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task') OR (root = 12 and type = 'story'))  ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task') OR (root = 13 and type = 'story'))  ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task') OR (root = 179 and type = 'story'))  ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT openedVersion FROM `zt_project` WHERE id  = '9'
  SELECT DISTINCT t3.path FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_module` AS t3  ON t2.module = t3.id  WHERE t1.project  = '9'
  SELECT path FROM `zt_module` WHERE root  = '9' AND  type  = 'task'
  SELECT DISTINCT t1.path FROM `zt_module` AS t1  LEFT JOIN `zt_task` AS t2  ON t1.id=t2.module  WHERE t2.module  != '0' AND  t2.project  = '9' AND  t2.deleted  = '0' AND  t1.type  = 'story'
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task' and parent != 0) OR (root = 12 and type = 'story' and branch ='0'))  ORDER BY `grade` desc,`type`,`order` 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task' and parent != 0) OR (root = 13 and type = 'story' and branch ='0'))  ORDER BY `grade` desc,`type`,`order` 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task' and parent != 0) OR (root = 179 and type = 'story' and branch ='0'))  ORDER BY `grade` desc,`type`,`order` 
  SELECT * FROM `zt_module` WHERE root = 9 and type = 'task'  ORDER BY `grade` desc,`type`,`order` 
  SELECT *,  IF(INSTR(" closed", status) < 2, 0, 1) AS isClosed FROM `zt_product` WHERE deleted  = '0' ORDER BY `isClosed`,`order` desc 
  SELECT distinct t1.id FROM `zt_product` AS t1  LEFT JOIN `zt_projectproduct` AS t2  ON t1.id = t2.product  LEFT JOIN `zt_team` AS t3  ON t2.project = t3.project  LEFT JOIN `zt_project` AS t4  ON t2.project = t4.id  WHERE t1.acl  = 'open' OR (t1.acl = 'custom' AND (INSTR(CONCAT(',', t1.whitelist, ','), ',1,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',12,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',14,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',22,') > 0))  OR t1.PO  = '11014' OR t1.QD  = '11014' OR t1.RD  = '11014' OR t1.createdBy  = '11014' OR t3.account  = '11014' AND  t1.deleted  = '0' AND  t4.deleted  = '0'
  SELECT t1.id, t1.name,t1.status, t2.product FROM `zt_project` AS t1  LEFT JOIN `zt_projectproduct` AS t2  ON t1.id = t2.project  WHERE t1.deleted  = '0'
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `order` desc 
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 10:09:29: /ztp/zentaopms/www/index.php?m=project&f=task&projectID=9
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `isDone`,`status`,`order` desc 
  SELECT project, account FROM `zt_team`
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t2.id, t2.name, t2.type, t1.branch FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT id, name FROM `zt_project` WHERE parent  = '9'
  SELECT t1.*, t1.hours * t1.days AS totalHours, if(t2.deleted='0', t2.realname, t1.account) as realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '9'
  SELECT commiter, account, realname FROM `zt_user` WHERE commiter  != ''
  SELECT * FROM `zt_action` WHERE objectType IN('project', 'testtask', 'build')  AND  project  = '9' ORDER BY `date`,`id` 
  SELECT * FROM `zt_history` WHERE action IN ('4000','4531','4890','7541','7542','7740','8362','9709','10734','10743','26561') ORDER BY `id` 
  SELECT name FROM `zt_build` WHERE id  = '5'
  SELECT name FROM `zt_testtask` WHERE id  = '2'
  SELECT name FROM `zt_build` WHERE id  = '6'
  SELECT name FROM `zt_build` WHERE id  = '8'
  SELECT name FROM `zt_build` WHERE id  = '9'
  SELECT name FROM `zt_build` WHERE id  = '15'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT * FROM `zt_project` WHERE `id` = '9' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '9' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '9'
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT t1.*, t2.id AS storyID, t2.title AS storyTitle, t2.product, t2.branch, t2.version AS latestStoryVersion, t2.status AS storyStatus, t3.realname AS assignedToRealName FROM `zt_task` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_user` AS t3  ON t1.assignedTo = t3.account  WHERE t1.project  = '9' AND  t1.deleted  = '0' AND  t1.status IN ('','wait','doing','done','pause','cancel') ORDER BY `status`,`id` desc 
  SELECT COUNT(*) AS recTotal FROM `zt_task` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_user` AS t3  ON t1.assignedTo = t3.account  WHERE t1.project  = '9' AND  t1.deleted  = '0' AND  t1.status IN ('','wait','doing','done','pause','cancel') 
  SELECT t1.*, t2.id AS storyID, t2.title AS storyTitle, t2.product, t2.branch, t2.version AS latestStoryVersion, t2.status AS storyStatus, t3.realname AS assignedToRealName FROM `zt_task` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_user` AS t3  ON t1.assignedTo = t3.account  WHERE t1.project  = '9' AND  t1.deleted  = '0' AND  t1.status IN ('','wait','doing','done','pause','cancel') ORDER BY `status`,`id` desc 
  SELECT t1.*, t2.id AS storyID, t2.title AS storyTitle, t2.product, t2.branch, t2.version AS latestStoryVersion, t2.status AS storyStatus, t3.realname AS assignedToRealName FROM `zt_task` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_user` AS t3  ON t1.assignedTo = t3.account  WHERE t1.project  = '9' AND  t1.deleted  = '0' AND  t1.status IN ('','wait','doing','done','pause','cancel') ORDER BY `status`,`id` desc 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT * FROM `zt_product` WHERE `id` = '13' 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT openedVersion FROM `zt_project` WHERE id  = '9'
  SELECT product,branch FROM `zt_projectproduct` WHERE project  = '9'
  SELECT id,root,branch FROM `zt_module` WHERE root IN ('12','13','179') AND  type  = 'story'
  SELECT id FROM `zt_module` WHERE root  = '9' AND  type  = 'task'
  SELECT DISTINCT t1.id FROM `zt_module` AS t1  LEFT JOIN `zt_task` AS t2  ON t1.id=t2.module  WHERE t2.module  != '0' AND  t2.project  = '9' AND  t2.deleted  = '0' AND  t1.type  = 'story'
  SELECT * FROM `zt_module` WHERE root = 9 and type = 'task' and parent = 0 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task') OR (root = 12 and type = 'story'))  ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task') OR (root = 13 and type = 'story'))  ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task') OR (root = 179 and type = 'story'))  ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT id, title FROM `zt_userquery` WHERE account  = '11014' AND  module  = 'task' ORDER BY `id` asc 
  SELECT account, realname, deleted FROM `zt_user` ORDER BY `account` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT openedVersion FROM `zt_project` WHERE id  = '9'
  SELECT product,branch FROM `zt_projectproduct` WHERE project  = '9'
  SELECT id,root,branch FROM `zt_module` WHERE root IN ('12','13','179') AND  type  = 'story'
  SELECT id FROM `zt_module` WHERE root  = '9' AND  type  = 'task'
  SELECT DISTINCT t1.id FROM `zt_module` AS t1  LEFT JOIN `zt_task` AS t2  ON t1.id=t2.module  WHERE t2.module  != '0' AND  t2.project  = '9' AND  t2.deleted  = '0' AND  t1.type  = 'story'
  SELECT * FROM `zt_module` WHERE root = 9 and type = 'task' and parent = 0 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task') OR (root = 12 and type = 'story'))  ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task') OR (root = 13 and type = 'story'))  ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task') OR (root = 179 and type = 'story'))  ORDER BY `grade` desc,`branch`,`type`,`order` 
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '9'
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT openedVersion FROM `zt_project` WHERE id  = '9'
  SELECT DISTINCT t3.path FROM `zt_projectstory` AS t1  LEFT JOIN `zt_story` AS t2  ON t1.story = t2.id  LEFT JOIN `zt_module` AS t3  ON t2.module = t3.id  WHERE t1.project  = '9'
  SELECT path FROM `zt_module` WHERE root  = '9' AND  type  = 'task'
  SELECT DISTINCT t1.path FROM `zt_module` AS t1  LEFT JOIN `zt_task` AS t2  ON t1.id=t2.module  WHERE t2.module  != '0' AND  t2.project  = '9' AND  t2.deleted  = '0' AND  t1.type  = 'story'
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task' and parent != 0) OR (root = 12 and type = 'story' and branch ='0'))  ORDER BY `grade` desc,`type`,`order` 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task' and parent != 0) OR (root = 13 and type = 'story' and branch ='0'))  ORDER BY `grade` desc,`type`,`order` 
  SELECT * FROM `zt_module` WHERE ((root = 9 and type = 'task' and parent != 0) OR (root = 179 and type = 'story' and branch ='0'))  ORDER BY `grade` desc,`type`,`order` 
  SELECT * FROM `zt_module` WHERE root = 9 and type = 'task'  ORDER BY `grade` desc,`type`,`order` 
  SELECT *,  IF(INSTR(" closed", status) < 2, 0, 1) AS isClosed FROM `zt_product` WHERE deleted  = '0' ORDER BY `isClosed`,`order` desc 
  SELECT distinct t1.id FROM `zt_product` AS t1  LEFT JOIN `zt_projectproduct` AS t2  ON t1.id = t2.product  LEFT JOIN `zt_team` AS t3  ON t2.project = t3.project  LEFT JOIN `zt_project` AS t4  ON t2.project = t4.id  WHERE t1.acl  = 'open' OR (t1.acl = 'custom' AND (INSTR(CONCAT(',', t1.whitelist, ','), ',1,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',12,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',14,') > 0 OR INSTR(CONCAT(',', t1.whitelist, ','), ',22,') > 0))  OR t1.PO  = '11014' OR t1.QD  = '11014' OR t1.RD  = '11014' OR t1.createdBy  = '11014' OR t3.account  = '11014' AND  t1.deleted  = '0' AND  t4.deleted  = '0'
  SELECT t1.id, t1.name,t1.status, t2.product FROM `zt_project` AS t1  LEFT JOIN `zt_projectproduct` AS t2  ON t1.id = t2.project  WHERE t1.deleted  = '0'
  SELECT *, IF(INSTR(" done", status) < 2, 0, 1) AS isDone FROM `zt_project` WHERE iscat  = '0' AND  deleted  = '0' ORDER BY `order` desc 
  SELECT * FROM `zt_branch` WHERE product IN ('12','13','179') AND  deleted  = '0'
  SELECT * FROM `zt_product` WHERE id IN ('12','13','179')
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 10:10:06: /ztp/zentaopms/www/index.php?m=cron&f=ajaxExec&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'cron' AND  section  = 'run' AND  `key`  = 'status'
  UPDATE `zt_config` SET  `value` = 'running' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  UPDATE `zt_cron` SET  `lastTime` = '2016-11-29 10:09:06' WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  UPDATE `zt_cron` SET `status` = 'normal',`lastTime` = '2016-11-29 10:09:06' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:10:06' WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '1'
  SELECT * FROM `zt_cron` WHERE id  = '2'
  SELECT * FROM `zt_cron` WHERE id  = '3'
  SELECT * FROM `zt_cron` WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:10:06' WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '4'
  SELECT * FROM `zt_cron` WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:10:06' WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE id  = '6'
  SELECT * FROM `zt_cron` WHERE id  = '7'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:10:06' WHERE id  = '7'
  SELECT * FROM `zt_mailqueue` WHERE 1=1  AND  status  = 'wait' ORDER BY `id` asc 
  SELECT id,status FROM `zt_mailqueue` ORDER BY `id` desc  LIMIT 1 
  DELETE FROM `zt_mailqueue` WHERE status  != 'wait' AND  sendTime  <= '2016-11-27 10:10:06'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '7'
  SELECT * FROM `zt_cron` WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:10:06' WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '8'
  SELECT * FROM `zt_cron` WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:10:06' WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '10'
  SELECT * FROM `zt_cron` WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:10:06' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:10:06' WHERE id  = '14'
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT COUNT(*) AS recTotal FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' 
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT * FROM `zt_task` WHERE story  = '655' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-05',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05',`actReqComfimEndDate` = '2016-08-05 12:33:50',`techDesign` = '符龙/9532',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-05',`onCodingStartDate` = '2016-08-05',`codeDevelop` = '符龙/9532',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-10 00:00:00',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-18 15:06:32',`actTestEndDate` = '2016-08-18 15:06:32',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-08-18',`actOnsiteTestEndDate` = '2016-08-18 11:46:30',`recopercent` = '100%',`confimDate` = '2016-08-18 11:46:30',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '80'
  SELECT * FROM `zt_hdc` WHERE id  = '80'
  SELECT * FROM `zt_task` WHERE story  = '657' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05 17:49:32',`actReqComfimEndDate` = '2016-08-05 17:49:32',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-25',`onCodingStartDate` = '2016-08-25',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-25 16:22:02',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:12',`actTestEndDate` = '2016-09-05 15:53:12',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:18:21',`actOnsiteTestEndDate` = '2016-10-31 16:18:21',`recopercent` = '100%',`confimDate` = '2016-10-31 16:18:21',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '81'
  SELECT * FROM `zt_hdc` WHERE id  = '81'
  SELECT * FROM `zt_task` WHERE story  = '658' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '亓义辉/8930',`actReqComfimBeganDate` = '2016-08-05 17:52:53',`actReqComfimEndDate` = '2016-08-05 17:52:53',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-09',`onCodingStartDate` = '2016-08-09',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:15:04',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:46',`actTestEndDate` = '2016-09-05 15:53:46',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:16:45',`actOnsiteTestEndDate` = '2016-10-31 16:16:45',`recopercent` = '100%',`confimDate` = '2016-10-31 16:16:45',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '82'
  SELECT * FROM `zt_hdc` WHERE id  = '82'
  SELECT * FROM `zt_task` WHERE story  = '659' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '段俊宇/3543',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '2016-08-11 11:29:36',`actReqComfimEndDate` = '2016-08-11 11:29:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-11',`onCodingStartDate` = '2016-08-11',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-11 11:36:52',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-11',`actTestEndDate` = '2016-08-11 11:38:35',`siteAccept` = '马佳怡/11624',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 09:36:27',`actOnsiteTestEndDate` = '2016-08-16 09:36:27',`recopercent` = '100%',`confimDate` = '2016-08-16 09:36:27',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '83'
  SELECT * FROM `zt_hdc` WHERE id  = '83'
  SELECT * FROM `zt_task` WHERE story  = '660' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '沈雨华/2376',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 15:09:31',`actOnsiteTestEndDate` = '2016-08-16 15:09:31',`recopercent` = '100%',`confimDate` = '2016-08-16 15:09:31',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '84'
  SELECT * FROM `zt_hdc` WHERE id  = '84'
  SELECT * FROM `zt_task` WHERE story  = '661' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '2016-08-17 14:35:59',`actReqComfimEndDate` = '2016-08-17 14:35:59',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-17 14:36:31',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '2016-08-16',`actCodeEndDate` = '2016-08-16 11:23:34',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:37:09',`actTestEndDate` = '2016-08-17 14:37:09',`siteAccept` = '林天桦/7409',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16',`actOnsiteTestEndDate` = '2016-08-16 16:21:33',`recopercent` = '100%',`confimDate` = '2016-08-16 16:21:33',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '85'
  SELECT * FROM `zt_hdc` WHERE id  = '85'
  SELECT * FROM `zt_task` WHERE story  = '662' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '何剑峰/8440',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '何剑峰/8440',`actReqComfimBeganDate` = '2016-08-17 14:54:19',`actReqComfimEndDate` = '2016-08-17 14:54:19',`techDesign` = '吕立元/4279',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-16 00:00:00',`codeDevelop` = '刘杰/5285',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-29 15:32:41',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-10',`actTestEndDate` = '2016-09-10 14:54:36',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-11-04 09:10:03',`actOnsiteTestEndDate` = '2016-11-04 09:10:03',`recopercent` = '100%',`confimDate` = '2016-11-04 09:10:03',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '86'
  SELECT * FROM `zt_hdc` WHERE id  = '86'
  SELECT * FROM `zt_task` WHERE story  = '663' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '87'
  SELECT * FROM `zt_hdc` WHERE id  = '87'
  SELECT * FROM `zt_task` WHERE story  = '664' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '黄乐/2529',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '黄乐/2529',`actReqComfimBeganDate` = '2016-08-17 14:32:36',`actReqComfimEndDate` = '2016-08-17 14:32:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:36:14',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:58:09',`actTestEndDate` = '2016-08-17 14:58:09',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-17 14:59:11',`actOnsiteTestEndDate` = '2016-08-17 14:59:11',`recopercent` = '100%',`confimDate` = '2016-08-17 14:59:11',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '88'
  SELECT * FROM `zt_hdc` WHERE id  = '88'
  SELECT * FROM `zt_task` WHERE story  = '686' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:11:37',`actReqComfimEndDate` = '2016-08-25 14:11:37',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:58:10',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-05 15:27:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:10:58',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-14',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '110'
  SELECT * FROM `zt_hdc` WHERE id  = '110'
  SELECT * FROM `zt_task` WHERE story  = '687' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17 14:06:53',`actReqComfimEndDate` = '2016-08-17 14:06:53',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-19 15:05:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:11:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-04 09:09:37',`actOnsiteTestEndDate` = '2016-11-04 09:09:37',`recopercent` = '100%',`confimDate` = '2016-11-04 09:09:37',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '111'
  SELECT * FROM `zt_hdc` WHERE id  = '111'
  SELECT * FROM `zt_task` WHERE story  = '688' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17',`actReqComfimEndDate` = '',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-08-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '112'
  SELECT * FROM `zt_hdc` WHERE id  = '112'
  SELECT * FROM `zt_task` WHERE story  = '689' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-18 10:10:05',`actReqComfimEndDate` = '2016-08-18 10:10:05',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:56:25',`codeDevelop` = '李德远/8741',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-24 17:47:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-08-31 17:52:42',`actTestEndDate` = '2016-08-31 17:52:42',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:11',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:11',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '113'
  SELECT * FROM `zt_hdc` WHERE id  = '113'
  SELECT * FROM `zt_task` WHERE story  = '690' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-11',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:06:22',`actReqComfimEndDate` = '2016-08-25 14:06:22',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-31 17:55:48',`codeDevelop` = '曹天娇/10340',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-31 17:25:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 15:26:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:26',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:26',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '114'
  SELECT * FROM `zt_hdc` WHERE id  = '114'
  SELECT * FROM `zt_task` WHERE story  = '902' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-02',`actReqComfimEndDate` = '2016-09-02 16:28:37',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-02 16:42:58',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-09-09',`actTestEndDate` = '2016-09-09 18:06:39',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-16',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '275'
  SELECT * FROM `zt_hdc` WHERE id  = '275'
  SELECT * FROM `zt_task` WHERE story  = '1630' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '贺斌/868',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '谢娇艳/2413',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '947'
  SELECT * FROM `zt_hdc` WHERE id  = '947'
  SELECT * FROM `zt_task` WHERE story  = '1631' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-28',`actReqComfimEndDate` = '2016-09-28 10:37:15',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-28 10:37:41',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-28 17:30:34',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-10-23 15:01:58',`actTestEndDate` = '2016-10-23 15:01:58',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-10-05 01:06:35',`actOnsiteTestEndDate` = '2016-10-05 01:06:35',`recopercent` = '100%',`confimDate` = '2016-10-05 01:06:35',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '948'
  SELECT * FROM `zt_hdc` WHERE id  = '948'
  SELECT * FROM `zt_task` WHERE story  = '3340' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:45',`actReqComfimEndDate` = '2016-10-23 15:01:45',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-24',`onCodingStartDate` = '2016-10-24',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-01 18:41:12',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:03:10',`actTestEndDate` = '2016-11-14 14:03:10',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '2580'
  SELECT * FROM `zt_hdc` WHERE id  = '2580'
  SELECT * FROM `zt_task` WHERE story  = '3341' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-10-23',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:28',`actReqComfimEndDate` = '2016-10-23 15:01:28',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-11-01',`onCodingStartDate` = '2016-11-01',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-02 19:25:10',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:37',`actTestEndDate` = '2016-11-14 14:02:37',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '2581'
  SELECT * FROM `zt_hdc` WHERE id  = '2581'
  SELECT * FROM `zt_task` WHERE story  = '3342' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:00:16',`actReqComfimEndDate` = '2016-10-23 15:00:16',`techDesign` = '陈俊/4268',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-25',`onCodingStartDate` = '2016-10-25',`codeDevelop` = '陈俊/4268',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-03 10:37:04',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:04',`actTestEndDate` = '2016-11-14 14:02:04',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 10:10:06' WHERE id  = '2582'
  SELECT * FROM `zt_hdc` WHERE id  = '2582'

20161129 10:17:32: /ztp/zentaopms/www/index.php?m=hdc&f=browse
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_project` WHERE `id` = '1191' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '1191' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '1191'
  SELECT * FROM `zt_project` WHERE `id` = '1191' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '1191' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '1191'
  SELECT * FROM `zt_project` WHERE `id` = '1191' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '1191' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '1191'
  SELECT * FROM `zt_project` WHERE `id` = '1191' 
  SELECT 
            SUM(estimate) AS totalEstimate, 
            SUM(consumed) AS totalConsumed, 
            SUM(`left`) AS totalLeft FROM `zt_task` WHERE project  = '1191' AND  status  != 'cancel' AND  deleted  = '0'
  SELECT sum(days * hours) AS totalHours FROM `zt_team` WHERE project  = '1191'
  SELECT t1.product, t2.name FROM `zt_projectproduct` AS t1  LEFT JOIN `zt_product` AS t2  ON t1.product = t2.id  WHERE t1.project  = '1191'
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' AND  status  = '0' ORDER BY `id` asc 
  SELECT COUNT(*) AS recTotal FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' AND  status  = '0' 
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' AND  status  = '0' ORDER BY `id` asc 
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT id,center_name,center_code,hr_id FROM `zt_devcenter`
  SELECT t1.*, t1.hours * t1.days AS totalHours, if(t2.deleted='0', t2.realname, t1.account) as realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1' AND  t1.project_id  = '1191' LIMIT 1 
  SELECT account, realname, deleted FROM `zt_user` WHERE deleted  = '0' ORDER BY `account` 
  SELECT * FROM `zt_cron` ORDER BY `lastTime` desc  LIMIT 1 

20161129 10:20:33: /ztp/zentaopms/www/index.php?m=cron&f=ajaxExec&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'cron' AND  section  = 'run' AND  `key`  = 'status'
  UPDATE `zt_config` SET  `value` = 'running' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  UPDATE `zt_cron` SET  `lastTime` = '2016-11-29 10:17:33' WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  UPDATE `zt_cron` SET `status` = 'normal',`lastTime` = '2016-11-29 10:17:33' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:18:33' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:18:33' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:19:33' WHERE id  = '1'
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
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:19:33' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  SELECT * FROM `zt_cron` WHERE 1=1  AND  status  != 'stop'
  SELECT * FROM `zt_cron` WHERE lastTime  = '0000-00-00 00:00:00' AND  status  != 'stop'
  SELECT * FROM `zt_config` WHERE owner  = 'system' AND  module  = 'common' AND  section  = 'global' AND  `key`  = 'cron'
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_cron` WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:20:33' WHERE id  = '1'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '1'
  SELECT * FROM `zt_cron` WHERE id  = '2'
  SELECT * FROM `zt_cron` WHERE id  = '3'
  SELECT * FROM `zt_cron` WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:20:33' WHERE id  = '4'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '4'
  SELECT * FROM `zt_cron` WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:20:33' WHERE id  = '5'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '5'
  SELECT * FROM `zt_cron` WHERE id  = '6'
  SELECT * FROM `zt_cron` WHERE id  = '7'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:20:33' WHERE id  = '7'
  SELECT * FROM `zt_mailqueue` WHERE 1=1  AND  status  = 'wait' ORDER BY `id` asc 
  SELECT id,status FROM `zt_mailqueue` ORDER BY `id` desc  LIMIT 1 
  DELETE FROM `zt_mailqueue` WHERE status  != 'wait' AND  sendTime  <= '2016-11-27 10:20:33'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '7'
  SELECT * FROM `zt_cron` WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:20:33' WHERE id  = '8'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '8'
  SELECT * FROM `zt_cron` WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:20:33' WHERE id  = '10'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '10'
  SELECT * FROM `zt_cron` WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:20:33' WHERE id  = '11'
  UPDATE `zt_cron` SET `status` = 'normal' WHERE id  = '11'
  SELECT * FROM `zt_cron` WHERE id  = '14'
  UPDATE `zt_cron` SET `status` = 'running',`lastTime` = '2016-11-29 10:20:33' WHERE id  = '14'
  SELECT t2.* FROM `zt_usergroup` AS t1  LEFT JOIN `zt_group` AS t2  ON t1.group = t2.id  WHERE t1.account  = '11014'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT t1.id,t1.project_id,t1.frame_id,
            substring_index(t1.manager_id, ':', 1)
                manager_id,
        	substring_index(t1.manager_id, ':', -1) manager_name, 
        	t1.uat_date,t1.online_date,t1.uat_datecopy,t1.online_datecopy,
            substring_index(t1.cto_id, ':', 1) 
                cto_id,
        	substring_index(t1.cto_id, ':', -1) cto_name,
            substring_index(t1.spotcto_id, ':', 1)
                spotcto_id,
        	substring_index(t1.spotcto_id, ':', -1) spotcto_name,
        	t1.fpd,t1.applystatus, t1.description,t1.applydate,
            substring_index(t1.create_user, ':', 1) create_user,
        	substring_index(t1.create_user, ':', -1) username,
        	t1.assigntodevelop,t1.assigndate, t1.ascenter_id,t1.astestcenter_id,
            substring_index(t1.tech_manager, ':', 1)tech_manager,
        	substring_index(t1.tech_manager, ':', -1) techname,
            substring_index(t1.test_manager, ':', 1) 
                test_manager,
        	substring_index(t1.test_manager, ':', -1) testname,
            substring_index(t1.listcomfim, ':', -1) comfimname,
            listcomfim,
        	t1.assignstatus,t1.assignnote,
        	t2.name,t3.center_name,t4.name frame_name,t6.center_name test_name FROM `zt_allocation` AS t1  LEFT JOIN `zt_project` AS t2  ON t1.project_id = t2.id   LEFT JOIN `zt_devcenter` AS t3  ON t1.ascenter_id = t3.id  LEFT JOIN `zt_devcenter` AS t6  ON t1.astestcenter_id = t6.id  LEFT JOIN `zt_proframework` AS t4  ON t1.frame_id = t4.id  WHERE t1.status  = '1'
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT COUNT(*) AS recTotal FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' 
  SELECT * FROM `zt_hdc` WHERE deleted  = '0' AND  project  = '1191' ORDER BY `id` asc 
  SELECT * FROM `zt_task` WHERE story  = '655' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-05',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05',`actReqComfimEndDate` = '2016-08-05 12:33:50',`techDesign` = '符龙/9532',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-05',`onCodingStartDate` = '2016-08-05',`codeDevelop` = '符龙/9532',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-10 00:00:00',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-18 15:06:32',`actTestEndDate` = '2016-08-18 15:06:32',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-08-18',`actOnsiteTestEndDate` = '2016-08-18 11:46:30',`recopercent` = '100%',`confimDate` = '2016-08-18 11:46:30',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '80'
  SELECT * FROM `zt_hdc` WHERE id  = '80'
  SELECT * FROM `zt_task` WHERE story  = '657' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-05 17:49:32',`actReqComfimEndDate` = '2016-08-05 17:49:32',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-25',`onCodingStartDate` = '2016-08-25',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-25 16:22:02',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:12',`actTestEndDate` = '2016-09-05 15:53:12',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:18:21',`actOnsiteTestEndDate` = '2016-10-31 16:18:21',`recopercent` = '100%',`confimDate` = '2016-10-31 16:18:21',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '81'
  SELECT * FROM `zt_hdc` WHERE id  = '81'
  SELECT * FROM `zt_task` WHERE story  = '658' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '亓义辉/8930',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '亓义辉/8930',`actReqComfimBeganDate` = '2016-08-05 17:52:53',`actReqComfimEndDate` = '2016-08-05 17:52:53',`techDesign` = '吴焱辉/9507',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-09',`onCodingStartDate` = '2016-08-09',`codeDevelop` = '吴焱辉/9507',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:15:04',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-05 15:53:46',`actTestEndDate` = '2016-09-05 15:53:46',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-10-31 16:16:45',`actOnsiteTestEndDate` = '2016-10-31 16:16:45',`recopercent` = '100%',`confimDate` = '2016-10-31 16:16:45',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '82'
  SELECT * FROM `zt_hdc` WHERE id  = '82'
  SELECT * FROM `zt_task` WHERE story  = '659' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '段俊宇/3543',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '2016-08-11 11:29:36',`actReqComfimEndDate` = '2016-08-11 11:29:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-11',`onCodingStartDate` = '2016-08-11',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-11 11:36:52',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-11',`actTestEndDate` = '2016-08-11 11:38:35',`siteAccept` = '马佳怡/11624',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 09:36:27',`actOnsiteTestEndDate` = '2016-08-16 09:36:27',`recopercent` = '100%',`confimDate` = '2016-08-16 09:36:27',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '83'
  SELECT * FROM `zt_hdc` WHERE id  = '83'
  SELECT * FROM `zt_task` WHERE story  = '660' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '沈雨华/2376',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '李帆/5272',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16 15:09:31',`actOnsiteTestEndDate` = '2016-08-16 15:09:31',`recopercent` = '100%',`confimDate` = '2016-08-16 15:09:31',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '84'
  SELECT * FROM `zt_hdc` WHERE id  = '84'
  SELECT * FROM `zt_task` WHERE story  = '661' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '2016-08-17 14:35:59',`actReqComfimEndDate` = '2016-08-17 14:35:59',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-17 14:36:31',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '2016-08-16',`actCodeEndDate` = '2016-08-16 11:23:34',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:37:09',`actTestEndDate` = '2016-08-17 14:37:09',`siteAccept` = '林天桦/7409',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-16',`actOnsiteTestEndDate` = '2016-08-16 16:21:33',`recopercent` = '100%',`confimDate` = '2016-08-16 16:21:33',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '85'
  SELECT * FROM `zt_hdc` WHERE id  = '85'
  SELECT * FROM `zt_task` WHERE story  = '662' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '何剑峰/8440',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '何剑峰/8440',`actReqComfimBeganDate` = '2016-08-17 14:54:19',`actReqComfimEndDate` = '2016-08-17 14:54:19',`techDesign` = '吕立元/4279',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-16 00:00:00',`codeDevelop` = '刘杰/5285',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-29 15:32:41',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-09-10',`actTestEndDate` = '2016-09-10 14:54:36',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-11-04 09:10:03',`actOnsiteTestEndDate` = '2016-11-04 09:10:03',`recopercent` = '100%',`confimDate` = '2016-11-04 09:10:03',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '86'
  SELECT * FROM `zt_hdc` WHERE id  = '86'
  SELECT * FROM `zt_task` WHERE story  = '663' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '谢娇艳/2413',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '',`deadline` = '2016-08-10',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '87'
  SELECT * FROM `zt_hdc` WHERE id  = '87'
  SELECT * FROM `zt_task` WHERE story  = '664' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '黄乐/2529',`estReqSubmitDate` = '2016-08-04',`actReqSubmitDate` = '',`remoteTest` = '黄乐/2529',`actReqComfimBeganDate` = '2016-08-17 14:32:36',`actReqComfimEndDate` = '2016-08-17 14:32:36',`techDesign` = '李帆/5272',`estCodeStartDate` = '2016-08-05',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '李帆/5272',`estCodeEndDate` = '2016-08-06',`actCodeEndDate` = '2016-08-17 14:36:14',`deadline` = '2016-08-10',`actTestBeganDate` = '2016-08-17 14:58:09',`actTestEndDate` = '2016-08-17 14:58:09',`siteAccept` = '亓义辉/8930',`estTestEndDate` = '2016-08-09',`actOnsiteTestBeganDate` = '2016-08-17 14:59:11',`actOnsiteTestEndDate` = '2016-08-17 14:59:11',`recopercent` = '100%',`confimDate` = '2016-08-17 14:59:11',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '88'
  SELECT * FROM `zt_hdc` WHERE id  = '88'
  SELECT * FROM `zt_task` WHERE story  = '686' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:11:37',`actReqComfimEndDate` = '2016-08-25 14:11:37',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:58:10',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-05 15:27:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:10:58',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-14',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '110'
  SELECT * FROM `zt_hdc` WHERE id  = '110'
  SELECT * FROM `zt_task` WHERE story  = '687' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17 14:06:53',`actReqComfimEndDate` = '2016-08-17 14:06:53',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-08-17',`onCodingStartDate` = '2016-08-17',`codeDevelop` = '吕立元/4279',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-19 15:05:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 18:11:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-04 09:09:37',`actOnsiteTestEndDate` = '2016-11-04 09:09:37',`recopercent` = '100%',`confimDate` = '2016-11-04 09:09:37',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '111'
  SELECT * FROM `zt_hdc` WHERE id  = '111'
  SELECT * FROM `zt_task` WHERE story  = '688' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-17',`actReqComfimEndDate` = '',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-08-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '112'
  SELECT * FROM `zt_hdc` WHERE id  = '112'
  SELECT * FROM `zt_task` WHERE story  = '689' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-17',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-18 10:10:05',`actReqComfimEndDate` = '2016-08-18 10:10:05',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-26 15:56:25',`codeDevelop` = '李德远/8741',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-24 17:47:56',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-08-31 17:52:42',`actTestEndDate` = '2016-08-31 17:52:42',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:11',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:11',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '113'
  SELECT * FROM `zt_hdc` WHERE id  = '113'
  SELECT * FROM `zt_task` WHERE story  = '690' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '熊旭东/8237',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-08-11',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-08-25 14:06:22',`actReqComfimEndDate` = '2016-08-25 14:06:22',`techDesign` = '吕立元/4279',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-08-31 17:55:48',`codeDevelop` = '曹天娇/10340',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-08-31 17:25:41',`deadline` = '2016-08-26',`actTestBeganDate` = '2016-09-07',`actTestEndDate` = '2016-09-07 15:26:47',`siteAccept` = '熊旭东/8237',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-11-15',`actOnsiteTestEndDate` = '2016-11-15 09:25:26',`recopercent` = '100%',`confimDate` = '2016-11-15 09:25:26',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '114'
  SELECT * FROM `zt_hdc` WHERE id  = '114'
  SELECT * FROM `zt_task` WHERE story  = '902' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-02',`actReqComfimEndDate` = '2016-09-02 16:28:37',`techDesign` = '',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-02 16:42:58',`codeDevelop` = '',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-09-09',`actTestEndDate` = '2016-09-09 18:06:39',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-09-16',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '275'
  SELECT * FROM `zt_hdc` WHERE id  = '275'
  SELECT * FROM `zt_task` WHERE story  = '1630' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '谢娇艳/2413',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '贺斌/868',`actReqComfimBeganDate` = '',`actReqComfimEndDate` = '',`techDesign` = '贺斌/868',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '',`codeDevelop` = '贺斌/868',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '',`deadline` = '2016-09-26',`actTestBeganDate` = '',`actTestEndDate` = '',`siteAccept` = '谢娇艳/2413',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '947'
  SELECT * FROM `zt_hdc` WHERE id  = '947'
  SELECT * FROM `zt_task` WHERE story  = '1631' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-09-28',`actReqComfimEndDate` = '2016-09-28 10:37:15',`techDesign` = '刘杰/5285',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '',`onCodingStartDate` = '2016-09-28 10:37:41',`codeDevelop` = '鲁康/8738',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-09-28 17:30:34',`deadline` = '2016-09-26',`actTestBeganDate` = '2016-10-23 15:01:58',`actTestEndDate` = '2016-10-23 15:01:58',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '2016-10-05 01:06:35',`actOnsiteTestEndDate` = '2016-10-05 01:06:35',`recopercent` = '100%',`confimDate` = '2016-10-05 01:06:35',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '948'
  SELECT * FROM `zt_hdc` WHERE id  = '948'
  SELECT * FROM `zt_task` WHERE story  = '3340' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:45',`actReqComfimEndDate` = '2016-10-23 15:01:45',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-24',`onCodingStartDate` = '2016-10-24',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-01 18:41:12',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:03:10',`actTestEndDate` = '2016-11-14 14:03:10',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '2580'
  SELECT * FROM `zt_hdc` WHERE id  = '2580'
  SELECT * FROM `zt_task` WHERE story  = '3341' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '2016-10-23',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:01:28',`actReqComfimEndDate` = '2016-10-23 15:01:28',`techDesign` = '张慧珍/4282',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-11-01',`onCodingStartDate` = '2016-11-01',`codeDevelop` = '张慧珍/4282',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-02 19:25:10',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:37',`actTestEndDate` = '2016-11-14 14:02:37',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '2581'
  SELECT * FROM `zt_hdc` WHERE id  = '2581'
  SELECT * FROM `zt_task` WHERE story  = '3342' ORDER BY `id` ASC 
  SELECT t1.account, t2.realname FROM `zt_team` AS t1  LEFT JOIN `zt_user` AS t2  ON t1.account = t2.account  WHERE t1.project  = '1191'
  UPDATE `zt_hdc` SET `funcDesign` = '林天桦/7409',`estReqSubmitDate` = '0000-00-00',`actReqSubmitDate` = '',`remoteTest` = '段俊宇/3543',`actReqComfimBeganDate` = '2016-10-23 15:00:16',`actReqComfimEndDate` = '2016-10-23 15:00:16',`techDesign` = '陈俊/4268',`estCodeStartDate` = '0000-00-00',`actCodeStartDate` = '2016-10-25',`onCodingStartDate` = '2016-10-25',`codeDevelop` = '陈俊/4268',`estCodeEndDate` = '0000-00-00',`actCodeEndDate` = '2016-11-03 10:37:04',`deadline` = '2016-11-06',`actTestBeganDate` = '2016-11-14 14:02:04',`actTestEndDate` = '2016-11-14 14:02:04',`siteAccept` = '林天桦/7409',`estTestEndDate` = '0000-00-00',`actOnsiteTestBeganDate` = '',`actOnsiteTestEndDate` = '',`recopercent` = '100%',`confimDate` = '2016-11-21',`operateTime` = '2016-11-29 10:20:33' WHERE id  = '2582'
  SELECT * FROM `zt_hdc` WHERE id  = '2582'

20161129 10:27:33: /ztp/zentaopms/www/index.php?m=misc&f=ping&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE 1 = 1  AND  owner IN ('system') AND  module IN ('common') AND  section IN ('global') AND  `key` IN ('sn')

20161129 10:37:34: /ztp/zentaopms/www/index.php?m=misc&f=ping&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 

20161129 10:47:33: /ztp/zentaopms/www/index.php?m=misc&f=ping&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE 1 = 1  AND  owner IN ('system') AND  module IN ('common') AND  section IN ('global') AND  `key` IN ('sn')

20161129 10:57:34: /ztp/zentaopms/www/index.php?m=misc&f=ping&t=html
  SELECT * FROM `zt_config` WHERE owner IN ('system','11014') ORDER BY `id` 
  SELECT * FROM `zt_lang` ORDER BY `lang`,`id` 
  SELECT * FROM `zt_config` WHERE 1 = 1  AND  owner IN ('system') AND  module IN ('common') AND  section IN ('global') AND  `key` IN ('sn')

