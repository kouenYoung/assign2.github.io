from django.shortcuts import render
from django.http import HttpResponse
from django.template import loader

from .forms import UsersForm, SongsForm

from .models import Users, Ratings

# Create your views here.

def index(request):
    users = Users.objects.all()
    return render(request, 'music_app/index.html', {'users': users})


def register(request):
    form = UsersForm(request.POST or None)
    if form.is_valid():
        form.save()
        form = UsersForm()

    context = {
        'form': form
    }
    return render(request, 'music_app/register.html', context)

def songs(request):
    form = SongsForm(request.POST or None)
    if form.is_valid():
        ratings = Ratings.objects.filter(username = form.cleaned_data["username"])

    context = {
        'form': form,
        'ratings_list' : ratings
    }
    return render(request, 'music_app/songs.html', context)