/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  4/18/2021 12:19:56 AM                    */
/*==============================================================*/


drop table if exists COMMANDE;

drop table if exists COMMANDER;

drop table if exists MATERIEL;

drop table if exists USERS;

drop table if exists QUINCAILLERIE;

drop table if exists CLIENT;

drop table if exists QUINCAILLERIER;

drop table if exists CATEGORIE;

drop table if exists CONTACT;





/*==============================================================*/
/* Table: USERS                                                 */
/*==============================================================*/
create table USERS
(
   ID_USER              int not null auto_increment,
   DROIT                varchar(20) null,
   PWD                  varchar(20) null,
   USER_NAME            varchar(20) null,
   PROFIL               varchar(250) null,
   USER_STATUS          varchar(8)   null,
   primary key (ID_USER)
);


/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT
(
   ID_CLIENT        varchar(7) not null,
   ID_USER          int not null,
   STATUS_CLIENT    varchar(70) null,
   NOM_CLIENT varchar(50) null,
   PRENOM_CLIENT varchar(50) null,
   EMAIL_CLIENT varchar(20) null,
   VILLE_CLIENT varchar(50) null,
   SECTEUR_CLIENT varchar(50) null ,
   CNIB_CLIENT varchar(9) null,
   primary key (ID_CLIENT)
);



/*==============================================================*/
/* Table : QUINCAILLERIER                                              */
/*==============================================================*/
create table QUINCAILLERIER
(
   ID_QUINCAILLERIER    int not null,
   ID_USER              int not null,
   STATUS_QUINCAILLERIE  varchar(70) null,
   NOM_QUINC varchar(50) null,
   PRENOM_QUINC varchar(50) null,
   EMAIL_QUINC varchar(20) null,
   TELEPHONE_QUINC int DEFAULT null,
   VILL_QINC varchar(50) null,
   SECTEUR_QUINC varchar(50) null,
   CNIB varchar(9) null,
   primary key (ID_QUINCAILLERIER)
);




/*==============================================================*/
/* Table: QUINCAILLERIE                                         */
/*==============================================================*/
create table QUINCAILLERIE
(
   ID_QUINCAILLERIE      varchar(7) not null,
   ID_QUINCAILLERIER    int  not null,
   NOM_QUINCAILLERIE    varchar(70) null,
   VILLE_QUINCAILLERIE  varchar(70) null,
   SECTEUR_QUINCAILLERIE varchar(70) null,
   NOM_DOMAIN           varchar(256) null,
   primary key (ID_QUINCAILLERIE)
);



/*==============================================================*/
/* Table: COMMANDE                                              */
/*==============================================================*/

create table COMMANDE
(
   ID_COMMANDE          int not null auto_increment ,
   ID_QUINCAILLERIE     int not null,
   ID_CLIENT            varchar(7) not null,
   QUANTITE             int  null,
   DATE_ENREGISTREMENT  date  null,
   STATUS_COMMANDE      varchar(20)   null,
   SOMME_VERSE          int   null,
   CODE_COMMANDE        varchar(20)   null,
   primary key (ID_COMMANDE)
    );
    
  
  
  /*==============================================================*/
/* Table: CATEGORIE                                             */
/*==============================================================*/
create table CATEGORIE
(
   ID_CATEGORIE         int not null auto_increment,
   TYPE_CATEGORIE       varchar(70) null,
   primary key (ID_CATEGORIE)
);




/*==============================================================*/
/* Table: MATERIEL                                              */
/*==============================================================*/

create table MATERIEL
(
   ID_MATERIEL          int not null,
   ID_QUINCAILLERIE      int not null,
   ID_CATEGORIE         int not null  ,
   NOM_MATERIEL         varchar(70) null  ,
   PRIX_HOMOLOGUE       int null,
   PRIX_REDUIT          int null,
   LINK                 varchar(256) null  ,
   DATE_ENREGISTREMENT  date null ,
   primary key (ID_MATERIEL)
);
  
  
    
/*==============================================================*/
/* Table: COMMANDER                                             */
/*==============================================================*/
create table COMMANDER
(
   ID_COMMANDER          int not null auto_increment,
   ID_MATERIEL          int not null,
   ID_COMMANDE         int not null,
   PRIX_UNITAIRE        int    null,
   QUANTITE             int    null,
   primary key (ID_COMMANDER)
);



/*==============================================================*/
/* Table: CONTACT                                            */
/*==============================================================*/
create table CONTACT
(
   ID_CONTACT          int not null auto_increment,
   ID_USER          int not null,
   NOM_COMPLET       varchar(70)   null,
   EMAIL             varchar(20)    null,
   MOTIF             varchar(70)    null,
   MESSAGE           varchar(256)    null,
   primary key (ID_CONTACT)
);




alter table COMMANDE add constraint FK_RECEVIOR foreign key (ID_QUINCAILLERIE)
      references QUINCAILLERIE (ID_QUINCAILLERIE) on delete restrict on update restrict;
      
alter table COMMANDE add constraint FK_LANCER foreign key (ID_CLIENT)
      references CLIENT (ID_CLIENT) on delete restrict on update restrict;
      
alter table COMMANDER add constraint FK_COMMANDER_COMMANDE_COMMANDER foreign key (ID_COMMANDE)
      references COMMANDE (ID_COMMANDE) on delete restrict on update restrict;
      
alter table COMMANDER add constraint FK_COMMANDER_MATERIEL_COMMANDER foreign key (ID_MATERIEL)
      references MATERIEL (ID_MATERIEL) on delete restrict on update restrict;
      
alter table MATERIEL add constraint FK_AVOIR foreign key (ID_QUINCAILLERIE)
      references QUINCAILLERIE (ID_QUINCAILLERIE) on delete restrict on update restrict;
      
alter table MATERIEL add constraint FK_APPARTENIR foreign key (ID_CATEGORIE)
      references CATEGORIE (ID_CATEGORIE) on delete restrict on update restrict;
      
alter table QUINCAILLERIE add constraint FK_POSSERDER foreign key (ID_QUINCAILLERIER)
      references QUINCAILLERIER (ID_QUINCAILLERIER) on delete restrict on update restrict;
      
alter table QUINCAILLERIER add constraint FK_PEUT_ETRE foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;
      
alter table CLIENT add constraint FK_ETRE foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;
      
alter table CONTACT add constraint FK_PEUT_CONTACTER foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;
