
// chart for daily activities

document.addEventListener("DOMContentLoaded", function () {
  var ctx = document.getElementById("myChart").getContext("2d");

  // Initial data (could be empty or default)
  var initialData = {
    labels: ["Pub-users", "Drivers", "Owners", "Vehicles"],
    datasets: [{
      label: "User Categories",
      data: [5, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
      backgroundColor: [
        '#ff6384', // Red
        '#36a2eb', // Blue
        '#cc65fe', // Purple
        '#ffce56', // Yellow
      ],
      borderWidth: 1
    }]
  };

  var options = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          stepSize: 5
        }
      }
    }
  };

  var myChart = new Chart(ctx, {
    type: 'bar', // Type of chart (e.g., bar, line, pie)
    data: initialData,
    options: options
  });

  // Function to update chart data
  function updateChartData() {
    // AJAX call to fetch data from server
    fetch('../controllers/count-con.php')
      .then(response => response.json())
      .then(data => {
        // Check if data is received and in the expected format
        if (data && typeof data === 'object' && !Array.isArray(data)) {
          // Extract counts from fetched JSON
          var counts = [
            data.users,
            data.riders,
            data.owners,
            data.vehicles
          ];

          // Update chart data
          // myChart.data.datasets[0].data = counts;
          // myChart.update(); // Update the chart with new data
          console.log(counts);
        } else {
          console.error('Data format error or empty response:', data);
        }
      })
      .catch(error => console.error('Error fetching data:', error));
  }

  // Call updateChartData() to initially fetch and update chart data
  updateChartData();

  // Example: Update chart data every 5 seconds (adjust as needed)
  setInterval(updateChartData, 5000); // Update every 5 seconds
});


// chart for highest local government registered

document.addEventListener("DOMContentLoaded", function () {
  var ctx = document.getElementById("myPieChart").getContext("2d");

  // Initial data for the pie chart
  var initialData = {
      labels: ["Users", "Riders", "Owners", "Vehicles"],
      datasets: [{
          label: "User Categories",
          data: [2, 7, 4, 1], // Sample data
          backgroundColor: [
              '#ff6384', // Red
              '#36a2eb', // Blue
              '#cc65fe', // Purple
              '#ffce56', // Yellow
          ],
          borderWidth: 1
      }]
  };

  var options = {
      responsive: true,
      maintainAspectRatio: false,
  };

  var myPieChart = new Chart(ctx, {
      type: 'pie', // Type of chart
      data: initialData,
      options: options
  });

  // Example: Update chart data (uncomment if you want to dynamically update the chart)
  // function updateChartData(newData) {
  //     myPieChart.data.datasets[0].data = newData;
  //     myPieChart.update();
  // }

  // Example: Update chart data every 5 seconds (uncomment if you want to dynamically update the chart)
  // setInterval(function() {
  //     var newData = [Math.random() * 10, Math.random() * 10, Math.random() * 10, Math.random() * 10];
  //     updateChartData(newData);
  // }, 5000); // Update every 5 seconds
});
