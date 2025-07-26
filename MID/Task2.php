<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Bank Management System</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="skyblue-background">
        <div class="header">
            <h1>Bank Management System</h1>
            <h3>Your Trusted Financial Partner</h3>
        </div>

        
        <div class="form-container white-background">
            <h2>Customer Registration Form</h2>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required />
                </div>

                <div class="form-row">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required />
                </div>

                <div class="form-row">
                    <label>Gender:</label>
                    <div class="inline-options">
                        <input type="radio" name="gender" value="Male" required /> Male
                        <input type="radio" name="gender" value="Female" /> Female
                        <input type="radio" name="gender" value="Other" /> Other
                    </div>
                </div>

                <div class="form-row">
                    <label for="marital">Marital Status:</label>
                    <select id="marital" name="marital">
                        <option value="">Select</option>
                        <option value="Married">Married</option>
                        <option value="Single">Single</option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="account">Account Type:</label>
                    <select id="account" name="account">
                        <option value="">Select</option>
                        <option value="Savings">Savings</option>
                        <option value="Current">Current</option>
                        <option value="Fixed Deposit">Fixed Deposit</option>
                        <option value="Recurring Deposit">Recurring Deposit</option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="amount">Initial Deposit Amount:</label>
                    <input type="number" id="amount" name="amount" />
                </div>

                <div class="form-row">
                    <label for="mobile">Mobile Number:</label>
                    <input type="text" id="mobile" name="mobile" />
                </div>

                <div class="form-row">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" />
                </div>

                <div class="form-row">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" rows="2"></textarea>
                </div>

                <div class="form-row">
                    <label for="occupation">Occupation:</label>
                    <input type="text" id="occupation" name="occupation" />
                </div>

                <div class="form-row">
                    <label for="nid">NID:</label>
                    <input type="text" id="nid" name="nid" />
                </div>

                <div class="form-row">
                    <label for="password">Set Password:</label>
                    <input type="password" id="password" name="password" />
                </div>

                <div class="form-row">
                    <label for="idproof">Upload ID Proof:</label>
                    <input type="file" id="idproof" name="idproof" />
                </div>

                <div class="form-row checkbox">
                    <input type="checkbox" id="terms" name="terms" required />
                    <label for="terms">I agree to the terms and conditions</label>
                </div>

                <div class="buttons">
                    <input type="submit" value="Register" />
                    <input type="reset" value="Clear" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>



