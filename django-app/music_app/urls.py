from django.urls import path
from .import views
from django.contrib import admin

from music_app.views import register

from django.urls import reverse_lazy


urlpatterns = [
    path('', views.register, name='register'),


    ]