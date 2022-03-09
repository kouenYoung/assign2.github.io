from django.shortcuts import render
from django.http import HttpResponse

from .forms import UsersForm

from .models import Users

# Create your views here.

def index(request):
    users = Users.objects.all()
    return render(request, 'music_app/index.html', {'users': users})


def register(request):
    form = UsersForm(request.POST or None)
    if form.is_valid():
        form.save()

        context = {
            'form': form
        }
        return render(request, 'music_app/register.html', context)