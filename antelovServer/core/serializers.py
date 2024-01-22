from rest_framework import serializers
from .models import Customer, ServiceProvider

class CustomerSerializer(serializers.ModelSerializer):
    class Meta:
        model = Customer
        fields = ['user', 'first_name','last_name','email', 'contact_number']
        # extra_kwargs = {'password': {'write_only': True}}

    def create(self, validated_data):
        return Customer.objects.create(**validated_data)

class ServiceProviderSerializer(serializers.ModelSerializer):
    class Meta:
        model = ServiceProvider
        fields = ['user', 'email', 'first_name','last_name','password', 'contact_number', 'UEN', 'office_address', 'bank_account_number', 'bank_name', 'documents_path', 'acc_status']
        #extra_kwargs = {'password': {'write_only': True}}

    def create(self, validated_data):
        return ServiceProvider.objects.create(**validated_data)