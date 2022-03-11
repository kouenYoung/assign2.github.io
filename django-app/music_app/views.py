from nntplib import ArticleInfo
from django.shortcuts import render
from django.http import HttpResponse
from django.template import loader

from .forms import SongInfoForm, UsersForm, SongsForm, ArtistsForm, SongInfoForm

from .models import Users, Ratings, Artists, SongInfo
from django.http import HttpResponseRedirect,HttpResponse
# Create your views here.

def index(request):
    users = Users.objects.all()
    return render(request, 'music_app/index.html', {'users': users})


def register(request):
    
    users = UsersForm()
    rating_form = SongsForm()
    song_info_form = SongInfoForm()
    artists_form = ArtistsForm()
    ratings = None
    artist = None
    song_info = None
    if request.method == 'POST':
        if 'register' in request.POST:
            users = UsersForm(request.POST or None)
            if users.is_valid():
                users.save()
                users = UsersForm()

        if 'get_songs' in request.POST:
            rating_form = SongsForm(request.POST or None)
            if rating_form.is_valid():
                ratings = Ratings.objects.filter(username = rating_form.cleaned_data["username"])

        if 'song_to_artist' in request.POST:
            artists_form = ArtistsForm(request.POST or None)
            if artists_form.is_valid():
                artist = Artists.objects.filter(song = artists_form.cleaned_data['song'])

        if 'song_info' in request.POST:
            song_info_form = SongInfoForm(request.POST or None)
            if song_info_form.is_valid():
                song_info = SongInfo.objects.filter(song = song_info_form.cleaned_data['song'])

            
    context = {
        'form' : users,
        "form2": rating_form,
        "ratings_list" : ratings,
        'artist_form' : artists_form,
        'artists' : artist,
        "song_form" : song_info_form,
        'song_info' : song_info
    }
    return render(request, 'music_app/register.html', context)

def songs(request):
    return HttpResponse('<h1>Leaving here for now<h1>')