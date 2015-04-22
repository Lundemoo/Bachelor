                                                            
                                                       var graph;
var xpad = 50;
var ypad = 40;
 

                                                       
 var antally = 10;                                                      
var antallfarger = 16777215;


     var x;
     var y
                                                   
                                                   function getMaxY(x, y) {
    var max = 0;
     
    for(var i = 0; i < x.length; i ++) {
        if(y[i] > max) {
            max = y[i];
            
        }
    }
     max = Math.floor(max);
     var lengden = max.toString().length - 1;
     
     var gange = max.toString().charAt(0);
     gange = parseInt(gange);
     gange = gange + 1;
     
     
     max = Math.pow(10, lengden);
     
     
     max = max * gange;
     
    
    return max;
}
 
function getXPixel(val, x, y) {
    return ((graph.width() - xpad) / x.length) * val + (xpad * 1.5);
}
 
function getYPixel(val, x, y) {
    return graph.height() - (((graph.height() - ypad) / getMaxY(x, y)) * val) - ypad;
}
                                                
                                                
function getrandomcolor(){
    var alle = "1234567890ABCDEF";
    var returnen = "#";
    for(var i = 0; i < 6; i++){
        returnen = returnen + alle.charAt(Math.floor((Math.random() * 15) + 1)); 
        
    }
    
    return returnen;
    
    
}
                                                   
             
     
     
     
     
     
     
     
     
     
     
     
     
     function tegn(navn, infoen, x, y){
                
            
                
                
                var grafen = "#" + navn;
                
        graph = $(grafen);
        var c = graph[0].getContext('2d');
        c.strokeStyle = "#000";
        c.fillStyle = "#000";
        c.clearRect ( 0 , 0 , graph.width(), graph.height() );
        c.lineWidth = 2;
    c.strokeStyle = '#333';
    c.font = 'italic 8pt sans-serif';
    c.textAlign = "center";
    
    
    c.beginPath();
    
    c.moveTo(xpad, 0);
    c.lineTo(xpad, graph.height() - ypad);
    c.lineTo(graph.width(), graph.height() - ypad);
    c.stroke();
    
    
    
    for(var i = 0; i < x.length; i++) {
       
        c.fillText(x[i], getXPixel(i, x, y), graph.height() - ypad + 20);
    }
    
    
    c.textAlign = "right"
    c.textBaseline = "middle";
    
    for(var i = 0; i < getMaxY(x, y); i += getMaxY(x, y)/antally) {
        
        c.fillText(i.toFixed(1), ypad, getYPixel(i, x, y));
    }
    
    
    
    
    c.strokeStyle = '#f00';
    c.beginPath();
    c.moveTo(getXPixel(0, x, y), getYPixel(y[0], x, y));
    
    for(var i = 1; i < x.length; i ++) {
        c.lineTo(getXPixel(i, x, y), getYPixel(y[i], x, y));
    }
    c.stroke();
    
    
    c.fillStyle = '#333';
    
    var altinfoen = "<table>";
     
    for(var i = 0; i < x.length; i ++) { 
        
        var fargen = getrandomcolor();
    
        c.beginPath();
        c.strokeStyle = fargen;
        c.fillStyle = fargen;
        c.arc(getXPixel(i, x, y), getYPixel(y[i], x, y), 6, 0, Math.PI * 2, true);
        c.fill();
        altinfoen = altinfoen + "<tr><td><div class=rund style='background-color: " + fargen + "; border: 1px solid " + fargen + ";'></div></td><td style='padding-left: 10px'>" + y[i] + "</td></tr>";
    }
    altinfoen = altinfoen + "</table>";
    document.getElementById(infoen).innerHTML = altinfoen;
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     function tegnpai(canvasnavn, infonavn, x, y, typen, prosentut){
                                     
                                     var grafen = "#" + canvasnavn;
                
                                        graph = $(grafen);
                                        var c = graph[0].getContext('2d');
                                        //Typer:
                                       //0 = Tom
                                       //1 = Prosent
                                       //2 = y-verdi
                                
                                    if(prosentut > 1.0 && typen != 0){
                                    var xpadding = 30;
                                    var ypadding = 30;
                                    prosentut = 1.1;
                                    } else {
                                    var xpadding = 10;
                                    var ypadding = 10;
                                    }
                                
                                    var startx = graph.width()/2;
                                    var starty = ypadding;
                                    var mid = graph.width()/2;
                                    var radius = graph.width()/2 - xpadding;
                                    
                                    var starterhvor = 1.5;
                                    
                                    
                                    var totalalle = 0;
                                    for(var a = 0; a < y.length; a++){
                                        totalalle = totalalle + y[a];
                                    }
                                    
                                    
                                    c.moveTo(startx, startx);
                                    
                                    var hver = (1/(totalalle/y[0]))*2;
                                    
                                    var startAngle = starterhvor * Math.PI;
                                    var endAngle = (starterhvor+hver)*Math.PI;
                                    var startendre = starterhvor+hver;
                                    var tell = (1/(totalalle/y[0]) * 100).toFixed(2);
                                    var teksten = "";
                                    if(typen == 1){
                                        
                                        teksten = tell + "%";
                                    } else if(typen == 2){
                                        teksten = y[0];
                                    }
                                    var resultat = "<table>";
                                    for(var i = 1; i < x.length+1; i++){
                                        var fargen = getrandomcolor();
                                        
                                        resultat = resultat + "<tr><td><div class=rund style='background-color: " + fargen + "; border: 1px solid " + fargen + ";'></div></td><td style='padding-left: 10px'>" + y[i-1] + ", " + tell + "%</td></tr>";
                                        
                                        
                                    var hvor = startAngle + ((endAngle - startAngle)/2);
                                    
                                    
                                    
                                    c.beginPath();
                                    c.moveTo(startx, startx);
                                    c.arc(startx, startx, radius, startAngle, endAngle, false);
                                       
                                   c.fillStyle = fargen;
                                    c.fill();
                                    c.closePath();
                                    
                                    
                                    
                                    
                                    if(typen != 0){
                                    
                                     
                                    var hvor = startAngle + ((endAngle - startAngle)/2);
                                    
                                    var a = (startx + Math.cos(hvor)*radius*prosentut);
                                    var b = ((Math.sin(hvor)*radius*prosentut) + startx);
                                    
                                    
                                    
                                    c.beginPath();
                                    
                                    c.textAlign = "center";
                                    c.font="20px Georgia";
                                    c.fillStyle = "black";
                                    
                                    c.moveTo(startx, startx);
                                    c.fillText(teksten, a, b);
                                    
                                    c.stroke();
                                    c.closePath();
                                    
                                    }
                                    
                              
                                    if(i != x.length){
                                    hver = (1/(totalalle/y[i]))*2;
                                    startAngle = startendre * Math.PI;
                                    endAngle = (startendre+hver)*Math.PI;
                                    startendre = startendre+hver;
                                    tell = (1/(totalalle/y[i]) * 100).toFixed(2);
                                    
                                    
                                    
                                    if(typen == 1){
                                        
                                        teksten = tell + "%";
                                    } else if(typen == 2){
                                        teksten = y[i];
                                    }
                                    
                                    
                                    
                                }
                                    
                                   
                                    
                                    
                                    
                                    
                                    
                                    
                                   
                                    
                                    
                                    
                                    
                                    
                                    }
                                    
                                    resultat = resultat + "</table>";
                                    document.getElementById(infonavn).innerHTML = resultat;
                                   //alert(Math.cos(startx + radius)); 
                                   
                                    
                                     
                                     
                                 }
                                 
    
    
    
    
    
    
    
    
    