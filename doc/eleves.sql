
#------------------------------------------------------------
# Table: eleves
#------------------------------------------------------------

CREATE TABLE eleves(
        id_eleve       int (11) Auto_increment  NOT NULL ,
        nom            Varchar (50) ,
        prenom         Varchar (25) ,
        date_naissance Date ,
        PRIMARY KEY (id_eleve )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: matieres
#------------------------------------------------------------

CREATE TABLE matieres(
        id_matiere  int (11) Auto_increment  NOT NULL ,
        nom_matiere Varchar (50) ,
        PRIMARY KEY (id_matiere )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: eleves_matieres
#------------------------------------------------------------

CREATE TABLE eleves_matieres(
        note       Double ,
        date_note  Date ,
        id_eleve   Int NOT NULL ,
        id_matiere Int NOT NULL ,
        PRIMARY KEY (id_eleve ,id_matiere )
)ENGINE=InnoDB;

ALTER TABLE eleves_matieres ADD CONSTRAINT FK_eleves_matieres_id_eleve FOREIGN KEY (id_eleve) REFERENCES eleves(id_eleve);
ALTER TABLE eleves_matieres ADD CONSTRAINT FK_eleves_matieres_id_matiere FOREIGN KEY (id_matiere) REFERENCES matieres(id_matiere);


--
-- Contenu de la table `eleves`
--

INSERT INTO `eleves` (`id_eleve`, `nom`, `prenom`, `date_naissance`) VALUES
(1, 'SIMOES PINHO ', 'Bruno', '1993-06-03'),
(2, 'MOTILLON', 'Liliane', '1963-02-24'),
(3, 'HAMZAOUI', 'Sonia', '1990-02-08'),
(4, 'NEMOZ GAILLARD', 'Eric', '1969-03-27'),
(5, 'RECASENS', 'Vincent', '1992-03-10'),
(6, 'SINGOU', 'Davier', '1989-05-25'),
(7, 'EGEA', 'David', '1982-01-26'),
(8, 'LAURENT', 'Yannis', '1983-06-26');
-- --------------------------------------------------------

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`id_matiere`, `nom_matiere`) VALUES
(1, 'Français'),
(2, 'Anglais'),
(3, 'Mathématiques'),
(4, 'Java EE'),
(5, 'UML'),
(6, 'MySQL');

--
-- Contenu de la table `eleves_matieres`
--

INSERT INTO `eleves_matieres` (`note`, `date_note`, `id_eleve`, `id_matiere`) VALUES
(12.75, '2017-02-15', 1, 1),
(13.5, '2017-03-15', 2, 1),
(14, '2017-04-15', 1, 3),
(11.5, '2017-05-15', 5, 2),
(8, '2017-06-15', 6, 4),
(10.0, '2017-07-15', 7, 6),
(17, '2017-08-15', 1, 2),
(13.65, '2017-09-15', 8, 5);
