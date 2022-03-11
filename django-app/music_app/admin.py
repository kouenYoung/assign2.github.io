from enum import unique
from django.contrib import admin

from .models import SongDetails, Users, Artists, Ratings, SongInfo, Song

admin.site.register(Users)

admin.site.register(Artists)

admin.site.register(Ratings)

admin.site.register(SongInfo)

admin.site.register(Song)

admin.site.register(SongDetails)

# Register your models here.
