/*
 Navicat Premium Data Transfer

 Source Server         : dbname@localhost
 Source Server Type    : PostgreSQL
 Source Server Version : 150001 (150001)
 Source Host           : localhost:5432
 Source Catalog        : dbname
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 150001 (150001)
 File Encoding         : 65001

 Date: 23/01/2023 18:13:20
*/


-- ----------------------------
-- Sequence structure for assigned_offers_id_offer_user_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."assigned_offers_id_offer_user_seq";
CREATE SEQUENCE "public"."assigned_offers_id_offer_user_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."assigned_offers_id_offer_user_seq" OWNER TO "dbuser";

-- ----------------------------
-- Sequence structure for id_offer
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."id_offer";
CREATE SEQUENCE "public"."id_offer" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."id_offer" OWNER TO "dbuser";

-- ----------------------------
-- Sequence structure for users_id
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id";
CREATE SEQUENCE "public"."users_id" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."users_id" OWNER TO "dbuser";

-- ----------------------------
-- Table structure for assigned_offers
-- ----------------------------
DROP TABLE IF EXISTS "public"."assigned_offers";
CREATE TABLE "public"."assigned_offers" (
  "id_offer_user" int4 NOT NULL DEFAULT nextval('assigned_offers_id_offer_user_seq'::regclass),
  "id_offer" int4 NOT NULL,
  "id_user" int4 NOT NULL
)
;
ALTER TABLE "public"."assigned_offers" OWNER TO "dbuser";

-- ----------------------------
-- Records of assigned_offers
-- ----------------------------
BEGIN;
INSERT INTO "public"."assigned_offers" ("id_offer_user", "id_offer", "id_user") VALUES (5, 6, 4);
COMMIT;

-- ----------------------------
-- Table structure for offers
-- ----------------------------
DROP TABLE IF EXISTS "public"."offers";
CREATE TABLE "public"."offers" (
  "id_offer" int4 NOT NULL DEFAULT nextval('id_offer'::regclass),
  "offer_user_id" int4 NOT NULL,
  "title" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "description" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "available_from" date NOT NULL,
  "available_to" date NOT NULL,
  "requirements_description" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "img" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "localisation" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "animals" bool NOT NULL,
  "plants" bool NOT NULL,
  "cleaning" bool NOT NULL,
  "house_care" bool NOT NULL,
  "available" bool NOT NULL DEFAULT true
)
;
ALTER TABLE "public"."offers" OWNER TO "dbuser";

-- ----------------------------
-- Records of offers
-- ----------------------------
BEGIN;
INSERT INTO "public"."offers" ("id_offer", "offer_user_id", "title", "description", "available_from", "available_to", "requirements_description", "img", "localisation", "animals", "plants", "cleaning", "house_care", "available") VALUES (7, 1, 'Tajskie szaleństwo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum lorem velit, vitae sodales nisl faucibus eget.', '2023-01-01', '2023-01-02', 'Etiam pellentesque malesuada justo, et ullamcorper elit venenatis id. Ut lobortis augue quis rutrum varius', 'zdjecie1.jpg', 'Tajlandia', 't', 't', 'f', 'f', 't');
INSERT INTO "public"."offers" ("id_offer", "offer_user_id", "title", "description", "available_from", "available_to", "requirements_description", "img", "localisation", "animals", "plants", "cleaning", "house_care", "available") VALUES (3, 1, 'Chatka w lesie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum lorem velit, vitae sodales nisl faucibus eget.', '2022-12-30', '2022-12-31', 'Etiam pellentesque malesuada justo, et ullamcorper elit venenatis id. Ut lobortis augue quis rutrum varius', 'zdjecie2.jpg', 'Bieszczady', 't', 't', 'f', 'f', 't');
INSERT INTO "public"."offers" ("id_offer", "offer_user_id", "title", "description", "available_from", "available_to", "requirements_description", "img", "localisation", "animals", "plants", "cleaning", "house_care", "available") VALUES (8, 1, 'Apartamenty nad morzem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum lorem velit, vitae sodales nisl faucibus eget.', '2023-01-13', '2023-01-14', 'Etiam pellentesque malesuada justo, et ullamcorper elit venenatis id. Ut lobortis augue quis rutrum varius', 'zdjecie3.jpg', 'Ustka', 't', 'f', 'f', 't', 't');
INSERT INTO "public"."offers" ("id_offer", "offer_user_id", "title", "description", "available_from", "available_to", "requirements_description", "img", "localisation", "animals", "plants", "cleaning", "house_care", "available") VALUES (10, 4, 'Testowa nowa oferta', 'lorem', '2023-01-23', '2023-01-25', 'lorem', 'testowe.jpg', 'Polska', 't', 'f', 't', 't', 't');
INSERT INTO "public"."offers" ("id_offer", "offer_user_id", "title", "description", "available_from", "available_to", "requirements_description", "img", "localisation", "animals", "plants", "cleaning", "house_care", "available") VALUES (6, 1, 'Miejski domek', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum lorem velit, vitae sodales nisl faucibus eget.', '2023-01-01', '2023-01-02', 'Etiam pellentesque malesuada justo, et ullamcorper elit venenatis id. Ut lobortis augue quis rutrum varius', 'zdjecie4.jpg', 'Chicago', 'f', 't', 'f', 'f', 'f');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id_user" int4 NOT NULL DEFAULT nextval('users_id'::regclass),
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "surname" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "is_admin" bool NOT NULL DEFAULT false
)
;
ALTER TABLE "public"."users" OWNER TO "dbuser";

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO "public"."users" ("id_user", "name", "surname", "email", "password", "is_admin") VALUES (1, 'admin', 'admin', 'admin@admin.com', '$2y$10$.W.A87r4AbwV27AiUSF1ueFekKWAVfZy4xcMQw5QA8tSdaQlwxrHS', 't');
INSERT INTO "public"."users" ("id_user", "name", "surname", "email", "password", "is_admin") VALUES (4, 'Jan', 'Kowalski', 'jan@kowalski.com', '$2y$10$iQMUCeM504CxGTYdGORiN./d1Jx8R5rg3FZgTn8kwnxk2AFehm0Ka', 'f');
COMMIT;

-- ----------------------------
-- View structure for show_assigned_offers
-- ----------------------------
DROP VIEW IF EXISTS "public"."show_assigned_offers";
CREATE VIEW "public"."show_assigned_offers" AS  SELECT users.email,
    users.name,
    users.surname,
    offers.title AS "offer title"
   FROM assigned_offers
     JOIN users ON users.id_user = assigned_offers.id_user
     JOIN offers ON offers.id_offer = assigned_offers.id_offer;
ALTER TABLE "public"."show_assigned_offers" OWNER TO "dbuser";

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."assigned_offers_id_offer_user_seq"
OWNED BY "public"."assigned_offers"."id_offer_user";
SELECT setval('"public"."assigned_offers_id_offer_user_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."id_offer"
OWNED BY "public"."offers"."id_offer";
SELECT setval('"public"."id_offer"', 11, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id"
OWNED BY "public"."users"."id_user";
SELECT setval('"public"."users_id"', 4, true);

-- ----------------------------
-- Primary Key structure for table assigned_offers
-- ----------------------------
ALTER TABLE "public"."assigned_offers" ADD CONSTRAINT "assigned_offers_pkey" PRIMARY KEY ("id_offer_user");

-- ----------------------------
-- Primary Key structure for table offers
-- ----------------------------
ALTER TABLE "public"."offers" ADD CONSTRAINT "offers_pkey" PRIMARY KEY ("id_offer");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id_user");

-- ----------------------------
-- Foreign Keys structure for table assigned_offers
-- ----------------------------
ALTER TABLE "public"."assigned_offers" ADD CONSTRAINT "assigned_offers_offers_id_offer_fk" FOREIGN KEY ("id_offer") REFERENCES "public"."offers" ("id_offer") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."assigned_offers" ADD CONSTRAINT "assigned_offers_users_id_user_fk" FOREIGN KEY ("id_user") REFERENCES "public"."users" ("id_user") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table offers
-- ----------------------------
ALTER TABLE "public"."offers" ADD CONSTRAINT "offers_users_id_user_fk" FOREIGN KEY ("offer_user_id") REFERENCES "public"."users" ("id_user") ON DELETE CASCADE ON UPDATE CASCADE;
