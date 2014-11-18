CREATE TABLE "cities" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
    "country_id" INTEGER NOT NULL,
    "name" TEXT NOT NULL ,
    FOREIGN KEY(country_id) REFERENCES countries(id)
);
INSERT INTO cities ( id,country_id,name ) VALUES ( '1','1','Moscow' );
INSERT INTO cities ( id,country_id,name ) VALUES ( '2','1','Saint Petersburg' );
INSERT INTO cities ( id,country_id,name ) VALUES ( '3','1','Novosibirsk' );
INSERT INTO cities ( id,country_id,name ) VALUES ( '4','1','Yekaterinburg' );
INSERT INTO cities ( id,country_id,name ) VALUES ( '5','1','Nizhny Novgorod' );
INSERT INTO cities ( id,country_id,name ) VALUES ( '6','2','New York' );
INSERT INTO cities ( id,country_id,name ) VALUES ( '7','2','Los Angeles' );
INSERT INTO cities ( id,country_id,name ) VALUES ( '8','2','Chicago' );
INSERT INTO cities ( id,country_id,name ) VALUES ( '9','2','Houston' );
INSERT INTO cities ( id,country_id,name ) VALUES ( '10','2','Philadelphia' );
CREATE TABLE "countries" (
	"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
	"name" TEXT NOT NULL  UNIQUE
);
INSERT INTO countries ( id,name ) VALUES ( '1','Russia' );
INSERT INTO countries ( id,name ) VALUES ( '2','USA' );
CREATE TABLE "forecast" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT  NOT NULL, 
    "city_id" INTEGER NOT NULL,
    "temperature" FLOAT NOT NULL,
    "when_created" DATETIME NOT NULL,
    FOREIGN KEY(city_id) REFERENCES cities(id)
);
CREATE INDEX cities_country_id_idx ON cities(country_id);
CREATE INDEX forecast_city_id_idx ON cities(id);
