$ sqlite3 lds-scriptures-sqlite.db
SQLite version 3.33.0 2020-08-14 13:23:32
Enter ".help" for usage hints.
sqlite> .headers on
sqlite> .mode csv
sqlite> .output lds-scriptures.csv
sqlite> SELECT * FROM scriptures;
sqlite> .quit
