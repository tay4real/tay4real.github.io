<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuildForSDG Cohor-1 Assessment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <h1>Covid-19 Infections Estimator</h1>	
    </header>

    <div class="wrapper">
        <form method="post" action="json/" class="form">
        <div class="field-prepend">
        <select class="formfield" id="service" name="content-type">
                <option  value="Choose Service" disabled selected>Choose Content Type</option>
                <option  value="json" >JSON</option>
                <option  value="xml" >XML</option>
            </select>
        </div>
        <div class="field-prepend">
            
            <input class="formfield" name="data-population" type="text" placeholder="Population" required>
        </div>
        <div class="field-prepend">
            
            <input  class="formfield" type="text" placeholder="Time to Elapse" name="data-time-to-elapse" required>
        </div>
        <div class="field-prepend">
            
            <input class="formfield" type="text" placeholder="Reported Cases" name="data-reported-cases">
        </div>
        <div class="field-prepend">
            
            <input class="formfield" type="text" placeholder="Total Hospital Beds" name="data-total-hospital-beds">
        </div>
        <div class="field-prepend">
        <select class="formfield" id="service" name="data-period-type">
                <option  value="Choose Service" disabled selected>Data-Period-Type</option>
                <option  value="days" >days</option>
                <option  value="weeks" >weeks</option>
                <option  value="months" >months</option>
            </select>
        </div>
        <div class="field-prepend">
            <input class="btn" type="submit" value="Estimate" name="data-go-estimate">
        </div>
        </form>
    </div>

</body>
</html>

