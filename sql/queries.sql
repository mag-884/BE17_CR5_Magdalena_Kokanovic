CREATE DATABASE 'BE17_CR5_Magdalena';

DROP TABLE IF EXISTS `BE17_CR5_Magdalena`.`user`;
DROP TABLE IF EXISTS `BE17_CR5_Magdalena`.`animal`;

CREATE  TABLE `BE17_CR5_Magdalena`.`user` (

`id`  INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,

`first_name` VARCHAR(255) ,

`last_name` VARCHAR(100000) ,
    
`email` VARCHAR(255) UNIQUE ,
 
`phone_number` VARCHAR(255) ,
  
`address` VARCHAR(255) ,
    
`author_first_name` VARCHAR(255) ,
      
`picture` VARCHAR(255) ,
    
`password` VARCHAR(255),

`status` VARCHAR(4) NOT NULL DEFAULT 'user'
    
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;



CREATE  TABLE `BE17_CR5_Magdalena`.`animal` (

`id`  INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,

`name` VARCHAR(255) ,

`picture` VARCHAR(100000) ,
    
`location` VARCHAR(255) ,
 
`description` VARCHAR(255) ,
  
`size` VARCHAR(255) ,
    
`age` VARCHAR(255) ,
      
`vaccinated` VARCHAR(255) ,
    
`breed` VARCHAR(255),

`status` VARCHAR(255)

    
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;




INSERT INTO `animal` (`name`, `picture`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`)
 VALUES ('Pupi', 'malteser.jpg', 'Praterstraße 28, 1020 Wien', "adorable dog", '54cm', "3", "yes", "Malteser", "available");

INSERT INTO `animal` (`name`, `picture`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`)
 VALUES ('Mau', 'p1.jpg', 'Praterstraße 68, 1020 Wien', "adorable dog", '24cm', "9", "yes", "Malteser", "available");

INSERT INTO `animal` (`name`, `picture`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`)
 VALUES ('Ui', '11.jpg', 'Praterstraße 78, 1020 Wien', "adorable dog", '34cm', "1", "yes", "Malteser", "available");

INSERT INTO `animal` (`name`, `picture`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`)
 VALUES ('Li', 'ppp.jpg', 'Praterstraße 98, 1020 Wien', "adorable dog", '24cm', "1", "yes", "Pomeranian", "available");

INSERT INTO `animal` (`name`, `picture`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`)
 VALUES ('Mi', 'mi.jpg', 'Praterstraße 30, 1020 Wien', "adorable dog", '14cm', "3", "yes", "Malteser", "available");

INSERT INTO `animal` (`name`, `picture`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`)
 VALUES ('Rea', 'boo.jpg', 'Praterstraße 28, 1020 Wien', "adorable dog", '44cm', "1", "yes", "Poomeranian", "available");

INSERT INTO `animal` (`name`, `picture`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`)
 VALUES ('Emi', 'brown.jpg', 'Praterstraße 28, 1020 Wien', "adorable dog", '54cm', "1,5", "yes", "Malteser", "available");

INSERT INTO `animal` (`name`, `picture`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`)
 VALUES ('Yessi', 'Morkie.jpg', 'Praterstraße 38, 1020 Wien', "adorable dog", '36cm', "4", "yes", "Poomeranien", "available");

INSERT INTO `animal` (`name`, `picture`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`)
 VALUES ('Mogli', 'ivan.jpg', 'Praterstraße 28, 1020 Wien', "adorable dog", '36cm', "9", "yes", "Poomeranien", "available");

INSERT INTO `animal` (`name`, `picture`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`)
 VALUES ('Aron', 'black.jpg', 'Praterstraße 28, 1020 Wien', "adorable dog", '36cm', "1", "yes", "Poomeranien", "available");
















