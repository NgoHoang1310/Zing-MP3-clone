const chartLine = () => {
  const ctx = document.getElementById('myChart');
  const xValues = ['16:00', '18:00', '20:00', '22:00', '00:00', '02:00', '04:00', '06:00', '08:00', '10:00', '12:00', '14:00'];
  
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: xValues ,
      datasets: [{
        label: 'Anh chưa thương em đến vậy đâu',
        data: [5, 6, 8, 4, 3, 3, 9, 11, 9, 13, 14, 12],
        borderColor:'#4a90e2',
        // tension: 0.4
      },
      {
        label: 'Chưa quên người yêu cũ',
        data: [3, 5, 6, 8, 10, 7, 9, 9, 8, 11, 9, 10],
        borderColor:'#238f7b',
        tension: 0.4
      },
      {
        label: 'At my worst',
        data: [6, 7, 8, 3, 5, 8, 9, 7, 9, 10, 14, 11],
        borderColor:'#e35050',
        tension: 0.4
      }
    ]
    },
    options: {
      interaction: {
        intersect: false,
        mode: 'index',
      },
      plugins: {
        title: {
          display: true,
          text: (ctx) => 'Tooltip position mode: ' + ctx.chart.options.plugins.tooltip.position,
        },
      }
    }
  });
  console.log('hello chart');
}
chartLine();
