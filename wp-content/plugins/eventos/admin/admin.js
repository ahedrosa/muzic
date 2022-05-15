window.onload = function(){

    
    let marker = document.getElementById("evento_nentradas");
    let valor =  document.getElementById("valor");
    
    if (marker != null && valor != null) {
        
        marker.addEventListener("mousemove", function() {
            valor.innerHTML = marker.value;
            if(marker.value == 100){
                valor.innerHTML = '100+';
            };
            if(marker.value == 0){
                valor.innerHTML = 'Entradas Agotadas';
            };
        });
        
        marker.addEventListener("change", function() {
            valor.innerHTML = marker.value;
            if(marker.value == 100){
                valor.innerHTML = '100+';
            };
            if(marker.value == 0){
                valor.innerHTML = 'Entradas Agotadas';
            };
        });
        
    };
    let reset_bt = document.getElementById('reset-button');
    let reset = document.getElementById('reset');
    let color1, color2;
    color1 = document.getElementById('e_color');
    color2 = document.getElementById('e_color2');
    
    function reset_color(e){
        e.preventDefault();
        color1.setAttribute("value", '#343434');
        color2.setAttribute("value", '#343434');
    }
    
    if (reset != null && reset_bt != null) {

        reset_bt.addEventListener('click', function (e) {
            reset_color(e);
        });

    }
    
};