from enum import unique
from django.contrib import admin

from .models import SongDetails, Users, Ratings, Song

admin.site.register(Users)


admin.site.register(Ratings)



admin.site.register(Song)

admin.site.register(SongDetails)

# Register your models here.
