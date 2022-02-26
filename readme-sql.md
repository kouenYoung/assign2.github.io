1a)

Created a database in XAMPP called 'music_db'



```sql
Create Table users (username varchar(255) PRIMARY KEY, password varchar(255));


INSERT INTO users (username, password)
    VALUES ("Amelia-Earhart", "Youaom139&yu7");
INSERT INTO users (username, password)
    VALUES ("Otto", "StarWars2*");
```



```sql
Create Table ratings (id int(1) PRIMARY KEY, username varchar(255), song varchar(255), rating int(1));


INSERT INTO users (id, username, song, rating)
    VALUES (1, "Amelia-Earhart", "Freeway", 3);
INSERT INTO users (id, username, song, rating)
    VALUES (2, "Amelia-Earhart", "Days of Wine and Roses", 4);
INSERT INTO users (id, username, song, rating)
    VALUES (3, "Otto", "Days of Wine and Roses", 5);
INSERT INTO users (id, username, song, rating)
    VALUES (4, "Amelia-Earhart", "These Walls", 4);
```




Creating artist table:

```sql
CREATE TABLE artists (song varchar(255) PRIMARY KEY, artist varchar(255));

INSERT INTO artists VALUES("Freeway", "Aimee Mann");
INSERT INTO artists VALUES("Days of Wine and Roses", "Bill Evans");
INSERT INTO artists VALUES("These Walls", "Kendrick Lamar");
```


