/**
 * Pince calculator
 * @author Simone Pandolfi <simopandolfi@gmail.com>
 */




function dist(p1, p2) {
    return Math.sqrt(Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2));
}




var w = view.size.width,
    h = view.size.height;


function drawPath() {
    $("#model-data input[type='text']").each(function() {
        $(this).val($(this).val().replace(',', '.'));
    });
    
    var w_front_neck = 10 * parseFloat($("#model-data input[name='w_front_neck']").val()),
        h_front_neck = 10 * parseFloat($("#model-data input[name='h_front_neck']").val()),
        l_breast = 10 * parseFloat($("#model-data input[name='l_breast']").val()),
        w_breast = 10 * parseFloat($("#model-data input[name='w_breast']").val()),
        w_shoulder = 10 * parseFloat($("#model-data input[name='w_shoulder']").val()),
        h_front_shoulder_slope = 10 * parseFloat($("#model-data input[name='h_front_shoulder_slope']").val()),
        h_front_shoulder_angle = Math.abs((Math.PI / 180) * parseFloat($("#model-data input[name='h_front_shoulder_angle']").val())),
        pince_gap = 10 * parseFloat($("#model-data input[name='pince_gap']").val()),
        h_half_waistline = 10 * parseFloat($("#model-data input[name='h_waistline']").val()) / 2;

    if ($("#model-data #chk_angle").is(':checked')) {
        h_front_shoulder_slope = w_shoulder * Math.abs(Math.tan(h_front_shoulder_angle));
    }

    var A = new Point(0, h_front_neck),
        B = new Point(w_front_neck, 0),
        C = new Point(B.x, A.y);
    
    var aux_ang = Math.asin((w_breast - w_front_neck) / l_breast);
    
    var D = new Point(0, l_breast * Math.cos(aux_ang)),
        E = new Point(w_breast, D.y);
    
    aux_ang = Math.atan(h_front_shoulder_slope / w_shoulder);
    
    var F = new Point(B.x + w_shoulder, 0),
        G = new Point(B.x + (w_shoulder * Math.cos(aux_ang)), w_shoulder * Math.sin(aux_ang));
    
    var H = new Point(E.x, (G.y - B.y) * ((E.x - B.x) / (G.x - B.x)) + B.y);
    
    var aux = dist(E, H);
    aux_ang = 2 * Math.asin(pince_gap / (2 * aux));
    
    var I = new Point(E.x + aux * Math.sin(aux_ang), E.y - aux * Math.cos(aux_ang)),
        L = new Point(E.x + (G.x - E.x) * Math.cos(aux_ang) - (G.y - E.y) * Math.sin(aux_ang), E.y + (G.x - E.x) * Math.sin(aux_ang) + (G.y - E.y) * Math.cos(aux_ang));
    
    var M = new Point(L.x, L.y + h_half_waistline);
    
    var N = new Point((I.x - E.x) * ((M.y - E.y) / (I.y - E.y)) + E.x, M.y),
        O = new Point((H.x - E.x) * ((M.y - E.y) / (H.y - E.y)) + E.x, M.y);
    
    var P = new Point(A.x, B.x);


    var points = {
        'A': A,
        'B': B,
        'C': C,
        'D': D,
        'E': E,
        'F': F,
        'G': G,
        'H': H,
        'I': I,
        'L': L,
        'M': M,
        'N': N,
        'O': O,
        'P': P,
        };

    var lines = [
        ['B', 'F'],
        ['B', 'G'],
        ['D', 'E', 'H'],
        ['E', 'I', 'L', 'M'],
        ['P', 'D'],
        ];

    var dashed = [
        ['M', 'N'],
        ];


    var max_x = -1;
    for (var p in points) {
        if (points[p].x > max_x)
            max_x = points[p].x;
    }

    var offset = (w - max_x) / 2;

    for (var p in points) {
        points[p].x = -1 * points[p].x + max_x + offset;
    }


    project.activeLayer.removeChildren();


    for (var i = 0; i < lines.length; i++) {
        var path = new Path();
        path.strokeColor = '#21B3FC';
        for (var j = 0; j < lines[i].length; j++) {
            path.add(points[lines[i][j]]);
        }
    }

    for (var i = 0; i < dashed.length; i++) {
        var path = new Path();
        path.strokeColor = 'grey';
        path.dashArray = [10, 12];
        for (var j = 0; j < dashed[i].length; j++) {
            path.add(points[dashed[i][j]]);
        }
    }
    
    var from = B,
        R = P.y,
        aux_point = Math.sqrt((R * R) / 2),
        through = new Point(P.x - aux_point, aux_point),
        to = P,
        arc = new Path.Arc(from, through, to);
    arc.strokeColor = '#21B3FC';
    
    
    var path = new Path();
    path.add(N);
    path.add(O);
    path.strokeColor = 'red';

<<<<<<< HEAD
    pince_len = dist(N, O) / 10;
=======
    pince_len = dist(N, O);
>>>>>>> 45564a2ee01897f856fc2a9492633868622f9dfb

    var text = new PointText(new Point(O.x + 5, O.y)),
        txt = '' + pince_len;
    text.fillColor = 'red';
<<<<<<< HEAD
    text.content = txt.substring(0, txt.indexOf('.') + 4) + 'cm';
=======
    text.content = txt.substring(0, txt.indexOf('.') + 4) + 'mm';
>>>>>>> 45564a2ee01897f856fc2a9492633868622f9dfb

    
    var line = new Path();
    line.add(new Point(0, 10));
    line.add(new Point(25, 10));
    line.strokeColor = 'red';
    
    var legend = new PointText(new Point(30, 15));
    legend.fillColor = 'red';
    legend.content = 'Misura pince sul torace';



    view.draw();
}



drawPath();


$("#model-data").submit(function(ev) {
    ev.preventDefault();
    drawPath();
});
