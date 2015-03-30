
function agregar(id){	
	var objDestino = document.getElementById("datos");	
	var objForm = document.getElementById("formAgregarTecnico");	
	
	if(objForm.numSerie.value!=0 ){
	
	xmlhttp = nuevoAjax();

	var parametros = "numSerie="+objForm.numSerie.value;
	xmlhttp.open("POST",objForm.dire.value+"modulos/back-end/tecnico/datos.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
	else 
	{
	xmlhttp = nuevoAjax();

	xmlhttp.open("POST",objForm.dire.value+"modulos/back-end/tecnico/error.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
}

function agregarDatos(id){	
	var objDestino = document.getElementById("datosUsoEscolar");	
	var objForm = document.getElementById("formAgregarUsoEscolar");	
	
	if(objForm.datosEscuela.value!='' ){
	
	xmlhttp = nuevoAjax();

	var parametros = "datosEscuela="+objForm.datosEscuela.value;
	xmlhttp.open("POST",objForm.dire.value+"modulos/back-end/netescuela/datos.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
	else 
	{
	objDestino.innerHTML='';
	}
}

function setDeleteAction() {

var usu = frmUser.usuario.value;
var cat = frmUser.catedra.value;

if(confirm("Estas seguro que deseas eliminar esta seleccion")) {

document.frmUser.action = "borrarCorreos.php?usuario=" + usu + "&catedra="+cat;
				       
document.frmUser.submit();
}
}

function ocultar(){
	var objForm = document.getElementById("formAgregarNetbook");

div = document.getElementById('palabra');
div.style.display='none';

div2 = document.getElementById('algo');
div2.style.display='none';

}

function netbook(id){	
	var objDestino = document.getElementById("datosNetbook");	
	var objForm = document.getElementById("formAgregarNetbook");	
	
	if(objForm.numSerie.value!=0 ){
	
	xmlhttp = nuevoAjax();

	var parametros = "numSerie="+objForm.numSerie.value;
	xmlhttp.open("POST",objForm.dire.value+"modulos/back-end/prestamo/datosNetbook.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
	else {
	
	xmlhttp = nuevoAjax();

	xmlhttp.open("POST",objForm.dire.value+"modulos/back-end/prestamo/error.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
	
}
function alumnoDatos(){	
	var objDestino = document.getElementById("aluDatos");	
	var objForm = document.getElementById("formCatedra");	
	
	if(objForm.alumno.value!=0 ){
	
	xmlhttp = nuevoAjax();

	var parametros = "alumno="+objForm.alumno.value;
	xmlhttp.open("POST",httpHostSitio + "modulos/back-end/notas/alumno.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
	else {
	objDestino.innerHTML='';	
	}
	
}


function Profesor(){	
	var objDestino = document.getElementById("profesores");	
	var objForm = document.getElementById("formTrabajo");	
	
	if(objForm.profe.value!=0 ){
	//alert(objForm.profe.value);
	xmlhttp = nuevoAjax();

	var parametros = "profesor="+objForm.profe.value;
	xmlhttp.open("POST",objForm.dire.value+"modulos/back-end/secretaria/profesor/Profesores.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
	else {
	objDestino.innerHTML='';	
	}
	
}

function Libro(){	
	var objDestino = document.getElementById("libros");	
	var objForm = document.getElementById("formLibro");	
	
	if(objForm.libro.value!=0 ){
	xmlhttp = nuevoAjax();

	var parametros = "libro="+objForm.libro.value;
	xmlhttp.open("POST",httpHostSitio + "modulos/back-end/biblioteca/prestamo/detalleLibro.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
	else {
	objDestino.innerHTML='';	
	}
	
}

function Curso(){	
	var objDestino = document.getElementById("cursito");	
	var objForm = document.getElementById("formPrestamo");	
	
	if(objForm.alumno.value!=0 ){
	
	xmlhttp = nuevoAjax();

	var parametros = "alumno="+objForm.alumno.value;
	xmlhttp.open("POST",httpHostSitio + "modulos/back-end/biblioteca/prestamo/curso.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
	else {
	objDestino.innerHTML='';	
	}
	
}

function verCurso(){	
	var objDestino = document.getElementById("Cursos");	
	var objForm = document.getElementById("formCursos");	
	
	if(objForm.cursito.value!=0 ){
	
	xmlhttp = nuevoAjax();

	var parametros = "cursito="+objForm.cursito.value;
	xmlhttp.open("POST",httpHostSitio + "modulos/back-end/preceptoria/alumnos/Curso.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
	else {
	objDestino.innerHTML='';	
	}
	
}

function Sanciones(){	
	var objDestino = document.getElementById("datos");	
	var objForm = document.getElementById("formSan");	
	
	if(objForm.idAlu.value!=0 ){
	
	xmlhttp = nuevoAjax();

	var parametros = "idAlu="+objForm.idAlu.value;
	xmlhttp.open("POST",httpHostSitio + "modulos/back-end/preceptoria/sanciones/detalleSancion.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
	else {
	objDestino.innerHTML='';	
	}
	
}

function puntos(){	
	var objDestino = document.getElementById("sancion");	
	var objForm = document.getElementById("formSancion");	
	
	if(objForm.falta.value!=0 ){

	xmlhttp = nuevoAjax();

	var parametros = "falta="+objForm.falta.value;
	xmlhttp.open("POST",httpHostSitio + "modulos/back-end/preceptoria/sanciones/leve.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}

	else {
	objDestino.innerHTML='';	
	}
	
}

function tramite(){	
	var objDestino = document.getElementById("detalleTramite");	
	var objForm = document.getElementById("formTramite");	
	
	if(objForm.descripcion.value!=0){
	xmlhttp = nuevoAjax();

	var parametros = "descripcion="+objForm.descripcion.value; 
	xmlhttp.open("POST",objForm.dire.value+"modulos/back-end/secretaria/tramites/detalleTramite.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}

	else {
	objDestino.innerHTML='';	
	}
	
}


function imprimir(){	
	var objDestino = document.getElementById("imprimir");	
	var objForm = document.getElementById("formDetalleTramite");	
	
	if(objForm.profe.value!=0 ){
	xmlhttp = nuevoAjax();

	var parametros = "profe="+objForm.profe.value +"&detalle="+objForm.detalle.value;
	
	xmlhttp.open("POST",objForm.dire.value+"modulos/back-end/secretaria/tramites/imprimir.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}

	else {
	objDestino.innerHTML='';	
	}
	
}

function agregarEspacios(){	

var objDestino = document.getElementById("contenedor");
var objForm = document.getElementById("formProfesor");
var palabra = objForm.espacios.value;

xmlhttp = nuevoAjax();	

	xmlhttp.open("GET", objForm.dire.value+"modulos/back-end/secretaria/profesor/espaciosCurriculares.php?palabras="+palabra);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(null);
}

function oculta(){
	
	div=document.getElementById('emergente');
	div.style.display='none';
		}
		
function setDeleteAction() {

var usu = frmUser.usuario.value;


if(confirm("Estas seguro que deseas eliminar esta seleccion")) {

document.frmUser.action = "borrarCorreos.php?usuario=" + usu;
				       
document.frmUser.submit();
}
}

function PaginaImagenes(nropagina){
	var objDestino = document.getElementById("alumnos");
	var objForm = document.getElementById("formListarAlumnos");
	
	xmlhttp = nuevoAjax();
	objDestino.innerHTML= '<img src="http://localhost/escuelas/imagenes/anim.gif">';
	xmlhttp.open("GET", objForm.dire.value+"modulos/back-end/alumnos/Alumno.php?pag="+nropagina);
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status == 200) {
			objDestino.innerHTML = xmlhttp.responseText
		}
	}
	xmlhttp.send(null)
}