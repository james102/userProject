/**
 * Created by Rafael on 24/07/2017.
 */


function getFile(file, image, input) {
    var file = file,
        reader = new FileReader();

    reader.onload = function () {
        document.getElementById(image).src = reader.result;
        document.getElementById(input).value = reader.result;
    };

    reader.readAsDataURL(file);
}

/**
 verifica se foi selecionado arquivo
 */
var fileComprovante = document.getElementById("fileComprovante");
var fileFoto = document.getElementById("fileFoto");

var enviar = document.getElementById("upload");
var form =document.getElementById("formUpload");

enviar.addEventListener("click", function (event) 
{
  if (fileComprovante.files.length == 0) {
    alert("E necessário que um arquvio seja enviado");
    return;
  }

  if (fileFoto.files.length == 0) {
    alert("E necessário que um arquvio foto seja enviado");
    return;
  }
  
  form.submit();
})