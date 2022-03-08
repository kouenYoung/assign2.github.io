from django.urls import path
from .import views
from django.contrib import admin
from music_app.views import users_create_view

urlpatterns = [
    path('', views.index, name='index'),
    path('users/', views.users_create_view, name='users_create_view' ),
]