import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
  dictDefaultMessage: "Sube aquí tu imagen",
  acceptedFiles: ".jpg,.png,.jpeg,.gif",
  addRemoveLinks: true,
  dictRemoveFile: "Borrar Archivo",
  maxFiles: 1,
  uploadMultiple: false,
});