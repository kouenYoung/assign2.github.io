# Generated by Django 3.2.12 on 2022-03-05 05:18

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Artists',
            fields=[
                ('song', models.CharField(max_length=200, primary_key=True, serialize=False)),
                ('artist', models.CharField(max_length=200)),
            ],
        ),
        migrations.CreateModel(
            name='Users',
            fields=[
                ('username', models.CharField(max_length=200, primary_key=True, serialize=False)),
                ('password', models.CharField(max_length=200)),
            ],
        ),
        migrations.CreateModel(
            name='Ratings',
            fields=[
                ('id', models.IntegerField(primary_key=True, serialize=False)),
                ('song', models.CharField(max_length=200)),
                ('rating', models.IntegerField()),
                ('username', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='music_app.users')),
            ],
        ),
    ]