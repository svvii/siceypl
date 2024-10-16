let escaneoCompleto = false;
let videoStream = null;

function iniciarCamara() {
  navigator.mediaDevices
    .getUserMedia({ video: { facingMode: "environment" } })
    .then((stream) => {
      videoStream = stream;
      const video = document.getElementById("video");
      video.srcObject = stream;
      video.play();
      requestAnimationFrame(tick);
    })
    .catch((err) => console.error("Error accessing camera:", err));
}

function detenerCamara() {
  if (videoStream) {
    videoStream.getTracks().forEach((track) => {
      track.stop();
    });
  }
}

async function tick() {
  if (!escaneoCompleto && videoStream && videoStream.active) {
    const video = document.getElementById("video");
    if (video.readyState === video.HAVE_ENOUGH_DATA) {
      const canvasElement = document.createElement("canvas");
      canvasElement.width = video.videoWidth;
      canvasElement.height = video.videoHeight;
      const context = canvasElement.getContext("2d");
      context.drawImage(
        video,
        0,
        0,
        canvasElement.width,
        canvasElement.height
      );
      const imageData = context.getImageData(
        0,
        0,
        canvasElement.width,
        canvasElement.height
      );
      const code = jsQR(imageData.data, imageData.width, imageData.height); 
      if (code) {
        const [idQr, tituloQR, autorQR, editorialQR] = code.data.split("%");
        console.log(tituloQR);
        const idlibro = document.getElementsByName('id');
        const titulo = document.getElementById("buscar_libro");
        const autor = document.getElementById("autor");
        const editorial = document.getElementById("editorial");
        idlibro.value=idQr;
        titulo.value = tituloQR;
        autor.value = autorQR;
        editorial.value = editorialQR;
        escaneoCompleto = true;

        return;
      }
    }
  }
  requestAnimationFrame(tick);
}

$('#nuevo_prestamodelibro').on('show.bs.modal', function () {
  iniciarCamara();
});

$('#nuevo_prestamodelibro').on('hidden.bs.modal', function () {
  detenerCamara();
});
