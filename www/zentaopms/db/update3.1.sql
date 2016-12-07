ALTER TABLE  `zt_task` ADD  `estStarted` DATE NOT NULL AFTER  `assignedDate` ,
ADD  `realStarted` DATE NOT NULL AFTER  `estStarted`;

ALTER TABLE `zt_config` ADD `module` VARCHAR( 30 ) NOT NULL AFTER `owner` ;
update zt_config set module = 'common';
update zt_config set company = 1 where `key` = 'sn';
delete from zt_config where `key` = 'version' and owner = 'system';
ALTER TABLE `zt_config` CHANGE `value` `value` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `zt_config` ADD UNIQUE `unique` (`company` , `owner` , `module` , `section` , `key`);
ALTER TABLE `zt_task` ADD `module` MEDIUMINT( 8 ) UNSIGNED NOT NULL DEFAULT '0' AFTER `project` ;
