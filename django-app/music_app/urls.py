from django.urls import path
from .import views
from django.contrib import admin

from music_app.views import register, songs


urlpatterns = [
    path('', views.index, name='index'),
    path('users/', views.index, name="list-usernames"),
    path('register/', views.register, name = "register"),
    path('songs/', views.songs, name = "songs")
    ]