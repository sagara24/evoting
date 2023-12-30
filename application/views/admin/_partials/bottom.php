<script src="<?= base_url('assets/vendor/global/global.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/quixnav-init.js'); ?>"></script>
    <script src="<?= base_url('assets/js/custom.min.js'); ?>"></script>

    <script src="<?= base_url('assets/vendor/chartist/js/chartist.min.js'); ?>"></script>

    <script src="<?= base_url('assets/vendor/moment/moment.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/pg-calendar/js/pignose.calendar.min.js'); ?>"></script>


    <script src="<?= base_url('assets/js/dashboard/dashboard-2.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('pieChart').getContext('2d');

        // Assume $dataKandidat is an array containing data for each candidate
        var candidateData = <?= json_encode($kandidat); ?>;
        
        var labels = [];
        var datasetData = [];
        var backgroundColors = [];

        // Extract data for each candidate
        candidateData.forEach(function(candidate) {
            labels.push(candidate.nama_kandidat);
            datasetData.push(candidate.jumlah_suara);
            // You can customize colors as needed
            backgroundColors.push(getRandomColor());
        });

        var data = {
            labels: labels,
            datasets: [{
                data: datasetData,
                backgroundColor: backgroundColors
            }]
        };

        var options = {
            responsive: true,
            maintainAspectRatio: false
        };

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });

        // Function to generate random colors
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    });
</script>

