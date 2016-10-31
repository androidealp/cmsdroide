<<<<<<< HEAD
/**
 * Database schema required by \yii\rbac\DbManager.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Alexander Kochetov <creocoder@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * @since 2.0
 */

drop table if exists "auth_assignment";
drop table if exists "auth_item_child";
drop table if exists "auth_item";
drop table if exists "auth_rule";

create table "auth_rule"
(
   "name"  varchar(64) not null,
   "data"  text,
   "created_at"           integer,
   "updated_at"           integer,
    primary key ("name")
);

create table "auth_item"
(
   "name"                 varchar(64) not null,
   "type"                 integer not null,
   "description"          text,
   "rule_name"            varchar(64),
   "data"                 text,
   "created_at"           integer,
   "updated_at"           integer,
   primary key ("name"),
   foreign key ("rule_name") references "auth_rule" ("name") on delete set null on update cascade,
   key "type" ("type")
);

create table "auth_item_child"
(
   "parent"               varchar(64) not null,
   "child"                varchar(64) not null,
   primary key ("parent","child"),
   foreign key ("parent") references "auth_item" ("name") on delete cascade on update cascade,
   foreign key ("child") references "auth_item" ("name") on delete cascade on update cascade
);

create table "auth_assignment"
(
   "item_name"            varchar(64) not null,
   "user_id"              varchar(64) not null,
   "created_at"           integer,
   primary key ("item_name","user_id"),
   foreign key ("item_name") references "auth_item" ("name") on delete cascade on update cascade
);
=======
/**
 * Database schema required by \yii\rbac\DbManager.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Alexander Kochetov <creocoder@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * @since 2.0
 */

drop table "auth_assignment";
drop table "auth_item_child";
drop table "auth_item";
drop table "auth_rule";

-- create new auth_rule table
create table "auth_rule"
(
   "name"  varchar(64) not null,
   "data"  varchar(1000),
   "created_at"           integer,
   "updated_at"           integer,
    primary key ("name")
);

-- create auth_item table
create table "auth_item"
(
   "name"                 varchar(64) not null,
   "type"                 integer not null,
   "description"          varchar(1000),
   "rule_name"            varchar(64),
   "data"                 varchar(1000),
   "created_at"           integer,
   "updated_at"           integer,
        foreign key ("rule_name") references "auth_rule"("name") on delete set null,
        primary key ("name")
);
-- adds oracle specific index to auth_item 
CREATE INDEX auth_type_index ON "auth_item"("type");

create table "auth_item_child"
(
   "parent"               varchar(64) not null,
   "child"                varchar(64) not null,
   primary key ("parent","child"),
   foreign key ("parent") references "auth_item"("name") on delete cascade,
   foreign key ("child") references "auth_item"("name") on delete cascade
);

create table "auth_assignment"
(
   "item_name"            varchar(64) not null,
   "user_id"              varchar(64) not null,
   "created_at"           integer,
   primary key ("item_name","user_id"),
   foreign key ("item_name") references "auth_item" ("name") on delete cascade
);
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
