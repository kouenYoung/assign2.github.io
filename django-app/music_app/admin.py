from django.contrib import admin

from .models import Users, Artists, Ratings, SongInfo

admin.site.register(Users)

admin.site.register(Artists)

admin.site.register(Ratings)

admin.site.register(SongInfo)

# Register your models here.
