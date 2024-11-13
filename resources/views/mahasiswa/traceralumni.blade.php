@extends('components.layouts.fe')
@section('import_js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection
@section('content')
    <!--
                        Install the "flowbite-typography" NPM package to apply styles and format the article content:

                        URL: https://flowbite.com/docs/components/typography/
                        -->
    <main class="pt-8 pb-16 antialiased bg-white lg:pt-16 lg:pb-24 dark:bg-gray-900">
        <div class="flex justify-between max-w-screen-xl px-4 mx-auto ">
            <article
                class="w-full max-w-2xl mx-auto format format-sm sm:format-base lg:format-lg format-blue dark:format-invert dark:text-white">
                <header class="mb-4 lg:mb-6 not-format">
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        Tracer Mahasiswa</h1>
                </header>
                <div class="flex flex-wrap gap-4">
                    <div class="w-full max-w-sm p-4 bg-white rounded-lg shadow dark:bg-gray-200 md:p-6">

                        <div class="flex justify-between mb-3">
                            <div class="flex items-center justify-center">
                                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-dark-500 pe-1">Lulusan
                                    Terlacak
                                </h5>

                            </div>
                            <div>

                            </div>
                        </div>


                        <!-- Donut Chart -->
                        <div class="py-6" id="donut-chart-jl"></div>


                    </div>


                    <div class="w-full max-w-sm p-4 bg-white rounded-lg shadow dark:bg-gray-200 md:p-6">

                        <div class="flex justify-between mb-3">
                            <div class="flex items-center justify-center">
                                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-dark-500 pe-1">Waktu
                                    Tunggu (Bulan)
                                </h5>

                            </div>
                            <div>

                            </div>
                        </div>


                        <!-- Donut Chart -->
                        <div class="py-6" id="donut-chart-wt"></div>


                    </div>


                    <div class="w-full max-w-sm p-4 bg-white rounded-lg shadow dark:bg-gray-200 md:p-6">

                        <div class="flex justify-between mb-3">
                            <div class="flex items-center justify-center">
                                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-dark-500 pe-1">Ruang
                                    Lingkup Pekerjaan
                                </h5>

                            </div>
                            <div>

                            </div>
                        </div>


                        <!-- Donut Chart -->
                        <div class="py-6" id="donut-chart-lk"></div>


                    </div>


                    <div class="w-full max-w-sm p-4 bg-white rounded-lg shadow dark:bg-gray-200 md:p-6">

                        <div class="flex justify-between mb-3">
                            <div class="flex items-center justify-center">
                                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-dark-500 pe-1">Profesi
                                    Bidang
                                </h5>

                            </div>
                            <div>

                            </div>
                        </div>


                        <!-- Donut Chart -->
                        <div class="py-6" id="donut-chart-bk"></div>


                    </div>

                </div>
            </article>



        </div>
    </main>
@endsection

@section('script')
    <script>
        // Mengambil data jumlah lulusan berdasarkan tahun lulus
        const lcountByYear = @json($json_jlulusan);

        // Buat data series dari countByYear
        const lseriesData = Object.values(lcountByYear);

        // Buat label dari tahun lulus
        const llabelsData = Object.keys(lcountByYear);

        // Tetapkan warna dinamis untuk setiap tahun
        const lcolorsData = llabelsData.map((_, index) => {
            // Warna bisa disesuaikan; ini hanya contoh warna gradient
            const colors = ["#1C64F2", "#16BDCA", "#FDBA8C", "#A3E635", "#F87171"];
            return colors[index % colors.length]; // Loop warna jika tahun lebih dari jumlah warna
        });

        const getChartOptionsJL = () => {
            return {
                series: lseriesData,
                colors: lcolorsData,
                chart: {
                    height: 320,
                    width: "100%",
                    type: "donut",
                },
                stroke: {
                    colors: ["transparent"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: 20,
                                },
                                total: {
                                    showAlways: true,
                                    show: true,
                                    label: "Lulusan Terlacak",
                                    fontFamily: "Inter, sans-serif",
                                    formatter: function(w) {
                                        const sum = w.globals.seriesTotals.reduce((a, b) => {
                                            return a + b
                                        }, 0)
                                        return sum
                                    },
                                },
                                value: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: -20,
                                    formatter: function(value) {
                                        return value
                                    },
                                },
                            },
                            size: "80%",
                        },
                    },
                },
                grid: {
                    padding: {
                        top: -2,
                    },
                },
                labels: llabelsData,
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + " Orang"
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + " Orang"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("donut-chart-jl") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("donut-chart-jl"), getChartOptionsJL());
            chart.render();


        }


        // Mengambil data jumlah lulusan berdasarkan tahun lulus
        const wcountByYear = @json($json_waktutunggu);

        // Buat data series dari countByYear
        const wseriesData = Object.values(wcountByYear);

        // Buat label dari tahun lulus
        const wlabelsData = Object.keys(wcountByYear);

        // Tetapkan warna dinamis untuk setiap tahun
        const wcolorsData = wlabelsData.map((_, index) => {
            // Warna bisa disesuaikan; ini hanya contoh warna gradient
            const colors = ["#1C64F2", "#16BDCA", "#FDBA8C", "#A3E635", "#F87171"];
            return colors[index % colors.length]; // Loop warna jika tahun lebih dari jumlah warna
        });

        const getChartOptionsWT = () => {
            return {
                series: wseriesData,
                colors: lcolorsData,
                chart: {
                    height: 320,
                    width: "100%",
                    type: "donut",
                },
                stroke: {
                    colors: ["transparent"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: 20,
                                },
                                total: {
                                    showAlways: true,
                                    show: true,
                                    label: "Bulan",
                                    fontFamily: "Inter, sans-serif",
                                    formatter: function(w) {
                                        const sum = w.globals.seriesTotals.reduce((a, b) => {
                                            return a + b
                                        }, 0)
                                        const avg = sum / w.globals.seriesTotals.length;  // Hitung rata-rata
                                return avg.toFixed(2);  // Menampilkan rata-rata dengan 2 angka desimal
                                    },
                                },
                                value: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: -20,
                                    formatter: function(value) {
                                        return value
                                    },
                                },
                            },
                            size: "80%",
                        },
                    },
                },
                grid: {
                    padding: {
                        top: -2,
                    },
                },
                labels: wlabelsData,
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + " Bulan"
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + " Bulan"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("donut-chart-wt") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("donut-chart-wt"), getChartOptionsWT());
            chart.render();


        }


        const getChartOptionsLK = () => {
            return {
                series: [{{ $l_multinasional }}, {{ $l_nasional }}, {{ $l_wirausaha }}],
                colors: ["#1C64F2", "#16BDCA", "#FDBA8C"],
                chart: {
                    height: 320,
                    width: "100%",
                    type: "donut",
                },
                stroke: {
                    colors: ["transparent"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: 20,
                                },
                                total: {
                                    showAlways: true,
                                    show: true,
                                    label: "Lingkup Kerja",
                                    fontFamily: "Inter, sans-serif",
                                    formatter: function(w) {
                                        const sum = w.globals.seriesTotals.reduce((a, b) => {
                                            return a + b
                                        }, 0)
                                        return sum
                                    },
                                },
                                value: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: -20,
                                    formatter: function(value) {
                                        return value
                                    },
                                },
                            },
                            size: "80%",
                        },
                    },
                },
                grid: {
                    padding: {
                        top: -2,
                    },
                },
                labels: ["Multi Nasional/Internasional", "Nasional", "Wirausaha"],
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + " Orang"
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + " Orang"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("donut-chart-lk") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("donut-chart-lk"), getChartOptionsLK());
            chart.render();


        }

        const getChartOptionsBK = () => {
            return {
                series: [{{ $b_infokom }}, {{ $b_noninfokom }}],
                colors: ["#1C64F2", "#FDBA8C"],
                chart: {
                    height: 320,
                    width: "100%",
                    type: "donut",
                },
                stroke: {
                    colors: ["transparent"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: 20,
                                },
                                total: {
                                    showAlways: true,
                                    show: true,
                                    label: "Profesi Bidang",
                                    fontFamily: "Inter, sans-serif",
                                    formatter: function(w) {
                                        const sum = w.globals.seriesTotals.reduce((a, b) => {
                                            return a + b
                                        }, 0)
                                        return sum
                                    },
                                },
                                value: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: -20,
                                    formatter: function(value) {
                                        return value
                                    },
                                },
                            },
                            size: "80%",
                        },
                    },
                },
                grid: {
                    padding: {
                        top: -2,
                    },
                },
                labels: ["Profesi Bidang Infokom", "Profesi Bidang Non Infokom"],
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + " Orang"
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + " Orang"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("donut-chart-bk") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("donut-chart-bk"), getChartOptionsBK());
            chart.render();


        }
    </script>
@endsection
