
CREATE TABLE `Pokemon` (
  `Id` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Type 1` int(11) DEFAULT NULL,
  `Type 2` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Trainers` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `CapturedPokemon` (
  `idCapturedPokemon` int(11) NOT NULL AUTO_INCREMENT,
  `TrainerId` int(11) DEFAULT NULL,
  `Name` varchar(145) DEFAULT NULL,
  `PokemonId` int(11) DEFAULT NULL,
  `MaxHP` int(11) DEFAULT NULL,
  `CurrentHP` int(11) DEFAULT NULL,
  `Exp` int(11) DEFAULT NULL,
  `Level` int(11) DEFAULT NULL,
  `Move1` int(11) DEFAULT NULL,
  `Move2` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCapturedPokemon`),
  KEY `TrainerPokemonId_idx` (`TrainerId`),
  CONSTRAINT `TrainerPokemonId` FOREIGN KEY (`TrainerId`) REFERENCES `Trainers` (`Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
