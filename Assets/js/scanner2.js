{/* <script src="https://cdn.jsdelivr.net/npm/mysql2@3.9.2/index.min.js"></script> */}
// const mysql=require('https://cdn.jsdelivr.net/npm/mysql2@3.9.2/index.min.js')

// var connection = new MySQL.Connection({
//     host: 'tu-host',
//     user: 'tu-usuario',
//     password: 'tu-contraseña',
//     database: 'tu-base-de-datos'
//   });
  
let escaneoCompleto = false;
const video = document.getElementById("video");
const titulo = document.getElementById("buscar_libro");
const autor = document.getElementById("autor");
const editorial = document.getElementById("editorial");
navigator.mediaDevices
  .getUserMedia({ video: { facingMode: "environment" } })
  .then((stream) => {
    video.srcObject = stream;
    video.play();
    requestAnimationFrame(tick);
  })
  .catch((err) => console.error("Error accessing camera:", err));

async function tick() {
  if (!escaneoCompleto && video.readyState === video.HAVE_ENOUGH_DATA) {
    const canvasElement = document.createElement("canvas");
    canvasElement.width = video.videoWidth;
    canvasElement.height = video.videoHeight;
    const context = canvasElement.getContext("2d");
    context.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
    const imageData = context.getImageData(
      0,
      0,
      canvasElement.width,
      canvasElement.height
    );
    const code = jsQR(imageData.data, imageData.width, imageData.height);
    console.log(code)
    if (code) {
        await obtenerLibro()
      titulo.value=code.data
      escaneoCompleto = true;
    }
  }
  requestAnimationFrame(tick);
}

function acomodarDatos(){

}

async function obtenerLibro(){
    await connection.query(
        'SELECT * FROM `librosb`',
        function(err, results, fields) {
          console.log(results); 
          console.log(fields); 
        }
      );
}
