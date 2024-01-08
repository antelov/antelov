from django.contrib import admin
from .models import Post
from django.contrib.auth.admin import UserAdmin
from .models import CustomUser,Customer

admin.site.register(CustomUser, UserAdmin)

@admin.register(Post)
class PostAdmin(admin.ModelAdmin):
    list_display = ('customer',"post_category")
    list_filter = ('customer',)
    search_fields = ('customer',)


@admin.register(Customer)
class CustomerAdmin(admin.ModelAdmin):
    list_display = ('user',"first_name")
    # list_filter = ('customer',)
    # search_fields = ('customer',)

