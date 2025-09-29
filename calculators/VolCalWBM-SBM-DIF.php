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
            <h1>Volume Calculation WBM-SBM-DIF</h1>
        </div>

        <div class="container p-2 my-2">
            <a href="../calculator.php" class="btn btn-primary">Back</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Items</button>
            <button class="btn btn-primary" onclick="window.print()">Print this page</button>
            <a href="WenCat.php" class="btn btn-primary">WenCat</a>
            <a href="WenCatWBM-SBM-DIF.php" class="btn btn-primary">WBM-SBM-DIF</a>
            <a href="VolCalWBM-SBM-DIF.php" class="btn btn-success">Vol Cal WBM-SBM-DIF</a>
            <a href="WenCatWBM-DIF.php" class="btn btn-primary">WBM-DIF</a>
            <a href="VolCalWBM-DIF.php" class="btn btn-primary">Vol Cal WBM-DIF</a>
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
                        <td>1</td>
                        <td>1 (if any)</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Mud Types</td>
                        <td>SPUD MUD</td>
                        <td>DKD</td>
                        <td>SBM</td>
                        <td>SBM</td>
                        <td>SBM</td>
                        <td>SBM</td>
                        <td>DIF</td>
                        <td>DIF</td>
                        <td>DIF</td>
                    </tr>
                    <tr>
                        <td>Size (inch)</td>
                        <td id="size1">1</td>
                        <td id="size2">2</td>
                        <td id="size3">3</td>
                        <td id="size4">4</td>
                        <td id="size5">5</td>
                        <td id="size6">6</td>
                        <td id="size7">7</td>
                        <td id="size8">8</td>
                        <td id="size9">9</td>
                    </tr>
                    <tr>
                        <td>Footage Drilled (ft)</td>
                        <td id="footageDrilled1">1</td>
                        <td id="footageDrilled2">2</td>
                        <td id="footageDrilled3">3</td>
                        <td id="footageDrilled4">4</td>
                        <td id="footageDrilled5">5</td>
                        <td id="footageDrilled6">6</td>
                        <td id="footageDrilled7">7</td>
                        <td id="footageDrilled8">8</td>
                        <td id="footageDrilled9">9</td>
                    </tr>
                    <tr>
                        <td>To (ft)</td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to1" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to2" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to3" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to4" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to5" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to6" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to7" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to8" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="to9" min="0" oninput="calculate2()"></td>
                    </tr>
                    <tr>
                        <td>Previous Casing From (ft)</td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom1" min="0" value="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom2" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom3" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom4" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom5" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom6" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom7" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom8" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingFrom9" min="0" oninput="calculate2()"></td>
                    </tr>
                    <tr>
                        <td>Previous Casing To (ft)</td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo1" min="0" value="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo2" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo3" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo4" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo5" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo6" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo7" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo8" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingTo9" min="0" oninput="calculate2()"></td>
                    </tr>
                    <tr>
                        <td>Previous Casing ID (in)</td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId1" min="0" value="19.25" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId2" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId3" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId4" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId5" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId6" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId7" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId8" min="0" oninput="calculate2()"></td>
                        <td class="input-group-sm"><input class="form-control text-center" type="number"  inputmode="decimal" step="any" id="prCasingId9" min="0" oninput="calculate2()"></td>
                    </tr>
                    <tr>
                        <td>Water Depth (ft)</td>
                        <td id="waterDepth1"></td>
                        <td id="waterDepth2"></td>
                        <td id="waterDepth3"></td>
                        <td id="waterDepth4"></td>
                        <td id="waterDepth5"></td>
                        <td id="waterDepth6"></td>
                        <td id="waterDepth7"></td>
                        <td id="waterDepth8"></td>
                        <td id="waterDepth9"></td>
                    </tr>
                    <tr>
                        <td><p></p></td>
                    </tr>
                    <tr>
                        <td>Surface Volume (bbl)(s'trap & pits)</td>
                        <td id="surfaceVolume1">400</td>
                        <td id="surfaceVolume2">800</td>
                        <td id="surfaceVolume3">800</td>
                        <td id="surfaceVolume4">800</td>
                        <td id="surfaceVolume5">800</td>
                        <td id="surfaceVolume6">800</td>
                        <td id="surfaceVolume7">800</td>
                        <td id="surfaceVolume8">800</td>
                        <td id="surfaceVolume9">800</td>
                    </tr>
                    <tr>
                        <td>Casing Volume (bbl)</td>
                        <td id="casingVolume1">1</td>
                        <td id="casingVolume2">2</td>
                        <td id="casingVolume3">3</td>
                        <td id="casingVolume4">4</td>
                        <td id="casingVolume5">5</td>
                        <td id="casingVolume6">6</td>
                        <td id="casingVolume7">7</td>
                        <td id="casingVolume8">8</td>
                        <td id="casingVolume9">9</td>
                    </tr>
                    <tr>
                        <td>Open Hole Volume (bbl)</td>
                        <td id="openHoleVolume1">1</td>
                        <td id="openHoleVolume2">2</td>
                        <td id="openHoleVolume3">3</td>
                        <td id="openHoleVolume4">4</td>
                        <td id="openHoleVolume5">5</td>
                        <td id="openHoleVolume6">6</td>
                        <td id="openHoleVolume7">7</td>
                        <td id="openHoleVolume8">8</td>
                        <td id="openHoleVolume9">9</td>
                    </tr>
                    <tr>
                        <td>Dilution/Losses</td>
                        <td id="dilutionLosses1">1</td>
                        <td id="dilutionLosses2"></td>
                        <td id="dilutionLosses3">3</td>
                        <td id="dilutionLosses4">4</td>
                        <td id="dilutionLosses5">5</td>
                        <td id="dilutionLosses6">6</td>
                        <td id="dilutionLosses7">7</td>
                        <td id="dilutionLosses8">8</td>
                        <td id="dilutionLosses9">9</td>
                    </tr>
                    <tr>
                        <td>20% Contingency</td>
                        <td id="contingency1">1</td>
                        <td id="contingency2"></td>
                        <td id="contingency3">3</td>
                        <td id="contingency4">4</td>
                        <td id="contingency5">5</td>
                        <td id="contingency6">6</td>
                        <td id="contingency7">7</td>
                        <td id="contingency8">8</td>
                        <td id="contingency9">9</td>
                    </tr>
                    <tr>
                        <td>Hole Volume (bbl)</td>
                        <td id="holeVolume1">1</td>
                        <td id="holeVolume2">2</td>
                        <td id="holeVolume3">3</td>
                        <td id="holeVolume4">4</td>
                        <td id="holeVolume5">5</td>
                        <td id="holeVolume6">6</td>
                        <td id="holeVolume7">7</td>
                        <td id="holeVolume8">8</td>
                        <td id="holeVolume9">9</td>
                    </tr>
                    <tr>
                        <td>Total Volume Required (bbl)</td>
                        <td id="totalVolumeRequired1">1</td>
                        <td id="totalVolumeRequired2">2</td>
                        <td id="totalVolumeRequired3">3</td>
                        <td id="totalVolumeRequired4">4</td>
                        <td id="totalVolumeRequired5">5</td>
                        <td id="totalVolumeRequired6">6</td>
                        <td id="totalVolumeRequired7">7</td>
                        <td id="totalVolumeRequired8">8</td>
                        <td id="totalVolumeRequired9">9</td>
                    </tr>
                    <tr>
                        <td>Mud Received (bbl)</td>
                        <td id="mudReceived1">1</td>
                        <td id="mudReceived2">2</td>
                        <td id="mudReceived3">3</td>
                        <td id="mudReceived4">4</td>
                        <td id="mudReceived5">5</td>
                        <td id="mudReceived6">6</td>
                        <td id="mudReceived7">7</td>
                        <td id="mudReceived8">8</td>
                        <td id="mudReceived9">9</td>
                    </tr>
                    <tr>
                        <td>New mud (bbl)</td>
                        <td id="newMud1">1</td>
                        <td id="newMud2">2</td>
                        <td id="newMud3">3</td>
                        <td id="newMud4">4</td>
                        <td id="newMud5">5</td>
                        <td id="newMud6">6</td>
                        <td id="newMud7">7</td>
                        <td id="newMud8">8</td>
                        <td id="newMud9">9</td>
                    </tr>
                    <tr>
                        <td>Mud left (bbl)</td>
                        <td id="mudLeft1">1</td>
                        <td id="mudLeft2">2</td>
                        <td id="mudLeft3">3</td>
                        <td id="mudLeft4">4</td>
                        <td id="mudLeft5">5</td>
                        <td id="mudLeft6">6</td>
                        <td id="mudLeft7">7</td>
                        <td id="mudLeft8">8</td>
                        <td id="mudLeft9">9</td>
                    </tr>
                    <tr>
                        <td>Cost per barrel (USD/bbl)</td>
                        <td id="costPerBarrel1">1</td>
                        <td id="costPerBarrel2">2</td>
                        <td id="costPerBarrel3">3</td>
                        <td id="costPerBarrel4">4</td>
                        <td id="costPerBarrel5">5</td>
                        <td id="costPerBarrel6">6</td>
                        <td id="costPerBarrel7">7</td>
                        <td id="costPerBarrel8">8</td>
                        <td id="costPerBarrel9">9</td>
                    </tr>
                    <tr>
                        <td>Cost per foot drilled (USD/ft)</td>
                        <td id="costPerFootDrilled1"></td>
                        <td id="costPerFootDrilled2"></td>
                        <td id="costPerFootDrilled3"></td>
                        <td id="costPerFootDrilled4"></td>
                        <td id="costPerFootDrilled5"></td>
                        <td id="costPerFootDrilled6"></td>
                        <td id="costPerFootDrilled7"></td>
                        <td id="costPerFootDrilled8"></td>
                        <td id="costPerFootDrilled9"></td>
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
                        <th scope="colgroup">Sodium Chloride</th>
                        <th scope="colgroup">Potassium Chloride</th>
                        <th scope="colgroup">Calcium Chloride</th>
                        <th scope="colgroup">Sodium Bromide</th>
                        <th scope="colgroup">Calcium Bromide</th>
                    </tr>
                </thead>
                <tbody> 
                    <tr>
                        <td>Total Footage(ft)</td>
                        <td id="totalFootage1">1</td>
                        <td id="totalFootage2">2</td>
                        <td id="totalFootage3">3</td>
                        <td id="totalFootage4">4</td>
                        <td id="totalFootage5">5</td>
                    </tr>
                    <tr>
                        <td>Surface Volume (bbl)(s'trap & pits)</td>
                        <td id="surfaceVolume10">1</td>
                        <td id="surfaceVolume11">2</td>
                        <td id="surfaceVolume12">3</td>
                        <td id="surfaceVolume13">4</td>
                        <td id="surfaceVolume14">5</td>
                    </tr>
                    <tr>
                        <td>Hole/Casing Volume (bbl)</td>
                        <td id="casingVolume10"></td>
                        <td id="casingVolume11"></td>
                        <td id="casingVolume12"></td>
                        <td id="casingVolume13"></td>
                        <td id="casingVolume14"></td>
                    </tr>
                    <tr>
                        <td>Dilution/Losses</td>
                        <td id="dilutionLosses10"></td>
                        <td id="dilutionLosses11"></td>
                        <td id="dilutionLosses12"></td>
                        <td id="dilutionLosses13"></td>
                        <td id="dilutionLosses14"></td>
                    </tr>
                    <tr>
                        <td>20% Contingency</td>
                        <td id="contingency10"></td>
                        <td id="contingency11"></td>
                        <td id="contingency12"></td>
                        <td id="contingency13"></td>
                        <td id="contingency14"></td>
                    </tr>
                    <tr>
                        <td>Total Volume Required (bbl)</td>
                        <td id="totalVolumeRequired10"></td>
                        <td id="totalVolumeRequired11"></td>
                        <td id="totalVolumeRequired12"></td>
                        <td id="totalVolumeRequired13"></td>
                        <td id="totalVolumeRequired14"></td>
                    </tr>
                    <tr>
                        <td>Cost per barrel (USD/bbl)</td>
                        <td id="costPerBarrel10"></td>
                        <td id="costPerBarrel11"></td>
                        <td id="costPerBarrel12"></td>
                        <td id="costPerBarrel13"></td>
                        <td id="costPerBarrel14"></td>
                    </tr>
                    <tr>
                        <td>Cost per foot (USD/ft)</td>
                        <td id="costPerFoot1"></td>
                        <td id="costPerFoot2"></td>
                        <td id="costPerFoot3"></td>
                        <td id="costPerFoot4"></td>
                        <td id="costPerFoot5"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br>
        <?php include '../includes/footer.php'; ?>
        
        <script>
        // Restore form field values from sessionStorage
        var size1 = sessionStorage.getItem('holeSizeValue1') || 0;
        var size2 = sessionStorage.getItem('holeSizeValue2') || 0;
        var size3 = sessionStorage.getItem('holeSizeValue3') || 0;
        var size4 = sessionStorage.getItem('holeSizeValue4') || 0;
        var size5 = sessionStorage.getItem('holeSizeValue5') || 0;
        var size6 = sessionStorage.getItem('holeSizeValue6') || 0;
        var size7 = sessionStorage.getItem('holeSizeValue7') || 0;
        var size8 = sessionStorage.getItem('holeSizeValue8') || 0;
        var size9 = sessionStorage.getItem('holeSizeValue9') || 0;
        
        var footageDrilled1 = parseFloat(sessionStorage.getItem('footageDrilledValue1')) || 0;
        var footageDrilled2 = parseFloat(sessionStorage.getItem('footageDrilledValue2')) || 0;
        var footageDrilled3 = parseFloat(sessionStorage.getItem('footageDrilledValue3')) || 0;
        var footageDrilled4 = parseFloat(sessionStorage.getItem('footageDrilledValue4')) || 0;
        var footageDrilled5 = parseFloat(sessionStorage.getItem('footageDrilledValue5')) || 0;
        var footageDrilled6 = parseFloat(sessionStorage.getItem('footageDrilledValue6')) || 0;
        var footageDrilled7 = parseFloat(sessionStorage.getItem('footageDrilledValue7')) || 0;
        var footageDrilled8 = parseFloat(sessionStorage.getItem('footageDrilledValue8')) || 0;
        var footageDrilled9 = parseFloat(sessionStorage.getItem('footageDrilledValue9')) || 0;
        
        
        var waterDepth1 = parseFloat(sessionStorage.getItem('waterDepthValue1')) || 0;
        var waterDepth2 = parseFloat(sessionStorage.getItem('waterDepthValue2')) || 0;
        var waterDepth3 = parseFloat(sessionStorage.getItem('waterDepthValue3')) || 0;
        var waterDepth4 = parseFloat(sessionStorage.getItem('waterDepthValue4')) || 0;
        var waterDepth5 = parseFloat(sessionStorage.getItem('waterDepthValue5')) || 0;
        var waterDepth6 = parseFloat(sessionStorage.getItem('waterDepthValue6')) || 0;
        var waterDepth7 = parseFloat(sessionStorage.getItem('waterDepthValue7')) || 0;
        var waterDepth8 = parseFloat(sessionStorage.getItem('waterDepthValue8')) || 0;
        var waterDepth9 = parseFloat(sessionStorage.getItem('waterDepthValue9')) || 0;
        
        var to1 =  parseFloat(sessionStorage.getItem('toValue1')) || 0;
        var to2 =  parseFloat(sessionStorage.getItem('toValue2')) || 0;
        var to3 =  parseFloat(sessionStorage.getItem('toValue3')) || 0;
        var to4 =  parseFloat(sessionStorage.getItem('toValue4')) || 0;
        var to5 =  parseFloat(sessionStorage.getItem('toValue5')) || 0;
        var to6 =  parseFloat(sessionStorage.getItem('toValue6')) || 0;
        var to7 =  parseFloat(sessionStorage.getItem('toValue7')) || 0;
        var to8 =  parseFloat(sessionStorage.getItem('toValue8')) || 0;
        var to9 =  parseFloat(sessionStorage.getItem('toValue9')) || 0;
        
        var prCasingFrom1 =  parseFloat(sessionStorage.getItem('prCasingFromValue1')) || 0;
        var prCasingFrom2 =  parseFloat(sessionStorage.getItem('prCasingFromValue2')) || 0;
        var prCasingFrom3 =  parseFloat(sessionStorage.getItem('prCasingFromValue3')) || 0;
        var prCasingFrom4 =  parseFloat(sessionStorage.getItem('prCasingFromValue4')) || 0;
        var prCasingFrom5 =  parseFloat(sessionStorage.getItem('prCasingFromValue5')) || 0;
        var prCasingFrom6 =  parseFloat(sessionStorage.getItem('prCasingFromValue6')) || 0;
        var prCasingFrom7 =  parseFloat(sessionStorage.getItem('prCasingFromValue7')) || 0;
        var prCasingFrom8 =  parseFloat(sessionStorage.getItem('prCasingFromValue8')) || 0;
        var prCasingFrom9 =  parseFloat(sessionStorage.getItem('prCasingFromValue9')) || 0;
        
        var prCasingTo1 =  parseFloat(sessionStorage.getItem('prCasingToValue1')) || 0;
        var prCasingTo2 =  parseFloat(sessionStorage.getItem('prCasingToValue2')) || 0;
        var prCasingTo3 =  parseFloat(sessionStorage.getItem('prCasingToValue3')) || 0;
        var prCasingTo4 =  parseFloat(sessionStorage.getItem('prCasingToValue4')) || 0;
        var prCasingTo5 =  parseFloat(sessionStorage.getItem('prCasingToValue5')) || 0;
        var prCasingTo6 =  parseFloat(sessionStorage.getItem('prCasingToValue6')) || 0;
        var prCasingTo7 =  parseFloat(sessionStorage.getItem('prCasingToValue7')) || 0;
        var prCasingTo8 =  parseFloat(sessionStorage.getItem('prCasingToValue8')) || 0;
        var prCasingTo9 =  parseFloat(sessionStorage.getItem('prCasingToValue9')) || 0;
        
        var prCasingId1 =  parseFloat(sessionStorage.getItem('prCasingIdValue1')) || 19.25;
        var prCasingId2 =  parseFloat(sessionStorage.getItem('prCasingIdValue2')) || 0;
        var prCasingId3 =  parseFloat(sessionStorage.getItem('prCasingIdValue3')) || 0;
        var prCasingId4 =  parseFloat(sessionStorage.getItem('prCasingIdValue4')) || 0;
        var prCasingId5 =  parseFloat(sessionStorage.getItem('prCasingIdValue5')) || 0;
        var prCasingId6 =  parseFloat(sessionStorage.getItem('prCasingIdValue6')) || 0;
        var prCasingId7 =  parseFloat(sessionStorage.getItem('prCasingIdValue7')) || 0;
        var prCasingId8 =  parseFloat(sessionStorage.getItem('prCasingIdValue8')) || 0;
        var prCasingId9 =  parseFloat(sessionStorage.getItem('prCasingIdValue9')) || 0;
        
        var costPerBarrel1 = parseFloat(sessionStorage.getItem('sectionWithBariteBBLValue1')) || 0;
        var costPerBarrel2 = parseFloat(sessionStorage.getItem('sectionWithBariteBBLValue2')) || 0;
        var costPerBarrel3 = parseFloat(sessionStorage.getItem('sectionWithBariteBBLValue3')) || 0;
        var costPerBarrel4 = parseFloat(sessionStorage.getItem('sectionWithBariteBBLValue4')) || 0;
        var costPerBarrel5 = parseFloat(sessionStorage.getItem('sectionWithBariteBBLValue5')) || 0;
        var costPerBarrel6 = parseFloat(sessionStorage.getItem('sectionWithBariteBBLValue6')) || 0;
        var costPerBarrel7 = parseFloat(sessionStorage.getItem('sectionWithoutBariteBBLValue7')) || 0;
        var costPerBarrel8 = parseFloat(sessionStorage.getItem('sectionWithoutBariteBBLValue8')) || 0;
        var costPerBarrel9 = parseFloat(sessionStorage.getItem('sectionWithoutBariteBBLValue9')) || 0;
        
        var totalFootage1 = parseFloat(sessionStorage.getItem('SectionFootageValue1')) || 0;
        var totalFootage2 = parseFloat(sessionStorage.getItem('SectionFootageValue2')) || 0;
        var totalFootage3 = parseFloat(sessionStorage.getItem('SectionFootageValue3')) || 0;
        var totalFootage4 = parseFloat(sessionStorage.getItem('SectionFootageValue4')) || 0;
        var totalFootage5 = parseFloat(sessionStorage.getItem('SectionFootageValue5')) || 0;
        
        var surfaceVolume10 = parseFloat(document.getElementById('surfaceVolume2').textContent) || 0;
        var surfaceVolume11 = parseFloat(document.getElementById('surfaceVolume2').textContent) || 0;
        var surfaceVolume12 = parseFloat(document.getElementById('surfaceVolume2').textContent) || 0;
        var surfaceVolume13 = parseFloat(document.getElementById('surfaceVolume2').textContent) || 0;
        var surfaceVolume14 = parseFloat(document.getElementById('surfaceVolume2').textContent) || 0;
        
        var casingVolume10 = parseFloat(sessionStorage.getItem('CasingVolumeValue1')) || 0;
        var casingVolume11 = parseFloat(sessionStorage.getItem('CasingVolumeValue2')) || 0;
        var casingVolume12 = parseFloat(sessionStorage.getItem('CasingVolumeValue3')) || 0;
        var casingVolume13 = parseFloat(sessionStorage.getItem('CasingVolumeValue4')) || 0;
        var casingVolume14 = parseFloat(sessionStorage.getItem('CasingVolumeValue5')) || 0;
        
        var costPerBarrel10 = parseFloat(sessionStorage.getItem('costPerBarrelValue10')) || 0;
        var costPerBarrel11 = parseFloat(sessionStorage.getItem('costPerBarrelValue11')) || 0;
        var costPerBarrel12 = parseFloat(sessionStorage.getItem('costPerBarrelValue12')) || 0;
        var costPerBarrel13 = parseFloat(sessionStorage.getItem('costPerBarrelValue13')) || 0;
        var costPerBarrel14 = parseFloat(sessionStorage.getItem('costPerBarrelValue14')) || 0;
        

        // Set text content of each <td> element
        document.getElementById('size1').textContent = parseFloat(size1).toFixed(2) || '0.00';
        document.getElementById('size2').textContent = parseFloat(size2).toFixed(2) || '0.00';
        document.getElementById('size3').textContent = parseFloat(size3).toFixed(2) || '0.00';
        document.getElementById('size4').textContent = parseFloat(size4).toFixed(2) || '0.00';
        document.getElementById('size5').textContent = parseFloat(size5).toFixed(2) || '0.00';
        document.getElementById('size6').textContent = parseFloat(size6).toFixed(2) || '0.00';
        document.getElementById('size7').textContent = parseFloat(size7).toFixed(2) || '0.00';
        document.getElementById('size8').textContent = parseFloat(size8).toFixed(2) || '0.00';
        document.getElementById('size9').textContent = parseFloat(size9).toFixed(2) || '0.00';
        
        document.getElementById('footageDrilled1').textContent = footageDrilled1;
        document.getElementById('footageDrilled2').textContent = footageDrilled2;
        document.getElementById('footageDrilled3').textContent = footageDrilled3;
        document.getElementById('footageDrilled4').textContent = footageDrilled4;
        document.getElementById('footageDrilled5').textContent = footageDrilled5;
        document.getElementById('footageDrilled6').textContent = footageDrilled6;
        document.getElementById('footageDrilled7').textContent = footageDrilled7;
        document.getElementById('footageDrilled8').textContent = footageDrilled8;
        document.getElementById('footageDrilled9').textContent = footageDrilled9;
        
        document.getElementById('waterDepth1').textContent = waterDepth1;
        document.getElementById('waterDepth2').textContent = waterDepth2;
        document.getElementById('waterDepth3').textContent = waterDepth3;
        document.getElementById('waterDepth4').textContent = waterDepth4;
        document.getElementById('waterDepth5').textContent = waterDepth5;
        document.getElementById('waterDepth6').textContent = waterDepth6;
        document.getElementById('waterDepth7').textContent = waterDepth7;
        document.getElementById('waterDepth8').textContent = waterDepth8;
        document.getElementById('waterDepth9').textContent = waterDepth9;
        
        document.getElementById('to1').value = to1;
        document.getElementById('to2').value = to2;
        document.getElementById('to3').value = to3;
        document.getElementById('to4').value = to4;
        document.getElementById('to5').value = to5;
        document.getElementById('to6').value = to6;
        document.getElementById('to7').value = to7;
        document.getElementById('to8').value = to8;
        document.getElementById('to9').value = to9;
        
        document.getElementById('prCasingFrom1').value = prCasingFrom1;
        document.getElementById('prCasingFrom2').value = prCasingFrom2;
        document.getElementById('prCasingFrom3').value = prCasingFrom3;
        document.getElementById('prCasingFrom4').value = prCasingFrom4;
        document.getElementById('prCasingFrom5').value = prCasingFrom5;
        document.getElementById('prCasingFrom6').value = prCasingFrom6;
        document.getElementById('prCasingFrom7').value = prCasingFrom7;
        document.getElementById('prCasingFrom8').value = prCasingFrom8;
        document.getElementById('prCasingFrom9').value = prCasingFrom9;
        
        document.getElementById('prCasingTo1').value = prCasingTo1;
        document.getElementById('prCasingTo2').value = prCasingTo2;
        document.getElementById('prCasingTo3').value = prCasingTo3;
        document.getElementById('prCasingTo4').value = prCasingTo4;
        document.getElementById('prCasingTo5').value = prCasingTo5;
        document.getElementById('prCasingTo6').value = prCasingTo6;
        document.getElementById('prCasingTo7').value = prCasingTo7;
        document.getElementById('prCasingTo8').value = prCasingTo8;
        document.getElementById('prCasingTo9').value = prCasingTo9;
        
        document.getElementById('prCasingId1').value = prCasingId1;
        document.getElementById('prCasingId2').value = prCasingId2;
        document.getElementById('prCasingId3').value = prCasingId3;
        document.getElementById('prCasingId4').value = prCasingId4;
        document.getElementById('prCasingId5').value = prCasingId5;
        document.getElementById('prCasingId6').value = prCasingId6;
        document.getElementById('prCasingId7').value = prCasingId7;
        document.getElementById('prCasingId8').value = prCasingId8;
        document.getElementById('prCasingId9').value = prCasingId9;
        
        document.getElementById('costPerBarrel1').textContent = parseFloat(costPerBarrel1).toFixed(2) || '0.00';
        document.getElementById('costPerBarrel2').textContent = parseFloat(costPerBarrel2).toFixed(2) || '0.00';
        document.getElementById('costPerBarrel3').textContent = parseFloat(costPerBarrel3).toFixed(2) || '0.00';
        document.getElementById('costPerBarrel4').textContent = parseFloat(costPerBarrel4).toFixed(2) || '0.00';
        document.getElementById('costPerBarrel5').textContent = parseFloat(costPerBarrel5).toFixed(2) || '0.00';
        document.getElementById('costPerBarrel6').textContent = parseFloat(costPerBarrel6).toFixed(2) || '0.00';
        document.getElementById('costPerBarrel7').textContent = parseFloat(costPerBarrel7).toFixed(2) || '0.00';
        document.getElementById('costPerBarrel8').textContent = parseFloat(costPerBarrel8).toFixed(2) || '0.00';
        document.getElementById('costPerBarrel9').textContent = parseFloat(costPerBarrel9).toFixed(2) || '0.00';
        
        document.getElementById('totalFootage1').textContent = parseFloat(totalFootage1).toFixed(0) || '0';
        document.getElementById('totalFootage2').textContent = parseFloat(totalFootage2).toFixed(0) || '0';
        document.getElementById('totalFootage3').textContent = parseFloat(totalFootage3).toFixed(0) || '0';
        document.getElementById('totalFootage4').textContent = parseFloat(totalFootage4).toFixed(0) || '0';
        document.getElementById('totalFootage5').textContent = parseFloat(totalFootage5).toFixed(0) || '0';
        
        document.getElementById('surfaceVolume10').textContent = parseFloat(surfaceVolume10).toFixed(0) || '0';
        document.getElementById('surfaceVolume11').textContent = parseFloat(surfaceVolume11).toFixed(0) || '0';
        document.getElementById('surfaceVolume12').textContent = parseFloat(surfaceVolume12).toFixed(0) || '0';
        document.getElementById('surfaceVolume13').textContent = parseFloat(surfaceVolume13).toFixed(0) || '0';
        document.getElementById('surfaceVolume14').textContent = parseFloat(surfaceVolume14).toFixed(0) || '0';
        
        document.getElementById('casingVolume10').textContent = parseFloat(casingVolume10).toFixed(0) || '0';
        document.getElementById('casingVolume11').textContent = parseFloat(casingVolume11).toFixed(0) || '0';
        document.getElementById('casingVolume12').textContent = parseFloat(casingVolume12).toFixed(0) || '0';
        document.getElementById('casingVolume13').textContent = parseFloat(casingVolume13).toFixed(0) || '0';
        document.getElementById('casingVolume14').textContent = parseFloat(casingVolume14).toFixed(0) || '0';
        
        document.getElementById('costPerBarrel10').textContent = parseFloat(costPerBarrel10).toFixed(2) || '0';
        document.getElementById('costPerBarrel11').textContent = parseFloat(costPerBarrel11).toFixed(2) || '0';
        document.getElementById('costPerBarrel12').textContent = parseFloat(costPerBarrel12).toFixed(2) || '0';
        document.getElementById('costPerBarrel13').textContent = parseFloat(costPerBarrel13).toFixed(2) || '0';
        document.getElementById('costPerBarrel14').textContent = parseFloat(costPerBarrel14).toFixed(2) || '0';
        </script>
    </body>
</html>

