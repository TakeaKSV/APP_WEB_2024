from django.shortcuts import render

# Create your views here.

def index(request):
    return render(request, 'mainapp/index.html', {
        'title':'Inicio',
        'content':'.::Bienvenido Amigazo!::.',
    })
    
def about(request):
    return render(request, 'mainapp/about.html', {
        'title':'Acerca de nosotros | Los pollos locos',
        'content':'Somos un equipo que cocina pollos muy locos.'
    })
    
def mision(request):
    return render(request, 'mainapp/mision.html', {
        'title':'Mision',
        'content':'Nuestra mision es alimentarte con pollos locos.'
    })
    
def vision(request):
    return render(request, 'mainapp/vision.html', {
        'title':'Vision',
        'content':'Nuestra vision es buscar siempre la solidaridad con el empleado que se va a comer nuestros pollos locos.'
    })
