const video = document.getElementById('video');
const output = document.getElementById('output');

navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } })
    .then((stream) => {
        video.srcObject = stream;
        video.play();
        requestAnimationFrame(tick);
    })
    .catch((err) => console.error('Error accessing camera:', err));

function tick() {
    if (video.readyState === video.HAVE_ENOUGH_DATA) {
        const canvasElement = document.createElement('canvas');
        canvasElement.width = video.videoWidth;
        canvasElement.height = video.videoHeight;
        const context = canvasElement.getContext('2d');
        context.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
        const imageData = context.getImageData(0, 0, canvasElement.width, canvasElement.height);
        const code = jsQR(imageData.data, imageData.width, imageData.height);
        if (code) {
            output.value=code.data;
            
        }
    }
    requestAnimationFrame(tick);
}