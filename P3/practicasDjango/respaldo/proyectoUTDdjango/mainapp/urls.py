from django.urls import path
from . import views
from django.conf.urls import handler404

urlpatterns = [
    path('', views.index, name='inicio' ),
    path('inicio/', views.index, name='inicio'),
    path('about/', views.about, name='sobre nosotros'),
    path('mision/', views.mision, name='mision'),
    path('vision/', views.vision, name='vision'),
    path('formulario/', views.formulario, name='formulario'),
    path('iniciosesion/', views.iniciosesion, name='iniciosesion'),
    path('logout/',views.logout_user,name='logout'),
]


