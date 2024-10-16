<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fancy Calculator</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/animate-css-animate.css-e8c4fab/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="style/calulu.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="calculator-container animate__animated animate__fadeIn">
                <i class="fas fa-times cancel-btn" id="cancelBtn"></i>
                    <h1 class="text-center mb-4 glow">Fancy Calculator</h1>
                    <p class="text-center mb-4">Experience the magic of mathematics with our state-of-the-art calculator. Dive into a world of numbers and operations like never before!</p>
                    <form id="calculatorForm" action="logic/process.php"  method="post"> 
                        <div class="mb-3">
                            <input type="number" class="form-control" id="firstNumber" name="num01" placeholder="Enter first number" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" id="operator" name="operator" required>
                                <option value="">Select operator</option>
                                <option value="+">+</option>
                                <option value="-">-</option>
                                <option value="*">×</option>
                                <option value="/">÷</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="secondNumber" name="num02" placeholder="Enter second number" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-100 glow">Calculate</button>
                    </form>
                    <div id="result" class="result text-center mt-4">
                        <?=isset($_GET['answer']) ? $_GET['answer'] : null?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="loading">
        <div class="loading-content">
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <div class="history-trigger" id="historyTrigger"></div>
    <i class="fas fa-history history-toggle" id="historyToggle"></i>
    <div class="history-panel" id="historyPanel">
        <h3>Calculation History</h3>
        <div id="historyList"></div>
    </div>


    <script src="style/js/bootstrap.bundle.min.js"></script>
    <script>
        const calculatorForm = document.getElementById('calculatorForm');
        const resultElement = document.getElementById('result');
        const loadingElement = document.querySelector('.loading');
        const historyTrigger = document.getElementById('historyTrigger');
        const historyToggle = document.getElementById('historyToggle');
        const historyPanel = document.getElementById('historyPanel');
        const historyList = document.getElementById('historyList');
        const cancelBtn = document.getElementById('cancelBtn');

        let calculationHistory = [];

        calculatorForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const firstNumber = parseFloat(document.getElementById('firstNumber').value);
            const secondNumber = parseFloat(document.getElementById('secondNumber').value);
            const operator = document.getElementById('operator').value;

            loadingElement.style.display = 'block';

            setTimeout(() => {
                let result;
                switch(operator) {
                    case '+':
                        result = firstNumber + secondNumber;
                        break;
                    case '-':
                        result = firstNumber - secondNumber;
                        break;
                    case '*':
                        result = firstNumber * secondNumber;
                        break;
                    case '/':
                        result = firstNumber / secondNumber;
                        break;
                    default:
                        result = 'Invalid operator';
                }

                resultElement.textContent = `Result: ${result}`;
                resultElement.classList.add('animate__animated', 'animate__bounceIn');

                // Add to history
                const calculation = `${firstNumber} ${operator} ${secondNumber} = ${result}`;
                calculationHistory.unshift(calculation);
                updateHistoryPanel();

                loadingElement.style.display = 'none';
            }, 1000);
        });

        historyTrigger.addEventListener('mouseenter', function() {
            historyPanel.classList.add('active');
        });

        historyPanel.addEventListener('mouseleave', function() {
            if (window.innerWidth > 768) {
                historyPanel.classList.remove('active');
            }
        });

        historyToggle.addEventListener('click', function() {
            historyPanel.classList.toggle('active');
        });

        function updateHistoryPanel() {
            historyList.innerHTML = '';
            calculationHistory.forEach(calculation => {
                const historyItem = document.createElement('div');
                historyItem.classList.add('history-item');
                historyItem.textContent = calculation;
                historyList.appendChild(historyItem);
            });
        }

        cancelBtn.addEventListener('click', function() {
            calculatorForm.reset();
            resultElement.textContent = '';
            historyPanel.classList.remove('active');
        });

        // Close history panel when clicking outside of it on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768 && !historyPanel.contains(event.target) && event.target !== historyToggle) {
                historyPanel.classList.remove('active');
            }
        });

        // Adjust behavior on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                historyPanel.classList.remove('active');
            }
        });
    </script>
</body>
</html>