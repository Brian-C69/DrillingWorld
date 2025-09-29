<?php
// Initialize the session
session_start();

// Acessing the session price
$prices = $_SESSION['prices'];

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../includes/headersCal.php'; ?>
        <title>WENCAT Cal 1</title>
        <script src="../wencat.js"></script>
    </head>
    <body>
        <?php include '../includes/navCal.php'; ?> 

        <div class="container my-5 text-center text-black">
            <h1>WBM-SBM-DIF</h1>
        </div>

        <div class="container p-2 my-2">
            <a href="../calculator.php" class="btn btn-primary">Back</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Items</button>
            <button class="btn btn-primary" onclick="window.print()">Print this page</button>
            <a href="WenCat.php" class="btn btn-primary">WenCat</a>
            <a href="WenCatWBM-SBM-DIF.php" class="btn btn-success">WBM-SBM-DIF</a>
            <a href="VolCalWBM-SBM-DIF.php" class="btn btn-primary">Vol Cal WBM-SBM-DIF</a>
            <a href="WenCatWBM-DIF.php" class="btn btn-primary">WBM-DIF</a>
            <a href="VolCalWBM-DIF.php" class="btn btn-primary">Vol Cal WBM-DIF</a>
            <a href="WenCatFormulations.php" class="btn btn-primary">Formulations</a>
        </div>
        

        <div class="container-fluid pt-2 ps-5">
            <div class="row">
                <div class="col-2">
                    <p><b>A. Drilling Parameters</b></p>
                </div>
                <div class="col-1">
                    <p class="text-center"><b>1</b></p>
                </div>
                <div class="col-1">
                    <p class="text-center"><b>1 (if any)</b></p>
                </div>
                <div class="col-1 form-group">
                    <p class="text-center"><b>2</b></p>
                </div>
                <div class="col-1">
                    <p class="text-center"><b>3</b></p>
                </div>
                <div class="col-1">
                    <p class="text-center"><b>4</b></p>
                </div>
                <div class="col-1">
                    <p class="text-center"><b>5</b></p>
                </div>
                <div class="col-1">
                    <p class="text-center"><b>6</b></p>
                </div>
                <div class="col-1">
                    <p class="text-center"><b>7</b></p>
                </div>
                <div class="col-1">
                    <p class="text-center"><b>8</b></p>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Well type</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType1" onchange="calculate1()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType2" onchange="calculate1()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType3" onchange="calculate1()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType4" onchange="calculate1()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType5" onchange="calculate1()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType6" onchange="calculate1()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType7" onchange="calculate1()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType8" onchange="calculate1()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType9" onchange="calculate1()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Water Depth (ft)</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth1" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth2" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth3" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth4" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth5" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth6" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth7" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth8" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth9" min="0" oninput="calculate1()">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Hole Size (inch)</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize1" onchange="calculate1()">
                            <?php include 'HoleSizeOption.php'; ?> 
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize2" onchange="calculate1()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize3" onchange="calculate1()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize4" onchange="calculate1()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize5" onchange="calculate1()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize6" onchange="calculate1()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize7" onchange="calculate1()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize8" onchange="calculate1()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize9" onchange="calculate1()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Mud type</p>
                </div>
                <div class="col-1">
                    <p class="text-center">SPUD MUD</p>
                </div>
                <div class="col-1">
                    <p class="text-center">DKD</p>
                </div>
                <div class="col-1">
                    <p class="text-center">SBM</p>
                </div>
                <div class="col-1">
                    <p class="text-center">SBM</p>
                </div>
                <div class="col-1">
                    <p class="text-center">SBM</p>
                </div>
                <div class="col-1">
                    <p class="text-center">SBM</p>
                </div>
                <div class="col-1">
                    <p class="text-center">DIF</p>
                </div>
                <div class="col-1">
                    <p class="text-center">DIF</p>
                </div>
                <div class="col-1">
                    <p class="text-center">DIF</p>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Mud weight (psi/ft)</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight1" onchange="calculate1()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight2" onchange="calculate1()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight3" onchange="calculate1()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight4" onchange="calculate1()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight5" onchange="calculate1()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight6" onchange="calculate1()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight7" onchange="calculate1()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight8" onchange="calculate1()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight9" onchange="calculate1()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Losses factor (Optional - If required))</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor1" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor2" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor3" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor4" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor5" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor6" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor7" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor8" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor9" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Footage drilled (ft)</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled1" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled2" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled3" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled4" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled5" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled6" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled7" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled8" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled9" min="0" oninput="calculate1()">
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-2">
                    <p><b>Cost per foot drilled (USD/ft)</b></p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled1">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled2">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled3">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled4">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled5">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled6">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled7">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled8">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled9">1</p>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p><b>Total Cost per Section (USD)</b></p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection1">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection2">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection3">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection4">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection5">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection6">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection7">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection8">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection9">1</p>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-2">
                    <p><b>Total Drilling Fluids Cost (USD)</b></p>
                </div>
                <div class="col-1">
                    <p id="totalDrillingFuildsCost1">1</p>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-2">
                    <p><b>Well Clean Up Cost (USD)</b></p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellCleanUp1" onchange="calculate1()">
                            <?php include 'WellCleanUpOption.php'; ?>
                        </select>
                    </div>
                </div>
            </div>

            <br><br>

            <div class="row">
                <div class="col-2">
                    <p><b>B. Completion Parameters</b></p>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Brine Type</p>
                </div>
                <div class="col-1">
                    <p class="text-center">Sodium Chloride</p>
                </div>
                <div class="col-1">
                    <p class="text-center">Potassium Chloride</p>
                </div>
                <div class="col-1">
                    <p class="text-center">Calcium Chloride</p>
                </div>
                <div class="col-1">
                    <p class="text-center">Sodium Bromide</p>
                </div>
                <div class="col-1">
                    <p class="text-center">Calcium Bromide</p>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Brine weight (psi/ft)</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="BrineWeight1" onchange="calculate1()">
                            <?php include 'BrineWeightOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="BrineWeight2" onchange="calculate1()">
                            <?php include 'BrineWeightOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="BrineWeight3" onchange="calculate1()">
                            <?php include 'BrineWeightOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="BrineWeight4" onchange="calculate1()">
                            <?php include 'BrineWeightOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="BrineWeight5" onchange="calculate1()">
                            <?php include 'BrineWeightOption.php'; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Section Footage (ft)</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="SectionFootage1" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="SectionFootage2" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="SectionFootage3" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="SectionFootage4" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="SectionFootage5" min="0" oninput="calculate1()">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Total Hole/Casing Volume (bbls)</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="CasingVolume1" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="CasingVolume2" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="CasingVolume3" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="CasingVolume4" min="0" oninput="calculate1()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="CasingVolume5" min="0" oninput="calculate1()">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Losses factor (Optional - If required)</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor10" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor11" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor12" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor13" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="LossesFactor14" onchange="calculate1()">
                            <?php include 'LossesFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-2">
                    <p><b>Cost per foot (USD/ft)</b></p>
                </div>
                <div class="col-1">
                    <p id="costPerFoot1">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFoot2">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFoot3">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFoot4">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFoot5">1</p>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p><b>Total Cost per Section (USD)</b></p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection10">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection11">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection12">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection13">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection14">1</p>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-2">
                    <p><b>Total Completion Fluids Cost (USD)</b></p>
                </div>
                <div class="col-1">
                    <p id="totalCompletionFluidsCost1">1</p>
                </div>
            </div>

            <br><br>

            <div class="row">
                <div class="col-2">
                    <p><b>TOTAL WELL COST ON FLUIDS (USD)</b></p>
                </div>
                <div class="col-1">
                    <p id="totalWellCostOnFluids1">1</p>
                </div>
            </div>

        </div>
        <br><br>
        <?php include '../includes/footer.php'; ?>
        
        <script>
        // Restore form field values from sessionStorage
        
        var wellTypeValue1 = sessionStorage.getItem('wellTypeValue1') || 'Shallow';
        var wellTypeValue2 = sessionStorage.getItem('wellTypeValue2') || 'Deepwater';
        var wellTypeValue3 = sessionStorage.getItem('wellTypeValue3') || 'Shallow';
        var wellTypeValue4 = sessionStorage.getItem('wellTypeValue4') || 'Shallow';
        var wellTypeValue5 = sessionStorage.getItem('wellTypeValue5') || 'Shallow';
        var wellTypeValue6 = sessionStorage.getItem('wellTypeValue6') || 'Shallow';
        var wellTypeValue7 = sessionStorage.getItem('wellTypeValue7') || 'Shallow';
        var wellTypeValue8 = sessionStorage.getItem('wellTypeValue8') || 'Shallow';
        var wellTypeValue9 = sessionStorage.getItem('wellTypeValue9') || 'Shallow';
        
        var waterDepthValue1 = parseFloat(sessionStorage.getItem('waterDepthValue1')) || 0;
        var waterDepthValue2 = parseFloat(sessionStorage.getItem('waterDepthValue2')) || 0;
        var waterDepthValue3 = parseFloat(sessionStorage.getItem('waterDepthValue3')) || 0;
        var waterDepthValue4 = parseFloat(sessionStorage.getItem('waterDepthValue4')) || 0;
        var waterDepthValue5 = parseFloat(sessionStorage.getItem('waterDepthValue5')) || 0;
        var waterDepthValue6 = parseFloat(sessionStorage.getItem('waterDepthValue6')) || 0;
        var waterDepthValue7 = parseFloat(sessionStorage.getItem('waterDepthValue7')) || 0;
        var waterDepthValue8 = parseFloat(sessionStorage.getItem('waterDepthValue8')) || 0;
        var waterDepthValue9 = parseFloat(sessionStorage.getItem('waterDepthValue9')) || 0;
        
        var holeSizeValue1 = sessionStorage.getItem('holeSizeValue1') || 0;
        var holeSizeValue2 = sessionStorage.getItem('holeSizeValue2') || 0;
        var holeSizeValue3 = sessionStorage.getItem('holeSizeValue3') || 0;
        var holeSizeValue4 = sessionStorage.getItem('holeSizeValue4') || 0;
        var holeSizeValue5 = sessionStorage.getItem('holeSizeValue5') || 0;
        var holeSizeValue6 = sessionStorage.getItem('holeSizeValue6') || 0;
        var holeSizeValue7 = sessionStorage.getItem('holeSizeValue7') || 0;
        var holeSizeValue8 = sessionStorage.getItem('holeSizeValue8') || 0;
        var holeSizeValue9 = sessionStorage.getItem('holeSizeValue9') || 0;
        
        var MudWeightValue1 = sessionStorage.getItem('MudWeightValue1') || 0;
        var MudWeightValue2 = sessionStorage.getItem('MudWeightValue2') || 0;
        var MudWeightValue3 = sessionStorage.getItem('MudWeightValue3') || 0;
        var MudWeightValue4 = sessionStorage.getItem('MudWeightValue4') || 0;
        var MudWeightValue5 = sessionStorage.getItem('MudWeightValue5') || 0;
        var MudWeightValue6 = sessionStorage.getItem('MudWeightValue6') || 0;
        var MudWeightValue7 = sessionStorage.getItem('MudWeightValue7') || 0;
        var MudWeightValue8 = sessionStorage.getItem('MudWeightValue8') || 0;
        var MudWeightValue9 = sessionStorage.getItem('MudWeightValue9') || 0;
        
        var LossesFactorValue1 = parseFloat(sessionStorage.getItem('LossesFactorValue1')) || 0;
        var LossesFactorValue2 = parseFloat(sessionStorage.getItem('LossesFactorValue2')) || 0;
        var LossesFactorValue3 = parseFloat(sessionStorage.getItem('LossesFactorValue3')) || 0;
        var LossesFactorValue4 = parseFloat(sessionStorage.getItem('LossesFactorValue4')) || 0;
        var LossesFactorValue5 = parseFloat(sessionStorage.getItem('LossesFactorValue5')) || 0;
        var LossesFactorValue6 = parseFloat(sessionStorage.getItem('LossesFactorValue6')) || 0;
        var LossesFactorValue7 = parseFloat(sessionStorage.getItem('LossesFactorValue7')) || 0;
        var LossesFactorValue8 = parseFloat(sessionStorage.getItem('LossesFactorValue8')) || 0;
        var LossesFactorValue9 = parseFloat(sessionStorage.getItem('LossesFactorValue9')) || 0;
        
        var LossesFactorValue10 = sessionStorage.getItem('LossesFactorValue10') || 0;
        var LossesFactorValue11 = sessionStorage.getItem('LossesFactorValue11') || 0;
        var LossesFactorValue12 = sessionStorage.getItem('LossesFactorValue12') || 0;
        var LossesFactorValue13 = sessionStorage.getItem('LossesFactorValue13') || 0;
        var LossesFactorValue14 = sessionStorage.getItem('LossesFactorValue14') || 0;
        
        document.getElementById('LossesFactor10').value = LossesFactorValue10;
        document.getElementById('LossesFactor11').value = LossesFactorValue11;
        document.getElementById('LossesFactor12').value = LossesFactorValue12;
        document.getElementById('LossesFactor13').value = LossesFactorValue13;
        document.getElementById('LossesFactor14').value = LossesFactorValue14;
        
        var footageDrilledValue1 = parseFloat(sessionStorage.getItem('footageDrilledValue1')) || 0;
        var footageDrilledValue2 = parseFloat(sessionStorage.getItem('footageDrilledValue2')) || 0;
        var footageDrilledValue3 = parseFloat(sessionStorage.getItem('footageDrilledValue3')) || 0;
        var footageDrilledValue4 = parseFloat(sessionStorage.getItem('footageDrilledValue4')) || 0;
        var footageDrilledValue5 = parseFloat(sessionStorage.getItem('footageDrilledValue5')) || 0;
        var footageDrilledValue6 = parseFloat(sessionStorage.getItem('footageDrilledValue6')) || 0;
        var footageDrilledValue7 = parseFloat(sessionStorage.getItem('footageDrilledValue7')) || 0;
        var footageDrilledValue8 = parseFloat(sessionStorage.getItem('footageDrilledValue8')) || 0;
        var footageDrilledValue9 = parseFloat(sessionStorage.getItem('footageDrilledValue9')) || 0;
        
        var wellCleanUpValue1 = sessionStorage.getItem('wellCleanUpValue1') || 0; 
        
        var BrineWeightValue1 = sessionStorage.getItem('BrineWeightValue1') || 0;
        var BrineWeightValue2 = sessionStorage.getItem('BrineWeightValue2') || 0;
        var BrineWeightValue3 = sessionStorage.getItem('BrineWeightValue3') || 0;
        var BrineWeightValue4 = sessionStorage.getItem('BrineWeightValue4') || 0;
        var BrineWeightValue5 = sessionStorage.getItem('BrineWeightValue5') || 0;
        
        var SectionFootageValue1 = parseFloat(sessionStorage.getItem('SectionFootageValue1')) || 0;
        var SectionFootageValue2 = parseFloat(sessionStorage.getItem('SectionFootageValue2')) || 0;
        var SectionFootageValue3 = parseFloat(sessionStorage.getItem('SectionFootageValue3')) || 0;
        var SectionFootageValue4 = parseFloat(sessionStorage.getItem('SectionFootageValue4')) || 0;
        var SectionFootageValue5 = parseFloat(sessionStorage.getItem('SectionFootageValue5')) || 0;
        
        var CasingVolumeValue1 = parseFloat(sessionStorage.getItem('CasingVolumeValue1')) || 0;
        var CasingVolumeValue2 = parseFloat(sessionStorage.getItem('CasingVolumeValue2')) || 0;
        var CasingVolumeValue3 = parseFloat(sessionStorage.getItem('CasingVolumeValue3')) || 0;
        var CasingVolumeValue4 = parseFloat(sessionStorage.getItem('CasingVolumeValue4')) || 0;
        var CasingVolumeValue5 = parseFloat(sessionStorage.getItem('CasingVolumeValue5')) || 0;
        
        var costPerFootDrilled1 = sessionStorage.getItem('costPerFootDrilledValue1') || 0;
        var costPerFootDrilled2 = sessionStorage.getItem('costPerFootDrilledValue2') || 0;
        var costPerFootDrilled3 = sessionStorage.getItem('costPerFootDrilledValue3') || 0;
        var costPerFootDrilled4 = sessionStorage.getItem('costPerFootDrilledValue4') || 0;
        var costPerFootDrilled5 = sessionStorage.getItem('costPerFootDrilledValue5') || 0;
        var costPerFootDrilled6 = sessionStorage.getItem('costPerFootDrilledValue6') || 0;
        var costPerFootDrilled7 = sessionStorage.getItem('costPerFootDrilledValue7') || 0;
        var costPerFootDrilled8 = sessionStorage.getItem('costPerFootDrilledValue8') || 0;
        var costPerFootDrilled9 = sessionStorage.getItem('costPerFootDrilledValue9') || 0;
        
        
        document.getElementById('waterDepth1').value = waterDepthValue1;
        document.getElementById('waterDepth2').value = waterDepthValue2;
        document.getElementById('waterDepth3').value = waterDepthValue3;
        document.getElementById('waterDepth4').value = waterDepthValue4;
        document.getElementById('waterDepth5').value = waterDepthValue5;
        document.getElementById('waterDepth6').value = waterDepthValue6;
        document.getElementById('waterDepth7').value = waterDepthValue7;
        document.getElementById('waterDepth8').value = waterDepthValue8;
        document.getElementById('waterDepth9').value = waterDepthValue9;
        
        document.getElementById('wellType1').value = wellTypeValue1;
        document.getElementById('wellType2').value = wellTypeValue2;
        document.getElementById('wellType3').value = wellTypeValue3;
        document.getElementById('wellType4').value = wellTypeValue4;
        document.getElementById('wellType5').value = wellTypeValue5;
        document.getElementById('wellType6').value = wellTypeValue6;
        document.getElementById('wellType7').value = wellTypeValue7;
        document.getElementById('wellType8').value = wellTypeValue8;
        document.getElementById('wellType9').value = wellTypeValue9;
        
        document.getElementById('holeSize1').value = holeSizeValue1;
        document.getElementById('holeSize2').value = holeSizeValue2;
        document.getElementById('holeSize3').value = holeSizeValue3;
        document.getElementById('holeSize4').value = holeSizeValue4;
        document.getElementById('holeSize5').value = holeSizeValue5;
        document.getElementById('holeSize6').value = holeSizeValue6;
        document.getElementById('holeSize7').value = holeSizeValue7;
        document.getElementById('holeSize8').value = holeSizeValue8;
        document.getElementById('holeSize9').value = holeSizeValue9;
        
        document.getElementById('MudWeight1').value = MudWeightValue1;
        document.getElementById('MudWeight2').value = MudWeightValue2;
        document.getElementById('MudWeight3').value = MudWeightValue3;
        document.getElementById('MudWeight4').value = MudWeightValue4;
        document.getElementById('MudWeight5').value = MudWeightValue5;
        document.getElementById('MudWeight6').value = MudWeightValue6;
        document.getElementById('MudWeight7').value = MudWeightValue7;
        document.getElementById('MudWeight8').value = MudWeightValue8;
        document.getElementById('MudWeight9').value = MudWeightValue9;
        
        document.getElementById('LossesFactor1').value = LossesFactorValue1;
        document.getElementById('LossesFactor2').value = LossesFactorValue2;
        document.getElementById('LossesFactor3').value = LossesFactorValue3;
        document.getElementById('LossesFactor4').value = LossesFactorValue4;
        document.getElementById('LossesFactor5').value = LossesFactorValue5;
        document.getElementById('LossesFactor6').value = LossesFactorValue6;
        document.getElementById('LossesFactor7').value = LossesFactorValue7;
        document.getElementById('LossesFactor8').value = LossesFactorValue8;
        document.getElementById('LossesFactor9').value = LossesFactorValue9;

        
        document.getElementById('footageDrilled1').value = footageDrilledValue1;
        document.getElementById('footageDrilled2').value = footageDrilledValue2;
        document.getElementById('footageDrilled3').value = footageDrilledValue3;
        document.getElementById('footageDrilled4').value = footageDrilledValue4;
        document.getElementById('footageDrilled5').value = footageDrilledValue5;
        document.getElementById('footageDrilled6').value = footageDrilledValue6;
        document.getElementById('footageDrilled7').value = footageDrilledValue7;
        document.getElementById('footageDrilled8').value = footageDrilledValue8;
        document.getElementById('footageDrilled9').value = footageDrilledValue9;
        
        document.getElementById('wellCleanUp1').value = wellCleanUpValue1;
        
        document.getElementById('BrineWeight1').value = BrineWeightValue1;
        document.getElementById('BrineWeight2').value = BrineWeightValue2;
        document.getElementById('BrineWeight3').value = BrineWeightValue3;
        document.getElementById('BrineWeight4').value = BrineWeightValue4;
        document.getElementById('BrineWeight5').value = BrineWeightValue5;
        
        document.getElementById('SectionFootage1').value = SectionFootageValue1;
        document.getElementById('SectionFootage2').value = SectionFootageValue2;
        document.getElementById('SectionFootage3').value = SectionFootageValue3;
        document.getElementById('SectionFootage4').value = SectionFootageValue4;
        document.getElementById('SectionFootage5').value = SectionFootageValue5;
        
        document.getElementById('CasingVolume1').value = CasingVolumeValue1;
        document.getElementById('CasingVolume2').value = CasingVolumeValue2;
        document.getElementById('CasingVolume3').value = CasingVolumeValue3;
        document.getElementById('CasingVolume4').value = CasingVolumeValue4;
        document.getElementById('CasingVolume5').value = CasingVolumeValue5;
        
        document.getElementById('costPerFootDrilled1').textContent = parseFloat(costPerFootDrilled1).toFixed(2) || '0';
        document.getElementById('costPerFootDrilled2').textContent = parseFloat(costPerFootDrilled2).toFixed(2) || '0';
        document.getElementById('costPerFootDrilled3').textContent = parseFloat(costPerFootDrilled3).toFixed(2) || '0';
        document.getElementById('costPerFootDrilled4').textContent = parseFloat(costPerFootDrilled4).toFixed(2) || '0';
        document.getElementById('costPerFootDrilled5').textContent = parseFloat(costPerFootDrilled5).toFixed(2) || '0';
        document.getElementById('costPerFootDrilled6').textContent = parseFloat(costPerFootDrilled6).toFixed(2) || '0';
        document.getElementById('costPerFootDrilled7').textContent = parseFloat(costPerFootDrilled7).toFixed(2) || '0';
        document.getElementById('costPerFootDrilled8').textContent = parseFloat(costPerFootDrilled8).toFixed(2) || '0';
        document.getElementById('costPerFootDrilled9').textContent = parseFloat(costPerFootDrilled9).toFixed(2) || '0';
        
        
        </script>
    </body>

</html>