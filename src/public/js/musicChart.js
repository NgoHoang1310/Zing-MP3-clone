//lấy data biểu đồ
let getChartData = function() {
  fetch('../model/chart.php')
    .then(function (response) {
      return response.json();
    })
    .then(function(datas) {
      let arrPercent = [];
      let arrSong = [];
      datas.map(function (data) {
        return arrSong.push(data.title), arrPercent.push(data.count);
      })
      // console.log(arrPercent)
      chartLine(arrPercent, arrSong);
    })
    .catch(function (e) {
      console.log(e);
    })
}


const chartLine = (arrPercent, arrSong) => {
  const ctx = document.getElementById('myChart');
  var image = new Image(50, 40);
  image.src = "https://marketplace.canva.com/EAFSNmv0C0k/1/0/1600w/canva-orange-illustration-relaxing-playlist-cover-G1lOYn2PS28.jpg";
  let data = {
    labels: arrSong,
    datasets: [{
      label: "Tỷ lệ: ",
      data: arrPercent,
      borderColor: '#4a90e2',
      barThickness: 50,
      backgroundColor: [
        ' #238f7b',
        '#4a90e2',
        '#f7d800',
        '#ff6333',
        '#e35050',
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
          backgroundColor: '#4dc5d3',
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
            stepSize: 25 
          }
        },
      },
    }
  });
}

getChartData();