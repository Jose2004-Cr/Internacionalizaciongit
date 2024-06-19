
    document.getElementById('certForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const name = document.getElementById('name').value;
        const course = document.getElementById('course').value;
        const date = new Date(document.getElementById('date').value).getDate();

        document.getElementById('certName').innerText = name;
        document.getElementById('certDateText').innerText = date;

        const certificate = document.getElementById('certificate');
        certificate.style.display = 'block';

        const loadImage = (url) => {
            return new Promise((resolve, reject) => {
                const img = new Image();
                img.src = url;
                img.onload = () => resolve(img);
                img.onerror = (err) => reject(err);
            });
        };

        const generatePDF = async () => {
            await loadImage(document.querySelector('.logo').src);

            html2canvas(certificate, { scale: 2 }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF('landscape');
                pdf.addImage(imgData, 'PNG', 0, 0, 297, 210);
                pdf.save("certificado.pdf");

                certificate.style.display = 'none';
            }).catch(error => {
                console.error('Error generating PDF:', error);
                certificate.style.display = 'none';
            });
        };

        generatePDF();
    });
