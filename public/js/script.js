const choicerole = document.getElementById('role')
const specialiter = document.getElementById('specialiter')

specialiter.style.display = 'none'

choicerole.addEventListener('change' , function() {
    if(choicerole.value === 'Medecin'){
        specialiter.style.display = 'block'
    }else{
        specialiter.style.display = 'none'
    }
});