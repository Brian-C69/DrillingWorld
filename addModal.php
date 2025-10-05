<!-- The Add Modal -->
<div class="modal" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="form-group ">
                        <label>SAP Service Number</label>
                        <input type="text" name="serviceNum" class="form-control <?php echo (!empty($serviceNum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $serviceNum; ?>">
                        <span class="invalid-feedback"><?php echo $serviceNum_err; ?></span>
                    </div>
                    <div class="form-group pt-2">
                        <label>Product Name</label>
                        <select name="productName" class="form-control <?php echo (!empty($productName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $productName; ?>">
                            <option value="Select Product" selected disabled>Select Product</option>
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
                                "Barite",
                                "Bentonite",
                                "BIOCIDE",
                                "BIOZAN",
                                "CaCI2, 74-76%",
                                "CaCI2, 74-76%",
                                "CACI2, 82-84%",
                                "CACI2, 82-84%",
                                "CACL2, 94%",
                                "CACL2, 94% 2",
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
                                "OPTA-CARB",
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
                                "SARALINE 185V",
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
                            foreach ($chemicals as $chemical) {
                                echo "<option value=\"$chemical\">$chemical</option>";
                            }
                            ?>
                        </select>
                        <span class="invalid-feedback"><?php echo $productName_err; ?></span>
                    </div>
                    <div class="form-group pt-2">
                        <label>Unit Size</label>
                        <select name="unit" class="form-control <?php echo (!empty($unit_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $unit; ?>">
                            <option value="Select Unit Size" selected disabled>Select Unit Size</option>
                            <option value="10 lb/sxs">10 lb/sxs</option>
                            <option value="15 lb/sxs">15 lb/sxs</option>
                            <option value="25 lb/sxs">25 lb/sxs</option>
                            <option value="40 lb/sxs">40 lb/sxs</option>
                            <option value="50 lb/sxs">50 lb/sxs</option>
                            <option value="55 lb/sxs">55 lb/sxs</option>
                            <option value="20 kg/sxs">20 kg/sxs</option>
                            <option value="25 kg/sxs">25 kg/sxs</option>
                            <option value="50 kg/sxs">50 kg/sxs</option>
                            <option value="5 gal/drum">5 gal/drum</option>
                            <option value="55 gal/drum">55 gal/drum</option>
                            <option value="200 ltr/drum">200 ltr/drum</option>
                            <option value="220 kg/drum">220 kg/drum</option>
                            <option value="225 kg/drum">225 kg/drum</option>
                            <option value="1 MT">1 MT</option>
                            <option value="1000 ltr/bb">1000 ltr/bb</option>
                            <option value="BBLS">BBLS</option>
                        </select>
                        <span class="invalid-feedback"><?php echo $unit_err; ?></span>
                    </div>
                    <div class="form-group pt-2">
                        <label>Unit Cost</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">USD</span>
                            <input type="number" inputmode="decimal" step="any" name="cost" min="0" class="form-control <?php echo (!empty($cost_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cost; ?>">
                            <span class="invalid-feedback"><?php echo $cost_err; ?></span>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Add">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>