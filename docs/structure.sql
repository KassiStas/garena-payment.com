-- Generated by SQL Maestro for MySQL. Release date 7/17/2010
-- 9/5/2013 4:56:58 PM
-- ----------------------------------
-- Alias: PaymentTransaction at 10.0.2.2
-- Database name: PaymentTransaction
-- Host: 10.0.2.2
-- Port number: 3306
-- User name: root
-- Server: 5.5.32-0ubuntu0.13.04.1
-- Session ID: 74
-- Character set: latin1
-- Collation: latin1_swedish_ci


CREATE DATABASE PaymentTransaction
  CHARACTER SET latin1
  COLLATE latin1_swedish_ci;

USE PaymentTransaction;

/* Tables */
CREATE TABLE CreditTransaction (
  id            int AUTO_INCREMENT NOT NULL,
  invoice_id    varchar(50) COLLATE latin1_swedish_ci,
  partner_id    int NOT NULL,
  amount        int NOT NULL DEFAULT '0',
  real_revenue  int NOT NULL DEFAULT '0',
  activator     varchar(50) COLLATE latin1_swedish_ci,
  txn_datetime  datetime NOT NULL,
  created_date  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB
  COLLATE latin1_general_ci;

CREATE TABLE GarenaCards (
  cardno      varchar(50) NOT NULL,
  password    varchar(255),
  `value`     int,
  days        int,
  uid         int,
  added_time  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status`    int,
  extra       varchar(50),
  topup_id    int,
  PRIMARY KEY (cardno)
) ENGINE = InnoDB;

CREATE TABLE Partners (
  id             int AUTO_INCREMENT NOT NULL,
  partner_code   varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  partner_name   varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  service_code   varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  contact_name   varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  contact_email  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  contact_phone  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `status`       tinyint(1) DEFAULT '1',
  public_key     blob,
  private_key    blob,
  credit         int,
  created_date   timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_by     varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  ip_address     varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (id)
) ENGINE = InnoDB
  CHARACTER SET utf8 COLLATE utf8_bin;

CREATE TABLE ServiceLogs (
  id                   int AUTO_INCREMENT NOT NULL,
  log_type             varchar(50),
  gg_username          varchar(50),
  partner_id           int,
  topup_value          int,
  topup_partner_txnid  int,
  extra                varchar(255),
  `datetime`           timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  ip_address           varchar(15),
  PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE TopupTransaction (
  id                   int AUTO_INCREMENT NOT NULL,
  partner_id           int,
  gg_uid               int,
  gg_username          varchar(50),
  topup_type           varchar(10),
  topup_value          int,
  topup_gg_cardno      varchar(50),
  topup_partner_txnid  int,
  topup_datetime       timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  topup_status         int,
  topup_response       varchar(255),
  ip_address           varchar(15),
  PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE TopupTransactionState (
  id                   int NOT NULL,
  partner_id           int,
  gg_username          varchar(50),
  topup_type           varchar(10),
  topup_value          int,
  topup_partner_txnid  int,
  topup_datetime       datetime,
  topup_status         int,
  topup_response       varchar(255),
  ip_address           varchar(15),
  PRIMARY KEY (id)
) ENGINE = InnoDB;

/* Indexes */
CREATE INDEX FK_FK_Partners_Credits
  ON CreditTransaction
  (partner_id);

CREATE UNIQUE INDEX partner_code_UNIQUE
  ON Partners
  (partner_code);

CREATE INDEX FK_FK_Partners_Topups
  ON TopupTransaction
  (partner_id);

CREATE INDEX FK_FK_Topup_Cards
  ON TopupTransaction
  (topup_gg_cardno);

CREATE INDEX FK_FK_Transaction_State
  ON TopupTransactionState
  (topup_partner_txnid);

/* Foreign Keys */
ALTER TABLE CreditTransaction
  ADD CONSTRAINT FK_FK_Partners_Credits
  FOREIGN KEY (partner_id)
    REFERENCES Partners(id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

ALTER TABLE TopupTransaction
  ADD CONSTRAINT FK_FK_Partners_Topups
  FOREIGN KEY (partner_id)
    REFERENCES Partners(id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

ALTER TABLE TopupTransaction
  ADD CONSTRAINT FK_FK_Topup_Cards
  FOREIGN KEY (topup_gg_cardno)
    REFERENCES GarenaCards(cardno)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

ALTER TABLE TopupTransactionState
  ADD CONSTRAINT FK_FK_Transaction_State
  FOREIGN KEY (topup_partner_txnid)
    REFERENCES TopupTransaction(id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;