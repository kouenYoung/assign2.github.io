from django.contrib import admin

from .models import Users, Artists, Ratings

admin.site.register(Users)

admin.site.register(Artists)

admin.site.register(Ratings)

# Register your models here.
