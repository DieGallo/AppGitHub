<?php
  if($grafica = "tipoPagoMes"){
    $pagosMes = $data;
 ?>
<script>
  Highcharts.chart('pagosMesAnio', {
      chart: {
          type: 'pie'
      },
      title: {
          text: 'Métodos de pago, <?= $pagosMes['mes'].' '.$pagosMes['anio'] ?>'
      },

      accessibility: {
          announceNewData: {
              enabled: true
          },
          point: {
              valueSuffix: 'MXN'
          }
      },

      plotOptions: {
          series: {
              borderRadius: 5,
              dataLabels: [{
                  enabled: true,
                  distance: 15,
                  format: '{point.name}'
              }, {
                  enabled: true,
                  distance: '-30%',
                  filter: {
                      property: 'percentage',
                      operator: '>',
                      value: 5
                  },
                  format: '{point.y:.1f}$',
                  style: {
                      fontSize: '0.9em',
                      textOutline: 'none'
                  }
              }]
          }
      },

      tooltip: {
          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}$</b> MXN<br/>'
      },

      series: [
          {
              name: 'Browsers',
              colorByPoint: true,
              data: [
                <?php 
                  foreach ($pagosMes['tipospago'] as $pagos) {
                    echo "{name:'".$pagos['tipopago']."',y:".$pagos['total']."},";
                  }

                ?>
              ]
          }
      ],
      drilldown: {
          series: [
              {
                  name: 'Chrome',
                  id: 'Chrome',
                  data: [
                      [
                          'v97.0',
                          36.89
                      ],
                      [
                          'v96.0',
                          18.16
                      ],
                      [
                          'v95.0',
                          0.54
                      ],
                      [
                          'v94.0',
                          0.7
                      ],
                      [
                          'v93.0',
                          0.8
                      ],
                      [
                          'v92.0',
                          0.41
                      ],
                      [
                          'v91.0',
                          0.31
                      ],
                      [
                          'v90.0',
                          0.13
                      ],
                      [
                          'v89.0',
                          0.14
                      ],
                      [
                          'v88.0',
                          0.1
                      ],
                      [
                          'v87.0',
                          0.35
                      ],
                      [
                          'v86.0',
                          0.17
                      ],
                      [
                          'v85.0',
                          0.18
                      ],
                      [
                          'v84.0',
                          0.17
                      ],
                      [
                          'v83.0',
                          0.21
                      ],
                      [
                          'v81.0',
                          0.1
                      ],
                      [
                          'v80.0',
                          0.16
                      ],
                      [
                          'v79.0',
                          0.43
                      ],
                      [
                          'v78.0',
                          0.11
                      ],
                      [
                          'v76.0',
                          0.16
                      ],
                      [
                          'v75.0',
                          0.15
                      ],
                      [
                          'v72.0',
                          0.14
                      ],
                      [
                          'v70.0',
                          0.11
                      ],
                      [
                          'v69.0',
                          0.13
                      ],
                      [
                          'v56.0',
                          0.12
                      ],
                      [
                          'v49.0',
                          0.17
                      ]
                  ]
              },
              {
                  name: 'Safari',
                  id: 'Safari',
                  data: [
                      [
                          'v15.3',
                          0.1
                      ],
                      [
                          'v15.2',
                          2.01
                      ],
                      [
                          'v15.1',
                          2.29
                      ],
                      [
                          'v15.0',
                          0.49
                      ],
                      [
                          'v14.1',
                          2.48
                      ],
                      [
                          'v14.0',
                          0.64
                      ],
                      [
                          'v13.1',
                          1.17
                      ],
                      [
                          'v13.0',
                          0.13
                      ],
                      [
                          'v12.1',
                          0.16
                      ]
                  ]
              },
              {
                  name: 'Edge',
                  id: 'Edge',
                  data: [
                      [
                          'v97',
                          6.62
                      ],
                      [
                          'v96',
                          2.55
                      ],
                      [
                          'v95',
                          0.15
                      ]
                  ]
              },
              {
                  name: 'Firefox',
                  id: 'Firefox',
                  data: [
                      [
                          'v96.0',
                          4.17
                      ],
                      [
                          'v95.0',
                          3.33
                      ],
                      [
                          'v94.0',
                          0.11
                      ],
                      [
                          'v91.0',
                          0.23
                      ],
                      [
                          'v78.0',
                          0.16
                      ],
                      [
                          'v52.0',
                          0.15
                      ]
                  ]
              }
          ]
      }
  });
</script>

<?php } ?>
<?php 
  if($grafica = "ventasMes"){
    $ventasMes = $data;
?>

<script>
Highcharts.chart('graficaMes', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Ventas del <?= $ventasMes['mes'].' '.$ventasMes['anio'] ?>'
    },
    subtitle: {
      text: 'Los ingresos de este mes son: <?= SMONEY.'. '.formatMoney($ventasMes['total']) ?>'
    },
    xAxis: {
        categories: [
            <?php 
              foreach ($ventasMes['ventas'] as $dia) {
                echo $dia['dia'].',';
            }
          ?>
        ]
    },
    yAxis: {
        title: {
            text: ''
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Ingresos del Mes',
        data: [
        <?php 
          foreach ($ventasMes['ventas'] as $dia) {
            echo $dia['total'].',';
          }
        ?>
      ]
    }]
});

</script>

<?php } ?>

<?php 
  if($grafica = "ventasAnio"){
    $ventasAnio = $data;
?>

<script>
Highcharts.chart('graficaAnio', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Ventas del año <?= $ventasAnio['anio'] ?>'
    },
    subtitle: {
        text: 'Estadísitica de ventas por Año.'
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Ingresos de: <b>{point.y:.1f} MXN por Año</b>'
    },
    series: [{
        name: '',
        colors: [
            '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
            '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5', '#3e5ccf',
            '#3667c9', '#2f72c3', '#277dbd', '#1f88b7', '#1693b1', '#0a9eaa',
            '#03c69b',  '#00f194'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
          <?php 
            foreach ($ventasAnio['meses'] as $mes) {
              echo "['".$mes['mes']."',".$mes['venta']."],";
            }
          ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
  });
</script>

<?php } ?>