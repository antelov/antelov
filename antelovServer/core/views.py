import django
from django.shortcuts import render
from django.http import HttpResponse
from rest_framework.response import Response
from rest_framework.decorators import api_view
from core.models import Customer
from django.contrib.auth.models import User
from .serializers import CustomerSerializer, ServiceProviderSerializer


from rest_framework.views import APIView
from rest_framework import status
from rest_framework_simplejwt.tokens import RefreshToken
from django.contrib.auth.hashers import check_password


userModel = django.contrib.auth.get_user_model()

# @api_view(['GET'])
# def getData(request):
#     person = {'name': 'ali', 'age': 28}
#     return Response(person)

class CustomerView(APIView):
    def post(self, request):
        data = request.data.copy()
        serializer = CustomerSerializer(data=data)
        
        if serializer.is_valid():
            print(serializer)
            user = userModel.objects.create_user(data.get("username"), data.get("email"), data.get("password"),type_user="customer")
            data['user']=user.id
            serializer = CustomerSerializer(data=data)
            # serializer.is_valid()
            if serializer.is_valid():
                print(serializer)
                serializer.save()
                return Response({"message": "Customer registered successfully"}, status=status.HTTP_201_CREATED)
        
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
    
class ServiceProviderView(APIView):
    def post(self, request):
        data = request.data.copy()
        serializer = ServiceProviderSerializer(data=data)
        
        if serializer.is_valid():
            print(serializer)
            user = userModel.objects.create_user(data.get("username"), data.get("email"), data.get("password"),type_user="service provider")
            data['user']=user.id
            serializer = ServiceProviderSerializer(data=data)
            # serializer.is_valid()
            if serializer.is_valid():
                print(serializer)
                serializer.save()
                return Response({"message": "Service Provider registered successfully"}, status=status.HTTP_201_CREATED)
        
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)

