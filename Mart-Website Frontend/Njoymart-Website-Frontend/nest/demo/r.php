<!DOCTYPE html>
<html>
<head>
    <title>Multi-Step Registration</title>
    <style>
        .registration-container {
            width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .step {
            width: 33.33%;
            padding: 10px;
            text-align: center;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .step.active {
            background-color: #007bff;
            color: #fff;
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        .buttons {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <div class="steps">
            <div class="step active">Step 1</div>
            <div class="step">Step 2</div>
            <div class="step">Step 3</div>
        </div>
        <form id="registration-form" action="submit.php" method="POST" enctype="multipart/form-data">
            <div class="form-step active" data-step="1">
                <h2>Step 1: Personal Information</h2>
                <label for="personal1">Enter your First Name</label>
                <input type="text" name="personal1" placeholder="Enter your First Name">
                <br><br>
                <label for="personal2">Enter your Last Name</label>
                <input type="text" name="personal2" placeholder="Enter your Last name">
                <br><br>
                <label for="personal3">Enter your Mobile number</label>
                <input type="number" name="personal3" placeholder="Enter your Mobile number">
                <br><br>
                <label for="personal4">Enter your Email Id</label>
                <input type="email" name="email" id="email" placeholder="Enter your Email-ID" autocomplete="off" required>
                <br><br>
                <label for="personal5">Please enter password</label>
                <input type="password" name="personal5" placeholder="password" autocomplete="off">
                <br><br>
                <button type="button" class="next-button">Next</button>
            </div>
            <div class="form-step" data-step="2">
                <h2>Step 2: Contact Details</h2>
                <br>
                <label for="contact3">Please upload your PAN CARD</label>
                <input type="file" accept=".pdf" name="pancard" id="pancard">
                <br><br>
                <label>Address :</label>
                <input type="text" name="address" id="address">
                <br><br>
                <label>City :</label>
                <input type="text" name="city" id="city">
                <br><br>
                <label>State :</label>
                <input type="text" id="state" name="state">
                <br><br>
                <!-- <input type="text" name="contact3" placeholder="Textbox 3"> -->
                <button type="button" class="prev-button">Previous</button>
                <button type="button" class="next-button">Next</button>
            </div>
            <div class="form-step" data-step="3">
                <h2>Step 3: Business Information</h2>
                <label>Product Name</label>
                <input type="text" name="business1" placeholder="Textbox 1">
                <br><br>
                <label>Brand Name</label>
                <input type="text" name="business2" placeholder="Textbox 1">
                <br><br>

                <label>Product Category</label>
                <input type="text" name="business3" placeholder="Textbox 2">
                <br><br><br>
                <button type="button" class="prev-button">Previous</button>
                <button type="submit" class="submit-button">Submit</button>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formSteps = document.querySelectorAll('.form-step');
            const steps = document.querySelectorAll('.step');
            const prevButton = document.querySelectorAll('.prev-button');
            const nextButton = document.querySelectorAll('.next-button');
            const submitButton = document.querySelector('.submit-button');
            let currentStep = 0;

            function showStep(stepIndex) {
                formSteps.forEach((step, index) => {
                    if (index === stepIndex) {
                        step.classList.add('active');
                    } else {
                        step.classList.remove('active');
                    }
                });

                steps.forEach((step, index) => {
                    if (index === stepIndex) {
                        step.classList.add('active');
                    } else {
                        step.classList.remove('active');
                    }
                });

                if (stepIndex === 0) {
                    prevButton[0].style.display = 'none';
                } else {
                    prevButton[0].style.display = 'inline-block';
                }

                if (stepIndex === formSteps.length - 1) {
                    nextButton[2].style.display = 'none';
                    submitButton.style.display = 'inline-block';
                } else {
                    nextButton[2].style.display = 'inline-block';
                    submitButton.style.display = 'none';
                }
            }

            function goToStep(stepIndex) {
                if (stepIndex >= 0 && stepIndex < formSteps.length) {
                    currentStep = stepIndex;
                    showStep(currentStep);
                }
            }

            nextButton.forEach((button, index) => {
                button.addEventListener('click', () => {
                    if (index === 0) {
                        // Check if textboxes in step 1 are completed before proceeding to step 2
                        const personal1 = document.querySelector('input[name=personal1]').value;
                        const personal2 = document.querySelector('input[name=personal2]').value;
                        const personal3 = document.querySelector('input[name=personal3]').value;
                        const personal4 = document.querySelector('input[name=email]').value;
                        const personal5 = document.querySelector('input[name=personal5]').value;
                        
                        if (personal1 && personal2 && personal3 &&
                            email &&
                            personal5) {
                            goToStep(currentStep + 1);
                        } else {
                            alert('Please complete all textboxes in Step 1.');
                        }
                    } else if (index === 1 && currentStep === 1) {
                        goToStep(currentStep + 1);
                    }
                });
            });

            prevButton.forEach((button, index) => {
                button.addEventListener('click', () => {
                    if (index === 0) {
                        goToStep(currentStep - 1);
                    } else if (index === 1 && currentStep === 2) {
                        goToStep(currentStep - 1);
                    }
                });
            });

            document.getElementById('registration-form').addEventListener('submit', function(event) {
                // event.preventDefault();
                // Process form submission or AJAX request here
                // alert('Form submitted successfully!');
                // window.location.href="index.php";
            });

            // Show the initial step
            showStep(currentStep);
        });
    </script>
</body>
</html>
