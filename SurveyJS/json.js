$(document).ready(function() {
    // Make an AJAX request to getJSON.php
    $.ajax({
      url: 'getJSON.php', // Adjust the path to your getJSON.php script
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        const survey = new Survey.Model(data);
        survey.applyTheme(themeJson);
        survey.onComplete.add(function(sender, options) {
          console.log(JSON.stringify(sender.data, null, 3));
        });
  
        // Optionally, set default data for the survey
        survey.data = {
          "nps-score": 9,
          "promoter-features": ["performance", "ui"]
        };
  
        // Initialize the survey with your HTML element
        $("#surveyElement").Survey({ model: survey });
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
  