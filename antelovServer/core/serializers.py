from rest_framework import serializers
from .models import Customer, PendingAccounts

class CustomerSerializer(serializers.ModelSerializer):
    class Meta:
        model = Customer
        fields = ['customer_username', 'email', 'password', 'contact_number', 'account_created_at']
        extra_kwargs = {'password': {'write_only': True}}

    def create(self, validated_data):
        return Customer.objects.create(**validated_data)

class PendingAccountsSerializer(serializers.ModelSerializer):
    class Meta:
        model = PendingAccounts
        fields = ['service_provider_username', 'email', 'password', 'contact_number', 'acc_created_at', 'UEN', 'office_address', 'bank_account_number', 'bank_name', 'documents_path', 'acc_status']
        extra_kwargs = {'password': {'write_only': True}}

    def create(self, validated_data):
        return PendingAccounts.objects.create(**validated_data)