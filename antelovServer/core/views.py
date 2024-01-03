from django.shortcuts import render
from django.http import HttpResponse
from rest_framework.response import Response
from rest_framework.decorators import api_view
from core.models import Customer
from .serializers import CustomerSerializer




# @api_view(['GET'])
# def getData(request):
#     person = {'name': 'ali', 'age': 28}
#     return Response(person)




def index(request):
    return HttpResponse("welcome to antelov")

