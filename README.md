linet3
======

Linet accounting application



db log

account
ALTER TABLE `kQy8_accounts` ADD `password` VARCHAR(41) NOT NULL AFTER `system_acc`;
ALTER TABLE `kQy8_accounts` ADD `salt` VARCHAR(255) NOT NULL AFTER `password`;


mail