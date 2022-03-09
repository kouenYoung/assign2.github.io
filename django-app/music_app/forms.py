from django import forms

from .models import Users, Ratings

class UsersForm(forms.ModelForm):
    class Meta:
        model = Users
        fields = [
            'username', 
            'password'
        ]

class SongsForm(forms.ModelForm):
    class Meta:
        model = Ratings
        fields = [
            'username', 
        ]