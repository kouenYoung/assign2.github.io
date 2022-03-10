from django.shortcuts import render
from django.http import HttpResponse
from django.template import loader

from .forms import UsersForm, SongsForm

from .models import Users, Ratings
from django.http import HttpResponseRedirect,HttpResponse
# Create your views here.

def index(request):
    users = Users.objects.all()
    return render(request, 'music_app/index.html', {'users': users})


def register(request):
    form = UsersForm(request.POST or None)
    form2 = SongsForm(request.POST or None)
    if form.is_valid():
        form.save()
        form = UsersForm()
        #return HttpResponseRedirect('/music_app/songs/')
    if form2.is_valid():
        ratings = Ratings.objects.filter(username = form2.cleaned_data["username"])
        form2 = SongsForm()
    else:
        ratings = None
    context = {
        'form': form,
        'form2': form2,
        'ratings_list' : ratings
    }
    return render(request, 'music_app/register.html', context)

def songs(request):
    return HttpResponse('<h1>Testing stuff<h1>')
    """form = SongsForm(request.POST or None)
    if form.is_valid():
        ratings = Ratings.objects.filter(username = form.cleaned_data["username"])
    else:
        ratings = None

    context = {
        'form': form,
        'ratings_list' : ratings
    }
    return render(request, 'music_app/songs.html', context)"""