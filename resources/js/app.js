import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
  dictDefaultMessage: "Sube aquí tu imagen",
  acceptedFiles: ".png,.jpg,.jpeg,.gif",
  addRemoveLinks: true,
  dictRemoveFile: "Borrar Archivo",
  maxFiles: 1,
  uploadMultiple: false,

  init: function () {
    // Se ejecutara si hay un 'name' previamente
    if (document.querySelector('[name="imagen"]').value.trim()) {
        const imagenPublicada = {}
        imagenPublicada.size = 1234;
        imagenPublicada.name = document.querySelector('[name="imagen"]').value;

        // Opciones de dropzone
        // Cuando se inicia la funcion es cuando se hace la llamada a call
        this.options.addedfile.call(this, imagenPublicada);
        this.options.thumbnail.call(this, imagenPublicada,`/uploads/${imagenPublicada.name}`);

        imagenPublicada.previewElement.classList.add(
            // Clases de dropzone
            'dz-success',
            'dz-complete'
        );
    }
}

});


//conocer el nombre de la img al momento de cargarla y asignarsela al input del formulario
dropzone.on("success", function (file, response){
  // console.log(response.imagen);
  document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on("removedfile", function (){
  document.querySelector('[name="imagen"]').value = "";
});