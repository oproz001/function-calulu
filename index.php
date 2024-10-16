<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fancy Calculator</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/animate-css-animate.css-e8c4fab/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="style/calulu.css">
   
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="calculator-container animate__animated animate__fadeIn">
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

    <script src="style/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('calculatorForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const firstNumber = parseFloat(document.getElementById('firstNumber').value);
            const secondNumber = parseFloat(document.getElementById('secondNumber').value);
            const operator = document.getElementById('operator').value;
            const resultElement = document.getElementById('result');
            const loadingElement = document.querySelector('.loading');

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

                loadingElement.style.display = 'none';
            }, 1000);
        });
    </script>
</body>
</html>