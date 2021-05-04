$(document).ready(function(){
    
    var local = localStorage.getItem('fecha');
    document.querySelector('#lastcon').innerHTML = local;

    $('#logout').on('submit', function(){
        var date = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        localStorage.setItem('fecha', date.toLocaleDateString(undefined, options) + ' a las ' + date.toLocaleTimeString());
        return true;
    });
});