<?php headerAdmin($data); ?>
    <main class="app-content">
      <div class="app-title">
          <div>
            <h1><i class="fa fa-dashboard"></i><?= $data['page_title'] ?></h1>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
          </ul>
        </div>
        <div class="row">
          <?php if(!empty($_SESSION['permisos'][2]['r'])) { ?>
          <div class="col-md-6 col-lg-3">
            <a href="<?= base_url() ?>/usuarios" class="linkw">
              <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                  <h4>Usuarios</h4>
                  <p><b><?= $data['usuarios'] ?></b></p>
                </div>
              </div>
            </a>
          </div>
        <?php  } ?>
        <?php if(!empty($_SESSION['permisos'][3]['r'])) { ?>
          <div class="col-md-6 col-lg-3">
            <a href="<?= base_url() ?>/clientes" class="linkw">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-user fa-3x"></i>
              <div class="info">
                <h4>Clientes</h4>
                <p><b><?= $data['clientes'] ?></b></p>
              </div>
            </div>
          </div>
          <?php  } ?>
          <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
          <div class="col-md-6 col-lg-3">
            <a href="<?= base_url() ?>/productos" class="linkw">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-archive fa-3x"></i>
              <div class="info">
                <h4>Productos</h4>
                <p><b><?= $data['productos'] ?></b></p>
              </div>
            </div>
          </div>
          <?php  } ?>
          <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
          <div class="col-md-6 col-lg-3">
            <a href="<?= base_url() ?>/pedidos" class="linkw">
              <div class="widget-small danger coloured-icon"><i class="icon fa fa-shopping-cart fa-3x"></i>
                <div class="info">
                  <h4>Pedidos</h4>
                  <p><b><?= $data['pedidos'] ?></b></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>
      </div>
      <div class="row">
        <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Últimos pedidos</h3>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cliente</th>
                  <th>Estado</th>
                  <th class="text-right">Monto</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if(count($data['lastOrders']) > 0){
                    foreach ($data['lastOrders'] as $pedido) {
                ?>
                <tr>
                  <td><?= $pedido['idpedido'] ?></td>
                  <td><?= $pedido['nombre'] ?></td>
                  <td><?= $pedido['status'] ?></td>
                  <td class="text-right"><?= SMONEY." ".formatMoney($pedido['monto']) ?></td>
                  <td><a href="<?= base_url() ?>/pedidos/orden/<?= $pedido['idpedido'] ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <?php }
                  } ?>
              </tbody>
            </table>
          </div>
        </div>
        <?php  } ?>
        <div class="col-md-6">
          <div class="tile">
            <div class="container-title">
              <h3 class="tile-title">Métodos de pago más usados</h3>
              <div class="dflex">
                <input type="text" class="date-picker pagoMes" name="pagoMes" placeholder="Mes y Año">
                <button type="button" class="btnTipoVentaMes btn btn-info btn-sm" onclick="fntSearchPagos();"> <i class="fas fa-search"></i> </button>
              </div>
            </div>
            <div id="pagosMesAnio"></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="container-title">
              <h3 class="tile-title">Ventas por Mes</h3>
              <div class="dflex">
                <input class="date-picker ventasMes" name="ventasMes" placeholder="Mes y Año">
                <button type="button" class="btnVentasMes btn btn-info btn-sm" onclick="fntSearchVMes();"> <i class="fas fa-search"></i> </button>
              </div>
            </div>
            <div id="graficaMes"></div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="tile">
            <div class="container-title">
              <h3 class="tile-title">Ventas por Año</h3>
              <div class="dflex">
                <input class="ventasAnio" name="ventasAnio" placeholder="Escribe el Año" minlength="4" maxlength="4" onkeypress="return controlTag(event);">
                <button type="button" class="btnVentasAnio btn btn-info btn-sm" onclick="fntSearchVAnio();"> <i class="fas fa-search"></i> </button>
              </div>
            </div>
            <div id="graficaAnio"></div>
          </div>
        </div>
      </div>
    </main>
<?php footerAdmin($data); ?>

<script>
  // Graficos
  Highcharts.chart('pagosMesAnio', {
      chart: {
          type: 'pie'
      },
      title: {
          text: 'Métodos de pago, <?= $data['pagosMes']['mes'].' '.$data['pagosMes']['anio'] ?>'
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
                  foreach ($data['pagosMes']['tipospago'] as $pagos) {
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

  Highcharts.chart('graficaMes', {
      chart: {
          type: 'line'
      },
      title: {
          text: 'Ventas del <?= $data['ventasMDia']['mes'].' '.$data['ventasMDia']['anio'] ?>'
      },
      subtitle: {
        text: 'Los ingresos de este mes son: <?= SMONEY.'. '.formatMoney($data['ventasMDia']['total']) ?>'
      },
      xAxis: {
          categories: [
              <?php 
                foreach ($data['ventasMDia']['ventas'] as $dia) {
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
            foreach ($data['ventasMDia']['ventas'] as $dia) {
              echo $dia['total'].',';
            }
          ?>
        ]
      }]
  });

  Highcharts.chart('graficaAnio', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Ventas del año <?= $data['ventasAnio']['anio'] ?>'
    },
    subtitle: {
        text: 'Estadísitica de ventas por mes.'
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
        pointFormat: 'Ingresos de: <b>{point.y:.1f} MXN</b>'
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
            foreach ($data['ventasAnio']['meses'] as $mes) {
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
    