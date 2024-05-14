DROP TABLE IF EXISTS users ;

CREATE TABLE users (
  id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  first VARCHAR(256) NOT NULL,
  last VARCHAR(256) NOT NULL,
  email VARCHAR(256) NOT NULL,
  uid VARCHAR(256) NOT NULL,
  pwd VARCHAR(256) NOT NULL
);

INSERT INTO users (first, last, email, uid, pwd)
  VALUES ('Daniel', 'Nielsen', 'usemmtuts@gmail.com', 'Admin', 'test123');

INSERT INTO users (first, last, email, uid, pwd)
  VALUES ('Jane', 'Doe', 'jane@gmail.com', 'jane245', 'test1234');