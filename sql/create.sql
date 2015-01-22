CREATE TABLE Movie(
	id int NOT NULL, 
	title varchar(100) NOT NULL, 
	year int, 
	rating varchar(10), 
	company varchar(50),
	PRIMARY KEY(id),
	CHECK (id>0 AND year > 0)) ENGINE=INNODB; /*All id and year can not be negative*/ 

CREATE TABLE Actor(
	id int NOT NULL, 
	last varchar(20) NOT NULL, 
	first varchar(20) NOT NULL, 
	sex varchar(6), 
	dob date NOT NULL, 
	dod date,
	PRIMARY KEY(id),
	CHECK (sex = 'Female' OR sex ='Male')) ENGINE=INNODB; /*All actors must identify as either F or M*/
 
CREATE TABLE Director(
	id int NOT NULL, 
	last varchar(20) NOT NULL, 
	first varchar(20) NOT NULL, 
	dob date NOT NULL, 
	dod date,
	PRIMARY KEY(id)) ENGINE=INNODB;

CREATE TABLE MovieGenre(
	mid int, 
	genre varchar(20),
	FOREIGN KEY (mid) REFERENCES Movie(id)) ENGINE=INNODB;	/*If there is a movie here, it must be in the table Movie*/

CREATE TABLE MovieDirector(
	mid int,
	did int,
	FOREIGN KEY (mid) REFERENCES Movie(id),	/*If there is a movie here, it must be in the table Movie*/
	FOREIGN KEY (did) REFERENCES Director(id)) ENGINE=INNODB; /*If there is a director for the movie it must be in Director*/

CREATE TABLE MovieActor(
	mid int, 
	aid int, 
	role varchar(50), 
	PRIMARY KEY(mid, aid),
	FOREIGN KEY (mid) REFERENCES Movie(id),	/*If there is a movie here it must be in the table Movie*/	
	FOREIGN KEY (aid) REFERENCES Actor(id)) ENGINE=INNODB;	/*If there is a actor in a movie here it must be in the table Actor*/

CREATE TABLE Review(
	name varchar(20), 
	time timestamp, 
	mid int, 
	rating int, 
	comment varchar(500),
	FOREIGN KEY (mid) REFERENCES Movie(id),	/*If there is a Review of a Movie, that movie must be in Movie table*/
	CHECK (rating >0)) ENGINE=INNODB; /*A rating for a movie can not be negative*/

CREATE TABLE MaxPersonID(id int);

CREATE TABLE MaxMovieID(id int);

