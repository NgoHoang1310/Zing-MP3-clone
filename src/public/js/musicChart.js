var a = 15;
var b=60;
const chartLine = () => {
  const ctx = document.getElementById('myChart');
  const xValues = ['16:00', '18:00', '20:00', '22:00', '00:00'];
  var image = new Image(50, 40);
  image.src = "https://marketplace.canva.com/EAFSNmv0C0k/1/0/1600w/canva-orange-illustration-relaxing-playlist-cover-G1lOYn2PS28.jpg";
  let data = {
    labels: xValues,
    datasets: [{
      label: 'Anh chưa thương em đến vậy đâu',
      data: (function() {
          return [a++, b++, 81, 42, 33 ];
      })(),
      borderColor: '#4a90e2',
      barThickness: 50,
      backgroundColor:[
        '#4a90e2',
        '#4a90e2',
        '#4a90e2',
        '#4a90e2',
        '#4a90e2'
      ]
      // tension: 0.4
    },
    ]
  }

  new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      plugins: {
        tooltip: {
          usePointStyle: true,
          boxWidth: 80,
          boxHeight: 40,
          padding: 10,
          callbacks: {
            labelPointStyle: function (context) {
              return {
                pointStyle: image,
                rotation: 0
              };
            },
            title: function () {
              return null;
            },
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: "white",
            lineWidth: 0.3,
          },
          min: 0,
          max: 100,
          ticks: {
            stepSize: 25 // Giãn cách 10 đơn vị
          }
        },
      },
    }
  });
  // console.log('hello chart'+a++);
}
chartLine();