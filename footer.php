<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showDashboard() {
            document.getElementById('form-section').classList.add('hidden');
            document.getElementById('form-section').classList.remove('animate-fade-up');
            
            let dash = document.getElementById('dashboard-section');
            dash.classList.remove('hidden');
            dash.style.animation = 'none';
            dash.offsetHeight; 
            dash.style.animation = null;
            dash.classList.add('animate-fade-up');
        }
        function showForm() {
            document.getElementById('dashboard-section').classList.add('hidden');
            document.getElementById('dashboard-section').classList.remove('animate-fade-up');
            
            let form = document.getElementById('form-section');
            form.classList.remove('hidden');
            form.style.animation = 'none';
            form.offsetHeight; 
            form.style.animation = null;
            form.classList.add('animate-fade-up');
            
            initCanvas(); 
        }

        let canvas = document.getElementById('signature-pad');
        let ctx = canvas.getContext('2d');
        let isDrawing = false;

        function initCanvas() {
            if(!canvas) return;
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;
            ctx.lineWidth = 3;
            ctx.lineCap = 'round';
            ctx.strokeStyle = '#000000'; 
        }

        if(canvas) {
            canvas.addEventListener('mousedown', (e) => { isDrawing = true; ctx.beginPath(); ctx.moveTo(e.offsetX, e.offsetY); });
            canvas.addEventListener('mousemove', (e) => { if (isDrawing) { ctx.lineTo(e.offsetX, e.offsetY); ctx.stroke(); } });
            canvas.addEventListener('mouseup', () => { isDrawing = false; });
            canvas.addEventListener('mouseleave', () => { isDrawing = false; });
        }

        function clearCanvas() { ctx.clearRect(0, 0, canvas.width, canvas.height); }

        function submitForm() {
            var dataURL = canvas.toDataURL();
            document.getElementById('signature_data').value = dataURL;
            document.getElementById('formPendaftaran').submit();
        }
    </script>
</body>
</html>