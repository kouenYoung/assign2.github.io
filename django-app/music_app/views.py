from django.shortcuts import render
from django.http import HttpResponse

from .models import Users

# Create your views here.

def index(request):
    users = Users.objects.all().order_by('username')
    return render(request, 'music_app/index.html', {'users': users})
