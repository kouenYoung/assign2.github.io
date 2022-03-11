This is the instructions on how to run this Django App and add users.

## Running the app

From within the django-app directory, run the music_app
with

```shell
source venv/bin/activate
python3 manage.py runserver
```


## Adding to Database

Go to the admin page at: http://127.0.0.1:8000/admin/ 

Use the following credentials to login in:
- Username: Admin
- Password: Djangoadmin0

# For Adding Users:
1. Go the 'Userss' section under 'MUSIC APP'
2. To add a new user, click 'ADD USERS'
3. Fill in the 'Username' and 'Password' fields *(Note if the username is taken, the user cannot be added)*
4. Click "Save". The user now exists in the Users database. If user is deleted their ratings in 
    the 'Ratings' database will also be deleted.

# Adding Ratings:
1. Go to 'Ratingss' section under 'MUSIC_APP'
2. Click 'Add RATINGS'
3. Enter a numeric id for the rating (*must be unique*)
4. choose a username existing in the users database
5. Enter the name of a song
6. Enter the numeric score of the song
7. Click 'Save'. Now the rating will be saved in the Ratings database

# Adding Songs
1. Go to "Songs' section under 'MUSIC_APP'
2. Click 'ADD ARTISTS'
3. Enter id, song and artists info *songs are a foreign key to songs in ratings database*
4. Click 'Save'

# Adding Song Info
1. GO to 'Song detailss' in 'MUSIC_APP'
2. Click "ADD SONG_DETAILS'
3. Enter, id , song, album, year, and genre. *song is a foreign key to ratings*
4. Click 'Save'


For example entries, all example users, songs and artists from the 
hw handout were entered as described, as shown in the hw.



