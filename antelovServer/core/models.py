from django.db import models
from django.utils import timezone

#customer table
class Customer(models.Model):
    customer_username = models.CharField(primary_key=True, max_length=100)
    email = models.EmailField(unique=True)
    password = models.CharField(max_length=100)
    contact_number = models.BigIntegerField()
    account_created_at = models.DateTimeField(default=timezone.now)

#service providers pending accounts to be verified and registered
class PendingAccounts(models.Model):
    service_provider_username = models.CharField(max_length=100)
    email = models.EmailField()
    password = models.CharField(max_length=100)
    contact_number = models.CharField(max_length=20)
    acc_created_at = models.DateField()
    UEN = models.BigIntegerField()
    office_address = models.CharField(max_length=255)
    bank_account_number = models.CharField(max_length=50)
    bank_name = models.CharField(max_length=100)
    documents_path = models.CharField(max_length=255)  # Assuming as a string
    acc_status = models.CharField(max_length=100)

#service providers accounts after verfication( will automatically be added once the service provider is approved)
class ServiceProvider(models.Model):
    service_provider_username = models.CharField(max_length=100)
    email = models.EmailField()
    password = models.CharField(max_length=100)
    contact_number = models.CharField(max_length=20)  # Assuming as a string for flexibility
    acc_created_at = models.DateField()
    UEN = models.BigIntegerField()



class Offer(models.Model):
    offer_id = models.AutoField(primary_key=True)
    post = models.ForeignKey(Post, on_delete=models.CASCADE)
    created_at = models.DateField()
    description = models.TextField()
    service_provider_username = models.ForeignKey(ServiceProvider, on_delete=models.CASCADE)
    status = models.CharField(max_length=100)
    price = models.DecimalField(max_digits=10, decimal_places=2)



class Post(models.Model):
    post_id = models.AutoField(primary_key=True)
    customer_username = models.CharField(max_length=100)
    post_category = models.CharField(max_length=100)
    created_at = models.DateField()
    number_of_bids = models.IntegerField()
    post_status = models.CharField(max_length=100)

#this table for the requests/posts details
class PostDetails(models.Model):
    post = models.OneToOneField('Post', on_delete=models.CASCADE, primary_key=True)
    moving_category = models.CharField(max_length=100)
    moving_date = models.DateField()
    accessibility = models.CharField(max_length=100)
    services_provided = models.CharField(max_length=100)
    requirements = models.TextField()
    status = models.CharField(max_length=100)
    number_of_bids = models.IntegerField()
    hired_by = models.CharField(max_length=100, blank=True, null=True)
    bid_price = models.DecimalField(max_digits=10, decimal_places=2)
