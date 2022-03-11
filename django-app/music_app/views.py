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
    
    users = UsersForm()
    rating_form = SongsForm()
    ratings = None
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
            
    
    context = {
        'form' : users,
        "form2": rating_form,
        "ratings_list" : ratings
    }
    return render(request, 'music_app/register.html', context)

def songs(request):
    return HttpResponse('<h1>Leaving here for now<h1>')