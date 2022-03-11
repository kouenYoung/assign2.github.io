# Generated by Django 3.2.12 on 2022-03-11 04:32

import django.core.validators
from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('music_app', '0004_song'),
    ]

    operations = [
        migrations.CreateModel(
            name='SongDetails',
            fields=[
                ('id', models.IntegerField(primary_key=True, serialize=False)),
                ('album', models.CharField(max_length=200)),
                ('year', models.IntegerField(validators=[django.core.validators.MinValueValidator(1900), django.core.validators.MaxValueValidator(2022)])),
                ('genre', models.CharField(max_length=200)),
                ('song', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='s_info', to='music_app.ratings')),
            ],
        ),
    ]
