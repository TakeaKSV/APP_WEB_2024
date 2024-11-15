from django.shortcuts import render

# Create your views here.

def index(request):
    mensaje='Hola soy un ambiguo'
    return render(request, 'mainapp/index.html', {
        'title':'Inicio',
        'content':'.::Bienvenido cabeza dura!::.',
        'mensaje':mensaje
    })
    
def about(request):
    return render(request, 'mainapp/about.html', {
        'title':'acerca de nosotros',
        'content':'Somos un equipo de desarrollo de SW'
    })
    
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
