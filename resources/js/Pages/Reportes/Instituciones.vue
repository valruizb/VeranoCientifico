<template>
    <div class="canv">
      <canvas class="chart-canvas" ref="myChart"></canvas>
      <button @click="downloadPDF">Descargar PDF</button>
    </div>
  </template>
  
  <script>
import Chart from 'chart.js/auto';
import jsPDF from 'jspdf';
import 'pdfjs-dist/build/pdf.worker.min.js';


export default {
  props: {
    proyectos: Array
  },
  mounted() {
    const canvas = this.$refs.myChart;
    if (!canvas) {
      console.error('No se encontró el elemento canvas');
      return;
    }

    const institution = this.proyectos.map(project => project.institution);
    const counts = this.proyectos.map(project => project.total);

    const ctx = canvas.getContext('2d');
 
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: institution,
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
      }
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

    pdf.save('grafico.pdf');

// Ocultar el elemento canvas

  }
}
}
</script>
<style>
.canv{
  width: 700px;
  height: 800px;
}
</style>


  