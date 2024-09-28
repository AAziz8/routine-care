
    else if (type === 'area') {
        //var obj    = document.getElementById('gradient_area').getContext('2d'),
        var gradient = obj.createLinearGradient(0, 0, 0, 450);

        gradient.addColorStop(0, '#5CC5CD');
        gradient.addColorStop(0.5, '#46b6fe');
        gradient.addColorStop(1, '#3866a6');

        config = {
            type: 'line',
            data: {
                labels: [ 'January', 'February', 'March', 'April', 'May', 'June' ],
                datasets: [{
                        label: 'Custom Label Name',
                        backgroundColor: gradient,
                        pointBackgroundColor: 'white',
                        borderWidth: 1,
                        borderColor: '#3866a6',
                        data: [50, 80, 58, 70, 54, 63]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                animation: {
                    easing: 'easeInOutQuad',
                    duration: 520
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: 'rgba(200, 200, 200, 0.05)',
                            lineWidth: 1
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: 'rgba(200, 200, 200, 0.08)',
                            lineWidth: 1
                        }
                    }]
                },
                elements: {
                    line: {
                        tension: 0.4
                    }
                },
                legend: {
                    display: false
                },
                point: {
                    backgroundColor: 'white'
                },
                tooltips: {
                    titleFontFamily: 'Open Sans',
                    backgroundColor: '#5CC5CD',
                    titleFontColor: 'red',
                    caretSize: 5,
                    cornerRadius: 2,
                    xPadding: 10,
                    yPadding: 10
                }
            }
        }
    }
    else if (type === 'radar') {
        config = {
            type: 'radar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [65, 25, 90, 81, 56, 55, 40],
                    borderColor: 'rgba(102,165,226, 0.8)',
                    backgroundColor: 'rgba(102,165,226, 0.5)',
                    pointBorderColor: 'rgba(102,165,226, 0)',
                    pointBackgroundColor: 'rgba(102,165,226, 0.8)',
                    pointBorderWidth: 1
                }, {
                        label: "My Second dataset",
                        data: [72, 48, 40, 19, 96, 27, 100],
                        borderColor: 'rgba(140,147,154, 0.8)',
                        backgroundColor: 'rgba(140,147,154, 0.5)',
                        pointBorderColor: 'rgba(140,147,154, 0)',
                        pointBackgroundColor: 'rgba(140,147,154, 0.8)',
                        pointBorderWidth: 1
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'pie') {
        config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [150, 53, 121, 87, 45],
                    backgroundColor: [
                        "#515da4",
                        "#9988ff",
                        "#939edc",
                        "#d1d5f0",
                        "#f0f1fa"
                    ],
                }],
                labels: [
                    "Pia A",
                    "Pia B",
                    "Pia C",
                    "Pia D",
                    "Pia E"
                ]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }   
    return config;
}