from django import forms

from .models import Users, Ratings, Artists, SongInfo

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

class ArtistsForm(forms.ModelForm):
    class Meta:
        model = Artists
        fields = [
            'song',
        ]

class SongInfoForm(forms.ModelForm):
    class Meta:
        model = SongInfo
        fields = [
            'song',
        ]