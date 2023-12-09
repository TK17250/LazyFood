<?php require_once '../connect/server.php'; 
require_once '../class/menu_db.php';

    $dbmenu = new Menu_DB;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LazyFood</title>
    <link rel="shortcut icon" href="../data/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../framework/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../framework/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="../dist/css/main.css">
</head>
<body class="wrapper">

    <!-- Header -->
    <?php include_once './component/navbar.php'; ?>

    <!-- Sidebar -->
    <?php include_once './component/sidebar.php'; ?>

    <!-- Content -->
    <div class="content-wrapper">
        
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <!-- Alert -->
                <div>
                    <!-- Error -->
                    <?php include_once './component/error.php' ?>
                    <!-- Succeed -->
                    <?php include_once './component/succeed.php' ?>
                </div>
                <!-- Title -->
                <div >
                    <h3 class="">หน้าหลัก</h3>
                </div>
                <!-- link -->
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./adminpage.php">Home</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Chart 4 -->
                    <div class="col-12 col-md-10 col-lg-6 m-auto">
                        <canvas id="Chart4"></canvas>
                    </div>

                    <!-- Chart 3 -->
                    <div class="col-12 col-md-10 col-lg-6 m-auto">
                        <canvas id="Chart3"></canvas>
                    </div>

                    <!-- Chart 1 -->
                    <div class="col-12 col-md-8 col-lg-6 m-auto">
                        <canvas id="Chart1"></canvas>
                    </div>

                    <!-- Chart 2 -->
                    <div class="col-12 col-md-4 col-lg-3 m-auto">
                        <canvas id="Chart2"></canvas>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <?php include_once './component/footer.php'; ?>

</body>
<script src="../framework/js/jquery.min.js"></script>
<script src="../framework/js/adminlte.min.js"></script>
<script src="../framework/js/bootstrap.bundle.min.js"></script>
<script src="../framework/chart.js"></script>
<script>

    // Chart 1
    function chart1() {
        const ctx = document.getElementById('Chart1');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['อาหาร', 'เครื่องดื่ม', 'ของหวาน'],
                datasets: [{
                    label: 'ราคาเฉลี่ย (บาท)',
                    data: [<?php echo $dbmenu->readmenutypechartaverage('อาหาร'); ?>, <?php echo $dbmenu->readmenutypechartaverage('เครื่องดื่ม'); ?>, <?php echo $dbmenu->readmenutypechartaverage('ของหวาน'); ?>],
                    backgroundColor: [
                        '#ff86a0',
                        '#60bfff',
                        '#feb872',
                    ],
                    borderColor: [
                        '#ff6384',
                        '#35a2eb',
                        '#ff9f3f',
                    ],
                    borderWidth: 3,
                }]
            },

            options: {
                scales: {
                    x: {
                        grid: {
                            display: false,
                        }
                    },
                    y: {
                        display: false,
                    }
                },

                plugins: {
                    legend: {
                        labels: {
                            font: {
                                family: 'IBM',
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'ราคาเฉลี่ยของเมนูแต่ละประเภท',
                        font: {
                            family: 'IBM',
                            size: 20,
                        },
                        padding: {
                            top: 20,
                            bottom: 20,
                        }
                    }
                }
            }
        });
    }

    // Chart 2
    function chart2() {
        const ctx = document.getElementById('Chart2');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['อาหาร', 'เครื่องดื่ม', 'ของหวาน'],
                datasets: [{
                    label: 'จำนวน',
                    data: [<?php echo $dbmenu->readmenutypechart('อาหาร'); ?>, <?php echo $dbmenu->readmenutypechart('เครื่องดื่ม'); ?>, <?php echo $dbmenu->readmenutypechart('ของหวาน'); ?>],
                    borderWidth: 3,
                }]
            },

            options: {
                scales: {
                },

                plugins: {
                    legend: {
                        labels: {
                            font: {
                                family: 'IBM',
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'จำนวนเมนูทั้งหมด',
                        font: {
                            family: 'IBM',
                            size: 20,
                        },
                        padding: {
                            top: 20,
                            bottom: 20,
                        }
                    }
                }
            }
        });
    }

    // Chart 3
    function chart3() {
        const ctx = document.getElementById('Chart3');

        let date = new Date();

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    "วันที่ " + (date.getDate() + 7),
                    "วันที่ " + (date.getDate() + 6),
                    "วันที่ " + (date.getDate() + 5),
                    "วันที่ " + (date.getDate() + 4),
                    "วันที่ " + (date.getDate() + 3),
                    "วันที่ " + (date.getDate() + 2),
                    "วันที่ " + (date.getDate() + 1),
                ],
                datasets: [{
                    label: 'ยอดขาย (บาท)',
                    data: [723458, 234589, 334568, 645342, 456745, 324256, 934053],
                    borderWidth: 3,
                }]
            },

            options: {
                scales: {
                    y: {
                        display: false,
                    },
                    x: {
                        grid: {
                            display: false,
                        }
                    }
                },

                plugins: {
                    legend: {
                        labels: {
                            font: {
                                family: 'IBM',
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'ยอดขายแต่ละวัน',
                        font: {
                            family: 'IBM',
                            size: 20,
                        },
                        padding: {
                            top: 20,
                            bottom: 20,
                        }
                    },
                }
            }
        });
    }

    // Chart 4
    function chart4() {
        const ctx = document.getElementById('Chart4');

        let date = new Date();

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    (date.getHours() - 6) + ":00",
                    (date.getHours() - 5) + ":00",
                    (date.getHours() - 4) + ":00",
                    (date.getHours() - 3) + ":00",
                    (date.getHours() - 2) + ":00",
                    (date.getHours() - 1) + ":00",
                    (date.getHours()) + ":" + (date.getMinutes()),
                ],
                datasets: [{
                    label: 'ยอดขาย (บาท)',
                    data: [8458, 6359, 3358, 6235, 9389, 5924, <?php echo random_int(2000, 10000) ?>],
                    borderWidth: 3,
                    backgroundColor: [
                        '#eb8219',
                    ],
                    borderColor: [
                        '#c06305',
                    ],
                }]
            },

            options: {
                scales: {
                },

                plugins: {
                    legend: {
                        labels: {
                            font: {
                                family: 'IBM',
                                size: 15,
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'ยอดขายวันนี้',
                        font: {
                            family: 'IBM',
                            size: 30,
                        },
                        padding: {
                            top: 20,
                            bottom: 20,
                        }
                    },
                }
            }
        });
    }

    chart1();
    chart2();
    chart3();
    chart4();
</script>
</html>