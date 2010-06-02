-- table tl_xkn_jeu_concours

CREATE TABLE `tl_xkn_jeu_concours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `tstamp` int(10) unsigned NOT NULL DEFAULT '0',
  `title` text,
  `explanation` text,
  `date_begin` int(10) NOT NULL,
  `date_end` int(10) NOT NULL,
  `published` int(1) DEFAULT '0',
  `type_jeu` varchar(30) DEFAULT 'formulaire',
  `question` text,
  `reponse_1` text,
  `reponse_2` text,
  `reponse_3` text,
  `calendrier` int(1) DEFAULT '0',
  `allow_late_inscription` int(11) DEFAULT '1',
  `subtitle` text,
  `presentation` text,
  `img` varchar(50) DEFAULT NULL,
  `explication_texte` text,
  `legal` text,
  `img_validation` varchar(50) DEFAULT NULL,
  `validation_texte` text,
	`pdfSingleSRC` varchar(255) NOT NULL default '',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- table tl_xkn_participation_jeu

CREATE TABLE `tl_xkn_jeu_participation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tstamp` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned DEFAULT NULL,
  `id_participant` int(10) NOT NULL,
	`date` varchar(255) NOT NULL,
  `reponse` int(1) DEFAULT NULL,
  `upload` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `xkn_id_game` int(10) unsigned NOT NULL default '0',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;