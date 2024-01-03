from django.urls import path
from . import views




urlpatterns = [
    path("a", views.index, name="index"),
    path("getData", views.getData, name="data")
]