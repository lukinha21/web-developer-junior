    </div> <!-- End of Content Wrapper -->
</div> <!-- End of Page Wrapper -->

<!-- Scroll to Top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- JS -->
<script src="<?= base_url('assets/sb-admin2/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/sb-admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/sb-admin2/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('assets/sb-admin2/vendor/chart.js/Chart.min.js') ?>"></script>

<script src="<?= base_url('assets/sb-admin2/js/sb-admin-2.min.js') ?>"></script>
<script>

    var ctx = document.getElementById("myAreaChart");
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul"],
            datasets: [{
                label: "Visualizações/mês",
                data: [0, 1000, 5000, 3000, 8000, 7000, 11000],
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                borderWidth: 2
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });

    // Pie Chart - Revenue Sources
// Pie Chart - Dispositivos
var ctx = document.getElementById("myPieChart");
new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Android", "PCs/notebooks", "IOS"],
        datasets: [{
            data: [55, 30, 15], // valores fictícios, pode alterar
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf']
        }]
    },
    options: {
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'bottom' }
        },
        cutout: "60%"
    }
});

</script>
</body>
</html>
