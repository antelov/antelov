from django.urls import path
from core.views import (
    CustomerView,
    ServiceProviderView,
)
from rest_framework_simplejwt.views import (
    TokenObtainPairView,
    TokenRefreshView,
    TokenVerifyView
)



#customer APIs
urlpatterns = [
    path('customer/', CustomerView.as_view(), name='customer_api'),
    # path('login/',LoginView.as_view(),name="login"),
    # path('logout/',LogoutView.as_view(),name="logout"),
]


#service provider APIs
urlpatterns += [
    path('serviceprovider/', ServiceProviderView.as_view(), name='service_provider_api'),

]



#token APIs
urlpatterns += [
    path('token/', TokenObtainPairView.as_view(), name='token_obtain_pair'),
    path('token/refresh/', TokenRefreshView.as_view(), name='token_refresh'),
    path('token/verify/', TokenVerifyView.as_view(), name='token_verify'),

]