-- Create table

DROP TABLE pocomed.PAM;

create table pocomed.PAM
(
  cd_tip_presc              INTEGER NOT NULL,
  antidotos                          VARCHAR2(255),
  apres_temperatura                   VARCHAR2(255),
  rec_diluente                          VARCHAR2(255),
  rec_risco                             VARCHAR2(255),
  rec_estabilidade                      VARCHAR2(255),
  dil_infusao                        VARCHAR2(255),
  dil_estabilidade                     VARCHAR2(255),
  dil_armazenamento                  VARCHAR2(255),
  ajuste_dose                        VARCHAR2(255),
  via_adm_recomendacao                VARCHAR2(255),
  incomp_farmaco_nutri              VARCHAR2(255),
  incomp_via_adm                     VARCHAR2(255),
  reacoes_adv                        VARCHAR2(255),
  recomendacoes_manipulacao          VARCHAR2(255),
  ref_bibli                         VARCHAR2(255),
  cd_usuario_ultima_alteracao       VARCHAR(255) NOT NULL,
  hr_ultima_alteracao               TIMESTAMP
)
tablespace USERS
  pctfree 10
  initrans 1
  maxtrans 255
  storage
  (
    initial 64K
    next 1M
    minextents 1
    maxextents unlimited
  );
-- Create/Recreate primary, unique and foreign key constraints 
alter table PAM
  add constraint PK_CD_ITEM_PRESC_PAM primary key (CD_TIP_PRESC)
  using index 
  tablespace USERS
  pctfree 10
  initrans 2
  maxtrans 255
  storage
  (
    initial 64K
    next 1M
    minextents 1
    maxextents unlimited
  );
