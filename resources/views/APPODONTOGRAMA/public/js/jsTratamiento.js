var estados=$("#hiddenEstados").val().split("__");
var dientesDiastema=[];
var dientesProtesisFija=[];
var dientesProtesisRemovible=[];
var dientesOdontuloTotal=[];
var dientesAparatOrtoFijo=[];
var dientesAparatOrtoRemovible=[];

for(var i=0; i<estados.length; i++)
{
	var partesEstado=estados[i].split("_");
	var tratamiento=partesEstado[2].split("-");
	switch(tratamiento[0])
	{
		case "1":
			$("#txt"+partesEstado[0]).val("");
			break;
		case "2":
			var css=
			{
				"color": "#036FAB",
				"font-size": "60px",
				"position": "absolute",
				"top": "-25px",
				"left": "-12px"
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='DIENTEAUSENTE'>X</span>");
			$("#"+partesEstado[0]+"-C5"+" > #DIENTEAUSENTE").css(css);
			break;
		case "3":
			var css=
			{
				"color": "#036FAB",
				"font-size": "20px"
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='REMANENTERADICULAR'><b>R</b></span>");
			$("#"+partesEstado[0]+"-C5"+" > #REMANENTERADICULAR").css(css);
			break;
		case "4":
			var css=
			{
				"color": "#036FAB",
				"font-size": "25px",
				"left": "5px",
				"position": "absolute",
				"top": "40px",
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='EXTRUSION'><b>↓</b></span>");
			$("#"+partesEstado[0]+"-C5"+" > #EXTRUSION").css(css);
			break;
		case "5":
			var css=
			{
				"color": "#036FAB",
				"font-size": "25px",
				"left": "5px",
				"position": "absolute",
				"top": "-40px",
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='INTRUSION'><b>↑</b></span>");
			$("#"+partesEstado[0]+"-C5"+" > #INTRUSION").css(css);
			break;
		case "6":
			$("#txt"+partesEstado[0]).val("U");
			break;
		case "7":
			var css=
			{
				"color": "#036FAB",
				"font-size": "30px",
				"left": "-5px",
				"position": "absolute",
				"top": "27px",
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='MIGRASION'><b>→</b></span>");
			$("#"+partesEstado[0]+"-C5"+" > #MIGRASION").css(css);
			break;
		case "8":
			$("#txt"+partesEstado[0]).val("MIC");
			break;
		case "9":
			$("#txt"+partesEstado[0]).val("MAC");
			break;
		case "10":
			$("#txt"+partesEstado[0]).val("ECT");
			break;
		case "11":
			$("#txt"+partesEstado[0]).val("");
			var margenTop;
			if((parseInt(partesEstado[0].substring(1, 3))>=11 && parseInt(partesEstado[0].substring(1, 3))<=28) || (parseInt(partesEstado[0].substring(1, 3))>=51 && parseInt(partesEstado[0].substring(1, 3))<=65))
			{
				margenTop="-77px";
			}
			if(parseInt(partesEstado[0].substring(1, 3))>=31 && parseInt(partesEstado[0].substring(1, 3))<=48 || (parseInt(partesEstado[0].substring(1, 3))>=71 && parseInt(partesEstado[0].substring(1, 3))<=85))
			{
				margenTop="104px";
			}

			var arrayTratamiento=
			[
				{
					"border-top": "1px solid black",
					"border-radius": "20px",
					"font-size": "25px",
					"left": "5px",
					"position": "absolute",
					"top": margenTop,
					"height": "25px",
					"width": "25px"
				},
				{
					"border-top": "1px solid black",
					"border-radius": "20px",
					"font-size": "25px",
					"left": "-7px",
					"position": "absolute",
					"top": margenTop,
					"height": "25px",
					"width": "25px"
				}
			];
			$("#"+partesEstado[0]+"-C5").append("<span id='TRANSPOSICION1'></span>");
			$("#"+partesEstado[0]+"-C5"+" > #TRANSPOSICION1").css(arrayTratamiento[0]);
			$("#"+partesEstado[0]+"-C5").append("<span id='TRANSPOSICION2'></span>");
			$("#"+partesEstado[0]+"-C5"+" > #TRANSPOSICION2").css(arrayTratamiento[1]);
			break;
		case "12":
			$("#txt"+partesEstado[0]).val("V");
			break;
		case "13":
			var css=
			{
				"color": "#036FAB",
				"font-size": "70px",
				"position": "absolute",
				"top": "-45px",
				"left": "27px",
				"-webkit-transform": "rotate(70deg)"
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='FRACTURA'>_</span>");
			$("#"+partesEstado[0]+"-C5"+" > #FRACTURA").css(css);
			break;
		case "14":
			$("#txt"+partesEstado[0]).val("DIS");
			break;
		case "15":
			$("#txt"+partesEstado[0]).val("");
			var margenTop;
			if(parseInt(partesEstado[0].substring(1, 3))>=11 && parseInt(partesEstado[0].substring(1, 3))<=28)
			{
				margenTop="-80px";
			}
			if(parseInt(partesEstado[0].substring(1, 3))>=31 && parseInt(partesEstado[0].substring(1, 3))<=48)
			{
				margenTop="97px";
			}

			var arrayTratamiento=
			[
				{
					"border": "1px solid black",
					"border-radius": "20px",
					"font-size": "25px",
					"left": "-11px",
					"position": "absolute",
					"top": margenTop,
					"height": "20px",
					"width": "20px"
				},
				{
					"border": "1px solid black",
					"border-radius": "20px",
					"font-size": "25px",
					"left": "11px",
					"position": "absolute",
					"top": margenTop,
					"height": "20px",
					"width": "20px"
				}
			];
			$("#"+partesEstado[0]+"-C5").append("<span id='GEMINACION1'></span>");
			$("#"+partesEstado[0]+"-C5"+" > #GEMINACION1").css(arrayTratamiento[0]);
			$("#"+partesEstado[0]+"-C5").append("<span id='GEMINACION2'></span>");
			$("#"+partesEstado[0]+"-C5"+" > #GEMINACION2").css(arrayTratamiento[1]);
			break;
		case "16":
			var arrayTratamiento=
			[
				{
					"border-bottom": "25px solid red",
					"border-right": "25px solid transparent",
					"height": "0px",
					"left": "-12px",
					"position": "absolute",
					"top": "6px",
					"width": "0px",
					"-webkit-transform": "rotate(-135deg)"
				},
				{
					"border-bottom": "25px solid red",
					"border-left": "25px solid transparent",
					"height": "0px",
					"left": "7px",
					"position": "absolute",
					"top": "-12px",
					"width": "0px",
					"-webkit-transform": "rotate(45deg)"
				},
				{
					"border-bottom": "25px solid red",
					"border-left": "25px solid transparent",
					"height": "0px",
					"position": "absolute",
					"right": "-12px",
					"top": "6px",
					"width": "0px",
					"-webkit-transform": "rotate(135deg)"
				},
				{
					"border-bottom": "25px solid red",
					"border-right": "25px solid transparent",
					"bottom": "-12px",
					"height": "0px",
					"left": "7px",
					"position": "absolute",
					"width": "0px",
					"-webkit-transform": "rotate(135deg)"
				},
				{
					"background-color": "red",
					"border": "1px solid red",
					"height": "20px",
					"left": "8px;",
					"position": "absolute",
					"top": "8px;",
					"width": "20px"
				}
			];
			var css=arrayTratamiento[partesEstado[1].substring(1, 2)-1];
			$("#"+partesEstado[0]+"-"+partesEstado[1]).css(css);
			break;
		case "17":
			var arrayTratamiento=
			[
				{
					"color": "#036FAB",
					"font-size": "20px",
					"position": "absolute",
					"top": "4px",
					"left": "4px",
					"-webkit-transform": "rotate(70deg)"
				},
				{
					"color": "#036FAB",
					"font-size": "20px",
					"position": "absolute",
					"top": "4px",
					"left": "-17px",
					"-webkit-transform": "rotate(70deg)"
				},
				{
					"color": "#036FAB",
					"font-size": "20px",
					"position": "absolute",
					"top": "5px",
					"left": "-15px",
					"-webkit-transform": "rotate(70deg)"
				},
				{
					"color": "#036FAB",
					"font-size": "20px",
					"position": "absolute",
					"top": "4px",
					"left": "4px",
					"-webkit-transform": "rotate(70deg)"
				},
				{
					"color": "#036FAB",
					"font-size": "20px",
					"position": "absolute",
					"top": "-1px",
					"left": "3px",
					"-webkit-transform": "rotate(70deg)"
				}
			];
			var css=arrayTratamiento[partesEstado[1].substring(1, 2)-1];
			$("#"+partesEstado[0]+"-"+partesEstado[1]).append("<span id='OBTURACIONTEMPORAL'>○</span>");
			$("#"+partesEstado[0]+"-"+partesEstado[1]+" > #OBTURACIONTEMPORAL").css(css);
			break;
		case "18":
			var arrayTratamiento=
			[
				{
					"color": "#036FAB",
					"font-size": "13px",
					"position": "absolute",
					"top": "7px",
					"left": "4px",
					"-webkit-transform": "rotate(70deg)"
				},
				{
					"color": "#036FAB",
					"font-size": "13px",
					"position": "absolute",
					"top": "8px",
					"left": "-17px",
					"-webkit-transform": "rotate(70deg)"
				},
				{
					"color": "#036FAB",
					"font-size": "13px",
					"position": "absolute",
					"top": "7px",
					"left": "-15px",
					"-webkit-transform": "rotate(70deg)"
				},
				{
					"color": "#036FAB",
					"font-size": "13px",
					"position": "absolute",
					"top": "7px",
					"left": "4px",
					"-webkit-transform": "rotate(70deg)"
				},
				{
					"color": "#036FAB",
					"font-size": "13px",
					"position": "absolute",
					"top": "1px",
					"left": "3px",
					"-webkit-transform": "rotate(70deg)"
				}
			];
			var css=arrayTratamiento[partesEstado[1].substring(1, 2)-1];
			$("#"+partesEstado[0]+"-"+partesEstado[1]).append("<span id='AMALGAMA'><b>O</b></span>");
			$("#"+partesEstado[0]+"-"+partesEstado[1]+" > #AMALGAMA").css(css);
			$("#txt"+partesEstado[0]).val("A");
			break;
		case "19":
			var arrayTratamiento=
			[
				{
					"color": "#036FAB",
					"font-size": "20px",
					"position": "absolute",
					"top": "4px",
					"left": "4px",
					"-webkit-transform": "rotate(70deg)"
				},
				{
					"color": "#036FAB",
					"font-size": "20px",
					"position": "absolute",
					"top": "4px",
					"left": "-17px",
					"-webkit-transform": "rotate(70deg)"
				},
				{
					"color": "#036FAB",
					"font-size": "20px",
					"position": "absolute",
					"top": "5px",
					"left": "-15px",
					"-webkit-transform": "rotate(70deg)"
				},
				{
					"color": "#036FAB",
					"font-size": "20px",
					"position": "absolute",
					"top": "4px",
					"left": "4px",
					"-webkit-transform": "rotate(70deg)"
				},
				{
					"color": "#036FAB",
					"font-size": "20px",
					"position": "absolute",
					"top": "-1px",
					"left": "3px",
					"-webkit-transform": "rotate(70deg)"
				}
			];
			var css=arrayTratamiento[partesEstado[1].substring(1, 2)-1];
			$("#"+partesEstado[0]+"-"+partesEstado[1]).append("<span id='RESINA'>◙</span>");
			$("#"+partesEstado[0]+"-"+partesEstado[1]+" > #RESINA").css(css);
			$("#txt"+partesEstado[0]).val("R");
			break;
		case "20":
			$("#txt"+partesEstado[0]).val("Ic");
			break;
		case "21":
			var css=
			{
				"border-bottom": "40px solid black",
				"border-right": "40px solid transparent",
				"height": "0px",
				"left": "-10px",
				"position": "absolute",
				"top": "3px",
				"width": "0px",
				"-webkit-transform": "rotate(135deg)"
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='ENDODONCIA'></span>");
			$("#"+partesEstado[0]+"-C5"+" > #ENDODONCIA").css(css);
			break;
		case "22":
			$("#txt"+partesEstado[0]).val("DESG");
			break;			
		case "23":
			dientesDiastema.push(partesEstado[0]);
			break;
		case "24":
			$("#txt"+partesEstado[0]).val("MOV");
			break;
		case "25":
			var css=
			{
				"border": "1px solid black",
				"border-radius": "43px",
				"height": "43px",
				"left": "-16px",
				"position": "absolute",
				"top": "-13px",
				"width": "50px"
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='CORONATEMPORAL'></span>");
			$("#"+partesEstado[0]+"-C5"+" > #CORONATEMPORAL").css(css);
			$("#txt"+partesEstado[0]).val("CT");
			break;
		case "26":
			var css=
			{
				"border": "1px solid black",
				"border-radius": "43px",
				"height": "43px",
				"left": "-16px",
				"position": "absolute",
				"top": "-13px",
				"width": "50px"
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='CORONACOMPLETA'></span>");
			$("#"+partesEstado[0]+"-C5"+" > #CORONACOMPLETA").css(css);
			$("#txt"+partesEstado[0]).val("CC");
			break;
		case "27":
			var css=
			{
				"border": "1px solid black",
				"border-radius": "43px",
				"height": "43px",
				"left": "-16px",
				"position": "absolute",
				"top": "-13px",
				"width": "50px"
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='CORONAVEENER'></span>");
			$("#"+partesEstado[0]+"-C5"+" > #CORONAVEENER").css(css);
			$("#txt"+partesEstado[0]).val("CV");
			break;
		case "28":
			var css=
			{
				"border": "1px solid black",
				"border-radius": "43px",
				"height": "43px",
				"left": "-16px",
				"position": "absolute",
				"top": "-13px",
				"width": "50px"
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='CORONAFEXESTRADA'></span>");
			$("#"+partesEstado[0]+"-C5"+" > #CORONAFEXESTRADA").css(css);
			$("#txt"+partesEstado[0]).val("CF");
			break;
		case "29":
			var css=
			{
				"border": "1px solid black",
				"border-radius": "43px",
				"height": "43px",
				"left": "-16px",
				"position": "absolute",
				"top": "-13px",
				"width": "50px"
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='CORONATRESCUARTOS'></span>");
			$("#"+partesEstado[0]+"-C5"+" > #CORONATRESCUARTOS").css(css);
			$("#txt"+partesEstado[0]).val("3/4");
			break;
		case "30":
			var css=
			{
				"border": "1px solid black",
				"border-radius": "43px",
				"height": "43px",
				"left": "-16px",
				"position": "absolute",
				"top": "-13px",
				"width": "50px"
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='CORONAPORCELANA'></span>");
			$("#"+partesEstado[0]+"-C5"+" > #CORONAPORCELANA").css(css);
			$("#txt"+partesEstado[0]).val("CP");
			break;
		case "31":
			dientesProtesisFija.push(partesEstado[0]);
			break;
		case "32":
			dientesProtesisRemovible.push(partesEstado[0]);
			break;
		case "33":
			dientesOdontuloTotal.push(partesEstado[0]);
			break;
		case "34":
			dientesAparatOrtoFijo.push(partesEstado[0]);
			break;
		case "35":
			dientesAparatOrtoRemovible.push(partesEstado[0]);
			break;
		case "36":
			$("#txt"+partesEstado[0]).val("IMP");
			break;
		case "37":
			$("#txt"+partesEstado[0]).val("S");
			break;
		case "38":
			var css=
			{
				"color": "red",
				"font-size": "60px",
				"position": "absolute",
				"top": "-25px",
				"left": "-12px"
			};
			$("#"+partesEstado[0]+"-C5").append("<span id='DIENTEAUSENTE'>X</span>");
			$("#"+partesEstado[0]+"-C5"+" > #DIENTEAUSENTE").css(css);
			break;
	}
}

if(dientesDiastema.length>0)
{
	var cssDiastema=
	{
		"color": "#036FAB",
		"font-size": "22px",
		"position": "absolute",
		"left": "30px",
		"top": "-5px"
	};

	dientesDiastema.sort();
	for(var i=0; i<dientesDiastema.length; i++)
	{
		if(i<dientesDiastema.length-1)
		{
			if(parseInt(dientesDiastema[i].substring(1, 3))==parseInt(dientesDiastema[i+1].substring(1, 3))-1)
			{
				var posicionDienteUno=$("#"+dientesDiastema[i]).position();
				var posicionDienteDos=$("#"+dientesDiastema[i+1]).position();
				var dienteElegido=posicionDienteUno.left<posicionDienteDos.left?i:i+1;
				$("#"+dientesDiastema[dienteElegido]+"-C5").append("<span id='DIASTEMA'><span>)</span><span>(</span></span>");
				$("#"+dientesDiastema[dienteElegido]+"-C5"+" > #DIASTEMA").css(cssDiastema);
			}
		}		
	}
}

if(dientesProtesisFija.length>0)
{
	var cssProtesisFijaUno=
	{
		"border-right": "1px solid black",
		"height": "10px",
		"left": "-10px",
		"position": "absolute",
		"top": "-20px",
		"width": "0px"
	};

	var cssProtesisFijaDos=
	{
		"border-left": "1px solid black",
		"height": "10px",
		"left": "30px",
		"position": "absolute",
		"top": "-20px",
		"width": "0px"
	};

	var cssProtesisFijaConector;

	dientesProtesisFija.sort();
	var dientesProtesisFijaUno=dientesProtesisFija[0];
	var dientesProtesisFijaDos;
	for(var i=0; i<dientesProtesisFija.length; i++)
	{
		if(i<dientesProtesisFija.length-1)
		{
			if(parseInt(dientesProtesisFija[i].substring(1, 3))==parseInt(dientesProtesisFija[i+1].substring(1, 3))-1)
			{
				continue;
			}
			else
			{
				dientesProtesisFijaDos=dientesProtesisFija[i];
				var posicionDienteUno=$("#"+dientesProtesisFijaUno).position();
				var posicionDienteDos=$("#"+dientesProtesisFijaDos).position();
				var dienteInicio=posicionDienteUno.left<posicionDienteDos.left?dientesProtesisFijaUno:dientesProtesisFijaDos;
				var dienteFin=posicionDienteUno.left>posicionDienteDos.left?dientesProtesisFijaUno:dientesProtesisFijaDos;
				$("#"+dienteInicio+"-C5").append("<div id='PROTESISFIJAINICIO'></div>");
				$("#"+dienteInicio+"-C5"+" > #PROTESISFIJAINICIO").css(cssProtesisFijaUno);
				$("#"+dienteFin+"-C5").append("<div id='PROTESISFIJAFIN'></div>");
				$("#"+dienteFin+"-C5"+" > #PROTESISFIJAFIN").css(cssProtesisFijaDos);

				var topLeft1=posicionDienteUno.left;
				var topLeft2=posicionDienteDos.left;
				var topWidth=(topLeft1-topLeft2)<0?(topLeft1-topLeft2)*(-1):(topLeft1-topLeft2);
				topWidth=topWidth+40;
				cssProtesisFijaConector=
				{
					"border-top": "1px solid black",
					"height": "10px",
					"left": "-10px",
					"position": "absolute",
					"top": "-20px",
					"width": ""+topWidth.toString()+"px"
				};
				$("#"+dienteInicio+"-C5").append("<div id='PROTESISFIJACONECTOR'></div>");
				$("#"+dienteInicio+"-C5"+" > #PROTESISFIJACONECTOR").css(cssProtesisFijaConector);

				dientesProtesisFijaUno=dientesProtesisFija[i+1];
			}
		}
		else
		{
			dientesProtesisFijaDos=dientesProtesisFija[i];
			var posicionDienteUno=$("#"+dientesProtesisFijaUno).position();
			var posicionDienteDos=$("#"+dientesProtesisFijaDos).position();
			var dienteInicio=posicionDienteUno.left<posicionDienteDos.left?dientesProtesisFijaUno:dientesProtesisFijaDos;
			var dienteFin=posicionDienteUno.left>posicionDienteDos.left?dientesProtesisFijaUno:dientesProtesisFijaDos;
			$("#"+dienteInicio+"-C5").append("<div id='PROTESISFIJAINICIO'></div>");
			$("#"+dienteInicio+"-C5"+" > #PROTESISFIJAINICIO").css(cssProtesisFijaUno);
			$("#"+dienteFin+"-C5").append("<div id='PROTESISFIJAFIN'></div>");
			$("#"+dienteFin+"-C5"+" > #PROTESISFIJAFIN").css(cssProtesisFijaDos);

			var topLeft1=posicionDienteUno.left;
			var topLeft2=posicionDienteDos.left;
			var topWidth=(topLeft1-topLeft2)<0?(topLeft1-topLeft2)*(-1):(topLeft1-topLeft2);
			topWidth=topWidth+40;
			cssProtesisFijaConector=
			{
				"border-top": "1px solid black",
				"height": "10px",
				"left": "-10px",
				"position": "absolute",
				"top": "-20px",
				"width": ""+topWidth.toString()+"px"
			};
			$("#"+dienteInicio+"-C5").append("<div id='PROTESISFIJACONECTOR'></div>");
			$("#"+dienteInicio+"-C5"+" > #PROTESISFIJACONECTOR").css(cssProtesisFijaConector);
		}
	}
}

if(dientesProtesisRemovible.length>0)
{
	var cssProtesisRemovibleUno=
	{
		"border-right": "1px solid black",
		"border-top": "1px solid black",
		"height": "10px",
		"left": "-10px",
		"position": "absolute",
		"top": "-25px",
		"width": "10px"
	};

	var cssProtesisRemovibleDos=
	{
		"border-left": "1px solid black",
		"border-top": "1px solid black",
		"height": "10px",
		"left": "20px",
		"position": "absolute",
		"top": "-25px",
		"width": "10px"
	};

	var cssProtesisRemovibleConector;

	dientesProtesisRemovible.sort();
	var dientesProtesisRemovibleUno=dientesProtesisRemovible[0];
	var dientesProtesisRemovibleDos;
	for(var i=0; i<dientesProtesisRemovible.length; i++)
	{
		if(i<dientesProtesisRemovible.length-1)
		{
			if(parseInt(dientesProtesisRemovible[i].substring(1, 3))==parseInt(dientesProtesisRemovible[i+1].substring(1, 3))-1)
			{
				continue;
			}
			else
			{
				dientesProtesisRemovibleDos=dientesProtesisRemovible[i];
				var posicionDienteUno=$("#"+dientesProtesisRemovibleUno).position();
				var posicionDienteDos=$("#"+dientesProtesisRemovibleDos).position();
				var dienteInicio=posicionDienteUno.left<posicionDienteDos.left?dientesProtesisRemovibleUno:dientesProtesisRemovibleDos;
				var dienteFin=posicionDienteUno.left>posicionDienteDos.left?dientesProtesisRemovibleUno:dientesProtesisRemovibleDos;
				$("#"+dienteInicio+"-C5").append("<div id='PROTESISREMOVIBLEINICIO'></div>");
				$("#"+dienteInicio+"-C5"+" > #PROTESISREMOVIBLEINICIO").css(cssProtesisRemovibleUno);
				$("#"+dienteFin+"-C5").append("<div id='PROTESISREMOVIBLEFIN'></div>");
				$("#"+dienteFin+"-C5"+" > #PROTESISREMOVIBLEFIN").css(cssProtesisRemovibleDos);

				var topLeft1=posicionDienteUno.left;
				var topLeft2=posicionDienteDos.left;
				var topWidth=(topLeft1-topLeft2)<0?(topLeft1-topLeft2)*(-1):(topLeft1-topLeft2);
				topWidth=topWidth+20;
				cssProtesisRemovibleConector=
				{
					"border-top": "1px solid black",
					"height": "10px",
					"left": "0px",
					"position": "absolute",
					"top": "-15px",
					"width": ""+topWidth.toString()+"px"
				};
				$("#"+dienteInicio+"-C5").append("<div id='PROTESISREMOVIBLECONECTOR'></div>");
				$("#"+dienteInicio+"-C5"+" > #PROTESISREMOVIBLECONECTOR").css(cssProtesisRemovibleConector);

				dientesProtesisRemovibleUno=dientesProtesisRemovible[i+1];
			}
		}
		else
		{
			dientesProtesisRemovibleDos=dientesProtesisRemovible[i];
			var posicionDienteUno=$("#"+dientesProtesisRemovibleUno).position();
			var posicionDienteDos=$("#"+dientesProtesisRemovibleDos).position();
			var dienteInicio=posicionDienteUno.left<posicionDienteDos.left?dientesProtesisRemovibleUno:dientesProtesisRemovibleDos;
			var dienteFin=posicionDienteUno.left>posicionDienteDos.left?dientesProtesisRemovibleUno:dientesProtesisRemovibleDos;
			$("#"+dienteInicio+"-C5").append("<div id='PROTESISREMOVIBLEINICIO'></div>");
			$("#"+dienteInicio+"-C5"+" > #PROTESISREMOVIBLEINICIO").css(cssProtesisRemovibleUno);
			$("#"+dienteFin+"-C5").append("<div id='PROTESISREMOVIBLEFIN'></div>");
			$("#"+dienteFin+"-C5"+" > #PROTESISREMOVIBLEFIN").css(cssProtesisRemovibleDos);

			var topLeft1=posicionDienteUno.left;
			var topLeft2=posicionDienteDos.left;
			var topWidth=(topLeft1-topLeft2)<0?(topLeft1-topLeft2)*(-1):(topLeft1-topLeft2);
			topWidth=topWidth+20;
			cssProtesisRemovibleConector=
			{
				"border-top": "1px solid black",
				"height": "10px",
				"left": "0px",
				"position": "absolute",
				"top": "-15px",
				"width": ""+topWidth.toString()+"px"
			};
			$("#"+dienteInicio+"-C5").append("<div id='PROTESISREMOVIBLECONECTOR'></div>");
			$("#"+dienteInicio+"-C5"+" > #PROTESISREMOVIBLECONECTOR").css(cssProtesisRemovibleConector);
		}
	}
}

if(dientesOdontuloTotal.length>0)
{
	var cssOdontuloTotalUno=
	{
		"height": "10px",
		"left": "-10px",
		"position": "absolute",
		"top": "-25px",
		"width": "0px"
	};

	var cssOdontuloTotalDos=
	{
		"height": "10px",
		"left": "30px",
		"position": "absolute",
		"top": "-25px",
		"width": "0px"
	};

	var cssOdontuloTotalConector;

	dientesOdontuloTotal.sort();
	var dientesOdontuloTotalUno=dientesOdontuloTotal[0];
	var dientesOdontuloTotalDos;
	for(var i=0; i<dientesOdontuloTotal.length; i++)
	{
		if(i<dientesOdontuloTotal.length-1)
		{
			if(parseInt(dientesOdontuloTotal[i].substring(1, 3))==parseInt(dientesOdontuloTotal[i+1].substring(1, 3))-1)
			{
				continue;
			}
			else
			{
				dientesOdontuloTotalDos=dientesOdontuloTotal[i];
				var posicionDienteUno=$("#"+dientesOdontuloTotalUno).position();
				var posicionDienteDos=$("#"+dientesOdontuloTotalDos).position();
				var dienteInicio=posicionDienteUno.left<posicionDienteDos.left?dientesOdontuloTotalUno:dientesOdontuloTotalDos;
				var dienteFin=posicionDienteUno.left>posicionDienteDos.left?dientesOdontuloTotalUno:dientesOdontuloTotalDos;
				$("#"+dienteInicio+"-C5").append("<div id='ODONTULOTOTALINICIO'></div>");
				$("#"+dienteInicio+"-C5"+" > #ODONTULOTOTALINICIO").css(cssOdontuloTotalUno);
				$("#"+dienteFin+"-C5").append("<div id='ODONTULOTOTALFIN'></div>");
				$("#"+dienteFin+"-C5"+" > #ODONTULOTOTALFIN").css(cssOdontuloTotalDos);

				var topLeft1=posicionDienteUno.left;
				var topLeft2=posicionDienteDos.left;
				var topWidth=(topLeft1-topLeft2)<0?(topLeft1-topLeft2)*(-1):(topLeft1-topLeft2);
				topWidth=topWidth+40;
				cssOdontuloTotalConector=
				{
					"border-top": "1px solid black",
					"border-bottom": "1px solid black",
					"height": "5px",
					"left": "-10px",
					"position": "absolute",
					"top": "-23px",
					"width": ""+topWidth.toString()+"px"
				};
				$("#"+dienteInicio+"-C5").append("<div id='ODONTULOTOTALCONECTOR'></div>");
				$("#"+dienteInicio+"-C5"+" > #ODONTULOTOTALCONECTOR").css(cssOdontuloTotalConector);

				dientesOdontuloTotalUno=dientesOdontuloTotal[i+1];
			}
		}
		else
		{
			dientesOdontuloTotalDos=dientesOdontuloTotal[i];
			var posicionDienteUno=$("#"+dientesOdontuloTotalUno).position();
			var posicionDienteDos=$("#"+dientesOdontuloTotalDos).position();
			var dienteInicio=posicionDienteUno.left<posicionDienteDos.left?dientesOdontuloTotalUno:dientesOdontuloTotalDos;
			var dienteFin=posicionDienteUno.left>posicionDienteDos.left?dientesOdontuloTotalUno:dientesOdontuloTotalDos;
			$("#"+dienteInicio+"-C5").append("<div id='ODONTULOTOTALINICIO'></div>");
			$("#"+dienteInicio+"-C5"+" > #ODONTULOTOTALINICIO").css(cssOdontuloTotalUno);
			$("#"+dienteFin+"-C5").append("<div id='ODONTULOTOTALFIN'></div>");
			$("#"+dienteFin+"-C5"+" > #ODONTULOTOTALFIN").css(cssOdontuloTotalDos);

			var topLeft1=posicionDienteUno.left;
			var topLeft2=posicionDienteDos.left;
			var topWidth=(topLeft1-topLeft2)<0?(topLeft1-topLeft2)*(-1):(topLeft1-topLeft2);
			topWidth=topWidth+40;
			cssOdontuloTotalConector=
			{
				"border-top": "1px solid black",
				"border-bottom": "1px solid black",
				"height": "5px",
				"left": "-10px",
				"position": "absolute",
				"top": "-23px",
				"width": ""+topWidth.toString()+"px"
			};
			$("#"+dienteInicio+"-C5").append("<div id='ODONTULOTOTALCONECTOR'></div>");
			$("#"+dienteInicio+"-C5"+" > #ODONTULOTOTALCONECTOR").css(cssOdontuloTotalConector);
		}
	}
}

if(dientesAparatOrtoFijo.length>0)
{
	var cssAparatOrtoFijoUno=
	{
		"border": "1px solid black",
		"height": "10px",
		"left": "-11px",
		"position": "absolute",
		"top": "-25px",
		"width": "10px"
	};

	var cssAparatOrtoFijoDos=
	{
		"border": "1px solid black",
		"height": "10px",
		"left": "20px",
		"position": "absolute",
		"top": "-25px",
		"width": "10px"
	};

	var cssAparatOrtoFijoConector;

	dientesAparatOrtoFijo.sort();
	var dientesAparatOrtoFijoUno=dientesAparatOrtoFijo[0];
	var dientesAparatOrtoFijoDos;
	for(var i=0; i<dientesAparatOrtoFijo.length; i++)
	{
		if(i<dientesAparatOrtoFijo.length-1)
		{
			if(parseInt(dientesAparatOrtoFijo[i].substring(1, 3))==parseInt(dientesAparatOrtoFijo[i+1].substring(1, 3))-1)
			{
				continue;
			}
			else
			{
				dientesAparatOrtoFijoDos=dientesAparatOrtoFijo[i];
				var posicionDienteUno=$("#"+dientesAparatOrtoFijoUno).position();
				var posicionDienteDos=$("#"+dientesAparatOrtoFijoDos).position();
				var dienteInicio=posicionDienteUno.left<posicionDienteDos.left?dientesAparatOrtoFijoUno:dientesAparatOrtoFijoDos;
				var dienteFin=posicionDienteUno.left>posicionDienteDos.left?dientesAparatOrtoFijoUno:dientesAparatOrtoFijoDos;
				$("#"+dienteInicio+"-C5").append("<div id='APARATORTOFIJOINICIO'></div>");
				$("#"+dienteInicio+"-C5"+" > #APARATORTOFIJOINICIO").css(cssAparatOrtoFijoUno);
				$("#"+dienteFin+"-C5").append("<div id='APARATORTOFIJOFIN'></div>");
				$("#"+dienteFin+"-C5"+" > #APARATORTOFIJOFIN").css(cssAparatOrtoFijoDos);

				var topLeft1=posicionDienteUno.left;
				var topLeft2=posicionDienteDos.left;
				var topWidth=(topLeft1-topLeft2)<0?(topLeft1-topLeft2)*(-1):(topLeft1-topLeft2);
				topWidth=topWidth+20;
				cssAparatOrtoFijoConector=
				{
					"border-top": "1px solid black",
					"height": "10px",
					"left": "0px",
					"position": "absolute",
					"top": "-20px",
					"width": ""+topWidth.toString()+"px"
				};
				$("#"+dienteInicio+"-C5").append("<div id='APARATORTOFIJOCONECTOR'></div>");
				$("#"+dienteInicio+"-C5"+" > #APARATORTOFIJOCONECTOR").css(cssAparatOrtoFijoConector);

				dientesAparatOrtoFijoUno=dientesAparatOrtoFijo[i+1];
			}
		}
		else
		{
			dientesAparatOrtoFijoDos=dientesAparatOrtoFijo[i];
			var posicionDienteUno=$("#"+dientesAparatOrtoFijoUno).position();
			var posicionDienteDos=$("#"+dientesAparatOrtoFijoDos).position();
			var dienteInicio=posicionDienteUno.left<posicionDienteDos.left?dientesAparatOrtoFijoUno:dientesAparatOrtoFijoDos;
			var dienteFin=posicionDienteUno.left>posicionDienteDos.left?dientesAparatOrtoFijoUno:dientesAparatOrtoFijoDos;
			$("#"+dienteInicio+"-C5").append("<div id='APARATORTOFIJOINICIO'></div>");
			$("#"+dienteInicio+"-C5"+" > #APARATORTOFIJOINICIO").css(cssAparatOrtoFijoUno);
			$("#"+dienteFin+"-C5").append("<div id='APARATORTOFIJOFIN'></div>");
			$("#"+dienteFin+"-C5"+" > #APARATORTOFIJOFIN").css(cssAparatOrtoFijoDos);

			var topLeft1=posicionDienteUno.left;
			var topLeft2=posicionDienteDos.left;
			var topWidth=(topLeft1-topLeft2)<0?(topLeft1-topLeft2)*(-1):(topLeft1-topLeft2);
			topWidth=topWidth+20;
			cssAparatOrtoFijoConector=
			{
				"border-top": "1px solid black",
				"height": "10px",
				"left": "0px",
				"position": "absolute",
				"top": "-20px",
				"width": ""+topWidth.toString()+"px"
			};
			$("#"+dienteInicio+"-C5").append("<div id='APARATORTOFIJOCONECTOR'></div>");
			$("#"+dienteInicio+"-C5"+" > #APARATORTOFIJOCONECTOR").css(cssAparatOrtoFijoConector);
		}
	}
}

if(dientesAparatOrtoRemovible.length>0)
{
	var cssAparatOrtoRemovibleUno=
	{
		"height": "10px",
		"left": "-10px",
		"position": "absolute",
		"top": "-25px",
		"width": "0px"
	};

	var cssAparatOrtoRemovibleDos=
	{
		"height": "10px",
		"left": "30px",
		"position": "absolute",
		"top": "-25px",
		"width": "0px"
	};

	var cssAparatOrtoRemovibleConector;

	dientesAparatOrtoRemovible.sort();
	var dientesAparatOrtoRemovibleUno=dientesAparatOrtoRemovible[0];
	var dientesAparatOrtoRemovibleDos;
	for(var i=0; i<dientesAparatOrtoRemovible.length; i++)
	{
		if(i<dientesAparatOrtoRemovible.length-1)
		{
			if(parseInt(dientesAparatOrtoRemovible[i].substring(1, 3))==parseInt(dientesAparatOrtoRemovible[i+1].substring(1, 3))-1)
			{
				continue;
			}
			else
			{
				dientesAparatOrtoRemovibleDos=dientesAparatOrtoRemovible[i];
				var posicionDienteUno=$("#"+dientesAparatOrtoRemovibleUno).position();
				var posicionDienteDos=$("#"+dientesAparatOrtoRemovibleDos).position();
				var dienteInicio=posicionDienteUno.left<posicionDienteDos.left?dientesAparatOrtoRemovibleUno:dientesAparatOrtoRemovibleDos;
				var dienteFin=posicionDienteUno.left>posicionDienteDos.left?dientesAparatOrtoRemovibleUno:dientesAparatOrtoRemovibleDos;
				$("#"+dienteInicio+"-C5").append("<div id='APARATORTOREMOVIBLEINICIO'></div>");
				$("#"+dienteInicio+"-C5"+" > #APARATORTOREMOVIBLEINICIO").css(cssAparatOrtoRemovibleUno);
				$("#"+dienteFin+"-C5").append("<div id='APARATORTOREMOVIBLEFIN'></div>");
				$("#"+dienteFin+"-C5"+" > #APARATORTOREMOVIBLEFIN").css(cssAparatOrtoRemovibleDos);

				var topLeft1=posicionDienteUno.left;
				var topLeft2=posicionDienteDos.left;
				var topWidth=(topLeft1-topLeft2)<0?(topLeft1-topLeft2)*(-1):(topLeft1-topLeft2);
				topWidth=topWidth+40;
				var iteraciones=-1;
				do
				{
					var leftActual=10*iteraciones;
					cssAparatOrtoRemovibleConector=
					{
						"border-top": "1px solid black",
						"border-right": "1px solid black",
						"height": "7px",
						"left": leftActual+"px",
						"position": "absolute",
						"top": "-20px",
						"width": "7px",
						"-webkit-transform": "rotate(-45deg)"
					};
					$("#"+dienteInicio+"-C5").append("<div id='APARATORTOREMOVIBLECONECTOR"+iteraciones+"'></div>");
					$("#"+dienteInicio+"-C5"+" > #APARATORTOREMOVIBLECONECTOR"+iteraciones).css(cssAparatOrtoRemovibleConector);
					iteraciones++;
				}
				while(leftActual+$("#"+dienteInicio).position().left-15<=$("#"+dienteFin).position().left);

				dientesAparatOrtoRemovibleUno=dientesAparatOrtoRemovible[i+1];
			}
		}
		else
		{
			dientesAparatOrtoRemovibleDos=dientesAparatOrtoRemovible[i];
			var posicionDienteUno=$("#"+dientesAparatOrtoRemovibleUno).position();
			var posicionDienteDos=$("#"+dientesAparatOrtoRemovibleDos).position();
			var dienteInicio=posicionDienteUno.left<posicionDienteDos.left?dientesAparatOrtoRemovibleUno:dientesAparatOrtoRemovibleDos;
			var dienteFin=posicionDienteUno.left>posicionDienteDos.left?dientesAparatOrtoRemovibleUno:dientesAparatOrtoRemovibleDos;
			$("#"+dienteInicio+"-C5").append("<div id='APARATORTOREMOVIBLEINICIO'></div>");
			$("#"+dienteInicio+"-C5"+" > #APARATORTOREMOVIBLEINICIO").css(cssAparatOrtoRemovibleUno);
			$("#"+dienteFin+"-C5").append("<div id='APARATORTOREMOVIBLEFIN'></div>");
			$("#"+dienteFin+"-C5"+" > #APARATORTOREMOVIBLEFIN").css(cssAparatOrtoRemovibleDos);

			var topLeft1=posicionDienteUno.left;
			var topLeft2=posicionDienteDos.left;
			var topWidth=(topLeft1-topLeft2)<0?(topLeft1-topLeft2)*(-1):(topLeft1-topLeft2);
			topWidth=topWidth+40;
			var iteraciones=-1;
			do
			{
				var leftActual=10*iteraciones;
				cssAparatOrtoRemovibleConector=
				{
					"border-top": "1px solid black",
					"border-right": "1px solid black",
					"height": "7px",
					"left": leftActual+"px",
					"position": "absolute",
					"top": "-20px",
					"width": "7px",
					"-webkit-transform": "rotate(-45deg)"
				};
				$("#"+dienteInicio+"-C5").append("<div id='APARATORTOREMOVIBLECONECTOR"+iteraciones+"'></div>");
				$("#"+dienteInicio+"-C5"+" > #APARATORTOREMOVIBLECONECTOR"+iteraciones).css(cssAparatOrtoRemovibleConector);
				iteraciones++;
			}
			while(leftActual+$("#"+dienteInicio).position().left-15<=$("#"+dienteFin).position().left);
		}
	}
}