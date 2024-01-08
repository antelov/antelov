from django.db import models
from django.utils import timezone
from django.contrib.auth.models import User
from django.contrib.auth.models import AbstractUser
from django.conf import settings



class CustomUser(AbstractUser):
    # choices
    CUST_TYPE = "customer"
    SERV_PROV_TYPE = "service provider"
    CUSTOM_USER_TYPE = [
        (CUST_TYPE, "customer type"),
        (SERV_PROV_TYPE, "service provider type"),
    ]

    email = models.EmailField(unique=True)
    type_user = models.CharField(max_length=20, choices=CUSTOM_USER_TYPE)

#customer table
class Customer(models.Model):
    user = models.ForeignKey(settings.AUTH_USER_MODEL, on_delete=models.SET_NULL, null=True, related_name="customers")
    first_name= models.CharField(max_length=20)
    last_name = models.CharField(max_length=20)
    email = models.EmailField(unique=True)
    contact_number = models.BigIntegerField()
    account_created_at = models.DateTimeField(default=timezone.now)

class ServiceProvider(models.Model):
    user = models.ForeignKey(settings.AUTH_USER_MODEL, on_delete=models.SET_NULL, null=True, related_name="service_providers")
    first_name= models.CharField(max_length=20)
    last_name = models.CharField(max_length=20)
    email = models.EmailField(unique=True)
    password = models.CharField(max_length=100)
    contact_number = models.CharField(max_length=20)
    acc_created_at = models.DateField(null=True)
    UEN = models.BigIntegerField(null=True)
    office_address = models.CharField(max_length=255)
    bank_account_number = models.CharField(max_length=50)
    bank_name = models.CharField(max_length=100)
    documents_path = models.CharField(max_length=255)  # Assuming as a string
    acc_status = models.CharField(max_length=100)

class Post(models.Model):
    customer = models.ForeignKey(Customer, on_delete=models.SET_NULL, null=True)
    post_category = models.CharField(max_length=100)
    created_at = models.DateField()
    number_of_bids = models.IntegerField()
    post_status = models.CharField(max_length=100)


class Offer(models.Model):
    post = models.ForeignKey(Post, on_delete=models.SET_NULL, null=True)
    created_at = models.DateField()
    description = models.TextField()
    service_provider = models.ForeignKey(ServiceProvider, on_delete=models.SET_NULL,  null=True)
    status = models.CharField(max_length=100)
    price = models.DecimalField(max_digits=10, decimal_places=2)

#this table for the requests/posts details
class PostDetails(models.Model):
    post = models.ForeignKey(Post, on_delete=models.SET_NULL,  null=True)
    moving_category = models.CharField(max_length=100)
    moving_date = models.DateField()
    accessibility = models.CharField(max_length=100)
    services_provided = models.CharField(max_length=100)
    requirements = models.TextField()
    status = models.CharField(max_length=100)
    number_of_bids = models.IntegerField()
    hired_by = models.CharField(max_length=100, blank=True, null=True)
    bid_price = models.DecimalField(max_digits=10, decimal_places=2)
