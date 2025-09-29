$(document).ready(function () {
    // Function to handle search input
    $("#searchInput").on("input", function () {
        const query = $(this).val();
        
        $.ajax({
            type: "POST",
            url: "search.php",
            data: {query: query},
            success: function (data) {
                $("#searchResults").html(data);
            }
        });
    });

    // Function to handle category change and display relevant calculators
    var categoryContainers = document.querySelectorAll('.category-container');

    function clearCalculatorList() {
        var calculatorContainers = document.querySelectorAll('.calculator-container');
        calculatorContainers.forEach(function (container) {
            container.remove(); // Remove previous calculator containers
        });
    }

    function addCalculators(calculatorLinks, categoryContainer) {
        // Create a new container for the calculators
        var calculatorContainer = document.createElement('div');
        calculatorContainer.classList.add('container', 'mt-3', 'calculator-container', 'list-group');

        // Append the calculator links to the new container
        calculatorLinks.forEach(function (link) {
            calculatorContainer.innerHTML += link;
        });

        // Insert the calculator container between the clicked category and the next category
        categoryContainer.parentNode.insertBefore(calculatorContainer, categoryContainer.nextSibling);
    }

    // Event delegation for dynamically added links
    $("#searchResults").on("click", ".list-group-item-action", function (event) {
        event.preventDefault();
        var href = $(this).attr("href");
        window.location.href = href;
    });

    categoryContainers.forEach(function (category) {
        category.addEventListener('click', function () {
            console.log('Category clicked:', this.id);
            event.preventDefault(); // Prevent default action
            var categoryId = this.id;
            clearCalculatorList(); // Clear previous list

            // Add calculators based on the clicked category
            switch (categoryId) {
                    case 'appliedDrillingFormulas':
                        var calculatorLinks = [
                            "<a href='calculators/DrillCollarWeight.php' class='list-group-item list-group-item-action applied'>Drill Collar Weight</a>",
                            "<a href='calculators/EffectiveMudDensity.php' class='list-group-item list-group-item-action'>Effective Mud Density</a>",
                            "<a href='calculators/EquivalentCirculatingDensity(ECD)UsingYieldPointforMWlessthan13ppg.php' class='list-group-item list-group-item-action'>Equivalent Circulating Density (ECD) Using Yield Point for MW less than or equal to 13 ppg</a>",
                            "<a href='calculators/EquivalentCirculatingDensity(ECD)UsingYieldPointforMWmorethan13ppg.php' class='list-group-item list-group-item-action'>Equivalent Circulating Density (ECD) Using Yield Point for MW more than 13 ppg</a>",
                            "<a href='calculators/LagTimeCalculation.php' class='list-group-item list-group-item-action'>Lag Time</a>",
                            "<a href='calculators/LightWeightSpotFillToBalanceFormationPressure.php' class='list-group-item list-group-item-action'>Light weight spot fill to balance formation pressure</a>",
                            "<a href='calculators/LossofHydrostaticPressureDuetoFillingWaterIntoAnnulusInCaseofLostReturn.php' class='list-group-item list-group-item-action'>Loss of hydrostatic pressure due to filling water into annulus in case of lost return</a>",
                            "<a href='calculators/MarginofOverPull.php' class='list-group-item list-group-item-action'>Margine of Over Pull (MOP)</a>",
                            "<a href='calculators/MaximumROPBrforeFracturingFormation.php' class='list-group-item list-group-item-action'>Maximum ROP Before Fracturing Formation</a>",
                            "<a href='calculators/PipeElongationDuetoTemperature.php' class='list-group-item list-group-item-action'>Pipe Elongation Due to Temperature</a>",
                            "<a href='calculators/PressureRequiredtoBreakCirculation.php' class='list-group-item list-group-item-action'>Pressure required to break circulation</a>",
                            "<a href='calculators/Pumpout.php' class='list-group-item list-group-item-action'>Pump out (both duplex and triplex pump)</a>",
                            "<a href='calculators/PumpPressureandPumpStrokeRelationship.php' class='list-group-item list-group-item-action'>Pump Pressure and Pump Stroke Relationship </a>",
                            "<a href='calculators/StuckPipeCalculation.php' class='list-group-item list-group-item-action'>Stuck Pipe Calculation</a>",
                            "<a href='calculators/TonMileCalculation.php' class='list-group-item list-group-item-action'>Ton Miles Calculation</a>",
                            "<a href='calculators/VolumeofCuttingGeneratedWhileDrilling.php' class='list-group-item list-group-item-action'>Volume of Cutting Generated While Drilling</a>"
                        ];
                        addCalculators(calculatorLinks, category);
                        break;

                    case 'basicDrillingFormulas':
                        var calculatorLinks = [
                            "<a href='calculators/AccumulatorCapacity.php' class='list-group-item list-group-item-action basic'>Accumulator Capacity</a>",
                            "<a href='calculators/AmountOfCuttingsDrilledPerFootOfHoleDrilled.php' class='list-group-item list-group-item-action'>Amount of cuttings drilled per foot of hole drilled</a>",
                            "<a href='calculators/AnnularCapacityBetweenCasingOrHoleAndDrillPipeTubingOrCasing.php' class='list-group-item list-group-item-action'>Annular Capacity </a>",
                            "<a href='calculators/AnnularVelocity(AV).php' class='list-group-item list-group-item-action'>Annular Velocity (AV)</a>",
                            "<a href='calculators/PressureTestVolumes.php' class='list-group-item list-group-item-action'>Pressure test volumes</a>",
                            "<a href='calculators/BuoyancyFactor(Bf)WithDifferentFluidWeightInsideAndOutside.php' class='list-group-item list-group-item-action'>Buoyancy Factor (BF) with different fluid weight inside and outside</a>",
                            "<a href='calculators/TemperatureConverter.php' class='list-group-item list-group-item-action'>Convert Temperature Unit</a>",
                            "<a href='calculators/ConvertingPressureintoMudWeight.php' class='list-group-item list-group-item-action'>Converting Pressure into Mud Weight</a>",
                            "<a href='calculators/CoringCostPerFootageRecovered.php' class='list-group-item list-group-item-action'>Coring Cost Per Footage Recovered</a>",
                            "<a href='calculators/DepthofWashout.php' class='list-group-item list-group-item-action'>Depth of washout</a>",
                            "<a href='calculators/D-ExponentandD-ExponentCorrected.php' class='list-group-item list-group-item-action'>D-Exponent and D-Exponent Corrected</a>",
                            "<a href='calculators/DisplacementOfPlainPipeSuchAsCasingTubingEtc.php' class='list-group-item list-group-item-action'>Displacement of plain pipe such as casing, tubing, etc.</a>",
                            "<a href='calculators/CostPerFootCalculation.php' class='list-group-item list-group-item-action'>Drilling Cost Per Foot</a>",
                            "<a href='calculators/EquivalentCirculatingDensity(ECD).php' class='list-group-item list-group-item-action'>Equivalent Circulating Density (ECD)</a>",
                            "<a href='calculators/PressureRequiredFormationIntegrityTest(FIT).php' class='list-group-item list-group-item-action'>Formation Integrity Test (FIT)</a>",
                            "<a href='calculators/FormationTemperature.php' class='list-group-item list-group-item-action'>Formation Temperature</a>",
                            "<a href='calculators/HowManyFeetOfDrillPipePulledToLoseCertainAmountOfHydrostaticPressure(Psi).php' class='list-group-item list-group-item-action'>How many feet of drill pipe pulled to lose certain amount of hydrostatic pressure (psi)</a>",
                            "<a href='calculators/HydrostaticPressure(HP).php' class='list-group-item list-group-item-action'>Hydrostatic Pressure (HP)</a>",
                            "<a href='calculators/HydrostaticPressure(HP)DecreaseWhenPOOH.php' class='list-group-item list-group-item-action'>Hydrostatic Pressure (HP) Decrease When POOH</a>",
                            "<a href='calculators/InnerCapacityOfOpenHole,InsideCylindricalObjects.php' class='list-group-item list-group-item-action'>Inner Capacity of open hole, inside cylindrical objects </a>",
                            "<a href='calculators/LeakOffTestPressureConvertedtoEquivalentMudWeight(LOT).php' class='list-group-item list-group-item-action'>Leak Off Test (LOT)</a>",
                            "<a href='calculators/PressureandForce.php' class='list-group-item list-group-item-action'>Pressure and Force</a>",
                            "<a href='calculators/PressureGradientCalculation.php' class='list-group-item list-group-item-action'>Pressure Gradient</a>",
                            "<a href='calculators/SlugCalculation.php' class='list-group-item list-group-item-action'>Slug Calculation</a>",
                            "<a href='calculators/SpecificGravity(SG).php' class='list-group-item list-group-item-action'>Specific Gravity (SG)</a>",
                            "<a href='calculators/TotalBitRevolutioninMudMotor.php' class='list-group-item list-group-item-action'>Total Bit Revolution in Mud Motor</a>"

                        ];
                        addCalculators(calculatorLinks, category);
                        break;

                    case 'directionalDrilling':
                        var calculatorLinks = [
                            "<a href='calculators/DirectionalSurvey-AngleAveragingMethod.php' class='list-group-item list-group-item-action'>Directional Survey - Angle Averaging Method</a>",
                            "<a href='calculators/DirectionalSurvey-RadiusofCurvatureMethod.php' class='list-group-item list-group-item-action'>Directional Survey - Radius of Curvature Method</a>",
                            "<a href='calculators/DirectionalSurvey-BalancedTangentialMethod.php' class='list-group-item list-group-item-action'>Directional Survey - Balanced Tangential Method</a>",
                            "<a href='calculators/DirectionalSurvey-MinimumCurvatureMethod.php' class='list-group-item list-group-item-action'>Directional Survey - Minimum Curvature Method</a>",
                            "<a href='calculators/DirectionalSurvey-TangentialMethod.php' class='list-group-item list-group-item-action'>Directional Survey - Tangential Method</a>",
                            "<a href='calculators/DoglegSeverityCalculationbasedonRadiusofCurvatureMethod.php' class='list-group-item list-group-item-action'>Dogleg Severity Calculation based on Radius of Curvature Method</a>",
                            "<a href='calculators/DoglegSeverityCalculationbasedonTangentialMethod.php' class='list-group-item list-group-item-action'>Dogleg Severity Calculation based on Tangential Method</a>"
                        ];
                        addCalculators(calculatorLinks, category);
                        break;

                    case 'drillingFluidFormulas':
                        var calculatorLinks = [
                            "<a href='calculators/BulkDensityofCuttingsbyusingMudBalance.php' class='list-group-item list-group-item-action'>Bulk Density of Cuttings by using Mud Balance</a>",
                            "<a href='calculators/DecreaseOilWaterRatio.php' class='list-group-item list-group-item-action'>Decrease oil water ratio</a>",
                            "<a href='calculators/DetermineOilWaterRatioFromARetortAnalysis.php' class='list-group-item list-group-item-action'>Determine oil water ratio from a retort analysis</a>",
                            "<a href='calculators/DilutiontoControlLGS.php' class='list-group-item list-group-item-action'>Dilution to control LGS</a>",
                            "<a href='calculators/IncreaseMudWeightByAddingBarite.php' class='list-group-item list-group-item-action'>Increase mud weight by adding Barite</a>",
                            "<a href='calculators/IncreaseMudWeightByAddingCalciumCarbonate.php' class='list-group-item list-group-item-action'>Increase mud weight by adding Calcium Carbonate</a>",
                            "<a href='calculators/IncreaseMudWeightByAddingHematite.php' class='list-group-item list-group-item-action'>Increase mud weight by adding Hematite</a>",
                            "<a href='calculators/IncreaseOilWaterRatio.php' class='list-group-item list-group-item-action'>Increase oil water ratio</a>",
                            "<a href='calculators/MixingFluidsofDifferentDensitieswithPitSpaceLimitation.php' class='list-group-item list-group-item-action'>Mixing Fluids of Different Densities with Pit Space Limitation</a>",
                            "<a href='calculators/MixingFluidsofDifferentDensitieswithoutPitSpaceLimitation.php' class='list-group-item list-group-item-action'>Mixing Fluids of Different Densities without Pit Space Limitation</a>",
                            "<a href='calculators/PlasticViscosity(PV)andYieldPoint(YP)frommudtest.php' class='list-group-item list-group-item-action'>Plastic Viscosity (PV) and Yield Point (YP) from mud test</a>",
                            "<a href='calculators/ReduceMudWeightByDilution.php' class='list-group-item list-group-item-action'>Reduce mud weight by dilution</a>",
                            "<a href='calculators/SolidDensityFromRetortAnalysis.php' class='list-group-item list-group-item-action'>Solid Density From Retort Analysis</a>"
                        ];
                        addCalculators(calculatorLinks, category);
                        break;

                    case 'engineeringFormulas':
                        var calculatorLinks = [
                            "<a href='calculators/AnnularPressureLoss.php' class='list-group-item list-group-item-action'>Annular Pressure Loss</a>",
                            "<a href='calculators/CriticalRpmToPreventPipeFailureDueToHighVibration.php' class='list-group-item list-group-item-action'>Critical RPM</a>",
                            "<a href='calculators/CalculateEquivalentCirculatingDensitywithEngineeringFormula.php' class='list-group-item list-group-item-action'>Calculate Equivalent Circulating Density with Engineering Formula</a>",
                            "<a href='calculators/BottomHolePressurefromWellheadPressureinaDryGasWell.php' class='list-group-item list-group-item-action'>Bottom Hole Pressure from Wellhead Pressure in a Dry Gas Well</a>"
                        ];
                        addCalculators(calculatorLinks, category);
                        break;

                    case 'hydraulicFormulas':
                        var calculatorLinks = [
                            "<a href='calculators/BitNozzleVelocity.php' class='list-group-item list-group-item-action'>Bi Nozzle Velocity</a>",
                            "<a href='calculators/BitAggressivenessCoefficientofFriction.php' class='list-group-item list-group-item-action'>Bit Aggressiveness</a>",
                            "<a href='calculators/BitHydraulicHorsepowe(hp).php' class='list-group-item list-group-item-action'>Bit Hydraulic Horsepower</a>",
                            "<a href='calculators/BitHydraulicHorsepowerPerAreaofDrilBit(HSI).php' class='list-group-item list-group-item-action'>Bit Hydraulic Horsepower Per Area of Dril Bit (HSI)</a>",
                            "<a href='calculators/CriticalFlowRatewithPowerLawConstant.php' class='list-group-item list-group-item-action'>Critical Flow Rate</a>",
                            "<a href='calculators/CrossFlowVelocityUnderaDrillingBit.php' class='list-group-item list-group-item-action'>Cross Flow Velocity Under a Drilling Bit</a>",
                            "<a href='calculators/CuttingCarryingIndex.php' class='list-group-item list-group-item-action'>Cutting Carrying Index</a>",
                            "<a href='calculators/CuttingSlipVelocityMethod1.php' class='list-group-item list-group-item-action'>Cutting Slip Velocity Method#1</a>",
                            "<a href='calculators/CuttingSlipVelocityMethod2.php' class='list-group-item list-group-item-action'>Cutting Slip Velocity Method#2</a>",
                            "<a href='calculators/EffectiveViscosity.php' class='list-group-item list-group-item-action'>Effective Viscosity</a>",
                            "<a href='calculators/HydraulicHorsePower(HPP).php' class='list-group-item list-group-item-action'>Hydraulic Horse Power (HPP)</a>",
                            "<a href='calculators/ImpactForceofJetNozzlesonBottomHole.php' class='list-group-item list-group-item-action'>Impact Force of Jet Nozzles on Bottom Hole</a>",
                            "<a href='calculators/MechanicalSpecificEnergy.php' class='list-group-item list-group-item-action'>Mechanical Specific Energy</a>",
                            "<a href='calculators/MinimumFlowRateforPDCbit.php' class='list-group-item list-group-item-action'>Minimum Flow Rate PDC bit</a>",
                            "<a href='calculators/OptimumFlowRate-OptimzedatTheEndofTheRun.php' class='list-group-item list-group-item-action'>Optimum Flow Rate for basic system</a>",
                            "<a href='calculators/PowerLawConstant.php' class='list-group-item list-group-item-action'>Power Law Constant</a>",
                            "<a href='calculators/PressureDropAcrossBit(psi).php' class='list-group-item list-group-item-action'>Pressure Drop Across Bit</a>",
                            "<a href='calculators/PressureLossinAnnulus.php' class='list-group-item list-group-item-action'>Pressure Loss Annulus</a>",
                            "<a href='calculators/PressureLossinAnnuluswithCorrectedCoefficient.php' class='list-group-item list-group-item-action'>Pressure Loss Annulus With Tool Joint Correction</a>",
                            "<a href='calculators/PressureLossThroughTheDrillString.php' class='list-group-item list-group-item-action'>Pressure Loss Drillstring</a>",
                            "<a href='calculators/PressureLossThroughTheDrillStringWithToolJointCoefficient.php' class='list-group-item list-group-item-action'>Pressure Loss Drillstring With Tool Joint Correction</a>",
                            "<a href='calculators/PressureLossThroughSurfaceEquipment.php' class='list-group-item list-group-item-action'>Pressure Loss in Surface Equipment</a>",
                            "<a href='calculators/ReynoldNumber.php' class='list-group-item list-group-item-action'>Reynold Number</a>",
                            "<a href='calculators/SurgeAndSwabPressureMethod1.php' class='list-group-item list-group-item-action'>Surge and Swab Pressure Method#1</a>",
                            "<a href='calculators/SurgeAndSwabPressureMethod2.php' class='list-group-item list-group-item-action'>Surge and Swab Pressure Method#2</a>",
                            "<a href='calculators/TotalFlowArea.php' class='list-group-item list-group-item-action'>Total Flow Area Table</a>"
                        ];
                        addCalculators(calculatorLinks, category);
                        break;

                    case 'wellControlFormulas':
                        var calculatorLinks = [
                            "<a href='calculators/ActualGasMigrationRate.php' class='list-group-item list-group-item-action'>Actual gas migration rate in a shut in well</a>",
                            "<a href='calculators/AdjustedMaximumAllowableShut-inCasingPressureForNewMudWeight.php' class='list-group-item list-group-item-action'>Adjusted maximum allowable shut-in casing pressure for new mud weight</a>",
                            "<a href='calculators/CalculateInfluxHeight.php' class='list-group-item list-group-item-action'>Calculate Influx Height</a>",
                            "<a href='calculators/EstimateGasMigrationRateWithAnEmpiricalEquation.php' class='list-group-item list-group-item-action'>Estimate gas migration rate with an empirical equation</a>",
                            "<a href='calculators/EstimateTypeofInflux(kick).php' class='list-group-item list-group-item-action'>Estimate type of influx</a>",
                            "<a href='calculators/FinalCirculatingPressure(PSI).php' class='list-group-item list-group-item-action'>Final Circulating Pressure (FCP)</a>",
                            "<a href='calculators/FormationPressurefromKickAnalysis.php' class='list-group-item list-group-item-action'>Formation pressure from kick analysis</a>",
                            "<a href='calculators/HydrostaticPressureLossDuetoGasCut.php' class='list-group-item list-group-item-action'>Hydrostatic Pressure Loss Due to Gas Cut Mud</a>",
                            "<a href='calculators/IncreaseInCasingPressureDueToKickPenetration.php' class='list-group-item list-group-item-action'>Increase in Casing Pressure due to Kick Penetration</a>",
                            "<a href='calculators/InitialCirculatingPressure(psi).php' class='list-group-item list-group-item-action'>Initial Circulating Pressure (ICP) </a>",
                            "<a href='calculators/KickToleranceFactor(KTF).php' class='list-group-item list-group-item-action'>Kick tolerance factor (KTF)</a>",
                            "<a href='calculators/KillMudWeight.php' class='list-group-item list-group-item-action'>Kill Weight Mud</a>",
                            "<a href='calculators/LubeIncrement(MI).php' class='list-group-item list-group-item-action'>Lube Increment</a>",
                            "<a href='calculators/MaximumFormationPressureThatCanWithstandWhenShutInTheWell.php' class='list-group-item list-group-item-action'>Maximum formation pressure (FP)</a>",
                            "<a href='calculators/MaximumPossibleInfluxHeightWhenEqualToMaximumAllowableShutInCasingPressure.php' class='list-group-item list-group-item-action'>Maximum influx height</a>",
                            "<a href='calculators/MaximumInitialShut-InCasingPressure(MISICP).php' class='list-group-item list-group-item-action'>Maximum Initial Shut-In Casing Pressure (MISICP)</a>",
                            "<a href='calculators/MaximumPitGainFromGasKickInWaterBasedMud.php' class='list-group-item list-group-item-action'>Maximum pit gain from gas kick in water based mud</a>",
                            "<a href='calculators/MaximumSurfacePressureFromGasInfluxInWaterBasedMud.php' class='list-group-item list-group-item-action'>Maximum Surface Pressure from Gas Influx in Water Based Mud</a>",
                            "<a href='calculators/MaximumSurfacePressureFromKickToleranceInformation.php' class='list-group-item list-group-item-action'>Maximum surface pressure from kick tolerance information</a>",
                            "<a href='calculators/MudIncrement(MI).php' class='list-group-item list-group-item-action'>Mud Increment</a>",
                            "<a href='calculators/NewPressureLossWithNewMud(psi).php' class='list-group-item list-group-item-action'>New Pressure Loss With New Mud (psi)</a>",
                            "<a href='calculators/NewPumpPressureWithNewStrokes(psi).php' class='list-group-item list-group-item-action'>New Pressure Loss With New Strokes (psi)</a>",
                            "<a href='calculators/RiserMargin.php' class='list-group-item list-group-item-action'>Riser Margin</a>",
                            "<a href='calculators/TimeToPenetrateTheKick.php' class='list-group-item list-group-item-action'>Time To Penetrate Kick</a>",
                            "<a href='calculators/TripMarginCalculation.php' class='list-group-item list-group-item-action'>Trip margin</a>",
                            "<a href='calculators/BottleCapacityRequiredinAccumulator.php' class='list-group-item list-group-item-action'>Bottle Capacity Required in Accumulator</a>"
                        ];
                        addCalculators(calculatorLinks, category);
                        break;

                    case 'drillString':
                        var calculatorLinks = [
                            "<a href='calculators/TensileCapacityofDrillpipe.php' class='list-group-item list-group-item-action'>Tensile Capacity of Drill String</a>"
                        ];
                        addCalculators(calculatorLinks, category);
                        break;

                    case 'cementing':
                        var calculatorLinks = [
                            "<a href='calculators/SqueezeBelowRetainerandBalanceCementPlugAboveRetainer.php' class='list-group-item list-group-item-action'>Squeeze Below Retainer and Balance Cement Plug Above Retainer</a>",
                            "<a href='calculators/BalanceCementPlugAboveRetainer.php' class='list-group-item list-group-item-action'>Balance Cement Plug Above Retainer</a>"
                        ];
                        addCalculators(calculatorLinks, category);
                        break;
            }
        });
    });
});
