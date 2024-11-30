from django import forms
from django.contrib.auth.forms import UserCreationForm
from django.contrib.auth.models import User

class RegisterForm(UserCreationForm):
    email = forms.EmailField(
        required=True,
        widget=forms.EmailInput(attrs={"class": "form-control", "placeholder": "Correo electrónico"}),
        help_text="Se requiere una dirección de correo válida."
    )
    first_name = forms.CharField(
        required=True,
        widget=forms.TextInput(attrs={"class": "form-control", "placeholder": "Nombre"})
    )
    last_name = forms.CharField(
        required=True,
        widget=forms.TextInput(attrs={"class": "form-control", "placeholder": "Apellido"})
    )
    
    class Meta:
        model = User
        fields = ['username', 'email', 'first_name', 'last_name', 'password1', 'password2']
        widgets = {
            'username': forms.TextInput(attrs={"class": "form-control", "placeholder": "Nombre de usuario"}),
            'password1': forms.PasswordInput(attrs={"class": "form-control", "placeholder": "Contraseña"}),
            'password2': forms.PasswordInput(attrs={"class": "form-control", "placeholder": "Confirmar contraseña"}),
        }
