<?php



if(isset($_POST['data-go-estimate'])){
  $data = [
    "region" => [
      "name"   => "Africa",
      "avgAge" => 19.7,
      "avgDailyIncomeInUSD" => 4,
      "avgDailyIncomePopulation" => 0.73
    ],
    "periodType" => $_POST['data-period-type'],
    "timeToElapse" => $_POST['data-time-to-elapse'],
    "reportedCases" => $_POST['data-reported-cases'],
    "population" => $_POST['data-population'],
    "totalHospitalBeds" => $_POST['data-total-hospital-beds']
  ];
}

function impact($data){


  $currentlyInfected = (int)$data["reportedCases"] * 10;
  $infectionsByRequestedTime = $currentlyInfected * pow(2, (int) ($data["timeToElapse"] / 3));
  $severeCasesByRequestedTime = (int)(0.15 * $infectionsByRequestedTime);
  $hospitalBedsByRequstedTime = (int)(0.35 * $data["totalHospitalBeds"]) - $severeCasesByRequestedTime; 
  $casesForICUByRequestedTime = 0.05 * $infectionsByRequestedTime;
  $casesForVentilatorsByRequestedTime = 0.02 * $infectionsByRequestedTime;
  $dollarsInFlight = (int)(($infectionsByRequestedTime * $data["region"]["avgDailyIncomePopulation"] * $data["region"]["avgDailyIncomeInUSD"]) / $data["timeToElapse"]);

  $impact = [
    "currentlyInfected" => $currentlyInfected,
    "infectionsByRequestedTime" => $infectionsByRequestedTime,
    "severeCasesByRequestedTime" => $severeCasesByRequestedTime,
    "hospitalBedsByRequestedTime" => $hospitalBedsByRequstedTime,
    "casesForICUByRequestedTime" => $casesForICUByRequestedTime,
    "casesForVentilatorsByRequestedTime" => $casesForVentilatorsByRequestedTime,
    "dollarsInFlight" => $dollarsInFlight
  ];
  return $impact;
}

function severeImpact($data){
  $currentlyInfected = (int)$data["reportedCases"] * 50;
  $infectionsByRequestedTime = $currentlyInfected * pow(2, (int) ($data["timeToElapse"] / 3));
  $severeCasesByRequestedTime = 0.15 * $infectionsByRequestedTime;
  $hospitalBedsByRequstedTime = (int)(0.35 * $data["totalHospitalBeds"]) - $severeCasesByRequestedTime; 
  $casesForICUByRequestedTime = 0.05 * $infectionsByRequestedTime;
  $casesForVentilatorsByRequestedTime = 0.02 * $infectionsByRequestedTime;
  $dollarsInFlight = (int)(($infectionsByRequestedTime * $data["region"]["avgDailyIncomePopulation"] * $data["region"]["avgDailyIncomeInUSD"]) / $data["timeToElapse"]);


  $severeImpact = [
    "currentlyInfected" => (int)$data["reportedCases"] * 50,
    "infectionsByRequestedTime" => $infectionsByRequestedTime,
    "severeCasesByRequestedTime" => $severeCasesByRequestedTime,
    "hospitalBedsByRequestedTime" => $hospitalBedsByRequstedTime,
    "casesForICUByRequestedTime" => $casesForICUByRequestedTime,
    "casesForVentilatorsByRequestedTime" => $casesForVentilatorsByRequestedTime,
    "dollarsInFlight" => $dollarsInFlight
  ];
  return $severeImpact;
}

function covid19ImpactEstimator($data)
{
  $impact = impact($data);
  $severeImpact = severeImpact($data);
  $data = [
    "impact" => $impact,
    "severeImpact" => $severeImpact
  ];
  return $data;
}


