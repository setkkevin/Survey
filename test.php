<!DOCTYPE html>
<html>
<head>
    <title>Combo Box Example</title>
    <style>
        /* Initially hide the label and input field */
        #label2, #input2 {
            visibility: hidden;
        }
    </style>
    <script>
        function toggleInputVisibility() {
            var combo = document.getElementById("combo");
            var label2 = document.getElementById("label2");
            var input2 = document.getElementById("input2");

            // Check if the first option is selected
            if (combo.value === "option2") {
                label2.style.visibility = "hidden"; // Hide the label
                input2.style.visibility = "hidden"; // Hide the input field
                input2.disabled = true; // Disable the input field
            } else {
                label2.style.visibility = "visible"; // Show the label
                input2.style.visibility = "visible"; // Show the input field
                input2.disabled = false; // Enable the input field
            }
        }
    </script>
</head>
<body>
    <form>
        <label for="input1">Input 1:</label>
        <input type="text" id="input1" name="input1" required="required"><br><br>

        <label for="combo">Choose an option:</label>
        <select id="combo" name="combo" onchange="toggleInputVisibility()">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
        </select><br><br>

        <label for="input2" id="label2">Input 2:</label>
        <input type="text" id="input2" name="input2" required="required"><br><br>
    </form>
</body>
</html>
