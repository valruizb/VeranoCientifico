<template>
    <div>
      <canvas ref="myChart"></canvas>
      <button @click="downloadPDF">Descargar PDF</button>
    </div>
  </template>
  
  <script>
import Chart from 'chart.js/auto';
import jsPDF from 'jspdf';


export default {
  props: {
    proyectos: Array
  },
  mounted() {
    Chart.defaults.font.size = 15;
    const canvas = this.$refs.myChart;
    if (!canvas) {
      console.error('No se encontró el elemento canvas');
      return;
    }

    const thematic_name = this.proyectos.map(project => project.thematic_name);
    const counts = this.proyectos.map(project => project.total);

    

    const ctx = canvas.getContext('2d');
 
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: thematic_name,
        datasets: [{
          label: 'Proyectos por tema',
          data: counts,
          backgroundColor: [
            'rgba(5, 242, 205, 0.8)',
            'rgba(220, 34, 121, 0.8)',
            'rgba(11, 241, 14, 0.8)',
            'rgba(245, 183, 8, 0.8)',
            'rgba(154, 8, 245, 0.8)',
            'rgba(245, 25, 8, 0.8)',
            'rgba(2, 4, 188, 0.8)'
          ],

          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            type: 'linear',
            ticks: {
            stepSize: 1
            }
          },
          x: {
            ticks: {
            autoSkip: false,
            maxRotation: 90,
            minRotation: 90
            }
          }
        },
        plugins: {
          labels: {
            render: 'percentage', // Muestra el porcentaje
            precision: 0, // Sin decimales
            fontColor: '#fff', // Color de las etiquetas
            fontSize: 16 // Tamaño de fuente de las etiquetas
          }
      }}
    });
  },
methods: {
  downloadPDF() {
    // Obtener el canvas y crear la imagen en base64
    const canvas = this.$refs.myChart;
    const dataURL = canvas.toDataURL('image/png');

    // Crear un objeto jsPDF
    const pdf = new jsPDF({
      orientation: 'landscape'
    });

    // Agregar la imagen del gráfico al documento PDF
    pdf.addImage(dataURL, 'PNG', 0, 0,297, 210);

    // Descargar el documento PDF
    pdf.save('grafico.pdf');
  }
}

}
</script>

  