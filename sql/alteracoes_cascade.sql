ALTER TABLE `contribuicao` DROP FOREIGN KEY `contribuicao_ibfk_2`;
ALTER TABLE `contribuicao` ADD  CONSTRAINT `contribuicao_ibfk_2` FOREIGN KEY (`id_doacao`) REFERENCES `doacao`(`id_doacao`) ON DELETE CASCADE ON UPDATE RESTRICT;
ALTER TABLE `contribuicao` DROP FOREIGN KEY `contribuicao_ibfk_3`;
ALTER TABLE `contribuicao` ADD  CONSTRAINT `contribuicao_ibfk_3` FOREIGN KEY (`id_contribuinte`) REFERENCES `contribuinte`(`id_contribuinte`) ON DELETE CASCADE ON UPDATE RESTRICT;
ALTER TABLE `resultado` DROP FOREIGN KEY `resultado_ibfk_1`;
ALTER TABLE `resultado` ADD  CONSTRAINT `resultado_ibfk_1` FOREIGN KEY (`id_doacao`) REFERENCES `doacao`(`id_doacao`) ON DELETE CASCADE ON UPDATE RESTRICT;
ALTER TABLE `instituicao` CHANGE `perfil` `perfil` INT(11) NULL;
ALTER TABLE `doacao` CHANGE `data_publicacao` `data_publicacao` DATE NULL;
ALTER TABLE `item` CHANGE `imagem` `imagem` VARCHAR(255)  NULL;