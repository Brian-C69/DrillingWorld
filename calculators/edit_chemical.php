<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include database configuration
require_once "../config.php";

// Validate CHID
if (!isset($_GET['chid']) || !is_numeric($_GET['chid'])) {
    $_SESSION['error_message'] = "Invalid chemical ID.";
    header("location: WenCat.php");
    exit;
}

$chemical_id = $_GET['chid'];

// Fetch chemical price data from the database based on the provided CHID
$sql = "SELECT * FROM chemical_prices WHERE chid = ?";
if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $chemical_id);
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $chemical = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['error_message'] = "Failed to fetch chemical data.";
        header("location: WenCat.php");
        exit;
    }
    mysqli_stmt_close($stmt);
}

// Check if the chemical exists
if (!$chemical) {
    $_SESSION['error_message'] = "Chemical not found.";
    header("location: WenCat.php");
    exit;
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    
    $serviceNum = trim($_POST["editServiceNum"]);
    $productName = trim($_POST["editProductName"]);
    $unit = trim($_POST["editUnit"]);
    $cost = trim($_POST["editCost"]);
    $user_id = $_SESSION["id"]; // Assuming you have a user ID stored in the session
    // Validate form data (perform your validation here)
    
    
    // Update database
    $sql = "UPDATE chemical_prices SET serviceNum = ?, productName = ?, unit = ?, cost = ? WHERE chid = ? AND userId = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssii", $serviceNum, $productName, $unit, $cost, $chemical_id, $user_id);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
           
            header("location: " . $_SERVER["PHP_SELF"]); // Redirect to refresh the page
            exit;
        } else {
            $_SESSION['error_message'] = "Failed to update chemical data.";
            header("location: " . $_SERVER["PHP_SELF"]);
            exit;
        }
    } else {
        $_SESSION['error_message'] = "Failed to prepare statement.";
        header("location: " . $_SERVER["PHP_SELF"]);
        exit;
    }
}

// Close connection
mysqli_close($link);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Product</title>
        <?php include '../includes/headerLogin.php'; ?>
    </head>
    <body>
        <?php include '../includes/navCal.php'; ?>

        <div class="container p-5 my-5 bg-dark text-white">
            <h1>Edit Product</h1>
        </div>

        <div class="container">
            <div class="wrapper">
                <form action="edit_chemical.php?chid=<?php echo $chemical_id?>" method="post">
                    
                    <div class="form-group">
                        <label for="editServiceNum">SAP Service Number</label>
                        <input type="text" id="editServiceNum" name="editServiceNum" class="form-control" value="<?php echo isset($chemical['serviceNum']) ? $chemical['serviceNum'] : ''; ?>">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group pt-2">
                        <label for="editProductName">Product</label>
                        <input type="hidden" id="hiddenProductName" name="editProductName" value="<?php echo isset($chemical['productName']) ? $chemical['productName'] : '';?>">
                        <select id="editProductNameDropdown" name="editProductNameDropdown" class="form-control" disabled>
                            <option value="Select Product" disabled selected>Select Product</option>
                            <?php
                            // Array of chemical names
                            $chemicals = [
                                "KMC MICA (F,M,C)",
                                "KMC PLUG (F,M,C)",
                                "2 74-76%, 1 Mt Bag.",
                                "Alkaline Control, MgO",
                                "ALUMINIUM STEARATE",
                                "AMMONIUM BISULPHITE",
                                "AMMONIUM CHLORIDE",
                                "AMMONIUM NITRATE",
                                "APEC-HT",
                                "BENTONE 38",
                                "Bentonite",
                                "BIOCIDE",
                                "BIOZAN",
                                "CaCI2, 74-76%",
                                "CaCI2, 74-76%",
                                "CACI2, 82-84%",
                                "CACI2, 82-84%",
                                "CACL2, 94%",
                                "CACL2, 94%",
                                "CALCIUM BROMIDE (53%)",
                                "CALCIUM BROMIDE (95 WT%)",
                                "Calcium Oxide",
                                "Calcium Sulphate DiHydrate",
                                "CAUSTIC SODA",
                                "Chrome-Free Lignosulphonate",
                                "CITRIC ACID",
                                "CLAY- PRES",
                                "CLAY-CLEAN",
                                "CLAY-DEP (L)",
                                "CLAY-DEP",
                                "CLAY-SUPP",
                                "CMC-HV",
                                "CMC-LV",
                                "COLD THIN",
                                "CONFI-COAT",
                                "CONFIGEL- HT",
                                "CONFIGEL- XHT",
                                "CONFI-LUBE",
                                "CONFI-RM",
                                "CONTROL LP",
                                "COR-MUSCLE HT",
                                "COR-MUSCLE SD",
                                "COR-MUSCLE",
                                "CUMMULUS CPG",
                                "DCP 208",
                                "Deformer (Alcohol Based)",
                                "DESCO",
                                "DIASEAL-M",
                                "DIRT MAGNET",
                                "DRILL THIN",
                                "DRILLING DETERGENT",
                                "DRILLING DETERGENT",
                                "DRISCAL D",
                                "DRISPAC-R",
                                "DRISPAC-SL",
                                "FLC 2000",
                                "FLOCGEL RD",
                                "FLOWZAN",
                                "GEOVIS XT",
                                "Ground Leonardite Lignite",
                                "H2S SCAV (L)",
                                "HEC (P)",
                                "HP GUAR",
                                "HYDRO-BUFF",
                                "HYDRO-LUBE",
                                "HYDRO-LUBE S8",
                                "HYDRO-LUBE XP",
                                "HYDRO-STAR",
                                "HYDRO-THIN (L)",
                                "HYDRO-THIN",
                                "HYDRO-THIN HT",
                                "HYDRO-WASH",
                                "IMMUN-8",
                                "KCL",
                                "KCL",
                                "KELZAN XCD",
                                "KMC CARB",
                                "KMC E-LUBE",
                                "KMC FIBRE",
                                "KMC GEL",
                                "KMC GEL",
                                "KMC HT FLUIDCHECK",
                                "KMC LIFT",
                                "KMC LIG C",
                                "KMC MEG",
                                "KMC PAC R",
                                "KMC PAC RT",
                                "KMC PAC UL",
                                "KMC PAC UL T",
                                "KMC PIPELOOSE",
                                "KMC PIPELOOSE-W",
                                "KMC POTASSIUM SILICATE",
                                "KMC REX II",
                                "KMC SEAL C",
                                "KMC SEAL F",
                                "KMC SODIUM SILICATE",
                                "KMC STAR",
                                "KMC STARCH",
                                "KMC XC",
                                "K-PLUS(L)",
                                "K-PLUS(P)",
                                "KWIKSEAL (F,M,C)",
                                "LCP 2000",
                                "LIG SPERSE",
                                "LIME (CA(OH)2)",
                                "LIQUID CASING",
                                "LMO P",
                                "LMO S",
                                "LP GEL",
                                "LP KLEEN",
                                "LP KLEEN",
                                "LP MUL P",
                                "LP MUL P",
                                "LP MUL S",
                                "LP MUL S",
                                "LP POLYMER",
                                "LP SEAL",
                                "LP THIN",
                                "LP TROL HT",
                                "LP TROL",
                                "LP VIS",
                                "LP WASH",
                                "LP WET",
                                "MARA -SEAL GEL RTR",
                                "MARA -SEAL GEL",
                                "MARA-SEAL GEL ACC, 1 Qrt Btl",
                                "MARCIT -CT-SM",
                                "METHANOL",
                                "OPTA-CARB 150",
                                "OPTA-CARB 150",
                                "OPTA-CARB 25",
                                "OPTA-CARB 25",
                                "OPTA-CARB 5",
                                "OPTA-CARB 5",
                                "OPTA-CARB 50",
                                "OPTA-CARB 50",
                                "OPTA-CARB XC",
                                "OPTA-CARB XC",
                                "PBS PLUG (RTR)",
                                "PBS PLUG (RTR)",
                                "PBS PLUG",
                                "PLIOLITE DF01",
                                "POLY- MESH",
                                "POLY- MESH RTR",
                                "POLY-MESH ACC, 1 Qt Btl",
                                "Potasium Carbonate",
                                "Potasium Hydroxide, K+",
                                "POTASSIUM FORMATE (L)",
                                "POTASSIUM IODIDE Kg Ctn",
                                "POTASSIUM NITRATE",
                                "RADIAGREEN EBL",
                                "Radiagree EME Salt",
                                "SALT ©",
                                "SALT ©",
                                "SALT (V)",
                                "SALT (V)",
                                "SAPP",
                                "SCAV-OX A",
                                "SCAV-OX S",
                                "SHALE-M8",
                                "SLICKEN- SIDE (F)",
                                "SLICKEN- SIDE",
                                "SLICKEN-8",
                                "SODA ASH (NA2CO3)",
                                "SODIUM BICARBONATE",
                                "SODIUM BOMIDE PURE",
                                "Sodium Borate",
                                "Sodium Bromide (L)",
                                "Sodium Formate",
                                "Soltex",
                                "STABILOSE-A",
                                "STAFLO-R",
                                "STAFLO-SL",
                                "SULFO-PLAST",
                                "SUPER PICKLE",
                                "TAN-SPERSE CF",
                                "WHYOMING GEL",
                                "WYOMING GEL",
                                "XANTEMP SD",
                                "XANVIS",
                                "XC-EED",
                                "ZINC CARBONATE",
                                "DRILL GEL UA",
                                "DRILL GEL UA",
                                "DRILL GEL",
                                "DRILL GEL",
                                "ENCAPSUL-8",
                                "ENCAPSUL-8 L",
                                "HYDRO PAC R",
                                "HYDRO PAC UL",
                                "CLARIZAN BIOPOLYMER",
                                "DESCO CHROME FREE",
                                "DRILLPAC HV POLYMER",
                                "DRILLPAC LV POLYMER",
                                "DRILL-THIN",
                                "DRILLZAN D BIOPOLYMER",
                                "DRISPAC LIQUID",
                                "DRISPAC PLUS R",
                                "DRISPAC PLUS SL",
                                "DYNA RED FIBER (FINE)",
                                "DYNA RED FIBER (MEDIUM)",
                                "EXP D058",
                                "EXP D178",
                                "FLOWZAN LIQUID",
                                "FLOWZAN LIQUID",
                                "GREENBASE FLOWZAN",
                                "GUAR LIQUID",
                                "HE 100 DRY",
                                "HE 300 DRY",
                                "HEC LIQUID",
                                "ORGANOLIG",
                                "POLY BLOCK",
                                "REBOUND (REG)",
                                "REBOUND (FINE)",
                                "SOLTEX POTASSIUM",
                                "XANVIS-L",
                                "BEN-EX",
                                "Tackle, polymeric thinner",
                                "HEC-TOR",
                                "HEC-TOR L",
                                "RX03",
                                "RX05BD",
                                "Premium Seal, Turbo-Chem",
                                "EZ Squeeze, Turbo-Chem",
                                "EZ Thin, Turbo-Chem",
                                "Swellcm , Turbo-Chem",
                                "Swellcm Activator, Turbo-Chem",
                                "Turbo Phalt, Turbo-Chem",
                                "SYN-Seal, turbo-Chem",
                                "Utra Seal-XP",
                                "Ultra Seal-C",
                                "Ultra Seal-TG",
                                "Poly Plug, crosslink pill",
                                "XLR, crosslink retarder",
                                "XLD, crosslink defoamer",
                                "Well Cleanup, wellbore cleaner",
                                "CONFI-GEL",
                                "CONFI-MUL P",
                                "CONFI-MUL P (IO)",
                                "CONFI-MUL P (HT)",
                                "CONFI-MUL S",
                                "CONFI-MUL S (IO)",
                                "CONFI-MUL S (HT)",
                                "CONFI-DUO",
                                "CONFI-MOD",
                                "CONFI-PLEX",
                                "CONFI-THIN LT",
                                "SURF-COTE",
                                "CONFI-TROL",
                                "CONFI-TROL HT",
                                "Liquid Scraper",
                                "PetroVis Pill",
                                "Petrosol (F,M,C)",
                                "Bridgit (F,M,C)",
                                "Thixsal-Ultra",
                                "Plugsal",
                                "Plugsal X",
                                "Plugsal XC",
                                "HYDRO-STAR CMS",
                                "HYDRO-STAR HT",
                                "SILIC-8 S",
                                "HYDRO-THERM",
                                "T-REX",
                                "THERMO-PLEX",
                                "THERMO-SPERSE",
                                "RHEO-PLEX",
                                "OPTA-STAR",
                                "Bridgesal Ultra",
                                "Bridgesal Ultra SF",
                                "Ultra Breake M",
                                "Ultrasal 5E",
                                "Ultrasal 10E",
                                "Ultrasal 20E",
                                "Ultrasal 20R",
                                "Ultrasal 30E",
                                "Ultrasal 30R",
                                "Conqor 303A",
                                "Pipelax",
                                "Pipelax-W",
                                "Polydrill",
                                "Polythin",
                                "Polyvis II",
                                "Polytrol",
                                "Baracor 95",
                                "Baracor 700",
                                "N-Drill HT",
                                "Torq-Trim II"
                            ];

                            // Loop through the chemical names array and generate <option> elements
                            foreach ($chemicals as $chemicalOption) {
                                $selected = isset($chemical['productName']) && $chemical['productName'] === $chemicalOption ? 'selected' : '';
                                echo "<option value=\"$chemicalOption\" $selected>$chemicalOption</option>";
                            }
                            ?>
                        </select>
                        <span class="invalid-feedback"></span>
                    </div>  
                    <div class="form-group pt-2">
                        <label for="editUnit">Unit Size</label>
                        <select id="editUnit" name="editUnit" class="form-control">
                            <option value="Select Unit Size" selected disabled>Select Unit Size</option>
                            <?php
                            // For Unit Size dropdown
                            $unitOptions = ["10 lb/sxs", "15 lb/sxs", "25 lb/sxs", "40 lb/sxs", "50 lb/sxs", "55 lb/sxs", "20 kg/sxs", "25 kg/sxs", "50 kg/sxs", "5 gal/drum", "55 gal/drum", "200 ltr/drum", "220 kg/drum", "225 kg/drum", "1 MT", "1000 ltr/bb"];

                            foreach ($unitOptions as $unitOption) {
                                $selected = isset($chemical['unit']) && $chemical['unit'] === $unitOption ? 'selected' : '';
                                echo "<option value=\"$unitOption\" $selected>$unitOption</option>";
                            }
                            ?>
                        </select>
                        <span class="invalid-feedback"></span>
                    </div>                            
                    <div class="form-group pt-2">
                        <label for="editCost">Unit Cost</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">USD</span>
                            <input type="number" id="editCost" name="editCost" inputmode="decimal" step="any" min="0" class="form-control" value="<?php echo isset($chemical['cost']) ? trim($chemical['cost']) : ''; ?>">
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="WenCat.php" class="btn btn-primary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>