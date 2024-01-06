from django.shortcuts import render
from django.http import HttpResponse
from rest_framework.response import Response
from rest_framework.decorators import api_view
from core.models import Customer
from .serializers import CustomerSerializer, PendingAccountsSerializer


from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status
from rest_framework_simplejwt.tokens import RefreshToken
from django.contrib.auth.hashers import make_password, check_password
from .models import Customer, PendingAccounts




# @api_view(['GET'])
# def getData(request):
#     person = {'name': 'ali', 'age': 28}
#     return Response(person)

def index(request):
    return HttpResponse("welcome to antelov")

class RegisterCustomerView(APIView):
    def post(self, request):
        data = request.data.copy()
        data['password'] = make_password(data['password'])
        serializer = CustomerSerializer(data=data)
        
        if serializer.is_valid():
            serializer.save()
            return Response({"message": "Customer registered successfully"}, status=status.HTTP_201_CREATED)
        
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)

class RegisterPendingAccountView(APIView):
    def post(self, request):
        data = request.data.copy()
        data['password'] = make_password(data['password'])
        serializer = PendingAccountsSerializer(data=data)
        
        if serializer.is_valid():
            serializer.save()
            return Response({"message": "Pending account registered successfully"}, status=status.HTTP_201_CREATED)
        
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)

class LoginView(APIView):
    def post(self, request):
        username_or_email = request.data.get('username_or_email')
        password = request.data.get('password')
        user_type = request.data.get('user_type')  # 'customer' or 'pending_account'

        if user_type == 'customer':
            try:
                user = Customer.objects.get(email=username_or_email)
            except Customer.DoesNotExist:
                user = None
        elif user_type == 'pending_account':
            try:
                user = PendingAccounts.objects.get(email=username_or_email)
            except PendingAccounts.DoesNotExist:
                user = None
        else:
            return Response({"message": "Invalid user type"}, status=status.HTTP_400_BAD_REQUEST)

        if user and check_password(password, user.password):
            refresh = RefreshToken.for_user(user)
            response = Response()
            response.set_cookie(key='access_token', value=str(refresh.access_token), httponly=True)
            return response

        return Response({"message": "Invalid credentials"}, status=status.HTTP_401_UNAUTHORIZED)

class LogoutView(APIView):
    def post(self, request):
        response = Response()
        response.delete_cookie('access_token')
        return response