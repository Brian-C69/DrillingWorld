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
            <h1>Volume Calculation WBM-DIF</h1>
        </div>

        <div class="container p-2 my-2">
            <a href="../calculator.php" class="btn btn-primary">Back</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Items</button>
            <button class="btn btn-primary" onclick="window.print()">Print this page</button>
            <a href="WenCat.php" class="btn btn-primary">WenCat</a>
            <a href="WenCatWBM-SBM-DIF.php" class="btn btn-primary">WBM-SBM-DIF</a>
            <a href="VolCalWBM-SBM-DIF.php" class="btn btn-primary">Vol Cal WBM-SBM-DIF</a>
            <a href="WenCatWBM-DIF.php" class="btn btn-primary">WBM-DIF</a>
            <a href="VolCalWBM-DIF.php" class="btn btn-success">Vol Cal WBM-DIF</a>
            <a href="WenCatFormulations.php" class="btn btn-primary">Formulations</a>
        </div>
        
        <div class="container text-black">
            <h2>A. Drilling Parameters</h2>
        </div>
        
        <div class="container table-responsive">
            <table id="DrillingParameterWBM-SBM-DIF" class="table table-bordered table-sm table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="colgroup">WELL INFORMATION</th>
                        <th scope="colgroup">Shallow</th>
                        <th scope="colgroup">Deepwater</th>
                        <th scope="colgroup">Shallow</th>
                        <th scope="colgroup">Shallow</th>
                        <th scope="colgroup">Shallow</th>
                        <th scope="colgroup">Shallow</th>
                        <th scope="colgroup">Shallow</th>
                        <th scope="colgroup">Shallow</th>
                        <th scope="colgroup">Shallow</th>
                    </tr>
                </thead>
                <tbody> 
                    <tr>
                        <td>Section</td>
                        <td class="text-center">1</td>
                        <td class="text-center">1 (if any)</td>
                        <td class="text-center">2</td>
                        <td class="text-center">3</td>
                        <td class="text-center">4</td>
                        <td class="text-center">5</td>
                        <td class="text-center">6</td>
                        <td class="text-center">7</td>
                        <td class="text-center">8</td>
                    </tr>
                    <tr>
                        <td>Mud Types</td>
                        <td class="text-center">SPUD MUD</td>
                        <td class="text-center">DKD</td>
                        <td class="text-center">SBM</td>
                        <td class="text-center">SBM</td>
                        <td class="text-center">SBM</td>
                        <td class="text-center">SBM</td>
                        <td class="text-center">DIF</td>
                        <td class="text-center">DIF</td>
                        <td class="text-center">DIF</td>
                    </tr>
                    <tr>
                        <td>Size (inch)</td>
                        <td class="text-center" id="size10">1</td>
                        <td class="text-center" id="size11">2</td>
                        <td class="text-center" id="size12">3</td>
                        <td class="text-center" id="size13">4</td>
                        <td class="text-center" id="size14">5</td>
                        <td class="text-center" id="size15">6</td>
                        <td class="text-center" id="size16">7</td>
                        <td class="text-center" id="size17">8</td>
                        <td class="text-center" id="size18">9</td>
                    </tr>
                    <tr>
                        <td>Footage Drilled (ft)</td>
                        <td class="text-center" id="footageDrilled10">1</td>
                        <td class="text-center" id="footageDrilled11">2</td>
                        <td class="text-center" id="footageDrilled12">3</td>
                        <td class="text-center" id="footageDrilled13">4</td>
                        <td class="text-center" id="footageDrilled14">5</td>
                        <td class="text-center" id="footageDrilled15">6</td>
                        <td class="text-center" id="footageDrilled16">7</td>
                        <td class="text-center" id="footageDrilled17">8</td>
                        <td class="text-center" id="footageDrilled18">9</td>
                    </tr>
                    <tr>
                        <td>To (ft)</td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to10" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to11" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to12" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to13" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to14" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to15" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to16" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to17" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to18" min="0" oninput="calculate4()"></td>
                    </tr>
                    <tr>
                        <td>Previous Casing From (ft)</td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom10" min="0" value="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom11" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom12" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom13" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom14" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom15" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom16" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom17" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom18" min="0" oninput="calculate4()"></td>
                    </tr>
                    <tr>
                        <td>Previous Casing To (ft)</td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo10" min="0" value="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo11" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo12" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo13" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo14" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo15" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo16" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo17" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo18" min="0" oninput="calculate4()"></td>
                    </tr>
                    <tr>
                        <td>Previous Casing ID (in)</td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId10" min="0" value="19.25" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId11" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId12" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId13" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId14" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId15" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId16" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId17" min="0" oninput="calculate4()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId18" min="0" oninput="calculate4()"></td>
                    </tr>
                    <tr>
                        <td>Water Depth (ft)</td>
                        <td class="text-center" id="waterDepth10"></td>
                        <td class="text-center" id="waterDepth11"></td>
                        <td class="text-center" id="waterDepth12"></td>
                        <td class="text-center" id="waterDepth13"></td>
                        <td class="text-center" id="waterDepth14"></td>
                        <td class="text-center" id="waterDepth15"></td>
                        <td class="text-center" id="waterDepth16"></td>
                        <td class="text-center" id="waterDepth17"></td>
                        <td class="text-center" id="waterDepth18"></td>
                    </tr>
                    <tr>
                        <td><p></p></td>
                    </tr>
                    <tr>
                        <td>Surface Volume (bbl)(s'trap & pits)</td>
                        <td class="text-center" id="surfaceVolume15">400</td>
                        <td class="text-center" id="surfaceVolume16">800</td>
                        <td class="text-center" id="surfaceVolume17">800</td>
                        <td class="text-center" id="surfaceVolume18">800</td>
                        <td class="text-center" id="surfaceVolume19">800</td>
                        <td class="text-center" id="surfaceVolume20">800</td>
                        <td class="text-center" id="surfaceVolume21">800</td>
                        <td class="text-center" id="surfaceVolume22">800</td>
                        <td class="text-center" id="surfaceVolume23">800</td>
                    </tr>
                    <tr>
                        <td>Casing Volume (bbl)</td>
                        <td class="text-center" id="casingVolume15">1</td>
                        <td class="text-center" id="casingVolume16">2</td>
                        <td class="text-center" id="casingVolume17">3</td>
                        <td class="text-center" id="casingVolume18">4</td>
                        <td class="text-center" id="casingVolume19">5</td>
                        <td class="text-center" id="casingVolume20">6</td>
                        <td class="text-center" id="casingVolume21">7</td>
                        <td class="text-center" id="casingVolume22">8</td>
                        <td class="text-center" id="casingVolume23">9</td>
                    </tr>
                    <tr>
                        <td>Open Hole Volume (bbl)</td>
                        <td class="text-center" id="openHoleVolume10">1</td>
                        <td class="text-center" id="openHoleVolume11">2</td>
                        <td class="text-center" id="openHoleVolume12">3</td>
                        <td class="text-center" id="openHoleVolume13">4</td>
                        <td class="text-center" id="openHoleVolume14">5</td>
                        <td class="text-center" id="openHoleVolume15">6</td>
                        <td class="text-center" id="openHoleVolume16">7</td>
                        <td class="text-center" id="openHoleVolume17">8</td>
                        <td class="text-center" id="openHoleVolume18">9</td>
                    </tr>
                    <tr>
                        <td>Dilution/Losses</td>
                        <td class="text-center" id="dilutionLosses15">1</td>
                        <td class="text-center" id="dilutionLosses16"></td>
                        <td class="text-center" id="dilutionLosses17">3</td>
                        <td class="text-center" id="dilutionLosses18">4</td>
                        <td class="text-center" id="dilutionLosses19">5</td>
                        <td class="text-center" id="dilutionLosses20">6</td>
                        <td class="text-center" id="dilutionLosses21">7</td>
                        <td class="text-center" id="dilutionLosses22">8</td>
                        <td class="text-center" id="dilutionLosses23">9</td>
                    </tr>
                    <tr>
                        <td>20% Contingency</td>
                        <td class="text-center" id="contingency15">1</td>
                        <td class="text-center" id="contingency16"></td>
                        <td class="text-center" id="contingency17">3</td>
                        <td class="text-center" id="contingency18">4</td>
                        <td class="text-center" id="contingency19">5</td>
                        <td class="text-center" id="contingency20">6</td>
                        <td class="text-center" id="contingency21">7</td>
                        <td class="text-center" id="contingency22">8</td>
                        <td class="text-center" id="contingency23">9</td>
                    </tr>
                    <tr>
                        <td>Hole Volume (bbl)</td>
                        <td class="text-center" id="holeVolume10">1</td>
                        <td class="text-center" id="holeVolume11">2</td>
                        <td class="text-center" id="holeVolume12">3</td>
                        <td class="text-center" id="holeVolume13">4</td>
                        <td class="text-center" id="holeVolume14">5</td>
                        <td class="text-center" id="holeVolume15">6</td>
                        <td class="text-center" id="holeVolume16">7</td>
                        <td class="text-center" id="holeVolume17">8</td>
                        <td class="text-center" id="holeVolume18">9</td>
                    </tr>
                    <tr>
                        <td>Total Volume Required (bbl)</td>
                        <td class="text-center" id="totalVolumeRequired15">1</td>
                        <td class="text-center" id="totalVolumeRequired16">2</td>
                        <td class="text-center" id="totalVolumeRequired17">3</td>
                        <td class="text-center" id="totalVolumeRequired18">4</td>
                        <td class="text-center" id="totalVolumeRequired19">5</td>
                        <td class="text-center" id="totalVolumeRequired20">6</td>
                        <td class="text-center" id="totalVolumeRequired21">7</td>
                        <td class="text-center" id="totalVolumeRequired22">8</td>
                        <td class="text-center" id="totalVolumeRequired23">9</td>
                    </tr>
                    <tr>
                        <td>Mud Received (bbl)</td>
                        <td class="text-center" id="mudReceived10">1</td>
                        <td class="text-center" id="mudReceived11">2</td>
                        <td class="text-center" id="mudReceived12">3</td>
                        <td class="text-center" id="mudReceived13">4</td>
                        <td class="text-center" id="mudReceived14">5</td>
                        <td class="text-center" id="mudReceived15">6</td>
                        <td class="text-center" id="mudReceived16">7</td>
                        <td class="text-center" id="mudReceived17">8</td>
                        <td class="text-center" id="mudReceived18">9</td>
                    </tr>
                    <tr>
                        <td>New mud (bbl)</td>
                        <td class="text-center" id="newMud10">1</td>
                        <td class="text-center" id="newMud11">2</td>
                        <td class="text-center" id="newMud12">3</td>
                        <td class="text-center" id="newMud13">4</td>
                        <td class="text-center" id="newMud14">5</td>
                        <td class="text-center" id="newMud15">6</td>
                        <td class="text-center" id="newMud16">7</td>
                        <td class="text-center" id="newMud17">8</td>
                        <td class="text-center" id="newMud18">9</td>
                    </tr>
                    <tr>
                        <td>Mud left (bbl)</td>
                        <td class="text-center" id="mudLeft10">1</td>
                        <td class="text-center" id="mudLeft11">2</td>
                        <td class="text-center" id="mudLeft12">3</td>
                        <td class="text-center" id="mudLeft13">4</td>
                        <td class="text-center" id="mudLeft14">5</td>
                        <td class="text-center" id="mudLeft15">6</td>
                        <td class="text-center" id="mudLeft16">7</td>
                        <td class="text-center" id="mudLeft17">8</td>
                        <td class="text-center" id="mudLeft18">9</td>
                    </tr>
                    <tr>
                        <td>Cost per barrel (USD/bbl)</td>
                        <td class="text-center" id="costPerBarrel5">1</td>
                        <td class="text-center" id="costPerBarrel6">2</td>
                        <td class="text-center" id="costPerBarrel7">3</td>
                        <td class="text-center" id="costPerBarrel8">4</td>
                        <td class="text-center" id="costPerBarrel9">5</td>
                        <td class="text-center" id="costPerBarre20">6</td>
                        <td class="text-center" id="costPerBarre21">7</td>
                        <td class="text-center" id="costPerBarre22">8</td>
                        <td class="text-center" id="costPerBarre23">9</td>
                    </tr>
                    <tr>
                        <td>Cost per foot drilled (USD/ft)</td>
                        <td class="text-center" id="costPerFootDrilled10">1</td>
                        <td class="text-center" id="costPerFootDrilled11">2</td>
                        <td class="text-center" id="costPerFootDrilled12">3</td>
                        <td class="text-center" id="costPerFootDrilled13">4</td>
                        <td class="text-center" id="costPerFootDrilled14">5</td>
                        <td class="text-center" id="costPerFootDrilled15">6</td>
                        <td class="text-center" id="costPerFootDrilled16">7</td>
                        <td class="text-center" id="costPerFootDrilled17">8</td>
                        <td class="text-center" id="costPerFootDrilled18">9</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="container pt-2 text-black">
            <h2>B. Completion Parameters</h2>
        </div>
        
        <div class="container table-responsive">
            <table id="CompletionParameterWBM-SBM-DIF" class="table table-bordered table-sm table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="colgroup">BRINE TYPES</th>
                        <th class="text-center" scope="colgroup">Sodium Chloride</th>
                        <th class="text-center" scope="colgroup">Potassium Chloride</th>
                        <th class="text-center" scope="colgroup">Calcium Chloride</th>
                        <th class="text-center" scope="colgroup">Sodium Bromide</th>
                        <th class="text-center" scope="colgroup">Calcium Bromide</th>
                    </tr>
                </thead>
                <tbody> 
                    <tr>
                        <td>Total Footage(ft)</td>
                        <td class="text-center" id="totalFootage6">1</td>
                        <td class="text-center" id="totalFootage7">2</td>
                        <td class="text-center" id="totalFootage8">3</td>
                        <td class="text-center" id="totalFootage9">4</td>
                        <td class="text-center" id="totalFootage10">5</td>
                    </tr>
                    <tr>
                        <td>Surface Volume (bbl)(s'trap & pits)</td>
                        <td class="text-center" id="surfaceVolume24">1</td>
                        <td class="text-center" id="surfaceVolume25">2</td>
                        <td class="text-center" id="surfaceVolume26">3</td>
                        <td class="text-center" id="surfaceVolume27">4</td>
                        <td class="text-center" id="surfaceVolume28">5</td>
                    </tr>
                    <tr>
                        <td>Hole/Casing Volume (bbl)</td>
                        <td class="text-center" id="casingVolume24">1</td>
                        <td class="text-center" id="casingVolume25">2</td>
                        <td class="text-center" id="casingVolume26">3</td>
                        <td class="text-center" id="casingVolume27">4</td>
                        <td class="text-center" id="casingVolume28">5</td>
                    </tr>
                    <tr>
                        <td>Dilution/Losses</td>
                        <td class="text-center" id="dilutionLosses24">1</td>
                        <td class="text-center" id="dilutionLosses25">2</td>
                        <td class="text-center" id="dilutionLosses26">3</td>
                        <td class="text-center" id="dilutionLosses27">4</td>
                        <td class="text-center" id="dilutionLosses28">5</td>
                    </tr>
                    <tr>
                        <td>20% Contingency</td>
                        <td class="text-center" id="contingency24">1</td>
                        <td class="text-center" id="contingency25">2</td>
                        <td class="text-center" id="contingency26">3</td>
                        <td class="text-center" id="contingency27">4</td>
                        <td class="text-center" id="contingency28">5</td>
                    </tr>
                    <tr>
                        <td>Total Volume Required (bbl)</td>
                        <td class="text-center" id="totalVolumeRequired24">1</td>
                        <td class="text-center" id="totalVolumeRequired25">2</td>
                        <td class="text-center" id="totalVolumeRequired26">3</td>
                        <td class="text-center" id="totalVolumeRequired27">4</td>
                        <td class="text-center" id="totalVolumeRequired28">5</td>
                    </tr>
                    <tr>
                        <td>Cost per barrel (USD/bbl)</td>
                        <td class="text-center" id="costPerBarrel15">1</td>
                        <td class="text-center" id="costPerBarrel16">2</td>
                        <td class="text-center" id="costPerBarrel17">3</td>
                        <td class="text-center" id="costPerBarrel18">4</td>
                        <td class="text-center" id="costPerBarrel19">5</td>
                    </tr>
                    <tr>
                        <td>Cost per foot (USD/ft)</td>
                        <td class="text-center" id="costPerFoot6">1</td>
                        <td class="text-center" id="costPerFoot7">2</td>
                        <td class="text-center" id="costPerFoot8">3</td>
                        <td class="text-center" id="costPerFoot9">4</td>
                        <td class="text-center" id="costPerFoot10">5</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br>
        <?php include '../includes/footer.php'; ?>
        
        <script>
        // Restore form field values from sessionStorage
        var size10 = parseFloat(sessionStorage.getItem('holeSizeValue10'));
        var size11 = parseFloat(sessionStorage.getItem('holeSizeValue11'));
        var size12 = parseFloat(sessionStorage.getItem('holeSizeValue12'));
        var size13 = parseFloat(sessionStorage.getItem('holeSizeValue13'));
        var size14 = parseFloat(sessionStorage.getItem('holeSizeValue14'));
        var size15 = parseFloat(sessionStorage.getItem('holeSizeValue15'));
        var size16 = parseFloat(sessionStorage.getItem('holeSizeValue16'));
        var size17 = parseFloat(sessionStorage.getItem('holeSizeValue17'));
        var size18 = parseFloat(sessionStorage.getItem('holeSizeValue18'));
        
        var footageDrilled10 = parseFloat(sessionStorage.getItem('footageDrilledValue10'));
        var footageDrilled11 = parseFloat(sessionStorage.getItem('footageDrilledValue11'));
        var footageDrilled12 = parseFloat(sessionStorage.getItem('footageDrilledValue12'));
        var footageDrilled13 = parseFloat(sessionStorage.getItem('footageDrilledValue13'));
        var footageDrilled14 = parseFloat(sessionStorage.getItem('footageDrilledValue14'));
        var footageDrilled15 = parseFloat(sessionStorage.getItem('footageDrilledValue15'));
        var footageDrilled16 = parseFloat(sessionStorage.getItem('footageDrilledValue16'));
        var footageDrilled17 = parseFloat(sessionStorage.getItem('footageDrilledValue17'));
        var footageDrilled18 = parseFloat(sessionStorage.getItem('footageDrilledValue18'));
        
        var waterDepth10 = parseFloat(sessionStorage.getItem('waterDepthValue10'));
        var waterDepth11 = parseFloat(sessionStorage.getItem('waterDepthValue11'));
        var waterDepth12 = parseFloat(sessionStorage.getItem('waterDepthValue12'));
        var waterDepth13 = parseFloat(sessionStorage.getItem('waterDepthValue13'));
        var waterDepth14 = parseFloat(sessionStorage.getItem('waterDepthValue14'));
        var waterDepth15 = parseFloat(sessionStorage.getItem('waterDepthValue15'));
        var waterDepth16 = parseFloat(sessionStorage.getItem('waterDepthValue16'));
        var waterDepth17 = parseFloat(sessionStorage.getItem('waterDepthValue17'));
        var waterDepth18 = parseFloat(sessionStorage.getItem('waterDepthValue18'));
        
        // VolCal WBM-DIF Input Parameters
        var to10 = parseFloat(sessionStorage.getItem('toValue10')) || 0;
        var to11 = parseFloat(sessionStorage.getItem('toValue11')) || 0;
        var to12 = parseFloat(sessionStorage.getItem('toValue12')) || 0;
        var to13 = parseFloat(sessionStorage.getItem('toValue13')) || 0;
        var to14 = parseFloat(sessionStorage.getItem('toValue14')) || 0;
        var to15 = parseFloat(sessionStorage.getItem('toValue15')) || 0;
        var to16 = parseFloat(sessionStorage.getItem('toValue16')) || 0;
        var to17 = parseFloat(sessionStorage.getItem('toValue17')) || 0;
        var to18 = parseFloat(sessionStorage.getItem('toValue18')) || 0;
        
        var prCasingFrom10 = parseFloat(sessionStorage.getItem('prCasingFromValue10')) || 0;
        var prCasingFrom11 = parseFloat(sessionStorage.getItem('prCasingFromValue11')) || 0;
        var prCasingFrom12 = parseFloat(sessionStorage.getItem('prCasingFromValue12')) || 0;
        var prCasingFrom13 = parseFloat(sessionStorage.getItem('prCasingFromValue13')) || 0;
        var prCasingFrom14 = parseFloat(sessionStorage.getItem('prCasingFromValue14')) || 0;
        var prCasingFrom15 = parseFloat(sessionStorage.getItem('prCasingFromValue15')) || 0;
        var prCasingFrom16 = parseFloat(sessionStorage.getItem('prCasingFromValue16')) || 0;
        var prCasingFrom17 = parseFloat(sessionStorage.getItem('prCasingFromValue17')) || 0;
        var prCasingFrom18 = parseFloat(sessionStorage.getItem('prCasingFromValue18')) || 0;
        
        var prCasingTo10 = parseFloat(sessionStorage.getItem('prCasingToValue10')) || 0;
        var prCasingTo11 = parseFloat(sessionStorage.getItem('prCasingToValue11')) || 0;
        var prCasingTo12 = parseFloat(sessionStorage.getItem('prCasingToValue12')) || 0;
        var prCasingTo13 = parseFloat(sessionStorage.getItem('prCasingToValue13')) || 0;
        var prCasingTo14 = parseFloat(sessionStorage.getItem('prCasingToValue14')) || 0;
        var prCasingTo15 = parseFloat(sessionStorage.getItem('prCasingToValue15')) || 0;
        var prCasingTo16 = parseFloat(sessionStorage.getItem('prCasingToValue16')) || 0;
        var prCasingTo17 = parseFloat(sessionStorage.getItem('prCasingToValue17')) || 0;
        var prCasingTo18 = parseFloat(sessionStorage.getItem('prCasingToValue18')) || 0;
        
        var prCasingId10 = parseFloat(sessionStorage.getItem('prCasingIdValue10')) || 0;
        var prCasingId11 = parseFloat(sessionStorage.getItem('prCasingIdValue11')) || 0;
        var prCasingId12 = parseFloat(sessionStorage.getItem('prCasingIdValue12')) || 0;
        var prCasingId13 = parseFloat(sessionStorage.getItem('prCasingIdValue13')) || 0;
        var prCasingId14 = parseFloat(sessionStorage.getItem('prCasingIdValue14')) || 0;
        var prCasingId15 = parseFloat(sessionStorage.getItem('prCasingIdValue15')) || 0;
        var prCasingId16 = parseFloat(sessionStorage.getItem('prCasingIdValue16')) || 0;
        var prCasingId17 = parseFloat(sessionStorage.getItem('prCasingIdValue17')) || 0;
        var prCasingId18 = parseFloat(sessionStorage.getItem('prCasingIdValue18')) || 0;
        
        var costPerBarrel5 = parseFloat(sessionStorage.getItem('sectionWithBariteBBLValue1')) || 0;
        var costPerBarrel6 = parseFloat(sessionStorage.getItem('sectionWithBariteBBLValue2')) || 0;
        var costPerBarrel7 = parseFloat(sessionStorage.getItem('sectionWithBariteBBLValue11')) || 0;
        var costPerBarrel8 = parseFloat(sessionStorage.getItem('sectionWithBariteBBLValue12')) || 0;
        var costPerBarrel9 = parseFloat(sessionStorage.getItem('sectionWithBariteBBLValue13')) || 0;
        var costPerBarre20 = parseFloat(sessionStorage.getItem('sectionWithBariteBBLValue14')) || 0;
        var costPerBarre21 = parseFloat(sessionStorage.getItem('sectionWithBariteBBLValue15')) || 0;
        var costPerBarre22 = parseFloat(sessionStorage.getItem('sectionWithoutBariteBBLValue8')) || 0;
        var costPerBarre23 = parseFloat(sessionStorage.getItem('sectionWithoutBariteBBLValue9')) || 0;
        
         
        // Set back Value From WBM-DIF
        document.getElementById('size10').textContent = size10.toFixed(0);
        document.getElementById('size11').textContent = size11.toFixed(0);
        document.getElementById('size12').textContent = size12.toFixed(0);
        document.getElementById('size13').textContent = size13.toFixed(0);
        document.getElementById('size14').textContent = size14.toFixed(0);
        document.getElementById('size15').textContent = size15.toFixed(0);
        document.getElementById('size16').textContent = size16.toFixed(0);
        document.getElementById('size17').textContent = size17.toFixed(0);
        document.getElementById('size18').textContent = size10.toFixed(0);
        
        document.getElementById('footageDrilled10').textContent = footageDrilled10.toFixed(0);
        document.getElementById('footageDrilled11').textContent = footageDrilled11.toFixed(0);
        document.getElementById('footageDrilled12').textContent = footageDrilled12.toFixed(0);
        document.getElementById('footageDrilled13').textContent = footageDrilled13.toFixed(0);
        document.getElementById('footageDrilled14').textContent = footageDrilled14.toFixed(0);
        document.getElementById('footageDrilled15').textContent = footageDrilled15.toFixed(0);
        document.getElementById('footageDrilled16').textContent = footageDrilled16.toFixed(0);
        document.getElementById('footageDrilled17').textContent = footageDrilled17.toFixed(0);
        document.getElementById('footageDrilled18').textContent = footageDrilled18.toFixed(0);
        
        document.getElementById('waterDepth10').textContent = waterDepth10.toFixed(0);
        document.getElementById('waterDepth11').textContent = waterDepth11.toFixed(0);
        document.getElementById('waterDepth12').textContent = waterDepth12.toFixed(0);
        document.getElementById('waterDepth13').textContent = waterDepth13.toFixed(0);
        document.getElementById('waterDepth14').textContent = waterDepth14.toFixed(0);
        document.getElementById('waterDepth15').textContent = waterDepth15.toFixed(0);
        document.getElementById('waterDepth16').textContent = waterDepth16.toFixed(0);
        document.getElementById('waterDepth17').textContent = waterDepth17.toFixed(0);
        document.getElementById('waterDepth18').textContent = waterDepth18.toFixed(0);
        
        // Insert Previous Value
        document.getElementById('to10').value = to10.toFixed(2);
        document.getElementById('to11').value = to11.toFixed(2);
        document.getElementById('to12').value = to12.toFixed(2);
        document.getElementById('to13').value = to13.toFixed(2);
        document.getElementById('to14').value = to14.toFixed(2);
        document.getElementById('to15').value = to15.toFixed(2);
        document.getElementById('to16').value = to16.toFixed(2);
        document.getElementById('to17').value = to17.toFixed(2);
        document.getElementById('to18').value = to18.toFixed(2);
        
        document.getElementById('prCasingFrom10').value = prCasingFrom10.toFixed(2);
        document.getElementById('prCasingFrom11').value = prCasingFrom11.toFixed(2);
        document.getElementById('prCasingFrom12').value = prCasingFrom12.toFixed(2);
        document.getElementById('prCasingFrom13').value = prCasingFrom13.toFixed(2);
        document.getElementById('prCasingFrom14').value = prCasingFrom14.toFixed(2);
        document.getElementById('prCasingFrom15').value = prCasingFrom15.toFixed(2);
        document.getElementById('prCasingFrom16').value = prCasingFrom16.toFixed(2);
        document.getElementById('prCasingFrom17').value = prCasingFrom17.toFixed(2);
        document.getElementById('prCasingFrom18').value = prCasingFrom18.toFixed(2);
        
        document.getElementById('prCasingTo10').value = prCasingTo10.toFixed(2);
        document.getElementById('prCasingTo11').value = prCasingTo11.toFixed(2);
        document.getElementById('prCasingTo12').value = prCasingTo12.toFixed(2);
        document.getElementById('prCasingTo13').value = prCasingTo13.toFixed(2);
        document.getElementById('prCasingTo14').value = prCasingTo14.toFixed(2);
        document.getElementById('prCasingTo15').value = prCasingTo15.toFixed(2);
        document.getElementById('prCasingTo16').value = prCasingTo16.toFixed(2);
        document.getElementById('prCasingTo17').value = prCasingTo17.toFixed(2);
        document.getElementById('prCasingTo18').value = prCasingTo18.toFixed(2);
        
        document.getElementById('prCasingId10').value = prCasingId10.toFixed(2);
        document.getElementById('prCasingId11').value = prCasingId11.toFixed(2);
        document.getElementById('prCasingId12').value = prCasingId12.toFixed(2);
        document.getElementById('prCasingId13').value = prCasingId13.toFixed(2);
        document.getElementById('prCasingId14').value = prCasingId14.toFixed(2);
        document.getElementById('prCasingId15').value = prCasingId15.toFixed(2);
        document.getElementById('prCasingId16').value = prCasingId16.toFixed(2);
        document.getElementById('prCasingId17').value = prCasingId17.toFixed(2);
        document.getElementById('prCasingId18').value = prCasingId18.toFixed(2);
        
        document.getElementById('costPerBarrel5').textContent = costPerBarrel5.toFixed(2);
        document.getElementById('costPerBarrel6').textContent = costPerBarrel6.toFixed(2);
        document.getElementById('costPerBarrel7').textContent = costPerBarrel7.toFixed(2);
        document.getElementById('costPerBarrel8').textContent = costPerBarrel8.toFixed(2);
        document.getElementById('costPerBarrel9').textContent = costPerBarrel9.toFixed(2);
        document.getElementById('costPerBarre20').textContent = costPerBarre20.toFixed(2);
        document.getElementById('costPerBarre21').textContent = costPerBarre21.toFixed(2);
        document.getElementById('costPerBarre22').textContent = costPerBarre22.toFixed(2);
        document.getElementById('costPerBarre23').textContent = costPerBarre23.toFixed(2);
        

        </script>
    </body>
</html>

