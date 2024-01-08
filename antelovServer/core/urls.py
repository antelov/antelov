from django.urls import path
from core.views import (
    CustomerView,
    ServiceProviderView,
)




urlpatterns = [
    path('customer/', CustomerView.as_view(), name='customer_api'),
    path('serviceprovider/', ServiceProviderView.as_view(), name='service_provider_api'),
    # path('login/',LoginView.as_view(),name="login"),
    # path('logout/',LogoutView.as_view(),name="logout"),
]