from django.shortcuts import render,HttpResponse
from django.shortcuts import redirect
# from django.contrib.auth.forms import UserCreationForm
from .forms import RegisterForm
from django.contrib import messages
from django.contrib.auth import authenticate,login,logout
from django.contrib.auth.decorators import login_required
from django import forms
from django.contrib.auth.models import User

# Create your views here.
def index(request):
    mensaje='Hola soy un ambiguo'
    return render(request, 'mainapp/index.html', {
        'title':'Inicio',
        'content':'.::Bienvenido cabeza dura!::.',
        'mensaje':mensaje
    })

@login_required(login_url='inicio')
def about(request):
    return render(request, 'mainapp/about.html', {
        'title':'acerca de nosotros',
        'content':'Somos un equipo de desarrollo de SW'
    })

@login_required(login_url='inicio')
def mision(request):
    return render(request, 'mainapp/mision.html', {
        'title':'Mision',
        'content':'La mision de la empresa'
    })
    
def vision(request):
    return render(request, 'mainapp/vision.html', {
        'title':'Vision',
        'content':'La vision de la empresa'
    })
    
def formulario(request):
    return render(request, 'mainapp/formulario.html', {
        'title':'Formulario',
        'content':'Formulario para registrar un nuevo usuario'
    })
    
def iniciosesion(request):
    if request.user.is_authenticated:
        return redirect('inicio')
    else:
        if request.method == "POST":
            username=request.POST.get('username')
            password=request.POST.get('password')
            
            user=authenticate(request,username=username, password=password)
            
            if user is not None:
                login(request,user)
                messages.success(request, "Bienvenido al inicio de sesion")
                return redirect('inicio')
            else:
                messages.warning(request, "No fue posible el acceso. Ingrese las credenciales correctas")
            
        return render(request, 'mainapp/iniciosesion.html', {
            'title':'Inicio de sesion',
        })
    
def registro(request):
    if request.user.is_authenticated:
        return redirect('inicio')
    else:
        registro_form = RegisterForm()
        if request.method == 'POST':
            registro_form = RegisterForm(request.POST)
            if registro_form.is_valid():
                registro_form.save()
                messages.success(request, 'Registro exitoso')
                return redirect('inicio')
        return render(request, 'mainapp/formulario.html', {
            'title': 'Registro',
            'registro_form': RegisterForm,
        })

def register_view(request):
    form = RegisterForm()
    return render(request, "mainapp/formulario.html", {"title": "Registro", "RegisterForm": form})


def logout_user(request):
    logout(request)
    
    return redirect('inicio')

def page404(request, exception):
    return render(request, 'mainapp/404.html', status=404)