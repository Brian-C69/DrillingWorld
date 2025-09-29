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
        <title>WBM-DIF</title>
        <script src="../wencat.js"></script>
    </head>
    <body>
        <?php include '../includes/navCal.php'; ?> 

        <div class="container my-5 text-center text-black">
            <h1>WBM-DIF</h1>
        </div>

        <div class="container p-2 my-2">
            <a href="../calculator.php" class="btn btn-primary">Back</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Items</button>
            <button class="btn btn-primary" onclick="window.print()">Print this page</button>
            <a href="WenCat.php" class="btn btn-primary">WenCat</a>
            <a href="WenCatWBM-SBM-DIF.php" class="btn btn-primary">WBM-SBM-DIF</a>
            <a href="VolCalWBM-SBM-DIF.php" class="btn btn-primary">Vol Cal WBM-SBM-DIF</a>
            <a href="WenCatWBM-DIF.php" class="btn btn-success">WBM-DIF</a>
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
                        <select class="form-control text-center" id="wellType10" onchange="calculate3()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType11" onchange="calculate3()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType12" onchange="calculate3()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType13" onchange="calculate3()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType14" onchange="calculate3()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType15" onchange="calculate3()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType16" onchange="calculate3()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType17" onchange="calculate3()">
                            <option value="Shallow">Shallow</option>
                            <option value="Deepwater">Deepwater</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellType18" onchange="calculate3()">
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
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth10" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth11" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth12" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth13" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth14" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth15" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth16" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth17" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="waterDepth18" min="0" oninput="calculate3()">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Hole Size (inch)</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize10" onchange="calculate3()">
                            <?php include 'HoleSizeOption.php'; ?> 
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize11" onchange="calculate3()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize12" onchange="calculate3()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize13" onchange="calculate3()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize14" onchange="calculate3()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize15" onchange="calculate3()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize16" onchange="calculate3()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize17" onchange="calculate3()">
                            <?php include 'HoleSizeOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="holeSize18" onchange="calculate3()">
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
                        <select class="form-control text-center" id="MudWeight10" onchange="calculate3()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight11" onchange="calculate3()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight12" onchange="calculate3()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight13" onchange="calculate3()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight14" onchange="calculate3()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight15" onchange="calculate3()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight16" onchange="calculate3()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight17" onchange="calculate3()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="MudWeight18" onchange="calculate3()">
                            <?php include 'MudWeightSelectOption.php'; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Dilution factor (Optional - If required))</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor1" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor2" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor3" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor4" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor5" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor6" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor7" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor8" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor9" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
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
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled10" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled11" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled12" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled13" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled14" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled15" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled16" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled17" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="footageDrilled18" min="0" oninput="calculate3()">
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-2">
                    <p><b>Cost per foot drilled (USD/ft)</b></p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled10">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled11">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled12">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled13">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled14">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled15">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled16">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled17">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFootDrilled18">1</p>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p><b>Total Cost per Section (USD)</b></p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection15">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection16">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection17">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection18">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection19">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection20">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection21">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection22">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection23">1</p>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-2">
                    <p><b>Total Drilling Fluids Cost (USD)</b></p>
                </div>
                <div class="col-1">
                    <p id="totalDrillingFuildsCost2">1</p>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-2">
                    <p><b>Well Clean Up Cost (USD)</b></p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="wellCleanUp2" onchange="calculate3()">
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
                        <select class="form-control text-center" id="BrineWeight6" onchange="calculate3()">
                            <?php include 'BrineWeightOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="BrineWeight7" onchange="calculate3()">
                            <?php include 'BrineWeightOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="BrineWeight8" onchange="calculate3()">
                            <?php include 'BrineWeightOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="BrineWeight9" onchange="calculate3()">
                            <?php include 'BrineWeightOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="BrineWeight10" onchange="calculate3()">
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
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="SectionFootage6" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="SectionFootage7" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="SectionFootage8" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="SectionFootage9" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="SectionFootage10" min="0" oninput="calculate3()">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Total Hole/Casing Volume (bbls)</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="CasingVolume6" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="CasingVolume7" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="CasingVolume8" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="CasingVolume9" min="0" oninput="calculate3()">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="CasingVolume10" min="0" oninput="calculate3()">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Dilution factor (Optional - If required)</p>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor10" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor11" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor12" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor13" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <select class="form-control text-center" id="DilutionFactor14" onchange="calculate3()">
                            <?php include 'DilutionFactorOption.php'; ?>
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
                    <p id="costPerFoot6">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFoot7">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFoot8">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFoot9">1</p>
                </div>
                <div class="col-1">
                    <p id="costPerFoot10">1</p>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p><b>Total Cost per Section (USD)</b></p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection24">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection25">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection26">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection27">1</p>
                </div>
                <div class="col-1">
                    <p id="totalCostPerSection28">1</p>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-2">
                    <p><b>Total Completion Fluids Cost (USD)</b></p>
                </div>
                <div class="col-1">
                    <p id="totalCompletionFluidsCost2">1</p>
                </div>
            </div>

            <br><br>

            <div class="row">
                <div class="col-2">
                    <p><b>TOTAL WELL COST ON FLUIDS (USD)</b></p>
                </div>
                <div class="col-1">
                    <p id="totalWellCostOnFluids2">1</p>
                </div>
            </div>

        </div>
        <br><br>
        <?php include '../includes/footer.php'; ?>
        
        <script>
        // Restore form field values from sessionStorage
        var wellTypeValue10 = sessionStorage.getItem('wellTypeValue10') || 'Shallow';
        var wellTypeValue11 = sessionStorage.getItem('wellTypeValue11') || 'Deepwater';
        var wellTypeValue12 = sessionStorage.getItem('wellTypeValue12') || 'Shallow';
        var wellTypeValue13 = sessionStorage.getItem('wellTypeValue13') || 'Shallow';
        var wellTypeValue14 = sessionStorage.getItem('wellTypeValue14') || 'Shallow';
        var wellTypeValue15 = sessionStorage.getItem('wellTypeValue15') || 'Shallow';
        var wellTypeValue16 = sessionStorage.getItem('wellTypeValue16') || 'Shallow';
        var wellTypeValue17 = sessionStorage.getItem('wellTypeValue17') || 'Shallow';
        var wellTypeValue18 = sessionStorage.getItem('wellTypeValue18') || 'Shallow';
        
        var waterDepthValue10 = parseFloat(sessionStorage.getItem('waterDepthValue10')) || 0;
        var waterDepthValue11 = parseFloat(sessionStorage.getItem('waterDepthValue11')) || 0;
        var waterDepthValue12 = parseFloat(sessionStorage.getItem('waterDepthValue12')) || 0;
        var waterDepthValue13 = parseFloat(sessionStorage.getItem('waterDepthValue13')) || 0;
        var waterDepthValue14 = parseFloat(sessionStorage.getItem('waterDepthValue14')) || 0;
        var waterDepthValue15 = parseFloat(sessionStorage.getItem('waterDepthValue15')) || 0;
        var waterDepthValue16 = parseFloat(sessionStorage.getItem('waterDepthValue16')) || 0;
        var waterDepthValue17 = parseFloat(sessionStorage.getItem('waterDepthValue17')) || 0;
        var waterDepthValue18 = parseFloat(sessionStorage.getItem('waterDepthValue18')) || 0;
        
        var holeSizeValue10 = sessionStorage.getItem('holeSizeValue10') || 0;
        var holeSizeValue11 = sessionStorage.getItem('holeSizeValue11') || 0;
        var holeSizeValue12 = sessionStorage.getItem('holeSizeValue12') || 0;
        var holeSizeValue13 = sessionStorage.getItem('holeSizeValue13') || 0;
        var holeSizeValue14 = sessionStorage.getItem('holeSizeValue14') || 0;
        var holeSizeValue15 = sessionStorage.getItem('holeSizeValue15') || 0;
        var holeSizeValue16 = sessionStorage.getItem('holeSizeValue16') || 0;
        var holeSizeValue17 = sessionStorage.getItem('holeSizeValue17') || 0;
        var holeSizeValue18 = sessionStorage.getItem('holeSizeValue18') || 0;
        
        var MudWeightValue10 = sessionStorage.getItem('MudWeightValue10') || 0;
        var MudWeightValue11 = sessionStorage.getItem('MudWeightValue11') || 0;
        var MudWeightValue12 = sessionStorage.getItem('MudWeightValue12') || 0;
        var MudWeightValue13 = sessionStorage.getItem('MudWeightValue13') || 0;
        var MudWeightValue14 = sessionStorage.getItem('MudWeightValue14') || 0;
        var MudWeightValue15 = sessionStorage.getItem('MudWeightValue15') || 0;
        var MudWeightValue16 = sessionStorage.getItem('MudWeightValue16') || 0;
        var MudWeightValue17 = sessionStorage.getItem('MudWeightValue17') || 0;
        var MudWeightValue18 = sessionStorage.getItem('MudWeightValue18') || 0;
        
        var DilutionFactorValue1 = parseFloat(sessionStorage.getItem('DilutionFactorValue1')) || 0;
        var DilutionFactorValue2 = parseFloat(sessionStorage.getItem('DilutionFactorValue2')) || 0;
        var DilutionFactorValue3 = parseFloat(sessionStorage.getItem('DilutionFactorValue3')) || 0;
        var DilutionFactorValue4 = parseFloat(sessionStorage.getItem('DilutionFactorValue4')) || 0;
        var DilutionFactorValue5 = parseFloat(sessionStorage.getItem('DilutionFactorValue5')) || 0;
        var DilutionFactorValue6 = parseFloat(sessionStorage.getItem('DilutionFactorValue6')) || 0;
        var DilutionFactorValue7 = parseFloat(sessionStorage.getItem('DilutionFactorValue7')) || 0;
        var DilutionFactorValue8 = parseFloat(sessionStorage.getItem('DilutionFactorValue8')) || 0;
        var DilutionFactorValue9 = parseFloat(sessionStorage.getItem('DilutionFactorValue9')) || 0;
        
        var DilutionFactorValue10 = sessionStorage.getItem('DilutionFactorValue10') || 0;
        var DilutionFactorValue11 = sessionStorage.getItem('DilutionFactorValue11') || 0;
        var DilutionFactorValue12 = sessionStorage.getItem('DilutionFactorValue12') || 0;
        var DilutionFactorValue13 = sessionStorage.getItem('DilutionFactorValue13') || 0;
        var DilutionFactorValue14 = sessionStorage.getItem('DilutionFactorValue14') || 0;
        
        var footageDrilledValue10 = parseFloat(sessionStorage.getItem('footageDrilledValue10')) || 0;
        var footageDrilledValue11 = parseFloat(sessionStorage.getItem('footageDrilledValue11')) || 0;
        var footageDrilledValue12 = parseFloat(sessionStorage.getItem('footageDrilledValue12')) || 0;
        var footageDrilledValue13 = parseFloat(sessionStorage.getItem('footageDrilledValue13')) || 0;
        var footageDrilledValue14 = parseFloat(sessionStorage.getItem('footageDrilledValue14')) || 0;
        var footageDrilledValue15 = parseFloat(sessionStorage.getItem('footageDrilledValue15')) || 0;
        var footageDrilledValue16 = parseFloat(sessionStorage.getItem('footageDrilledValue16')) || 0;
        var footageDrilledValue17 = parseFloat(sessionStorage.getItem('footageDrilledValue17')) || 0;
        var footageDrilledValue18 = parseFloat(sessionStorage.getItem('footageDrilledValue18')) || 0;
        
        var wellCleanUpValue2 = sessionStorage.getItem('wellCleanUpValue2') || 0; 
        
        var BrineWeightValue6 = sessionStorage.getItem('BrineWeightValue6') || 0;
        var BrineWeightValue7 = sessionStorage.getItem('BrineWeightValue7') || 0;
        var BrineWeightValue8 = sessionStorage.getItem('BrineWeightValue8') || 0;
        var BrineWeightValue9 = sessionStorage.getItem('BrineWeightValue9') || 0;
        var BrineWeightValue10 = sessionStorage.getItem('BrineWeightValue10') || 0;
        
        var SectionFootageValue6 = parseFloat(sessionStorage.getItem('SectionFootageValue6'));
        var SectionFootageValue7 = parseFloat(sessionStorage.getItem('SectionFootageValue7'));
        var SectionFootageValue8 = parseFloat(sessionStorage.getItem('SectionFootageValue8'));
        var SectionFootageValue9 = parseFloat(sessionStorage.getItem('SectionFootageValue9'));
        var SectionFootageValue10 = parseFloat(sessionStorage.getItem('SectionFootageValue10'));
        
        var CasingVolumeValue6 = parseFloat(sessionStorage.getItem('CasingVolumeValue6')) || 0;
        var CasingVolumeValue7 = parseFloat(sessionStorage.getItem('CasingVolumeValue7')) || 0;
        var CasingVolumeValue8 = parseFloat(sessionStorage.getItem('CasingVolumeValue8')) || 0;
        var CasingVolumeValue9 = parseFloat(sessionStorage.getItem('CasingVolumeValue9')) || 0;
        var CasingVolumeValue10 = parseFloat(sessionStorage.getItem('CasingVolumeValue10')) || 0;
        
        var costPerFootDrilledValue10 = sessionStorage.getItem('costPerFootDrilledValue10') || 0;
        var costPerFootDrilledValue11 = sessionStorage.getItem('costPerFootDrilledValue11') || 0;
        var costPerFootDrilledValue12 = sessionStorage.getItem('costPerFootDrilledValue12') || 0;
        var costPerFootDrilledValue13 = sessionStorage.getItem('costPerFootDrilledValue13') || 0;
        var costPerFootDrilledValue14 = sessionStorage.getItem('costPerFootDrilledValue14') || 0;
        var costPerFootDrilledValue15 = sessionStorage.getItem('costPerFootDrilledValue15') || 0;
        var costPerFootDrilledValue16 = sessionStorage.getItem('costPerFootDrilledValue16') || 0;
        var costPerFootDrilledValue17 = sessionStorage.getItem('costPerFootDrilledValue17') || 0;
        var costPerFootDrilledValue18 = sessionStorage.getItem('costPerFootDrilledValue18') || 0;
        

        document.getElementById('waterDepth10').value = waterDepthValue10;
        document.getElementById('waterDepth11').value = waterDepthValue11;
        document.getElementById('waterDepth12').value = waterDepthValue12;
        document.getElementById('waterDepth13').value = waterDepthValue13;
        document.getElementById('waterDepth14').value = waterDepthValue14;
        document.getElementById('waterDepth15').value = waterDepthValue15;
        document.getElementById('waterDepth16').value = waterDepthValue16;
        document.getElementById('waterDepth17').value = waterDepthValue17;
        document.getElementById('waterDepth18').value = waterDepthValue18;
        
        document.getElementById('wellType10').value = wellTypeValue10;
        document.getElementById('wellType11').value = wellTypeValue11;
        document.getElementById('wellType12').value = wellTypeValue12;
        document.getElementById('wellType13').value = wellTypeValue13;
        document.getElementById('wellType14').value = wellTypeValue14;
        document.getElementById('wellType15').value = wellTypeValue15;
        document.getElementById('wellType16').value = wellTypeValue16;
        document.getElementById('wellType17').value = wellTypeValue17;
        document.getElementById('wellType18').value = wellTypeValue18;
        
        document.getElementById('holeSize10').value = holeSizeValue10;
        document.getElementById('holeSize11').value = holeSizeValue11;
        document.getElementById('holeSize12').value = holeSizeValue12;
        document.getElementById('holeSize13').value = holeSizeValue13;
        document.getElementById('holeSize14').value = holeSizeValue14;
        document.getElementById('holeSize15').value = holeSizeValue15;
        document.getElementById('holeSize16').value = holeSizeValue16;
        document.getElementById('holeSize17').value = holeSizeValue17;
        document.getElementById('holeSize18').value = holeSizeValue18;
        
        document.getElementById('MudWeight10').value = MudWeightValue10;
        document.getElementById('MudWeight11').value = MudWeightValue11;
        document.getElementById('MudWeight12').value = MudWeightValue12;
        document.getElementById('MudWeight13').value = MudWeightValue13;
        document.getElementById('MudWeight14').value = MudWeightValue14;
        document.getElementById('MudWeight15').value = MudWeightValue15;
        document.getElementById('MudWeight16').value = MudWeightValue16;
        document.getElementById('MudWeight17').value = MudWeightValue17;
        document.getElementById('MudWeight18').value = MudWeightValue18;
        
        document.getElementById('DilutionFactor1').value = DilutionFactorValue1;
        document.getElementById('DilutionFactor2').value = DilutionFactorValue2;
        document.getElementById('DilutionFactor3').value = DilutionFactorValue3;
        document.getElementById('DilutionFactor4').value = DilutionFactorValue4;
        document.getElementById('DilutionFactor5').value = DilutionFactorValue5;
        document.getElementById('DilutionFactor6').value = DilutionFactorValue6;
        document.getElementById('DilutionFactor7').value = DilutionFactorValue7;
        document.getElementById('DilutionFactor8').value = DilutionFactorValue8;
        document.getElementById('DilutionFactor9').value = DilutionFactorValue9;

        
        document.getElementById('DilutionFactor10').value = DilutionFactorValue10;
        document.getElementById('DilutionFactor11').value = DilutionFactorValue11;
        document.getElementById('DilutionFactor12').value = DilutionFactorValue12;
        document.getElementById('DilutionFactor13').value = DilutionFactorValue13;
        document.getElementById('DilutionFactor14').value = DilutionFactorValue14;
        
        document.getElementById('footageDrilled10').value = footageDrilledValue10;
        document.getElementById('footageDrilled11').value = footageDrilledValue11;
        document.getElementById('footageDrilled12').value = footageDrilledValue12;
        document.getElementById('footageDrilled13').value = footageDrilledValue13;
        document.getElementById('footageDrilled14').value = footageDrilledValue14;
        document.getElementById('footageDrilled15').value = footageDrilledValue15;
        document.getElementById('footageDrilled16').value = footageDrilledValue16;
        document.getElementById('footageDrilled17').value = footageDrilledValue17;
        document.getElementById('footageDrilled18').value = footageDrilledValue18;
        
        document.getElementById('wellCleanUp2').value = wellCleanUpValue2;
        
        document.getElementById('BrineWeight6').value = BrineWeightValue6;
        document.getElementById('BrineWeight7').value = BrineWeightValue7;
        document.getElementById('BrineWeight8').value = BrineWeightValue8;
        document.getElementById('BrineWeight9').value = BrineWeightValue9;
        document.getElementById('BrineWeight10').value = BrineWeightValue10;
        
        document.getElementById('SectionFootage6').value = SectionFootageValue6;
        document.getElementById('SectionFootage7').value = SectionFootageValue7;
        document.getElementById('SectionFootage8').value = SectionFootageValue8;
        document.getElementById('SectionFootage9').value = SectionFootageValue9;
        document.getElementById('SectionFootage10').value = SectionFootageValue10;
        
        document.getElementById('CasingVolume6').value = CasingVolumeValue6;
        document.getElementById('CasingVolume7').value = CasingVolumeValue7;
        document.getElementById('CasingVolume8').value = CasingVolumeValue8;
        document.getElementById('CasingVolume9').value = CasingVolumeValue9;
        document.getElementById('CasingVolume10').value = CasingVolumeValue10;
        

        
        
        </script>
    </body>

</html>