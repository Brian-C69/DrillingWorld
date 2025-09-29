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
        <title>Formulations</title>
        <script src="../wencat.js"></script>
    </head>
    <body>
        <?php include '../includes/navCal.php'; ?> 

        <div class="container my-5 text-center text-black">
            <h1>Formulations</h1>
        </div>

        <div class="container p-2 my-2">
            <a href="../calculator.php" class="btn btn-primary">Back</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Items</button>
            <button class="btn btn-primary" onclick="window.print()">Print this page</button>
            <a href="WenCat.php" class="btn btn-primary">WenCat</a>
            <a href="WenCatWBM-SBM-DIF.php" class="btn btn-primary">WBM-SBM-DIF</a>
            <a href="VolCalWBM-SBM-DIF.php" class="btn btn-primary">Vol Cal WBM-SBM-DIF</a>
            <a href="WenCatWBM-DIF.php" class="btn btn-primary">WBM-DIF</a>
            <a href="VolCalWBM-DIF.php" class="btn btn-primary">Vol Cal WBM-DIF</a>
            <a href="WenCatFormulations.php" class="btn btn-success">Formulations</a>
        </div>

        <div class="container text-black">
            <h2>SPUD MUD </h2>
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                  <label for="factor1" class="col-form-label">Factor Active System</label>
                </div>
                <div class="col-auto">
                  <input id="factor1" class="form-control"  type="number"  inputmode="decimal" step="any" min="0" value="1" oninput="calculate()" style="width: 100px;" >
                </div>
            </div>
        </div>
        <div class="container table-responsive">
            <table id="SpudMudTable" class="table table-bordered table-sm table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="colgroup">Product</th>
                        <th scope="colgroup">Unit Size</th>
                        <th scope="colgroup">PPB</th>
                        <th scope="colgroup">Unit Cost (USD)</th>
                        <th scope="colgroup">Quantity</th>
                        <th scope="colgroup">COST/BBL</th>
                        <th scope="colgroup">COST/FT</th>
                        
                    </tr>
                </thead>
                <tbody class="form-group"> 
                    <tr>
                        <th><p class="form-control">Bentonite</p></th>
                        <td><p class="form-control" id="unit1"><?php if (isset($prices['Bentonite'])) {echo $prices['Bentonite']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb1" min="0" value="30" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost1"><?php if (isset($prices['Bentonite'])) {echo $prices['Bentonite']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity1">1</p></td>
                        <td><p class="form-control" id="costBBL1">1</p></td>
                        <td><p class="form-control" id="costFT1">1</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">CAUSTIC SODA</p></td>
                        <td><p class="form-control" id="unit2"><?php if (isset($prices['CAUSTIC SODA'])) {echo $prices['CAUSTIC SODA']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" id="ppb2" type="number"  inputmode="decimal" step="any" value="1.5" min="0" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost2"><?php if (isset($prices['CAUSTIC SODA'])) {echo $prices['CAUSTIC SODA']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity2">2</p></td>
                        <td><p class="form-control" id="costBBL2">2</p></td>
                        <td><p class="form-control" id="costFT2">2</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">SODA ASH (NA2CO3)</p></td>
                        <td><p class="form-control" id="unit3"><?php if (isset($prices['SODA ASH (NA2CO3)'])) {echo $prices['SODA ASH (NA2CO3)']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" id="ppb3" type="number"  inputmode="decimal" step="any" value="1.5" min="0" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost3"><?php if (isset($prices['SODA ASH (NA2CO3)'])) {echo $prices['SODA ASH (NA2CO3)']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity3">3</p></td>
                        <td><p class="form-control" id="costBBL3">3</p></td>
                        <td><p class="form-control" id="costFT3">3</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">KELZAN XCD</p></td>
                        <td><p class="form-control" id="unit4"><?php if (isset($prices['KELZAN XCD'])) {echo $prices['KELZAN XCD']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" id="ppb4" type="number"  inputmode="decimal" step="any" value="2" min="0" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost4"><?php if (isset($prices['KELZAN XCD'])) {echo $prices['KELZAN XCD']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity4">4</p></td>
                        <td><p class="form-control" id="costBBL4">4</p></td>
                        <td><p class="form-control" id="costFT4">4</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">Barite</p></td>
                        <td><p class="form-control" id="unit5"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" id="ppb5" type="number"  inputmode="decimal" step="any" value="1" min="0" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost5"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity5">5</p></td>
                        <td><p class="form-control" id="costBBL5">5</p></td>
                        <td><p class="form-control" id="costFT5">5</p></td>
                    </tr>
                    <tr>
                        <td colspan="5"><b><h4>Section cost without Barite</h4></b></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL1">1<p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT1">1</p></td>
                    </tr>
                    <tr>
                        <td colspan="5"><b><h4>Section cost with Barite</h4></b></td>
                        <td><p class="form-control" id="sectionWithBariteBBL1">1</p></td>
                        <td><p class="form-control" id="sectionWithBariteFT1">1</p></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="container text-black pt-3">
            <h3>DKD MUD</h3>
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                  <label for="factor2" class="col-form-label">Factor Active System</label>
                </div>
                <div class="col-auto">
                  <input id="factor2" class="form-control"  type="number"  inputmode="decimal" step="any" min="0" value="1" oninput="calculate()" style="width: 100px;" >
                </div>
            </div>
        </div>
        
        <div class="container table-responsive">
            <table id="DKDMudTable" class="table table-bordered table-sm table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Unit Size</th>
                        <th scope="col">PPB</th>
                        <th scope="col">Unit Cost (USD)</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">COST/BBL</th>
                        <th scope="col">COST/FT</th>
                    </tr>
                </thead>
                <tbody class="form-group"> 
                    
                    <tr>
                        <th><p class="form-control">Bentonite</p></th>
                        <td><p class="form-control" id="unit6"><?php if (isset($prices['Bentonite'])) {echo $prices['Bentonite']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="30" id="ppb6" min="0" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost6"><?php if (isset($prices['Bentonite'])) {echo $prices['Bentonite']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity6">6</p></td>
                        <td><p class="form-control" id="costBBL6">6</p></td>
                        <td><p class="form-control" id="costFT6">6</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">CAUSTIC SODA</p></td>
                        <td><p class="form-control" id="unit7"><?php if (isset($prices['CAUSTIC SODA'])) {echo $prices['CAUSTIC SODA']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="1" id="ppb7" min="0" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost7"><?php if (isset($prices['CAUSTIC SODA'])) {echo $prices['CAUSTIC SODA']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity7">7</p></td>
                        <td><p class="form-control" id="costBBL7">7</p></td>
                        <td><p class="form-control" id="costFT7">7</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">SODA ASH (NA2CO3)</p></td>
                        <td><p class="form-control" id="unit8"><?php if (isset($prices['SODA ASH (NA2CO3)'])) {echo $prices['SODA ASH (NA2CO3)']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="0.5" id="ppb8" min="0" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost8"><?php if (isset($prices['SODA ASH (NA2CO3)'])) {echo $prices['SODA ASH (NA2CO3)']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity8">8</p></td>
                        <td><p class="form-control" id="costBBL8">8</p></td>
                        <td><p class="form-control" id="costFT8">8</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">KELZAN XCD</p></td>
                        <td><p class="form-control" id="unit9"><?php if (isset($prices['KELZAN XCD'])) {echo $prices['KELZAN XCD']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="0.5" id="ppb9" min="0" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost9"><?php if (isset($prices['KELZAN XCD'])) {echo $prices['KELZAN XCD']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity9">9</p></td>
                        <td><p class="form-control" id="costBBL9">9</p></td>
                        <td><p class="form-control" id="costFT9">9</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">DESCO</p></td>
                        <td><p class="form-control" id="unit10"><?php if (isset($prices['DESCO'])) {echo $prices['DESCO']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="2.0" id="ppb10" min="0" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost10"><?php if (isset($prices['DESCO'])) {echo $prices['DESCO']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity10">10</p></td>
                        <td><p class="form-control" id="costBBL10">10</p></td>
                        <td><p class="form-control" id="costFT10">10</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">FLOWZAN LIQUID</p></td>
                        <td><p class="form-control" id="unit11"><?php if (isset($prices['FLOWZAN LIQUID'])) {echo $prices['FLOWZAN LIQUID']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="2.0" id="ppb11" min="0" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost11"><?php if (isset($prices['FLOWZAN LIQUID'])) {echo $prices['FLOWZAN LIQUID']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity11">11</p></td>
                        <td><p class="form-control" id="costBBL11">11</p></td>
                        <td><p class="form-control" id="costFT11">11</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">Barite</p></td>
                        <td><p class="form-control" id="unit12"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="1" id="ppb12" min="0" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost12"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity12">12</p></td>
                        <td><p class="form-control" id="costBBL12">12</p></td>
                        <td><p class="form-control" id="costFT12">12</p></td>
                    </tr>
                    <tr>
                        <td colspan="5"><b><h4>Section cost without Barite</h4></b></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL2">2</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT2">2</p></td>
                    </tr>
                    <tr>
                        <td colspan="5"><b><h4>Section cost with Barite</h4></b></td>
                        <td><p class="form-control" id="sectionWithBariteBBL2">2</p></td>
                        <td><p class="form-control" id="sectionWithBariteFT2">2</p></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="container text-black pt-3">
            <h3>SBM MUD</h3>
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                  <label for="factor3" class="col-form-label">Factor Active System</label>
                </div>
                <div class="col-auto">
                  <input id="factor3" class="form-control"  type="number"  inputmode="decimal" step="any" min="0" value="1" oninput="calculate()" style="width: 100px;" >
                </div>
            </div>
        </div>
        
        <div class="container-fluid table-responsive">
            <table id="SBMMudTable" class="table table-bordered table-sm table-striped table-hover">
                <thead>
                    <tr>
                        <th colspan="5"></th>
                        <th class="text-center" colspan="2" scope="colgroup">Section 2</th>
                        <th class="text-center" colspan="2" scope="colgroup">Section 3</th>
                        <th class="text-center" colspan="2" scope="colgroup">Section 4</th>
                        <th class="text-center" colspan="2" scope="colgroup">Section 5</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Unit Size</th>
                        <th>PPB</th>
                        <th>Unit Cost (USD)</th>
                        <th>Quantity</th>
                        <th>COST/BBL</th>
                        <th>COST/FT</th>
                        <th>COST/BBL</th>
                        <th>COST/FT</th>
                        <th>COST/BBL</th>
                        <th>COST/FT</th>
                        <th>COST/BBL</th>
                        <th>COST/FT</th>
                    </tr>
                </thead>
                <tbody class="form-group"> 
                    <tr>
                        <th><p class="form-control">SARALINE 185V</p></th>
                        <td><p class="form-control" id="unit13"><?php if (isset($prices['SARALINE 185V'])) {echo $prices['SARALINE 185V']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="0.9" id="ppb13" min="0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost13"><?php if (isset($prices['SARALINE 185V'])) {echo $prices['SARALINE 185V']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity13">13</p></td>
                        <td><p class="form-control" id="costBBL13">13</p></td>
                        <td><p class="form-control" id="costFT13">13</p></td>
                        <td><p class="form-control" id="costBBL14">14</p></td>
                        <td><p class="form-control" id="costFT14">14</p></td>
                        <td><p class="form-control" id="costBBL15">15</p></td>
                        <td><p class="form-control" id="costFT15">15</p></td>
                        <td><p class="form-control" id="costBBL16">16</p></td>
                        <td><p class="form-control" id="costFT16">16</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">LMO P</p></th>
                        <td><p class="form-control" id="unit14"><?php if (isset($prices['LMO P'])) {echo $prices['LMO P']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="8" id="ppb14" min="0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost14"><?php if (isset($prices['LMO P'])) {echo $prices['LMO P']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity14">14</p></td>
                        <td><p class="form-control" id="costBBL17">17</p></td>
                        <td><p class="form-control" id="costFT17">17</p></td>
                        <td><p class="form-control" id="costBBL18">18</p></td>
                        <td><p class="form-control" id="costFT18">18</p></td>
                        <td><p class="form-control" id="costBBL19">19</p></td>
                        <td><p class="form-control" id="costFT19">19</p></td>
                        <td><p class="form-control" id="costBBL20">20</p></td>
                        <td><p class="form-control" id="costFT20">20</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">LMO S</p></th>
                        <td><p class="form-control" id="unit15"><?php if (isset($prices['LMO S'])) {echo $prices['LMO S']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="5" id="ppb15" min="0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost15"><?php if (isset($prices['LMO S'])) {echo $prices['LMO S']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity15">15</p></td>
                        <td><p class="form-control" id="costBBL21">21</p></td>
                        <td><p class="form-control" id="costFT21">21</p></td>
                        <td><p class="form-control" id="costBBL22">22</p></td>
                        <td><p class="form-control" id="costFT22">22</p></td>
                        <td><p class="form-control" id="costBBL23">23</p></td>
                        <td><p class="form-control" id="costFT23">23</p></td>
                        <td><p class="form-control" id="costBBL24">24</p></td>
                        <td><p class="form-control" id="costFT24">24</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">LP TROL HT</p></th>
                        <td><p class="form-control" id="unit16"><?php if (isset($prices['LP TROL HT'])) {echo $prices['LP TROL HT']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="12.0" id="ppb16" min="0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost16"><?php if (isset($prices['LP TROL HT'])) {echo $prices['LP TROL HT']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity16">16</p></td>
                        <td><p class="form-control" id="costBBL25">25</p></td>
                        <td><p class="form-control" id="costFT25">25</p></td>
                        <td><p class="form-control" id="costBBL26">26</p></td>
                        <td><p class="form-control" id="costFT26">26</p></td>
                        <td><p class="form-control" id="costBBL27">27</p></td>
                        <td><p class="form-control" id="costFT27">27</p></td>
                        <td><p class="form-control" id="costBBL28">28</p></td>
                        <td><p class="form-control" id="costFT28">28</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">LP VIS</p></th>
                        <td><p class="form-control" id="unit17"><?php if (isset($prices['LP VIS'])) {echo $prices['LP VIS']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="12" id="ppb17" min="0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost17"><?php if (isset($prices['LP VIS'])) {echo $prices['LP VIS']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity17">17</p></td>
                        <td><p class="form-control" id="costBBL29">29</p></td>
                        <td><p class="form-control" id="costFT29">29</p></td>
                        <td><p class="form-control" id="costBBL30">30</p></td>
                        <td><p class="form-control" id="costFT30">30</p></td>
                        <td><p class="form-control" id="costBBL31">31</p></td>
                        <td><p class="form-control" id="costFT31">31</p></td>
                        <td><p class="form-control" id="costBBL32">32</p></td>
                        <td><p class="form-control" id="costFT32">32</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">LP POLYMER</p></th>
                        <td><p class="form-control" id="unit18"><?php if (isset($prices['LP POLYMER'])) {echo $prices['LP POLYMER']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="3.0" id="ppb18" min="0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost18"><?php if (isset($prices['LP POLYMER'])) {echo $prices['LP POLYMER']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity18">18</p></td>
                        <td><p class="form-control" id="costBBL33">33</p></td>
                        <td><p class="form-control" id="costFT33">33</p></td>
                        <td><p class="form-control" id="costBBL34">34</p></td>
                        <td><p class="form-control" id="costFT34">34</p></td>
                        <td><p class="form-control" id="costBBL35">35</p></td>
                        <td><p class="form-control" id="costFT35">35</p></td>
                        <td><p class="form-control" id="costBBL36">36</p></td>
                        <td><p class="form-control" id="costFT36">36</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">LIME (CA(OH)2)</p></th>
                        <td><p class="form-control" id="unit19"><?php if (isset($prices['LIME (CA(OH)2)'])) {echo $prices['LIME (CA(OH)2)']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="8.0" id="ppb19" min="0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost19"><?php if (isset($prices['LIME (CA(OH)2)'])) {echo $prices['LIME (CA(OH)2)']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity19">19</p></td>
                        <td><p class="form-control" id="costBBL37">37</p></td>
                        <td><p class="form-control" id="costFT37">37</p></td>
                        <td><p class="form-control" id="costBBL38">38</p></td>
                        <td><p class="form-control" id="costFT38">38</p></td>
                        <td><p class="form-control" id="costBBL39">39</p></td>
                        <td><p class="form-control" id="costFT39">39</p></td>
                        <td><p class="form-control" id="costBBL40">40</p></td>
                        <td><p class="form-control" id="costFT40">40</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">CACL2, 94%</p></th>
                        <td><p class="form-control" id="unit20"><?php if (isset($prices['CACL2, 94%'])) {echo $prices['CACL2, 94%']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="38.0" id="ppb20" min="0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost20"><?php if (isset($prices['CACL2, 94%'])) {echo $prices['CACL2, 94%']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity20">20</p></td>
                        <td><p class="form-control" id="costBBL41">41</p></td>
                        <td><p class="form-control" id="costFT41">41</p></td>
                        <td><p class="form-control" id="costBBL42">42</p></td>
                        <td><p class="form-control" id="costFT42">42</p></td>
                        <td><p class="form-control" id="costBBL43">43</p></td>
                        <td><p class="form-control" id="costFT43">43</p></td>
                        <td><p class="form-control" id="costBBL44">44</p></td>
                        <td><p class="form-control" id="costFT44">44</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">Barite Section 2</p></th>
                        <td><p class="form-control" id="unit21"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="1" id="ppb21" min="0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost21"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity21">21</p></td>
                        <td><p class="form-control" id="costBBL45">45</p></td>
                        <td><p class="form-control" id="costFT45">45</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">Barite Section 3</p></th>
                        <td><p class="form-control" id="unit22"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="1" id="ppb22" min="0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost22"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity22">22</p></td>
                        <td></td>
                        <td></td>
                        <td><p class="form-control" id="costBBL46">46</p></td>
                        <td><p class="form-control" id="costFT46">46</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">Barite Section 4</p></th>
                        <td><p class="form-control" id="unit23"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="1" id="ppb23" min="0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost23"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity23">23</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><p class="form-control" id="costBBL47">47</p></td>
                        <td><p class="form-control" id="costFT47">47</p></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">Barite Section 5</p></th>
                        <td><p class="form-control" id="unit24"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" value="1" id="ppb24" min="0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost24"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity24">24</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><p class="form-control" id="costBBL48">48</p></td>
                        <td><p class="form-control" id="costFT48">48</p></td>
                    </tr>
                    <tr>
                        <td colspan="5"><b><h4>Section cost without Barite</h4></b></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL3">3</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT3">3</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL4">4</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT4">4</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL5">5</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT5">5</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL6">6</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT6">6</p></td>
                    </tr>
                    <tr>
                        <td colspan="5"><b><h4>Section cost with Barite</h4></b></td>
                        <td><p class="form-control" id="sectionWithBariteBBL3">3</p></td>
                        <td><p class="form-control" id="sectionWithBariteFT3">3</p></td>
                        <td><p class="form-control" id="sectionWithBariteBBL4">4</p></td>
                        <td><p class="form-control" id="sectionWithBariteFT4">4</p></td>
                        <td><p class="form-control" id="sectionWithBariteBBL5">5</p></td>
                        <td><p class="form-control" id="sectionWithBariteFT5">5</p></td>
                        <td><p class="form-control" id="sectionWithBariteBBL6">6</p></td>
                        <td><p class="form-control" id="sectionWithBariteFT6">6</p></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="container text-black pt-3">
            <h3>DIF MUD</h3>
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                  <label for="factor4" class="col-form-label">Factor Active System</label>
                </div>
                <div class="col-auto">
                  <input id="factor4" class="form-control"  type="number"  inputmode="decimal" step="any" min="0" value="1" oninput="calculate()" style="width: 100px;" >
                </div>
            </div>
        </div>
        
        <div class="container table-responsive">
            <table id="DIFMudTable" class="table table-bordered table-sm table-striped table-hover">
                <thead>
                    <tr>
                        <th colspan="5"></th>
                        <th class="text-center" colspan="2" scope="colgroup">Section 6</th>
                        <th class="text-center" colspan="2" scope="colgroup">Section 7</th>
                        <th class="text-center" colspan="2" scope="colgroup">Section 8</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Unit Size</th>
                        <th>PPB</th>
                        <th>Unit Cost (USD)</th>
                        <th>Quantity</th>
                        <th>COST/BBL</th>
                        <th>COST/FT</th>
                        <th>COST/BBL</th>
                        <th>COST/FT</th>
                        <th>COST/BBL</th>
                        <th>COST/FT</th>
                    </tr>
                </thead>
                <tbody class="form-group"> 
                    <tr>
                        <th><p class="form-control">KCL</p></th>
                        <td><p class="form-control" id="unit25"><?php if (isset($prices['KCL'])) {echo $prices['KCL']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb25" min="0" value="40" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost25"><?php if (isset($prices['KCL'])) {echo $prices['KCL']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity25">25</p></td>
                        <td><p class="form-control" id="costBBL49">49</p></td>
                        <td><p class="form-control" id="costFT49">49</p></td>
                        <td><p class="form-control" id="costBBL50">50</p></td>
                        <td><p class="form-control" id="costFT50">50</p></td>
                        <td><p class="form-control" id="costBBL51">51</p></td>
                        <td><p class="form-control" id="costFT51">51</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">SALT (V)</p></th>
                        <td><p class="form-control" id="unit26"><?php if (isset($prices['SALT (V)'])) {echo $prices['SALT (V)']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb26" min="0" value="80" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost26"><?php if (isset($prices['SALT (V)'])) {echo $prices['SALT (V)']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity26">26</p></td>
                        <td><p class="form-control" id="costBBL52">52</p></td>
                        <td><p class="form-control" id="costFT52">52</p></td>
                        <td><p class="form-control" id="costBBL53">53</p></td>
                        <td><p class="form-control" id="costFT53">53</p></td>
                        <td><p class="form-control" id="costBBL54">54</p></td>
                        <td><p class="form-control" id="costFT54">54</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">SODA ASH (NA2CO3)</p></th>
                        <td><p class="form-control" id="unit27"><?php if (isset($prices['SODA ASH (NA2CO3)'])) {echo $prices['SODA ASH (NA2CO3)']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb27" min="0" value="1.5" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost27"><?php if (isset($prices['SODA ASH (NA2CO3)'])) {echo $prices['SODA ASH (NA2CO3)']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity27">27</p></td>
                        <td><p class="form-control" id="costBBL55">55</p></td>
                        <td><p class="form-control" id="costFT55">55</p></td>
                        <td><p class="form-control" id="costBBL56">56</p></td>
                        <td><p class="form-control" id="costFT56">56</p></td>
                        <td><p class="form-control" id="costBBL57">57</p></td>
                        <td><p class="form-control" id="costFT57">57</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">Alkaline Control, MgO</p></th>
                        <td><p class="form-control" id="unit28"><?php if (isset($prices['Alkaline Control, MgO'])) {echo $prices['Alkaline Control, MgO']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb28" min="0" value="1.5" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost28"><?php if (isset($prices['Alkaline Control, MgO'])) {echo $prices['Alkaline Control, MgO']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity28">28</p></td>
                        <td><p class="form-control" id="costBBL58">58</p></td>
                        <td><p class="form-control" id="costFT58">58</p></td>
                        <td><p class="form-control" id="costBBL59">59</p></td>
                        <td><p class="form-control" id="costFT59">59</p></td>
                        <td><p class="form-control" id="costBBL60">60</p></td>
                        <td><p class="form-control" id="costFT60">60</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">XANVIS</p></th>
                        <td><p class="form-control" id="unit29"><?php if (isset($prices['XANVIS'])) {echo $prices['XANVIS']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb29" min="0" value="2.0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost29"><?php if (isset($prices['XANVIS'])) {echo $prices['XANVIS']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity29">29</p></td>
                        <td><p class="form-control" id="costBBL61">61</p></td>
                        <td><p class="form-control" id="costFT61">61</p></td>
                        <td><p class="form-control" id="costBBL62">62</p></td>
                        <td><p class="form-control" id="costFT62">62</p></td>
                        <td><p class="form-control" id="costBBL63">63</p></td>
                        <td><p class="form-control" id="costFT63">63</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">STAFLO-SL</p></th>
                        <td><p class="form-control" id="unit30"><?php if (isset($prices['STAFLO-SL'])) {echo $prices['STAFLO-SL']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb30" min="0" value="6.0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost30"><?php if (isset($prices['STAFLO-SL'])) {echo $prices['STAFLO-SL']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity30">30</p></td>
                        <td><p class="form-control" id="costBBL64">64</p></td>
                        <td><p class="form-control" id="costFT64">64</p></td>
                        <td><p class="form-control" id="costBBL65">65</p></td>
                        <td><p class="form-control" id="costFT65">65</p></td>
                        <td><p class="form-control" id="costBBL66">66</p></td>
                        <td><p class="form-control" id="costFT66">66</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">RADIAGREEN EBL</p></th>
                        <td><p class="form-control" id="unit31"><?php if (isset($prices['RADIAGREEN EBL'])) {echo $prices['RADIAGREEN EBL']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb31" min="0" value="12.0" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost31"><?php if (isset($prices['RADIAGREEN EBL'])) {echo $prices['RADIAGREEN EBL']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity31">31</p></td>
                        <td><p class="form-control" id="costBBL67">67</p></td>
                        <td><p class="form-control" id="costFT67">67</p></td>
                        <td><p class="form-control" id="costBBL68">68</p></td>
                        <td><p class="form-control" id="costFT68">68</p></td>
                        <td><p class="form-control" id="costBBL69">69</p></td>
                        <td><p class="form-control" id="costFT69">69</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">HE 300 DRY</p></th>
                        <td><p class="form-control" id="unit32"><?php if (isset($prices['HE 300 DRY'])) {echo $prices['HE 300 DRY']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb32" min="0" value="1" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost32"><?php if (isset($prices['HE 300 DRY'])) {echo $prices['HE 300 DRY']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity32">32</p></td>
                        <td><p class="form-control" id="costBBL70">70</p></td>
                        <td><p class="form-control" id="costFT70">70</p></td>
                        <td><p class="form-control" id="costBBL71">71</p></td>
                        <td><p class="form-control" id="costFT71">71</p></td>
                        <td><p class="form-control" id="costBBL72">72</p></td>
                        <td><p class="form-control" id="costFT72">72</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">OPTA-CARB Section 6</p></th>
                        <td><p class="form-control" id="unit33"><?php if (isset($prices['OPTA-CARB'])) {echo $prices['OPTA-CARB']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb33" min="0" value="1" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost33"><?php if (isset($prices['OPTA-CARB'])) {echo $prices['OPTA-CARB']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity33">33</p></td>
                        <td><p class="form-control" id="costBBL73">73</p></td>
                        <td><p class="form-control" id="costFT73">73</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">OPTA-CARB Section 7</p></th>
                        <td><p class="form-control" id="unit34"><?php if (isset($prices['OPTA-CARB'])) {echo $prices['OPTA-CARB']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb34" min="0" value="1" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost34"><?php if (isset($prices['OPTA-CARB'])) {echo $prices['OPTA-CARB']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity34">34</p></td>
                        <td></td>
                        <td></td>
                        <td><p class="form-control" id="costBBL74">74</p></td>
                        <td><p class="form-control" id="costFT74">74</p></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">OPTA-CARB Section 8</p></th>
                        <td><p class="form-control" id="unit35"><?php if (isset($prices['OPTA-CARB'])) {echo $prices['OPTA-CARB']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb35" min="0" value="1" oninput="calculate()" style="width: 100px;" ></td>
                        <td><p class="form-control" id="cost35"><?php if (isset($prices['OPTA-CARB'])) {echo $prices['OPTA-CARB']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity35">35</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><p class="form-control" id="costBBL75">75</p></td>
                        <td><p class="form-control" id="costFT75">75</p></td>
                    </tr>
                    <tr>
                        <td colspan="5"><b><h4>Section cost without Barite</h4></b></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL7">7</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT7">7</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL8">8</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT8">8</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL9">9</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT9">9</p></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="container text-black pt-3">
            <h2>BRINES</h2>
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                  <label for="factor5" class="col-form-label">Factor Active System</label>
                </div>
                <div class="col-auto">
                  <input id="factor5" class="form-control"  type="number"  inputmode="decimal" step="any" min="0" value="1" oninput="calculate()" style="width: 100px;" >
                </div>
            </div>
        </div>
        <div class="container table-responsive">
            <table id="BrinesTable" class="table table-bordered table-sm table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="colgroup">Product</th>
                        <th scope="colgroup">Unit Size</th>
                        <th scope="colgroup">PPB</th>
                        <th scope="colgroup">Unit Cost (USD)</th>
                        <th scope="colgroup">Quantity</th>
                        <th scope="colgroup">COST/BBL</th>
                        <th scope="colgroup">COST/FT</th>
                        
                    </tr>
                </thead>
                <tbody class="form-group"> 
                    <tr>
                        <th><p class="form-control">SALT (V)</p></th>
                        <td><p class="form-control" id="unit36"><?php if (isset($prices['SALT (V)'])) {echo $prices['SALT (V)']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb36" min="0" value="1" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost36"><?php if (isset($prices['SALT (V)'])) {echo $prices['SALT (V)']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity36">36</p></td>
                        <td><p class="form-control" id="costBBL76">76</p></td>
                        <td><p class="form-control" id="costFT76">76</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">KCL</p></td>
                        <td><p class="form-control" id="unit37"><?php if (isset($prices['KCL'])) {echo $prices['KCL']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb37" min="0" value="1" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost37"><?php if (isset($prices['KCL'])) {echo $prices['KCL']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity37">37</p></td>
                        <td><p class="form-control" id="costBBL77">77</p></td>
                        <td><p class="form-control" id="costFT77">77</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">CACL2, 94% 2</p></td>
                        <td><p class="form-control" id="unit38"><?php if (isset($prices['CACL2, 94% 2'])) {echo $prices['CACL2, 94% 2']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb38" min="0" value="1" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost38"><?php if (isset($prices['CACL2, 94% 2'])) {echo $prices['CACL2, 94% 2']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity38">38</p></td>
                        <td><p class="form-control" id="costBBL78">78</p></td>
                        <td><p class="form-control" id="costFT78">78</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">SODIUM BOMIDE PURE</p></td>
                        <td><p class="form-control" id="unit39"><?php if (isset($prices['SODIUM BOMIDE PURE'])) {echo $prices['SODIUM BOMIDE PURE']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb39" min="0" value="1" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost39"><?php if (isset($prices['SODIUM BOMIDE PURE'])) {echo $prices['SODIUM BOMIDE PURE']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity39">39</p></td>
                        <td><p class="form-control" id="costBBL79">79</p></td>
                        <td><p class="form-control" id="costFT79">79</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">CALCIUM BROMIDE (95 WT%)</p></td>
                        <td><p class="form-control" id="unit40"><?php if (isset($prices['CALCIUM BROMIDE (95 WT%)'])) {echo $prices['CALCIUM BROMIDE (95 WT%)']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb40" min="0" value="1" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost40"><?php if (isset($prices['CALCIUM BROMIDE (95 WT%)'])) {echo $prices['CALCIUM BROMIDE (95 WT%)']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity40">40</p></td>
                        <td><p class="form-control" id="costBBL80">80</p></td>
                        <td><p class="form-control" id="costFT80">80<p></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="container text-black pt-3">
            <h3>WBM MUD</h3>
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                  <label for="factor6" class="col-form-label">Factor Active System</label>
                </div>
                <div class="col-auto">
                  <input id="factor6" class="form-control"  type="number"  inputmode="decimal" step="any" min="0" value="1" oninput="calculate()" style="width: 100px;" >
                </div>
            </div>
        </div>
        
        <div class="container-fluid table-responsive">
            <table id="WBMMudTable" class="table table-bordered table-sm table-striped table-hover">
                <thead>
                    <tr>
                        <th colspan="5"></th>
                        <th class="text-center" colspan="2" scope="colgroup">Section 2</th>
                        <th class="text-center" colspan="2" scope="colgroup">Section 3</th>
                        <th class="text-center" colspan="2" scope="colgroup">Section 4</th>
                        <th class="text-center" colspan="2" scope="colgroup">Section 5</th>
                        <th class="text-center" colspan="2" scope="colgroup">Section 6</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Unit Size</th>
                        <th>PPB</th>
                        <th>Unit Cost (USD)</th>
                        <th>Quantity</th>
                        <th>COST/BBL</th>
                        <th>COST/FT</th>
                        <th>COST/BBL</th>
                        <th>COST/FT</th>
                        <th>COST/BBL</th>
                        <th>COST/FT</th>
                        <th>COST/BBL</th>
                        <th>COST/FT</th>
                        <th>COST/BBL</th>
                        <th>COST/FT</th>
                    </tr>
                </thead>
                <tbody class="form-group"> 
                    <tr>
                        <th><p class="form-control">KCL</p></th>
                        <td><p class="form-control" id="unit41"><?php if (isset($prices['KCL'])) {echo $prices['KCL']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb41" min="0" value="40" oninput="calculate()" style="width: 120px;"></td>
                        <td><p class="form-control" id="cost41"><?php if (isset($prices['KCL'])) {echo $prices['KCL']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity41">41</p></td>
                        <td><p class="form-control" id="costBBL81">81</p></td>
                        <td><p class="form-control" id="costFT81">81</p></td>
                        <td><p class="form-control" id="costBBL82">82</p></td>
                        <td><p class="form-control" id="costFT82">82</p></td>
                        <td><p class="form-control" id="costBBL83">83</p></td>
                        <td><p class="form-control" id="costFT83">83</p></td>
                        <td><p class="form-control" id="costBBL84">84</p></td>
                        <td><p class="form-control" id="costFT84">84</p></td>
                        <td><p class="form-control" id="costBBL85">85</p></td>
                        <td><p class="form-control" id="costFT85">85</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">SALT (V)</p></th>
                        <td><p class="form-control" id="unit42"><?php if (isset($prices['SALT (V)'])) {echo $prices['SALT (V)']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb42" min="0" value="80" oninput="calculate()" style="width: 120px;"></td>
                        <td><p class="form-control" id="cost42"><?php if (isset($prices['SALT (V)'])) {echo $prices['SALT (V)']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity42">42</p></td>
                        <td><p class="form-control" id="costBBL86">86</p></td>
                        <td><p class="form-control" id="costFT86">86</p></td>
                        <td><p class="form-control" id="costBBL87">87</p></td>
                        <td><p class="form-control" id="costFT87">87</p></td>
                        <td><p class="form-control" id="costBBL88">88</p></td>
                        <td><p class="form-control" id="costFT88">88</p></td>
                        <td><p class="form-control" id="costBBL89">89<p></td>
                        <td><p class="form-control" id="costFT89">89</p></td>
                        <td><p class="form-control" id="costBBL90">90</p></td>
                        <td><p class="form-control" id="costFT90">90</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">SODA ASH (NA2CO3)</p></th>
                        <td><p class="form-control" id="unit43"><?php if (isset($prices['SODA ASH (NA2CO3)'])) {echo $prices['SODA ASH (NA2CO3)']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb43" min="0" value="1.5" oninput="calculate()" style="width: 120px;"></td>
                        <td><p class="form-control" id="cost43"><?php if (isset($prices['SODA ASH (NA2CO3)'])) {echo $prices['SODA ASH (NA2CO3)']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity43">43</p></td>
                        <td><p class="form-control" id="costBBL91">91</p></td>
                        <td><p class="form-control" id="costFT91">91</p></td>
                        <td><p class="form-control" id="costBBL92">92</p></td>
                        <td><p class="form-control" id="costFT92">92</p></td>
                        <td><p class="form-control" id="costBBL93">93</p></td>
                        <td><p class="form-control" id="costFT93">93</p></td>
                        <td><p class="form-control" id="costBBL94">94</p></td>
                        <td><p class="form-control" id="costFT94">94</p></td>
                        <td><p class="form-control" id="costBBL95">95</p></td>
                        <td><p class="form-control" id="costFT95">95</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">CAUSTIC SODA</p></th>
                        <td><p class="form-control" id="unit44"><?php if (isset($prices['CAUSTIC SODA'])) {echo $prices['CAUSTIC SODA']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb44" min="0" value="1.5" oninput="calculate()" style="width: 120px;"></td>
                        <td><p class="form-control" id="cost44"><?php if (isset($prices['CAUSTIC SODA'])) {echo $prices['CAUSTIC SODA']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity44">44</p></td>
                        <td><p class="form-control" id="costBBL96">96</p></td>
                        <td><p class="form-control" id="costFT96">96</p></td>
                        <td><p class="form-control" id="costBBL97">97</p></td>
                        <td><p class="form-control" id="costFT97">97</p></td>
                        <td><p class="form-control" id="costBBL98">98</p></td>
                        <td><p class="form-control" id="costFT98">98</p></td>
                        <td><p class="form-control" id="costBBL99">99</p></td>
                        <td><p class="form-control" id="costFT99">99</p></td>
                        <td><p class="form-control" id="costBBL100">100</p></td>
                        <td><p class="form-control" id="costFT100">100</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">XANVIS</p></th>
                        <td><p class="form-control" id="unit45"><?php if (isset($prices['XANVIS'])) {echo $prices['XANVIS']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb45" min="0" value="2" oninput="calculate()" style="width: 120px;"></td>
                        <td><p class="form-control" id="cost45"><?php if (isset($prices['XANVIS'])) {echo $prices['XANVIS']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity45">45</p></td>
                        <td><p class="form-control" id="costBBL101">101</p></td>
                        <td><p class="form-control" id="costFT101">101</p></td>
                        <td><p class="form-control" id="costBBL102">102</p></td>
                        <td><p class="form-control" id="costFT102">102</p></td>
                        <td><p class="form-control" id="costBBL103">103</p></td>
                        <td><p class="form-control" id="costFT103">103</p></td>
                        <td><p class="form-control" id="costBBL104">104</p></td>
                        <td><p class="form-control" id="costFT104">104</p></td>
                        <td><p class="form-control" id="costBBL105">105</p></td>
                        <td><p class="form-control" id="costFT105">105</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">STAFLO-SL</p></th>
                        <td><p class="form-control" id="unit46"><?php if (isset($prices['STAFLO-SL'])) {echo $prices['STAFLO-SL']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb46" min="0" value="6.0" oninput="calculate()" style="width: 120px;"></td>
                        <td><p class="form-control" id="cost46"><?php if (isset($prices['STAFLO-SL'])) {echo $prices['STAFLO-SL']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity46">46</p></td>
                        <td><p class="form-control" id="costBBL106">106</p></td>
                        <td><p class="form-control" id="costFT106">106</p></td>
                        <td><p class="form-control" id="costBBL107">107</p></td>
                        <td><p class="form-control" id="costFT107">107</p></td>
                        <td><p class="form-control" id="costBBL108">108</p></td>
                        <td><p class="form-control" id="costFT108">108</p></td>
                        <td><p class="form-control" id="costBBL109">109</p></td>
                        <td><p class="form-control" id="costFT109">109</p></td>
                        <td><p class="form-control" id="costBBL110">110</p></td>
                        <td><p class="form-control" id="costFT110">110</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">K-PLUS(L)</p></th>
                        <td><p class="form-control" id="unit47"><?php if (isset($prices['K-PLUS(L)'])) {echo $prices['K-PLUS(L)']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb47" min="0" value="6.0" oninput="calculate()" style="width: 120px;"></td>
                        <td><p class="form-control" id="cost47"><?php if (isset($prices['K-PLUS(L)'])) {echo $prices['K-PLUS(L)']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity47">47</p></td>
                        <td><p class="form-control" id="costBBL111">111</p></td>
                        <td><p class="form-control" id="costFT111">111</p></td>
                        <td><p class="form-control" id="costBBL112">112</p></td>
                        <td><p class="form-control" id="costFT112">112</p></td>
                        <td><p class="form-control" id="costBBL113">113</p></td>
                        <td><p class="form-control" id="costFT113">113</p></td>
                        <td><p class="form-control" id="costBBL114">114</p></td>
                        <td><p class="form-control" id="costFT114">114</p></td>
                        <td><p class="form-control" id="costBBL115">115</p></td>
                        <td><p class="form-control" id="costFT115">115</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">DCP 208</p></th>
                        <td><p class="form-control" id="unit48"><?php if (isset($prices['DCP 208'])) {echo $prices['DCP 208']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb48" min="0" value="12.0" oninput="calculate()"style="width: 120px;"></td>
                        <td><p class="form-control" id="cost48"><?php if (isset($prices['DCP 208'])) {echo $prices['DCP 208']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity48">48</p></td>
                        <td><p class="form-control" id="costBBL116">116</p></td>
                        <td><p class="form-control" id="costFT116">116</p></td>
                        <td><p class="form-control" id="costBBL117">117</p></td>
                        <td><p class="form-control" id="costFT117">117</p></td>
                        <td><p class="form-control" id="costBBL118">118</p></td>
                        <td><p class="form-control" id="costFT118">118</p></td>
                        <td><p class="form-control" id="costBBL119">119</p></td>
                        <td><p class="form-control" id="costFT119">119</p></td>
                        <td><p class="form-control" id="costBBL120">120</p></td>
                        <td><p class="form-control" id="costFT120">120</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">RADIAGREEN EBL</p></th>
                        <td><p class="form-control" id="unit49"><?php if (isset($prices['RADIAGREEN EBL'])) {echo $prices['RADIAGREEN EBL']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb49" min="0" value="12.0" oninput="calculate()" style="width: 120px;"></td>
                        <td><p class="form-control" id="cost49"><?php if (isset($prices['RADIAGREEN EBL'])) {echo $prices['RADIAGREEN EBL']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity49">49</p></td>
                        <td><p class="form-control" id="costBBL121">121</p></td>
                        <td><p class="form-control" id="costFT121">121</p></td>
                        <td><p class="form-control" id="costBBL122">122</p></td>
                        <td><p class="form-control" id="costFT122">122</p></td>
                        <td><p class="form-control" id="costBBL123">123</p></td>
                        <td><p class="form-control" id="costFT123">123</p></td>
                        <td><p class="form-control" id="costBBL124">124</p></td>
                        <td><p class="form-control" id="costFT124">124</p></td>
                        <td><p class="form-control" id="costBBL125">125</p></td>
                        <td><p class="form-control" id="costFT125">125</p></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">Barite Section 2</p></th>
                        <td><p class="form-control" id="unit50"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb50" min="0" value="1" oninput="calculate()" style="width: 120px;"></td>
                        <td><p class="form-control" id="cost50"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity50">50</p></td>
                        <td><p class="form-control" id="costBBL126">126</p></td>
                        <td><p class="form-control" id="costFT126">126</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">Barite Section 3</p></th>
                        <td><p class="form-control" id="unit51"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb51" min="0" value="1" oninput="calculate()" style="width: 120px;"></td>
                        <td><p class="form-control" id="cost51"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity51">51</p></td>
                        <td></td>
                        <td></td>
                        <td><p class="form-control" id="costBBL127">127</p></td>
                        <td><p class="form-control" id="costFT127">127</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">Barite Section 4</p></th>
                        <td><p class="form-control" id="unit52"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb52" min="0" value="1" oninput="calculate()" style="width: 120px;"></td>
                        <td><p class="form-control" id="cost52"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity52">52</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><p class="form-control" id="costBBL128">128</p></td>
                        <td><p class="form-control" id="costFT128">128</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">Barite Section 5</p></th>
                        <td><p class="form-control" id="unit53"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb53" min="0" value="1" oninput="calculate()" style="width: 120px;"></td>
                        <td><p class="form-control" id="cost53"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity53">53</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><p class="form-control" id="costBBL129">129</p></td>
                        <td><p class="form-control" id="costFT129">129</p></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th><p class="form-control">Barite Section 6</p></th>
                        <td><p class="form-control" id="unit54"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb54" min="0" value="1" oninput="calculate()" style="width: 120px;"></td>
                        <td><p class="form-control" id="cost54"><?php if (isset($prices['Barite'])) {echo $prices['Barite']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity54">54</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td
                        <td></td>
                        <td></td>
                        <td><p class="form-control" id="costBBL130">130</p></td>
                        <td><p class="form-control" id="costFT130">130</p></td>
                    </tr>
                    <tr>
                        <td colspan="5"><b><h4>Section cost without Barite</h4></b></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL11">11</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT11">11</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL12">12</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT12">12</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL13">13</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT13">13</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL14">14</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT14">14</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteBBL15">15</p></td>
                        <td><p class="form-control" id="sectionWithoutBariteFT15">15</p></td>
                    </tr>
                    <tr>
                        <td colspan="5"><b><h4>Section cost with Barite</h4></b></td>
                        <td><p class="form-control" id="sectionWithBariteBBL11">11</p></td>
                        <td><p class="form-control" id="sectionWithBariteFT11">11</p></td>
                        <td><p class="form-control" id="sectionWithBariteBBL12">12</p></td>
                        <td><p class="form-control" id="sectionWithBariteFT12">12</p></td>
                        <td><p class="form-control" id="sectionWithBariteBBL13">13</p></td>
                        <td><p class="form-control" id="sectionWithBariteFT13">13</p></td>
                        <td><p class="form-control" id="sectionWithBariteBBL14">14</p></td>
                        <td><p class="form-control" id="sectionWithBariteFT14">14</p></td>
                        <td><p class="form-control" id="sectionWithBariteBBL15">15</p></td>
                        <td><p class="form-control" id="sectionWithBariteFT15">15</p></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="container text-black pt-3">
            <h2>BRINES</h2>
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                  <label for="factor5" class="col-form-label">Factor Active System</label>
                </div>
                <div class="col-auto">
                  <input id="factor7" class="form-control"  type="number"  inputmode="decimal" step="any" min="0" value="1" oninput="calculate()" style="width: 100px;" >
                </div>
            </div>
        </div>
        <div class="container table-responsive">
            <table id="BrinesTable" class="table table-bordered table-sm table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="colgroup">Product</th>
                        <th scope="colgroup">Unit Size</th>
                        <th scope="colgroup">PPB</th>
                        <th scope="colgroup">Unit Cost (USD)</th>
                        <th scope="colgroup">Quantity</th>
                        <th scope="colgroup">COST/BBL</th>
                        <th scope="colgroup">COST/FT</th>
                        
                    </tr>
                </thead>
                <tbody class="form-group"> 
                    <tr>
                        <th><p class="form-control">SALT (V)</p></th>
                        <td><p class="form-control" id="unit55"><?php if (isset($prices['SALT (V)'])) {echo $prices['SALT (V)']['unit']; } else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb55" min="0" value="1" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost55"><?php if (isset($prices['SALT (V)'])) {echo $prices['SALT (V)']['cost']; } else { echo 'Price not available';} ?></p></td>
                        <td><p class="form-control" id="quantity55">55</p></td>
                        <td><p class="form-control" id="costBBL131">131</p></td>
                        <td><p class="form-control" id="costFT131">131</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">KCL</p></td>
                        <td><p class="form-control" id="unit56"><?php if (isset($prices['KCL'])) {echo $prices['KCL']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb56" min="0" value="1" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost56"><?php if (isset($prices['KCL'])) {echo $prices['KCL']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity56">56</p></td>
                        <td><p class="form-control" id="costBBL132">132</p></td>
                        <td><p class="form-control" id="costFT132">132</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">CACL2, 94% 2</p></td>
                        <td><p class="form-control" id="unit57"><?php if (isset($prices['CACL2, 94% 2'])) {echo $prices['CACL2, 94% 2']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb57" min="0" value="1" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost57"><?php if (isset($prices['CACL2, 94% 2'])) {echo $prices['CACL2, 94% 2']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity57">57</p></td>
                        <td><p class="form-control" id="costBBL133">133</p></td>
                        <td><p class="form-control" id="costFT133">133</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">SODIUM BOMIDE PURE</p></td>
                        <td><p class="form-control" id="unit58"><?php if (isset($prices['SODIUM BOMIDE PURE'])) {echo $prices['SODIUM BOMIDE PURE']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb58" min="0" value="1" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost58"><?php if (isset($prices['SODIUM BOMIDE PURE'])) {echo $prices['SODIUM BOMIDE PURE']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity58">58</p></td>
                        <td><p class="form-control" id="costBBL134">134</p></td>
                        <td><p class="form-control" id="costFT134">134</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-control">CALCIUM BROMIDE (95 WT%)</p></td>
                        <td><p class="form-control" id="unit59"><?php if (isset($prices['CALCIUM BROMIDE (95 WT%)'])) {echo $prices['CALCIUM BROMIDE (95 WT%)']['unit'];} else {echo 'Unit not available';}?></p></td>
                        <td><input class="form-control" type="number"  inputmode="decimal" step="any" id="ppb59" min="0" value="1" oninput="calculate()" style="width: 120px;" ></td>
                        <td><p class="form-control" id="cost59"><?php if (isset($prices['CALCIUM BROMIDE (95 WT%)'])) {echo $prices['CALCIUM BROMIDE (95 WT%)']['cost'];} else {echo 'Price not available';}?></p></td>
                        <td><p class="form-control" id="quantity59">59</p></td>
                        <td><p class="form-control" id="costBBL135">135</p></td>
                        <td><p class="form-control" id="costFT135">135<p></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php include '../includes/footer.php'; ?>
        <script>
        var BrineWeight1 = sessionStorage.getItem('BrineWeightValue1') || 0;  
        var BrineWeight2 = sessionStorage.getItem('BrineWeightValue2') || 0;  
        var BrineWeight3 = sessionStorage.getItem('BrineWeightValue3') || 0;  
        var BrineWeight4 = sessionStorage.getItem('BrineWeightValue4') || 0;  
        var BrineWeight5 = sessionStorage.getItem('BrineWeightValue5') || 0; 
        
        var BrineWeight6 = sessionStorage.getItem('BrineWeightValue6') || 0;  
        var BrineWeight7 = sessionStorage.getItem('BrineWeightValue7') || 0;  
        var BrineWeight8 = sessionStorage.getItem('BrineWeightValue8') || 0;  
        var BrineWeight9 = sessionStorage.getItem('BrineWeightValue9') || 0;  
        var BrineWeight10 = sessionStorage.getItem('BrineWeightValue10') || 0; 
        
        var ppb36 = 672 * ((((BrineWeight1 / 0.052) - 8.33)/ (16 - 8.33))) * 0.8;
        var ppb37 = 696 * (((BrineWeight2 / 0.052) - 8.33) / (16.58-8.33)) * 0.9;
        var ppb38 = 742 * (((BrineWeight3 / 0.052) -8.33)/(17.66 - 8.33)) * 0.82;
        var ppb39 = 766 * (((BrineWeight4 / 0.052) -8.33) / (18.24-8.33)) * 0.82;
        var ppb40 = 822 * (((BrineWeight5 / 0.052) -8.33) / (19.58-8.33)) * 0.82;
        
        var ppb55 = 672 * ((((BrineWeight6 / 0.052) - 8.33)/ (16 - 8.33))) * 0.8;
        var ppb56 = 696 * (((BrineWeight7 / 0.052) - 8.33) / (16.58-8.33)) * 0.9;
        var ppb57 = 742 * (((BrineWeight8 / 0.052) -8.33)/(17.66 - 8.33)) * 0.82;
        var ppb58 = 766 * (((BrineWeight9 / 0.052) -8.33) / (18.24-8.33)) * 0.82;
        var ppb59 = 822 * (((BrineWeight10 / 0.052) -8.33) / (19.58-8.33)) * 0.82;
        
        document.getElementById('ppb36').value = ppb36.toFixed(2);
        document.getElementById('ppb37').value = ppb37.toFixed(2);
        document.getElementById('ppb38').value = ppb38.toFixed(2);
        document.getElementById('ppb39').value = ppb39.toFixed(2);
        document.getElementById('ppb40').value = ppb40.toFixed(2);
        
        document.getElementById('ppb55').value = ppb55.toFixed(2);
        document.getElementById('ppb56').value = ppb56.toFixed(2);
        document.getElementById('ppb57').value = ppb57.toFixed(2);
        document.getElementById('ppb58').value = ppb58.toFixed(2);
        document.getElementById('ppb59').value = ppb59.toFixed(2);
            
        var cost36 = parseFloat(document.getElementById('cost36').textContent) || 0;
        var cost37 = parseFloat(document.getElementById('cost37').textContent) || 0;
        var cost38 = parseFloat(document.getElementById('cost38').textContent) || 0;
        var cost39 = parseFloat(document.getElementById('cost39').textContent) || 0;
        var cost40 = parseFloat(document.getElementById('cost40').textContent) || 0;
        
        var cost55 = parseFloat(document.getElementById('cost55').textContent) || 0;
        var cost56 = parseFloat(document.getElementById('cost56').textContent) || 0;
        var cost57 = parseFloat(document.getElementById('cost57').textContent) || 0;
        var cost58 = parseFloat(document.getElementById('cost58').textContent) || 0;
        var cost59 = parseFloat(document.getElementById('cost59').textContent) || 0;
        
        sessionStorage.setItem('costValue36', cost36);
        sessionStorage.setItem('costValue37', cost37);
        sessionStorage.setItem('costValue38', cost38);
        sessionStorage.setItem('costValue39', cost39);
        sessionStorage.setItem('costValue40', cost40);
        
        sessionStorage.setItem('costValue55', cost55);
        sessionStorage.setItem('costValue56', cost56);
        sessionStorage.setItem('costValue57', cost57);
        sessionStorage.setItem('costValue58', cost58);
        sessionStorage.setItem('costValue59', cost59);
        </script>
    </body>
</html>