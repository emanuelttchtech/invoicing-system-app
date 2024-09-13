<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="row row-xs clearfix">
	 <canvas id="barChart" width="400" height="200"></canvas>
</div>
<script>

 function fetchData() {
    fetch('daily-report-data.php')
        .then(response => response.json())
        .then(data => {
            const labels = Object.keys(data);
            const values = Object.values(data);

            // Create the Chart.js chart
            const ctx = document.getElementById('barChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Number of Registered Talent',
                        data: values,
                        backgroundColor: '#27276c',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Convert the chart to a base64 image
            const chartImage = chart.toBase64Image();
            //Send the chart image data to the PHP script
            sendChartImageToPHP(chartImage);
        });
}

function sendChartImageToPHP(imageData) {
    // console.log(imageData);
     //console.log(JSON.stringify({ chartImage: imageData }));

    fetch('send_email.php', {
        method: 'POST',
        body: JSON.stringify({ chartImage: imageData }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.text()) // Parse the response as text
    .then(message => {
        // Display the response message on your webpage
        console.log(message);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Call the fetchData function to render the chart
fetchData();

</script>

</body>
</html>
