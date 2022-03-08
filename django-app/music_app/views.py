from django.shortcuts import render
from django.http import HttpResponse

from .forms import UsersForm

def users_create_view(request):
    form = UsersForm(request.POST or None)
    if form.is_valid():
        form.save()

        context = {
            'form': form
        }
        return render(request, "music_app/index.html", context)

# Create your views here.

def index(request):
    return HttpResponse("Placeholder for future interface")

def users_detail_view(request):
    obj = Product.objects.get(id=1)
    return render(request, "user/detail.html", {})
