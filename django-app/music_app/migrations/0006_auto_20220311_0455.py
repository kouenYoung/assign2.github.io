# Generated by Django 3.2.12 on 2022-03-11 04:55

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('music_app', '0005_songdetails'),
    ]

    operations = [
        migrations.DeleteModel(
            name='Artists',
        ),
        migrations.DeleteModel(
            name='SongInfo',
        ),
    ]